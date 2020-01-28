<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\DetailTransaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::getDetailTransaksi();
        return view('admin.transaksi.list')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Transaksi;
        $data->id_transaksi = $request->id_transaksi;
        $data->id_pembeli =  $request->id_pembeli;
        $data->penerima =  $request->penerima;
        $data->provinsi =  $request->provinsi;
        $data->kabupaten =  $request->kabupaten;
        $data->kecamatan =  $request->kecamatan;
        $data->alamat =  $request->alamat;
        $data->kode_pos =  $request->kode_pos;
        $data->no_hp_penerima =  $request->no_hp_penerima;
        $data->total_harga =  $request->total_harga;
        $data->status =  $request->status;
   		if($data->save()){
            return redirect('admin/transaksi/index')
            ->with(['success' => 'Transaksi berhasil ditambahkan']);
        }else{
            return redirect('admin/transaksi/index')
            ->with(['error' => 'Transaksi gagal ditambahkan']);
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
        $data = Transaksi::getDetailTransaksiById($id);
        return view('admin.transaksi.detail')
        ->with('data', $data)
        ->with('kode', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
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
        $data = Transaksi::where('id_transaksi', $id)->first();
        $data->penerima =  $request->penerima;
        $data->provinsi =  $request->provinsi;
        $data->kabupaten =  $request->kabupaten;
        $data->kecamatan =  $request->kecamatan;
        $data->alamat =  $request->alamat;
        $data->kode_pos =  $request->kode_pos;
        $data->no_hp_penerima =  $request->no_hp_penerima;
        $data->total_harga =  $request->total_harga;
        $data->status =  $request->status;
   		if($data->save()){
            return redirect('admin/transaksi/index')
            ->with(['success' => 'Transaksi berhasil diubah']);
        }else{
            return redirect('admin/transaksi/index')
            ->with(['error' => 'Transaksi gagal diubah']);
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
        $data = Transaksi::find($id)->first();
        if($data->delete()){
            return redirect('admin/transaksi/index')
            ->with(['success' => 'Transaksi berhasil dihapus']);
        }else{
            return redirect('admin/transaksi/index')
            ->with(['error' => 'Transaksi gagal dihapus']);
        }
    }
}
