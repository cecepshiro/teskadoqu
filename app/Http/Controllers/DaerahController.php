<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProvinsiModel;
use App\KabupatenModel;
use App\KecamatanModel;

class DaerahController extends Controller
{
    
    //memunculkan data provinsi
    public function selectProvinsi($name)
    {
        $provinsi = ProvinsiModel::get();
        return $provinsi;
    }

    //memunculkan data kabupaten by id provinsi
    public function selectKabupaten($id)
    {
        // $id = $request->get('id_provinsi');
        $kabupaten = KabupatenModel::where('id_provinsi',$id)->get();       
        return $kabupaten;
    }

    //memunculkan data kecamatan by id kabupaten
    public function selectKecamatan($id)
    {
        // $id = $request->get('id_kabupaten');
        $kecamatan = KecamatanModel::where('id_kabupaten',$id)->get();
        return $kecamatan;
    }
}
