<section>
    <div id="home-why-chooise-wrap-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="home-why-chooise-wrap-top">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-why-chooise-wrap-top">
                            <div class="vc_text_separator wpb_content_element full home-info-new-title">
                                <div class="separator_wrapper">
                                    <div class="separator_content" style="border-color:#d7d7d7; color:#393939;"> <span><b>TẠI SAO CHỌN NAME COMPANY?</b></span></div>
                                </div>
                                <div class="separator_line" style="background-color:#d7d7d7;"></div>
                            </div>
                            <p>
                                {{isset($website['why_me']) ? $website['why_me'] : ''}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div id="home-why-chooise-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="home-why-chooise-wrap-bottom">
                        <div class="col-xs-12 col-sm-6 col-lg-3 col-md-3">
                            <div class="service-v1-section hvr-grow">
                                <div class="service-v1"> <img alt="" class="icon-services" src="{{asset('front/img/100-NAM-KINH-NGHIEM.png')}}" title="" width="100%" height="auto"></div>
                                <h3 class="service-title"><b>Phong cách hiện đại</b></h3>
                                <p class="is-mb-0">
                                    <b>
                                        {{isset($website['style']) ? $website['style'] : ''}}
                                    </b>
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-3 col-md-3">
                            <div class="service-v1-section hvr-grow">
                                <div class="service-v1"> <img alt="" class="icon-service" src="{{asset('front/img/QUY-TRINH-CHAT-CHE.png')}}" title="" width="100%" height="auto"></div>
                                <h3 class="service-title"><b>Quy Trình Chặt Chẽ</b></h3>
                                <p class="is-mb-0">
                                    {{isset($website['procedure']) ? $website['procedure'] : ''}}
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-3 col-md-3">
                            <div class="service-v1-section hvr-grow">
                                <div class="service-v1"> <img alt="" class="icon-service" src="{{asset('front/img/icon-phong-thuy1.png')}}" title="" width="100%" height="auto"></div>
                                <h3 class="service-title"><b>Đề Cao Phong Thủy</b></h3>
                                <p class="is-mb-0">
                                    {{isset($website['progress']) ? $website['progress'] : ''}}
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-3 col-md-3">
                            <div class="service-v1-section hvr-grow">
                                <div class="service-v1"> <img alt="" class="icon-service" src="{{asset('front/img/CAM-KET-TIEN-DO-123.png')}}" title="" width="100%" height="auto"></div>
                                <h3 class="service-title"><b>Cam Kết Tiến Độ </b></h3>
                                <p class="is-mb-0">
                                    {{isset($website['situation']) ? $website['situation'] : ''}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ladi-widget-overlay"></div>
    </div>
</section>
