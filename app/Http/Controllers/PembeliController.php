<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembeli;
use App\User;
use Auth;

class PembeliController extends Controller
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
        $data = Pembeli::getDetailPembeli();
        return view('biodata')
        ->with('data', $data);
    }

    public function index_admin()
    {
        $data = Pembeli::getDetailPembeli();
        return view('admin.pembeli.list')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biodata');
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
        $data->user_id = Auth::user()->id;
        $data->tempat_lahir =  $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jk = $request->jk;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
   		if($data->save()){
            return redirect('beranda/pembeli/index')
            ->with(['success' => 'Pembeli berhasil ditambahkan']);
        }else{
            return redirect('beranda/pembeli/index')
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
        $data = Pembeli::where('user_id',$id)->first();
        return view('biodata_detail')
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
        $data = Pembeli::getDetailPembeli();
        return view('biodata')
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
            return redirect('beranda/pembeli/detail/'.Auth::user()->id)
            ->with(['success' => 'Pembeli berhasil diubah']);
        }else{
            return redirect('beranda/pembeli/detail/'.Auth::user()->id)
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
        $data = Pembeli::find($id);
        $tmp_id = $data['user_id'];
        if($data->delete()){
            $data2 = User::find($tmp_id);
            $data2->delete();
            return redirect('admin/pembeli/index')
            ->with(['success' => 'Pembeli berhasil dihapus']);
            // print_r($tmp_id);
        }else{
            return redirect('admin/pembeli/index')
            ->with(['error' => 'Pembeli gagal dihapus']);
        }
    }
}
