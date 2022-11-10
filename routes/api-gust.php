<?php
//authentication
Route::post('/register', [\App\Http\Controllers\user\AuthController::class, 'register']);//done
Route::post('/login', [\App\Http\Controllers\user\AuthController::class, 'login']);//done
