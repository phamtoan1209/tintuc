@extends('front._partials.master')
@section('title','Về chúng tôi')
@section('content')
    @if(\app\Helpers\Helper::checkMobile())
        <style>
            .about-container .container img {
                width: 100% !important;
                height: auto !important;
            }
        </style>
    @endif
    <section>
        <div class="page-title py-5"><h1>Giới thiệu về Quyên Nguyễn</h1></div>
        <div class="breadcrumbs-yoat py-5">
            <div class="container">
                <p id="breadcrumbs"><span><span><a href="https://quyennguyen.vn/">Trang chủ</a> / <span class="breadcrumb_last" aria-current="page">Giới thiệu về Quyên Nguyễn</span></span></span></p>
            </div>
        </div>
    </section>
    <main>
        <div class="about-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        {!! $intro->content !!}
                    </div>
                </div>
            </div>
        </div>
    </main>

@stop