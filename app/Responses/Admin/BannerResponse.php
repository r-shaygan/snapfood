<?php

namespace App\Responses\Admin;

class BannerResponse
{
    public function index($banners){
        return view('admin.banner.index',compact('banners'));
    }

    public function create(){
        return view('admin.banner.create');
    }

    public function store(){
       return redirect()->route('admin.banners.index');
    }

    public function edit($banner){
        return view('admin.banner.edit',compact('banner'));
    }

    public function update(){
        return redirect()->route('admin.banners.index');
    }

    public function show($banner){
        return view('admin.banner.show',compact('banner'));
    }

    public function destroy(){
        return redirect()->route('admin.banners.index');
    }
}
