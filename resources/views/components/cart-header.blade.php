<div class="cart_details">
    @if ($count > 0)
        <div class="total-count">
            <span id="count-item-cart">{{ $count }} SẢN PHẨM</span>
            <a href="{{ route("cart") }}">GIỎ HÀNG</a>
        </div>
        <div class="box-body-cart">
            @foreach ($cart as $key => $item)
                @php
                    if (count($item->options->products) > 0) {
                        $route = route("detail-combo", ["slug" => $item->options->slug]);
                    } else {
                        $route = route("san-pham", ["slug" => $item->options->slug]);
                    }
                @endphp
                <div class="cart_list">
                    <div class="select_cart {{ !$item->options->image ? 'full' : ''}}">
                        <a href="{{ $route }}">{{ $item->name }}</a>
                        <span>{{ $item->qty }} x {{ numberFormat($item->price) }}₫</span>
                    </div>
                    @if ($item->options->image)
                        <div class="select_img">
                            <img alt="{{ $item->name }}" src="{{ getImage($item->options->image) }}">
                        </div>
                    @endif
                    <div class="close_btn" data-id="{{ $key }}">
                        <i class="fa fa-times"></i>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="sub_total">
            <p>Tạm tính:<span>{{ numberFormat($sub_total) }}₫</span></p>
        </div>
        <div class="cart_btn text-center">
            <a href="{{ route("cart") }}"><i class="fas fa-shopping-cart"></i>&nbsp; Xem giỏ hàng</a>
            {{-- <a href="{{ route("checkout") }}"><i class="fas fa-share"></i>&nbsp; Thanh toán</a> --}}
        </div>
    @else
        <p class="text-center">Không có sản phẩm nào!</p>
    @endif
</div>