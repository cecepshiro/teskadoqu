@extends('layouts.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Data Admin</h1>
    <p class="mb-4">Halaman ini untuk mengelola data admin.</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Admin</h6>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ url('admin/petugas/store') }}"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Nama Petugas</label>
                    <div class="col-sm-12">
                        <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus
                            required>
                    </div>
                    @error('name')
                    <label for="checkout_email" role="alert">
                        <strong>{{ $message }}</strong>
                    </label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-12">
                        <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" required>
                    </div>
                    @error('email')
                    <label for="checkout_email" role="alert">
                        <strong>{{ $message }}</strong>
                    </label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" required>
                    </div>
                    @error('password')
                    <label for="checkout_email" role="alert">
                        <strong>{{ $message }}</strong>
                    </label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Konfirmasi Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Level</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="level" required>
                            <option value="">Pilih Level Admin</option>
                            <option value="0">Manager Operasional</option>
                            <option value="1">Manager Inventory</option>
                            <option value="2">Petugas Order Processor</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <a href="{{ url('admin/petugas/index/') }}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
