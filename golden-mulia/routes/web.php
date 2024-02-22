<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::controller(PenggunaController::class)->group(function() {
    Route::prefix('pengguna')->group(function(){
        Route::get('/', 'index')->name('pengguna');
        Route::get('/add', 'create')->name('addPengguna');
        Route::post('/store', 'store')->name('storePengguna');
        Route::get('/edit/{id}', 'edit')->name('editPengguna');
        Route::post('/update/{id}', 'update')->name('updatePengguna');
        Route::delete('/delete/{id}', 'destroy')->name('hapusPengguna');
    });
});

Route::controller(ProdukController::class)->group(function() {
    Route::prefix('produk')->group(function(){
        Route::get('/', 'index')->name('produk');
        Route::get('/add', 'create')->name('addProduk');
        Route::post('/store', 'store')->name('storeProduk');
        Route::get('/edit/{id}', 'edit')->name('editProduk');
        Route::post('/update/{id}', 'update')->name('updateProduk');
        Route::delete('/delete/{id}', 'destroy')->name('hapusProduk');
    });
});

Route::controller(TransaksiController::class)->group(function() {
    Route::prefix('transaksi')->group(function(){
        Route::get('/', 'index')->name('transaksi');
        Route::get('/add', 'create')->name('addTransaksi');
        Route::post('/store', 'store')->name('storeTransaksi');
        Route::get('/edit/{id}', 'edit')->name('editTransaksi');
        Route::post('/update/{id}', 'update')->name('updateTransaksi');
        Route::delete('/delete/{id}', 'destroy')->name('hapusTransaksi');
    });
});
