<?php

namespace App\Responses\Seller;

class DiscountResponse
{
    public static function index($discounts)
    {
        return view('seller.discount.index', compact('discounts'));
    }

    public static function create()
    {
        return view('seller.discount.create');
    }

    public static function edit($discount)
    {
        return view('seller.discount.edit',compact('discount'));
    }

    public static function store()
    {
        return redirect()->route('seller.discounts.index');
    }

    public static function update()
    {
        return redirect()->route('seller.discounts.index');
    }

    public static function show($discount)
    {
        return view('seller.discount.show',compact('discount'));
    }

    public static function delete()
    {
        return redirect()->route('seller.discounts.index');
    }


}
