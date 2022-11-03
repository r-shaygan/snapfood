<?php

namespace App\Http\Controllers\Seller;

use App\Events\SendResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('seller.login');
    }


    public function store(LoginRequest $request)
    {
//        dd(Auth::guard('seller')->check());
        $request->authenticate('seller');

        $request->session()->regenerate();

        return redirect('/seller/dashboard');
    }


    public function destroy(Request $request)
    {

        Auth::guard('seller')->logout();
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
