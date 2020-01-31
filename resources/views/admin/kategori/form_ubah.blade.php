@extends('layouts.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Data Kategori</h1>
    <p class="mb-4">Halaman ini untuk mengelola data kategori.</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Kategori</h6>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ url('admin/kategori/update/'.$data['id_kategori']) }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Nama Kategori</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{ $data['nama_kategori'] }}" name="nama_kategori" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <center><img src="{{ asset('/gambar_kategori/'.$data['gambar']) }}"  style="width:30%;" class="img-fluid "></center>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Gambar</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" name="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <a href="{{ url('admin/kategori/index/') }}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>
@endsection
