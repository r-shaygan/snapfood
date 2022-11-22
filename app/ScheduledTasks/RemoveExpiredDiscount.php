<?php

namespace App\ScheduledTasks;

use App\Models\Discount;
use App\Models\Food;

class RemoveExpiredDiscount
{
    public function __invoke()
    {
        $expired = Discount::withoutGlobalScope('expired')
            ->where('end', '<', date('Y:m:d H:i'))
            ->get()
            ->pluck('id')
            ->toArray();
        Food::whereIn('discount_id', $expired)->update(['discount_id' => null]);
    }
}
