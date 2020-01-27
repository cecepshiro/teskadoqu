<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Petugas::get();
        return view('petugas.list')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Petugas;
        $data->id_petugas = $request->id_petugas;
        $data->user_id = $request->user_id;
        $data->tempat_lahir =  $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jk = $request->jk;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
   		if($data->save()){
            return redirect('/petugas/index')
            ->with(['success' => 'Petugas berhasil ditambahkan']);
        }else{
            return redirect('/petugas/index')
            ->with(['error' => 'Petugas gagal ditambahkan']);
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
        $data = Petugas::find($id);
        return view('petugas.detail')
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
        $data = Petugas::find($id);
        return view('petugas.form_ubah')
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
        $data = Petugas::where('id_petugas', $id)->first();
        $data->tempat_lahir =  $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jk = $request->jk;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
   		if($data->save()){
            return redirect('/petugas/index')
            ->with(['success' => 'Petugas berhasil diubah']);
        }else{
            return redirect('/petugas/index')
            ->with(['error' => 'Petugas gagal diubah']);
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
        $data = Petugas::find($id)->first();
        if($data->delete()){
            return redirect('/petugas/index')
            ->with(['success' => 'Petugas berhasil dihapus']);
        }else{
            return redirect('/petugas/index')
            ->with(['error' => 'Petugas gagal dihapus']);
        }
    }
}
