<?php


use Illuminate\Support\Facades\Route;

Route::post('logout', [\App\Http\Controllers\Seller\AuthenticatedSessionController::class,'destroy'])
    ->name('seller.logout');

Route::get('dashboard',\App\Http\Controllers\Seller\DashboardController::class)
    ->name('seller.dashboard');

Route::resource('eateries',\App\Http\Controllers\EateryController::class,['as' => 'seller','except' => [ 'show' ]]);

Route::resource('foods',\App\Http\Controllers\FoodController::class,['as'=>'seller']);

Route::resource('discounts',\App\Http\Controllers\DiscountController::class,['as'=>'seller']);

//invoices
Route::get('/invoices',[\App\Http\Controllers\InvoiceController::class,'index'])->name('seller.invoices.index');
Route::get('/invoices/{invoice}/edit',[\App\Http\Controllers\InvoiceController::class,'edit'])->name('seller.invoices.edit');
Route::put('/invoices/{invoice}',[\App\Http\Controllers\InvoiceController::class,'update'])->name('seller.invoices.update');
