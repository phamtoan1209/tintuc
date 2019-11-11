@extends('front._partials.master')
@section('title','Trang chủ')
@section('content')
    <article style="margin-top: 150px;" class="form-group">
        <section>
            <div id="home-info-wrap-title">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                            <div class="vc_text_separator wpb_content_element full home-info-new-title">
                                <div class="separator_wrapper">
                                    <div class="separator_content" style="border-color:#d7d7d7; color:#393939;text-transform: uppercase;"> <span> {{$page->name}}</span></div>
                                </div>
                                <div class="separator_line" style="background-color:#d7d7d7;"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
@stop