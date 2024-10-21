<div>
    <u></u>
    <div marginwidth="0" marginheight="0" style="background-color:#f5f5f5;padding:0;text-align:center" bgcolor="#f5f5f5">
    <table width="100%" style="background-color:#f5f5f5" bgcolor="#f5f5f5">
        <tbody>
        <tr>
            <td></td>
            <td width="600">
            <div dir="ltr" style="margin:0 auto;padding:70px 0;width:100%;max-width:600px" width="100%">
                <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tbody>
                    <tr>
                    <td align="center" valign="top">
                        <div></div>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#fdfdfd;border:1px solid #dcdcdc;border-radius:3px" bgcolor="#fdfdfd">
                        <tbody>
                            <tr>
                            <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#4d0322;color:#fff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0" bgcolor="#4d0322">
                                <tbody>
                                    <tr>
                                    <td style="padding:36px 48px;display:block">
                                        <h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#fff;background-color:inherit" bgcolor="inherit">
                                            @if ($is_admin)
                                                Thông tin đơn hàng
                                            @else
                                                Cảm ơn bạn đã đặt hàng
                                            @endif
                                        </h1>
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </td>
                            </tr>
                            <tr>
                            <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                <tbody>
                                    <tr>
                                    <td valign="top" style="background-color:#fdfdfd" bgcolor="#fdfdfd">
                                        <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                            <td valign="top" style="padding:48px 48px 32px">
                                                <div style="color:#6b3337;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left" align="left">
                                                    @if (!$is_admin)
                                                        <p style="margin:0 0 16px">
                                                            Xin chào {{ $order->order_customer->name }},
                                                        </p>
                                                    @endif
                                                    <h2 style="color:#4d0322;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left"> 
                                                        [Mã đơn hàng #{{ $order->code }}] ({{ date("d/m/Y", strtotime($order->created_at)) }})
                                                    </h2>
                                                    <div style="margin-bottom:40px">
                                                        <table cellspacing="0" cellpadding="6" border="1" style="color:#6b3337;border:1px solid #e4e4e4;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" style="color:#6b3337;border:1px solid #e4e4e4;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                    Sản phẩm
                                                                </th>
                                                                <th scope="col" style="color:#6b3337;border:1px solid #e4e4e4;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                    Số lượng
                                                                </th>
                                                                <th scope="col" style="color:#6b3337;border:1px solid #e4e4e4;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                    Giá
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $orderItems = $order->order_items;
                                                            @endphp
                                                            @foreach ($orderItems as $item)
                                                                @php
                                                                    $product = !empty($item->product) ? $item->product : $item->combo;
                                                                    $products = !empty($product->products) ? $product->products : [];
                                                                @endphp
                                                                <tr>
                                                                    <td style="color:#6b3337;border:1px solid #e4e4e4;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word" align="left"> 
                                                                        {{ !empty($product) ? $product->name : "Không xác định" }}
                                                                    </td>
                                                                    <td style="color:#6b3337;border:1px solid #e4e4e4;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left"> 
                                                                        {{ $item->quantity }}
                                                                    </td>
                                                                    <td style="color:#6b3337;border:1px solid #e4e4e4;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left">
                                                                        <span>
                                                                            {{ numberFormat($item->price*$item->quantity) }} <span>₫</span>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                @foreach ($products as $subItem)
                                                                    <tr>
                                                                        <td style="color:#6b3337;border:1px solid #e4e4e4;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word" align="left"> 
                                                                            {{ $subItem->name }}
                                                                        </td>
                                                                        <td style="color:#6b3337;border:1px solid #e4e4e4;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left"> 
                                                                            {{ $item->quantity*$subItem->pivot->quantity }}
                                                                        </td>
                                                                        <td style="color:#6b3337;border:1px solid #e4e4e4;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left">
                                                                            <span><span></span></span>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th scope="row" colspan="2" style="color:#6b3337;border:1px solid #e4e4e4;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px" align="left">
                                                                    Tổng số phụ:
                                                                </th>
                                                                <td style="color:#6b3337;border:1px solid #e4e4e4;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px" align="left">
                                                                    <span>
                                                                        {{ numberFormat($order->total_price) }} <span>₫</span>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            @if (!empty($order->discounted_price))
                                                                <tr>
                                                                    <th scope="row" colspan="2" style="color:#6b3337;border:1px solid #e4e4e4;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px" align="left">
                                                                        Giảm giá:
                                                                    </th>
                                                                    <td style="color:#6b3337;border:1px solid #e4e4e4;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px" align="left">
                                                                        <span>
                                                                            {{ numberFormat($order->discounted_price) }} <span>₫</span>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            <tr>
                                                                <th scope="row" colspan="2" style="color:#6b3337;border:1px solid #e4e4e4;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                    Phương thức thanh toán:
                                                                </th>
                                                                <td style="color:#6b3337;border:1px solid #e4e4e4;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                    {{ \App\Models\Order::TYPE_PAYMENT[$order->payment_method] ?? "Không xác định" }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row" colspan="2" style="color:#6b3337;border:1px solid #e4e4e4;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                    Tổng cộng:
                                                                </th>
                                                                <td style="color:#6b3337;border:1px solid #e4e4e4;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                    <span>
                                                                        {{ numberFormat($order->total_price - (int)$order->discounted_price) }}&nbsp; <span>₫</span>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                        </table>
                                                    </div>
                                                    <table cellspacing="0" cellpadding="0" border="0" style="width:100%;vertical-align:top;margin-bottom:40px;padding:0" width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td valign="top" width="50%" style="text-align:left;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;border:0;padding:0" align="left">
                                                            <h2 style="color:#4d0322;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                                Địa chỉ thanh toán
                                                            </h2>
                                                            <address style="padding:12px;color:#6b3337;border:1px solid #e4e4e4"> 
                                                                {{ $order->order_customer->name }} <br>
                                                                {{ $order->order_customer->address }} <br>
                                                                <a href="tel:{{ $order->order_customer->phone }}" style="color:#4d0322;font-weight:normal;text-decoration:underline" target="_blank">
                                                                    {{ $order->order_customer->phone }}
                                                                </a>
                                                                <br>
                                                                <a href="mailto:{{ $order->order_customer->email }}" target="_blank">
                                                                    {{ $order->order_customer->email }}
                                                                </a>
                                                            </address>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    @if (!$is_admin)
                                                        <p style="margin:0 0 16px">
                                                            Chúng tôi đang tiến hành hoàn thiện đơn đặt hàng của bạn
                                                        </p>
                                                    @endif
                                                    <a target="_blank" style="background: #4d0322;color: #fff!important;width: 140px;text-align: center;height: 42px;line-height: 40px;font-size: 14px;border-radius: 4px;margin: 0 auto;display: block;    text-decoration: auto;" href="{{ route("order-received", ["code" => $order->code]) }}">
                                                        Chi tiết đơn hàng
                                                    </a>
                                                </div>
                                            </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </td>
                            </tr>
                        </tbody>
                        </table>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <div class="yj6qo"></div>
    <div class="adL"></div>
    </div>
    <div class="adL"></div>
</div>