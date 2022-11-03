<?php

namespace App\Responses\Admin;

class CategoryResponse
{
    public function index($categories){
        return view('admin.category.index',compact('categories'));
    }

    public function create($eatery_types){
        return view('admin.category.create',compact('eatery_types'));
    }

    public function store(){
       return redirect()->route('admin.categories.index');
    }

    public function edit($category,$eatery_types){
        return view('admin.category.edit',compact('category','eatery_types'));
    }

    public function update(){
        return redirect()->route('admin.categories.index');
    }

    public function show($category){
        return view('admin.category.show',compact('category'));
    }

    public function destroy(){
        return redirect()->route('admin.categories.index');
    }
}
