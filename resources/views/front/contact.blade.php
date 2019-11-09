@extends('front._partials.master')
@section('title','Liên hệ')
@section('content')
    <div class="clear"></div>
    <section>
        <div class="page-title py-5">
            <h1>Liên hệ</h1>
        </div>
        <div class="breadcrumbs-yoat py-5">
            <div class="container">
                <p id="breadcrumbs"><span><span><a href="{{route('home')}}">Trang chủ</a> / <span class="breadcrumb_last" aria-current="page">Liên hệ</span></span></span></p>
            </div>
        </div>
    </section>
    <main>
        <div class="contact-container">
            <div class="container">
                @if(\Illuminate\Support\Facades\Session::has('alert_message'))
                    <div class="row">
                        <div class="col-sm-8 form-group">
                            <div class="bg-success text-white" style="padding: 8px 15px;">
                                <i class="fa fa-check-square"></i> {{\Illuminate\Support\Facades\Session::get('alert_message')}}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="map-responsive">
                            <iframe
                                    width="300"
                                    height="170"
                                    frameborder="0"
                                    scrolling="no"
                                    marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?q={{isset($website['lat_long']) ? $website['lat_long'] : ''}}&hl=vi;z=14&amp;output=embed">
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="row form-contact py-5">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ctinfo-left">
                        <div id="ct-des"><strong>{{\Illuminate\Support\Facades\Config::get('webinfos.NAME')}}</strong><br><br> Chúng tôi luôn trân trọng những góp ý &amp; luôn sẵn sàng phản hồi những câu hỏi của bạn trong thời gian sớm nhất.</div>
                        <ul>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{isset($website['address']) ? $website['address'] : ''}}</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i>{{isset($website['email']) ? $website['email'] : ''}}</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>{{isset($website['phone']) ? $website['phone'] : ''}}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 ctinfo-right">
                        <form method="POST" action="{{route('addContact')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Tên của bạn">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Email của bạn">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" aria-describedby="emailHelp" placeholder="Số điện thoại">
                            </div>
                            <div class="form-group">
                                <textarea name="content" class="form-control" rows="3" placeholder="Nhập lời nhắn"></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark">Gửi đi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @section('js')
        <script type="text/javascript">
            $(document).ready(function () {
                $('input[value="Gửi ý kiến"]').hide();
            });
        </script>
    @stop
@stop