<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'address'=>$this->address_text,
            'longitud'=>$this->address_long,
            'latitud'=>$this->address_lat,
        ];
    }
}
