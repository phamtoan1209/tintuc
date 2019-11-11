@include('front.element._social')
<footer>
    <section>
        <div id="footer-top" style="{{isset($website['background']) && $website['background'] != '' ? 'background:'.$website['background'].';' : ''}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 co-md-4 col-sm-4 col-xs-12 footer-top-col1 footer-top-col">
                        <div class="footer-top-col1-logo"> <img class="img-responsive" src="{{asset(isset($website['logo']) ? $website['logo'] : '')}}" alt=""></div>
                    </div>
                    <div class="col-lg-7 co-md-7 col-sm-7 col-xs-12 footer-top-col3 footer-top-col">
                        <p class="description-footer form-group">Nhận tư vấn của chúng tôi</p>
                        <div role="form">
                            <div class="screen-reader-response"></div>
                            <form action="{{route('addContact')}}" method="post" class="wpcf7-form">
                                @csrf
                                <p>
                                    <span class="wpcf7-form-control-wrap email-786">
                                        <input placeholder="Nhập email hoặc số điện thoại của bạn" type="text" name="text" required="required" size="40" class="nhan-email-marketing">
                                    </span>
                                    <button type="submit" class="btn-nhan-email-marketing">Đăng ký</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer-middle" style="{{isset($website['background']) && $website['background'] != '' ? 'background:'.$website['background'].';' : ''}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 co-md-4 col-sm-6 col-xs-12 footer-middle-col1 footer-middle-col">
                        <p class="description-footer">
                            {{isset($website['trademark']) ? $website['trademark'] : ''}}
                        </p>
                    </div>
                    <div class="col-lg-4 co-md-4 col-sm-6 col-xs-12 footer-middle-col2 footer-middle-col">
                        <p class="footer-middle-col2-company-name"> {{isset($website['name_company']) ? $website['name_company'] : ''}}</p>
                        <div class="footer-middle-col2-item">
                            <div class="footer-middle-col2-icon"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 24 24" fill="#F5D9B6">
                                    <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"></path>
                                </svg></div> <span class="footer-middle-col2-add">{{isset($website['address']) ? $website['address'] : ''}}</span>
                        </div>
                        <div class="footer-middle-col2-item">
                            <div class="footer-middle-col2-icon"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 24 24" fill="#F5D9B6">
                                    <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"></path>
                                </svg></div> <span class="footer-top-col2-hotline">{{isset($website['phone']) ? $website['phone'] : ''}}</span>
                        </div>
                        <div class="footer-middle-col2-item">
                            <div class="footer-middle-col2-icon"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 24 24" fill="#F5D9B6">
                                    <path d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"></path>
                                </svg></div> <span class="footer-top-col2-email">{{isset($website['email']) ? $website['email'] : ''}}</span>
                        </div>
                        <div class="footer-middle-col2-item">
                            <div class="footer-middle-col2-icon">
                                <i class="fa fa-globe" style="font-size:21px;color: #F5D9B6;"></i>
                            </div>
                            <span class="footer-top-col2-email">{{isset($website['domain']) ? $website['domain'] : ''}}</span>
                        </div>
                        <ul>
                            @if(isset($pagestatic))
                                @foreach($pagestatic as $key =>$item)
                                    <li><a href="{{url($key.'.html')}}"> {{$item}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-lg-4 co-md-4 col-sm-12 col-xs-12 footer-middle-col3 footer-middle-col">
                        <span class="form-group">Theo dõi chúng tôi trên facebook: </span>
                        <div class="fb-page"
                             data-href="{{isset($website['fanpage']) ? $website['fanpage'] : ''}}"
                             data-width="380"
                             data-hide-cover="false"
                             data-show-facepile="false"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>