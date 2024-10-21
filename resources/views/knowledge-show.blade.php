@extends('layouts.app')

@section('meta_title', $knowledge->title)
@section('meta_keyword', $knowledge->title)
@section('meta_description', $knowledge->title)
@section('meta_image', $knowledge->title)

@section('content')

    <div class="bz_inner_page_navigation float_left">
      <div class="container custom_container">
        <div class="inner_menu float_left">
          <ul>
            <li>
              <a>
                <span>
                  <i class="fas fa-home"></i>
                </span>
              </a>
            </li>
            <li>
                <a href="{{ route("category-list-knowledge") }}">
                <span>
                  <i class="fas fa-angle-right"></i>
                </span> Kiến thức </a>
            </li>
            <li>
                <a href="{{ route("category-detail-knowledge", ["category" => $category->slug]) }}">
                <span>
                  <i class="fas fa-angle-right"></i>
                </span> {{ $category->name }} </a>
            </li>
            <li>
              <p>
                <span>
                  <i class="fas fa-angle-right"></i>
                </span> {{ $knowledge->title }} </p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="bz_product_grid_content_main_wrapper float_left">
      <div class="container custom_container">
        <div class="row">
          <div class="col-lg-9 col-md-9 col-12">
            <div class="row mb-20">
              <div class="col-lg-12 col-md-12 col-12">
                <div class="blog_video_sec float_left">
                  <h3 class="mt-0 mb-10">
                    {{ $knowledge->title }}
                  </h3>
                  <div class="content_single_product">
                    {!! $knowledge->content !!}
                  </div>
                </div>
                <div class="blog_post_title float_left p-10 d-none">
                  <div class="left_social">
                    <ul>
                      <li class="p-0">
                        <p>Share:</p>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-twitter"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-instagram"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-pinterest-p"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-12">
            <div class="checkout_form float_left">
              <div class="accordion" id="accordionExample">
                @if (isset($is_show))
                  <div class="accordian_first_wrapper float_left">
                    <div class="card checkout_accord">
                      <div class="card-header accord_header" id="headingOne">
                        <h2 class="mb-0"> Tìm kiếm </h2>
                      </div>
                      <div class="card-body accord_body">
                        <div class="search_blog">
                          <input type="text" placeholder="Search">
                          <button>
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordian_first_wrapper float_left">
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
                      <div class="card-header accord_header" id="headingFour">
                        <h2 class="mb-0"> Archives </h2>
                      </div>
                      <div class="card-body accord_body">
                        <div class="categories_blog">
                          <ul>
                            <li>
                              <i class="fa fa-caret-right"></i>
                              <a href="#">January 2020</a>
                            </li>
                            <li>
                              <i class="fa fa-caret-right"></i>
                              <a href="#">February 2020</a>
                            </li>
                            <li>
                              <i class="fa fa-caret-right"></i>
                              <a href="#">March 2020</a>
                            </li>
                            <li>
                              <i class="fa fa-caret-right"></i>
                              <a href="#">April 2020</a>
                            </li>
                            <li>
                              <i class="fa fa-caret-right"></i>
                              <a href="#">May 2020</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordian_first_wrapper float_left">
                    <div class="card checkout_accord">
                      <div class="card-header accord_header" id="headingFive">
                        <h2 class="mb-0"> Latest Product </h2>
                      </div>
                      <div class="card-body accord_body">
                        <div class="latest_prod float_left">
                          <div class="latest_img">
                            <img class="img-fluid" src="images/product1.png" alt="img">
                          </div>
                          <div class="latest_cont">
                            <h4>
                              <a href="#">Gallo</a>
                            </h4>
                            <ul class="star">
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                            </ul>
                            <p>$ 199.00</p>
                          </div>
                        </div>
                        <div class="latest_prod float_left">
                          <div class="latest_img">
                            <img class="img-fluid" src="images/product2.png" alt="img">
                          </div>
                          <div class="latest_cont">
                            <h4>
                              <a href="#">Beringer</a>
                            </h4>
                            <ul class="star">
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                            </ul>
                            <p>$ 199.00</p>
                          </div>
                        </div>
                        <div class="latest_prod float_left">
                          <div class="latest_img">
                            <img class="img-fluid" src="images/product3.png" alt="img">
                          </div>
                          <div class="latest_cont">
                            <h4>
                              <a href="#">Sutter Home</a>
                            </h4>
                            <ul class="star">
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <i class="fas fa-star"></i>
                                </a>
                              </li>
                            </ul>
                            <p>$ 199.00</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordian_first_wrapper float_left">
                    <div class="card checkout_accord">
                      <div class="card-header accord_header" id="headingSix">
                        <h2 class="mb-0"> Tag Cloud </h2>
                      </div>
                      <div class="card-body accord_body">
                        <div class="tag_cloud">
                          <ul>
                            <li>
                              <a href="#">Shopping</a>
                            </li>
                            <li>
                              <a href="#">Fashion</a>
                            </li>
                            <li>
                              <a href="#">Customer</a>
                            </li>
                            <li>
                              <a href="#">Market</a>
                            </li>
                            <li>
                              <a href="#">Style</a>
                            </li>
                            <li>
                              <a href="#">Wedgit</a>
                            </li>
                            <li>
                              <a href="#">Store</a>
                            </li>
                            <li>
                              <a href="#">Men</a>
                            </li>
                            <li>
                              <a href="#">Skill</a>
                            </li>
                            <li>
                              <a href="#">Design</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif

                @if ($knowledges->isNotEmpty())
                  <div class="accordian_first_wrapper float_left">
                    <div class="card checkout_accord">
                      <div class="card-header accord_header" id="headingThree">
                        <h2 class="mb-0"> Kiến thức mới nhất </h2>
                      </div>
                      <div class="card-body accord_body">
                        @foreach ($knowledges as $item)
                          <div class="blog_post float_left">
                            <a href="{{ route("detail-knowledge", ["slug" => $item->slug, "category" => $item->category->slug ]) }}">
                              <div class="post_img">
                                <img class="img-fluid" src="{{ getImage($item->image) }}" alt="{{ $item->title }}">
                              </div>
                              <div class="post_cont">
                                <h4 class="new-title-sidebar">
                                  {{ $item->title }}
                                </h4>
                                <p>{{ $item->created_at->format("d/m/Y") }}</p>
                              </div>
                            </a>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
