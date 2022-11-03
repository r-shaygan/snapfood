<?php

use Illuminate\Support\Facades\Route;

Route::get('/eatery',[\App\Http\Controllers\EateryController::class,'index'])
    ->name('eatery.index');

Route::get('/eatery/{id}',[\App\Http\Controllers\EateryController::class,'show'])
    ->name('eatery.show');
