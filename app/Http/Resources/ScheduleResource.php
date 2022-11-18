<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            $this->day=>[
                'opening_time'=>$this->open,
                'closing_time'=>$this->close,
            ]
        ];
    }
}
