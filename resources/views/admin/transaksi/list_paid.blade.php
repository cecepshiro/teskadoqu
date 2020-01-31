@extends('layouts.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
    <p class="mb-4">Halaman ini untuk mengelola data transaksi.</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
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
                            <th>Pembeli</th>
                            <th>Penerima</th>
                            <th>Provinsi.</th>
                            <th>Kab.</th>
                            <th>Kec.</th>
                            <th>Alamat.</th>
                            <th>Kode Pos</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Pembeli</th>
                            <th>Penerima</th>
                            <th>Provinsi.</th>
                            <th>Kab.</th>
                            <th>Kec.</th>
                            <th>Alamat.</th>
                            <th>Kode Pos</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Aksi</th>
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
                        <tr id="{{ $row->id_transaksi }}">
                            <td>{{ $no }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->penerima }}</td>
                            <td>{{ $row->provinsi }}</td>
                            <td>{{ $row->kabupaten }}</td>
                            <td>{{ $row->kecamatan }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->kode_pos }}</td>
                            <td>Rp. {{ number_format($row->total_harga, 0, '', '.') }}</td>
                            <td>
                                @if($row->status == 1)
                                    pending
                                @elseif($row->status == 2)
                                    paid
                                @elseif($row->status == 3)
                                    shipped
                                @endif
                            </td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                                <a href="{{ url('admin/transaksi/detail', $row->id_transaksi) }}" class="btn btn-success"
                                    data-toggle="tooltip" title="Detail Data Transaksi">Detail</a>
                                    <a href="{{ url('admin/transaksi/download', $row->id_transaksi) }}" class="btn btn-warning"
                                    data-toggle="tooltip" title="Lihat Bukti Transfer">Bukti TF</a>
                                     <a href="{{ url('admin/transaksi/kirim', $row->id_transaksi) }}" class="btn btn-primary"
                                    data-toggle="tooltip" title="Kirim Produk">Kirim</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
