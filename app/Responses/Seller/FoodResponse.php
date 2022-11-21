<?php

namespace App\Responses\Seller;

class FoodResponse
{
    public function index($foods){
        return view('seller.food.index',compact('foods'));
    }

    public function create($categories,$discounts){
        return view('seller.food.create',compact('categories','discounts'));
    }

    public function store(){

        return redirect()->route('seller.foods.index');
    }

    public function edit($categories,$discounts,$food){
        return view('seller.food.edit',compact('categories','discounts','food'));
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
