<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class FoodResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'image_url'=>URL::to(config('image.food').$this->image),
            'ingredients'=>$this->ingredients,
        ];
    }
}
