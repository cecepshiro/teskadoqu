<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table='kategori';
    protected $primaryKey='id_kategori';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_kategori','nama_kategori','created_at','updated_at',
    ];
}
