@extends('front._partials.master')
@section('title',$product->name)
@section('content')
    <article>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-content main-content-single">
                        {!! view('front.element._breadcumb')->with(['cate' => $product->category,'type' => 'product','data' => $product]) !!}
                        <h2>{{$product->name}}</h2>
                        <div class="block-img-info-product">
                            <div class="block-img-left">
                                <img class="img-responsive" id="zoom_03" src="{{asset($product->thumb)}}" data-zoom-image="{{asset($product->large)}}" />
                                <div id="gallery_01" class="slider-s">
                                    <a href="#" data-image="{{asset($product->large)}}" data-zoom-image="{{asset($product->large)}}"><img id="zoom_03" src="{{asset($product->large)}}" /> </a>
                                    @if(!empty($product->images))
                                        @foreach($product->images as $image)
                                            <a href="#" data-image="{{asset($image->large)}}" data-zoom-image="{{asset($image->large)}}"><img id="zoom_03" src="{{asset($image->large)}}" /> </a>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="txt-load-img">
                                    <p><i class="fa fa-search-plus" aria-hidden="true"></i> Click vào ảnh để phóng to</p>
                                </div>
                            </div>
                            <div class="block-info-pro-right">
                                <div class="block-name">
                                    <h3>{{$product->name}} </h3>
                                    <p>
                                        {{$product->description}}
                                    </p>
                                </div>
                                <div class="block-price">
                                    <div class="block-price-left">
                                        <ul class="detail-ul">
                                            @if(!empty($product->details))
                                                @foreach($product->details as $detail)
                                                    <li>
                                                        <p>{{$detail->name}}: </p>
                                                        @if(strpos($detail->value,'-') != false)
                                                            <?php $list = explode('-',$detail->value); ?>
                                                            <ul class="inner-option">
                                                                @foreach($list as $item)
                                                                    <li><a class="option-size" href="#">{{$item}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <span>{{$detail->value}}</span>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bai-viet">
                        <h2>Bài viết sản phẩm</h2>
                        {!! $product->content !!}
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <h3 class="section-title">Sản phẩm liên quan</h3>
                    <div class="related-loop row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            @if(isset($products))
                                @foreach($products as $product)
                                    {!! view('front.element._item_product')->with(['data' => $product]) !!}
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('front.element._why_me')
    </article>
@stop
@section('js')
    <script>
        //initiate the plugin and pass the id of the div containing gallery images
        $(document).ready(function() {
            $("#zoom_03").elevateZoom({ gallery: 'gallery_01', cursor: 'pointer', galleryActiveClass: "active", imageCrossfade: true, });
            $("#zoom_03").bind("click", function(e) {
                var ez = $('#zoom_03').data('elevateZoom');
                ez.closeAll(); //NEW: This function force hides the lens, tint and window
                $.fancybox(ez.getGalleryList());
                return false;

            });
            $('.slider-s img').on('click',function () {
                setTimeout(function () {
                    $('.zoomWrapper img').height(350);
                },100);
            });
            $(".fancybox").fancybox({
                openEffect: 'none',
                closeEffect: 'none'
            });
        });
    </script>
    <script>
        $('.slider-s').slick({
            arrows: false,
            vertical: true,
            verticalSwiping: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            centerMode: true,
            centerPadding: 'auto',
            focusOnSelect: true,
            responsive: [{
                breakpoint: 768,
                settings: {
                    vertical: false,
                    verticalSwiping: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    centerPadding: '10px',
                    centerMode: true,
                    focusOnSelect: true,
                }
            }]
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection
