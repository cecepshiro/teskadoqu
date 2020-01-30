@extends('layouts.header')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/checkout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/checkout_responsive.css') }}">
<div class="home">
    <div class="home_container">
        <div class="home_content">
            <div class="home_title">Checkout</div>
            <div class="breadcrumbs">
                <ul class="d-flex flex-row align-items-center justify-content-start">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li>Checkout</li>
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
                                <form method="POST" action="{{ url('beranda/transaksi/update/'.$kode) }}" enctype="multipart/form-data" class="checkout_form" >
                                    <div>

                                        <label for="checkout_company">Nama Penerima</label>
                                        <input type="text" id="checkout_company" name="penerima" class="checkout_input">
                                    </div>
                                    <div>

                                        <label for="checkout_country">Provinsi</label>
                                        <select name="provinsi" name="provinsi" id="provinsi"
                                            class="checkout_country checkout_input" require="required">
                                            <option value="">Pilih Provinsi</option>
                                            @foreach($provinsi as $row)
                                                <option value="{{ $row->id}}">{{ $row->nama_provinsi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>

                                        <label for="checkout_country">Kabupaten</label>
                                        <select name="checkout_country" name="kabupaten" id="kabupaten"
                                            class="dropdown_item_select checkout_input" require="required">
                                            <option value="">Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                    <div>

                                        <label for="checkout_country">Kecamatan</label>
                                        <select name="checkout_country" name="kecamatan" id="kecamatan"
                                            class="dropdown_item_select checkout_input" require="required">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                    <div>

                                        <label for="checkout_address">Alamat</label>
                                        <textarea id="checkout_address" name="alamat" class="checkout_input"
                                            required="required"></textarea>
                                    </div>
                                    <div>

                                        <label for="checkout_zipcode">Kode Pos</label>
                                        <input type="text" id="checkout_zipcode" name="kode_pos" class="checkout_input"
                                            required="required">
                                    </div>
                                    <div>

                                        <label for="checkout_phone">No Telepon</label>
                                        <input type="phone" id="checkout_phone" name="telp_penerima" class="checkout_input"
                                            required="required">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="cart_total">
                            <div class="cart_total_inner checkout_box">
                                <div class="checkout_title">Total Belanjaan</div>
                                <ul class="cart_extra_total_list">
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Subtotal</div>
                                        <div class="cart_extra_total_value ml-auto">{{ $data['total_harga'] }}</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Pengiriman</div>
                                        <div class="cart_extra_total_value ml-auto">Free</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Total</div>
                                        <div class="cart_extra_total_value ml-auto">$29.90</div>
                                    </li>
                                </ul>

                                <div class="payment">
                                    <div class="payment_options">
                                        <label class="payment_option clearfix">BCA
                                            <input type="radio" name="bca">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="payment_option clearfix">BNI
                                            <input type="radio" name="bni">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="payment_option clearfix">BRI
                                            <input type="radio" name="bri">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin
                                    pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum
                                    sodales arcu id te mpus. Ut consectetur lacus.</div>
                                <div class="checkout_button trans_200"><a href="checkout.html">Konfirmasi Order</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('assets/js/checkout.js') }}" type="7e17eecf48ed62e014aa2c66-text/javascript"></script>
<script>
    $(document).ready(function () {
        $("#provinsi").change(function () {
            var id_provinces = $(this).val();
            axios.get('/beranda/daerah/kabupaten/' + id_provinces).then(resp => {
                var tmp_data = JSON.stringify(resp.data);
                var result = tmp_data.toString();
                $("select#kabupaten").html(result);
                var _options = ""
                var tmp_data = JSON.parse(result)
                $.each(tmp_data, function (i, value) {
                    _options += ('<option value="' + value.id + '">' + value
                        .nama_kabupaten + '</option>');
                });
                $('#kabupaten').append(_options);
            });
        });
    });
    $(document).ready(function () {
        $("#kabupaten").change(function () {
            var id_kabupaten = $(this).val();
            axios.get('/beranda/daerah/kecamatan/' + id_kabupaten).then(resp => {
                var tmp_data = JSON.stringify(resp.data);
                var result = tmp_data.toString();
                $("select#kecamatan").html(result);
                var _options = ""
                var tmp_data = JSON.parse(result)
                $.each(tmp_data, function (i, value) {
                    _options += ('<option value="' + value.id + '">' + value
                        .nama_kecamatan + '</option>');
                });
                $('#kecamatan').append(_options);
            });
        });
    });
</script>
@endsection
