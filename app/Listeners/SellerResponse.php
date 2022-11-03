<?php

namespace App\Listeners;

use App\Events\SendResponse;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class SellerResponse
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendResponse  $event
     * @return void
     */
    public function handle(SendResponse $event)
    {
        if(Str::is('seller/*',Route::getCurrentRoute()->uri()))
            return 'Seller';
    }
}
