<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table='produk';
    protected $primaryKey='id_produk';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_produk','id_kategori','nama_produk','deskripsi','harga','berat','stok','gambar','created_at','updated_at',
    ];

    //Mengambil data detail produk
    public static function getDetailProduk(){
      return $data = Produk::
      select('*')
      ->join('kategori','produk.id_kategori','=','kategori.id_kategori')
      ->get();
    }

    //Mengambil data hasil pencarian produk
    public static function searchProduct($data){
      return $data = Produk::
      select('*')
      // ->join('kategori','produk.id_kategori','=','kategori.id_kategori')
      ->orWhere('produk.nama_produk','LIKE','%'.$data.'%')
      ->simplePaginate(9);
    }
}
