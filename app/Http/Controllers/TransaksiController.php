<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\DetailTransaksi;
use Auth;
use App\Pembeli;
use App\Produk;
use App\ProvinsiModel;

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
        //kode otomatis
        $query = Transaksi::select('transaksi.id_transaksi as kode')->orderBy('id_transaksi','DESC')->limit(1)->count();       
        if($query <> 0){      
            //jika kode ternyata sudah ada.      
            $data = $query;      
            $kode = intval($data) + 1;  
           }
        else {      
            //jika kode belum ada      
             $kode = 1;    
        }
        $result = $kode;

        $total = $request->harga * $request->stok;
        $id_pembeli = Pembeli::select('id_pembeli')->where('user_id', Auth::user()->id)->value('id_pembeli');
        //menampung status transaksi
        $tmp_status = Transaksi::where('id_pembeli', $id_pembeli)->get();
        $tmp = "";
        $tmp_id = "";
        $tmp_total = 0;
        foreach($tmp_status as $row){
            if($row->status == '0'){
                $tmp = "0";
                $tmp_id = $row->id_transaksi;
                $tmp_total = $row->total_harga;
            }elseif($row->status == '1'){
                $tmp = "1";
            }
        }
        //jika transaksi masih belum dibayar,produk akan terus dimasukan ke id yg sama
        if($tmp == "0")
        {
            //Simpan Cart
            $data = Transaksi::where('id_transaksi', $tmp_id)->first();
            // $data->id_transaksi = $result;
            // $data->id_pembeli =  $id_pembeli;
            $data->total_harga =  ($tmp_total + $total);
            $data->status =  '0';
            if($data->save()){
                $data2 = new DetailTransaksi;
                $data2->id_transaksi = $tmp_id;
                $data2->id_produk = $request->id_produk;
                $data2->qty = $request->stok;
                $data2->subtotal = $total;
                if($data2->save()){
                    $data3 = Produk::where('id_produk', $data2->id_produk)->first();
                    $data3->stok =  ($data3['stok'] - $data2->qty);
                    $data3->save();
                    return $data3;
                }
                
            }else{
                    return 'error';
            }

        }
        //jika transaksi telah dbayar, maka produk akan masuk ke id yang baru
        elseif($tmp == "1")
        {
            //Simpan Cart
            $data = new Transaksi;
            $data->id_transaksi = $result;
            $data->id_pembeli =  $id_pembeli;
            $data->total_harga =  $total;
            $data->status =  '0';
            if($data->save()){
                $data2 = new DetailTransaksi;
                $data2->id_transaksi = $data->id_transaksi;
                $data2->id_produk = $request->id_produk;
                $data2->qty = $request->stok;
                $data2->subtotal = $total;
                if($data2->save()){
                    $data3 = Produk::where('id_produk', $data2->id_produk)->first();
                    $data3->stok =  ($data3['stok'] - $data2->qty);
                    $data3->save();
                    return $data3;
                }
                
            }else{
                    return 'error';
            }
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
        $data->telp_penerima =  $request->telp_penerima;
   		if($data->save()){
            
            // return redirect('beranda/transaksi/index')
            // ->with(['success' => 'Transaksi berhasil diubah']);
        }else{
            // return redirect('beranda/transaksi/index')
            // ->with(['error' => 'Transaksi gagal diubah']);
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

    public function getQty()
    {
        $data = Produk::select('stok')->get();
        return $data;
    }

    public function list_transaksi()
    {
        $id_pembeli = Pembeli::select('id_pembeli')->where('user_id', Auth::user()->id)->value('id_pembeli');
        $data = Transaksi::getTransaksiOrder($id_pembeli);
        return view('checkout')
        ->with('data', $data);
    }

    public function checkout()
    {
        $id_pembeli = Pembeli::select('id_pembeli')->where('user_id', Auth::user()->id)->value('id_pembeli');
        $data = Transaksi::getTransaksiOrder($id_pembeli);
        return view('checkout')
        ->with('data', $data);
    }

    public function detailcheckout($id)
    {
        $data = Transaksi::getDetailTransaksiById($id);
        return view('detail_checkout')
        ->with('data', $data);
    }

    public function payment($id)
    {
        $data = Transaksi::find($id);
        $provinsi = ProvinsiModel::get();
        return view('payment')
        ->with('data', $data)
        ->with('provinsi', $provinsi)
        ->with('kode', $id);
    }
}
