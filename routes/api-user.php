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
    Route::get('addresses/{address}/default',[\App\Http\Controllers\AddressController::class,'setDefault']);

    //cart
    Route::apiResource('/carts',\App\Http\Controllers\CartController::class);
    Route::post('/carts/{cart}/pay',[\App\Http\Controllers\CartController::class,'pay']);
    Route::patch('/carts/{cart}',[\App\Http\Controllers\CartController::class,'update']);

    //invoice
    Route::get('/invoices',[\App\Http\Controllers\InvoiceController::class,'index']);
    Route::get('/invoices/{invoice}',[\App\Http\Controllers\InvoiceController::class,'show']);

});
