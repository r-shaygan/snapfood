<?php

namespace App\GetData;

use App\Models\Discount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class DiscountData
{
    public static function index()
    {
        if(self::isSeller())
            return Auth::guard('seller')->user()->eatery->discounts;
        Discount::all();
    }

    public static function isSeller(): bool
    {
        return Str::is('seller/*', Route::getCurrentRoute()->uri());
    }
}
