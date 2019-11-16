<ul class="dropdown-menu">
    @if(isset($categorys))
        @foreach($categorys as $item)
            <li class="dropdown-submenu">
                <a class="dropdown-toggle dropdown-item" href="{{url('/san-pham/danh-muc/'.$item['slug'])}}">
                    {{$item['name']}}
                    @if(isset($item['childs']) && !empty($item['childs']))
                        <span class="fa fa-caret-right pull-right"></span>
                    @endif
                </a>
                @if(isset($item['childs']) && !empty($item['childs']))
                    {!! view('front.element._item_menu')->with(['categorys' => $item['childs']]) !!}
                @endif
            </li>
        @endforeach
    @endif
</ul>