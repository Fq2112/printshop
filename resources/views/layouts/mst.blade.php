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

    <link rel="stylesheet" href="{{asset('css/colors.php?color=1ABC9C')}}" type="text/css">

    <style>
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
            background: #1ABC9C;
            transition: background 0.15s ease;
        }
    </style>
    @stack('styles')
</head>

<body class="stretched use-nicescroll">
<div id="wrapper" class="clearfix">
    <div class="modal-on-load" data-target="#myModal1"></div>
    <div class="modal1 mfp-hide subscribe-widget divcenter" id="myModal1" style="max-width: 750px;">
        <div class="row justify-content-center bg-white align-items-center" style="min-height: 380px;">
            <div class="col-md-5 p-0">
                <div
                    style="background: url('{{asset('images/modals/modal1.jpg')}}') no-repeat center right; background-size: cover;  min-height: 380px;"></div>
            </div>
            <div class="col-md-7 bg-white p-4">
                <div class="heading-block nobottomborder mb-3">
                    <h3 class="font-secondary nott ">Join Our Newsletter &amp; Get <span class="text-danger">40%</span>
                        Off your First Order</h3>
                    <span>Get Latest Fashion Updates &amp; Offers</span>
                </div>
                <div class="widget-subscribe-form-result"></div>
                <form class="widget-subscribe-form2 mb-2" action="include/subscribe.php" method="post">
                    <input type="email" id="widget-subscribe-form2-email" name="widget-subscribe-form-email"
                           class="form-control required email" placeholder="Enter your Email Address..">
                    <div class="d-flex justify-content-between align-items-center mt-1">
                        <button class="button button-dark  bg-dark text-white ml-0" type="submit">Subscribe</button>
                        <a href="#" class="btn-link" onClick="$.magnificPopup.close();return false;">Don't Show me</a>
                    </div>
                </form>
                <small class="nobottommargin font-italic text-black-50">*We also hate Spam &amp; Junk Emails.</small>
            </div>
        </div>
    </div>
    <div class="modal1 mfp-hide" id="modal-register">
        <div class="card divcenter" style="max-width: 540px;">
            <div class="card-header py-3 nobg center">
                <h3 class="mb-0 t400">Hello, Welcome Back</h3>
            </div>
            <div class="card-body divcenter py-5" style="max-width: 70%;">

                <a href="#"
                   class="button button-large btn-block si-colored si-facebook nott t400 ls0 center nomargin"><i
                        class="icon-facebook-sign"></i> Log in with Facebook</a>

                <div class="divider divider-center"><span class="position-relative" style="top: -2px">OR</span></div>

                <form id="login-form" name="login-form" class="nobottommargin row" action="#" method="post">

                    <div class="col-12">
                        <input type="text" id="login-form-username" name="login-form-username" value=""
                               class="form-control not-dark" placeholder="Username"/>
                    </div>

                    <div class="col-12 mt-4">
                        <input type="password" id="login-form-password" name="login-form-password" value=""
                               class="form-control not-dark" placeholder="Password"/>
                    </div>

                    <div class="col-12">
                        <a href="#" class="fright text-dark t300 mt-2">Forgot Password?</a>
                    </div>

                    <div class="col-12 mt-4">
                        <button class="button btn-block nomargin" id="login-form-submit" name="login-form-submit"
                                value="login">Login
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer py-4 center">
                <p class="mb-0">Don't have an account? <a href="#"><u>Sign up</u></a></p>
            </div>
        </div>
    </div>

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
                    <a href="{{route('beranda')}}" class="standard-logo">
                        <img src="{{asset('images/logotype.png')}}" alt="Canvas Logo"></a>
                    <a href="{{route('beranda')}}" class="retina-logo">
                        <img src="{{asset('images/logotype@2x.png')}}" alt="Canvas Logo"></a>
                </div>

                <nav id="primary-menu" class="style-2 with-arrows">
                    @include('layouts.partials._headerMenu')

                    <div id="top-search">
                        <a href="#" id="top-search-trigger">
                            <i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                        <form action="search.html">
                            <input type="text" name="q" class="form-control" value=""
                                   placeholder="{{__('lang.header.search')}}">
                        </form>
                    </div>

                    <div id="top-cart">
                        <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart1"></i><span>5</span></a>
                        <div class="top-cart-content">
                            <div class="top-cart-title">
                                <h4>{{__('lang.header.cart')}}</h4>
                            </div>
                            <div class="top-cart-items">
                                <div class="top-cart-item clearfix">
                                    <div class="top-cart-item-image">
                                        <a href="#">
                                            <img src="{{asset('demos/shop/images/items/featured/5.jpg')}}"
                                                 alt="Blue Shoulder Bag"/></a>
                                    </div>
                                    <div class="top-cart-item-desc">
                                        <a href="#" class="t400">White athletic shoe</a>
                                        <span class="top-cart-item-price">$35.00</span>
                                        <span class="top-cart-item-quantity t600">x 1</span>
                                    </div>
                                </div>
                                <div class="top-cart-item clearfix">
                                    <div class="top-cart-item-image">
                                        <a href="#" class="t400"><img
                                                src="{{asset('demos/shop/images/items/featured/1.jpg')}}"
                                                alt="Leather Bag"/></a>
                                    </div>
                                    <div class="top-cart-item-desc">
                                        <a href="#" class="t400">Round Neck Solid Light Blue Colour T-shirts</a>
                                        <span class="top-cart-item-price">$12.49</span>
                                        <span class="top-cart-item-quantity t600">x 2</span>
                                    </div>
                                </div>
                            </div>
                            <div class="top-cart-action clearfix">
                                <span class="fleft top-checkout-price t600 text-dark">$59.98</span>
                                <button
                                    class="button button-dark button-small nomargin fright">{{__('lang.button.cart')}}</button>
                            </div>
                        </div>
                    </div>

                    <div id="top-account">
                        <a href="#modal-register" data-lightbox="inline"><i
                                class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i><span
                                class="d-none d-sm-inline-block font-primary t500">{{__('lang.button.login')}}</span></a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    @yield('content')

    <footer id="footer" class="nobg noborder">
        <div class="container clearfix">
            <div class="footer-widgets-wrap pb-3 border-bottom clearfix">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="widget clearfix">
                            <h4 class="ls0 mb-3 nott">Features</h4>
                            <ul class="list-unstyled iconlist ml-0">
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Paid with Moblie</a></li>
                                <li><a href="#">Status</a></li>
                                <li><a href="#">Changelog</a></li>
                                <li><a href="#">Contact Support</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="widget clearfix">
                            <h4 class="ls0 mb-3 nott">Support</h4>
                            <ul class="list-unstyled iconlist ml-0">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="widget clearfix">
                            <h4 class="ls0 mb-3 nott">Trending</h4>
                            <ul class="list-unstyled iconlist ml-0">
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Portfolio</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Forums</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="widget clearfix">
                            <h4 class="ls0 mb-3 nott">Get to Know us</h4>
                            <ul class="list-unstyled iconlist ml-0">
                                <li><a href="#">Corporate</a></li>
                                <li><a href="#">Agency</a></li>
                                <li><a href="#">eCommerce</a></li>
                                <li><a href="#">Personal</a></li>
                                <li><a href="#">OnePage</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8">
                        <div class="widget clearfix">
                            <h4 class="ls0 mb-3 nott">Subscribe Now</h4>
                            <div class="widget subscribe-widget mt-2 clearfix">
                                <p class="mb-4"><strong>Subscribe</strong> to Our Newsletter to get Important News,
                                    Amazing Offers &amp; Inside Scoops:</p>
                                <div class="widget-subscribe-form-result"></div>
                                <form id="widget-subscribe-form" action="include/subscribe.php" method="post"
                                      class="mt-1 nobottommargin d-flex">
                                    <input type="email" id="widget-subscribe-form-email"
                                           name="widget-subscribe-form-email"
                                           class="form-control sm-form-control required email"
                                           placeholder="Enter your Email Address">

                                    <button class="button nott t400 ml-1 my-0" type="submit">Subscribe Now</button>
                                </form>
                            </div>
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
<!-- AOS -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script src="{{asset('js/functions.js')}}"></script>

@include('layouts.partials._scripts')
@stack('scripts')
</body>
</html>
