<?php

namespace App\Http\Controllers;

use App\FileManagement\Image;
use App\Http\Requests\EateryRequest;
use App\Models\Eatery;
use App\Models\EateryType;
use App\Models\Seller;
use App\Responses\Facades\EateryResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class EateryController extends Controller
{

    use AuthorizesRequests {
        authorize as protected baseAuthorize;
    }

    public function authorize($ability, $arguments = [])
    {
        if (Auth::guard('admin')->check())
            Auth::shouldUse('admin');
        elseif (Auth::guard('seller')->check())
            Auth::shouldUse('seller');
        $this->baseAuthorize($ability, $arguments);
    }

    public function index(Request $request)
    {
        $eateries = $this->filterEateries($request);
        return EateryResponse::index($eateries);
    }


    public function create()
    {
        $this->authorize('eatery-create');
        $eatery_types = EateryType::all();
        return EateryResponse::create($eatery_types);
    }

    public function store(EateryRequest $request)
    {
        $this->authorize('eatery-create');
        $image_name = Image::store('eatery', $request);
        Eatery::create($request->except('_token', 'image') + ['image' => $image_name, 'seller_id' => Auth::guard('seller')->user()->id]);
        Seller::where('id', Auth::guard('seller')->user()->id)->update(['is_verified' => 1]);
        return EateryResponse::store();
    }

    public function show(Eatery $eatery)
    {
        return EateryResponse::show($eatery);
    }

    public function foods(Eatery $eatery)
    {
        return EateryResponse::foods($eatery->categories);
    }

    public function edit(Eatery $eatery)
    {
        $this->authorize('eatery-update', $eatery);
        $eatery_types = EateryType::all();
        return EateryResponse::edit($eatery, $eatery_types);
    }

    public function update(EateryRequest $request, Eatery $eatery)
    {
        $this->authorize('eatery-update', $eatery);
        $image_name = $eatery->image;
        $request->edit_image && $image_name = Image::update('eatery', $image_name, $request, 'edit_image');
        $eatery->update($request->except('_token', 'edit_image', '_method') + ['image' => $image_name]);
        return EateryResponse::update();
    }

    public function destroy(Eatery $eatery)
    {
        $this->authorize('delete');
        $eatery->delete();
        Image::remove('eatery', $eatery->image);
        return EateryResponse::destroy();
    }

    public function filteredEatery($query1, $query2)
    {
        if ($query1 && $query2)
            return $query1->$query2->get();
        elseif ($query1)
            $eateries = $query1->get();
        elseif ($query2)
            $eateries = $query2->get();
        else
            $eateries = Eatery::all();
        return $eateries;
    }

    public function filterEateries(Request $request)
    {
        if ($request->exists('type') && $request->exists('is_open'))
            return Eatery::filterType($request->type)->filterIsOpen()->get();
        elseif ($request->exists('type'))
            return Eatery::filterType($request->type)->get();
        elseif ($request->exists('type'))
            return Eatery::filterIsOpen()->get();
        return Eatery::all();
    }
}
