<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembeli;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pembeli::get();
        return view('pembeli.list')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembeli.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pembeli;
        $data->id_pembeli = $request->id_pembeli;
        $data->user_id = $request->user_id;
        $data->tempat_lahir =  $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jk = $request->jk;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
   		if($data->save()){
            return redirect('/pembeli/index')
            ->with(['success' => 'Pembeli berhasil ditambahkan']);
        }else{
            return redirect('/pembeli/index')
            ->with(['error' => 'Pembeli gagal ditambahkan']);
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
        $data = Pembeli::find($id);
        return view('pembeli.detail')
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
        $data = Pembeli::find($id);
        return view('pembeli.form_ubah')
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
        $data = Pembeli::where('id_pembeli', $id)->first();
        $data->tempat_lahir =  $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jk = $request->jk;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
   		if($data->save()){
            return redirect('/pembeli/index')
            ->with(['success' => 'Pembeli berhasil diubah']);
        }else{
            return redirect('/pembeli/index')
            ->with(['error' => 'Pembeli gagal diubah']);
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
        $data = Pembeli::find($id)->first();
        if($data->delete()){
            return redirect('/pembeli/index')
            ->with(['success' => 'Pembeli berhasil dihapus']);
        }else{
            return redirect('/pembeli/index')
            ->with(['error' => 'Pembeli gagal dihapus']);
        }
    }
}
