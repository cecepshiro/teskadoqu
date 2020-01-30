@extends('layouts.header')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/cart.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/cart_responsive.css') }}">
<div class="home">
    <div class="home_container">
        <div class="home_content">
            <div class="home_title">Keranjang</div>
            <div class="breadcrumbs">
                <ul class="d-flex flex-row align-items-center justify-content-start">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li>Keranjang</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="cart_section">
    <div class="section_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="cart_container">

                        <div class="cart_bar">
                            <ul
                                class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-start">
                                <li>Produk</li>
                                <li>Gambar</li>
                                <li>Qty</li>
                                <li>Subtotal</li>
                                <li>Aksi</li>
                            </ul>
                        </div>

                        <div class="cart_items">
                            <ul class="cart_items_list">
                            @foreach($data as $row)
                                <li
                                    class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                                    <div class="product_color text-lg-center product_text"><span>Produk: </span>{{ $row->nama_produk }}
                                    </div>
                                    <div class="product_color text-lg-center product_text"><span>Gambar: </span>
                                    <div class="product_image"><center><img src="{{ asset('assets/images/cart_1.jpg') }}" alt=""></center></div>
                                    </div>
                                    <div class="product_color text-lg-center product_text"><span>Qty: </span>
                                        <center><input type="number" onclick="qtyUpdate({{ $row->id_detail_transaksi }}, this.value);" style="width:100px;" class="form-control stok" value="{{ $row->qty }}" min="1" max="{{ $row->stok }}"></center>
                                    </div>
                                    <div class="product_color text-lg-center product_text"><span>Subtotal: </span>{{ $row->total_harga }}
                                    </div>
                                    <div class="product_color text-lg-center product_text"><span>Aksi: </span>
                                        <a href="#" class="btn btn-danger hapus"
                                        data-toggle="tooltip" title="Hapus Data ini"><i class="fa fa-trash"></i></a>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>

                        <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                            <div
                                class="cart_buttons_inner ml-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                <div class="button button_continue trans_200"><a href="{{ url('/') }}">Lanjutkan
                                        Belanja</a></div>
                                <div class="button button_clear trans_200"><a href="categories.html">Hapus keranjang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section_container cart_extra_container">
        <div class="container">
            <div class="row">

                <div class="col-xxl-6">
                    <div class="cart_extra cart_extra_1">
                        <div class="cart_extra_content cart_extra_coupon">
                            <div class="cart_extra_title">Metode Pengiriman</div>
                            <div class="coupon_form_container">
                                <ul>
                                    <li
                                        class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                        <label class="radio_container">
                                            <input type="radio" id="radio_1" name="kurir" class="shipping_radio stok" checked
                                                readonly>
                                            <span class="radio_mark"></span>
                                            <span class="radio_text">Reguler</span>
                                        </label>
                                        <div class="shipping_price ml-auto">Rp. 5000 / Kg</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6">
                    <div class="cart_extra cart_extra_2">
                        <div class="cart_extra_content cart_extra_total">
                            <div class="cart_extra_title">Total Belanja</div>
                            <ul class="cart_extra_total_list">
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_extra_total_title">Subtotal</div>
                                    <div class="cart_extra_total_value ml-auto">$29.90</div>
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
                            <div class="checkout_button trans_200"><a href="checkout.html">Lanjutkan Checkout</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/cart.js') }}" type="7e17eecf48ed62e014aa2c66-text/javascript"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    function qtyUpdate(val1,val2) {
        var tmp_data = val1+"-"+val2;
        var strArray = tmp_data.split("-");
        axios.post('/beranda/transaksi/updatestok', {
                id_detail_transaksi: strArray[0],
                qty: strArray[1]
        }).then((response) => {
            console.log(response);
        }, (error) => {
            console.log(error);
        });
    }
</script>
@endsection
