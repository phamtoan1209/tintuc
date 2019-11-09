@extends('front._partials.master')
@section('title','Trang chủ')
@section('content')
    @include('front._partials.menu')
    <main>
        @if(isset($categoryProductHot) && count($categoryProductHot) > 0)
            <div class="block-cate">
                <div class="container">
                    <h5 class="text-uppercase">Thể loại nổi bật</h5>
                    <div class="row text-center display-block">
                        <ul>
                            @foreach($categoryProductHot as $itemCategory)
                                <li>
                                    <a href="{{url('san-pham/danh-muc/'.$itemCategory['slug'])}}">
                                        <div class="item-image"><img data-src="{{asset($itemCategory['thumb'])}}" alt="{{$itemCategory['name']}}" class="img-fluid rounded-circle"></div>
                                        <div class="item-title">{{$itemCategory['name']}}</div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        @if(isset($listCates) && !empty($listCates))
            @foreach($listCates as $item)
                <div class="shop-collection" style="background: #efebe3;">
                    <h3>{{$item['name']}}</h3>
                    <div class="container py-5">
                        <a href="{{url('san-pham/danh-muc/'.$item['slug'])}}">
                            <div class="feature-hero" style="background-image:url({{asset($item['large'])}})">
                                <div class="text-more">
                                    <p>{{$item['description']}}</p>
                                </div>
                            </div>
                        </a>
                        <div class="feature-products" style="height:75vw;overflow:hidden;background-color:#efebe3">
                            @if(!empty($item['products']))
                                <?php $i = 0; $arrMargin = [-35,-22,5,22,35];$arrColorBorder = ['#AFA595','#774825','#E3C98E','black'];$arrWidth=[5,8,6]; ?>
                                @foreach($item['products'] as $product)
                                        <?php $i++; ?>
                                    <div class="feature-group feature-<?=$i?>" style="margin-top: {{$arrMargin[array_rand($arrMargin)]}}px;">
                                        <a href="{{url('san-pham/'.$product->slug)}}" class="products products-1 track-group" id="hp-trending-wings-product">
                                            <div class="product-overlay" style="position: relative;">
                                                <img
                                                        class="img-fluid"
                                                        data-src="{{asset($product->thumb)}}"
                                                        alt="{{$product->name}}"
                                                        style="
                                                                border: {{$arrWidth[array_rand($arrWidth)]}}px solid {{$arrColorBorder[array_rand($arrColorBorder)]}};
                                                                -webkit-box-shadow: 0 8px 6px -6px black;
                                                                -moz-box-shadow: 0 8px 6px -6px black;
                                                                box-shadow: 0 8px 6px -6px black;
                                                ">
                                                <div class="feature-text">
                                                    <div class="feature-artwork">{{$product->name}}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </main>
@stop