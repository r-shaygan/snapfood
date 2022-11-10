<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin,seller,web')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');

    Route::get('admin/login', [\App\Http\Controllers\Admin\AuthenticatedSessionController::class, 'create'])
        ->name('admin.login');

    Route::post('admin/login', [\App\Http\Controllers\Admin\AuthenticatedSessionController::class, 'store']);

    Route::get('seller/login', [\App\Http\Controllers\Seller\AuthenticatedSessionController::class, 'create'])
        ->name('seller.login');

    Route::post('seller/login', [\App\Http\Controllers\Seller\AuthenticatedSessionController::class, 'store']);

    Route::get('seller/register', [\App\Http\Controllers\Seller\RegistereController::class, 'create'])
        ->name('seller.register');

    Route::post('seller/register', [\App\Http\Controllers\Seller\RegistereController::class, 'store']);


});
