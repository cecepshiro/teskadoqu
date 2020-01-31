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
Route::get('beranda/kategori/{id}', 'BerandaController@detail_kategori');
Route::get('beranda/kategori', 'BerandaController@all_kategori');
Route::get('beranda/produk/{id}', 'BerandaController@detail_produk');
Route::get('beranda/produk', 'BerandaController@all_produk');
Route::get('beranda/search', 'BerandaController@search_produk');


//Dashboard Admin
Route::get('admin/dashboard/', 'DashboardController@index');


//Kategori
Route::get('admin/kategori/index/', 'KategoriController@index');
Route::get('admin/kategori/create/', 'KategoriController@create');
Route::get('admin/kategori/create_sub/', 'KategoriController@create_sub');
Route::post('admin/kategori/store/', 'KategoriController@store');
Route::post('admin/kategori/store_sub/', 'KategoriController@store_sub');
Route::get('admin/kategori/detail/{id}', 'KategoriController@show');
Route::get('admin/kategori/detail_sub/{id}', 'KategoriController@show_sub');
Route::get('admin/kategori/edit/{id}', 'KategoriController@edit');
Route::get('admin/kategori/edit_sub/{id}', 'KategoriController@edit_sub');
Route::post('admin/kategori/update/{id}', 'KategoriController@update');
Route::post('admin/kategori/update_sub/{id}', 'KategoriController@update_sub');
Route::get('admin/kategori/destroy/{id}', 'KategoriController@destroy');
Route::get('admin/kategori/destroy_sub/{id}', 'KategoriController@destroy_sub');

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
Route::get('admin/transaksi/index/', 'TransaksiController@index');
Route::get('admin/transaksi/create/', 'TransaksiController@create');
Route::post('beranda/transaksi/store/', 'TransaksiController@store');
Route::get('admin/transaksi/detail/{id}', 'TransaksiController@show');
Route::get('admin/transaksi/edit/{id}', 'TransaksiController@edit');
Route::post('beranda/transaksi/update', 'TransaksiController@update');
Route::get('beranda/transaksi/destroy/{id}', 'TransaksiController@destroy');
Route::get('beranda/transaksi/qty/', 'TransaksiController@getQty');
Route::get('beranda/transaksi/checkout/', 'TransaksiController@checkout');
Route::get('beranda/transaksi/detailcheckout/{id}', 'TransaksiController@detailcheckout');
Route::get('beranda/transaksi/payment/{id}', 'TransaksiController@payment');
Route::post('beranda/transaksi/alamat/{id}', 'TransaksiController@alamat');
Route::get('beranda/transaksi/list', 'TransaksiController@list_transaksi');
Route::post('beranda/transaksi/updatestok', 'TransaksiController@updatestok');
Route::get('beranda/transaksi/bukti/{id}', 'TransaksiController@bukti');
Route::post('beranda/transaksi/bukti_simpan/{id}', 'TransaksiController@bukti_simpan');
Route::post('beranda/transaksi/updateekspedisi', 'TransaksiController@updateekspedisi');
Route::get('admin/transaksi/paid', 'TransaksiController@paid');
Route::get('admin/transaksi/pending', 'TransaksiController@pending');
Route::get('admin/transaksi/shipped', 'TransaksiController@shipped');
Route::get('admin/transaksi/done', 'TransaksiController@done');
Route::get('admin/transaksi/kirim/{id}', 'TransaksiController@kirim');
Route::post('admin/transaksi/resi/{id}', 'TransaksiController@resi');
Route::get('beranda/transaksi/terima/{id}', 'TransaksiController@terima');
Route::get('admin/transaksi/download/{id}', 'TransaksiController@download');

//Detail Transaksi
Route::get('detailtransaksi/index/', 'DetailTransaksiController@index');
Route::get('detailtransaksi/create/', 'DetailTransaksiController@create');
Route::post('detailtransaksi/store/', 'DetailTransaksiController@store');
Route::get('detailtransaksi/detail/{id}', 'DetailTransaksiController@show');
Route::get('detailtransaksi/edit/{id}', 'DetailTransaksiController@edit');
Route::post('detailtransaksi/update/{id}', 'DetailTransaksiController@update');
Route::get('detailtransaksi/destroy/{id}', 'DetailTransaksiController@destroy');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//Daerah
Route::get('beranda/daerah/provinsi', 'DaerahController@selectProvinsi');
Route::get('beranda/daerah/kabupaten/{id}', 'DaerahController@selectKabupaten');
Route::get('beranda/daerah/kecamatan/{id}', 'DaerahController@selectKecamatan');