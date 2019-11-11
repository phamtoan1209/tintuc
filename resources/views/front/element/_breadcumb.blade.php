<p class="form-group"></p>
<p>
    <a href="{{url('/')}}">Trang chủ</a>
    @if($cate == null)
        >> {{$type == 'product' ? 'Sản phẩm' : 'Tin tức'}}
    @else
        >> <a href="{{$type == 'product' ? url('san-pham') : url('tin-tuc')}}">{{$type == 'product' ? 'Sản phẩm' : 'Tin tức'}}</a>
    @endif
    @if($cate != null && isset($data))
        >> <a href="{{$type == 'product' ? url('san-pham/danh-muc/'.$cate->slug) : url('tin-tuc/danh-muc/'.$cate->slug)}}">{{$cate->name}}</a>
    @elseif($cate != null && !isset($data))
        >> {{$cate->name}}
    @endif
    @if(isset($data))
        >> {{$data->name}}
    @endif
</p>