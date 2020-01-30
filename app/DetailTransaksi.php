<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table='detailtransaksi';
    protected $primaryKey='id_detail_transaksi';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_detail_transaksi','id_transaksi','id_produk','qty','subtotal','created_at','updated_at',
    ];
}
