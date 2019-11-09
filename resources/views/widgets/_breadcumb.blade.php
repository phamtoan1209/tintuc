<?php 
use App\Model\Category;
$name = $type == 'post' ? 'Tin tức' : 'Sản phẩm';
$prefix = $type == 'post' ? 'tin-tuc' : 'san-pham';
$urlCate = isset($cate) && isset($cate->large) && $cate->large != '' ? $cate->large : "images/bd-cate.jpg";
?>
<section class="form-group">
    <div class="banner-shop" style="background: url({{asset($urlCate)}});height: 220px;">
        <h1 class="shopcat-title">{{isset($cate) && !empty($cate) ? $cate->name : $name}}</h1>
    </div>
    <div class="breadcrumbs-yoat py-5">
        <div class="container">
            <p id="breadcrumbs">
            	<span><a href="{{route('home')}}">Trang chủ</a> </span>
            	@if(isset($cate) && !empty($cate->parent))
            		/ <span class="breadcrumb_last" aria-current="page"><a href="{{url($prefix.'/danh-muc/'.$cate->parent->slug)}}">{{$cate->parent->name}}</a></span>
				@endif
            	/ <span class="breadcrumb_last" aria-current="page">{{isset($cate) && !empty($cate) ? $cate->name : $name}}</span>
            </p>
        </div>
    </div>
</section>