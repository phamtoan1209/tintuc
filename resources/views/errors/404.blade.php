@extends('front._partials.master')
@section('title','Trang chủ')
@section('content')
    <div class="container text-center" style="padding-top: 20px">
        <h3>
            Xin lỗi chúng tôi không tìm thấy trang của bạn. <br>
            Quay lại <i class="fa fa-angle-double-right"></i> <a href="{{route('home')}}">trang chủ</a>
        </h3>
        <img src="{{asset('images/404.png')}}" alt="" width="100%">
    </div>
@stop