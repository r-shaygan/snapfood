<?php

namespace App\Responses\Admin;

class EateryTypeResponse
{
    public function index($eatery_types){
        return view('admin.eatery-type.index',compact('eatery_types'));
    }

    public function create(){
        return view('admin.eatery-type.create');
    }

    public function store(){
        return redirect()->route('admin.eatery-types.index');
    }

    public function edit($eatery_type){
        return view('admin.eatery-type.edit',compact('eatery_type'));
    }

    public function update(){
        return redirect()->route('admin.eatery-types.index');
    }

    public function show($eatery_type){
        return view('admin.eatery-type.show',compact('eatery_type'));
    }

    public function destroy(){
        return redirect()->route('admin.eatery-types.index');
    }
}
