@extends('layouts.header')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/product.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/product_responsive.css') }}">
<div class="home">
    <div class="home_container">
        <div class="home_content">
            <div class="home_title">Produk</div>
            <div class="breadcrumbs">
                <ul class="d-flex flex-row align-items-center justify-content-start">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li>Detail Produk</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="product">
    <div class="section_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="product_content_container d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="product_content order-lg-1 order-2">
                            <div class="product_content_inner">
                                <div class="product_image_row">
                                    <div class="{{ asset('assets/product_image_3 product_image') }}"><img src="{{ asset('assets/images/product_single_3.jpg') }}"
                                            alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="product_sidebar order-lg-2 order-1">
                            <form action="#" id="product_form" class="product_form">
                                <div class="product_name">{{ $produk['nama_produk'] }}</div>
                                <div class="product_price">Rp. {{ number_format($produk['harga'], 0, '', '.') }}</div>
                                <div class="product_color">Stok: </div>
                                <div class="product_size" style="margin-top: 10px;">
                                    <div class="product_size_title"><input type="number" style="width:100px;" class="form-control stok" value="1" min="1" max="{{ $produk['stok'] }}"></div>
                                     <div class="product_links" style="margin-top: 10px;">
                                        <ul class="text-justify">
                                            <li><a>
                                            {{ $produk['deskripsi'] }}
                                            </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <button class="cart_button trans_200 tambah" data-idproduk="{{ $produk['id_produk'] }}" data-stok="{{ $produk['stok'] }}"
                                        data-harga="{{ $produk['harga'] }}">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/product.js') }}" type="7e17eecf48ed62e014aa2c66-text/javascript"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    var stok = 0;
    $(".tambah").on("click", function () {
        var id = $(this).attr("data-idproduk");
        var harga = $(this).attr("data-harga");
        if(stok == 0){
            stok = 1;
        }else{
            stok;
        }
        axios.post('/beranda/transaksi/store', {
                id_produk: id,
                stok: stok,
                harga: harga,
        }).then((response) => {
            console.log(response);
            alert('Produk berhasil ditambahkan ke keranjang')
        }, (error) => {
            console.log(error);
        });    

        // alert(id);    
    });
    $('.stok').change(function(){
        stok = $(this).val();
    })

</script>
@endsection
