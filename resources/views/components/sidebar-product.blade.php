
<div class="bz_product_grid_content_main_wrapper pt-0">
    <div class="checkout_form ">
        @if ($bestProducts->isNotEmpty())
            <div class="accordian_first_wrapper float_left">
                <div class="card checkout_accord">
                    <div class="card-header accord_header" id="headingFive">
                        <h2 class="mb-0 fw-18"> Sản phẩm bán chạy </h2>
                    </div>
                    <div class="card-body accord_body">
                        @foreach ($bestProducts as $item)
                            <div class="latest_prod float_left">
                                <div class="latest_img">
                                    <img class="img-fluid" src="{{ getImage($item->image) }}" alt="{{ $item->name }}">
                                </div>
                                <div class="latest_cont">
                                    <h4 class="content-title">
                                        <a href="{{ route("san-pham", ["slug" => $item->slug]);}}">{{ $item->name }}</a>
                                    </h4>
                                    <p>
                                        @if($item->is_discount)
                                            {{ numberFormat($item->discount_value) }}₫
                                            <span> <del>{{ numberFormat($item->price) }}₫</del> </span>
                                        @else
                                            {{ numberFormat($item->price) }}₫
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        @if (isset($countries))
            <div class="accordian_first_wrapper slidebar-product-detail float_left">
                <div class="card checkout_accord">
                    <div class="card-header accord_header" id="headingThree">
                        <h2 class="mb-0">
                            Quốc gia
                        </h2>
                    </div>
                    <div class="card-body accord_body">
                        <ul class="select_categories">
                            @foreach($countries as $country)
                                <li><a href="{{ route( "country", ["country" =>  $country->slug ]); }}">{{ $country["name"] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        @if (isset($types))
            <div class="accordian_first_wrapper slidebar-product-detail float_left">
                <div class="card checkout_accord">
                    <div class="card-header accord_header" id="headingThree">
                        <h2 class="mb-0">
                            Loại vang
                        </h2>
                    </div>
                    <div class="card-body accord_body">
                        <ul class="select_categories">
                            @foreach($types as $type)
                                <li><a href="{{ route("ruou-vang", ["types[" . $type->id . "]" => $type->slug]) }}">{{ $type["name"] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        @if (isset($grapes))
            <div class="accordian_first_wrapper slidebar-product-detail float_left">
                <div class="card checkout_accord">
                    <div class="card-header accord_header" id="headingThree">
                        <h2 class="mb-0">
                            Giống nho
                        </h2>
                    </div>
                    <div class="card-body accord_body">
                        <ul class="select_categories">
                            @foreach($grapes as $grape)
                                <li><a href="{{ route("ruou-vang", ["grapes[" . $grape->id . "]" => $grape->slug]) }}">{{ $grape["name"] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
