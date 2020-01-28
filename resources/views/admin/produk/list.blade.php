@extends('layouts.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Data Produk</h1>
    <p class="mb-4">Halaman ini untuk mengelola data produk.</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
        </div>
        <div class="card-header py-3">
            <a class="btn btn-primary" href="{{ url('admin/produk/create') }}"><i class="fa fa-plus"></i> Tambah
                Data</a>
        </div>
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
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Stok</th>
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
                        <tr id="{{ $row->id_produk }}">
                            <td>{{ $no }}</td>
                            <td>{{ $row->nama_produk }}</td>
                            <td>{{ $row->nama_kategori }}</td>
                            <td>{{ $row->harga }}</td>
                            <td>{{ $row->berat }}</td>
                            <td>{{ $row->stok }}</td>
                            <td>
                                <a href="{{ url('admin/produk/edit', $row->id_produk) }}" class="btn btn-warning"
                                    data-toggle="tooltip" title="Ubah Data ini"><i class="fa fa-edit"></i></a>

                                <a href="#" class="btn btn-danger hapus"
                                    data-toggle="tooltip" title="Hapus Data ini"><i class="fa fa-trash"></i></a>

                                <a href="{{ url('admin/produk/detail', $row->id_produk) }}" class="btn btn-success"
                                    data-toggle="tooltip" title="Detail Data"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(".hapus").click(function(){
        var id = $(this).parents("tr").attr("id");
        // console.log(id);
        if(confirm('Yakin ingin menghapus data ?'))
        {
            $.ajax({
               url: '/admin/produk/destroy/'+ id,
               type: 'GET',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Data berhasil dihapus");  
               }
            });
        }
    });
</script>
@endsection
