@php
    if (isset($is_combo)) {
        $route = route("detail-combo", ["slug" => $product->slug]);
    } elseif (isset($is_accessory)) {
        $route = route("detail-accessory", ["slug" => $product->slug, "category" => $product->category->slug ]);
    } else {
        $route = route("san-pham", ["slug" => $product->slug]);
    }
@endphp
<div class="product_box">
    <div class="product-custom" style="border-radius: 5px 5px 0 0;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
        <div class="product_img">
            <img class="img-fluid" src="{{ getImage($product->image) }}" alt="{{ $product->name }}">
            <div class="top_icon">
                @if($product->is_new)
                    <p class="new">new</p>
                @endif
                @if($product->is_highlight)
                    <p>Hot</p>
                @endif
            </div>
            <a href="{{ $route }}">
                <div class="product_overlay"></div>
            </a>
        </div>
    </div>
    <div class="product_content" style="border-radius: 0 0 5px 5px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
        <a href="{{ $route }}">
            <h3 class="woocommerce-loop-product__title" title="{{ $product->name }}">{{ $product->name }}</h3>
        </a>
        <h4>
            @if($product->is_discount)
                {{ numberFormat($product->discount_value) }}₫
                <span> <del>{{ numberFormat($product->price) }}₫</del> </span>
            @else
                {{ numberFormat($product->price) }}₫
            @endif
        </h4>
        @if (!isset($is_accessory))
            <a href="javascript:void(0)" class="btn btn-default buy_now add-to-cart" data-qty="1" data-id="{{ $product->id }}" data-type="{{ isset($is_combo) ? "combo" : "product" }}">Mua ngay</a>
        @endif
    </div>
</div>

