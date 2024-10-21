@extends('layouts.app')

@section('meta_title', "Liên hệ")
@section('meta_keyword', "Liên hệ")
@section('meta_description', "Liên hệ")
@section('meta_image', "Liên hệ")

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
          <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="javascript:void(0);">
              <span itemprop="name">Giới thiệu</span>
            </a>
            <meta itemprop="position" content="2" />
          </li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div id="content-wrapper">
        <div class="container">
          <div class="row">
            <div id="main">
              <header class="page-header">
                <h2>
                  Về chúng tôi
                </h2>
              </header>

              <section id="content" class="page-content page-cms page-cms-3 col-xs-12 col-sm-12">
                {!! $about->value !!}
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- end wrapper -->

@endsection