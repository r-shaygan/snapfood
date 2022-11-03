<?php

namespace App\Responses\Seller;

class FoodResponse
{
    public function index($foods){
        return view('seller.food.index',compact('foods'));
    }

    public function create($categories){

        return view('seller.food.create',compact('categories'));
    }

    public function store(){

        return redirect()->route('seller.foods.index');
    }

    public function edit($categories,$food){
        return view('seller.food.edit',compact('categories','food'));
    }

    public function update(){
        return redirect()->route('seller.foods.index');
    }

    public function show($food){
        return view('seller.food.show',compact('food'));
    }

    public function destroy(){
        return redirect()->route('seller.foods.index');
    }

}
