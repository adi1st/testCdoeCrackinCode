<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resource('/kategori', KategoriController::class);
Route::resource('/supplier', SupplierController::class);
