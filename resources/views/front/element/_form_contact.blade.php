<section>
    <div id="home-customer-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12"> <span class="home-customer-title">NHẬN TƯ VẤN MIỄN PHÍ</span>
                    <span class="home-customer-right-des">Bạn có thắc mắc gì cần chúng tôi giải đáp. Gửi liên hệ ngay</span>
                    <div id="home-customer-right-frm">
                        <div role="form">
                            <div class="screen-reader-response"></div>
                            <form action="{{route('addContact')}}" method="POST">
                                @csrf
                                <p>
                                    <span class="wpcf7-form-control-wrap text-524">
                                        <input type="text" name="name" size="50" placeholder="Họ tên" required>
                                    </span>
                                    <br>
                                    <span class="wpcf7-form-control-wrap tel-172">
                                                <input type="tel" name="phone" size="50" placeholder="Số điện thoại" required>
                                            </span>
                                    <br>
                                    <span class="wpcf7-form-control-wrap email-689">
                                                <input type="email" name="email" size="50" placeholder="Email" required>
                                            </span>
                                    <br>
                                    <span class="wpcf7-form-control-wrap email-689">
                                                <textarea name="content" class="form-control" rows="4" required placeholder="Nội dung cần tư vấn"></textarea>
                                            </span>
                                    <br>
                                    <input type="submit" value="Đăng ký" class="hvr-grow">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
