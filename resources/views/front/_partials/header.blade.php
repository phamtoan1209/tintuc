<header>
    <div class="ib-menu">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="{{isset($website['background']) && $website['background'] != '' ? 'background:'.$website['background'].';' : ''}} border:none;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}"><img class="img-responsive logo-desktop" src="{{asset(isset($website['logo']) ? $website['logo'] : '')}}" alt="" /></a>
                </div>
                <div class="navbar-collapse collapse" style="height: 1px;">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Sản phẩm <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if(isset($categorys))
                                    @foreach($categorys as $item)
                                        <li><a href="{{url('/san-pham/danh-muc/'.$item['slug'])}}"> {{$item['name']}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Thiết kế <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if(isset($categoryPostHot))
                                    @foreach($categoryPostHot as $item)
                                        <li><a href="{{url('/tin-tuc/danh-muc/'.$item['slug'])}}"> {{$item['name']}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                        @if(isset($pagestatic))
                            @foreach($pagestatic as $key =>$item)
                                <li><a href="{{url($key.'.html')}}"> {{$item}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>