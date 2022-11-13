<?php

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [\App\Http\Controllers\user\AuthController::class, 'logout']);

    //foods
    Route::get('/eateries/{eatery}/foods', [\App\Http\Controllers\EateryController::class, 'foods']);

    //eatery
    Route::get('/eateries/{eatery}/show', [\App\Http\Controllers\EateryController::class, 'show']);
    Route::get('eateries', [\App\Http\Controllers\EateryController::class, 'index']);

    //address
    Route::apiResource('addresses', \App\Http\Controllers\AddressController::class,['except'=>'show']);
    Route::get('addresses/{id}/default',[\App\Http\Controllers\AddressController::class,'setDefault']);

});
