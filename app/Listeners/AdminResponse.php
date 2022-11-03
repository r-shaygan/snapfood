<?php

namespace App\Listeners;

use App\Events\SendResponse;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class AdminResponse
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

    public function handle(SendResponse $event)
    {
        if(Str::is('admin/*',Route::getCurrentRoute()->uri()))
            return 'Admin';
    }
}
