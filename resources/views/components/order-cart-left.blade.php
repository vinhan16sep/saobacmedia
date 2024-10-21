@if ($count > 0)
    <form id="form-update-cart" method="post">
        <div class="bz_cart_main_wrapper float_left">
            <div class="cart_tbl">
                <div class="table table-responsive">
                    <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th class="text-right w-150">Sản phẩm</th>
                            <th></th>
                            <th class="mw-130 text-center">Số lượng</th>
                            <th class="mw-130 text-right">Đơn giá</th>
                            <th class="mw-130 text-right">Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $key => $item)
                            <tr>
                                <td class="mw-130 text-right">
                                    <a class="close_btn" data-id="{{ $key }}"><i class="fa fa-times"></i></a>
                                    @if ($item->options->has("image"))
                                        <img class="img-fluid cart" src="{{ getImage($item->options->image) }}" alt="{{ $item->name }}">
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="number_pluse cart">
                                    <input class="qty-product" type="number" min="1" data-old-value="{{ $item->qty }}" value="{{ $item->qty }}" name="rowid[{{$key}}][quantity]">
                                    </div>
                                </td>
                                <td class="text-right">{{ numberFormat($item->price) }}₫</td>
                                <td class="text-right">{{ numberFormat($item->price*$item->qty) }}₫</td>
                            </tr>
                            @if ($item->options->has("products"))
                                @php
                                    $products = $item->options->products;
                                @endphp
                                @foreach ($products as $key => $productCart)
                                    <tr>
                                        <td class="mw-130 text-right">
                                            @if (!empty($productCart["options"]["image"]))
                                                <img class="img-fluid cart" src="{{ getImage($productCart["options"]["image"]) }}" alt="{{ $productCart["name"] }}">
                                            @endif
                                        </td>
                                        <td>{{ $productCart["name"] }}</td>
                                        <td>
                                            <div class="number_pluse cart text-center">
                                                {{ $productCart["qty"]*$item->qty }}
                                            </div>
                                        </td>
                                        <td class="text-right">{{ numberFormat($productCart["price"]) }}₫</td>
                                        <td class="text-right">{{ numberFormat($productCart["price"]*$productCart["qty"]*$item->qty) }}₫</td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                    </table>
                </div>
                <div class="cart_coupan">
                    <div class="d-inline-flex mw-290">
                        <div>
                            <div class="d-inline-flex">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" name="code" placeholder="Nhập mã giảm giá" value="{{ session('discount_code') ? session('discount_code') : ""}}">
                                <button type="button" id="apply-discount-code">Áp dụng</button>
                            </div>
                        </div>
                    </div>
                    <div class="update_btn">
                        <a id="submit_cart" class="submit_btn btn disabled">Cập nhật </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@else
    <p class="zoom-area">Không có sản phẩm nào trong giỏ hàng</p>
    <a class="back-to-home" href="{{ route("home") }}">Quay lại trang chủ</a>
@endif