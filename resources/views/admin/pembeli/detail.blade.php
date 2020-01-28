@extends('layouts.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Data Pembeli</h1>
    <p class="mb-4">Halaman ini untuk mengelola data pembeli.</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Data Pembeli</h6>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ url('admin/pembeli/store') }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Nama Pembeli</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{ $data['name'] }}" name="name" disabled autofocus required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" value="{{ $data['email'] }}" name="email" disabled required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Tempat Lahir</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="tempat_lahir" value="{{ $data['tempat_lahir'] }}" disabled required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Tgl. Lahir</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="tgl_lahir" value="{{ $data['tempat_lahir'] }}" disabled required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Jk.</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="jk"  value="{{ $data['jk'] }}" disabled required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">No. HP</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="no_hp" value="{{ $data['no_hp'] }}" disabled required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" name="alamat" disabled required>{{ $data['alamat'] }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <a href="{{ url('admin/pembeli/index/') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>
@endsection
