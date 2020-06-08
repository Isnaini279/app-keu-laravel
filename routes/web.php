<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('list_kategori','KategoriController@getKategori');
Route::get('add_kategori','KategoriController@addKategori');
Route::post('store_kategori','KategoriController@storeKategori');
Route::get('edit_kategori/{id_kategori}','KategoriController@showEditKategori');
Route::put('store_edit_kategori/{id_kategori}','KategoriController@storeEdit');
Route::get('delete_kategori/{id_kategori}','KategoriController@deleteKategori');

Route::get('home','HomeController@getDataKeuangan');

Route::get('list_transaksi','TransaksiController@getTransaksi');
Route::get('add_transaksi','TransaksiController@addTransaksi');
Route::post('store_transaksi','TransaksiController@storeTransaksi');
Route::get('delete_transaksi/{id_transaksi}','TransaksiController@deleteTransaksi');
Route::get('edit_transaksi/{id_transaksi}','TransaksiController@showEditTransaksi');
Route::put('store_edit_transaksi/{id_transaksi}','TransaksiController@storeEditTransaksi');
Route::post('filter_trx','TransaksiController@filterTransaksi');