<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(protected Invoice $invoice,protected string $status_title)
    {
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Invoice Status Mail',
        );
    }

    public function content()
    {
        return (new Content(
            markdown: 'mails.invoice',
        ))->with(['invoice'=>$this->invoice,'status_title'=>$this->status_title]);
    }

    public function attachments()
    {
        return [];
    }
}
