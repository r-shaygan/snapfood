<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Eatery;
use App\Models\Food;
use App\Policies\EateryPolicy;
use App\Policies\FoodPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
