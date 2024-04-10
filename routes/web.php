<?php

use App\Livewire\Home;
use App\Livewire\ProductDetails;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', Home::class);
Route::get('/product/{productId}', ProductDetails::class)->name('product.details');
