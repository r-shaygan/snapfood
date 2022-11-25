<?php

namespace App\Policies;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class InvoicePolicy
{

    public function isSellerInvoice($user, Invoice $invoice)
    {
        return $user->id === $invoice->eatery->seller->id;
    }

    public function isCostumerInvoice($user, Invoice $invoice)
    {
        return $user->id === $invoice->user_id;
    }
}
