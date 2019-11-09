@foreach($posts as $post)
    <div class="col-sm-6">
        <div class="item-new" style="border: 1px solid #e0e0e0;margin-bottom: 15px;height: 450px;">
            <a class="product-container" href="{{url('tin-tuc/'.$post->slug)}}" style="border: none;">
                <img class="img-fluid img-responsive" data-src="{{asset($post->thumb)}}" alt="{{$post->name}}" style="max-height: 400px;width: 100%;">
                <div class="des-pro">
                    <p>{{\Illuminate\Support\Str::words($post->name, 24)}}</p>
                    <span>{{\Illuminate\Support\Str::words($post->description, 22)}}</span>
                </div>
            </a>
        </div>
    </div>
@endforeach