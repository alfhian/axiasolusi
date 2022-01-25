<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiDetailController;
use App\Http\Controllers\ReportTransaksiController;

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

Route::get('/',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'authenticate']);
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/main',[MainController::class,'index']);

Route::get('/supplier',[SupplierController::class,'index']);
Route::get('/supplier/tambah',[SupplierController::class,'tambah']);
Route::post('/supplier/store',[SupplierController::class,'store']);
Route::get('/supplier/edit/{id}',[SupplierController::class,'edit']);
Route::post('/supplier/update',[SupplierController::class,'update']);

Route::get('/barang',[BarangController::class,'index']);
Route::get('/barang/tambah',[BarangController::class,'tambah']);
Route::post('/barang/store',[BarangController::class,'store']);
Route::get('/barang/edit/{id}',[BarangController::class,'edit']);
Route::post('/barang/update',[BarangController::class,'update']);

Route::get('/transaksi',[TransaksiController::class,'index']);
Route::get('/transaksi/tambah',[TransaksiController::class,'tambah']);
Route::get('/transaksi/store',[TransaksiController::class,'store']);
Route::get('/transaksi/delete/{id}',[TransaksiController::class,'delete']);
Route::get('/transaksi/{id}/posting',[TransaksiController::class,'posting']);

Route::get('/transaksi_detail/{id}',[TransaksiDetailController::class,'index']);
Route::get('/transaksi_detail/{id}/tambah',[TransaksiDetailController::class,'tambah']);
Route::post('/transaksi_detail/store',[TransaksiDetailController::class,'store']);
Route::get('/transaksi_detail/edit/{id}/{id_barang}',[TransaksiDetailController::class,'edit']);
Route::post('/transaksi_detail/update',[TransaksiDetailController::class,'update']);
Route::get('/transaksi_detail/delete/{id}/{id_barang}',[TransaksiDetailController::class,'delete']);

Route::get('/report',[ReportTransaksiController::class,'index']);
Route::post('/report/view',[ReportTransaksiController::class,'view']);