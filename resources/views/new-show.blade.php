@extends('layouts.app')

@section('content')

<section id="wrapper">

<div class="breadcrumb_wrapper" data-depth="3">
  <div class="container">
    <nav data-depth="3" class="breadcrumb">
      <ol itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" href="{{ route('home') }}">
            <span itemprop="name">Trang chủ</span>
          </a>
          <meta itemprop="position" content="1" />
        </li>
        <!-- <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" href="../../blog.html">
            <span itemprop="name">Blog</span>
          </a>
          <meta itemprop="position" content="2" />
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" href="1-sample-post1.html">
            <span itemprop="name">Lorem ipsum dolor sit amet</span>
          </a>
          <meta itemprop="position" content="3" />
        </li> -->
      </ol>
    </nav>
  </div>
</div>

<div class="container">
  <div class="row">
    <div id="left-column" class="col-xs-12 col-sm-4 col-md-3">

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



    <div id="content-wrapper" class="left-column col-xs-12 col-sm-8 col-md-9">

      <script type="text/javascript">
        ybc_blog_report_url = '../../module/ybc_blog/report.html';
        ybc_blog_report_warning = 'Do you want to report this comment?';
        ybc_blog_error = 'There was a problem while submitting your report. Try again later';                    
      </script>
      <div class="ybc_blog_layout_large_grid ybc-blog-wrapper-detail" itemscope
        itemType="http://schema.org/BlogPosting">
        <div class="ybc-blog-wrapper-content">
          <h1 class="page-heading product-listing" itemprop="mainEntityOfPage"><span class="title_cat"
              itemprop="headline">{{ $news->title }}</span></h1>
          <div class="post-details">
            <div class="blog-extra">
              <div class="ybc-blog-latest-toolbar">

                <span class="post-date">
                  <span class="be-label">Ngày đăng: </span>
                  <span>{{ date('d-m-Y', strtotime($news->created_at)) }}</span>
                </span>
              </div>
            </div>
            <div class="blog_description">
              {!! $news->description !!}
            </div>
            <div class="blog_description">
              {!! $news->content !!}
            </div>
          </div>
          @if ($allNews->count() != 0)
          <div class="ybc-blog-related-posts ybc_blog_related_posts_type_carousel">
            <h4 class="title_blog">Tin tức khác</h4>
            <div class="ybc-blog-related-posts-wrapper">
              <ul class="ybc-blog-related-posts-list">

                @foreach ( $allNews as $key => $item)
                <li class="ybc-blog-related-posts-list-li thumbnail-container">
                  <a class="ybc_item_img" href="{{ route('detail-news', ["slug" => $item->slug]) }}">
                    <img
                      src="{{ getImage($item->image) }}"
                      alt="{{ $item->title }}" />
                  </a>
                  <a class="ybc_title_block" href="{{ route('detail-news', ["slug" => $item->slug]) }}">{{ $item->title }}</a>
                  <div class="ybc-blog-sidear-post-meta">
                    <span class="post-date">{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                  </div>

                  <div class="blog_description">{!! $item->description !!}</div>

                </li>
                @endforeach
              </ul>
            </div>
          </div>
          @endif
        </div>
      </div>

    </div>

  </div>
</div>
</section>
@endsection
