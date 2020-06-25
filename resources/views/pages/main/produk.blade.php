@extends('layouts.mst')
@section('title',  __('lang.product.title').$data->name.' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    <style>
        .myCard:hover img {
            transform: scale(1.2);
        }

        .myCard:hover .custom-overlay {
            opacity: 1;
        }

        .card-deck {
            display: flex;
            flex-direction: row;
            flex: 1 0 0;
            flex-flow: row wrap;
            align-items: stretch;
        }

        .card-deck .myCard {
            display: flex;
            flex-direction: column;
            width: auto;
            margin: 1%;
        }

        .card-deck .myCard .card-content {
            flex-grow: 1;
        }

        .media .media-body ul {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
            font-size: 17px;
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

        @media (max-width: 480px) {
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
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{asset('storage/products/banner/'.$data->banner)}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{$data->name}}</h1>
            <span>{{$data->caption}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">{{__('lang.breadcrumb.product')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$data->name}}</li>
            </ol>
        </div>
    </section>

    <section id="content">
        <div class="content-wrap">
            <div id="product" class="container clearfix">
                <div class="fancy-title title-dotted-border title-center">
                    <h3>{{__('lang.product.head', ['name' => $data->name])}}</h3>
                </div>
                <div class="page-section card-deck nopadding nomargin">
                    @foreach($data->getCluster as $row)
                        <div class="card myCard noborder nopadding" style="margin-bottom: 2rem;min-width: 18rem;">
                            <div class="img-card">
                                <a href="{{route('produk', ['produk' => $row->permalink])}}">
                                    <img class="img-fluid" alt="Thumbnail"
                                         src="{{asset('storage/products/thumb/'.$row->thumbnail)}}">
                                    <div class="custom-overlay"></div>
                                </a>
                            </div>
                            <div class="card-content">
                                <div class="card-title">
                                    <a href="{{route('produk', ['produk' => $row->permalink])}}">
                                        <h4 class="text-center" style="color: #f89406">
                                            {{$row->name}}</h4></a>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        {{__('lang.product.price', ['price' => number_format($row->getClusterSpecs->price,2,',','.')])}}
                                    </h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    {!! $row->features !!}
                                </div>
                            </div>
                            <div class="card-footer p-0">
                                <a href="{{route('produk', ['produk' => $row->permalink])}}"
                                   class="btn btn-outline-primary btn-block text-uppercase text-left noborder">
                                    {{__('lang.button.shop')}}<i class="icon-chevron-right fright"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="section">
                <div class="container">
                    <div class="row clearfix" data-layout="fitRows">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(function () {
            $(".myCard .custom-overlay").css('height', $(".myCard .img-card img").height());

            var how_to = $("#processTabs"), activeIDX;
            how_to.tabs({show: {effect: "slide", duration: 500}});
            activeIDX = how_to.tabs("option", "active");

            $("a[href='#ptab1']").on("click", function () {
                $(".prev-linker, .finish-linker").hide();
                $(".next-linker").show();
                activeIDX = 0;
            });

            $("a[href='#ptab2'], a[href='#ptab3'], a[href='#ptab4']").on("click", function () {
                $(".prev-linker, .next-linker").show();
                $(".finish-linker").hide();
                activeIDX = 0;
            });

            $("a[href='#ptab5']").on("click", function () {
                $(".prev-linker, .finish-linker").show();
                $(".next-linker").hide();
                activeIDX = 4;
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
            });

            $(".finish-linker").on("click", function () {
                $('html,body').animate({scrollTop: $("#product").offset().top}, 500);
            });
        });
    </script>
@endpush
