<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    protected $table='sub_kategori';
    protected $primaryKey='id_sub_kategori';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_sub_kategori','id_kategori','sub_kategori','created_at','updated_at',
    ];
}
