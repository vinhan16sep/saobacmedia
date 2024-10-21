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
                        <a href="#">
                           <span><i class="fas fa-home"></i></span>
                        </a>
                  </li>
                  <li>
                        <a href="#">
                           <span><i class="fas fa-angle-right"></i></span> Kiến thức
                        </a>
                  </li>
               </ul>
            </div>
      </div>
   </div>

   <div class="bz_product_grid_content_main_wrapper float_left mt-10">
      <div class="container custom_container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <div class="row">
               @foreach ($knowledgeCategories as $item)
                  @php
                      $route = route("category-detail-knowledge", ["category" => $item->slug]);
                  @endphp
                  @include('components.category-item', ["item" => $item, "route" => $route])
               @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
