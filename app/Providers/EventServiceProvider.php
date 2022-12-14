<?php

namespace App\Providers;

use App\Events\SendResponse;
use App\Listeners\AdminResponse;
use App\Listeners\HttpResponse;
use App\Listeners\JsonResponse;
use App\Listeners\SellerResponse;
use App\Models\Address;
use App\Observers\AddressObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendResponse::class => [
            SellerResponse::class,
            AdminResponse::class,
            JsonResponse::class,
            HttpResponse::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Address::observe(AddressObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
