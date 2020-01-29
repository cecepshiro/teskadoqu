@extends('layouts.header')
@section('content')
<div class="home">

    <div class="home_slider_container">
        <div class="owl-carousel owl-theme home_slider">

            <div class="owl-item">
                <div class="background_image" style="background-image:url({{ asset('assets/images/home_slider_1.jpg') }})"></div>
                <div class="home_content_container">
                    <div class="home_content">
                        <div class="home_title_1">New Coffee</div>
                        <div class="button button_1 home_button trans_200"><a href="categories.html">Shop
                                NOW!</a></div>
                    </div>
                </div>
            </div>

            <div class="owl-item">
                <div class="background_image" style="background-image:url({{ asset('assets/images/home_slider_2.jpg') }})"></div>
                <div class="home_content_container">
                    <div class="home_content">
                        <div class="home_title_1">New Coffee</div>
                        <div class="button button_1 home_button trans_200"><a href="categories.html">Shop
                                NOW!</a></div>
                    </div>
                </div>
            </div>

            <div class="owl-item">
                <div class="background_image" style="background-image:url({{ asset('assets/images/home_slider_3.jpg') }})"></div>
                <div class="home_content_container">
                    <div class="home_content">
                        <!-- <div class="home_discount d-flex flex-row align-items-end justify-content-start">
                            <div class="home_discount_num">20</div>
                            <div class="home_discount_text">Discount on the</div>
                        </div> -->
                        <div class="home_title">New Coffee</div>
                        <div class="button button_1 home_button trans_200"><a href="categories.html">Shop
                                NOW!</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="home_slider_nav home_slider_prev trans_200">
            <div class=" d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('assets/images/prev.png') }}"
                    alt=""></div>
        </div>
        <div class="home_slider_nav home_slider_next trans_200">
            <div class=" d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('assets/images/next.png') }}"
                    alt=""></div>
        </div>
    </div>
</div>

<div class="products">
    <div class="section_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="products_container grid">
                    @foreach($produk as $row)
                        <div class="product grid-item hot">
                            <div class="product_inner">
                                <div class="product_image">
                                    <img src="{{ asset('assets/images/product_1.jpg') }}" alt="">
                                    <div class="product_tag">{{ $row->stok }}</div>
                                </div>
                                <div class="product_content text-center">
                                    <div class="product_title"><a href="{{ url('beranda/produk/'. $row->id_produk) }}">{{ $row->nama_produk }}</a></div>
                                    <div class="product_price">{{ $row->harga }}</div>
                                    <div class="product_button ml-auto mr-auto trans_200"><a href="#">Tambah</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
