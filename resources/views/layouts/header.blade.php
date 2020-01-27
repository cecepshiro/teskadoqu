<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/preview/theme/aStar/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2020 09:15:44 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Kopiqu</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Kopiqu Online Store">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/bootstrap-4.1.3/bootstrap.css') }}">
    <link href="{{ asset('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/responsive.css') }}">
    <!-- //login style -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/checkout_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/checkout.css') }}"> -->
</head>

<body>
    <div class="super_container">

        <header class="header">
            <div class="header_content d-flex flex-row align-items-center justify-content-start">

                <div class="hamburger menu_mm"><i class="fa fa-bars menu_mm" aria-hidden="true"></i></div>

                <div class="header_logo">
                    <a href="#">
                        <div>Kopi<span>qu</span></div>
                    </a>
                </div>

                <nav class="header_nav">
                    <ul class="d-flex flex-row align-items-center justify-content-start">
                        <li><a href="index-2.html">home</a></li>
                        <li><a href="#">woman</a></li>
                        <li><a href="#">man</a></li>
                        <li><a href="#">lookbook</a></li>
                        <li><a href="#">blog</a></li>
                        <li><a href="#">contact</a></li>
                    </ul>
                </nav>

                <div class="header_extra ml-auto d-flex flex-row align-items-center justify-content-start">
                    <div class="cart d-flex flex-row align-items-center justify-content-start">
                        <div class="cart_icon"><a href="cart.html">
                                <img src="{{ asset('assets/images/bag.png') }}" alt="">
                                <div class="cart_num">2</div>
                            </a></div>
                    </div>
                </div>
            </div>
        </header>

        <div class="menu d-flex flex-column align-items-start justify-content-start menu_mm trans_400">
            <div class="menu_close_container">
                <div class="menu_close">
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="menu_search">
                <form action="#" class="header_search_form menu_mm">
                    <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
                    <button
                        class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                        <i class="fa fa-search menu_mm" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <nav class="menu_nav">
                <ul class="menu_mm">
                    <li class="menu_mm"><a href="index-2.html">home</a></li>
                    <li class="menu_mm"><a href="#">woman</a></li>
                    <li class="menu_mm"><a href="#">man</a></li>
                    <li class="menu_mm"><a href="#">lookbook</a></li>
                    <li class="menu_mm"><a href="blog.html">blog</a></li>
                    <li class="menu_mm"><a href="contact.html">contact</a></li>
                </ul>
            </nav>
            <div class="menu_extra">
                <div class="menu_social">
                    <ul>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="sidebar">
            <div class="sidebar_logo">
                <a href="#">
                    <div>Kopi<span>qu</span></div>
                </a>
            </div>
            <nav class="sidebar_nav">
                <ul>
                    @guest
                    <li><a href="{{ route('login') }}">Masuk<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="{{ url('/beranda') }}">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#">Kategori<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#">Produk<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#">Testimoni<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#">Kontak<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    @else
                    <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Keluar<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="{{ url('/') }}">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#">Kategori<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#">Produk<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#">Testimoni<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#">Kontak<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endif
                </ul>
            </nav>

            <div class="search">
                <form action="#" class="search_form" id="sidebar_search_form">
                    <input type="text" class="search_input" placeholder="Search" required="required">
                    <button class="search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>

            <div class="cart d-flex flex-row align-items-center justify-content-start">
                <div class="cart_icon"><a href="cart.html">
                        <img src="{{ asset('assets/images/bag.png') }}" alt="">
                        <div class="cart_num">2</div>
                    </a></div>
                <div class="cart_text">Cart</div>
                <div class="cart_price">$39.99 (1)</div>
            </div>
        </div>

        @yield('content')

        <footer class="footer">
            <div class="footer_social">
                <div class="section_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div
                                    class="footer_social_container d-flex flex-row align-items-center justify-content-between">

                                    <a href="#">
                                        <div
                                            class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                            <div class="footer_social_icon"><i class="fa fa-instagram"
                                                    aria-hidden="true"></i></div>
                                            <div class="footer_social_title">instagram</div>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div
                                            class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                            <div class="footer_social_icon"><i class="fa fa-google-plus"
                                                    aria-hidden="true"></i></div>
                                            <div class="footer_social_title">google +</div>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div
                                            class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                            <div class="footer_social_icon"><i class="fa fa-pinterest"
                                                    aria-hidden="true"></i></div>
                                            <div class="footer_social_title">pinterest</div>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div
                                            class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                            <div class="footer_social_icon"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></div>
                                            <div class="footer_social_title">facebook</div>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div
                                            class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                            <div class="footer_social_icon"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></div>
                                            <div class="footer_social_title">twitter</div>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div
                                            class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                            <div class="footer_social_icon"><i class="fa fa-youtube"
                                                    aria-hidden="true"></i></div>
                                            <div class="footer_social_title">youtube</div>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div
                                            class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                            <div class="footer_social_icon"><i class="fa fa-tumblr-square"
                                                    aria-hidden="true"></i></div>
                                            <div class="footer_social_title">tumblr</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="credits">
                <div class="section_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="credits_content d-flex flex-row align-items-center justify-content-end">
                                    <div class="credits_text">
                                        Copyright &copy;<script data-cfasync="false"
                                            src="{{ asset('assets/js/email-decode.min.js') }}"></script>
                                        <script type="b30993cdc647436bc52d09e3-text/javascript">
                                            document.write(new Date().getFullYear());

                                        </script> | This template is made with <i
                                            class="fa fa-heart-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}" type="b30993cdc647436bc52d09e3-text/javascript"></script>
    <script
        src="{{ asset('assets/styles/bootstrap-4.1.3/popper.js') }}" type="b30993cdc647436bc52d09e3-text/javascript">
    </script>
    <script
        src="{{ asset('assets/styles/bootstrap-4.1.3/bootstrap.min.js') }}" type="b30993cdc647436bc52d09e3-text/javascript">
    </script>
    <script
        src="{{ asset('assets/plugins/greensock/TweenMax.min.js') }}" type="b30993cdc647436bc52d09e3-text/javascript">
    </script>
    <script
        src="{{ asset('assets/plugins/greensock/TimelineMax.min.js') }}" type="b30993cdc647436bc52d09e3-text/javascript">
    </script>
    <script
        src="{{ asset('assets/plugins/scrollmagic/ScrollMagic.min.js') }}" type="b30993cdc647436bc52d09e3-text/javascript">
    </script>
    <script
        src="{{ asset('assets/plugins/greensock/animation.gsap.min.js') }}" type="b30993cdc647436bc52d09e3-text/javascript">
    </script>
    <script
        src="{{ asset('assets/plugins/greensock/ScrollToPlugin.min.js') }}" type="b30993cdc647436bc52d09e3-text/javascript">
    </script>
    <script
        src="{{ asset('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}" type="b30993cdc647436bc52d09e3-text/javascript">
    </script>
    <script src="{{ asset('assets/plugins/easing/easing.js') }}" type="b30993cdc647436bc52d09e3-text/javascript">
    </script>
    <script
        src="{{ asset('assets/plugins/parallax-js-master/parallax.min.js') }}" type="b30993cdc647436bc52d09e3-text/javascript">
    </script>
    <script
        src="{{ asset('assets/plugins/Isotope/isotope.pkgd.min.js') }}" type="b30993cdc647436bc52d09e3-text/javascript">
    </script>
    <script src="{{ asset('assets/plugins/Isotope/fitcolumns.js') }}" type="b30993cdc647436bc52d09e3-text/javascript">
    </script>
    <script src="{{ asset('assets/js/custom.js') }}" type="b30993cdc647436bc52d09e3-text/javascript"></script>

    <!-- <script src="{{ asset('assets/js/checkout.js') }}" type="7e17eecf48ed62e014aa2c66-text/javascript"></script> -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
        type="b30993cdc647436bc52d09e3-text/javascript"></script>
    <script type="b30993cdc647436bc52d09e3-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

    </script>
    <script src="{{ asset('assets/js/rocket-loader.min.js') }}" data-cf-settings="b30993cdc647436bc52d09e3-|49"
        defer=""></script>
</body>

<!-- Mirrored from colorlib.com/preview/theme/aStar/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2020 09:16:03 GMT -->

</html>
