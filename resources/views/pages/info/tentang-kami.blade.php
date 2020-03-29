@extends('layouts.mst')
@section('title',  __('lang.header.about').' | '.__('lang.title'))
@push('styles')
    <style>
        .feature-box .fbox-icon a {
            cursor: default;
        }

        .feature-box .fbox-icon a:hover i {
            color: #fff;
        }

        #about p {
            margin-bottom: 1rem;
            text-align: justify;
            font-size: 15px;
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{asset('images/banner/about.jpg')}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{__('lang.header.about')}}</h1>
            <span>{{__('lang.about.capt')}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">Info</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('lang.header.about')}}</li>
            </ol>
        </div>
    </section>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="fancy-title title-dotted-border title-center mb-4">
                    <h4>{{__('lang.feature.head')}}</h4>
                </div>
                <div class="col_one_fourth">
                    <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-money-bill-wave"></i></a>
                        </div>
                        <h3>{{__('lang.feature.price-t')}}</h3>
                        <p>{{__('lang.feature.price-st')}}</p>
                    </div>
                </div>
                <div class="col_one_fourth">
                    <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-gem"></i></a>
                        </div>
                        <h3>{{__('lang.feature.guarantee-t')}}</h3>
                        <p>{{__('lang.feature.guarantee-st')}}</p>
                    </div>
                </div>
                <div class="col_one_fourth">
                    <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-drafting-compass"></i></a>
                        </div>
                        <h3>{{__('lang.feature.design-t')}}</h3>
                        <p>{{__('lang.feature.design-st')}}</p>
                    </div>
                </div>
                <div class="col_one_fourth col_last">
                    <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-shipping-fast"></i></a>
                        </div>
                        <h3>{{__('lang.feature.shipping-t')}}</h3>
                        <p>{{__('lang.feature.shipping-st')}}</p>
                    </div>
                </div>
            </div>

            <div class="container clearfix"
                 style="background: url('{{asset('images/world_map.png')}}') no-repeat center center; background-size: 100%;">
                <div class="col_half">
                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>{!! __('lang.about.vision-head') !!}</h4>
                    </div>
                    <p>{{__('lang.about.vision-capt')}}</p>
                </div>
                <div class="col_half col_last">
                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>{!! __('lang.about.mission-head') !!}</h4>
                    </div>
                    <p>{{__('lang.about.mission-capt')}}</p>
                </div>
            </div>

            <div class="section nomargin">
                <div class="container clearfix">
                    <div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
                        <i class="i-plain i-xlarge divcenter icon-handshake1"></i>
                        <div class="counter counter-lined">
                            <span data-from="0" data-to="100" data-refresh-interval="50" data-speed="2500"></span>+
                        </div>
                        <h5>{{__('lang.about.client')}}</h5>
                    </div>

                    <div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
                        <i class="i-plain i-xlarge divcenter nobottommargin icon-grin-beam1"></i>
                        <div class="counter counter-lined">
                            <span data-from="0" data-to="21" data-refresh-interval="50" data-speed="2500"></span>K+
                        </div>
                        <h5>{{__('lang.about.customer')}}</h5>
                    </div>

                    <div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
                        <i class="i-plain i-xlarge divcenter nobottommargin icon-paper-plane1"></i>
                        <div class="counter counter-lined">
                            <span data-from="0" data-to="95" data-refresh-interval="50" data-speed="2500"></span>%
                        </div>
                        <h5>{{__('lang.about.order')}}</h5>
                    </div>

                    <div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
                        <i class="i-plain i-xlarge divcenter nobottommargin icon-picture"></i>
                        <div class="counter counter-lined">
                            <span data-from="0" data-to="2100" data-refresh-interval="50" data-speed="2500"></span>+
                        </div>
                        <h5>{{__('lang.about.design')}}</h5>
                    </div>
                </div>
            </div>

            <div id="about" class="row align-items-stretch clearfix">
                <div class="col-md-5 col-padding"
                     style="background: url('{{asset('images/team.jpg')}}') center center no-repeat; background-size: cover;"></div>
                <div class="col-md-7 col-padding">
                    <div class="heading-block mb-4">
                        <span class="before-heading color">{{env('APP_TITLE')}}</span>
                        <h4>{{__('lang.subtitle')}}</h4>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            {!! __('lang.about.desc') !!}
                            <blockquote class="quote">
                                <p>An idea that is developed and put into action is more important than an idea that
                                    exists only as an idea.</p>
                                <footer class="blockquote-footer">Dr. Edward de Bono, de Bono Group LLC.</footer>
                            </blockquote>
                            <a href="https://fb.com/pages/Premiere-Digital-Printing/164943546903733" target="_blank"
                               class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="https://instagram.com/premierprintingsby" target="_blank"
                               class="social-icon inline-block si-small si-light si-rounded si-instagram">
                                <i class="icon-instagram"></i>
                                <i class="icon-instagram"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=62817597777&text=&source=&data="
                               target="_blank"
                               class="social-icon inline-block si-small si-light si-rounded si-whatsapp">
                                <i class="icon-whatsapp"></i>
                                <i class="icon-whatsapp"></i>
                            </a>
                            <a href="mailto:{{env('MAIL_USERNAME')}}"
                               class="social-icon inline-block si-small si-light si-rounded si-call">
                                <i class="icon-envelope-alt"></i>
                                <i class="icon-envelope-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section p-0 m-0 text-center clearfix">
                <div class="container fancy-title title-dotted-border title-center mt-5 mb-0">
                    <h4 style="background-color: #f9f9f9">{{__('lang.client.head')}}</h4>
                </div>
                <div id="oc-clients-full" class="owl-carousel owl-carousel-full image-carousel carousel-widget mb-5"
                     data-margin="30" data-nav="true" data-pagi="false" data-autoplay="5000" data-items-xs="3"
                     data-items-sm="3" data-items-md="5" data-items-lg="6" data-items-xl="7">
                    <div class="oc-item"><a href="#"><img src="{{asset('images/clients/1.png')}}" alt=""></a></div>
                    <div class="oc-item"><a href="#"><img src="{{asset('images/clients/2.png')}}" alt=""></a></div>
                    <div class="oc-item"><a href="#"><img src="{{asset('images/clients/3.png')}}" alt=""></a></div>
                    <div class="oc-item"><a href="#"><img src="{{asset('images/clients/4.png')}}" alt=""></a></div>
                    <div class="oc-item"><a href="#"><img src="{{asset('images/clients/5.png')}}" alt=""></a></div>
                    <div class="oc-item"><a href="#"><img src="{{asset('images/clients/6.png')}}" alt=""></a></div>
                    <div class="oc-item"><a href="#"><img src="{{asset('images/clients/7.png')}}" alt=""></a></div>
                    <div class="oc-item"><a href="#"><img src="{{asset('images/clients/8.png')}}" alt=""></a></div>
                    <div class="oc-item"><a href="#"><img src="{{asset('images/clients/9.png')}}" alt=""></a></div>
                    <div class="oc-item"><a href="#"><img src="{{asset('images/clients/10.png')}}" alt=""></a></div>
                    <div class="oc-item"><a href="#"><img src="{{asset('images/clients/11.png')}}" alt=""></a></div>
                    <div class="oc-item"><a href="#"><img src="{{asset('images/clients/12.png')}}" alt=""></a></div>
                </div>
            </div>
        </div>
    </section>
@endsection
