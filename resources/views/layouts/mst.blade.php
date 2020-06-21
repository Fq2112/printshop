<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="SemiColonWeb">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700%7CMontserrat:300,400,500,600,700%7CMerriweather:300,400,300i,400i"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/dark.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/swiper.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('demos/shop/shop.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('demos/shop/css/fonts.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('css/font-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/glyphicons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/modal.css')}}">
    <link rel="stylesheet" href="{{asset('css/components/bs-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/components/datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/components/bs-switches.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/components/radio-checkbox.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/components/ion.rangeslider.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/components/bs-filestyle.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/media-query.css')}}" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/colors.php?color=f89406')}}" type="text/css">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="{{asset('js/plugins/sweetalert/sweetalert2.css')}}">

    <style>
        #primary-menu ul li .mega-menu-content.style-2 ul.mega-menu-column:not(.mega-menu-thumb) {
            padding: 5px 20px;
        }

        #primary-menu ul li .mega-menu-content ul:not(.mega-menu-column) {
            margin-top: -1em
        }

        #primary-menu ul li .mega-menu-content ul:not(.mega-menu-column) li {
            margin-top: -.7em
        }

        #primary-menu ul li .mega-menu-content ul:not(.mega-menu-column) li:hover > a {
            background-color: transparent;
        }

        #primary-menu .card-columns {
            column-gap: 0;
        }

        #primary-menu .card-columns .card {
            border: none;
            border-right: 1px solid #F2F2F2 !important;
            border-radius: 0;
            margin: 0;
            padding: 0;
        }

        .avatar img {
            width: 20px;
            padding: 0;
            margin-right: .5em;
            border-radius: 100%;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }

        .avatar:hover img {
            padding: 2px;
            border: 1px solid #f89406;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }

        span.twitter-typeahead {
            display: block !important;
            position: absolute;
            height: 100%;
        }

        .tt-menu {
            width: 100%;
            margin: 0;
            padding: 8px 0;
            background-color: #FFF;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 10px rgba(0, 0, 0, .1);
            -moz-box-shadow: 0 1px 10px rgba(0, 0, 0, .1);
            box-shadow: 0 1px 10px rgba(0, 0, 0, .1);

        }

        .tt-suggestion, .tt-empty, .tt-pending {
            padding: 3px 20px;
            font-size: 15px;
            line-height: 24px;
        }

        .tt-pending {
            height: 50px;
        }

        .tt-suggestion:hover {
            cursor: pointer;
            color: #FFF;
            background-color: #f89406;
        }

        .tt-suggestion.tt-cursor {
            color: #fff;
            background-color: #f89406;
        }

        .tt-suggestion img {
            width: 40px;
            height: 40px;
            border-radius: 4px;
            margin-right: .5em;
        }

        #top-search form input.form-control.tt-hint {
            color: #999 !important;
        }

        .has-feedback .form-control-feedback {
            position: absolute;
            right: 15px;
            display: block;
            width: 45px;
            height: 45px;
            line-height: 45px;
            text-align: center;
        }

        .bootstrap-select .dropdown-toggle {
            background-color: #fff;
            border-color: #ced4da;
        }

        .bootstrap-select > .dropdown-toggle.bs-placeholder {
            color: #909090;
        }

        .bootstrap-select .dropdown-menu {
            min-width: 100% !important;
            background: #fff !important;
            text-align: justify !important;
        }

        .bootstrap-select .dropdown-menu > .active > a,
        .bootstrap-select .dropdown-menu > .active > a:hover,
        .bootstrap-select .dropdown-menu > .active > a:focus {
            color: #fff !important;
            background: #f89406 !important;
        }

        .bootstrap-select a.dropdown-item:hover,
        .bootstrap-select a.dropdown-item:focus,
        .bootstrap-select a.dropdown-item:active {
            color: #fff !important;
            background: #f89406 !important;
        }

        .bootstrap-select .dropdown-menu li:hover,
        .bootstrap-select .dropdown-menu li:focus {
            background: #eee !important;
        }

        .parallax-overlay {
            background: linear-gradient(to bottom, rgba(0, 0, 0, .2) 0%, rgba(0, 0, 0, .45) 30%, rgba(0, 0, 0, .65) 80%, rgba(0, 0, 0, .85) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
        }

        .content-area {
            position: relative;
            cursor: default;
            overflow: hidden;
        }

        .custom-overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            background: rgba(255, 255, 255, 0.4);
            opacity: 0;
            transition: all 400ms ease-in-out;
            height: 100%;
        }

        .custom-overlay:hover {
            opacity: 1;
        }

        .custom-text {
            position: absolute;
            top: 50%;
            left: 10px;
            right: 10px;
            transform: translateY(-50%);
            color: #fff !important;
        }

        .content-area img {
            transition: transform .5s ease;
        }

        .content-area:hover img {
            transform: scale(1.2);
        }

        .form-control:disabled, button:disabled {
            cursor: no-drop;
        }

        .btn-primary {
            color: #fff;
            background-color: #f89406;
            border-color: #f89406;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #d77906;
            border-color: #c37906;
        }

        .btn-primary:focus, .btn-primary.focus {
            color: #fff;
            background-color: #d77906;
            border-color: #c37906;
            box-shadow: 0 0 0 0.2rem rgba(255, 153, 6, 0.5);
        }

        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #f89406;
            border-color: #f89406;
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #c37906;
            border-color: #af6806;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 153, 6, 0.5);
        }

        .btn-outline-primary {
            color: #f89406;
            border-color: #f89406;
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: #f89406;
            border-color: #f89406;
        }

        .btn-outline-primary:focus, .btn-outline-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 153, 6, 0.5);
        }

        .btn-outline-primary.disabled, .btn-outline-primary:disabled {
            color: #f89406;
            background-color: transparent;
        }

        .btn-outline-primary:not(:disabled):not(.disabled):active, .btn-outline-primary:not(:disabled):not(.disabled).active,
        .show > .btn-outline-primary.dropdown-toggle {
            color: #fff;
            background-color: #f89406;
            border-color: #f89406;
        }

        .btn-outline-primary:not(:disabled):not(.disabled):active:focus, .btn-outline-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-outline-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 153, 6, 0.5);
        }

        .pagination > li > a,
        .pagination > li > span {
            color: #777;
            background-color: #fff;
            border: 1px solid #ddd;
            font-weight: 600;
        }

        .pagination > li > a:hover,
        .pagination > li > span:hover,
        .pagination > li > a:focus,
        .pagination > li > span:focus {
            color: #9b6104;
        }

        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
            background-color: #f89406;
            border-color: #f89406;
        }

        .pagination > .disabled > a,
        .pagination > .disabled > a:focus,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > span,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > span:hover {
            pointer-events: none;
        }

        .myProgress {
            position: fixed;
            margin-bottom: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 5px;
            border-radius: 0;
            z-index: 20;
        }

        .myProgress .bar {
            height: 100%;
            width: 10%;
            transition: background 0.15s ease;
        }
    </style>
    @stack('styles')

    <script src='https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit' async defer></script>
</head>

<body class="stretched use-nicescroll">
<div id="wrapper" class="clearfix">
    @include('layouts.partials._modals')

    <div id="top-bar" class="d-none d-md-block">
        <div class="container clearfix">
            <div class="row justify-content-between">
                <div class="col d-lg-flex justify-content-end">
                    <div class="top-links">
                        <ul>
                            <li><a href="{{route('pro')}}">{{__('lang.header.pro')}}</a></li>
                            <li><a href="{{route('cara-pemesanan')}}">{{__('lang.header.how-to')}}</a></li>
                            <li><a href="{{route('faq')}}">FAQ</a></li>
                            <li><a href="{{route('tentang')}}">{{__('lang.header.about')}}</a></li>
                            <li><a href="{{route('kontak')}}">{{__('lang.header.contact')}}</a></li>
                            <li><a href="{{route('blog')}}">Blog</a></li>
                            <li>
                                @if($app->isLocale('id'))
                                    <a href="#"><img width="20" src="{{asset('images/icons/flags/id.svg')}}"
                                                     alt="Indonesia"> <i class="icon-angle-down"></i></a>
                                    <ul>
                                        <li><a href="{{LaravelLocalization::getLocalizedURL('en')}}">
                                                <img src="{{asset('images/icons/flags/en.svg')}}"
                                                     alt="English"> {{__('lang.lang.en')}}</a></li>
                                        <li><a href="{{LaravelLocalization::getLocalizedURL('id')}}">
                                                <img src="{{asset('images/icons/flags/id.svg')}}"
                                                     alt="Indonesia"> {{__('lang.lang.id')}}</a></li>
                                    </ul>
                                @else
                                    <a href="#"><img width="20" src="{{asset('images/icons/flags/en.svg')}}"
                                                     alt="English"> <i class="icon-angle-down"></i></a>
                                    <ul>
                                        <li><a href="{{LaravelLocalization::getLocalizedURL('id')}}">
                                                <img src="{{asset('images/icons/flags/id.svg')}}"
                                                     alt="Indonesia"> {{__('lang.lang.id')}}</a></li>
                                        <li><a href="{{LaravelLocalization::getLocalizedURL('en')}}">
                                                <img src="{{asset('images/icons/flags/en.svg')}}"
                                                     alt="English"> {{__('lang.lang.en')}}</a></li>
                                    </ul>
                                @endif
                            </li>
                            <li></li>
                        </ul>
                    </div>

                    <div id="top-social">
                        <ul>
                            <li><a href="https://fb.com/pages/Premiere-Digital-Printing/164943546903733"
                                   target="_blank" class="si-facebook">
                                    <span class="ts-icon"><i class="icon-facebook"></i></span>
                                    <span class="ts-text">Facebook</span></a></li>
                            <li><a href="https://instagram.com/premierprintingsby" target="_blank" class="si-instagram">
                                    <span class="ts-icon"><i class="icon-instagram"></i></span>
                                    <span class="ts-text">Instagram</span></a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=62817597777&text=&source=&data="
                                   target="_blank" class="si-whatsapp">
                                    <span class="ts-icon"><i class="icon-whatsapp"></i></span>
                                    <span class="ts-text">+62 817-597-777</span></a></li>
                            <li><a href="mailto:{{env('MAIL_USERNAME')}}" class="si-call">
                                    <span class="ts-icon"><i class="icon-envelope-alt"></i></span>
                                    <span class="ts-text">{{env('MAIL_USERNAME')}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header id="header" class="full-header clearfix">
        <div id="header-wrap">
            <div class="container clearfix">
                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <div id="logo">
                    <a href="{{route('beranda')}}" class="standard-logo">
                        <img src="{{asset('images/logotype.png')}}" alt="Canvas Logo"></a>
                    <a href="{{route('beranda')}}" class="retina-logo">
                        <img src="{{asset('images/logotype@2x.png')}}" alt="Canvas Logo"></a>
                </div>

                <nav id="primary-menu" class="style-2 with-arrows">
                    @include('layouts.partials._headerMenu')
                </nav>
            </div>
        </div>
    </header>

    @yield('content')

    <footer id="footer" class="nobg noborder">
        <div class="container clearfix">
            <div class="footer-widgets-wrap pt-5 pb-3 border-bottom clearfix">
                <div class="row">
                    <div class="col-lg-5 col-md-4 col-sm-12">
                        <div class="widget clearfix">
                            <img src="{{asset('images/logotype-footer.png')}}" alt="Logo" class="footer-logo"
                                 style="margin-top: -1.5rem">
                            {!! __('lang.footer.caption') !!}
                            <div
                                style="background: url('{{asset('images/world_map.png')}}') no-repeat center center; background-size: 100%;">
                                <address class="mb-3">
                                    <strong>{{__('lang.footer.headquarters')}}:</strong><br>
                                    Raya Kenjeran 469 Gading, Tambaksari, Surabaya, Jawa Timur &ndash; 60134.
                                </address>
                                <abbr title="{{__('lang.footer.phone')}}"><strong>{{__('lang.footer.phone')}}:</strong></abbr>
                                <a href="tel:+62313814969">(031) 3814969</a><br>
                                <abbr title="Fax"><strong>Fax:</strong></abbr> <a href="fax:+623.138.14969">(031)
                                    3814969</a><br>
                                <abbr title="Email"><strong>Email:</strong></abbr> <a
                                    href="mailto:{{env('MAIL_USERNAME')}}">{{env('MAIL_USERNAME')}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="widget clearfix">
                            <h4 class="ls0 mb-3 nott" data-toc-skip>{{__('lang.footer.link')}}</h4>
                            <ul class="list-unstyled iconlist ml-0">
                                <li><a href="{{route('pro')}}">{{__('lang.header.pro')}}</a></li>
                                <li><a href="{{route('cara-pemesanan')}}">{{__('lang.header.how-to')}}</a></li>
                                <li><a href="{{route('faq')}}">FAQ</a></li>
                                <li><a href="{{route('tentang')}}">{{__('lang.header.about')}}</a></li>
                                <li><a href="{{route('kontak')}}">{{__('lang.header.contact')}}</a></li>
                                <li><a href="{{route('blog')}}">Blog</a></li>
                            </ul>
                        </div>

                        <div class="widget clearfix">
                            <h4 class="ls0 mb-3 nott" data-toc-skip>{{__('lang.footer.payment')}}</h4>
                            <img src="{{asset('images/midtrans.svg')}}" alt="Logo" class="footer-logo">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div id="instagram" class="widget clearfix">
                            <h4 class="ls0 mb-3 nott" data-toc-skip>{{__('lang.ig-feed.head')}}</h4>
                            <div id="instagram-photos" class="instagram-photos masonry-thumbs grid-4"
                                 data-user="5834720953" data-count="12" data-type="user"></div>
                            {{--3832059847 | 5834720953--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="copyrights" class="nobg">
            <div class="container clearfix">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6">
                        © {{now()->format('Y')}} Premier Printing. All rights reserved.
                        <a href="http://rabbit-media.net" target="_blank">Rabbit Media</a>
                        @if(Route::currentRouteName() == 'user.profil')<br>Icons from
                        <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>@endif
                    </div>

                    <div class="col-md-6 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
                        <div class="copyright-links">
                            <a href="{{route('syarat-ketentuan')}}">{{__('lang.footer.tnc')}}</a> /
                            <a href="{{route('kebijakan-privasi')}}">{{__('lang.footer.pp')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<div id="gotoTop" class="icon-line-arrow-up"></div>
<div class="myProgress">
    <div class="bar"></div>
</div>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>

<!-- Bootstrap Typeaheadjs Plugin -->
<script src="{{asset('js/components/typehead.js')}}"></script>
<script src="{{asset('js/components/underscore-min.js')}}"></script>
<!-- Bootstrap Select Plugin -->
<script src="{{asset('js/components/bs-select.js')}}"></script>
<!-- Bootstrap Datepicker Plugin -->
<script src="{{asset('js/components/datepicker.js')}}"></script>
<!-- Bootstrap Switch Plugin -->
<script src="{{asset('js/components/bs-switches.js')}}"></script>
<!-- ion range-slider Plugin -->
<script src="{{asset('js/components/rangeslider.min.js')}}"></script>
<!-- Bootstrap File Upload Plugin -->
<script src="{{asset('js/components/bs-filestyle.js')}}"></script>
<!-- moment Plugin -->
<script src="{{asset('js/components/moment.js')}}"></script>
<!-- toggle password -->
<script src="{{asset('js/hideShowPassword.min.js')}}"></script>
<!-- check-mobile -->
<script src="{{asset('js/checkMobileDevice.js')}}"></script>
<!-- Nicescroll -->
<script src="{{asset('js/plugins/nicescroll/jquery.nicescroll.js')}}"></script>
<!-- sweetalert2 -->
<script src="{{asset('js/plugins/sweetalert/sweetalert.min.js')}}"></script>

<script src="{{asset('js/functions.js')}}"></script>

@include('layouts.partials._scripts')
@include('layouts.partials._alert')
@include('layouts.partials._confirm')
@stack('scripts')
</body>
</html>
