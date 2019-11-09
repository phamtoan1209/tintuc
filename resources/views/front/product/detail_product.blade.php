@extends('front._partials.master')
@section('title',$product->name)
@section('content')
    <section>
        <div class="page-title py-5">
            <h1>{{$product->name}}</h1>
        </div>
        <div class="breadcrumbs-yoat py-5">
            <div class="container">
                <div class="breadcrumbs-yoat">
                    <div class="container">
                        <p></p>
                        <p id="breadcrumbs">
                            <span><a href="{{route('home')}}">Trang chủ</a> </span>
                            / <span><a href="{{url('san-pham/danh-muc/'.$product->category->slug)}}">{{$product->category->name}}</a></span>
                            / <span class="breadcrumb_last" aria-current="page">{{$product->name}}</span>
                        </p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>
        <div class="product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 product-left">
                        <div id="ninja-slider">
                            <div class="slider-inner">
                                <ul>
                                    <li><a class="ns-img" href="{{asset($product->large)}}"></a></li>
                                    @if(isset($product->images) && !empty($product->images))
                                        @foreach($product->images as $image)
                                            <li><a class="ns-img" href="{{asset($image->large)}}"></a></li>
                                        @endforeach
                                    @endif
                                </ul>
                                <div class="fs-icon" title="Expand/Close"></div>
                            </div>
                        </div>
                        <div id="thumbnail-slider">
                            <div class="inner">
                                <ul>
                                    <li>
                                        <a class="thumb" href="{{asset($product->thumb)}}"></a>
                                    </li>
                                    @if(isset($product->images) && !empty($product->images))
                                        @foreach($product->images as $image)
                                            <li> <a class="thumb" href="{{asset($image->thumb)}}"></a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="product-description py-5">
                            <p>{{$product->name}}</p>
                            <div class="star-rate">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                {{--<i class="fa fa-star-o" aria-hidden="true"></i>--}}
                            </div>
                            <div class="like-share">

                            </div>
                            <div class="comments">
                                <h5>Bình luận</h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 product-right">
                        <span><i class="fa fa-info-circle" aria-hidden="true"></i> <strong>Mô tả:</strong> {{$product->description}}</span><br>
                        @if(isset($product) && !empty($product->details))
                            @foreach($product->details as $detail)
                                <span><i class="fa fa-star" aria-hidden="true"></i> <strong>{{$detail->name}}:</strong> {{$detail->value}}</span><br>
                            @endforeach
                        @endif
                        <ul class="product-share">
                            Liên hệ ngay với chúng tôi <br>
                            <li>
                                <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-tumblr-square" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-detail-related">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Sản phẩm liên quan:</h4>
                        <div class="list-product">
                            @if(isset($products) && !empty($products))
                                {!! \app\Helpers\Widgets::renderItemProduct($products) !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop