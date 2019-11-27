<style>
    @media only screen and (max-width: 768px) {
        .dropdown-submenu .dropdown-menu {
            padding-left: 10px;
        }
    }
    .dropdown-submenu .dropdown-menu {
        border-radius: 0px;
        left: 99%;
        margin-top: 0px;
        display: none;
        width: auto;
        min-width:285px;
    }
    .dropdown-menu{
        border: none;
        width: 220%;
    }
</style>
<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
                        <li><a href="{{url('/')}}"> <i class="fa fa-home"></i> Trang chủ</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Sản phẩm <span class="caret"></span></a>
                            {!! view('front.element._item_menu')->with(['categorys' => $categorys]) !!}
                        </li>
                        <li><a href="{{url('tin-tuc')}}">Tin tức </a></li>
                        <li><a href="{{url('/gioi-thieu.html')}}"> Giới thiệu</a></li>
                        <li><a href="{{url('/lien-he.html')}}"> Liên hệ</a></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</header>
