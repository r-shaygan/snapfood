<?php

namespace App\Responses\Seller;

class EateryResponse
{
    public function index($data){

    }

    public function create($eatery_types){

        return view('seller.eatery.create',compact('eatery_types'));
    }

    public function store(){

        return redirect()->route('seller.dashboard');
    }

    public function edit($eatery,$eatery_types){
        return view('seller.eatery.edit',compact('eatery','eatery_types'));
    }

    public function update(){
        return redirect()->route('seller.dashboard');
    }

    public function show($category){

    }

}
