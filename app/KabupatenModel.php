<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KabupatenModel extends Model
{
    protected $table='kabupaten';
    protected $primaryKey='id';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id','id_provinsi','nama_kabupaten',

    ];
}
