@php
    if (isset($is_combo)) {
        $route = route("combo");
    } elseif (isset($is_accessory)) {
        $route = route("category-detail-accessory", ["category" => $category->slug]);
    } else {
        $route = route( $country ? "country" : "ruou-vang", ["country" => $country ? $country->slug : null]);
    }
@endphp
<form method="get" action="{{ $route }}" id="sidebar-from" enctype="multipart/form-data">
    @if (isset($is_combo))
        <div class="accordian_first_wrapper float_left">
            <div class="card checkout_accord">
                <div class="card-header accord_header" id="headingTwo">
                    <h2 class="mb-0">
                        Tìm kiếm
                    </h2>
                </div>
                <div class="card-body accord_body">
                    <div id="search_open" class="lv_search_box" style="display: block;">
                        <input name="keyword" class="input-search" type="text" value="{{ request()->keyword }}" placeholder="Nhập từ khóa...">
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="accordian_first_wrapper float_left">
        <div class="card checkout_accord">
            <div class="card-header accord_header" id="headingTwo">
                <h2 class="mb-0">
                    Sắp xếp theo
                </h2>
            </div>
            <div class="card-body accord_body price_range">
                <select id="sort" name="orderBy" class="sidebar_action">
                    @foreach($sorts as $key => $val)
                        <option  value="{{ $key }}" {{ $key == request()->orderBy ? "selected" : "" }}>{{ $val["title"] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="accordian_first_wrapper float_left">
        <div class="card checkout_accord">
            <div class="card-header accord_header" id="headingTwo">
                <h2 class="mb-0">
                    Giá
                </h2>
            </div>
            <div class="card-body accord_body price_range">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="d-flex relative box-input">
                            <span class="filter-price">Từ:</span> <input data-type="number" type="text" name="min_price" class="min_price_{{ $sidebar_type }}" value="{{ request("min_price", 0) }}">
                            <span class="currency">₫</span>
                        </label>
                        <label class="d-flex relative box-input">
                            <span class="filter-price">Đến:</span> <input data-type="number" type="text" name="max_price" class="max_price_{{ $sidebar_type }}" value="{{ request("max_price", $product_price_max) }}">
                            <span class="currency">₫</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="accordian_first_wrapper float_left">
        <div class="card checkout_accord">
            <div class="card-header accord_header" id="headingTwo">
                <h2 class="mb-0">
                    Giá
                </h2>
            </div>
            <div class="card-body accord_body price_range">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="slider-range-{{ $sidebar_type }}"></div>
                        <p><span class="amount_{{ $sidebar_type }}">{{ number_format(request("min_price", 0)) }}đ - {{ number_format(request("max_price", $product_price_max)) }}đ</span> </p>
                        <input type="hidden" name="min_price" class="min_price_{{ $sidebar_type }}" readonly="" value="{{ request("min_price", 0) }}">
                        <input type="hidden" name="max_price" class="max_price_{{ $sidebar_type }}" readonly="" value="{{ request("max_price", $product_price_max) }}">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @if (isset($types))
        <div class="accordian_first_wrapper float_left">
            <div class="card checkout_accord">
                <div class="card-header accord_header" id="headingThree">
                    <h2 class="mb-0">
                        Loại vang
                    </h2>
                </div>
                <div class="card-body accord_body">
                    <div class="select_categories">
                        @foreach($types as $type)
                            <p class="cc_pc_color7">
                                <input class="sidebar_action" {{ in_array($type->slug, request('types', [])) ? 'checked' : '' }} type="checkbox" id="{{ $sidebar_type }}{{ $type->slug }}" name="types[{{ $type->id }}]" value="{{ $type->slug }}">
                                <label for="{{ $sidebar_type }}{{ $type->slug }}"> {{ $type->name }}</label>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (isset($regions))
        <div class="accordian_first_wrapper float_left">
            <div class="card checkout_accord">
                <div class="card-header accord_header" id="headingThree">
                    <h2 class="mb-0">
                        Vùng trồng nho
                    </h2>
                </div>
                <div class="card-body accord_body">
                    <div class="select_categories">
                        @foreach($regions as $region)
                            <p class="cc_pc_color7">
                                <input class="sidebar_action" {{ in_array($region->slug, request('regions', [])) ? 'checked' : '' }} type="checkbox" id="{{ $sidebar_type }}{{ $region->slug }}" name="regions[{{ $region->id }}]" value="{{ $region->slug }}">
                                <label for="{{ $sidebar_type }}{{ $region->slug }}"> {{ $region->name }}</label>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (isset($grapes))
        <div class="accordian_first_wrapper float_left">
            <div class="card checkout_accord">
                <div class="card-header accord_header" id="headingThree">
                    <h2 class="mb-0">
                        Giống nho
                    </h2>
                </div>
                <div class="card-body accord_body">
                    <div class="select_categories">
                        @foreach($grapes as $grape)
                            @if (strpos($grape->name, ",") !== FALSE)
                                @continue
                            @endif
                            <p class="cc_pc_color7">
                                <input class="sidebar_action" type="checkbox" {{ in_array($grape->slug, request('grapes', [])) ? 'checked' : '' }} id="{{ $sidebar_type }}{{ $grape->slug }}" name="grapes[{{ $grape->id }}]" value="{{ $grape->slug }}">
                                <label for="{{ $sidebar_type }}{{ $grape->slug }}"> {{ $grape->name }}</label>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="accordian_first_wrapper float_left box-button-search">
        <button class="btn btn-default" type="submit">Tìm kiếm</button>
    </div>
</form>
