<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'eatery'=>[
                'id'=>$this->eatery_id,
                'title'=>$this->eatery->name
                ],
            'foods'=>CartFoodResource::collection($this->foods)
        ];
    }

}
