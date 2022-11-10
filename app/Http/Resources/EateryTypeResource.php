<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EateryTypeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title
        ];
    }
}
