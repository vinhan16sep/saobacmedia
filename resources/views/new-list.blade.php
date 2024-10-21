@extends('layouts.app')

@section('content')
<section id="wrapper">

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
              <!-- <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="blog.html">
                  <span itemprop="name">Blog</span>
                </a>
                <meta itemprop="position" content="2" />
              </li> -->
            </ol>
          </nav>
        </div>
      </div>

      <div class="container">
        <div class="row">

          <div id="left-column" class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

            <div class="block ybc_block_latest ybc_blog_ltr_mode page_blog ybc_block_slider">
              <h1 class="h1 products-section-title text-uppercase">
                <span>Tin nổi bật</span>
              </h1>
              <ul class="block_content">
                
                @foreach ( $highlightNews as $key => $item)
                <li>
                  <a class="ybc_item_img" href="{{ route('detail-news', ["slug" => $item->slug]) }}"><img
                      src="{{ getImage($item->image) }}"
                      alt="{{ $item->title }}" title="{{ $item->title }}" /></a>
                  <div class="ybc-blog-latest-post-content">
                    <a class="ybc_title_block" href="{{ route('detail-news', ["slug" => $item->slug]) }}">{{ $item->title }}</a>
                    <div class="ybc-blog-sidear-post-meta">
                      <span class="post-date">{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                    </div>
                    <div class="blog_description">
                      {!! $item->description !!}
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
              <div class="clear"></div>
            </div>
          </div>



          <div id="content-wrapper" class="left-column col-xs-12 col-sm-8 col-md-8 col-lg-9">

            <div class="ybc_blog_layout_large_grid ybc-blog-wrapper ybc-blog-wrapper-blog-list ybc-page-category">

              <ul class="ybc-blog-list row ">
                @foreach ( $news as $key => $item)
                <li>
                  <div class="post-wrapper">
                    <a class="ybc_item_img" href="{{ route('detail-news', ["slug" => $item->slug]) }}">
                      <img title="{{ $item->title }}"
                        src="{{ getImage($item->image) }}"
                        alt="{{ $item->title }}" />
                    </a>
                    <div class="ybc-blog-wrapper-content">
                      <div class="ybc-blog-wrapper-content-main">
                        <a class="ybc_title_block" href="{{ route('detail-news', ["slug" => $item->slug]) }}">{{ $item->title }}</a>
                        <div class="ybc-blog-sidear-post-meta">
                          <span class="post-date">{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                        </div>
                        <div class="blog_description">
                          {!! $item->description !!}
                        </div>
                        <a class="read_more" href="{{ route('detail-news', ["slug" => $item->slug]) }}">Chi tiết</a>
                      </div>
                    </div>
                  </div>

                </li>
                @endforeach
                
              </ul>
              <div class="blog-paggination">
                <div class="results">Showing 1 to 7 of 7 (1 Pages)</div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>
@endsection
