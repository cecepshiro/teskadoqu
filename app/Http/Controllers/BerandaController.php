<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class BerandaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    //Halaman index
    public function index()
    {
        $produk = Produk::get();
        return view('welcome')
        ->with('produk', $produk);
    }
}
