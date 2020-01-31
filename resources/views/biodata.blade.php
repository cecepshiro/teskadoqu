@extends('layouts.header')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/checkout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/checkout_responsive.css') }}">
<div class="home">
    <div class="home_container">
        <div class="home_content">
            <div class="home_title">Biodata</div>
            <div class="breadcrumbs">
                <ul class="d-flex flex-row align-items-center justify-content-start">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li>Biodata</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="checkout">
    <div class="section_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="checkout_container d-flex flex-xxl-row flex-column align-items-start justify-content-start">

                        <div class="billing checkout_box">
                            <div class="checkout_title">Alamat Pengiriman</div>
                            <div class="checkout_form_container">
                                <form method="POST" action="{{ url('beranda/pembeli/store') }}"
                                    enctype="multipart/form-data"  class="checkout_form">
                                    @csrf
                                    <div>

                                        <label for="checkout_company">Nama</label>
                                        <input type="text" id="penerima" value="{{ Auth::user()->name }}"  disabled name="penerima" class="checkout_input">
                                    </div>
                                    <div>

                                        <label for="checkout_zipcode">Tempat Lahir</label>
                                        <input type="text" id="kode_pos" name="tempat_lahir" class="checkout_input"
                                            required="required">
                                    </div>
                                    <div>

                                        <label for="checkout_zipcode">Tgl. Lahir</label>
                                        <input type="date" id="kode_pos" name="tgl_lahir" class="checkout_input"
                                            required="required">
                                    </div>
                                    <div>

                                        <label for="checkout_zipcode">Jenis Kelamin</label>
                                        <select id="kode_pos" name="jk" class="checkout_input"
                                            required="required">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div>

                                        <label for="checkout_zipcode">No. Handphone</label>
                                        <input type="number" id="kode_pos" name="no_hp" class="checkout_input"
                                            required="required">
                                    </div>
                                    <div>

                                        <label for="checkout_address">Alamat</label>
                                        <textarea id="alamat" name="alamat" class="checkout_input"
                                            required="required"></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="checkout_button trans_200">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/checkout.js') }}" type="7e17eecf48ed62e014aa2c66-text/javascript"></script>
@endsection
