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
        $categories=Category::orderby('created_at','desc')->get();
        return CategoryResponse::index($categories);
    }

    public function create()
    {
        $eatery_types=EateryType::all();
        return CategoryResponse::create($eatery_types);
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

    public function edit($id)
    {
        $eatery_types=EateryType::all();
        $category=Category::find($id);
        return CategoryResponse::edit($category,$eatery_types);
    }

    public function update(Request $request, $id)
    {
         Category::where('id',$id)->update($request->except('_token','_method'));
        return CategoryResponse::update();
    }

    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return CategoryResponse::destroy();
    }
}
