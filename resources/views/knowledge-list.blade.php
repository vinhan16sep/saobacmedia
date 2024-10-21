@extends('layouts.app')

@section('meta_title', "Kiến thức")
@section('meta_keyword', "Kiến thức")
@section('meta_description', "Kiến thức")
@section('meta_image', "Kiến thức")

@section('content')

   <div class="bz_inner_page_navigation float_left">
      <div class="container custom_container">
            <div class="inner_menu float_left">
               <ul>
                  <li>
                        <a>
                           <span><i class="fas fa-home"></i></span>
                        </a>
                  </li>
                  <li>
                        <a href="{{ route("category-list-knowledge") }}">
                           <span><i class="fas fa-angle-right"></i></span> Kiến thức
                        </a>
                  </li>
                  <li>
                     <a>
                        <span><i class="fas fa-angle-right"></i></span> {{ $category->name }}
                     </a>
                  </li>
               </ul>
            </div>
      </div>
   </div>

   <div class="bz_product_grid_content_main_wrapper float_left">
      <div class="container custom_container">
        <div class="row">
          <div class="col-lg-3 col-md-3 col-12 order-sm-9 order-xs-9 order-12 order-lg-0 order-md-0">
            <div class="checkout_form float_left">
              <div class="accordion" id="accordionExample">
                <div class="accordian_first_wrapper float_left">
                  <div class="card checkout_accord">
                    <div class="card-header accord_header" id="headingOne">
                      <h2 class="mb-0"> Tìm kiếm tin tức </h2>
                    </div>
                    <div class="card-body accord_body">
                      <div class="search_blog">
                        <form>
                          <input type="text" name="keyword" placeholder="Từ khóa tìm kiếm" value="{{ $keywork }}">
                          <button>
                            <i class="fa fa-search"></i>
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
  
                <div class="accordian_first_wrapper float_left  d-none">
                  <div class="card checkout_accord">
                    <div class="card-header accord_header" id="headingTwo">
                      <h2 class="mb-0"> Categories </h2>
                    </div>
                    <div class="card-body accord_body">
                      <div class="categories_blog">
                        <ul>
                          <li>
                            <i class="fa fa-caret-right"></i>
                            <a href="#">Red Wine</a>
                            <span>[245]</span>
                          </li>
                          <li>
                            <i class="fa fa-caret-right"></i>
                            <a href="#">Event Wine</a>
                            <span>[142]</span>
                          </li>
                          <li>
                            <i class="fa fa-caret-right"></i>
                            <a href="#">Vine Yard</a>
                            <span>[654]</span>
                          </li>
                          <li>
                            <i class="fa fa-caret-right"></i>
                            <a href="#">Wine Gold</a>
                            <span>[50]</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
  
                <div class="accordian_first_wrapper float_left">
                  <div class="card checkout_accord">
                    <div class="card-header accord_header" id="headingThree">
                      <h2 class="mb-0"> Kiến thức mới nhất </h2>
                    </div>
                    <div class="card-body accord_body">
                      @foreach ($latestKnowledges as $item)
                        <div class="blog_post float_left">
                          <div class="post_img">
                            <img class="img-fluid" src="{{ getImage($item->image) }}" alt="{{ $item->title }}">
                          </div>
                          <div class="post_cont">
                            <h4 class="content-title">
                              <a href="{{ route("detail-knowledge", ["slug" => $item->slug, "category" => $item->category->slug ]) }}">{{ $item->title }}</a>
                            </h4>
                            <p>{{ $item->updated_at->format("d/m/Y") }}</p>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                
                <div class="accordian_first_wrapper float_left">
                  <div class="card checkout_accord">
                    <div class="card-header accord_header" id="headingFive">
                      <h2 class="mb-0"> Sản phẩm mới nhất </h2>
                    </div>
                    <div class="card-body accord_body">
                      @foreach ($latestProducts as $product)
                        <div class="latest_prod float_left">
                          <div class="latest_img">
                            <img class="img-fluid" src="{{ getImage($product->image) }}" alt="{{ $product->name }}">
                          </div>
                          <div class="latest_cont">
                            <h4 class="content-title">
                              <a href="{{ route("san-pham", ["slug" => $product->slug]);}}">{{ $product->name }}</a>
                            </h4>
                            <p>
                              @if($product->is_discount)
                                  {{ numberFormat($product->discount_value) }}₫
                                  <span> <del>{{ numberFormat($product->price) }}₫</del> </span>
                              @else
                                  {{ numberFormat($product->price) }}₫
                              @endif
                            </p>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-md-9 col-12">
            @if (!empty($category->description))
               <div>
                  <p>
                     {!! $category->description !!}
                  </p>
                  <br>
               </div>
            @endif
            @foreach ($knowledges as $item)
               @php
                  $route = route("detail-knowledge", ["slug" => $item->slug, "category" => $item->category->slug ])
               @endphp

               <div class="blog_list_main_wrapper float_left">
                  <div class="row">
                  <div class="col-lg-6 col-md-12 col-12">
                     <div class=" float_left">
                        <div class="news_slider_box_img">
                        <img class="img-fluid" src="{{ getImage($item->image) }}" alt="img">
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-12">
                     <div class="blog_list_content float_left">
                        <div class="news_slider_box_details_inner float_left">
                        <h3>
                           <a href="{{ $route }}">{{ $item->title }}</a>
                        </h3>
                        <ul>
                           <li>
                              <a>Tạo bởi Admin</a>
                           </li>
                           <li>
                              <a href="#">{{ $item->updated_at->format("d/m/Y")}}</a>
                           </li>
                        </ul>
                        <p>{{ $item->description }}</p>
                        <a class="read_more" href="{{ $route }}">Xem Thêm</a>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            @endforeach

            <div class="page_pagination">
               {!! $knowledges->onEachSide(0)->links("simple-bootstrap-4") !!}
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
