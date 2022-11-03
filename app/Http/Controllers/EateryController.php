<?php

namespace App\Http\Controllers;

use App\FileManagement\ImageManagement;
use App\Http\Requests\EateryRequest;
use App\Models\Eatery;
use App\Models\EateryType;
use App\Models\Seller;
use App\Responses\Facades\EateryResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EateryController extends Controller
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


    public function create()
    {
        $this->authorize('create');
        $eatery_types=EateryType::all();
        return EateryResponse::create($eatery_types);
    }

    public function store(EateryRequest $request)
    {
        $this->authorize('create');
        $image_name=ImageManagement::store('eatery',$request);
        Eatery::create($request->except('_token','image')+['image'=>$image_name,'seller_id'=>Auth::guard('seller')->user()->id]);
        Seller::where('id',Auth::guard('seller')->user()->id)->update(['is_verified'=>1]);
        return EateryResponse::store();
    }

    public function show($id)
    {

    }

    public function edit(Eatery $eatery)
    {
        $this->authorize('update',$eatery);
        $eatery_types=EateryType::all();
        return EateryResponse::edit($eatery,$eatery_types);
    }

    public function update(EateryRequest $request,Eatery $eatery)
    {
        $this->authorize('update',$eatery);
        $image_name=$eatery->image;
        $request->edit_image && $image_name=ImageManagement::update('eatery',$image_name,$request,'edit_image');
        Eatery::where('id',$eatery->id)
            ->update($request->except('_token','edit_image','_method')+['image'=>$image_name]);
        return EateryResponse::update();
    }

    public function destroy(Eatery $eatery)
    {
        $this->authorize('delete');
        ImageManagement::remove('eatery',$eatery->image);
        Eatery::where('id',$eatery->id)->delete();
        return EateryResponse::destroy();
    }
}
