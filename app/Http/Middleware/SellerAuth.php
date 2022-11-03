<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class SellerAuth extends Middleware
{
    public function handle($request, \Closure $next, ...$guards)
    {
        $guards=['seller'];

        $this->authenticate($request, $guards);

        return $next($request);
    }


    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('seller.login');
        }
    }
}
