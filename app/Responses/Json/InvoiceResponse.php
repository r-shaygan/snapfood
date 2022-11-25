<?php

namespace App\Responses\Json;

use App\Http\Resources\InvoiceResource;

class InvoiceResponse
{
    public function index($invoices)
    {
        return !$invoices->isEmpty() ? InvoiceResource::collection($invoices) : ['message'=>'You have not had any invoice yet!'];
    }

    public function show($invoice)
    {
        return InvoiceResource::make($invoice);
    }
}
