<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $table='pembeli';
    protected $primaryKey='id_pembeli';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_pembeli','user_id','tempat_lahir','tgl_lahir','jk','no_hp','alamat','created_at','updated_at',
    ];
}
