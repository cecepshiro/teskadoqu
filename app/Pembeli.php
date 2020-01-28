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

    //Mengambil data detail pembeli
    public static function getDetailPembeli(){
      return $data = Pembeli::
      select('*')
      ->join('users','pembeli.user_id','=','users.id')
      ->where('users.level', 3)
      ->get();
    }

    //Mengambil data detail pembeli by id
    public static function getDetailPembeliById($id){
      return $data = Pembeli::
      select('*')
      ->join('users','pembeli.user_id','=','users.id')
      ->where('pembeli.id_pembeli', $id)
      ->first();
    }
}

