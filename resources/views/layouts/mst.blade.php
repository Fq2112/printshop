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
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" type="text/css">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="{{asset('js/plugins/sweetalert/sweetalert2.css')}}">

    <style>
        #welcomeModal .block {
            background: linear-gradient(to bottom, rgba(0, 0, 0, .2) 0%, rgba(0, 0, 0, .45) 30%, rgba(0, 0, 0, .65) 80%, rgba(0, 0, 0, .85) 100%), url('{{asset('images/banner/pro.jpg')}}') no-repeat;
            background-size: cover;
            background-blend-mode: multiply;
            max-width: 700px;
        }

        #welcomeModal .dark .button.button-border:not(.button-light) {
            border-color: #eee;
            color: #eee;
        }

        @media (max-width: 480px) {
            .footer-logo {
                width: 170px;
            }
        }

        @media (max-width: 360px) {
            .footer-logo {
                width: 150px;
            }
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
                            <img src="{{asset('images/logotype-footer.png')}}" alt="Logo" width="128"
                                 class="footer-logo mb-3" style="margin-top: -1.5rem">
                            {!! __('lang.footer.caption') !!}
                            <div class="mb-3"
                                 style="background: url('{{asset('images/world_map.png')}}') no-repeat center center; background-size: 100%;">
                                <address class="mb-3">
                                    <strong>{{__('lang.footer.headquarters')}}:</strong><br>
                                    Raya Kenjeran 471 Gading, Tambaksari, Surabaya, Jawa Timur &ndash; 60134.
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

                        <div class="widget mt-0 clearfix">
                            <h4 class="ls0 mb-0 nott" data-toc-skip>{{__('lang.footer.tracking')}}</h4>
                            <button type="button" onclick="orderTrack()"
                                    class="button button-3d button-primary button-rounded mx-0 mb-3">
                                <i class="icon-crosshairs mr-2"></i>{{__('lang.button.tracking')}}
                            </button>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="widget clearfix">
                            <h4 class="ls0 mb-3 nott" data-toc-skip>{{__('lang.footer.payment')}}</h4>
                            <img src="{{asset('images/midtrans.svg')}}" alt="Logo" class="footer-logo">
                        </div>

                        <div class="widget clearfix">
                            <h4 class="ls0 mb-3 nott" data-toc-skip>{{__('lang.footer.shipping')}}</h4>
                            <img src="{{asset('images/shipper.png')}}" alt="Logo" class="footer-logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="copyrights" class="nobg">
            <div class="container clearfix">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6">
                        © {{now()->format('Y').' '.env('APP_NAME')}}. All rights reserved.
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
<script src="{{asset('js/components/moment-with-locales.min.js')}}"></script>
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
