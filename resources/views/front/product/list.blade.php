@extends('front._partials.master')
@section('content')
    {!! \app\Helpers\Widgets::renderBreadcumb($cate,'product') !!}
    {!! \app\Helpers\Widgets::renderNavTab($categoryProduct,$cate) !!}
    <main>
        <div class="product-list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 order-sm-1 order-2 pdrNone">
                        <div class="list-product">
                            @if(isset($products) && count($products) > 0)
                                {!! \app\Helpers\Widgets::renderItemProduct($products) !!}
                            @endif
                        </div>
                        <div>
                            {{ isset($products) ? $products->links() : ''}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 order-1">
                        <div class="sort-product">
                            <p class="font-weight-bold">Danh mục sản phẩm</p>
                            <ul>
                                @if(isset($categoryProduct) && !empty($categoryProduct))
                                    @foreach($categoryProduct as $item)
                                        <li class="active">
                                            <a href="{{url('san-pham/danh-muc/'.$item['slug'])}}">
                                                <i class="fa fa-file-image-o" aria-hidden="true"></i> {{$item['name']}}
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