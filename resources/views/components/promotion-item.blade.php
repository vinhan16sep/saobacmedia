@php
  $route = "";
  if ($item->item_type == 2 && !empty($item->combo)) {
      $route = route("detail-combo", ["slug" => $item->combo->slug]);
  } elseif ($item->item_type == 1 && !empty($item->product)) {
      $route = route("san-pham", ["slug" => $item->product->slug]);
  }
@endphp
<div class="col-lg-4 col-md-4 col-12">
    <div class="news_slider_box float_left">
      <div class="news_slider_box_img">
        <img class="img-fluid" src="{{ getImage($item->image) }}" alt="{{ $item->title }}">
      </div>
      <div class="news_slider_box_details_inner float_left">
        <h3>
          <a href="{{ $route }}">{{ $item->title}}</a>
        </h3>
        <div class="flex">
            <span>Đang diễn ra</span>
            <a class="read_more" href="{{ $route }}">Xem Thêm</a>
        </div>
      </div>
    </div>
</div>