<?php

namespace App\Http\Resources;

use App\Models\Eatery;
use Illuminate\Http\Resources\Json\JsonResource;

class EateryCategoryResource extends JsonResource
{

    public function toArray($request)
    {
        $allCategories=[];
        foreach ($this->categories as $category){
            $allCategories[]=[
                'id'=>$category->id,
                'title'=>$category->title,
                'foods'=>FoodResource::collection($this->filteredFoods($category->id))
            ];
        }
        return $allCategories;
    }
}
