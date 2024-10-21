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
          <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="contact-us.html">
              <span itemprop="name">Liên hệ</span>
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

              <div id="content" class="page-content card card-block">


                <div class="page_contact_layout1 col-xs-12 col-sm-12">
                  <div class="embe_map_contact">
                    <iframe width="2000" height="400" style="border:0;"
                      src="{{ $contactInformations['google_map'] }}"></iframe>
                  </div>
                  <div class="contact-rich">
                    <div class="block">
                      <div class="icon"><i class="material-icons">place</i></div>
                      <div class="data">Địa chỉ:<br />
                      {{ $contactInformations['address'] }}</div>
                    </div>

                    <div class="block">
                      <div class="icon"><i class="material-icons">local_phone</i></div>
                      <div class="data">
                        Gọi cho chúng tôi:<br />
                        <a href="tel:{{ strip_tags($contactInformations['phone']) }}">{{ strip_tags($contactInformations['phone']) }}</a>
                      </div>
                    </div>

                    <div class="block">
                      <div class="icon"><i class="material-icons">mail_outline</i></div>
                      <div class="data email">
                        Email:<br />
                        <a
                          href="mailto:{{ $contactInformations['email'] }}"><span
                            class="__cf_email__">{{ $contactInformations['email'] }}</span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- end wrapper -->
@endsection


@section('script')
<script src="{{ asset('js/jquery.validate.js') }}"></script>
@endsection