<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table='petugas';
    protected $primaryKey='id_petugas';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_petugas','user_id','tempat_lahir','tgl_lahir','jk','no_hp','alamat','created_at','updated_at',
    ];

    
}
