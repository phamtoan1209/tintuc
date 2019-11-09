<!doctype html>
<html class="no-js" lang="vi">
<head>
    <head>
        <meta name="google-site-verification" content="" />
        <meta http-equiv="content-type" content="text/html" charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        {!! \app\Helpers\Widgets::htmlSeo() !!}
        <link rel="icon" href="{{asset(isset($website['favicon']) ? $website['favicon'] : '')}}" type="image/x-icon" />
        <link href="{{asset('front/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
        <link href="{{asset('front/css/font-awesome.css')}}" rel="stylesheet">
        @include('front._partials._css')
        @yield('css')
    </head>
<body>
    @include('front._partials.header')
    @yield('content')
    @include('front._partials.footer')
    @include('front._partials._facebook_chat')
</body>
    <script src="{{asset('front/global/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('front/global/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/global/js/jquery.lazy.min.js')}}" type="text/javascript"></script>
    @include('front._partials._js')
    @yield('js')
</html>