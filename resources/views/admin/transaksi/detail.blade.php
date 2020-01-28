@extends('layouts.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Detail Transaksi</h1>
    <p class="mb-4">Halaman ini untuk mengelola data transaksi.</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Detail Transaksi - {{ $kode }}</h6>
        </div>
        <!-- <div class="card-header py-3">
            <a class="btn btn-primary" href="{{ url('admin/pembeli/create') }}"><i class="fa fa-plus"></i> Tambah
                Data</a>
        </div> -->
        <div class="card-body">
            @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Perhatian!</h4>
                {{ $message }}
            </div>
            @endif
            @if($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
                {{ $message }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $no = 0;
                        ?>
                        @foreach($data as $row)
                        <?php
                            $no++;
                        ?>
                        <tr id="{{ $row->id_detailtransaksi }}">
                            <td>{{ $no }}</td>
                            <td>{{ $row->nama_produk }}</td>
                            <td>{{ $row->qty }}</td>
                            <td>{{ $row->subtotal }}</td>
                            <!-- <td>
                                <a href="{{ url('admin/detailtransaksi/detail', $row->id_detailtransaksi) }}" class="btn btn-success"
                                    data-toggle="tooltip" title="Detail Data Transaksi"><i class="fa fa-eye"> Detail</i></a>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
