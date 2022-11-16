<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Address;
use App\Models\Eatery;
use App\Models\Food;
use App\Policies\AddressPolicy;
use App\Policies\EateryPolicy;
use App\Policies\FoodPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Eatery::class=>EateryPolicy::class,
        Food::class=>FoodPolicy::class,
        Address::class=>AddressPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('eatery-create',[EateryPolicy::class,'create']);
        Gate::define('food-create',[FoodPolicy::class,'create']);

        Gate::define('eatery-update',[EateryPolicy::class,'update']);
        Gate::define('food-update',[FoodPolicy::class,'update']);
    }
}
