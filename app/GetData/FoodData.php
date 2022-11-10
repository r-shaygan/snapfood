<?php

namespace App\GetData;

use App\Models\Food;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class FoodData
{
    public static function index(){
        if(self::isSeller())
           return Auth::guard('seller')->user()->eatery->foods;
        return Food::all();
    }

    public static function show(Food $food){
        if(self::isSeller() && $food->eatery->seller_id !== Auth::guard('seller')->user()->id)
                throw new AuthorizationException();

        return $food;
    }

    public static function isSeller(): bool
    {
        return Str::is('seller/*', Route::getCurrentRoute()->uri());
    }
}
