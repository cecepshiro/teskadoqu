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
        $data = Produk::getDetailProduk();
        return view('admin.produk.list')
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
        return view('admin.produk.form_tambah')
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
        //Input gambar
        if($file=$request->file('file')){
            if($file->getClientOriginalExtension()=="PNG" or $file->getClientOriginalExtension()=="JPG" or $file->getClientOriginalExtension()=="JPEG"){
                $name=sha1($file->getClientOriginalName().time()).".".$file->getClientOriginalExtension();
                $file->move('gambar_produk',$name);
                $berkas=$name;
            }else{
                return redirect('admin/produk/index')
                ->with(['error' => 'File gambar tidak didukung']);
            }
		}

        $data = new Produk;
        $data->id_produk = $request->id_produk;
        $data->id_kategori = $request->id_kategori;
        $data->nama_produk =  $request->nama_produk;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->berat = $request->berat;
        $data->stok = $request->stok;
        $data->gambar = $berkas;
   		if($data->save()){
            return redirect('admin/produk/index')
            ->with(['success' => 'Produk berhasil ditambahkan']);
        }else{
            return redirect('admin/produk/index')
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
        $kategori = Kategori::get();
        return view('admin.produk.detail')
        ->with('data', $data)
        ->with('kategori', $kategori);
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
        return view('admin.produk.form_ubah')
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
        //Input gambar
        if($file=$request->file('file')){
            if($file->getClientOriginalExtension()=="PNG" or $file->getClientOriginalExtension()=="JPG" or $file->getClientOriginalExtension()=="JPEG"){
                $name=sha1($file->getClientOriginalName().time()).".".$file->getClientOriginalExtension();
                $file->move('gambar_produk',$name);
                $berkas=$name;
            }else{
                return redirect('admin/produk/index')
                ->with(['error' => 'File gambar tidak didukung']);
            }
        }

        if($request->file('file')==null){
            $data = Produk::where('id_produk', $id)->first();
            $data->id_kategori = $request->id_kategori;
            $data->nama_produk =  $request->nama_produk;
            $data->deskripsi = $request->deskripsi;
            $data->harga = $request->harga;
            $data->berat = $request->berat;
            $data->stok = $request->stok;
            // $data->gambar = $request->gambar;
            if($data->save()){
                return redirect('admin/produk/index')
                ->with(['success' => 'Produk berhasil diubah']);
            }else{
                return redirect('admin/produk/index')
                ->with(['error' => 'Produk gagal diubah']);
            }
        }else{
            $data = Produk::where('id_produk', $id)->first();
            $data->id_kategori = $request->id_kategori;
            $data->nama_produk =  $request->nama_produk;
            $data->deskripsi = $request->deskripsi;
            $data->harga = $request->harga;
            $data->berat = $request->berat;
            $data->stok = $request->stok;
            $data->gambar = $berkas;
            if($data->save()){
                return redirect('admin/produk/index')
                ->with(['success' => 'Produk berhasil diubah']);
            }else{
                return redirect('admin/produk/index')
                ->with(['error' => 'Produk gagal diubah']);
            }

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
        $data = Produk::find($id);
        if($data->delete()){
            return redirect('admin/produk/index')
            ->with(['success' => 'Produk berhasil dihapus']);
        }else{
            return redirect('admin/produk/index')
            ->with(['error' => 'Produk gagal dihapus']);
        }
    }
}
