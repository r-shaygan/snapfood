<?php

namespace App\Responses\Json;

use App\Http\Resources\FoodResource;

class FoodResponse
{
    public function index($food){
        return FoodResource::collection($food);
    }


}
