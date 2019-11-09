@extends('front._partials.master')
@section('content')
    <style>
        .about-container img {
            width: 100%;
        }
    </style>
    <section>
        <div class="page-title py-5">
            <h1>{{$post->name}}</h1>
        </div>
        <div class="breadcrumbs-yoat py-5 form-group">
            <div class="container">
                <div class="breadcrumbs-yoat">
                    <div class="container">
                        <p></p>
                        <p id="breadcrumbs">
                            <span><a href="{{route('home')}}">Trang chủ</a> </span>
                            / <span><a href="{{url('tin-tuc/danh-muc/'.$post->category->slug)}}">{{$post->category->name}}</a></span>
                            / <span class="breadcrumb_last" aria-current="page">{{$post->name}}</span>
                        </p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>
        <div class="product-list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 order-sm-1 order-1 pdrNone">
                        <div class="about-container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        {!! $post->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 order-2">
                        <div class="sort-product">
                            <p class="font-weight-bold">Tin tức mới nhất</p>
                            <ul>
                                @if(isset($posts) && !empty($posts))
                                    @foreach($posts as $item)
                                        <li>
                                            <a href="{{url('tin-tuc/'.$item->slug)}}" style="text-decoration: none;">
                                                <img src="{{asset($item->thumb)}}" alt="{{$item->name}}" style="width: 99px;max-height: 75px; margin-right: 20px;float: left;">
                                                <div class="content" style="overflow: hidden;font-size: 14px;line-height: 20px; height: 75px;">
                                                    <span style="margin-bottom: 15px;">{{\Illuminate\Support\Str::words($item->name, 15)}}</span> <br>
                                                    <span style="color: #70C367;">{{date('d/m/Y',strtotime($item->created_at))}}</span>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="sort-product">
                            <p class="font-weight-bold">Danh mục tin tức</p>
                            <ul>
                                @if(isset($categoryPost) && !empty($categoryPost))
                                    @foreach($categoryPost as $item)
                                        <li class="active">
                                            <a href="{{url('tin-tuc/danh-muc/'.$item['slug'])}}">
                                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> {{$item['name']}}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop