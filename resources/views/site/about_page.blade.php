@extends('site.layouts.master')

@section('title')Về chúng tôi - {{ $config->web_title }}@endsection
@section('description'){{ strip_tags(html_entity_decode($config->introduction)) }}@endsection
@section('image'){{@$config->image->path ?? ''}}@endsection

@section('css')

@endsection

@section('content')
    <div class="content-section parallax-section hero-section hidden-section" data-scrollax-parent="true">
        <div class="bg par-elem " data-bg="{{ $banner->image->path ?? '' }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
        <div class="container">
            <div class="section-title">
                <h4>Hãy tận hưởng trọn vẹn khoảnh khắc thư giãn tại khách sạn của chúng tôi.</h4>
                <h2>Về chúng tôi</h2>
                <div class="section-separator"><span><i class="fa-thin fa-gem"></i></span></div>
            </div>
        </div>
        <div class="hero-section-scroll">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
        </div>
        <div class="dec-corner dc_lb"></div>
        <div class="dec-corner dc_rb"></div>
        <div class="dec-corner dc_rt"></div>
        <div class="dec-corner dc_lt"></div>
    </div>
    <!-- section end  -->
    <!--content-->
    <div class="content">
        <!-- breadcrumbs-wrap  -->
        <div class="breadcrumbs-wrap">
            <div class="container">
                <a href="{{ route('front.home-page') }}">Trang chủ</a><span>Về chúng tôi</span>
            </div>
        </div>
        <!--breadcrumbs-wrap end  -->
        <!-- section   -->
        <div class="content-section">
            <div class="section-dec"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-align_left" style="margin-top: 50px;">
                            <h4>Đôi nét về chúng tôi</h4>
                        </div>
                        <div class="text-block tb-sin">
                            {!! $config->web_des !!}

                            <div class="dc_dec-item_left"><span></span></div>
                        </div>
                    </div>

                </div>
                <div class="sc-dec" style="left: -220px; bottom: -100px;"></div>
            </div>
            <div class="content-dec2 fs-wrapper"></div>
            <div class="content-dec"><span></span></div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
    </script>

    <script>
        $(function(){
            var $carousel = $('.testimonial-one__carousel');

            function equalizeHeights() {
                var maxH = 0;
                // reset
                $carousel.find('.testimonial-one__single').css('height','auto');
                // tính max
                $carousel.find('.testimonial-one__single').each(function(){
                    maxH = Math.max( maxH, $(this).outerHeight() );
                });
                // gán cho tất cả
                $carousel.find('.testimonial-one__single').css('height', maxH + 'px');
            }

            // Khi Owl khởi tạo xong hoặc refresh (thêm/resize)
            $carousel.on('initialized.owl.carousel refreshed.owl.carousel', function(){
                equalizeHeights();
            });

            // Force refresh 1 lần để khơi event trên (nếu bạn chỉ dùng data-owl-options)
            $carousel.trigger('refresh.owl.carousel');

            // Re-equalize mỗi khi window resize
            $(window).on('resize', equalizeHeights);
        });
    </script>




@endpush
