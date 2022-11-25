<?php

namespace App\GetData;

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class InvoiceData
{
    public static function getAll()
    {
        if(request()->is('api/*'))
            return Auth::user()->invoices;
        return Auth::guard('seller')->user()->eatery->invoices()->where('status_id','<>',4)->get();
    }
}
