<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplierKategoriController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('index');
    });
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/supplier', SupplierController::class);
    Route::resource('/produk', ProdukController::class);
    Route::get('/get-kategori', [SupplierKategoriController::class, 'getKategori']);
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
