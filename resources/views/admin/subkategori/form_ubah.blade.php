@extends('layouts.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Data Sub Kategori</h1>
    <p class="mb-4">Halaman ini untuk mengelola data sub kategori.</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Sub Kategori</h6>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ url('admin/kategori/update_sub/'.$data['id_sub_kategori']) }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Nama Sub Kategori</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $data['sub_kategori'] }}" class="form-control" name="sub_kategori" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Nama Kategori</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="id_kategori" required autofocus>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $row)
                                <option <?php if($data['id_kategori'] == $row->id_kategori){ echo"selected"; } ?> value="{{ $row->id_kategori }}">{{ $row->nama_kategori }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <a href="{{ url('admin/kategori/detail_sub/'.$data['id_kategori']) }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>
@endsection
