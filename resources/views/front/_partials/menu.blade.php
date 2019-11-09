@if(isset($slides) && count($slides) > 0)
    <section>
        <div class="slider single-item">
            @foreach($slides as $item)
                <div>
                    <a href="#"><img class="img-fluid" src="{{asset($item->thumb)}}" alt=""></a>
                </div>
            @endforeach
        </div>
    </section>
@endif