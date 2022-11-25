<?php

namespace App\Responses\Seller;

class InvoiceResponse
{
    public function index($invoices)
    {
        return view('seller.dashboard',compact('invoices'));
    }

    public function edit($invoice,$statuses)
    {
        return view('seller.invoice.edit',compact('invoice','statuses'));
    }

    public function update()
    {
        return redirect()->to(route('seller.invoices.index'));
    }
}
