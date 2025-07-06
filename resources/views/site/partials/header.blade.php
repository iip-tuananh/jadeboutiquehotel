<header class="main-header" ng-controller="headerPartial">
    <div class="container">
        <!--  header-top -->
        <div class="header-top  fl-wrap">
            <div class="header-top_contacts"><a href="#"><span>Hotline:</span> {{ $config->hotline }}</a><a href="#"><span>Địa chỉ:</span> {{ $config->address_company }}</a></div>
            <div class="header-social">
                <ul>
                    <li><a href="{{ $config->facebook }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="{{ $config->twitter }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                    <li><a href="{{ $config->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="booking-reviews">
                <div class="br-counter">
                    <div class="ribbon"></div>
                    <span>5.0</span>
                </div>
                <a href="#" target="_blank" class="br_link">
                    <div class="star-rating" data-starrating="5"> </div>
                    <p>Từ Booking.com</p>
                </a>
            </div>
            <div class="lang-wrap">
                <a href="javascript:;" data-lang="vi" class="lang-switch" onclick="translateheader('vi')">Vi</a>
                <span>/</span>
                <a href="javascript:;" data-lang="en" class="lang-switch" onclick="translateheader('en')">Eng</a></div>
        </div>
        <!--  header-top end  -->
        <div class="nav-holder-wrap init-fix-header  fl-wrap">
            <a href="{{ route('front.home-page') }}" class="logo-holder"><img src="{{ $config->image->path ?? '' }}" alt=""></a>
            <!--  navigation -->
            <div class="nav-holder main-menu">
                <nav>
                    <ul>
                        <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                        <li><a href="{{ route('front.about_page') }}">Giới thiệu về chúng tôi</a></li>
                        <li><a href="{{ route('front.getListRooms') }}">Hạng phòng</a></li>
                        <li>
                            <a href="#">Dịch vụ<i class="fas fa-caret-down"></i></a>
                            <ul>
                                @foreach($serviceCategories as $serviceCategory)
                                    <li><a href="{{ route('front.services', $serviceCategory->slug) }}">{{ $serviceCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="#">Tin tức và hoạt động<i class="fas fa-caret-down"></i></a>
                            <ul>
                                @foreach($postCategories as $postCategory)
                                    <li><a href="{{ route('front.blogs', $postCategory->slug) }}">{{ $postCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('front.contact') }}">Liên hệ với chúng tôi</a></li>
                    </ul>
                </nav>
            </div>
            <!-- navigation  end -->
{{--            <div class="serach-header-btn_wrap">--}}
{{--                <a href="rooms.html" class="serach-header-btn"><i class="fa-light fa-magnifying-glass"></i> <span>Serach a Room</span></a>--}}
{{--            </div>--}}
            <div class="show-cart sc_btn htact"><i class="fa-light fas fa-heart">
                </i><span class="show-cart_count"><% love.count %></span><span class="header-tooltip">Danh mục yêu thích
                </span>
            </div>
            <div class="show-share-btn showshare htact"><i class="fa-light fa-share-nodes"></i><span class="header-tooltip">Share</span></div>
            <!-- nav-button-wrap-->
            <div class="nav-button-wrap">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <!-- nav-button-wrap end-->
            <!-- share-wrapper -->
            <div class="share-wrapper isShare">
                <div class="share-container fl-wrap"></div>
            </div>
            <!-- share-wrapper-end -->
            <!--wish-list-wrap-->
            <style>
                .wl_btn {
                    /* các style hiện tại của bạn… */
                    cursor: pointer;  /* con trỏ tay khi hover */
                }
            </style>
            <div class="wish-list-wrap novis_cart">
                <div class="wish-list-close close_cart-init clwl_btn"><i class="fa-regular fa-xmark"></i></div>
                <div class="wish-list-title">Danh sách yêu thích</div>

                <div class="wish-list-container" ng-if="love.count">

                    <div class="wish-list-item fl-wrap" ng-repeat="item in love.items">
                        <div class="wish-list-img"><a href="/room/<% item.attributes.slug %>"><img src=" <% item.attributes.image %> " alt=""></a>
                        </div>
                        <div class="wish-list-descr">
                            <h4><a href="/room/<% item.attributes.slug %>"><% item.name %></a></h4>
                            <div class="wish-list-price"><% item.attributes.price_rent %></div>
                            <a  href="/room/<% item.attributes.slug %>" class="wshil_link">Đặt ngay</a>
                            <div class="clear-wishlist" ng-click="removeItem(item.id)"><i class="fa-regular fa-trash-can"></i></div>
                        </div>
                    </div>

                </div>
                <div class="wish-list-wrap-btns">
                    <button class="wl_btn" ng-click="removeAllWishList()" ng-if="love.count">Làm sạch danh sách</button>
                    <button class="wl_btn" ng-if="! love.count">Chưa có dữ liệu</button>
                </div>
            </div>
            <!--wish-list-wrap-->
        </div>
    </div>
</header>

<div class="header-overlay close_cart-init"></div>
