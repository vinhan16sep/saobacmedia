@extends('layouts.app')

@section('content')

    <div id="wrapper" class="maincontent_v1">

      <div class="breadcrumb_wrapper" data-depth="2">
        <div class="container">
          <nav data-depth="2" class="breadcrumb">
            <ol itemscope itemtype="http://schema.org/BreadcrumbList">
              <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('home') }}">
                  <span itemprop="name">Trang chủ</span>
                </a>
                <meta itemprop="position" content="1" />
              </li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="container">
        <div class="row">

          <div id="content-wrapper" class="left-column col-xs-12 col-sm-12 col-md-12">

            <div id="main">


              <div id="products" class="sang">

                <div>

                  <div id="js-product-list">
                    <div class="products row">

                      @foreach ( $products as $key => $item)
                      <article class="product-miniature js-product-miniature" data-id-product="1"
                        data-id-product-attribute="1" itemscope itemtype="http://schema.org/Product">
                        <div class="thumbnail-container">
                          <div class="left-block">
                            <div class="product-image-container">

                              <a href="sony-bravia/1-1-faded-short-sleeves-tshirt.html#/1-size-s/13-color-orange"
                                class="thumbnail product-thumbnail product_img_link">
                                <img src="{{ getImage($item->image) }}"
                                  alt="{{ $item->name }}"
                                  data-full-size-image-url="{{ getImage($item->image) }}" />
                              </a>

                              @if ($item->is_highlight == 1)
                              <ul class="product-flags">
                                <li class="product-discount">
                                  <span class="discount-percen">Hot</span>
                                </li>
                              </ul>
                              @endif

                              <div class="button-container-product">
                                <div class="highlighted-informations">

                                  <a href="#" class="quick-view" data-link-action="quickview" title="Quick view"
                                    data-toggle="tooltip">

                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="right-block">

                            <h4 class="h3 product-title" itemprop="name">
                              <a href="sony-bravia/1-1-faded-short-sleeves-tshirt.html#/1-size-s/13-color-orange">{{ $item->name }}</a>
                              </h4>
                            <div class="product-price-and-shipping">

                              @if ($item->discount_price != "")
                                <span itemprop="price" class="price product-price">{{ $item->discount_price != 0 ? number_format($item->discount_price) : '' }} VNĐ</span>
                                <br>
                                <span class="old-price product-price">{{ $item->price != 0 ? number_format($item->price) : '' }} VNĐ</span>
                              @else
                                <div class="current-price">
                                  <span itemprop="price" class="price product-price">{{ $item->price != 0 ? number_format($item->price) . " VNĐ" : 'Giá liên hệ' }}</span>
                                </div>
                              @endif

                            </div>
                            <div class="clearfix atc_div add_to_cart_button">
                                <a href="{{ route('san-pham', ["slug" => $item->slug]) }}">
                                    <button class="add_to_cart btn btn-primary btn-sm">
                                    Chi tiết
                                    </button>
                                </a>
                            </div>

                          </div>

                        </div>
                      </article>
                      @endforeach

                    </div>


                  </div>

                </div>
                <div>

                  <div id="js-product-list-bottom"></div>

                </div>
              </div>

            </div>

          </div>



        </div>
      </div>
    </div> <!-- end wrapper -->
@endsection
