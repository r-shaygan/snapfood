<?php

namespace App\Http\Controllers;

use App\FileManagement\ImageManagement;
use App\Http\Requests\FoodRequest;
use App\Models\Category;
use App\Models\Eatery;
use App\Models\Food;
use App\Responses\Facades\FoodResponse;
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
        $eatery_id = $this->getEatery_id();
        $foods=Food::where('eatery_id',$eatery_id)->get();
        return FoodResponse::index($foods);
    }

    public function create()
    {
        $categories=Category::all();
        return FoodResponse::create($categories);
    }

    public function store(Request $request)
    {
        $eatery_id = $this->getEatery_id();
        $image_name=ImageManagement::store('food',$request);
        Food::create($request->except('_token','image')+['image'=>$image_name,'eatery_id'=>$eatery_id]);
        return FoodResponse::store();
    }

    public function show(Food $food)
    {
        return FoodResponse::show($food);
    }

    public function edit(Food $food)
    {
        $this->authorize('update',$food);
        $categories=Category::all();
        return FoodResponse::edit($categories,$food);
    }

    public function update(FoodRequest $request, Food $food)
    {
        $this->authorize('update',$food);
        $eatery_id = $this->getEatery_id();
        $image_name=$food->image;
        $request->edit_image && $image_name=ImageManagement::update('food',$image_name,$request,'edit_image');
        Food::where('id',$food->id)
            ->update($request->except('_token','edit_image','_method')+['image'=>$image_name,'eatery_id'=>$eatery_id]);
        return FoodResponse::update();

    }

    public function destroy(Food $food)
    {
        ImageManagement::remove('eatery',$food->image);
        Food::where('id',$food->id)->delete();
        return FoodResponse::destroy();
    }

    public function getEatery_id()
    {
        $eatery_id = Eatery::where('seller_id', Auth::guard('seller')->user()->id)->select('id')->first()->id;
        return $eatery_id;
    }
}
