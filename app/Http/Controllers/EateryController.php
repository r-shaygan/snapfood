<?php

namespace App\Http\Controllers;

use App\FileManagement\Image;
use App\Http\Requests\EateryRequest;
use App\Models\Eatery;
use App\Models\EateryType;
use App\Models\Seller;
use App\Models\WorkTime;
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
        $eateries = Eatery::filter($request->query())->get();
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
        DB::beginTransaction();
        $eatery = $this->storeWithImage($request);
        $this->insertWorkingTime($request->input('work'),$eatery->id);
        $this->varifySeller();
        DB::commit();
        return EateryResponse::store();
    }

    public function show(Eatery $eatery)
    {
        return EateryResponse::show($eatery);
    }

    public function foods(Eatery $eatery)
    {
        return EateryResponse::foods($eatery);
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

    private function insertWorkingTime(array $input,int $eatery_id)
    {
        $records=[];
        foreach ($input as $day=>$times){
            $records[]=[
                'day'=>$day,
                'open'=>$times['open'],
                'close'=>$times['close'],
                'eatery_id'=>$eatery_id
            ];
        }
        WorkTime::insert($records);
    }

    public function varifySeller(): void
    {
        Seller::where('id', Auth::guard('seller')->user()->id)->update(['is_verified' => 1]);
    }

    public function storeWithImage(EateryRequest $request)
    {
        $image_name = Image::store('eatery', $request);
        $eatery = Eatery::create($request->except('_token', 'image', 'work') + ['image' => $image_name, 'seller_id' => Auth::guard('seller')->user()->id]);
        return $eatery;
    }
}
