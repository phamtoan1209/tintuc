@extends('front._partials.master')
@section('content')
    <article>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bai-viet">
                        {!! view('front.element._breadcumb')->with(['cate' => $post->category,'type' => 'post','data' => $post]) !!}
                        <h2>{{$post->name}}</h2>
                        <p style="font-style: italic;font-weight: bold;">{{$post->description}}</p>
                        <p class="form-group"></p>
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <h3 class="section-title">Tin tức liên quan</h3>
                    <div class="related-loop row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            @if(isset($posts))
                                @foreach($posts as $post)
                                    {!! view('front.element._item_post')->with(['data' => $post]) !!}
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