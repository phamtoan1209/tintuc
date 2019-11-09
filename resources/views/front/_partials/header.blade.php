<header>
    <div class="container">
        <div class="row site-branding">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 site-logo">
                <h1><a href="{{route('home')}}" rel="home">
                        <img style="width: 160px;height: 90px;" class="img-fluid" src="{{asset(isset($website['logo']) ? $website['logo'] : '')}}" alt="Bridal">
                    </a></h1>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 info-header">
                <ul>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{isset($website['address']) ? $website['address'] : ''}}</li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i>{{isset($website['phone']) ? $website['phone'] : ''}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="site-nav">
        <div class="container">
            <nav class="header" id="myHeader">
                <div class="menu-toggle">
                    <button type="button" id="menu-btn">
                        <div style="float: left;">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </div>
                        <h3>Menu</h3>
                    </button>
                </div>
                <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                    <li>
                        <a href="{{route('home')}}">
                            <span class="title">Trang chủ</span>
                        </a>
                    </li>
                    @if(isset($categorys) && count($categorys) > 0)
                        @foreach($categorys as $item)
                            <li>
                                <a href="{{url('san-pham/danh-muc/'.$item['slug'])}}">
                                    <span class="title">{{$item['name']}}</span>
                                </a>
                                @if(isset($item['childs']) && count($item['childs']) > 0)
                                    <ul>
                                        @foreach($item['childs'] as $itemChild)
                                            <li>
                                                <a href="{{url('san-pham/danh-muc/'.$itemChild['slug'])}}">{{$itemChild['name']}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>