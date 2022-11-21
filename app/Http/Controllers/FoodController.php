<?php

namespace App\Http\Controllers;

use App\GetData\FoodData;
use App\FileManagement\Image;
use App\Http\Requests\FoodRequest;
use App\Models\Category;
use App\Models\Eatery;
use App\Models\Food;
use App\Responses\Facades\FoodResponse;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    use AuthorizesRequests {
        authorize as protected baseAuthorize;
    }
    public function authorize($ability, $arguments = [])
    {
        if(Auth::guard('admin')->check())
            Auth::shouldUse('admin');
        elseif (Auth::guard('seller')->check())
            Auth::shouldUse('seller');
        $this->baseAuthorize($ability,$arguments);
    }

    public function index()
    {
        return FoodResponse::index(FoodData::index());
    }

    public function create()
    {
        return FoodResponse::create(Category::all(),$this->getEatery()->discounts);
    }

    public function store(FoodRequest $request)
    {
        $this->storeWithImage($request);
        return FoodResponse::store();
    }

    public function show(Food $food)
    {
        return FoodResponse::show(FoodData::show($food));
    }

    public function edit(Food $food)
    {
        $this->authorize('food-update',$food);
        $categories=Category::all();
        return FoodResponse::edit($categories,$this->getEatery()->discounts,$food);
    }

    public function update(FoodRequest $request, Food $food)
    {
        $this->authorize('food-update',$food);
        $this->updateWithImage($request, $food->image, $food);
        return FoodResponse::update();
    }

    public function destroy(Food $food)
    {
        $food->delete();
        return FoodResponse::destroy();
    }

    public function getEatery()
    {
        return Auth::guard('seller')->user()->eatery;
    }

    public function updateWithImage(FoodRequest $request, mixed $image_name, Food $food): void
    {
        $request->edit_image && $image_name = Image::update('food', $image_name, $request, 'edit_image');
        $food->update($request->except('_token', 'edit_image', '_method') +
            ['image' => $image_name, 'eatery_id' => $this->getEatery()->id]);
    }

    public function storeWithImage(FoodRequest $request): void
    {
        $image_name = Image::store('food', $request);
        Food::create($request->except('_token', 'image') +
            ['image' => $image_name, 'eatery_id' => $this->getEatery()->id]);
    }

}
