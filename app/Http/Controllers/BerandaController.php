<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class BerandaController extends Controller
{

    //Halaman index
    public function index()
    {
        $produk = Produk::get();
        return view('welcome')
        ->with('produk', $produk);
    }
}
