<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class EateryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'address'=>[
                'address'=>$this->address_text,
                'longtitud'=>$this->address_long,
                'latitud'=>$this->address_lat
            ],
            'phone'=>$this->phone,
            'delivery_cost'=>$this->deliveryCost,
            'image'=>URL::to(config('eatery').$this->image),
            'type'=>EateryTypeResource::make($this->eateryType)
        ];
    }
}
