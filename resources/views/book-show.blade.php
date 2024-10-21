@extends('layouts.app')

@section('content')
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('books') }}">Tủ sách</a></li>
                            <li class="breadcrumb-item active">{{ $book['name'] }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <main class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row  mb--60">
                    <div class="col-lg-5 mb--30">
                        <!-- Product Details Slider Big Image-->
                        <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
                            "slidesToShow": 1,
                            "arrows": false,
                            "fade": true,
                            "draggable": false,
                            "swipe": false,
                            "asNavFor": ".product-slider-nav"
                            }'
                        >
                            <div class="single-slide">
                                <!-- <img src="image/products/product-details-1.jpg" alt=""> -->
                                <img src="{{ getImage($book['image']) }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-details-info pl-lg--30 ">
                            <h3 class="product-title">{{ $book['name'] }}</h3>
                            <ul class="list-unstyled">
                                <li>Tác giả: <a href="javascript:void(0);" class="list-value font-weight-bold"> {{ $book['author'] }}</a></li>
                                <li>Năm xuất bản: <a href="javascript:void(0);" class="list-value font-weight-bold"> {{ $book['published_year'] }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="sb-custom-tab review-tab section-padding">
                    <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#tab-1" role="tab"
                                aria-controls="tab-1" aria-selected="true">
                                Giới thiệu sách
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content space-db--20" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                            <article class="review-article">
                                {!! $book['content'] !!}
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection