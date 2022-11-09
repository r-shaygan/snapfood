<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\EateryType;
use App\Responses\Facades\CategoryResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return CategoryResponse::index(Category::orderby('created_at','desc')->get());
    }

    public function create()
    {
        return CategoryResponse::create(EateryType::all());
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->except('_token'));
        return CategoryResponse::store();
    }

    public function show(Category $category)
    {
        return CategoryResponse::show($category);
    }

    public function edit(Category $category)
    {
        return CategoryResponse::edit($category, EateryType::all());
    }

    public function update(Request $request, Category $category)
    {
         $category->update($request->except('_token','_method'));
        return CategoryResponse::update();
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return CategoryResponse::destroy();
    }
}
