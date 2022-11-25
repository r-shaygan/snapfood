<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'total_cost'=>$this->cost,
            'order_status'=>$this->status->title,
            'eatery'=>[
                'id'=>$this->eatery_id,
                'title'=>$this->eatery->name
            ],
            'foods'=>CartFoodResource::collection($this->foods)
        ];
    }
}
