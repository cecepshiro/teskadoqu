<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\DetailTransaksi;
use Auth;
use App\Pembeli;
use App\Produk;
use App\ProvinsiModel;
use App\KabupatenModel;
use App\KecamatanModel;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
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
            }elseif($row->status == '2'){
                $tmp = "2";
            }elseif($row->status == '3'){
                $tmp = "3";
            }elseif($row->status == '4'){
                $tmp = "4";
            }
        }

        // return $tmp;
        // //jika transaksi masih belum dibayar,produk akan terus dimasukan ke id yg sama
        if($tmp == "0")
        {
            //Simpan Cart
            $data = Transaksi::where('id_transaksi', $tmp_id)->first();
            // $data->id_transaksi = $result;
            // $data->id_pembeli =  $id_pembeli;
            $data->total_harga =  ($tmp_total + $total);
            $data->status =  '0';
            if($data->save()){
                //cek jika produk yang dimasukan sama, hanya mengupdate qty nya saja
                $status = DetailTransaksi::where('id_transaksi', $tmp_id)->where('id_produk', $request->id_produk)->get();
                $tmp_detail_transaksi = DetailTransaksi::where('id_transaksi', $tmp_id)->where('id_produk', $request->id_produk)->first();
                if(count($status) > 0){
                    $data2 = DetailTransaksi::where('id_detail_transaksi', $tmp_detail_transaksi['id_detail_transaksi'])->first();
                    // $data2->id_transaksi = $tmp_id;
                    // $data2->id_produk = $request->id_produk;
                    $data2->qty = $tmp_detail_transaksi['qty'] + $request->stok;
                    $data2->subtotal = $tmp_detail_transaksi['subtotal'] + $total;
                    if($data2->save()){
                        $data3 = Produk::where('id_produk', $data2->id_produk)->first();
                        $data3->stok =  ($data3['stok'] - $request->stok);
                        $data3->save();
                        return $data2;
                    }
                }
                //jika produk tidak sama
                elseif(count($status) < 1){
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
                }
                
            }else{
                    return 'error';
            }

        }
        //jika transaksi telah dbayar, maka produk akan masuk ke id yang baru
        elseif($tmp == "2" || $tmp == "3" || $tmp == "4")
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
    public function update(Request $request)
    {
        $prov = ProvinsiModel::select('nama_provinsi')->where('id', $request->provinsi)->value('nama_provinsi');
        $kab = KabupatenModel::select('nama_kabupaten')->where('id', intval($request->kabupaten))->value('nama_kabupaten');
        $kec = KecamatanModel::select('nama_kecamatan')->where('id', intval($request->kecamatan))->value('nama_kecamatan');
        //random key
        $digits = 3;
        $hasil = rand(pow(10, $digits-1), pow(10, $digits)-1);
        //  //update
        $data = Transaksi::where('id_transaksi', $request->id_transaksi)->first();
        $data->penerima =  $request->penerima;
        $data->provinsi = $prov; 
        $data->kabupaten =  $kab;
        $data->kecamatan =  $kec;
        $data->alamat =  $request->alamat;
        $data->kode_pos =  $request->kode_pos;
        $data->telp_penerima =  $request->telp_penerima;
        $data->id_tf =  $request->id_tf;
        $data->status =  '1';
   		if($data->save()){
            return $data;
        }else{
            return 'error';
        }

        // return $request->alamat;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $strArray = explode("-", $id);
        $id_detail = $strArray[0];
        $id_trans = $strArray[1];
        $status2 = Transaksi::find($id_trans);
        $tmp_old = DetailTransaksi::find($id_detail);
        //cek jumlah data
        $count = DetailTransaksi::where('id_transaksi', $id_trans)->get();
        //update stok produk
        $data = Produk::where('id_produk', $tmp_old['id_produk'])->first();
        $data->stok = ($data['stok'] + $tmp_old['qty']);
        if($data->save()){
            //kondisi jika produk sisa 1
            if(count($count) == 1){
                $data2 = DetailTransaksi::find($id_detail);
                if($data2->delete()){
                    $data3 = Transaksi::find($id_trans);
                    $data3->delete();
                    return 'success';
                }
            //produk > 1
            }elseif(count($count) > 1){
                $data2 = DetailTransaksi::find($id_detail);
                if($data2->delete()){
                    $data3 = Transaksi::where('id_transaksi', $id_trans)->first();
                    $data3->total_harga = ($status2['total_harga'] - $tmp_old['subtotal']);
                    $data3->save();
                    return 'success';
                }
            }
        }else{
            return 'error';
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
        $data2 = Transaksi::getTransaksiOrderPaid($id_pembeli);
        $data3 = Transaksi::getTransaksiOrderShipped($id_pembeli);
        $data4 = Transaksi::getTransaksiOrderDone($id_pembeli);
        return view('list_transaksi')
        ->with('data', $data)
        ->with('data2', $data2)
        ->with('data3', $data3)
         ->with('data4', $data4);
        // print_r($data4);
    }

    public function bukti($id)
    {  
        return view('form_upload')
        ->with('kode', $id);
    }

    public function bukti_simpan(Request $request, $id)
    {  
        //Input gambar
        if($file=$request->file('file')){
            if($file->getClientOriginalExtension()=="PNG" or $file->getClientOriginalExtension()=="png" or $file->getClientOriginalExtension()=="jpg" or $file->getClientOriginalExtension()=="jpeg" or $file->getClientOriginalExtension()=="JPG" or $file->getClientOriginalExtension()=="JPEG"){
                $name=sha1($file->getClientOriginalName().time()).".".$file->getClientOriginalExtension();
                $file->move('bukti',$name);
                $berkas=$name;
            }else{
                return redirect('/beranda/transaksi/list');
            }
        }
        
        $data = Transaksi::where('id_transaksi', $id)->first();
        $data->bukti = $berkas;
        $data->status = '2';
        if($data->save()){
            return redirect('/beranda/transaksi/list');
        }
        
    }

    public function checkout()
    {
        $sum = [];
        $ekspedisi = [];
        $id_pembeli = Pembeli::select('id_pembeli')->where('user_id', Auth::user()->id)->value('id_pembeli');
        $id_transaksi = Transaksi::select('id_transaksi')->where('id_pembeli', $id_pembeli)->where('status', '0')->value('id_transaksi');
        $data = Transaksi::getDetailTransaksiById($id_transaksi);
        $all_data = DetailTransaksi::where('id_transaksi', $id_transaksi)->join('produk','detailtransaksi.id_produk','=','produk.id_produk')->get();
        foreach($all_data as $key => $row){
            $sum[$key] = $row->subtotal;
            $ekspedisi[$key] = $row->berat * $row->qty ;
        }
        $result = array_sum($sum);
        $result_ekspedisi = ((array_sum($ekspedisi)) * 5000);
        return view('checkout')
        ->with('data', $data)
         ->with('kode', $id_transaksi)
         ->with('result', $result)
         ->with('result_ekspedisi', $result_ekspedisi);
         
    }

    public function detailcheckout($id)
    {
        $data = Transaksi::getDetailTransaksiById($id);
        return view('detail_checkout')
        ->with('data', $data);
    }

    public function payment($id)
    {
        //random key
        $digits = 3;
        $key_tf = rand(pow(10, $digits-1), pow(10, $digits)-1);
        //
        $data = Transaksi::find($id);
        $provinsi = ProvinsiModel::get();
        return view('payment')
        ->with('data', $data)
        ->with('provinsi', $provinsi)
        ->with('kode', $id)
        ->with('key_tf', $key_tf);
    }

    public function updatestok(Request $request)
    {
        $status = DetailTransaksi::find($request->id_detail_transaksi);
        $status2 = Transaksi::find($status['id_transaksi']);
        $data = DetailTransaksi::where('id_detail_transaksi', $request->id_detail_transaksi)->first();
        $data->qty =  $request->qty;
        if($data->save()){
            if($request->qty <  $status['qty']) {
                $data2 = Produk::where('id_produk', $data['id_produk'])->first();
                $data2->stok = ($data2['stok'] - 1);
                if($data2->save()){
                    $data3 = DetailTransaksi::where('id_detail_transaksi', $request->id_detail_transaksi)->first();
                    $data3->subtotal = ($status['subtotal'] - $data2['harga']);
                    if($data3->save()){
                        $data4 = Transaksi::where('id_transaksi', $data3['id_transaksi'])->first();
                        $data4->total_harga = ($status2['total_harga'] - $data2['harga']);
                        $data4->save();
                    }
                }
                return $data2;
            }elseif($request->qty > $status['qty']){
                $data2 = Produk::where('id_produk', $data['id_produk'])->first();
                $data2->stok = ($data2['stok'] + 1);
                if($data2->save()){
                    $data3 = DetailTransaksi::where('id_detail_transaksi', $request->id_detail_transaksi)->first();
                    $data3->subtotal = ($status['subtotal'] + $data2['harga']);
                    if($data3->save()){
                        $data4 = Transaksi::where('id_transaksi', $data3['id_transaksi'])->first();
                        $data4->total_harga = ($status2['total_harga'] - $data2['harga']);
                        $data4->save();
                    }
                }
            }
        }
    }

    public function updateekspedisi(Request $request)
    {
        $data = Transaksi::where('id_transaksi', $request->id_transaksi)->first();
        $data->biaya_ekspedisi =  $request->biaya_ekspedisi;
        if($data->save()){
            // return view('detail_checkout')
            // ->with('data', $data);
            return $data;
        }
    }

    public function pending()
    {
       $data = Transaksi::pending();
        return view('admin.transaksi.list_pending')
        ->with('data', $data);
    }

    public function paid()
    {
       $data = Transaksi::paid();
        return view('admin.transaksi.list_paid')
        ->with('data', $data);
    }

     public function shipped()
    {
       $data = Transaksi::shipped();
        return view('admin.transaksi.list_shipped')
        ->with('data', $data);
    }

     public function done()
    {
       $data = Transaksi::done();
        return view('admin.transaksi.list_done')
        ->with('data', $data);
    }

     public function kirim($id)
    {
    //    $data = Transaksi::shipped();
        return view('admin.transaksi.input_resi')
        ->with('kode', $id);
    }

    public function resi(Request $request, $id)
    {
       $data = Transaksi::where('id_transaksi', $id)->first();
       $data->resi =  $request->resi;
       $data->status =  '3';
        if($data->save()){
            return redirect('/admin/transaksi/paid')
            ->with(['success' => 'Resi berhasil diinput']);
        }
    }

     public function terima($id)
    {
       $data = Transaksi::where('id_transaksi', $id)->first();
       $data->status =  '4';
        if($data->save()){
            return redirect('/beranda/transaksi/list');
        }
    }

    public function download($id){
        $data=Transaksi::find($id);
        $pathToFile='bukti'.'/'.$data['bukti'];
        return response()->download(public_path($pathToFile));
    }

}
