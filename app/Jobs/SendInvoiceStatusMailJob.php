<?php

namespace App\Jobs;

use App\Mail\InvoiceStatusMail;
use App\Models\Invoice;
use App\Models\InvoiceStatus;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendInvoiceStatusMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $reciever;
    protected $status_title;
    public $tries=3;
    public $backoff=[3,5,8];

    public function __construct(protected Invoice $invoice,protected  InvoiceStatus $invoiceStatus)
    {
        $this->status_title=$this->invoiceStatus->title;
        $this->reciever=$this->invoice->user->email;
    }

    public function handle()
    {
        Mail::to($this->reciever)->send(new InvoiceStatusMail($this->invoice,$this->status_title));
    }
}
