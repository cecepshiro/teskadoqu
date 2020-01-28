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
Route::get('admin/kategori/index/', 'KategoriController@index');
Route::get('admin/kategori/create/', 'KategoriController@create');
Route::post('admin/kategori/store/', 'KategoriController@store');
Route::get('admin/kategori/detail/{id}', 'KategoriController@show');
Route::get('admin/kategori/edit/{id}', 'KategoriController@edit');
Route::post('admin/kategori/update/{id}', 'KategoriController@update');
Route::get('admin/kategori/destroy/{id}', 'KategoriController@destroy');

//Produk
Route::get('admin/produk/index/', 'ProdukController@index');
Route::get('admin/produk/create/', 'ProdukController@create');
Route::post('admin/produk/store/', 'ProdukController@store');
Route::get('admin/produk/detail/{id}', 'ProdukController@show');
Route::get('admin/produk/edit/{id}', 'ProdukController@edit');
Route::post('admin/produk/update/{id}', 'ProdukController@update');
Route::get('admin/produk/destroy/{id}', 'ProdukController@destroy');

//Petugas
Route::get('admin/petugas/index/', 'PetugasController@index');
Route::get('admin/petugas/create/', 'PetugasController@create');
Route::post('admin/petugas/store/', 'PetugasController@store');
Route::get('admin/petugas/detail/{id}', 'PetugasController@show');
Route::get('admin/petugas/edit/{id}', 'PetugasController@edit');
Route::post('admin/petugas/update/{id}', 'PetugasController@update');
Route::get('admin/petugas/destroy/{id}', 'PetugasController@destroy');

//Pembeli
Route::get('admin/pembeli/index/', 'PembeliController@index');
Route::get('admin/pembeli/create/', 'PembeliController@create');
Route::post('admin/pembeli/store/', 'PembeliController@store');
Route::get('admin/pembeli/detail/{id}', 'PembeliController@show');
Route::get('admin/pembeli/edit/{id}', 'PembeliController@edit');
Route::post('admin/pembeli/update/{id}', 'PembeliController@update');
Route::get('admin/pembeli/destroy/{id}', 'PembeliController@destroy');

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
