@extends('layouts.app')

@section('css')
    <style>
        .pd_header_main_wrapper.bz_furniture_header_wrapper.bz_wins_header_wrapper.float_left,
        .bz_bottom_footer_main_wrapper.wins_footer_main_wrapper.float_left{
            display: none!important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid custom_container">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="error_page_wrapper">
            <img src="/images/faq_logo.png" alt="logo">
            <h1>404 Error Page</h1>
            <p class="zoom-area">Oops! Something went wrong! </p>
            <section class="error-container d-none d-sm-none d-md-noe d-lg-block d-xl-block">
                <span class="four">
                <span class="screen-reader-text">4</span>
                </span>
                <span class="zero">
                <span class="screen-reader-text">0</span>
                </span>
                <span class="four">
                <span class="screen-reader-text">4</span>
                </span>
            </section>
            <div class="error-img text-center d-block d-sm-block d-md-block d-lg-none ">
                <img src="/images/error.png" alt="error" class="error">
            </div>
            <div class="link-container">
                <a href="{{ route("home") }}" class="more-link">Quay lại trang chủ</a>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection