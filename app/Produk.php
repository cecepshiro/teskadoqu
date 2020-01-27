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
      'id_produk','id_kategori','nama_produk','deskripsi','harga','berat','gambar','created_at','updated_at',
    ];
}
