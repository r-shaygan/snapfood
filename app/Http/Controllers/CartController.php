<?php

namespace App\Http\Controllers;

use App\Exceptions\ActionNotAllowedException;
use App\Http\Requests\CartRequest;
use App\Jobs\SendInvoiceStatusMailJob;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Invoice;
use App\Models\InvoiceStatus;
use App\Responses\Facades\CartResponse;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CartController extends Controller
{

    public function index()
    {
        return CartResponse::index(Auth::user()->carts);
    }

    public function store(CartRequest $request)
    {
        $eatery_id = $this->getEateryId($request->food_id);
        $foodExist = $this->foodIsExist($request->food_id);
        $cartExist = $this->cartIsExist($eatery_id, Auth::id());
        if (!$foodExist && !$cartExist)
            $cart_id = $this->InsertInCartIfFoodNotExist($eatery_id, $request);
        if ($cartExist) {
            $cart_id = $this->getCartId($eatery_id, Auth::id());
            if (!$foodExist)
                $this->insertIntoCartFood($request->food_id, $request->count, $cart_id);
            else {
                $count = $this->getFoodCount($cart_id, $request->food_id);
                $count += $request->count;
                $this->updateFoodCount($cart_id, $request->food_id, $count);
            }
        }
        return CartResponse::store($cart_id);
    }

    public function update(CartRequest $request, $id)
    {
        if (!$this->foodIsExist($request->food_id))
            throw new NotFoundHttpException('this food is not exist in your cart!');
        if (!$request->count)
            $this->delete($request->food_id, $id);
        else
            $this->updateFoodCount($id, $request->food_id, $request->count);
        return CartResponse::update($id);

    }

    public function show(Cart $cart)
    {
        $this->authorize('isOwnCart', $cart);
        return CartResponse::show($cart);
    }

    public function pay(Cart $cart)
    {
        $this->authorize('isOwnCart', $cart);
        $this->hasAddress();
        DB::beginTransaction();
        $invoice = $this->createInvoice($cart);
        $this->insertInvoiceFoods($cart, $invoice);
        $this->delete($cart);
        SendInvoiceStatusMailJob::dispatch($invoice, InvoiceStatus::find($invoice->status_id));
        DB::commit();
        return CartResponse::pay();
    }

    private function foodIsExist($food_id)
    {
        return DB::table('carts')
            ->join('cart_food', 'cart_food.cart_id', '=', 'carts.id')
            ->where('carts.user_id', Auth::id())
            ->where('cart_food.food_id', $food_id)
            ->exists();
    }

    public function createInvoice(Cart $cart)
    {
        return Invoice::create([
            'user_id' => Auth::id(),
            'eatery_id' => $cart->eatery_id,
            'address' => Auth::user()->default_address,
            'cost' => $this->payableCost($cart),
            'status_id' => 1
        ]);
    }

    public function insertInvoiceFoods(Cart $cart, $invoice)
    {
        $cartFood = [];
        foreach ($cart->foods as $food) {
            $cartFood[] = ['invoice_id' => $invoice->id, 'food_id' => $food->id, 'count' => $food->pivot->count];
        }
        return DB::table('food_invoice')->insert($cartFood);
    }

    private function delete($food_id, $cart_id)
    {
        DB::table('cart_food')
            ->where('food_id', $food_id)
            ->where('cart_id', $cart_id)
            ->delete();
        if($this->cartIsEmpty($cart_id))
            Cart::find($cart_id)->delete();
    }

    private function payableCost(Cart $cart)
    {
        $total_cost = 0;
        foreach ($cart->foods as $food) {
            $total_cost += $food->cost * ($food->discount ? (100 - $food->discount->percent) / 100 : 1) * $food->pivot->count;
        }
        return $total_cost;
    }

    private function hasAddress()
    {
        if (!Auth::user()->default_address)
            throw new ActionNotAllowedException(__('exception.default_address', [], 'en'));
    }

    private function getEateryId(int $food_id)
    {
        return Food::findOrFail($food_id)->eatery_id;
    }

    private function InsertInCartIfFoodNotExist($eatery_id, CartRequest $request): void
    {
        DB::beginTransaction();
        $cart_id = $this->insertIntoCart($eatery_id);
        $this->insertIntoCartFood($request->food_id, $request->count, $cart_id);
        DB::commit();
        return;
        $cart_id;
    }

    private function cartIsExist($eatery_id, int $id)
    {
        return DB::table('carts')
            ->where('eatery_id', $eatery_id)
            ->where('user_id', $id)
            ->exists();
    }

    private function insertIntoCart($eatery_id)
    {
        return Cart::insertGetId([
            'eatery_id' => $eatery_id,
            'user_id' => Auth::id()
        ]);

    }

    private function insertIntoCartFood($food_id, $count, $cart_id): void
    {
        DB::table('cart_food')->insert([
            'food_id' => $food_id,
            'cart_id' => $cart_id,
            'count' => $count
        ]);
    }

    private function getCartId($eatery_id, int $id)
    {
        return DB::table('carts')
            ->where('eatery_id', $eatery_id)
            ->where('user_id', $id)
            ->first()
            ->id;
    }

    private function getFoodCount($cart_id, $food_id)
    {
        return DB::table('cart_food')
            ->where('food_id', $food_id)
            ->where('cart_id', $cart_id)
            ->first()
            ->count;
    }

    private function updateFoodCount($id, $food_id, $count): void
    {
        DB::table('cart_food')
            ->where('cart_id', $id)
            ->where('food_id', $food_id)
            ->update(['count' => $count]);
    }

    private function cartIsEmpty($cart_id)
    {
      $exists=  DB::table('cart_food')
            ->where('cart_id', $cart_id)
            ->exists();
      return !$exists;
    }
}
