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
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Admin</h6>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ url('admin/petugas/update/'. $data['id']) }}"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Level</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="level" required>
                            <option value="">Pilih Level Admin</option>
                            <option value="0" <?php if($data['level']== 0){ echo"selected"; } ?>>Manager Operasional</option>
                            <option value="1" <?php if($data['level']== 1){ echo"selected"; } ?>>Manager Inventory</option>
                            <option value="2" <?php if($data['level']== 2){ echo"selected"; } ?>>Petugas Order Processor</option>
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
