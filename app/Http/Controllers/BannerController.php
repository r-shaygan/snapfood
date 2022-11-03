<?php

namespace App\Http\Controllers;

use App\FileManagement\ImageManagement;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Responses\Facades\BannerResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use function view;

class BannerController extends Controller
{


    public function index()
    {
        $banner=Banner::orderby('created_at','desc')->get();
        return BannerResponse::index($banner);
    }

    public function create()
    {
        return BannerResponse::create();
    }

    public function store(BannerRequest $request)
    {
        $image_name=ImageManagement::store('banner',$request);
        Banner::create($request->except('_token','image')+['image'=>$image_name]);
        return BannerResponse::store();
    }

    public function show(Banner $banner)
    {
        return BannerResponse::show($banner);
    }

    public function edit(Banner $banner)
    {
        return BannerResponse::edit($banner);
    }

    public function update(BannerRequest $request,Banner $banner)
    {
        $image_name=$banner->image;
        $request->edit_image && $image_name=ImageManagement::update('banner',$image_name,$request,'edit_image');
        Banner::where('id',$banner->id)
            ->update($request->except('_token','edit_image','_method')+['image'=>$image_name]);
        return BannerResponse::update();
    }

    public function destroy(Banner $banner)
    {
        ImageManagement::remove('banner',$banner->image);
        Banner::where('id',$banner->id)->delete();
        return BannerResponse::destroy();
    }
}
