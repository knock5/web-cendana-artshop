<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\menuController;
use App\Http\Controllers\admin\DasboardController;
use App\Http\Controllers\admin\ProdukController;
use App\Http\Controllers\user\cartController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/cart', [menuController::class, 'index']);
Route::middleware(['auth', 'admin'])->group( function () {
Route::get('/dashboard', [DasboardController::class, 'index']);
Route::get('/produk',[ProdukController::class, 'index']);
Route::get('/produk/tambah',[ProdukController::class, 'store']);
Route::post('/produk/store',[ProdukController::class, 'create']);
Route::get('/produk/edit/{id}',[ProdukController::class, 'edit']);
Route::post('/produk/update/{id}',[ProdukController::class, 'update']);
Route::get('/produk/delete/{id}',[ProdukController::class, 'delete']);
});
Route::middleware(['auth', 'user'])->group( function () {
    Route::get('/addCart/{id}',[cartController::class,'cart']);
    Route::get('/showCart',[cartController::class,'showCart']);
    Route::post('/editCart/{id}',[cartController::class,'editCart']);
   
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
