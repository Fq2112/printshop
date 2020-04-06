@extends('layouts.mst')
@section('title',  __('lang.product.title').$sub->name.' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    <style>
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
                <div class="page-section card-columns nopadding nomargin"
                     style="column-count: {{count($sub->getCluster) > 2 ? 3 : 2}}">
                    @foreach($sub->getCluster as $row)
                        <div class="card card-body noborder nopadding">
                            <div class="myCard">
                                <div class="img-card">
                                    <a href="{{route('produk', ['produk' => $row->permalink])}}">
                                        <img class="img-fluid" alt="Thumbnail"
                                             src="{{asset('storage/products/thumb/'.$row->thumbnail)}}">
                                        <div class="custom-overlay">
                                            <div class="custom-text"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card-content">
                                    <div class="card-title">
                                        <a href="{{route('produk', ['produk' => $row->permalink])}}">
                                            <h4 class="text-center" style="color: #f89406">
                                                {{$row->name}}</h4></a>
                                        <h5 class="text-center mb-2" style="text-transform: none">
                                            {{__('lang.product.price', ['price' => number_format(25000,2,',','.')])}}
                                        </h5>
                                        <div class="divider divider-center m-1"><i class="icon-circle"></i></div>
                                        <ul>
                                            <li>{{\Faker\Factory::create()->words(rand(4,5), true)}}</li>
                                            <li>{{\Faker\Factory::create()->words(rand(4,5), true)}}</li>
                                            <li>{{\Faker\Factory::create()->words(rand(4,5), true)}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <a href="{{route('produk', ['produk' => $row->permalink])}}"
                                       class="btn btn-outline-primary btn-block text-uppercase text-left noborder">
                                        {{__('lang.button.shop')}}<i class="icon-chevron-right fright"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
            $("#processTabs").tabs({show: {effect: "slide", duration: 500}});
            $(".tab-linker").on("click", function () {
                $("#processTabs").tabs("option", "active", $(this).attr('rel') - 1);
                return false;
            });
        });
    </script>
@endpush
