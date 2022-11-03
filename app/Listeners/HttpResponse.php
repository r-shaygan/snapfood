<?php

namespace App\Listeners;

use App\Events\SendResponse;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HttpResponse
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendResponse  $event
     * @return void
     */
    public function handle(SendResponse $event)
    {
        return 'Http';
    }
}
