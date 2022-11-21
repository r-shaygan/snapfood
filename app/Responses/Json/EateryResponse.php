<?php

namespace App\Responses\Json;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\EateryCategoryResource;
use App\Http\Resources\EateryResource;

class EateryResponse
{
    public function index($eateries)
    {
        return EateryResource::collection($eateries);
    }
    public function show($eatery)
    {
        return EateryResource::make($eatery);
    }
    public function foods($eatery)
    {
        return ['Categories'=>EateryCategoryResource::make($eatery)];
    }

}
