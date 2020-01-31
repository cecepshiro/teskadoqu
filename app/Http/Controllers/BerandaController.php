<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\SubKategori;
use Illuminate\Support\Facades\Input;

class BerandaController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth']);
    }

    //Halaman index
    public function index()
    {
        $produk = Produk::get();
        $kategori = Kategori::get();
        return view('welcome')
        ->with('produk', $produk)
        ->with('kategori', $kategori);
    }

    //Halaman list kategori
    public function detail_kategori($id)
    {
        $produk = Produk::where('id_kategori', $id)->get();
        $kategori = Kategori::get();
        return view('list_produk')
        ->with('produk', $produk)
        ->with('kategori', $kategori);
    }

    //Halaman list semua kategori
    public function all_kategori()
    {
        $produk = Produk::get();
        $kategori = Kategori::get();
        return view('list_kategori')
        ->with('produk', $produk)
        ->with('kategori', $kategori);
    }

    //Halaman list detail produk
    public function detail_produk($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::get();
        return view('detail_produk')
        ->with('produk', $produk)
        ->with('kategori', $kategori);
    }

    //Halaman list semua produk
    public function all_produk()
    {
        $produk = Produk::get();
        $kategori = Kategori::get();
        return view('list_produk')
        ->with('produk', $produk)
        ->with('kategori', $kategori);
    }

    //Halaman pencarian
    public function cari()
    {
        //deklarasi
        $result_kategori = [];
        $result_sub = [];
        $tmp_id = [];
        $result = [];
        $result2 = [];
        $result3 = [];
        $tmp = [];
        $searching = [];
        $result_true = false;
        //Split keyword untuk dicari perkata
        $keyword = Input::get('cari');
        $strArray = explode(" ", $keyword);
        //mencari keyword di kategori
        $tmp_produk = Produk::where('nama_produk','like', $keyword.'%')->get();
        if(count($tmp_produk) < 1){
            $kategori = Kategori::where('nama_kategori','like', $keyword.'%')->get();
            if(count($kategori) > 0){
                $status = true;
            }else{
                $status = false;
            }

            if($status == true){;
                foreach($kategori as $key => $row){
                        $tmp_id[$key] = $row->id_kategori;
                }
                $produk = Produk::where('id_kategori', $tmp_id[0])->get();
                return view('list_produk')
                ->with('produk', $produk);
            }else{
                $subkategori = SubKategori::where('sub_kategori','like', $keyword.'%')->get();
                if(count($subkategori) > 0){
                    foreach($subkategori as $key => $row){
                        $tmp_id[$key] = $row->id_kategori;
                    }
                    for($i = 0; $i < count($tmp_id); $i++){
                        $result[$i] = Produk::where('id_kategori', $tmp_id[$i])->get();
                        //  $produk;
                    }
                $result2 = $result;
                }else{
                    $status = false;
                }
                $result3 = $result2;
                return view('list_produk')
                ->with('produk', $result3[0]);
            }
        }else{
            return view('list_produk')
            ->with('produk', $tmp_produk);
        }
      
        
    }
}

// 000000001010