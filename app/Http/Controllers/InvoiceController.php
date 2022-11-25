<?php

namespace App\Http\Controllers;

use App\GetData\InvoiceData;
use App\Jobs\SendInvoiceStatusMailJob;
use App\Models\Invoice;
use App\Models\InvoiceStatus;
use App\Responses\Facades\InvoiceResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{

    use AuthorizesRequests {
        authorize as protected baseAuthorize;
    }

    public function authorize($ability, $arguments = [])
    {
        if (Auth::guard('admin')->check())
            Auth::shouldUse('admin');
        elseif (Auth::guard('seller')->check())
            Auth::shouldUse('seller');
        $this->baseAuthorize($ability, $arguments);
    }


    public function index()
    {
        return InvoiceResponse::index(InvoiceData::getAll());
    }


    public function show(Invoice $invoice)
    {
        $this->authorize('isCostumerInvoice',$invoice);
        return InvoiceResponse::show($invoice);
    }

    public function edit(Invoice $invoice)
    {
        $this->authorize('isSellerInvoice',$invoice);
        return InvoiceResponse::edit($invoice,InvoiceStatus::all());
    }


    public function update(Request $request, Invoice $invoice)
    {
        $this->authorize('isSellerInvoice',$invoice);
        $request->status_id && $invoice->update(['status_id'=>$request->status_id]);
        SendInvoiceStatusMailJob::dispatch($invoice,InvoiceStatus::find($invoice->status_id));
        return InvoiceResponse::update();
    }


}
