<?php

namespace App\Responses\Json;

use App\Http\Resources\CartResource;
use App\Listeners\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CartResponse
{
    public function index($carts)
    {
        return !$carts->isEmpty() ? CartResource::collection($carts) : ['message'=>'You have not set any cart yet!'];
    }

    public function show($cart)
    {
        return CartResource::make($cart);
    }

    public function pay()
    {
        return response()->json(['message'=>__('shopping.payment.success',[],'en')],201);
    }

    public function store($cart_id)
    {
        return response()->json([
            'message'=> __('shopping.cart.add.success',[],'en'),
            'cart_id'=>$cart_id
        ],201);
    }

    public function update($cart_id)
    {
        return response()->json([
            'message' =>  __('shopping.cart.update.success',[],'en'),
            'cart_id'=>$cart_id
            ]);
    }
}
