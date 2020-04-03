@extends('layouts.mst')
@section('title',  __('lang.product.title').$sub->name.' | '.__('lang.title'))
@push('styles')
    <style>
        .parallax-overlay {
            background: linear-gradient(to bottom, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, .3) 30%, rgba(0, 0, 0, .5) 80%,
            rgba(0, 0, 0, .7) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
        }

        .media .media-body ul {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
            font-size: 17px;
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{asset('storage/products/banner/'.$sub->banner)}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{$sub->name}}</h1>
            <span>{{$sub->caption}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">{{__('lang.breadcrumb.product')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$sub->name}}</li>
            </ol>
        </div>
    </section>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="fancy-title title-dotted-border title-center">
                    <h3>{{__('lang.product.head', ['name' => $sub->name])}}</h3>
                </div>
                <div id="section-pricing" class="page-section nopadding nomargin">
                    <div id="pricing-switch" class="pricing row bottommargin-lg clearfix">
                        <div class="col-lg-4 col-md-6">
                            <div class="pricing-box">
                                <div class="pricing-title">
                                    <h3>Starter</h3>
                                </div>
                                <div class="pricing-price">FREE</div>
                                <div class="pricing-features">
                                    <ul>
                                        <li><strong>Full</strong> Access</li>
                                        <li><i class="icon-code"></i> Source Files</li>
                                        <li><strong>100</strong> User Accounts</li>
                                        <li><strong>1 Year</strong> License</li>
                                        <li>Phone &amp; Email Support</li>
                                    </ul>
                                </div>
                                <div class="pricing-action">
                                    <a href="#" class="button button-large button-rounded capitalize ls0"
                                       style="border-radius: 23px;">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="pricing-box best-price">
                                <div class="pricing-title">
                                    <h3>Professional</h3>
                                    <span>Most Popular</span>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-unit">&dollar;</span>12
                                </div>
                                <div class="pricing-features">
                                    <ul>
                                        <li><strong>Full</strong> Access</li>
                                        <li><i class="icon-code"></i> Source Files</li>
                                        <li><strong>1000</strong> User Accounts</li>
                                        <li><strong>2 Years</strong> License</li>
                                        <li><i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i></li>
                                    </ul>
                                </div>
                                <div class="pricing-action">
                                    <a href="#" class="button button-large button-rounded capitalize ls0"
                                       style="border-radius: 23px;">Start Free Trial</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-3">
                            <div class="pricing-box">
                                <div class="pricing-title">
                                    <h3>Business</h3>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-unit">&dollar;</span>19
                                </div>
                                <div class="pricing-features">
                                    <ul>
                                        <li><strong>Full</strong> Access</li>
                                        <li><i class="icon-code"></i> Source Files</li>
                                        <li><strong>500</strong> User Accounts</li>
                                        <li><strong>3 Years</strong> License</li>
                                        <li>Phone &amp; Email Support</li>
                                    </ul>
                                </div>
                                <div class="pricing-action">
                                    <a href="#" class="button button-large button-rounded capitalize ls0"
                                       style="border-radius: 23px;">Start Free Trial</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="container">
                    <div class="row align-items-stretch grid-container clearfix" data-layout="fitRows">
                        <div class="col">
                            <div class="fancy-title title-dotted-border title-center mb-4">
                                <h4 style="background-color: #f9f9f9">{{__('lang.how-to.head')}}</h4>
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
                                <div>
                                    <div id="ptab1">
                                        <div class="media">
                                            <img class="step-1 align-self-center mr-3"
                                                 alt="{{__('lang.how-to.step-1')}}"
                                                 src="{{asset('images/how-to/choose-product.png')}}">
                                            <div class="media-body">
                                                <h5 class="m-0"><span>{{__('lang.how-to.step')}} 1</span></h5>
                                                <h2 class="mb-2">{{__('lang.how-to.step-1')}}</h2>
                                                {!! __('lang.how-to.desc-1') !!}
                                                <a class="button button-rounded button-reveal button-border button-primary tright fright tab-linker"
                                                   href="#" rel="2"><i
                                                        class="icon-angle-right"></i><span>{{__('lang.button.next')}}</span>
                                                </a>
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
                                                <a class="button button-rounded button-reveal button-border button-primary tleft tab-linker"
                                                   href="#" rel="1"><i
                                                        class="icon-angle-left"></i><span>{{__('lang.button.prev')}}</span>
                                                </a>
                                                <a class="button button-rounded button-reveal button-border button-primary tright fright tab-linker"
                                                   href="#" rel="3"><i
                                                        class="icon-angle-right"></i><span>{{__('lang.button.next')}}</span>
                                                </a>
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
                                                <a class="button button-rounded button-reveal button-border button-primary tleft tab-linker"
                                                   href="#" rel="2"><i
                                                        class="icon-angle-left"></i><span>{{__('lang.button.prev')}}</span>
                                                </a>
                                                <a class="button button-rounded button-reveal button-border button-primary tright fright tab-linker"
                                                   href="#" rel="4"><i
                                                        class="icon-angle-right"></i><span>{{__('lang.button.next')}}</span>
                                                </a>
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
                                                <a class="button button-rounded button-reveal button-border button-primary tleft tab-linker"
                                                   href="#" rel="3"><i
                                                        class="icon-angle-left"></i><span>{{__('lang.button.prev')}}</span>
                                                </a>
                                                <a class="button button-rounded button-reveal button-border button-primary tright fright tab-linker"
                                                   href="#" rel="5"><i
                                                        class="icon-angle-right"></i><span>{{__('lang.button.finish')}}</span>
                                                </a>
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
                                                <a class="button button-rounded button-reveal button-border button-primary tleft tab-linker"
                                                   href="#" rel="4"><i
                                                        class="icon-angle-left"></i><span>{{__('lang.button.back')}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(function () {
            function pricingSwitcher(elementCheck, elementParent, elementPricing) {
                elementParent.find('.pts-left,.pts-right').removeClass('pts-switch-active');
                elementPricing.find('.pts-switch-content-left,.pts-switch-content-right').addClass('hidden');

                if (elementCheck.filter(':checked').length > 0) {
                    elementParent.find('.pts-right').addClass('pts-switch-active');
                    elementPricing.find('.pts-switch-content-right').removeClass('hidden');
                } else {
                    elementParent.find('.pts-left').addClass('pts-switch-active');
                    elementPricing.find('.pts-switch-content-left').removeClass('hidden');
                }
            }

            $('.pts-switcher').each(function () {
                var element = $(this),
                    elementCheck = element.find(':checkbox'),
                    elementParent = $(this).parents('.pricing-tenure-switcher'),
                    elementPricing = $(elementParent.attr('data-container'));

                pricingSwitcher(elementCheck, elementParent, elementPricing);

                elementCheck.on('change', function () {
                    pricingSwitcher(elementCheck, elementParent, elementPricing);
                });
            });

            $("#processTabs").tabs({show: {effect: "slide", duration: 500}});
            $(".tab-linker").on("click", function () {
                $("#processTabs").tabs("option", "active", $(this).attr('rel') - 1);
                return false;
            });
        });
    </script>
@endpush
