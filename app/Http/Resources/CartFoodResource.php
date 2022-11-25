<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartFoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'food_id'=>$this->id,
            'food_title'=>$this->title,
            'food_cost'=>$this->cost,
            'discount_percent'=>$this->discount ? $this->discount->percent : 0,
            'food_count'=>$this->pivot->count
        ];
    }
}
