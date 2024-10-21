
<div class="site-wrapper" id="top">
  <div class="site-header d-none d-lg-block">
      <div class="header-middle pt--10 pb--10">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-6 ">
                      <a href="/" class="site-brand">
                          <img src="image/logo.png" alt="">
                      </a>
                  </div>
                  <div class="col-lg-6">
                      <div class="main-navigation flex-lg-right">
                          <ul class="main-menu menu-right ">
                              <li class="menu-item has-children">
                                  <a href="/">Trang chủ</a>
                              </li>
                              <li class="menu-item has-children mega-menu">
                                  <a href="{{ route('books') }}">Tủ sách</a>
                              </li>
                              <li class="menu-item has-children">
                                  <a href="javascript:void(0)">Sự kiện</a>
                              </li>
                              <li class="menu-item">
                                  <a href="contact.html">Liên hệ</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="site-mobile-menu">
      <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
          <div class="container">
              <div class="row align-items-sm-end align-items-center">
                  <div class="col-md-4 col-7">
                      <a href="/" class="site-brand">
                          <img src="image/logo.png" alt="">
                      </a>
                  </div>
                  <div class="col-md-5 order-3 order-md-2">
                  </div>
                  <div class="col-md-3 col-5  order-md-3 text-right">
                      <div class="mobile-header-btns header-top-widget">
                          <ul class="header-links">
                              <li class="sin-link">
                                  <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                          class="ion-navicon"></i></a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </header>
      <!--Off Canvas Navigation Start-->
      <aside class="off-canvas-wrapper">
          <div class="btn-close-off-canvas">
              <i class="ion-android-close"></i>
          </div>
          <div class="off-canvas-inner">
              <!-- search box start -->
              <div class="search-box offcanvas">
                  <form>
                      <input type="text" placeholder="Search Here">
                      <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                  </form>
              </div>
              <!-- search box end -->
              <!-- mobile menu start -->
              <div class="mobile-navigation">
                  <!-- mobile menu navigation start -->
                  <nav class="off-canvas-nav">
                      <ul class="mobile-menu main-mobile-menu">
                          <li class="menu-item-has-children">
                              <a href="/">Trang chủ</a>
                          </li>
                          <li class="menu-item-has-children">
                              <a href="{{ route('books') }}">Tủ sách</a>
                          </li>
                          <li class="menu-item-has-children">
                              <a href="#">Sự kiện</a>
                          </li>
                          <li><a href="contact.html">Liên hệ</a></li>
                      </ul>
                  </nav>
                  <!-- mobile menu navigation end -->
              </div>
          </div>
      </aside>
      <!--Off Canvas Navigation End-->
  </div>
  <div class="sticky-init fixed-header common-sticky">
      <div class="container d-none d-lg-block">
          <div class="row align-items-center">
              <div class="col-lg-4">
                  <a href="/" class="site-brand">
                      <img src="image/logo.png" alt="">
                  </a>
              </div>
              <div class="col-lg-8">
                  <div class="main-navigation flex-lg-right">
                      <ul class="main-menu menu-right ">
                          <li class="menu-item has-children">
                              <a href="/">Trang chủ</a>
                          </li>
                          <li class="menu-item has-children mega-menu">
                              <a href="{{ route('books') }}">Tủ sách</a>
                          </li>
                          <li class="menu-item has-children">
                              <a href="javascript:void(0)">Sự kiện</a>
                          </li>
                          <li class="menu-item">
                              <a href="contact.html">Liên hệ</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  <!--=================================
  Footer
  ===================================== -->
  <!-- Modal -->
  <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
      aria-labelledby="quickModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="product-details-modal">
                  <div class="row">
                      <div class="col-lg-5">
                          <!-- Product Details Slider Big Image-->
                          <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
                              "slidesToShow": 1,
                              "arrows": false,
                              "fade": true,
                              "draggable": false,
                              "swipe": false,
                              "asNavFor": ".product-slider-nav"
                              }'>
                              <div class="single-slide">
                                  <img src="image/products/product-details-1.jpg" alt="">
                              </div>
                              <div class="single-slide">
                                  <img src="image/products/product-details-2.jpg" alt="">
                              </div>
                              <div class="single-slide">
                                  <img src="image/products/product-details-3.jpg" alt="">
                              </div>
                              <div class="single-slide">
                                  <img src="image/products/product-details-4.jpg" alt="">
                              </div>
                              <div class="single-slide">
                                  <img src="image/products/product-details-5.jpg" alt="">
                              </div>
                          </div>
                          <!-- Product Details Slider Nav -->
                          <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
                              data-slick-setting='{
                                "infinite":true,
                                    "autoplay": true,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow": 4,
                                    "arrows": true,
                                    "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
                                    "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
                                    "asNavFor": ".product-details-slider",
                                    "focusOnSelect": true
                                    }'>
                              <div class="single-slide">
                                  <img src="image/products/product-details-1.jpg" alt="">
                              </div>
                              <div class="single-slide">
                                  <img src="image/products/product-details-2.jpg" alt="">
                              </div>
                              <div class="single-slide">
                                  <img src="image/products/product-details-3.jpg" alt="">
                              </div>
                              <div class="single-slide">
                                  <img src="image/products/product-details-4.jpg" alt="">
                              </div>
                              <div class="single-slide">
                                  <img src="image/products/product-details-5.jpg" alt="">
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-7 mt--30 mt-lg--30">
                          <div class="product-details-info pl-lg--30 ">
                              <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
                              <h3 class="product-title">Beats EP Wired On-Ear Headphone-Black</h3>
                              <ul class="list-unstyled">
                                  <li>Ex Tax: <span class="list-value"> £60.24</span></li>
                                  <li>Brands: <a href="#" class="list-value font-weight-bold"> Canon</a></li>
                                  <li>Product Code: <span class="list-value"> model1</span></li>
                                  <li>Reward Points: <span class="list-value"> 200</span></li>
                                  <li>Availability: <span class="list-value"> In Stock</span></li>
                              </ul>
                              <div class="price-block">
                                  <span class="price-new">£73.79</span>
                                  <del class="price-old">£91.86</del>
                              </div>
                              <div class="rating-widget">
                                  <div class="rating-block">
                                      <span class="fas fa-star star_on"></span>
                                      <span class="fas fa-star star_on"></span>
                                      <span class="fas fa-star star_on"></span>
                                      <span class="fas fa-star star_on"></span>
                                      <span class="fas fa-star "></span>
                                  </div>
                                  <div class="review-widget">
                                      <a href="#">(1 Reviews)</a> <span>|</span>
                                      <a href="#">Write a review</a>
                                  </div>
                              </div>
                              <article class="product-details-article">
                                  <h4 class="sr-only">Product Summery</h4>
                                  <p>Long printed dress with thin adjustable straps. V-neckline and wiring under
                                      the Dust with ruffles
                                      at the bottom
                                      of the
                                      dress.</p>
                              </article>
                              <div class="add-to-cart-row">
                                  <div class="count-input-block">
                                      <span class="widget-label">Qty</span>
                                      <input type="number" class="form-control text-center" value="1">
                                  </div>
                                  <div class="add-cart-btn">
                                      <a href="#" class="btn btn-outlined--primary"><span
                                              class="plus-icon">+</span>Add to Cart</a>
                                  </div>
                              </div>
                              <div class="compare-wishlist-row">
                                  <a href="#" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                                  <a href="#" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <div class="widget-social-share">
                      <span class="widget-label">Share:</span>
                      <div class="modal-social-share">
                          <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                          <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                          <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                          <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>