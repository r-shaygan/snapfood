<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class FoodResource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
        self::$wrap='Food';
    }

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
