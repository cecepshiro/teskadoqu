<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailTransaksi;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DetailTransaksi::get();
        return view('detailtransaksi.list')
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
        $data = new DetailTransaksi;
        $data->id_detailtransaksi = $request->id_detailtransaksi;
        $data->id_transaksi = $request->id_transaksi;
        $data->id_produk =  $request->id_produk;
        $data->qty = $request->qty;
   		if($data->save()){
            return redirect('/detailtransaksi/index')
            ->with(['success' => 'Detail Transaksi berhasil ditambahkan']);
        }else{
            return redirect('/detailtransaksi/index')
            ->with(['error' => 'Detail Transaksi gagal ditambahkan']);
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
        $data = DetailTransaksi::find($id);
        return view('detailtransaksi.detail')
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
        $data = DetailTransaksi::where('id_detailtransaksi', $id)->first();
        $data->id_produk =  $request->id_produk;
        $data->qty = $request->qty;
   		if($data->save()){
            return redirect('/detailtransaksi/index')
            ->with(['success' => 'Detail Transaksi berhasil diubah']);
        }else{
            return redirect('/detailtransaksi/index')
            ->with(['error' => 'Detail Transaksi gagal diubah']);
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
        $data = DetailTransaksi::find($id)->first();
        if($data->delete()){
            return redirect('/detailtransaksi/index')
            ->with(['success' => 'Detail Transaksi berhasil dihapus']);
        }else{
            return redirect('/detailtransaksi/index')
            ->with(['error' => 'Detail Transaksi gagal dihapus']);
        }
    }
}
