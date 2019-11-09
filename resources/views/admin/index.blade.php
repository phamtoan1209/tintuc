@extends('admin._partials.master')
@section('title','Admin - Home')
@section('content')
<section class="content">
    @if(in_array('superadmin',$currentAdmin->roles()))
        <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$categorys}}</h3>

                    <p>Danh mục</p>
                </div>
                <div class="icon">
                    <i class="fa fa-list"></i>
                </div>
                <a href="{{route('categorys.list')}}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$products}}</h3>

                    <p>Sản phẩm( {{$productOff}} ẩn - {{$products - $productOff}} hiển thị )</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('products.list')}}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$posts}}</h3>

                    <p>Tin tức( {{$postOff}} ẩn - {{$posts - $postOff}} hiển thị )</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('posts.list')}}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$admins}}</h3>
                    <p>Nguời quản trị</p>
                </div>
                <div class="icon">
                    <i class="fa fa-key"></i>
                </div>
                <a href="{{route('admins.list')}}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        {{--<div class="col-lg-3 col-xs-6">--}}
            {{--<!-- small box -->--}}
            {{--<div class="small-box bg-fuchsia">--}}
                {{--<div class="inner">--}}
                    {{--<h3>{{$supports}}</h3>--}}
                    {{--<p>Nguời hỗ trợ</p>--}}
                {{--</div>--}}
                {{--<div class="icon">--}}
                    {{--<i class="fa fa-user"></i>--}}
                {{--</div>--}}
                {{--<a href="{{route('supports.list')}}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-lg-3 col-xs-6">--}}
            {{--<!-- small box -->--}}
            {{--<div class="small-box bg-purple">--}}
                {{--<div class="inner">--}}
                    {{--<h3>{{$supports}}</h3>--}}
                    {{--<p>Cửa hàng</p>--}}
                {{--</div>--}}
                {{--<div class="icon">--}}
                    {{--<i class="fa fa-map-signs"></i>--}}
                {{--</div>--}}
                {{--<a href="{{route('stores.list')}}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>
    @endif
</section>
@stop
