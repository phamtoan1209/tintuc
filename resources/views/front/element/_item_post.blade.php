<?php
use Illuminate\Support\Str;
?>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
    <div class="box-product">
        <a href="{{url('/tin-tuc/'.$data->slug)}}">
            <div class="img">
                <img class="img-responsive" src="{{asset($data->thumb)}}" alt="{{$data->name}}">
            </div>
            <div class="info">
                <h3>{{$data->name}}</h3>
            </div>
        </a>
    </div>
    <a class="home-design-tab-cat-title" href="{{url('/tin-tuc/'.$data->slug)}}"><span>{{Str::words($data->name,30,' ...')}}</span></a>
</div>