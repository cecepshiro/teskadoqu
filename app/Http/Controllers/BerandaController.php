<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;

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
        return view('detail_kategori')
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
    public function search_produk(Request $request)
    {
        $produk = Produk::searchProduct($request->cari);
        $produk->appends($request->only('cari'));
        $kategori = Kategori::get();
        return view('list_produk')
        ->with('produk', $produk)
        ->with('kategori', $kategori);
        
    }
}
