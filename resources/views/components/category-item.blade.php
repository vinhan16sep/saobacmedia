<div class="col-lg-4 col-md-4 col-12">
    <div class="news_slider_box float_left box-category">
        <a href="{{ $route }}">
            <div class="news_slider_box_img">
                <img class="img-fluid img-new" src="{{ getImage($item->image) }}" alt="{{ $item->title }}">
            </div>
            <div class="news_slider_box_details_inner float_left">
                <h3 class="m-0">
                    {{ $item->name}}
                </h3>
                <p>{{ $item->description}}</p>
            </div>
        </a>
    </div>
 </div>