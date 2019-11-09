@foreach($products as $product)
    <a class="product-container" href="{{url('san-pham/'.$product->slug)}}">
        <img class="img-fluid" data-src="{{asset($product->thumb)}}" alt="{{asset($product->name)}}">
        <div class="des-pro">
            <p>{{$product->name}}</p>
            <span>{{\Illuminate\Support\Str::words($product->description, 5)}}</span>
            <!-- <div class="price">990.000<sup>đ</sup></div> -->
        </div>
    </a>
@endforeach
