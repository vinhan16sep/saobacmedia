<div class="col-lg-6 col-md-6 col-12">
   <div class="news_slider_box float_left">
     <div class="news_slider_box_img">
       <img class="img-fluid" src="{{ getImage($item->image) }}" alt="{{ $item->title }}">
     </div>
     <div class="news_slider_box_details_inner float_left">
       <h3>
         <a href="{{ $route }}">{{ $item->title}}</a>
       </h3>
       <ul>
         <li>
          <a>Tạo bởi Admin</a>
         </li>
         <li>
           <a>{{ $item->updated_at->format("d/m/Y")}}</a>
         </li>
       </ul>
       <p>{{ $item->description}}</p>
       <a class="read_more" href="{{ $route }}">Xem Thêm</a>
     </div>
   </div>
 </div>