@extends('front._partials.master')
@section('content')
    <article>
        <section>
            <div class="container container-duan">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 archive-main-content archive-main-content-duan">

                        <div id="archive-main-content-duan">
                            {!! view('front.element._breadcumb')->with(['cate' => $cate,'type' => 'post']) !!}
                            <div class="clear" style="margin-top: 15px;">
                                <h1 class="entry-title cat-title" style="float: left; margin-top: 0px;">
                                    <span> <?=$cate != null ? $cate->name : 'Danh sách tin tức'?> </span>
                                </h1>
                                <p class="pull-left" style="padding: 0px 15px;">
                                    <?=$cate != null ? $cate->description : ''?>
                                </p>
                                <form action="{{route('allPost')}}" method="GET" class="form form-horizontal">
                                    <div class="row form-group">
                                        <p class="pull-right col-xs-12 col-sm-3 col-md-2">
                                            <input name="name" value="{{isset($filter) && isset($filter['name']) ? $filter['name'] : ''}}" type="text" class="form-control" placeholder="Tìm kiếm tin tức">
                                        </p>
                                    </div>
                                </form>
                            </div>
                            <div class="clear"></div>
                            @if(isset($filter) && isset($filter['name']) && $filter['name'] != '')
                                <p class="form-group">Kết của tìm kiếm cụm từ: <b>"{{$filter['name']}}</b>"</p>
                            @endif
                            @if(isset($posts))
                                @foreach($posts as $post)
                                    {!! view('front.element._item_post')->with(['data' => $post]) !!}
                                @endforeach
                            @endif
                            <div class="col-md-12">
                                {!! count($posts) > 0 ? $posts->links() : 'Tin tức đang được cập nhật. Vui lòng quay trở lại sau' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('front.element._why_me')
    </article>
@stop