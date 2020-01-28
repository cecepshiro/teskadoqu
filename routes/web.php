<?php

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

Route::get('/', function () {
     return redirect('/beranda');
});

//Auth

//Beranda
Route::get('beranda', 'BerandaController@index');

//Dashboard Admin
Route::get('admin/dashboard/', 'DashboardController@index');


//Kategori
Route::get('kategori/index/', 'KategoriController@index');
Route::get('kategori/create/', 'KategoriController@create');
Route::post('kategori/store/', 'KategoriController@store');
Route::get('kategori/detail/{id}', 'KategoriController@show');
Route::get('kategori/edit/{id}', 'KategoriController@edit');
Route::post('kategori/update/{id}', 'KategoriController@update');
Route::get('kategori/destroy/{id}', 'KategoriController@destroy');

//Produk
Route::get('admin/produk/index/', 'ProdukController@index');
Route::get('admin/produk/create/', 'ProdukController@create');
Route::post('admin/produk/store/', 'ProdukController@store');
Route::get('admin/produk/detail/{id}', 'ProdukController@show');
Route::get('admin/produk/edit/{id}', 'ProdukController@edit');
Route::post('admin/produk/update/{id}', 'ProdukController@update');
Route::get('admin/produk/destroy/{id}', 'ProdukController@destroy');

//Petugas
Route::get('petugas/index/', 'PetugasController@index');
Route::get('petugas/create/', 'PetugasController@create');
Route::post('petugas/store/', 'PetugasController@store');
Route::get('petugas/detail/{id}', 'PetugasController@show');
Route::get('petugas/edit/{id}', 'PetugasController@edit');
Route::post('petugas/update/{id}', 'PetugasController@update');
Route::get('petugas/destroy/{id}', 'PetugasController@destroy');

//Pembeli
Route::get('pembeli/index/', 'PembeliController@index');
Route::get('pembeli/create/', 'PembeliController@create');
Route::post('pembeli/store/', 'PembeliController@store');
Route::get('pembeli/detail/{id}', 'PembeliController@show');
Route::get('pembeli/edit/{id}', 'PembeliController@edit');
Route::post('pembeli/update/{id}', 'PembeliController@update');
Route::get('pembeli/destroy/{id}', 'PembeliController@destroy');

//Transaksi
Route::get('transaksi/index/', 'TransaksiController@index');
Route::get('transaksi/create/', 'TransaksiController@create');
Route::post('transaksi/store/', 'TransaksiController@store');
Route::get('transaksi/detail/{id}', 'TransaksiController@show');
Route::get('transaksi/edit/{id}', 'TransaksiController@edit');
Route::post('transaksi/update/{id}', 'TransaksiController@update');
Route::get('transaksi/destroy/{id}', 'TransaksiController@destroy');

//Detail Transaksi
Route::get('detailtransaksi/index/', 'DetailTransaksiController@index');
Route::get('detailtransaksi/create/', 'DetailTransaksiController@create');
Route::post('detailtransaksi/store/', 'DetailTransaksiController@store');
Route::get('detailtransaksi/detail/{id}', 'DetailTransaksiController@show');
Route::get('detailtransaksi/edit/{id}', 'DetailTransaksiController@edit');
Route::post('detailtransaksi/update/{id}', 'DetailTransaksiController@update');
Route::get('detailtransaksi/destroy/{id}', 'DetailTransaksiController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
