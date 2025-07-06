<footer class="main-footer">
    <div class="footer-inner">
        <div class="container">
            <!-- footer-widget-wrap -->
            <div class="footer-widget-wrap">
                <div class="footer-separator-wrap">
                    <div class="footer-separator"><span></span></div>
                </div>
                <div class="row">
                    <!-- footer-widget -->
                    <div class="col-lg-3">
                        <div class="footer-widget">
                            <div class="footer-widget-title">Về chúng tôi</div>
                            <div class="footer-widget-content">
                                <p> {{ $config->introduction }} </p>
                            </div>
                        </div>
                    </div>
                    <!-- footer-widget  end-->
                    <!-- footer-widget -->
                    <div class="col-lg-3">
                        <div class="footer-widget">
                            <div class="footer-widget-title">Thông tin liên hệ  </div>
                            <div class="footer-widget-content">
                                <div class="footer-contacts footer-box">
                                    <ul>
                                        <li><span>Hotline :</span><a href="#">{{ $config->hotline }}</a></li>
                                        <li><span>Email :</span><a href="#">{{ $config->email }}</a></li>
                                        <li><span>Địa chỉ :</span><a href="#">{{ $config->address_company }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer-widget  end-->
                    <!-- footer-widget -->
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <div class="footer-widget-title">Liên kết</div>
                            <div class="footer-widget-content">
                                <div class="footer-list footer-box  ">
                                    <ul>
                                        <li><a href="{{ route('front.getListRooms') }}">Hạng phòng</a></li>
                                        <li><a href="{{ route('front.blogs') }}">Tin tức</a></li>
                                        <li><a href="{{ route('front.contact') }}">Liên hệ</a></li>
                                        <li><a href="{{ route('front.about_page') }}">Về chúng tôi</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer-widget  end-->
                    <!-- footer-widget -->
                    <div class="col-lg-4">
                        <div class="footer-widget">
                            <div class="footer-widget-title">Subscribe</div>
                            <div class="footer-widget-content">
                                <div class="subcribe-form">
                                    <p>Đăng ký để nhận ngay những thông báo về ưu đãi và tin tức mới nhất</p>
                                    <form id="subscribe">
                                        <input class="enteremail" name="email" id="subscribe-email" placeholder="Your Email" spellcheck="false" type="text">
                                        <button type="submit" id="subscribe-button" class="subscribe-button color-bg">Gửi </button>
                                        <label for="subscribe-email" class="subscribe-message"></label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer-widget  end-->
                </div>
            </div>
            <!-- footer-widget-wrap end-->
        </div>
{{--        <div class="footer-title-dec">Diamant Hotel</div>--}}
    </div>
    <div class="footer-social">
        <div class="container">
            <ul>
                <li><a href="{{ $config->facebook }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="{{ $config->twitter }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                <li><a href="{{ $config->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <a href="index.html" class="footer-logo"><img src="images/logo.png" alt=""></a>
            <div class="copyright">&#169; Jade Hotel 2024 . All rights reserved. </div>
            <div class="to-top"><span>Lên đầu trang </span><i class="fal fa-angle-double-up"></i></div>
        </div>
    </div>
</footer>
