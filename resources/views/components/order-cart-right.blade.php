@if ($count > 0)
    <div class="your_order">

        <h3>Đơn đặt hàng của bạn</h3>
        <div class="order_details">
            @foreach ($cart as $item)
                <p class="text-black"> 
                    <span class="pr-5px">{{ $item->name }} × {{ $item->qty }}</span> 
                    <span class="bold">{{ numberFormat($item->price*$item->qty) }}₫</span>
                </p>
                @if ($item->options->has("products"))
                    @php
                        $products = $item->options->products;
                    @endphp
                    @foreach ($products as $key => $productCart)
                        <p class="text-black"> 
                            <span class="pr-5px">{{ $productCart["name"] }} × {{ $productCart["qty"]*$item->qty }}</span> 
                            <span class="bold opacity-04">{{ numberFormat($productCart["price"]*$productCart["qty"]*$item->qty) }}₫</span>
                        </p>
                    @endforeach
                @endif
            @endforeach
            <p class="sub_total">  
                <span>Tạm tính</span> 
                <span>{{ numberFormat($sub_total) }}₫</span>
            </p>
            @if ($discount_value)
                <p class="discounted">  
                    <span>Giảm giá</span> 
                    <span>{{ numberFormat($discount_value) }}₫</span>
                </p>
            @endif
        </div>
        <div class="order_rate float_left">
            <h3> 
                <span class="pr-5px fs-16">Tổng tiền thanh toán</span> 
                <span>{{ numberFormat($total) }}₫</span>
            </h3>
        </div>
        @if (isset($type) && $type == "checkout")
            <a class="placeholder_btn submit_payment">
                Đặt hàng
            </a>
        @else
            <a class="placeholder_btn" href="{{ route("checkout") }}">
                Tiến hành thanh toán
            </a>
        @endif
    </div>
@endif