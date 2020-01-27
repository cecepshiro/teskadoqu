@extends('layouts.header')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/checkout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/checkout_responsive.css') }}">
<div class="home">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/checkout.jpg"
        data-speed="0.8"></div>
    <div class="home_container">
        <div class="home_content">
            <div class="home_title">Silahkan Masuk</div>
            <div class="breadcrumbs">
                <ul class="d-flex flex-row align-items-center justify-content-start">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li>Masuk</li>
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
                            <div class="checkout_title">Masuk</div>
                            <div class="checkout_form_container">
                                <form method="POST" action="{{ route('login') }}" id="checkout_form" class="checkout_form">
                                @csrf
                                    <div>
                                        <label for="checkout_email">Email</label>
                                        @if($errors->has('email') && old('loginform') != null)
                                            <input type="email" id="checkout_email" class="checkout_input  @error('email') is-invalid @enderror"
                                            required="required" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                    <label for="checkout_email" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </label>
                                            @enderror
                                        @else
                                            <input type="email" id="checkout_email" class="checkout_input  @error('email') is-invalid @enderror"
                                            required="required" name="email" value="" required autocomplete="email" autofocus>
                                        @endif
                                    </div>
                                    <div>

                                        <label for="checkout_email">Password</label>
                                        <input type="hidden" name="loginform" value="1">
                                        @if($errors->has('email') && old('loginform') != null)
                                            <input type="password" id="checkout_email" class="checkout_input @error('password') is-invalid @enderror"
                                            required="required" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <label for="checkout_email" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        @else
                                            <input type="password" id="checkout_email" class="checkout_input @error('password') is-invalid @enderror"
                                            required="required" name="password" required autocomplete="current-password">
                                        @endif
                                    </div>
                                    <div class="checkout_extra">
                                        <ul>
                                            <li
                                                class="billing_info d-flex flex-row align-items-center justify-content-start">
                                                <label class="checkbox_container">
                                                    <input type="checkbox" id="cb_1" name="remember" {{ old('remember') ? 'checked' : '' }}
                                                        class="billing_checkbox">
                                                    <span class="checkbox_mark"></span>
                                                    <span class="checkbox_text">Ingat Saya</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <button type="submit" class="newsletter_button">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="cart_total">
                            <div class="cart_total_inner checkout_box">
                                <div class="checkout_title">Daftar</div>
                                <div class="checkout_form_container">
                                <form method="POST" action="{{ route('register') }}" id="checkout_form" class="checkout_form">
                                @csrf
                                    <div>
                                        <label for="checkout_email">Nama Lengkap</label>
                                        @if($errors->has('name') && old('loginform') == null)
                                            <input type="text" id="checkout_email" class="checkout_input  @error('name') is-invalid @enderror"
                                            required="required" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <label for="checkout_email" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        @else
                                            <input type="text" id="checkout_email" class="checkout_input  @error('name') is-invalid @enderror"
                                            required="required" name="name" value="" required autocomplete="name" autofocus>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="checkout_email">Email</label>
                                        @if($errors->has('email') && old('loginform') == null)
                                            <input type="email" id="checkout_email" class="checkout_input  @error('email') is-invalid @enderror"
                                            required="required" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <label for="checkout_email" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        @else
                                            <input type="email" id="checkout_email" class="checkout_input  @error('email') is-invalid @enderror"
                                            required="required" name="email" value="" required autocomplete="email" autofocus>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="checkout_email">Password</label>
                                        @if($errors->has('password') && old('loginform') == null)
                                            <input type="password" id="checkout_email" class="checkout_input @error('password') is-invalid @enderror"
                                            required="required" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <label for="checkout_email" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        @else
                                            <input type="password" id="checkout_email" class="checkout_input @error('password') is-invalid @enderror"
                                            required="required" name="password" required autocomplete="current-password">
                                        @endif
                                    </div>
                                    <div>
                                        <label for="checkout_email">Konfirmasi Password</label>
                                        <input type="password" id="password-confirm" class="checkout_input"
                                            required="required" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div>
                                        <button type="submit" class="newsletter_button">Daftar</button>
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
</div>
<script src="{{ asset('assets/js/checkout.js') }}" type="7e17eecf48ed62e014aa2c66-text/javascript"></script>
@endsection
