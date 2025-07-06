@extends('site.layouts.master')

@section('title')
    {{ $service->name }} - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{ @$service->image->path ?? '' }}
@endsection

@section('css')

@endsection

@section('content')
    <div class="content-section parallax-section hero-section hidden-section" data-scrollax-parent="true">
        <div class="bg par-elem " data-bg="{{ @$service->category->image->path ?? '' }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
        <div class="container">
            <div class="section-title">
                <h4>Hãy tận hưởng trọn vẹn khoảnh khắc thư giãn tại khách sạn của chúng tôi.</h4>
                <h2>{{ $service->name }}</h2>
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
                <a href="{{ route('front.home-page') }}">Trang chủ</a><a href="{{ route('front.services', $service->category->slug) }}">{{ $service->category->name }}</a>
                <span>{{ $service->name }}</span>
            </div>
        </div>
        <!--breadcrumbs-wrap end  -->
        <!-- section   -->
        <div class="content-section">
            <div class="section-dec"></div>
            <div class="content-dec2 fs-wrapper"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-1">

                    </div>
                    <div class="col-lg-10">
                        <!-- blog media -->
                        <div class="blog-media">
                            <div class="single-slider-wrap">
                                <div class="single-slider">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper lightgallery">

                                            <div class="swiper-slide hov_zoom">
                                                <img src="{{ $service->image->path ?? '' }}" alt="">
                                                <a href="{{ $service->image->path ?? '' }}" class="box-media-zoom
                                                 popup-image"><i class="fal fa-search"></i>
                                                </a>
                                            </div>

                                            @foreach($service->galleries as $gallery)
                                                <div class="swiper-slide hov_zoom">
                                                    <img src="{{ $gallery->image->path ?? '' }}" alt="">
                                                    <a href="{{ $gallery->image->path ?? '' }}" class="box-media-zoom
                                                 popup-image"><i class="fal fa-search"></i>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="fw-carousel-button-prev slider-button"><i class="fa-solid fa-caret-left"></i></div>
                                <div class="fw-carousel-button-next slider-button"><i class="fa-solid fa-caret-right"></i></div>
                                <div class="sc-controls fwc_pag">
                                    <div class="ss-slider-pagination"></div>
                                </div>
                            </div>
                        </div>
                        <!-- blog media end -->
                        <div class="dec-container">
                            <div class="dc_dec-item_left"><span></span></div>
                            <div class="text-block">
                                <div class="text-block-title">
                                    <h4>{{ $service->name }}</h4>
                                </div>
                                <div class="room-card-details rcd-single">

                                </div>
                                <div class="text-block-container">
                                    {!! $service->content !!}
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1">

                    </div>


                </div>
                <div class="limit-box"></div>
                <!--post-related-->
                <div class="post-related">
                    <div class="post-related_title">
                        <h6>Khám phá những dịch vụ khác</h6>
                        <div class="section-separator"><span><i class="fa-thin fa-gem"></i></span></div>
                    </div>
                    <!-- post-related -->
                    <div class=" row">

                        @foreach($otherServices as $otherService)
                            <div class="item-related col-lg-4">
                                <a href="{{ route('front.getServiceDetail', $otherService->slug) }}" class="item-related_img">
                                    <img src="{{ $otherService->image->path ?? '' }}" class="respimg"   alt="">
                                    <div class="overlay"></div>
                                    <span>Chi tiết</span>
                                </a>
                                <h3><a href="{{ route('front.getServiceDetail', $otherService->slug) }}">{{ $otherService->name }}</a></h3>
                            </div>

                        @endforeach

                    </div>
                </div>
                <!-- post-related  end-->
            </div>
        </div>
        <!-- section end  -->
        <div class="content-dec"><span></span></div>
    </div>

@endsection

@push('scripts')


@endpush
