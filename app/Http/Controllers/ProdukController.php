<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::get();
        return view('produk.list')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::get();
        return view('produk.form_tambah')
        ->with('kategori', $kategori);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Produk;
        $data->id_produk = $request->id_produk;
        $data->id_kategori = $request->id_kategori;
        $data->nama_produk =  $request->nama_produk;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->berat = $request->berat;
        $data->gambar = $request->gambar;
   		if($data->save()){
            return redirect('/produk/index')
            ->with(['success' => 'Produk berhasil ditambahkan']);
        }else{
            return redirect('/produk/index')
            ->with(['error' => 'Produk gagal ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Produk::find($id);
        return view('produk.detail')
        ->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Produk::find($id);
        $kategori = Kategori::get();
        return view('produk.form_ubah')
        ->with('data', $data)
        ->with('kategori', $kategori);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Produk::where('id_produk', $id)->first();
        $data->id_kategori = $request->id_kategori;
        $data->nama_produk =  $request->nama_produk;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->berat = $request->berat;
        $data->gambar = $request->gambar;
   		if($data->save()){
            return redirect('/produk/index')
            ->with(['success' => 'Produk berhasil diubah']);
        }else{
            return redirect('/produk/index')
            ->with(['error' => 'Produk gagal diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produk::find($id)->first();
        if($data->delete()){
            return redirect('/produk/index')
            ->with(['success' => 'Produk berhasil dihapus']);
        }else{
            return redirect('/produk/index')
            ->with(['error' => 'Produk gagal dihapus']);
        }
    }
}
