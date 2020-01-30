<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KecamatanModel extends Model
{
    protected $table='kecamatan';
    protected $primaryKey='id';
    public $incrementing =false;
    public $timestamps=false; 
    protected $fillable = [
      'id','id_kabupaten','nama_kecamatan',

    ];
}
