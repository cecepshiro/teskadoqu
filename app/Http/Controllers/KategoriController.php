<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::get();
        return view('admin.kategori.list')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Kategori;
        $data->nama_kategori =  $request->nama_kategori;
        // $data->parent =  $request->parent;
   		if($data->save()){
            return redirect('admin/kategori/index')
            ->with(['success' => 'Kategori berhasil ditambahkan']);
        }else{
            return redirect('/kategori/index')
            ->with(['error' => 'Kategori gagal ditambahkan']);
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
        $data = Kategori::find($id);
        return view('admin.kategori.detail')
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
        $data = Kategori::find($id);
        return view('admin.kategori.form_ubah')
        ->with('data', $data);
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
        $data = Kategori::where('id_kategori', $id)->first();
        $data->nama_kategori =  $request->nama_kategori;
        // $data->parent =  $request->parent;
   		if($data->save()){
            return redirect('admin/kategori/index')
            ->with(['success' => 'Kategori berhasil diubah']);
        }else{
            return redirect('admin/kategori/index')
            ->with(['error' => 'Kategori gagal diubah']);
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
        $data = Kategori::find($id);
        if($data->delete()){
            return redirect('admin/kategori/index')
            ->with(['success' => 'Kategori berhasil dihapus']);
        }else{
            return redirect('admin/kategori/index')
            ->with(['error' => 'Kategori gagal dihapus']);
        }
    }
}
