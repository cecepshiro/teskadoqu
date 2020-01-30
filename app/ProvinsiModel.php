<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvinsiModel extends Model
{
    protected $table='provinsi';
    protected $primaryKey='id';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id','nama_provinsi',

    ];
}
