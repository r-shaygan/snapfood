<?php

namespace App\Http\Controllers;

use App\GetData\DiscountData;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use App\Responses\Facades\DiscountResponse;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DiscountResponse::index(DiscountData::index());
    }

    public function create()
    {
        return DiscountResponse::create();
    }

    public function store(DiscountRequest $request)
    {
        Discount::create($request->except('_token')+['eatery_id'=>Auth::user()->eatery->id]);
        return DiscountResponse::store();
    }

    public function show(Discount $discount)
    {
        return DiscountResponse::show($discount);
    }

    public function edit(Discount $discount)
    {
        return DiscountResponse::edit($discount);
    }

    public function update(DiscountRequest $request, Discount $discount)
    {
        $discount->update($request->except('_token'));
        return DiscountResponse::update();
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return DiscountResponse::delete();
    }
}
