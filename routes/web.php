<?php

use App\Events\SendResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*Route::get('/test',function (){
    dd(Auth::guard('web')->user());
});*/

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

require __DIR__.'/auth.php';
require __DIR__.'/gust.php';
require __DIR__.'/eatery.php';


