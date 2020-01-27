<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table='transaksi';
    protected $primaryKey='id_transaksi';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_transaksi','id_pembeli','penerima','provinsi','kabupaten','kecamatan','alamat','kode_pos','no_hp_penerima','total_harga','status','created_at','updated_at',
    ];
}
