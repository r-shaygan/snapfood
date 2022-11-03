<?php

use Illuminate\Support\Facades\Route;


Route::resource('banners', \App\Http\Controllers\BannerController::class,['as'=>'admin']);

Route::resource('eatery-types',\App\Http\Controllers\EateryTypeController::class,['as'=>'admin']);


Route::resource('categories',\App\Http\Controllers\CategoryController::class,['as'=>'admin']);


Route::post('logout', [\App\Http\Controllers\Admin\AuthenticatedSessionController::class,'destroy'])
    ->name('admin.logout');

Route::get('dashboard',\App\Http\Controllers\Admin\DashboardController::class)
->name('admin.dashboard');


