<!DOCTYPE html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    @include('site.partials.head')
    @yield('css')
</head>

<body ng-app="App" ng-cloak>
    <!-- lodaer  -->
    <div class="loader-wrap">
        <div class="loader-item">
            <div class="cd-loader-layer" data-frame="25">
                <div class="loader-layer"></div>
            </div>
            <span class="loader"><i class="fa-thin fa-gem"></i></span>
        </div>
    </div>
    <!-- loader end  -->

    <div id="main">
        @include('site.partials.header')

        @yield('content')

        <div class="height-emulator"></div>

        @include('site.partials.footer')
    </div>

    <div id="translate_select"></div>

    <script type="text/javascript" src="/site/js/elementa0d8.js?cb=googleTranslateElementInit"></script>

    @include('site.partials.angular_mix')

    <script  src="/site/js/jquery.min.js"></script>
    <script  src="/site/js/plugins.js"></script>
    <script  src="/site/js/scripts.js"></script>

    <script src="/site/js/callbutton.js"></script>

    <div class="hidden-xs">
        @if($config->click_call)
            <div onclick="window.location.href= 'tel:{{ $config->hotline }}'" class="hotline-phone-ring-wrap">
                <div class="hotline-phone-ring">
                    <div class="hotline-phone-ring-circle"></div>
                    <div class="hotline-phone-ring-circle-fill"></div>
                    <div class="hotline-phone-ring-img-circle">
                        <a href="tel: {{ $config->hotline }}" class="pps-btn-img">
                            <img src="/site/images/phone.png" alt="Gọi điện thoại" width="50" loading="lazy">
                        </a>
                    </div>
                </div>
                <a href="tel:{{ $config->hotline }}">
                </a>
                <div class="hotline-bar"><a href="tel:{{ $config->hotline }}">
                    </a><a href="tel:{{ $config->hotline }}">
                        <span class="text-hotline">{{ $config->hotline }}</span>
                    </a>
                </div>

            </div>
        @endif

        <div class="inner-fabs">
            @if($config->facebook_chat)
                <a target="blank" href="{{ $config->facebook }}" class="fabs roundCool" id="challenges-fab"
                   data-tooltip="Send Messenger">
                    <img class="inner-fab-icon" src="/site/images/mess1.png" alt="challenges-icon" border="0" loading="lazy">
                </a>
            @endif
            @if($config->zalo_chat)
                <a target="blank" href="https://zalo.me/{{ preg_replace('/\s+/', '', $config->zalo) }}" class="fabs roundCool" id="chat-fab"
                   data-tooltip="Send message Zalo">
                    <img class="inner-fab-icon" src="/site/images/icon_zalo.webp" alt="chat-active-icon" border="0" loading="lazy">
                </a>
            @endif

        </div>
        <div class="fabs roundCool call-animation" id="main-fab">
            <img class="img-circle" src="/site/images/lienhe.png" alt="" width="135" loading="lazy">
        </div>
    </div>



    <script>
        var CSRF_TOKEN = "{{ csrf_token() }}";
    </script>

    <script>
        function setActiveLang(lang) {
            document.querySelectorAll('.lang-switch').forEach(el => {
                el.classList.toggle('act-lang', el.dataset.lang === lang);
            });
        }

        function translateheader(lang) {
            localStorage.setItem('selectedLang', lang);
                console.log(lang)
            var sel = document.querySelector("select.goog-te-combo");
            if (!sel) {
                // Nếu chưa có, thử lại sau 100ms
                return setTimeout(function() {
                    translateheader(lang);
                }, 100);
            }

            // 1) Gán giá trị
            sel.value = lang;

            // 2) Tạo event theo chuẩn cũ (HTMLEvents)
            var evOld = document.createEvent("HTMLEvents");
            evOld.initEvent("change", true, true);
            sel.dispatchEvent(evOld);

            // 3) Tạo event theo chuẩn mới (Event constructor)
            var evNew = new Event("change", { bubbles: true, cancelable: true });
            sel.dispatchEvent(evNew);

            setActiveLang(lang);

        }

        window.addEventListener('DOMContentLoaded', () => {
            var lang = localStorage.getItem('selectedLang') || 'vi';
            setActiveLang(lang);
        });

        app.controller('headerPartial', function ($rootScope, $scope, loveItemSync, $interval) {
            $scope.love = loveItemSync;

            $scope.removeItem = function (roomId) {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('love.remove.item')}}",
                    data: {
                        roomId: roomId
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.love.items = response.wishlistItems;
                            $scope.love.count = Object.keys($scope.love.items).length;

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                loveItemSync.items = response.wishlistItems;
                                loveItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        jQuery.toast.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.removeAllWishList = function () {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('love.remove.allItem')}}",
                    success: function (response) {
                        if (response.success) {
                            $scope.love.items = response.wishlistItems;
                            $scope.love.count = Object.keys($scope.love.items).length;

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                loveItemSync.items = response.wishlistItems;
                                loveItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        jQuery.toast.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

        });

        app.factory('loveItemSync', function ($interval) {
            var love = {items: null, count: null};

            love.items = @json($wishlistItems);
            love.count = {{$wishlistItems->count()}};
            return love;
        });
    </script>

    @stack('scripts')
</body>

</html>
