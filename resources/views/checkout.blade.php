@extends('layouts.header')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/checkout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/checkout_responsive.css') }}">
<div class="home">
    <div class="home_container">
        <div class="home_content">
            <div class="home_title">Daftar Transaksi</div>
            <div class="breadcrumbs">
                <ul class="d-flex flex-row align-items-center justify-content-start">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li>Daftar Transaksi</li>
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
                                <th>Pembeli</th>
                                <th>Penerima</th>
                                <th>Provinsi.</th>
                                <th>Kab.</th>
                                <th>Kec.</th>
                                <th>Alamat.</th>
                                <th>Kode Pos</th>
                                <th>Telp. Penerima</th>
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
                                <th>Telp. Penerima</th>
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
                                <td>
                                    @if($row->penerima == null)
                                        kosong
                                    @else
                                        {{ $row->penerima }}
                                    @endif
                                </td>
                                <td>
                                    @if($row->provinsi == null)
                                        kosong
                                    @else
                                        {{ $row->provinsi }}
                                    @endif
                                </td>
                                <td>
                                    @if($row->kabupaten == null)
                                        kosong
                                    @else
                                        {{ $row->kabupaten }}
                                    @endif
                                </td>
                                <td>
                                    @if($row->kecamatan == null)
                                        kosong
                                    @else
                                        {{ $row->kecamatan }}
                                    @endif
                                </td>
                                <td>
                                    @if($row->alamat_pengiriman == null)
                                        kosong
                                    @else
                                        {{ $row->alamat_pengiriman }}
                                    @endif
                                </td>
                                <td>
                                    @if($row->kode_pos == null)
                                        kosong
                                    @else
                                        {{ $row->kode_pos }}
                                    @endif
                                </td>
                                <td>{{ $row->telp_penerima }}</td>
                                <td>{{ $row->total_harga }}</td>
                                <td>
                                    @if($row->status == 0)
                                    pending
                                    @elseif($row->status == 1)
                                    paid
                                    @elseif($row->status == 2)
                                    shipped
                                    @endif
                                </td>
                                <td>{{ $row->tgl_transaksi }}</td>
                                <td>
                                    @if($row->status == 0)
                                    <a href="{{ url('beranda/transaksi/payment', $row->id_transaksi) }}"
                                        class="btn btn-primary" data-toggle="tooltip" title="Detail Data Transaksi"><i
                                            class="fa fa-list"> Checkout</i></a>
                                    @elseif($row->status == 1)
                                    <a href="{{ url('beranda/transaksi/detailcheckout', $row->id_transaksi) }}"
                                        class="btn btn-success" data-toggle="tooltip" title="Detail Data Transaksi"><i
                                            class="fa fa-eye"> Detail</i></a>
                                    @endif
                                </td>
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
