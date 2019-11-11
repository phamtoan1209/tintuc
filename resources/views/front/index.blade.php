@extends('front._partials.master')
@section('title','Trang chủ')
@section('content')
    <article>
        {!! view('front.element._slide') !!}
        <section>
            <div id="home-info-wrap-title">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                            <div class="vc_text_separator wpb_content_element full home-info-new-title">
                                <div class="separator_wrapper">
                                    <div class="separator_content" style="border-color:#d7d7d7; color:#393939;"> <span>NAME COMPANY - SẢN PHẨM PHONG CÁCH HIỆN ĐẠI</span></div>
                                </div>
                                <div class="separator_line" style="background-color:#d7d7d7;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container container-sanpham">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 archive-main-content archive-main-content-duan">
                        <div id="archive-main-content-duan">
                            <div class="row">
                                @if(isset($products))
                                    @foreach($products as $product)
                                        {!! view('front.element._item_product')->with(['data' => $product]) !!}
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <p class="pull-right">
                            <a href="{{url('san-pham')}}">Xem tất cả >></a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div id="home-info-wrap-title">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                            <div class="vc_text_separator wpb_content_element full home-info-new-title">
                                <div class="separator_wrapper">
                                    <div class="separator_content" style="border-color:#d7d7d7; color:#393939;"> <span> THIẾT KẾ PHONG CÁCH HIỆN ĐẠI</span></div>
                                </div>
                                <div class="separator_line" style="background-color:#d7d7d7;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div id="home-design-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="home-design-tabs" class="clearfix prd-tab">
                                <ul class="nav nav-tabs">
                                    @if(isset($categoryPostHot))
                                        @foreach($categoryPostHot as $item)
                                            <li ><a href="{{url('/tin-tuc/danh-muc/'.$item['slug'])}}">{{$item['name']}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                                <ul class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="page-tab1">
                                        <div class="slider multiple-items ">
                                            <div class="row">
                                                @if(isset($posts))
                                                    @foreach($posts as $post)
                                                        {!! view('front.element._item_post')->with(['data' => $post]) !!}
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                                <div class="col-xs-12">
                                    <p class="pull-right">
                                        <a href="{{url('tin-tuc')}}">Xem tất cả >></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('front.element._why_me')
        @include('front.element._form_contact')
    </article>
@stop