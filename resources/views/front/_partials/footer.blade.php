<footer class="site-footer">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 footer-widget1">
                    <section id="text-2" class="widget widget_text"><span class="widget-title">Quyên Nguyễn</span>
                        <div class="menu-chung-toi-container">
                            <ul id="menu-chung-toi" class="menu">
                                <li class="menu-item"><a href="javascript:void(0)"><i class="fa fa-star"></i> : {{isset($website['slogan']) ? $website['slogan'] : ''}}</a></li>
                                <li class="menu-item"><a href="javascript:void(0)"><i class="fa fa-envelope-o"></i> : {{isset($website['email']) ? $website['email'] : ''}}</a></li>
                                <li class="menu-item"><a href="javascript:void(0)"><i class="fa fa-map-marker"></i> : {{isset($website['address']) ? $website['address'] : ''}}</a></li>
                                <li class="menu-item"><a href="javascript:void(0)"><i class="fa fa-mobile"></i> : {{isset($website['phone']) ? $website['phone'] : ''}}</a></li>
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-12 footer-widget2">
                    <section id="nav_menu-2" class="widget widget_nav_menu"><span class="widget-title">Về chúng tôi</span>
                        <div class="menu-chung-toi-container">
                            <ul id="menu-chung-toi" class="menu">
                                <li class="menu-item"><a href="{{route('intro')}}">Giới thiệu</a></li>
                                <li class="menu-item"><a href="{{route('contact')}}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-12 footer-widget3">
                    <section id="nav_menu-3" class="widget widget_nav_menu"><span class="widget-title">Tin tức</span>
                        <div class="menu-tu-van-container">
                            <ul id="menu-tu-van" class="menu">
                                @if(isset($categoryPostHot) && count($categoryPostHot) > 0)
                                    @foreach($categoryPostHot as $itemCategory)
                                        <li class="menu-item"><a href="{{url('tin-tuc/danh-muc/'.$itemCategory['slug'])}}">{{$itemCategory['name']}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 footer-widget4"> <span class="widget-title">Kết nối</span>
                    <ul class="footer-social">
                        <li><a target="_blank" rel="nofollow" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" rel="nofollow" href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a target="_blank" rel="nofollow" href="#"><i class="fa fa-youtube-play"></i></a></li>
                        <li><a target="_blank" rel="nofollow" href=""><i class="fa fa-linkedin-square"></i></a></li>
                        <li><a target="_blank" rel="nofollow" href=""><i class="fa fa-instagram"></i></a></li>
                        <li><a target="_blank" rel="nofollow" href=""><i class="fa fa-twitter"></i></a></li>
                    </ul>
                    <hr style="width:50px;margin: 0;" align="left">
                    <section id="custom_html-2" class="widget_text widget widget_custom_html">
                        <div class="textwidget custom-html-widget">
                            <p> Chúng tôi trân trọng mọi ý kiến góp ý của các bạn!</p>
                        </div>
                    </section>
                    <section id="text-4" class="widget widget_text">
                        <div class="textwidget">
                            <div role="form">
                                <a href="{{route('contact')}}"><input type="submit" value="Gửi ý kiến" class="form-submit"></a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</footer>