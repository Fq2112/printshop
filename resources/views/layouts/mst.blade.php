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
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">

    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/colors.php?color=f89406')}}" type="text/css">

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
</head>

<body class="stretched use-nicescroll">
<div id="wrapper" class="clearfix">
    @include('layouts.partials._modals')

    <div id="top-bar" class="d-none d-md-block">
        <div class="container clearfix">
            <div class="row justify-content-between">
                <div class="col d-none d-lg-flex justify-content-end">
                    <div class="top-links">
                        <ul>
                            <li><a href="#">{{__('lang.header.pro')}}</a></li>
                            <li><a href="#">{{__('lang.header.how-to')}}</a></li>
                            <li><a href="#">{{__('lang.header.faq')}}</a></li>
                            <li><a href="#">{{__('lang.header.about')}}</a></li>
                            <li><a href="#">{{__('lang.header.contact')}}</a></li>
                            <li>
                                @if(\Illuminate\Support\Facades\Request::is(['/*', 'id*']))
                                    <a href="#"><img width="20" src="{{asset('images/icons/flags/indonesia.svg')}}"
                                                     alt="Indonesia"> <i class="icon-angle-down"></i></a>
                                    <ul>
                                        <li><a href="{{route(Route::currentRouteName(),'en')}}">
                                                <img src="{{asset('images/icons/flags/united-states.svg')}}"
                                                     alt="English"> {{__('lang.lang.en')}}</a></li>
                                        <li><a href="{{route(Route::currentRouteName(),'id')}}">
                                                <img src="{{asset('images/icons/flags/indonesia.svg')}}"
                                                     alt="Indonesia"> {{__('lang.lang.id')}}</a></li>
                                    </ul>
                                @else
                                    <a href="#"><img width="20" src="{{asset('images/icons/flags/united-states.svg')}}"
                                                     alt="English"> <i class="icon-angle-down"></i></a>
                                    <ul>
                                        <li><a href="{{route(Route::currentRouteName(),'id')}}">
                                                <img src="{{asset('images/icons/flags/indonesia.svg')}}"
                                                     alt="Indonesia"> {{__('lang.lang.id')}}</a></li>
                                        <li><a href="{{route(Route::currentRouteName(),'en')}}">
                                                <img src="{{asset('images/icons/flags/united-states.svg')}}"
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
                    <a href="{{route('beranda', $app->getLocale())}}" class="standard-logo">
                        <img src="{{asset('images/logotype.png')}}" alt="Canvas Logo"></a>
                    <a href="{{route('beranda', $app->getLocale())}}" class="retina-logo">
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
                            <h4 class="ls0 mb-3 nott">{{__('lang.footer.link')}}</h4>
                            <ul class="list-unstyled iconlist ml-0">
                                <li><a href="#">{{__('lang.header.pro')}}</a></li>
                                <li><a href="#">{{__('lang.header.how-to')}}</a></li>
                                <li><a href="#">{{__('lang.header.faq')}}</a></li>
                                <li><a href="#">{{__('lang.header.about')}}</a></li>
                                <li><a href="#">{{__('lang.header.contact')}}</a></li>
                            </ul>
                        </div>

                        <div class="widget clearfix">
                            <h4 class="ls0 mb-3 nott">{{__('lang.footer.social')}}</h4>
                            <a href="https://fb.com/pages/Premiere-Digital-Printing/164943546903733" target="_blank"
                               class="social-icon si-small si-rounded si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="https://instagram.com/premierprintingsby" target="_blank"
                               class="social-icon si-small si-rounded si-instagram">
                                <i class="icon-instagram"></i>
                                <i class="icon-instagram"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=62817597777&text=&source=&data="
                               target="_blank"
                               class="social-icon si-small si-rounded si-whatsapp">
                                <i class="icon-whatsapp"></i>
                                <i class="icon-whatsapp"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="widget clearfix">
                            <h4 class="ls0 mb-3 nott">{{__('lang.footer.subs-head')}}</h4>
                            <div class="widget subscribe-widget mt-2 clearfix">
                                <p class="mb-4">{!! __('lang.footer.subs-capt') !!}</p>
                                <div class="widget-subscribe-form-result"></div>
                                <form id="widget-subscribe-form" action="{{asset('include/subscribe.php')}}"
                                      method="post"
                                      class="mt-1 nobottommargin d-flex">
                                    <input type="email" id="widget-subscribe-form-email"
                                           name="widget-subscribe-form-email"
                                           class="form-control sm-form-control required email"
                                           placeholder="{{__('lang.placeholder.email')}}">

                                    <button class="button nott t400 ml-1 my-0" type="submit">
                                        {{__('lang.button.subs')}}</button>
                                </form>
                            </div>
                        </div>

                        <div class="widget clearfix">
                            <h4 class="ls0 mb-3 nott">{{__('lang.footer.payment')}}</h4>
                            <img src="{{asset('images/logo-midtrans-color.svg')}}" alt="Logo" class="footer-logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="copyrights" class="nobg">
            <div class="container clearfix">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6">
                        © {{now()->format('Y')}} Premier Printing. All rights reserved | Designed & Developed by
                        <a href="http://rabbit-media.net" target="_blank">Rabbit Media</a><br>
                    </div>

                    <div class="col-md-6 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
                        <div class="copyright-links">
                            <a href="#">{{__('lang.footer.tnc')}}</a> / <a href="#">{{__('lang.footer.pp')}}</a>
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

<!-- check-mobile -->
<script src="{{asset('js/checkMobileDevice.js')}}"></script>
<!-- Nicescroll -->
<script src="{{asset('js/plugins/nicescroll/jquery.nicescroll.js')}}"></script>

<script src="{{asset('js/functions.js')}}"></script>

@include('layouts.partials._scripts')
@stack('scripts')
</body>
</html>
