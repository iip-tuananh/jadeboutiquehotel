@extends('site.layouts.master')
@section('title')
    Liên hệ - {{ $config->web_title }}
@endsection
@section('description')
    {{ strip_tags(html_entity_decode($config->introduction)) }}
@endsection
@section('image')
    {{ @$config->image->path ?? '' }}
@endsection

@section('css')
<style>
    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 100%;
        color: #dc3545;
    }
</style>

<style>
    .send-success-message {
        display: flex;
        align-items: center;
        background-color: #e6ffed;     /* nền xanh nhạt */
        border: 1px solid #71d58b;      /* viền xanh tươi */
        color: #2d6a4f;                 /* chữ xanh đậm */
        padding: 12px 16px;
        border-radius: 8px;
        font-size: 1rem;
        gap: 12px;                      /* khoảng cách icon - text */
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        margin-bottom: 10px;
    }

    .send-success-message i {
        font-size: 1.4rem;
    }

    .send-success-message p {
        margin: 0;
        line-height: 1.4;
    }
</style>
@endsection

@section('content')
    <div class="content-section parallax-section hero-section hidden-section" data-scrollax-parent="true">
        <div class="bg par-elem " data-bg="{{ $banner->image->path ?? '' }}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
        <div class="container">
            <div class="section-title">
                <h4>Hãy tận hưởng trọn vẹn khoảnh khắc thư giãn tại khách sạn của chúng tôi.</h4>
                <h2>Liên hệ</h2>
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
    <div class="content" ng-controller="AboutPage">
        <!-- breadcrumbs-wrap  -->
        <div class="breadcrumbs-wrap">
            <div class="container">
                <a href="{{ route('front.home-page') }}">Trang chủ</a><span>Liên hệ</span>
            </div>
        </div>
        <!--breadcrumbs-wrap end  -->
        <!-- section   -->
        <div class="content-section">
            <div class="section-dec"></div>
            <div class="content-dec2 fs-wrapper"></div>
            <div class="container">
                <!-- contacts-cards-wrap  -->
                <div class="contacts-cards-wrap">
                    <div class="dec-container">
                        <div class="text-block">
                            <div class="row">
                                <!-- contacts-card-item -->
                                <div class="col-lg-4">
                                    <div class="contacts-card-item">
                                        <i class="fa-light fa-location-dot"></i>
                                        <span>Địa chỉ</span>
                                        <a href="#">{{ $config->address_company }}</a>
                                    </div>
                                </div>
                                <!-- contacts-card-item end-->
                                <!-- contacts-card-item -->
                                <div class="col-lg-4">
                                    <div class="contacts-card-item">
                                        <i class="fa-light fa-phone-rotary"></i>
                                        <span>Hotline</span>
                                        <a href="#">{{ $config->hotline }}</a>
                                    </div>
                                </div>
                                <!-- contacts-card-item end-->
                                <!-- contacts-card-item -->
                                <div class="col-lg-4">
                                    <div class="contacts-card-item">
                                        <i class="fa-light fa-mailbox"></i>
                                        <span>Email</span>
                                        <a href="#">{{ $config->email }}</a>
                                    </div>
                                </div>
                                <!-- contacts-card-item end-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- contacts-cards-wrap end   -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="dec-container">
                            <div class="text-block">
                                <div class="text-block ">
                                    <div class="tbc_subtitle">Để lại lời nhắn</div>
                                    <div class="tbc-separator"></div>
                                    <div class="contactform-wrap">
                                        <form class="comment-form" name="contactform" id="form-contact">
                                            <fieldset>
                                                <div id="message"></div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="text" name="name" id="name" placeholder="Họ tên *" value="">
                                                        <div class="invalid-feedback d-block" ng-if="errors['name']"><% errors['name'][0] %></div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text"  name="phone" id="email" placeholder="Số điện thoại*" value="">
                                                        <div class="invalid-feedback d-block" ng-if="errors['phone']"><% errors['phone'][0] %></div>
                                                    </div>
                                                </div>
                                                <textarea name="message"  id="comments" cols="40" rows="3" placeholder="Tin nhắn"></textarea>

                                                <div class="col-lg-12" ng-if="sendSuccess">
                                                    <div class="space10"></div>
                                                    <div class="send-success-message">
                                                        <i class="fas fa-check-circle"></i>
                                                        <p style="padding-bottom: 0px">Cảm ơn bạn đã để lại lời nhắn. Tin nhắn đã được gửi</p>
                                                    </div>
                                                </div>

                                                <div class="invalid-feedback d-block" ng-if="errors['message']"><% errors['message'][0] %></div>
                                                <button class="commentssubmit" id="submit_cnt" ng-click="submitContact()">Gửi tin nhắn  </button>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="map-container  mapC_vis">
                            <div id="singleMap" class="fs-wrapper" >
                                {!! $config->location !!}
                            </div>
                            <div class="scrollContorl"></div>
                        </div>
                    </div>
                </div>
                <div class="dc_dec-item_left"><span></span></div>
                <div class="dc_dec-item_right"><span></span></div>
            </div>
        </div>
        <!-- section end  -->
        <div class="content-dec"><span></span></div>
    </div>
@endsection

@push('scripts')
    <script>
        app.controller('AboutPage', function ($rootScope, $scope, $sce, $interval) {
            $scope.errors = [];
            $scope.sendSuccess = false;

            $scope.submitContact = function () {
                var url = "{{route('front.submitContact')}}";
                var data = jQuery('#form-contact').serialize();
                $scope.loading = true;
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            jQuery('#form-contact')[0].reset();
                            $scope.errors = [];
                            $scope.sendSuccess = true;
                            $scope.$apply();
                        } else {
                            $scope.errors = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading = false;
                        $scope.$apply();
                    }
                });
            }
        })

    </script>
@endpush
