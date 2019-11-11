@extends('front._partials.master')
@section('content')
    <article>
        <section>
            <div class="container container-sanpham">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 archive-main-content archive-main-content-duan">
                        {!! view('front.element._breadcumb')->with(['cate' => $cate,'type' => 'product']) !!}
                        <div class="clear" style="margin-top: 15px;">
                            <h1 class="entry-title cat-title" style="float: left; margin-top: 0px;">
                                <span> Danh sách sản phẩm </span>
                            </h1>
                            <form action="{{route('allProduct')}}" method="GET" class="form form-horizontal">
                                <div class="row form-group">
                                    <p class="pull-right col-xs-12 col-sm-3 col-md-2">
                                        <input name="name" value="{{isset($filter) && isset($filter['name']) ? $filter['name'] : ''}}" type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                                    </p>
                                </div>
                            </form>
                        </div>
                        <div class="clear"></div>
                        @if(isset($filter) && isset($filter['name']) && $filter['name'] != '')
                            <p>
                                Kết của tìm kiếm cụm từ: <b>"{{$filter['name']}}</b>"
                            </p>
                        @endif
                        <div class="clear"></div>
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
                        {!! count($products) > 0 ? $products->links() : 'Sản phẩm đang được cập nhật. Vui lòng quay trở lại sau' !!}
                    </div>
                </div>
            </div>
        </section>
        @include('front.element._why_me')
    </article>
@stop