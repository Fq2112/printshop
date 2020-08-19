@extends('layouts.mst')
@section('title', __('lang.title'))
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/settings.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/navigation.css')}}">
    <style>
        #welcomeModal .block,
        #langModal .block {
            background: linear-gradient(to bottom, rgba(0, 0, 0, .2) 0%, rgba(0, 0, 0, .45) 30%, rgba(0, 0, 0, .65) 80%, rgba(0, 0, 0, .85) 100%), url('{{asset('images/banner/pro.jpg')}}') no-repeat;
            background-size: cover;
            background-blend-mode: multiply;
            max-width: 700px;
        }

        #welcomeModal .dark .button.button-border:not(.button-light),
        #langModal .dark .button.button-border:not(.button-light) {
            border-color: #eee;
            color: #eee;
        }

        .card-label {
            width: 100%;
            margin-bottom: 0;
        }

        .card-label .card-title {
            text-transform: none;
        }

        .card-rb {
            display: none;
        }

        .card-input {
            cursor: pointer;
            background-color: transparent !important;
            opacity: .6;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }

        .card-input:hover {
            opacity: .8;
        }

        .card-rb:checked + .card-input {
            opacity: 1;
        }

        .revo-slider-emphasis-text {
            font-size: 58px;
            font-weight: 700;
            letter-spacing: 1px;
            font-family: 'Raleway', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Raleway', sans-serif;
        }

        .tp-video-play-button {
            display: none !important;
        }

        .tp-caption {
            white-space: nowrap;
        }

        .media .media-body ul {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
            font-size: 17px;
        }

        .feature-box .fbox-icon a {
            cursor: default;
        }

        .feature-box .fbox-icon a:hover i {
            color: #fff;
        }

        body.device-touch.device-sm .portfolio-notitle .portfolio-desc,
        body.device-touch.device-xs .portfolio-notitle .portfolio-desc {
            display: block !important;
        }

        .owl-carousel .owl-stage {
            padding: 0;
        }

        .owl-carousel .owl-dots .owl-dot {
            margin-top: 0;
        }

        .eapps-instagram-feed-posts-slider-inner {
            width: 100% !important;
        }

        .portfolio-notitle .portfolio-item:hover .portfolio-desc,
        .portfolio-notitle .iportfolio:hover .portfolio-desc {
            bottom: 12px !important;
        }

        @media (max-width: 991.98px) {
            .portfolio .portfolio-item {
                width: 25%;
            }

            .portfolio-notitle .portfolio-desc {
                height: 65px;
                padding: 10px 5px;
            }

            .portfolio-desc h3 {
                font-size: 14px;
            }

            .portfolio-desc span {
                font-size: 11px;
            }
        }

        @media (max-width: 767.98px) {
            .process-steps li {
                float: left;
                width: 20% !important;
                margin-top: 0;
            }

            .process-steps li h5 {
                margin: 15px 0 0 0;
            }

            .process-steps li:before,
            .process-steps li:after {
                display: unset;
            }
        }

        @media (min-width: 481px) and (max-width: 767px) {
            .col_one_fourth.--custom {
                width: 22%;
                float: left;
                margin-right: 4%;
            }

            .col_one_fourth.--custom .feature-box.fbox-center .fbox-icon {
                width: 50px;
                height: 50px;
                margin-bottom: 1em;
            }

            .col_one_fourth.--custom .feature-box.fbox-center.fbox-border .fbox-icon i {
                font-size: 25px;
                line-height: 48px !important;
            }

            .col_one_fourth.--custom .feature-box.fbox-center.fbox-border h3,
            .col_one_fourth.--custom .feature-box.fbox-center.fbox-border p {
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .col_one_fourth.--custom {
                width: 22%;
                float: left;
                margin-right: 4%;
            }

            .col_one_fourth.--custom .feature-box.fbox-center .fbox-icon {
                width: 45px;
                height: 45px;
                margin-bottom: 1em;
            }

            .col_one_fourth.--custom .feature-box.fbox-center.fbox-border .fbox-icon i {
                font-size: 20px;
                line-height: 45px !important;
            }

            .col_one_fourth.--custom .feature-box.fbox-center.fbox-border h3,
            .col_one_fourth.--custom .feature-box.fbox-center.fbox-border p {
                font-size: 10px;
            }

            .portfolio .portfolio-item {
                width: 50%;
                padding: 0 12px 12px 0;
            }

            .portfolio-notitle .portfolio-desc {
                height: 55px;
                padding: 5px;
            }

            .portfolio-desc h3 {
                font-size: 13px;
            }

            .portfolio-desc span {
                font-size: 10px;
            }

            .media .media-body h2 {
                font-size: 16px;
            }

            .media .media-body ul {
                font-size: 14px;
            }

            .process-steps li h5 {
                font-size: 13px;
            }

            .process-steps li a.i-bordered {
                width: 40px !important;
                height: 40px !important;
                line-height: 40px !important;
                font-size: 20px !important;
            }
        }

        @media (max-width: 360px) {
            .col_one_fourth.--custom {
                width: 22%;
                float: left;
                margin-right: 4%;
            }

            .col_one_fourth.--custom .feature-box.fbox-center .fbox-icon {
                width: 40px;
                height: 40px;
                margin-bottom: 1em;
            }

            .col_one_fourth.--custom .feature-box.fbox-center.fbox-border .fbox-icon i {
                font-size: 18px;
                line-height: 38px !important;
            }

            .col_one_fourth.--custom .feature-box.fbox-center.fbox-border h3,
            .col_one_fourth.--custom .feature-box.fbox-center.fbox-border p {
                font-size: 8px;
            }

            .portfolio .portfolio-item {
                width: 50%;
                padding: 0 12px 12px 0;
            }

            .portfolio-notitle .portfolio-desc {
                height: 55px;
                padding: 5px;
            }

            .portfolio-desc h3 {
                font-size: 13px;
            }

            .portfolio-desc span {
                font-size: 10px;
            }

            .media .media-body h2 {
                font-size: 14px;
            }

            .media .media-body ul {
                font-size: 13px;
            }

            .process-steps li h5 {
                font-size: 10px;
            }

            .process-steps li a.i-bordered {
                width: 35px !important;
                height: 35px !important;
                line-height: 35px !important;
                font-size: 17px !important;
            }
        }
    </style>
@endpush
@section('content')
    <!-- revo-slider -->
    <section id="slider" class="slider-element slider-parallax revslider-wrap ohidden clearfix">
        <div id="rev_slider_ishop_wrapper" class="rev_slider_wrapper fullwidth-container" data-alias="default-slider"
             style="padding:0px;">
            <div id="rev_slider_ishop" class="rev_slider fullwidthbanner" style="display:none;" data-version="5.1.4">
                <ul>
                    <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-delay="5000"
                        data-saveperformance="off" data-title="{{__('lang.revo.bc-1')}}"
                        style="background-color: #eee;">
                        <div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="[600,630,630,630,630,630]"
                             data-y="-25"
                             data-transform_in="x:250;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:400;e:Power4.easeOutQuad;"
                             data-speed="400"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <img src="{{asset('images/slider/rev/business-card.png')}}" alt="{{__('lang.revo.bc-1')}}">
                        </div>
                        <div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="[0,70,70,70,70,70]"
                             data-y="110"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333;">{{__('lang.revo.head')}}
                        </div>
                        <div class="tp-caption ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                             data-x="[-4,66,66,66,66,66]"
                             data-y="140"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1200"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn"
                             style=" color: #333; max-width: 430px; line-height: 1.15;">{{__('lang.revo.bc-1')}}
                        </div>
                        <div class="tp-caption ltl tp-resizeme revo-slider-desc-text tleft"
                             data-x="[0,70,70,70,70,70]"
                             data-y="240"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1400"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn"
                             style=" color: #333; max-width: 550px; white-space: normal;">{{__('lang.revo.bc-2')}}
                        </div>
                        <div class="tp-caption ltl tp-resizeme"
                             data-x="[0,70,70,70,70,70]"
                             data-y="340"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1550"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <a href="{{route('produk',['produk' => 'business-cards'])}}"
                               class="button button-border button-large button-rounded tright nomargin">
                                <span>{{__('lang.button.shop')}}</span><i class="icon-angle-right"></i></a>
                        </div>
                        {{--<div class="tp-caption utb tp-resizeme revo-slider-caps-text uppercase"
                             data-x="510"
                             data-y="0"
                             data-transform_in="x:0;y:-236;z:0;rotationZ:0;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="600"
                             data-start="2100"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <img src="{{asset('images/slider/rev/shop/tag.png')}}" alt="Bag">
                        </div>--}}
                    </li>

                    <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-delay="5000"
                        data-saveperformance="off" data-title="{{__('lang.revo.bro-1')}}"
                        style="background-color: #f6f6f6;">
                        <div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="610"
                             data-y="-10"
                             data-transform_in="x:250;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:400;e:Power4.easeOutQuad;"
                             data-speed="400"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <img src="{{asset('images/slider/rev/brochure.png')}}" alt="{{__('lang.revo.bro-1')}}">
                        </div>
                        <div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="[0,70,70,70,70,70]"
                             data-y="110"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333;">{{__('lang.revo.head')}}
                        </div>
                        <div class="tp-caption ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                             data-x="[-4,66,66,66,66,66]"
                             data-y="140"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1200"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn"
                             style=" color: #333; max-width: 430px; line-height: 1.15;">{{__('lang.revo.bro-1')}}
                        </div>
                        <div class="tp-caption ltl tp-resizeme revo-slider-desc-text tleft"
                             data-x="[0,70,70,70,70,70]"
                             data-y="240"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1400"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn"
                             style=" color: #333; max-width: 550px; white-space: normal;">{{__('lang.revo.bro-2')}}
                        </div>
                        <div class="tp-caption ltl tp-resizeme"
                             data-x="[0,70,70,70,70,70]"
                             data-y="340"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1550"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <a href="{{route('produk',['produk' => 'brochures'])}}"
                               class="button button-border button-large button-rounded tright nomargin">
                                <span>{{__('lang.button.shop')}}</span><i class="icon-angle-right"></i></a>
                        </div>
                        {{--<div class="tp-caption utb tp-resizeme revo-slider-caps-text uppercase"
                             data-x="510"
                             data-y="0"
                             data-transform_in="x:0;y:-236;z:0;rotationZ:0;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="600"
                             data-start="2100"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <img src="{{asset('images/slider/rev/shop/tag.png')}}" alt="Bag">
                        </div>--}}
                    </li>

                    <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-delay="5000"
                        data-saveperformance="off" data-title="{{__('lang.revo.fly-1')}}"
                        style="background-color: #f6f6f6;">
                        <div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="500"
                             data-y="-30"
                             data-transform_in="x:250;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:400;e:Power4.easeOutQuad;"
                             data-speed="400"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <img src="{{asset('images/slider/rev/flyer.png')}}" alt="{{__('lang.revo.fly-1')}}">
                        </div>
                        <div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="[0,70,70,70,70,70]"
                             data-y="110"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333;">{{__('lang.revo.head')}}
                        </div>
                        <div class="tp-caption ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                             data-x="[-4,66,66,66,66,66]"
                             data-y="140"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1200"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn"
                             style=" color: #333; max-width: 430px; line-height: 1.15;">{{__('lang.revo.fly-1')}}
                        </div>
                        <div class="tp-caption ltl tp-resizeme revo-slider-desc-text tleft"
                             data-x="[0,70,70,70,70,70]"
                             data-y="240"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1400"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn"
                             style=" color: #333; max-width: 550px; white-space: normal;">{{__('lang.revo.fly-2')}}
                        </div>
                        <div class="tp-caption ltl tp-resizeme"
                             data-x="[0,70,70,70,70,70]"
                             data-y="340"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1550"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <a href="{{route('produk',['produk' => 'flyers'])}}"
                               class="button button-border button-large button-rounded tright nomargin">
                                <span>{{__('lang.button.shop')}}</span><i class="icon-angle-right"></i></a>
                        </div>
                        {{--<div class="tp-caption utb tp-resizeme revo-slider-caps-text uppercase"
                             data-x="510"
                             data-y="0"
                             data-transform_in="x:0;y:-236;z:0;rotationZ:0;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="600"
                             data-start="2100"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <img src="{{asset('images/slider/rev/shop/tag.png')}}" alt="Bag">
                        </div>--}}
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="content">
        <div class="content-wrap py-4">
            <!-- why choose us -->
            <div id="why-us" class="container clearfix">
                <div class="fancy-title title-dotted-border title-center mb-4">
                    <h4>{{__('lang.feature.head')}}</h4>
                </div>
                <div class="col_one_fourth --custom">
                    <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                        <div class="fbox-icon">
                            <a href="javascript:void(0)"><i class="icon-money-bill-wave"></i></a>
                        </div>
                        <h3>{{__('lang.feature.price-t')}}</h3>
                        <p>{{__('lang.feature.price-st')}}</p>
                    </div>
                </div>
                <div class="col_one_fourth --custom">
                    <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                        <div class="fbox-icon">
                            <a href="javascript:void(0)"><i class="icon-gem"></i></a>
                        </div>
                        <h3>{{__('lang.feature.guarantee-t')}}</h3>
                        <p>{{__('lang.feature.guarantee-st')}}</p>
                    </div>
                </div>
                <div class="col_one_fourth --custom">
                    <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                        <div class="fbox-icon">
                            <a href="javascript:void(0)"><i class="icon-drafting-compass"></i></a>
                        </div>
                        <h3>{{__('lang.feature.design-t')}}</h3>
                        <p>{{__('lang.feature.design-st')}}</p>
                    </div>
                </div>
                <div class="col_one_fourth --custom col_last">
                    <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                        <div class="fbox-icon">
                            <a href="javascript:void(0)"><i class="icon-shipping-fast"></i></a>
                        </div>
                        <h3>{{__('lang.feature.shipping-t')}}</h3>
                        <p>{{__('lang.feature.shipping-st')}}</p>
                    </div>
                </div>
            </div>
            <div class="clear"></div>

            <!-- featured product -->
            <div class="section my-2" style="padding-bottom: 5rem">
                <div class="container">
                    <div class="row clearfix" data-layout="fitRows">
                        <div class="col">
                            <div class="fancy-title title-dotted-border title-center mb-4">
                                <h4 style="background-color: #f9f9f9">{{__('lang.featured.head')}}</h4>
                            </div>

                            <div id="portfolio"
                                 class="portfolio grid-container portfolio-notitle portfolio-masonry clearfix">
                                @foreach($featured as $row)
                                    <article class="portfolio-item">
                                        <div class="portfolio-image">
                                            <div class="fslider" data-arrows="false" data-speed="400" data-pause="4000">
                                                <div class="flexslider">
                                                    <div class="slider-wrap">
                                                        @foreach($row['thumb'] as $file)
                                                            <div class="slide">
                                                                <a href="javascript:void(0)"><img src="{{$file}}"
                                                                                                  alt="{{$row['name']}}"></a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="portfolio-overlay" data-lightbox="gallery">
                                                <a href="{{$row['init']}}" class="left-icon"
                                                   data-lightbox="gallery-item">
                                                    <i class="icon-line-stack-2"></i></a>
                                                @foreach($row['gallery'] as $file)
                                                    <a href="{{$file}}" class="hidden" data-lightbox="gallery-item"></a>
                                                @endforeach
                                                <a href="{{$row['link']}}" class="right-icon">
                                                    <i class="icon-line-ellipsis"></i></a>
                                            </div>
                                        </div>
                                        <div class="portfolio-desc">
                                            <h3><a href="{{$row['link']}}">{{$row['name']}}</a></h3>
                                            <span>
                                                @foreach($row['capt'] as $val)
                                                    <a href="{{$val['link']}}">{{$val['name']}}</a>
                                                @endforeach
                                            </span>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>

            <!-- how to order -->
            <div class="container clearfix pt-5 pb-5">
                <div class="fancy-title title-dotted-border title-center mb-4">
                    <h4>{{__('lang.how-to.head')}}</h4>
                </div>
                <div id="processTabs" class="row justify-content-center clearfix">
                    <ul class="process-steps process-5 bottommargin clearfix">
                        <li>
                            <a href="#ptab1" class="i-circled i-bordered i-alt divcenter icon-printer2"></a>
                            <h5>{{__('lang.how-to.step-1')}}</h5>
                        </li>
                        <li>
                            <a href="#ptab2" class="i-circled i-bordered i-alt divcenter icon-edit"></a>
                            <h5>{{__('lang.how-to.step-2')}}</h5>
                        </li>
                        <li>
                            <a href="#ptab3"
                               class="i-circled i-bordered i-alt divcenter icon-drafting-compass"></a>
                            <h5>{{__('lang.how-to.step-3')}}</h5>
                        </li>
                        <li>
                            <a href="#ptab4" class="i-circled i-bordered i-alt divcenter icon-wallet"></a>
                            <h5>{{__('lang.how-to.step-4')}}</h5>
                        </li>
                        <li>
                            <a href="#ptab5"
                               class="i-circled i-bordered i-alt divcenter icon-shipping-fast"></a>
                            <h5>{{__('lang.how-to.step-5')}}</h5>
                        </li>
                    </ul>
                    <div class="process-content">
                        <div id="ptab1">
                            <div class="media">
                                <img class="step-1 align-self-center mr-3"
                                     alt="{{__('lang.how-to.step-1')}}"
                                     src="{{asset('images/how-to/choose-product.png')}}">
                                <div class="media-body">
                                    <h5 class="m-0"><span>{{__('lang.how-to.step')}} 1</span></h5>
                                    <h2 class="mb-2">{{__('lang.how-to.step-1')}}</h2>
                                    {!! __('lang.how-to.desc-1') !!}
                                </div>
                            </div>
                        </div>
                        <div id="ptab2">
                            <div class="media">
                                <img class="step-2 align-self-center mr-3"
                                     alt="{{__('lang.how-to.step-2')}}"
                                     src="{{asset('images/how-to/order-spec.png')}}">
                                <div class="media-body">
                                    <h5 class="m-0"><span>{{__('lang.how-to.step')}} 2</span></h5>
                                    <h2 class="mb-2">{{__('lang.how-to.step-2')}}</h2>
                                    {!! __('lang.how-to.desc-2') !!}
                                </div>
                            </div>
                        </div>
                        <div id="ptab3">
                            <div class="media">
                                <img class="step-3 align-self-center mr-3"
                                     alt="{{__('lang.how-to.step-3')}}"
                                     src="{{asset('images/how-to/create-design.png')}}">
                                <div class="media-body">
                                    <h5 class="m-0"><span>{{__('lang.how-to.step')}} 3</span></h5>
                                    <h2 class="mb-2">{{__('lang.how-to.step-3')}}</h2>
                                    {!! __('lang.how-to.desc-3') !!}
                                </div>
                            </div>
                        </div>
                        <div id="ptab4">
                            <div class="media">
                                <img class="step-4 align-self-center mr-3"
                                     alt="{{__('lang.how-to.step-4')}}"
                                     src="{{asset('images/how-to/payment.png')}}">
                                <div class="media-body">
                                    <h5 class="m-0"><span>{{__('lang.how-to.step')}} 4</span></h5>
                                    <h2 class="mb-2">{{__('lang.how-to.step-4')}}</h2>
                                    {!! __('lang.how-to.desc-4') !!}
                                </div>
                            </div>
                        </div>
                        <div id="ptab5">
                            <div class="media">
                                <img class="step-5 align-self-center mr-3"
                                     alt="{{__('lang.how-to.step-5')}}"
                                     src="{{asset('images/how-to/shipping.png')}}">
                                <div class="media-body">
                                    <h5 class="m-0"><span>{{__('lang.how-to.step')}} 5</span></h5>
                                    <h2 class="mb-2">{{__('lang.how-to.step-5')}}</h2>
                                    {!! __('lang.how-to.desc-5') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button
                            class="button button-rounded button-reveal button-border button-primary tleft prev-linker"
                            style="display: none"><i class="icon-angle-left"></i><span>PREV</span>
                        </button>
                        <button
                            class="button button-rounded button-reveal button-border button-primary tright next-linker">
                            <i class="icon-angle-right"></i><span>NEXT</span>
                        </button>
                        <button
                            class="button button-rounded button-reveal button-border button-primary tright finish-linker"
                            style="display: none"><i class="icon-angle-right"></i>
                            <span>{{__('lang.button.shop')}}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="clear"></div>

            <!-- clients & instagram feed -->
            <div class="section p-0 m-0 text-center clearfix">
                <!-- clients -->
                <div class="container fancy-title title-dotted-border title-center mt-5 mb-0">
                    <h4 style="background-color: #f9f9f9">{{__('lang.client.head')}}</h4>
                </div>
                <div id="oc-clients-full" class="owl-carousel owl-carousel-full image-carousel carousel-widget mb-5"
                     data-margin="30" data-nav="true" data-pagi="false" data-autoplay="5000" data-items-xs="3"
                     data-items-sm="3" data-items-md="5" data-items-lg="6" data-items-xl="7">
                    <div class="oc-item"><a href="javascript:void(0)"><img src="{{asset('images/clients/1.png')}}"
                                                                           alt=""></a></div>
                    <div class="oc-item"><a href="javascript:void(0)"><img src="{{asset('images/clients/2.png')}}"
                                                                           alt=""></a></div>
                    <div class="oc-item"><a href="javascript:void(0)"><img src="{{asset('images/clients/3.png')}}"
                                                                           alt=""></a></div>
                    <div class="oc-item"><a href="javascript:void(0)"><img src="{{asset('images/clients/4.png')}}"
                                                                           alt=""></a></div>
                    <div class="oc-item"><a href="javascript:void(0)"><img src="{{asset('images/clients/5.png')}}"
                                                                           alt=""></a></div>
                    <div class="oc-item"><a href="javascript:void(0)"><img src="{{asset('images/clients/6.png')}}"
                                                                           alt=""></a></div>
                    <div class="oc-item"><a href="javascript:void(0)"><img src="{{asset('images/clients/7.png')}}"
                                                                           alt=""></a></div>
                    <div class="oc-item"><a href="javascript:void(0)"><img src="{{asset('images/clients/8.png')}}"
                                                                           alt=""></a></div>
                    <div class="oc-item"><a href="javascript:void(0)"><img src="{{asset('images/clients/9.png')}}"
                                                                           alt=""></a></div>
                    <div class="oc-item"><a href="javascript:void(0)"><img src="{{asset('images/clients/10.png')}}"
                                                                           alt=""></a></div>
                    <div class="oc-item"><a href="javascript:void(0)"><img src="{{asset('images/clients/11.png')}}"
                                                                           alt=""></a></div>
                    <div class="oc-item"><a href="javascript:void(0)"><img src="{{asset('images/clients/12.png')}}"
                                                                           alt=""></a></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('include/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script>
        $(function () {
            var apiRevoSlider = $('#rev_slider_ishop').show().revolution(
                {
                    sliderType: "standard",
                    jsFileLocation: "include/rs-plugin/js/",
                    sliderLayout: "fullwidth",
                    dottedOverlay: "none",
                    delay: 9000,
                    responsiveLevels: [1200, 1025, 992, 768, 480, 320],
                    gridwidth: 1140,
                    gridheight: 500,
                    lazyType: "none",
                    shadow: 0,
                    spinner: "off",
                    autoHeight: "off",
                    disableProgressBar: "off",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        disableFocusListener: false,
                    },
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "on",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "ares",
                            enable: true,
                            hide_onmobile: true,
                            hide_onleave: true,
                            tmp: '<div class="tp-title-wrap">	<span class="tp-arr-titleholder">@{{title}}</span> </div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            }
                        }
                    }
                });

            apiRevoSlider.bind("revolution.slide.onloaded", function (e) {
                SEMICOLON.slider.sliderParallaxDimensions();
            });

            $(".portfolio-notitle .portfolio-desc").css('width', $(".portfolio-image").width());

            $(".portfolio-desc span a:not(:last-child)").each(function () {
                $(this).append(',');
            });

            var how_to = $("#processTabs"), activeIDX;
            how_to.tabs({show: {effect: "slide", duration: 500}});
            activeIDX = how_to.tabs("option", "active");
            $(".process-content").css('height', how_to.find('.process-content').find('#ptab' + parseInt(activeIDX + 1)).height())

            $("a[href='#ptab1']").on("click", function () {
                $(".prev-linker, .finish-linker").hide();
                $(".next-linker").show();
                activeIDX = 0;

                $(".process-content").css('height', how_to.find('.process-content').find('#ptab' + parseInt(activeIDX + 1)).height())
            });

            $("a[href='#ptab2'], a[href='#ptab3'], a[href='#ptab4']").on("click", function () {
                $(".prev-linker, .next-linker").show();
                $(".finish-linker").hide();
            });

            $("a[href='#ptab2']").on("click", function () {
                activeIDX = 1;
                $(".process-content").css('height', how_to.find('.process-content').find('#ptab' + parseInt(activeIDX + 1)).height())
            });

            $("a[href='#ptab3']").on("click", function () {
                activeIDX = 2;
                $(".process-content").css('height', how_to.find('.process-content').find('#ptab' + parseInt(activeIDX + 1)).height())
            });

            $("a[href='#ptab4']").on("click", function () {
                activeIDX = 3;
                $(".process-content").css('height', how_to.find('.process-content').find('#ptab' + parseInt(activeIDX + 1)).height())
            });

            $("a[href='#ptab5']").on("click", function () {
                $(".prev-linker, .finish-linker").show();
                $(".next-linker").hide();
                activeIDX = 4;

                $(".process-content").css('height', how_to.find('.process-content').find('#ptab' + parseInt(activeIDX + 1)).height())
            });

            $(".prev-linker").on("click", function () {
                activeIDX -= 1;
                $(".next-linker").show();
                $(".finish-linker").hide();

                if (activeIDX == 0) {
                    $(this).hide();
                } else {
                    $(this).show();
                }

                how_to.tabs("option", "active", activeIDX);

                $(".process-content").css('height', how_to.find('.process-content').find('#ptab' + parseInt(activeIDX + 1)).height())
            });

            $(".next-linker").on("click", function () {
                activeIDX += 1;
                $(".prev-linker").show();

                if (activeIDX == 4) {
                    $(this).hide();
                    $(".finish-linker").show();
                } else {
                    $(this).show();
                    $(".finish-linker").hide();
                }

                how_to.tabs("option", "active", activeIDX);

                $(".process-content").css('height', how_to.find('.process-content').find('#ptab' + parseInt(activeIDX + 1)).height())
            });

            $(".finish-linker").on("click", function () {
                $('html,body').animate({scrollTop: 0}, 500);
            });

            @if(session('order'))
            swal({
                title: "{{__('lang.alert.success')}}",
                text: "{{session('order')}}",
                icon: 'success',
                dangerMode: true,
                buttons: ["{{__('lang.button.no')}}", "{{__('lang.button.yes')}}"],
                closeOnEsc: false,
                closeOnClickOutside: false,
            }).then((confirm) => {
                if (confirm) {
                    swal({
                        title: '{{__('lang.alert.warning')}}',
                        text: '{{__('lang.alert.order-cart')}}',
                        icon: 'warning',
                        buttons: false
                    });
                    window.location.href = '{{route('user.cart')}}';
                } else {
                    swal('{{__('lang.alert.order-shop')}}', '', 'info');
                }
            });
            @endif
        });

        $("#form-langSwitch input[name=lang]").on('change', function () {
            var locale = $(this).val() == 'id' ? '{{LaravelLocalization::getLocalizedURL('id')}}' :
                '{{LaravelLocalization::getLocalizedURL('en')}}';

            $("#form-langSwitch input[name=locale_url]").val(locale);
            $("#form-langSwitch")[0].submit();
        });

        $(document).on('mouseover', function () {
            $(".portfolio-notitle .portfolio-desc").css('width', $(".portfolio-image").width());
        });
    </script>
@endpush
