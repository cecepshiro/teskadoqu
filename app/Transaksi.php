<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetailTransaksi;

class Transaksi extends Model
{
    protected $table='transaksi';
    protected $primaryKey='id_transaksi';
    public $incrementing =false;
    public $timestamps=true; 
    protected $fillable = [
      'id_transaksi','id_pembeli','penerima','provinsi','kabupaten','kecamatan','alamat','kode_pos','telp_penerima','total_harga','biaya_ekspedisi','id_tf','bukti','resi','status','created_at','updated_at',
    ];

    //Mengambil data transaksi
    public static function getDetailTransaksi(){
      return $data = Transaksi::
      select('*')
      ->join('pembeli','transaksi.id_pembeli','=','pembeli.id_pembeli')
      ->join('users','pembeli.user_id','=','users.id')
      ->get();
    }

    //Mengambil data detail transaksi
    public static function getDetailTransaksiById($id){
      return $data = DetailTransaksi::
      select('*','detailtransaksi.subtotal as subtotal_detail')
      ->join('transaksi','detailtransaksi.id_transaksi','=','transaksi.id_transaksi')
      ->join('produk','detailtransaksi.id_produk','=','produk.id_produk')
      ->where('detailtransaksi.id_transaksi', $id)
      ->get();
    }

    //Mengambil data detail transaksi
    public static function getTransaksiOrder($id){
      return $data = Transaksi::
      select('*','transaksi.created_at as tgl_transaksi','transaksi.alamat as alamat_pengiriman')
      // ->join('detailtransaksi','transaksi.id_transaksi','=','detailtransaksi.id_transaksi')
      // ->join('produk','detailtransaksi.id_produk','=','produk.id_produk')
      ->join('pembeli','transaksi.id_pembeli','=','pembeli.id_pembeli')
      ->join('users','pembeli.user_id','=','users.id')
      ->where('transaksi.id_pembeli', $id)
      ->where('transaksi.status', '1')
      ->get();
    }

    //Mengambil data detail transaksi
    public static function getTransaksiOrderPaid($id){
      return $data = Transaksi::
      select('*','transaksi.created_at as tgl_transaksi','transaksi.alamat as alamat_pengiriman')
      // ->join('detailtransaksi','transaksi.id_transaksi','=','detailtransaksi.id_transaksi')
      // ->join('produk','detailtransaksi.id_produk','=','produk.id_produk')
      ->join('pembeli','transaksi.id_pembeli','=','pembeli.id_pembeli')
      ->join('users','pembeli.user_id','=','users.id')
      ->where('transaksi.id_pembeli', $id)
      ->where('transaksi.status', '2')
      ->get();
    }

    //Mengambil data detail transaksi
    public static function getTransaksiOrderShipped($id){
      return $data = Transaksi::
      select('*','transaksi.created_at as tgl_transaksi','transaksi.alamat as alamat_pengiriman')
      // ->join('detailtransaksi','transaksi.id_transaksi','=','detailtransaksi.id_transaksi')
      // ->join('produk','detailtransaksi.id_produk','=','produk.id_produk')
      ->join('pembeli','transaksi.id_pembeli','=','pembeli.id_pembeli')
      ->join('users','pembeli.user_id','=','users.id')
      ->where('transaksi.id_pembeli', $id)
      ->where('transaksi.status', '3')
      ->get();
    }

    //Mengambil data detail transaksi
    public static function getTransaksiOrderDone($id){
      return $data = Transaksi::
      select('*','transaksi.created_at as tgl_transaksi','transaksi.alamat as alamat_pengiriman')
      // ->join('detailtransaksi','transaksi.id_transaksi','=','detailtransaksi.id_transaksi')
      // ->join('produk','detailtransaksi.id_produk','=','produk.id_produk')
      ->join('pembeli','transaksi.id_pembeli','=','pembeli.id_pembeli')
      ->join('users','pembeli.user_id','=','users.id')
      ->where('transaksi.id_pembeli', $id)
      ->where('transaksi.status', '4')
      ->get();
    }

    //Mengambil data transaksi
    public static function shipped(){
      return $data = Transaksi::
      select('*')
      ->join('pembeli','transaksi.id_pembeli','=','pembeli.id_pembeli')
      ->join('users','pembeli.user_id','=','users.id')
      ->where('transaksi.status', '3')
      ->get();
    }

    //Mengambil data transaksi
    public static function paid(){
      return $data = Transaksi::
      select('*')
      ->join('pembeli','transaksi.id_pembeli','=','pembeli.id_pembeli')
      ->join('users','pembeli.user_id','=','users.id')
      ->where('transaksi.status', '2')
      ->get();
    }

    public static function done(){
      return $data = Transaksi::
      select('*')
      ->join('pembeli','transaksi.id_pembeli','=','pembeli.id_pembeli')
      ->join('users','pembeli.user_id','=','users.id')
      ->where('transaksi.status', '4')
      ->get();
    }

    //Mengambil data transaksi
    public static function pending(){
      return $data = Transaksi::
      select('*')
      ->join('pembeli','transaksi.id_pembeli','=','pembeli.id_pembeli')
      ->join('users','pembeli.user_id','=','users.id')
      ->where('transaksi.status', '1')
      ->get();
    }
}
