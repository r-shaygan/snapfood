<?php

namespace App\Http\Controllers;

use App\Http\Requests\EateryRequest;
use App\Http\Requests\EateryTypeRequest;
use App\Models\EateryType;
use App\Responses\Facades\EateryTypeResponse;
use Illuminate\Http\Request;

class EateryTypeController extends Controller
{

    public function index()
    {
        $eatery_type=EateryType::orderby('created_at','desc')->get();
        return EateryTypeResponse::index($eatery_type);
    }

    public function create()
    {
        return EateryTypeResponse::create();
    }

    public function store(EateryTypeRequest $request)
    {
        EateryType::create($request->except('_token'));
        return EateryTypeResponse::store();
    }

    public function show($id)
    {
        $eatery_type=EateryType::find($id);
        return EateryTypeResponse::show($eatery_type);
    }

    public function edit($id)
    {
        $eatery_type=EateryType::find($id);
        return EateryTypeResponse::edit($eatery_type);
    }

    public function update(EateryTypeRequest $request, $id)
    {
        EateryType::where('id',$id)->update($request->except('_token','_method'));
        return EateryTypeResponse::update();
    }

    public function destroy($id)
    {
        $eatery_type=EateryType::find($id);
        EateryType::where('id',$id)->delete();
        return EateryTypeResponse::destroy($eatery_type);
    }
}
