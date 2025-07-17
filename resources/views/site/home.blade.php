@extends('site.layouts.master')

@section('title'){{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        crossorigin="anonymous"
    />
@endsection


@section('content')
    <!--  section  -->
    <div class="hero-wrap full-height dark-bg hidden-content">
        <div class="fs-slider full-height fl-wrap">
            <div class="swiper-container">
                <div class="swiper-wrapper" >


                    @foreach($banners as $banner)
                        <div class="swiper-slide">
                            <div class="fs-slider-item hidden-content">
                                <div class="bg"  data-bg="{{ $banner->image->path ?? '' }}" data-swiper-parallax="40%"></div>
                                <div class="overlay overlay-bold"></div>
                                <div class="hero-title-container">
                                    <div class="section-title">
                                        <h4>{{ $banner->title }}</h4>
                                        <h2>{{ $banner->intro }}</h2>
                                        <div class="section-separator"><span><i class="fa-thin fa-gem"></i></span></div>
{{--                                        <a href="#sec2" class="stg_link custom-scroll-link">Start Explore</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
        <div class="hs_btn hs_btn_prev">
            <i class="fa-solid fa-caret-left"></i>
            <div class="hs_btn_wrap_preview">
                <div class="bg"></div>
            </div>
            <div class="hs_btn-dec">
                <div class="svg-corner svg-corner_white"  style="bottom:-38px;left:  0; transform: rotate(180deg)"></div>
                <div class="svg-corner svg-corner_white"  style="top:-38px;left:  0; transform: rotate(90deg)"></div>
            </div>
        </div>
        <div class="hs_btn hs_btn_next">
            <i class="fa-solid fa-caret-right"></i>
            <div class="hs_btn_wrap_preview">
                <div class="bg"></div>
            </div>
            <div class="hs_btn-dec">
                <div class="svg-corner svg-corner_white"  style="bottom:-38px;right:  0; transform: rotate(-90deg)"></div>
                <div class="svg-corner svg-corner_white"  style="top:-38px;right:  0; transform: rotate(0deg)"></div>
            </div>
        </div>
        <div class="tcs-pagination_wrap">
            <div class="svg-corner svg-corner_white"  style="bottom:0;right:-38px; transform: rotate(90deg)"></div>
            <div class="svg-corner svg-corner_white"  style="bottom:0;left:-38px; transform: rotate(0deg)"></div>
            <div class="tcs-pagination hero-slider-pag"></div>
        </div>
        <div class="hero-section-scroll hsc2">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
        </div>
    </div>
    <!-- section end  -->
    <!--content-->
    <div class="content" ng-controller="homePage">
        <!-- breadcrumbs-wrap  -->
{{--        <div class="breadcrumbs-wrap">--}}
{{--            <div class="container">--}}
{{--                <a href="#">Home</a><span>Home Slider</span>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!--breadcrumbs-wrap end  -->
        <!-- section   -->
        <div class="content-section" id="sec2">
            <div class="section-dec"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title text-align_left" style="margin-top: 50px;">
                            <h4>{{ $about->title_1 }}</h4>
                            <h2>{{ $about->title_2 }}</h2>
                        </div>
                        <div class="text-block tb-sin">
                            <p class="has-drop-cap">
                                {{ $about->intro_text }}
                            </p>
                            <p>
                                {{ $about->body_text }}
                            </p>
                            <a href="{{ route('front.about_page') }}" class="btn fl-btn ">Tìm hiểu thêm</a>
                            <div class="dc_dec-item_left"><span></span></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-image-collge-wrap">
                            <div class="single-dec_img">
                                <img src="{{ @$about->image->path ?? '' }}" alt="" class="respimg">
                            </div>

                            <?php
                            $galleryOne = @$about->galleries[0] ?? null;
                            $galleryTwo = @$about->galleries[1] ?? null;
                            ?>

                            @if($galleryOne)
                                <div class="hero_images-collage-item" style="width: 25%; bottom:  25px; z-index: 15; left: -70px;">
                                    <img src="{{ $galleryOne->image->path ?? '' }}" class="respimg" alt="">
                                </div>
                            @endif

                            @if($galleryTwo)
                                <div class="hero_images-collage-item" style="width: 45%; top: -5%; z-index: 11; right: -120px;">
                                    <img src="{{ $galleryTwo->image->path ?? '' }}" class="respimg" alt="">
                                </div>
                            @endif

                            <div class="dc_dec-item_right"><span></span></div>
                        </div>
                    </div>
                </div>
                <div class="sc-dec" style="left: -220px; bottom: -100px;"></div>
            </div>
            <div class="content-dec2 fs-wrapper"></div>
            <div class="content-dec"><span></span></div>
        </div>
        <!-- section end  -->
        <!-- section   -->
        <style>
            .rooms-carousel-item_container {
                padding: 12px;
                background: rgba(0, 0, 0, 0.4); /* lớp nền tối mờ để chữ dễ đọc hơn */
                color: #fff;
                border-radius: 10px;
                /*position: relative;*/
                z-index: 2;
            }

            /* Giới hạn mô tả 2 dòng */
            .rooms-carousel-item_container p {
                margin-top: 4px;
                font-size: 0.9rem;
                line-height: 1.4;
                max-height: 2.8em;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
            }


            /* Chi tiết icon (diện tích, người lớn) */
            .room-card-details ul {
                display: flex;
                gap: 10px;
                padding: 0;
                /*margin: 8px 0;*/
                list-style: none;
            }

            .room-card-details ul li {
                display: flex;
                align-items: center;
                font-size: 0.85rem;
                color: #fff;
            }

            .room-card-details ul li i {
                margin-right: 4px;
            }

            /* Mobile tối ưu */
            @media (max-width: 767px) {
                .rooms-carousel-item_container h3 {
                    font-size: 1rem;
                }

                .rooms-carousel-item_container p {
                    font-size: 0.85rem;
                    -webkit-line-clamp: 2;
                }

                .grid-item_price span {
                    font-size: 1rem;
                }

                .like-btn {
                    display: none; /* Ẩn chữ "Yêu thích" nếu chật */
                }

                .section-title-room {
                    font-size: 10px;
                }
            }

        </style>
        @foreach($categoriesSpecial as $categorySpecial)
            <div class="content-section dark-bg no-padding hidden-content">
                <div class="row">
                    <div class="st-gallery">
                        <div class="section-title section-title-room">
                            <h4>Special selection</h4>
                            <h2>{{ $categorySpecial->name }}</h2>
                            <div class="section-separator sect_se_transparent"><span><i class="fa-thin fa-gem"></i></span></div>
                            <a href="{{ route('front.getListRooms') }}" class="stg_link">Xem tất cả phòng</a>
                        </div>
                        <div class="map-dec2"></div>
                        <div class="footer-separator fs_sin"><span></span></div>
                    </div>
                    <div class="col-lg-3">  </div>
                    <div class="col-lg-9">
                        <div class="rooms-carousel-wrap">
                            <div class="rooms-carousel full-height">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($categorySpecial->rooms as $roomSpecial)
                                            <div class="swiper-slide">
                                                <div class="rooms-carousel-item full-height">
                                                    <div class="bg-wrap bg-parallax-wrap-gradien fs-wrapper">
                                                        <div class="bg" data-bg="{{ $roomSpecial->image->path ?? '' }}" data-swiper-parallax="10%"></div>
                                                    </div>
                                                    <div class="rooms-carousel-item_container">
                                                        <h3><a href="{{ route('front.getRoom', $roomSpecial->slug) }}">{{ $roomSpecial->name }}</a>
                                                        </h3>
                                                        <p title=" {{ $roomSpecial->intro }}"> {{ $roomSpecial->intro }}</p>
                                                        <div class="room-card-details">
                                                            <ul>
                                                                <li><i class="fa-light fa-crop"></i><span>{{ $roomSpecial->area }}</span></li>
                                                                <li><i class="fa-light fa-user"></i><span>{{ $roomSpecial->maximum_occupancy }}</span></li>
{{--                                                                <li><i class="fa-light fa-bed-front"></i><span>{{ $roomSpecial->bedrooms }}</span></li>--}}
                                                            </ul>
                                                            <div class="grid-item_price">
                                                                <span>{{ $roomSpecial->price }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="like-btn" ng-click="addToMyHeart({{ $roomSpecial->id }})"><i class="fa-light fa-heart"></i> <span>Yêu thích</span></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="rc-controls-wrap">
                                <div class="rc-button rc-button-prev"><i class="fa-solid fa-caret-left"></i></div>
                                <div class="rc-button rc-button-next"><i class="fa-solid fa-caret-right"></i></div>
                            </div>
                            <div class="sc-controls fwc_pag2">
                                <div class="ss-slider-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- section   -->
        <!-- section   -->
        <div class="content-section">
            <style>
                /* 1. Cho hàng chứa các cột co giãn đều */
                .row.equal-height {
                    display: flex;
                    flex-wrap: wrap;
                    align-items: stretch; /* ép tất cả các .col flex cùng chiều cao */
                }

                /* 2. Cho mỗi cột cũng là 1 flex container */
                .row.equal-height .col-lg-4 {
                    display: flex;
                }

                /* 3. Cho .content-inner chiếm toàn bộ chiều cao cột */
                .content-inner {
                    display: flex;
                    flex-direction: column;
                    flex: 1 1 auto;
                }

                /* 4. Phân chia front/back đều nhau nếu cần */
                .content-front,
                .content-back {
                    flex: 1 1 auto;
                    display: flex;
                    flex-direction: column;
                }

                /* 5. Optional: căn giữa nội dung back nếu muốn */
                .content-back .inner {
                    margin-top: auto; /* đẩy nội dung xuống dưới */
                }

            </style>
            <div class="container">
                <div class="section-title">
                    <h4>Hãy tận hưởng thời gian tại khách sạn của chúng tôi cùng với niềm vui</h4>
                    <h2>Dịch vụ tại khách sạn</h2>
                    <div class="section-separator "><span><i class="fa-thin fa-gem"></i></span></div>
                </div>
                <div class="cards-wrap">
                    @foreach($services->chunk(3) as $serviceGroup)
                    <div class="row equal-height" style="margin-bottom: 10px">
                        @foreach($serviceGroup as $indexServ => $service)
                            <div class="col-lg-4">
                                <div class="content-inner fl-wrap">
                                    <div class="content-front">
                                        <div class="cf-inner">
                                            <div class="fs-wrapper">
                                                <div class="bg "  data-bg="{{ $service->image->path ?? '' }}"></div>
                                                <div class="overlay overlay-bold"></div>
                                            </div>
                                            <div class="inner">
                                                <h2>{{ $service->name }}</h2>
                                                <div class="section-separator"><span><i class="fa-thin fa-gem"></i></span></div>
                                            </div>
                                            <div class="serv-num">{{ sprintf('%02d', $indexServ + 1) }}.</div>
                                        </div>
                                    </div>
                                    <div class="content-back">
                                        <div class="cf-inner">
                                            <div class="inner">
                                                <div class="dec-icon">
                                                    <i class="fa-light fa-spa"></i>
                                                </div>
                                                <p>{{ $service->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endforeach
                    <div class="dc_dec-item_left"><span></span></div>
                    <div class="dc_dec-item_right"><span></span></div>
                </div>
{{--                <a href="contact.html"   class="dwonload_btn">Khám phá thêm các dịch vụ</a>--}}
{{--                <div class="sc-dec" style="left: -220px; bottom: -100px;"></div>--}}
{{--                <div class="sc-dec2" style="right: -220px; top: -100px;"></div>--}}
            </div>
            <div class="content-dec2 fs-wrapper"></div>
            <div class="content-dec"><span></span></div>
        </div>
        <!-- section end  -->
        <!-- section   -->
        <div class="content-section dark-bg hidden-section  wide-section" data-scrollax-parent="true">
            <div class="bg"  data-bg="/site/images/bg/25.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay overlay-bold"></div>
            <div class="dec-corner dc_rt"></div>
            <div class="dec-corner dc_lt"></div>
            <div class="container">

                <!--boxed-container-->
                <div class="boxed-container" style="margin-top: 0 !important;">
                    <div class="boxed-container-title">
                        <div class="dec-container">
                            <div class="boxed-container-title_item">
                                <h4>{{ $videoBlock->title_1 }}</h4>
                                <h2>{{ $videoBlock->title_2 }}</h2>
                                <p class="has-drop-cap">
                                    {{ $videoBlock->intro }}
                                </p>
                                <div class="tbc-separator"></div>
{{--                                <div class="signature-opt">--}}
{{--                                    <div class="signature_title">--}}
{{--                                        <img src="/site/images/avatar/7.jpg" alt="">--}}
{{--                                        <div class="signature_title_item">--}}
{{--                                            <h5>Kevin Cooper</h5>--}}
{{--                                            <h6>Hotel Manager</h6>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="signature_item"><img src="/site/images/signature.png" class="respimg" alt=""></div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="boxed-container-wrap">
                        <div class="bg" data-bg="{{ $videoBlock->image->path ?? '' }}"></div>
                        <div class="overlay"></div>
                        <div class="promo-video">
                            <div class="video-box-btn image-popup-1 color-bg"  id="" data-html="#video1"><i class="fas fa-play"></i></div>
                            <h4>{{ $videoBlock->title_1 }}</h4>
                        </div>
                    </div>


                    <div style="display:none;" id="video1" class="popup_video"
                         data-videolink="{{ $videoBlock->youtube }}">
                        <div class=" lg-video-youtube">
                            <iframe width="100%" height="100%"
                                    frameborder="0"
                                    allow="autoplay; encrypted-media"
                                    allowfullscreen>
                            </iframe>
                        </div>
                    </div>

{{--                    <div style="display:none;" id="video1" class="popup_video" data-videolink="https://www.youtube.com/watch?v=ABC123XYZ">--}}
{{--                        <video class="lg-video-object lg-html5" controls preload="none">--}}
{{--                            <source src="https://diamant.kwst.net/" type="video/mp4">--}}
{{--                        </video>--}}

{{--                        <iframe--}}
{{--                            width="100%"--}}
{{--                            height="100%"--}}
{{--                            src="https://www.youtube.com/embed/ABC123XYZ?autoplay=1&rel=0"--}}
{{--                            frameborder="0"--}}
{{--                            allow="autoplay; encrypted-media"--}}
{{--                            allowfullscreen--}}
{{--                        ></iframe>--}}

{{--                    </div>--}}
                </div>
                <style>
                    .aminites-card-item img {
                        text-align: left;
                        display: block;
                        color: var(--main-color);
                        font-size: 3.0em;
                        margin-bottom: 40px;
                    }
                </style>
                <!--boxed-container end-->
                <div class="section-separator"><span><i class="fa-thin fa-gem"></i></span></div>
                <!--aminites-cards-wrap-->
                <div class="aminites-cards-wrap">
                    <div class="row">
                        @foreach($amenities as $indexAmi => $aminites)
                            <div class="col-lg-3">
                                <div class="aminites-card-item">
{{--                                    <i class="fa-light fa-alarm-clock"></i>--}}
                                    <img src="{{ $aminites->image->path ?? '' }}" width="36" height="37">
                                    <h4>{{ $aminites->title }}</h4>
                                    <p>{{ $aminites->content }}</p>
                                    <div class="tbc-separator"></div>
                                    <span class="aci_num">{{ sprintf('%02d', $indexAmi + 1) }}.</span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="dc_dec-item_left"><span></span></div>
                    <div class="dc_dec-item_right"><span></span></div>
                </div>
                <!--aminites-cards-wrap end-->
                <div class="sc-dec" style="left: -220px; bottom: -100px;"></div>
                <div class="sc-dec2" style="right:  220px; top: 50%;"></div>
            </div>
        </div>
        <!-- section end  -->
        <!-- section   -->
        <div class="content-section dark-bg no-padding column-section hidden-section" data-scrollax-parent="true">
            <div class="column-wrap-bg right-wrap">
                <div class="par-elem">
                    <div class="bg"  data-bg="{{ $newsBlock->image->path ?? '/site/images/bg/22.jpg' }}" data-scrollax="properties: { translateY: '20%' }"></div>
                    <div class="overlay"></div>
                </div>
                <div class="column-wrap-bg-text">
                    <h3>{{ $newsBlock->title_1 }}</h3>
                    <h4>{{ $newsBlock->title_2 }}</h4>
                    <a href="{{ $newsBlock->link }}" class="hero-rsto-link">{{ $newsBlock->title_link }}</a>
                </div>
            </div>
            <div class="column-section-wrap left-column-section" >
                <div class="container"  >
                    <div class="column-text">
                        <div class="section-title">
                            <h4>Tin tức mới nhất</h4>
                            <h2>Sự kiện và tin tức sắp tới</h2>
                            <div class="section-separator sect_se_transparent"><span><i class="fa-thin fa-gem"></i></span></div>
                        </div>
                        <!-- events-carousel-wrap -->
                        <div class="events-carousel-wrap">
                            <div class="events-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($posts as $post)
                                            <div class="swiper-slide">
                                                <div class="event-carousel-item">
                                                    <h4><a href="{{ route('front.blogDetail', $post->slug) }}">{{ $post->name }}</a></h4>
                                                    <span class="event-date">{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y') }}</span>
                                                    <p> {{ $post->intro }} </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="ec-button ec-button-prev"><i class="fas fa-angle-left"></i></div>
                            <div class="ec-button ec-button-next"><i class="fas fa-angle-right"></i></div>
                        </div>
                        <!-- events-carousel-wrap end -->
                        <a href="{{ route('front.blogs') }}" class="stg_link">Đọc tất cả tin tức</a>
                    </div>
                </div>
                <div class="map-dec2"></div>
                <div class="footer-separator fs_sin"><span></span></div>
            </div>
        </div>
        <!-- section end  -->
        <!-- section   -->
        <div class="content-section">
            <div class="container  ">
                <div class="section-title">
                    <h4>Khách hàng nói gì về chúng tôi</h4>
                    <h2>Những cảm nhận và chia sẻ</h2>
                    <div class="section-separator"><span><i class="fa-thin fa-gem"></i></span></div>
                </div>
                <div class="sc-dec3" style="left: 40%; bottom: -200px;"></div>
            </div>
            <div class="testimonilas-carousel-wrap">
                <div class="tc-button tc-button-next"><i class="fas fa-caret-right"></i></div>
                <div class="tc-button tc-button-prev"><i class="fas fa-caret-left"></i></div>
                <div class="testimonilas-carousel">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($reviews as $indexRev => $review)
                                <div class="swiper-slide">
                                    <div class="testi-item">
                                        <div class="testi-avatar"><img src="{{ $review->image->path ?? '' }}" alt=""></div>
                                        <div class="testimonilas-text">
                                            <div class="testimonilas-text-item">
                                                <h3 style="padding-bottom: 10px !important;">{{ $review->name }}</h3>
                                                <h4 style="padding-bottom: 5px !important;">{{ $review->position }}</h4>
                                                <div class="star-rating" data-starrating="5"> </div>
                                                <p>{{ $review->message }}</p>
                                            </div>
                                            <span class="testi-number">{{ sprintf('%02d', $indexRev + 1) }}.</span>
                                            <div class="testi-item-dec fs-wrapper"></div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="tcs-pagination tcs-pagination_init"></div>
            </div>
            <div class="content-dec2 fs-wrapper"></div>
        </div>
        <!-- section end  -->
        <div class="content-dec"><span></span></div>
    </div>
    <!--content end-->
@endsection
@push('scripts')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
        crossorigin="anonymous"
    ></script>
    <script>
        $('.image-popup-1').on('click', function(e){
            e.preventDefault();
            $.magnificPopup.open({
                items: {
                    src: $('#video1').data('videolink')  // vẫn để dạng watch?v=
                },
                type: 'iframe',
                iframe: {
                    patterns: {
                        youtube: {
                            index: 'youtube.com/',   // hoặc 'youtu.be'
                            id:     'v=',            // ký tự cắm trước ID
                            src:    'https://www.youtube.com/embed/%id%?autoplay=1&rel=0'
                        }
                    }
                },
                mainClass: 'mfp-fade'
            });
        });





    </script>

    <script>
        app.controller('homePage', function ($rootScope, $scope, $interval, loveItemSync) {

            $scope.addToMyHeart = function (roomId) {
                url = "{{route('love.add.item', ['roomId' => 'roomId'])}}";
                url = url.replace('roomId', roomId);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        'qty': 1
                    },
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function () {
                                loveItemSync.items = response.wishlistItems;
                                loveItemSync.count = response.count;
                            }, 1000);
                        } else {
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.toastr('Thao tác thất bại !');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }
        })
    </script>
@endpush
