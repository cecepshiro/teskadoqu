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
                <div class="billing checkout_box">
                    <div class="checkout_title">Upload Bukti Transfer</div>
                    <div class="checkout_form_container">
                        <form method="POST" action="{{ url('beranda/transaksi/bukti_simpan/'.$kode) }}"
                            enctype="multipart/form-data" class="checkout_form">
                            @csrf
                            <div>
                                <label for="checkout_company">Masukan berkas</label>
                                <br>
                                <input type="file" id="bukti" name="file" class="">
                            </div>
                            <div>
                                <button type="submit" class="checkout_button trans_200">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/checkout.js') }}" type="7e17eecf48ed62e014aa2c66-text/javascript"></script>
@endsection
