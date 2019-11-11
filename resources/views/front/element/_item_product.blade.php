<?php
use Illuminate\Support\Str;
?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 archive-main-content-duan-item1">
    <div class="box-product">
        <a href="{{url('/san-pham/'.$data->slug)}}">
            <div class="img">
                <img class="img-responsive" src="{{asset($data->thumb)}}" alt="{{$data->name}}">
            </div>
            <div class="discount {{$data->hot == 0 ? 'hidden' : '' }}">HOT</div>
            <div class="info">
                <h3>{{$data->name}}</h3>
            </div>
        </a>
    </div>
    <a class="home-design-tab-cat-title" href="{{url('/san-pham/'.$data->slug)}}"><span>{{Str::words($data->name,5,' ...')}}</span></a>
</div>
