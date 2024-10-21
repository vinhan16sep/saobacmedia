@extends('layouts.app')

@section('content')
<!--=================================
Hero Area
===================================== -->
<section class="hero-area hero-slider-1">
    <div class="sb-slick-slider" data-slick-setting='{
                    "autoplay": true,
                    "fade": true,
                    "autoplaySpeed": 3000,
                    "speed": 3000,
                    "slidesToShow": 1,
                    "dots":true
                    }'>
        <div class="single-slide bg-shade-whisper  ">
            <div class="container">
                <div class="home-content text-center text-sm-left position-relative">
                    <div class="hero-partial-image image-right">
                        <img src="image/bg-images/home-slider-2-ai.png" alt="">
                    </div>
                    <div class="row g-0">
                        <div class="col-xl-6 col-md-6 col-sm-7">
                            <div class="home-content-inner content-left-side text-start">
                                <h1>H.G. Wells<br>
                                    De Vengeance</h1>
                                <h2>Cover Up Front Of Books and Leave Summary</h2>
                                <a href="shop-grid.html" class="btn btn-outlined--primary">
                                    $78.09 - Order Now!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide bg-ghost-white">
            <div class="container">
                <div class="home-content text-center text-sm-left position-relative">
                    <div class="hero-partial-image image-left">
                        <img src="image/bg-images/home-slider-1-ai.png" alt="">
                    </div>
                    <div class="row align-items-center justify-content-start justify-content-md-end">
                        <div class="col-lg-6 col-xl-7 col-md-6 col-sm-7">
                            <div class="home-content-inner content-right-side text-start">
                                <h1>J.D. Kurtness <br>
                                    De Vengeance</h1>
                                <h2>Cover Up Front Of Books and Leave Summary</h2>
                                <a href="shop-grid.html" class="btn btn-outlined--primary">
                                    $78.09 - Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
Promotion Section One
===================================== -->
<section class="section-margin">
    <h2 class="sr-only">Promotion Section</h2>
    <div class="container">
    </div>
</section>
<!--=================================
Home Slider Tab
===================================== -->
<section class="section-padding">
    <h2 class="sr-only">Home Tab Slider Section</h2>
    <div class="container">
        <div class="sb-custom-tab">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                    <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                        data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 4,
                            "rows":2,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                        @if (!empty($books))
                        <!-- @foreach ($books as $key => $item) -->
                        @for ($i = 0; $i < 20; $i++)
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ getImage($item['image']) }}" alt="">
                                    </div>
                                </div>
                                <div class="product-header">
                                    <a href="#" class="author">
                                        {{ $item['author'] }}
                                    </a>
                                    <h3><a href="product-details.html">{{ $item['name'] }}</a></h3>
                                </div>
                            </div>
                        </div>
                        @endfor
                        <!-- @endforeach -->
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
Best Seller Product
===================================== -->
<!-- <section class="section-margin bg-image section-padding-top section-padding"
    data-bg="image/bg-images/best-seller-bg.jpg">
    <div class="container">
        <div class="section-title section-title--bordered mb-0">
            <h2>Best BEST SELLER BOOKS</h2>
        </div>
        <div class="best-seller-block">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="author-image">
                        <img src="image/others/best-seller-author.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="sb-slick-slider product-slider product-list-slider multiple-row slider-border-multiple-row"
                        data-slick-setting='{
                            "autoplay": false,
                            "autoplaySpeed": 8000,
                            "slidesToShow":2,
                            "rows":2,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                            {"breakpoint":992, "settings": {"slidesToShow": 1} },
                            {"breakpoint":768, "settings": {"slidesToShow": 1} },
                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                        ]'>
                        <div class="single-slide">
                            <div class="product-card card-style-list">
                                <div class="card-image">
                                    <img src="image/products/product-6.jpg" alt="">
                                </div>
                                <div class="product-card--body">
                                    <div class="product-header">
                                        <a href="#" class="author">
                                            Rpple
                                        </a>
                                        <h3><a href="product-details.html">Do You Really Need It? This
                                                Will Help You
                          </a></h3>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--=================================
Promotion Section One
===================================== -->
<section class="section-margin">
    <h2 class="sr-only">Promotion Section</h2>
    <div class="container">
        <div class="row space-db--30">
            <div class="col-lg-6 col-md-6 mb--30">
                <a href="#" class="promo-image promo-overlay">
                    <img src="image/bg-images/promo-banner-with-text.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-6 col-md-6 mb--30">
                <a href="#" class="promo-image promo-overlay">
                    <img src="image/bg-images/promo-banner-with-text-2.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
<!--=================================
Home Blog Slider
===================================== -->
<!--=================================
Home Blog
===================================== -->
<section class="section-margin">
    <div class="container">
        <div class="section-title">
            <h2>LATEST BLOGS</h2>
        </div>
        <div class="blog-slider sb-slick-slider" data-slick-setting='{
        "autoplay": true,
        "autoplaySpeed": 8000,
        "slidesToShow": 2,
        "dots": true
    }' data-slick-responsive='[
        {"breakpoint":1200, "settings": {"slidesToShow": 1} }
    ]'>
            <div class="single-slide">
                <div class="blog-card">
                    <div class="image">
                        <img src="image/others/blog-grid-1.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="content-header">
                            <div class="date-badge">
                                <span class="date">
                                    13
                                </span>
                                <span class="month">
                                    Aug
                                </span>
                            </div>
                            <h3 class="title"><a href="blog-details.html">How to Water and Care for Mounted</a>
                            </h3>
                        </div>
                        <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                        <article class="blog-paragraph">
                            <h2 class="sr-only">blog-paragraph</h2>
                            <p>Virtual reality and 3-D technology are already well-established in the
                                entertainment...</p>
                        </article>
                        <a href="blog-details.html" class="card-link">Read More <i
                                class="fas fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="single-slide">
                <div class="blog-card">
                    <div class="image">
                        <img src="image/others/blog-grid-2.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="content-header">
                            <div class="date-badge">
                                <span class="date">
                                    19
                                </span>
                                <span class="month">
                                    Jan
                                </span>
                            </div>
                            <h3 class="title"><a href="blog-details.html">Why You Never See BLOG TITLE That </a>
                            </h3>
                        </div>
                        <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                        <article class="blog-paragraph">
                            <h2 class="sr-only">blog-paragraph</h2>
                            <p>Virtual reality and 3-D technology are already well-established in the
                                entertainment...</p>
                        </article>
                        <a href="blog-details.html" class="card-link">Read More <i
                                class="fas fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="single-slide">
                <div class="blog-card">
                    <div class="image">
                        <img src="image/others/blog-grid-3.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="content-header">
                            <div class="date-badge">
                                <span class="date">
                                    31
                                </span>
                                <span class="month">
                                    Aug
                                </span>
                            </div>
                            <h3 class="title"><a href="blog-details.html">What Everyone Must Know About </a>
                            </h3>
                        </div>
                        <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                        <article class="blog-paragraph">
                            <h2 class="sr-only">blog-paragraph</h2>
                            <p>Virtual reality and 3-D technology are already well-established in the
                                entertainment...</p>
                        </article>
                        <a href="blog-details.html" class="card-link">Read More <i
                                class="fas fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection