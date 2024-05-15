<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
Route::get('produk/', function () {
    return view('index');
});

Route::resource('produk', ProdukController::class);