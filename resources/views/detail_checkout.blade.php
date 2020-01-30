@extends('layouts.header')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/checkout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/checkout_responsive.css') }}">
<div class="home">
    <div class="home_container">
        <div class="home_content">
            <div class="home_title">Detail Transaksi</div>
            <div class="breadcrumbs">
                <ul class="d-flex flex-row align-items-center justify-content-start">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li>Detail Transaksi</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="checkout">
    <div class="section_container">
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/checkout.js') }}" type="7e17eecf48ed62e014aa2c66-text/javascript"></script>
@endsection
