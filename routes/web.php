<?php

use App\Http\Controllers\dataBulananControllers;
use App\Http\Controllers\dataDetergenController;
use App\Http\Controllers\dataPelangganController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\transaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[loginController::class,'index'])->middleware('guest');
Route::get('/home',function(){
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
});
Route::post('/login',[loginController::class,'authenticate']);
Route::post('/logout',[loginController::class,'logout']);

Route::resource('/transaksi', transaksiController::class)->middleware('auth');
Route::post('/transaksi/pengambilan', [transaksiController::class,'pengambilan'])->middleware('auth');
Route::post('/transaksi/pembayaran',[transaksiController::class,'pembayaran'])->middleware('auth');
Route::post('/transaksi/sudahDicuci/{id}',[transaksiController::class,'sudahDicuci'])->middleware('auth');
Route::post('/transaksi/sudahDiambil/{id}',[transaksiController::class,'sudahDiambil'])->middleware('auth');

Route::resource('/dataUser', (UserController::class))->middleware('admin');
Route::get('/destroy/{id}',[UserController::class,'destroy']);

Route::resource('/dataPesanan', (dataPelangganController::class))->middleware('admin');
Route::post('/dataPelanggan/search', [dataPelangganController::class,'search'])->middleware('admin');

Route::resource('/dataDetergen', (dataDetergenController::class))->middleware('admin');
Route::post('/dataDetergen/search', [dataDetergenController::class,'search'])->middleware('admin');

Route::resource('/dataBulanan', (dataBulananControllers::class))->middleware('admin');


