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
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Pending</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Paid</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                            role="tab" aria-controls="nav-contact" aria-selected="false">Shipped</a>
                        <a class="nav-item nav-link" id="nav-done-tab" data-toggle="tab" href="#nav-done"
                            role="tab" aria-controls="nav-done" aria-selected="false">Done</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                         <br>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
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
                                        <th>Total Transfer</th>
                                        <!-- <th>Status</th> -->
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
                                        <th>Total Transfer</th>
                                        <!-- <th>Status</th> -->
                                        <th>Created</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                            $no = 0;
                        ?>
                                    @forelse($data as $row)
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
                                        <td>
                                            @if($row->telp_penerima == null)
                                            kosong
                                            @else
                                            {{ $row->telp_penerima }}
                                            @endif
                                        </td>
                                        <td>Rp. {{ number_format(($row->total_harga - $row->id_tf), 0, '', '.') }}</td>
                                        <!-- <td>
                                            @if($row->status == 1)
                                            pending
                                            @elseif($row->status == 2)
                                            paid
                                            @elseif($row->status == 3)
                                            shipped
                                            @endif
                                        </td> -->
                                        <td>{{ $row->tgl_transaksi }}</td>
                                        <td>
                                            <a href="{{ url('beranda/transaksi/detailcheckout', $row->id_transaksi) }}"
                                                class="btn btn-success" data-toggle="tooltip"
                                                title="Detail Data Transaksi"><i class="fa fa-eye"> Detail</i></a>
                                         
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="13">Data Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="nav-done" role="tabpanel" aria-labelledby="nav-done-tab">
                         <br>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
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
                                        <th>Total Transfer</th>
                                        <!-- <th>Status</th> -->
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
                                        <th>Total Transfer</th>
                                        <!-- <th>Status</th> -->
                                        <th>Created</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                            $no = 0;
                        ?>
                                    @forelse($data4 as $row)
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
                                        <td>
                                            @if($row->telp_penerima == null)
                                            kosong
                                            @else
                                            {{ $row->telp_penerima }}
                                            @endif
                                        </td>
                                        <td>Rp. {{ number_format(($row->total_harga - $row->id_tf), 0, '', '.') }}</td>
                                        <!-- <td>
                                            @if($row->status == 1)
                                            pending
                                            @elseif($row->status == 2)
                                            paid
                                            @elseif($row->status == 3)
                                            shipped
                                            @endif
                                        </td> -->
                                        <td>{{ $row->tgl_transaksi }}</td>
                                        <td>
                                            <a href="{{ url('beranda/transaksi/detailcheckout', $row->id_transaksi) }}"
                                                class="btn btn-success" data-toggle="tooltip"
                                                title="Detail Data Transaksi"><i class="fa fa-eye"> Detail</i></a>
                                         
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="13">Data Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/checkout.js') }}" type="7e17eecf48ed62e014aa2c66-text/javascript"></script>
@endsection
