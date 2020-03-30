@extends('layouts.mst')
@section('title',  __('lang.header.how-to').' | '.__('lang.title'))
@push('styles')
    <style>
        .entry-content {
            font-size: 15px;
        }

        .entry-content ul {
            margin-left: 1rem;
        }

        .entry-image img {
            width: unset;
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{asset('images/banner/how-to.jpg')}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{__('lang.header.how-to')}}</h1>
            <span>{{ucfirst(strtolower(__('lang.how-to.head')))}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">Info</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('lang.header.how-to')}}</li>
            </ol>
        </div>
    </section>

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <div id="posts" class="post-grid grid-container post-masonry post-timeline grid-2 clearfix">
                    <div class="timeline-border"></div>
                    <div class="entry entry-date-section notopmargin"><span>{{__('lang.how-to.start')}}</span></div>

                    <div class="entry clearfix">
                        <div class="entry-timeline">
                            <div class="timeline-divider"></div>
                        </div>
                        <div class="entry-image">
                            <a href="{{asset('images/how-to/full/choose-product.png')}}" data-lightbox="image">
                                <img class="image_fade" src="{{asset('images/how-to/choose-product.png')}}"
                                     alt="{{__('lang.how-to.step-1')}}"></a>
                        </div>
                        <div class="entry-title">
                            <h2>{{__('lang.how-to.step-1')}}</h2>
                        </div>
                        <ul class="entry-meta clearfix">
                            <li><i class="icon-walking"></i>{{__('lang.how-to.step')}} 1</li>
                        </ul>
                        <div class="entry-content">
                            {!! __('lang.how-to.desc-1') !!}
                        </div>
                    </div>

                    <div class="entry clearfix">
                        <div class="entry-timeline">
                            <div class="timeline-divider"></div>
                        </div>
                        <div class="entry-image">
                            <a href="{{asset('images/how-to/full/order-spec.png')}}" data-lightbox="image">
                                <img class="image_fade" src="{{asset('images/how-to/order-spec.png')}}"
                                     alt="{{__('lang.how-to.step-2')}}"></a>
                        </div>
                        <div class="entry-title">
                            <h2>{{__('lang.how-to.step-2')}}</h2>
                        </div>
                        <ul class="entry-meta clearfix">
                            <li><i class="icon-walking"></i>{{__('lang.how-to.step')}} 2</li>
                        </ul>
                        <div class="entry-content">
                            {!! __('lang.how-to.desc-2') !!}
                        </div>
                    </div>

                    <div class="entry clearfix">
                        <div class="entry-timeline">
                            <div class="timeline-divider"></div>
                        </div>
                        <div class="entry-image">
                            <a href="{{asset('images/how-to/full/create-design.png')}}" data-lightbox="image">
                                <img class="image_fade" src="{{asset('images/how-to/create-design.png')}}"
                                     alt="{{__('lang.how-to.step-3')}}"></a>
                        </div>
                        <div class="entry-title">
                            <h2>{{__('lang.how-to.step-3')}}</h2>
                        </div>
                        <ul class="entry-meta clearfix">
                            <li><i class="icon-walking"></i>{{__('lang.how-to.step')}} 3</li>
                        </ul>
                        <div class="entry-content">
                            {!! __('lang.how-to.desc-3') !!}
                        </div>
                    </div>

                    <div class="entry clearfix">
                        <div class="entry-timeline">
                            <div class="timeline-divider"></div>
                        </div>
                        <div class="entry-image">
                            <a href="{{asset('images/how-to/full/payment.png')}}" data-lightbox="image">
                                <img class="image_fade" src="{{asset('images/how-to/payment.png')}}"
                                     alt="{{__('lang.how-to.step-4')}}"></a>
                        </div>
                        <div class="entry-title">
                            <h2>{{__('lang.how-to.step-4')}}</h2>
                        </div>
                        <ul class="entry-meta clearfix">
                            <li><i class="icon-walking"></i>{{__('lang.how-to.step')}} 4</li>
                        </ul>
                        <div class="entry-content">
                            {!! __('lang.how-to.desc-4') !!}
                        </div>
                    </div>

                    <div class="entry clearfix">
                        <div class="entry-timeline">
                            <div class="timeline-divider"></div>
                        </div>
                        <div class="entry-image">
                            <a href="{{asset('images/how-to/full/shipping.png')}}" data-lightbox="image">
                                <img class="image_fade" src="{{asset('images/how-to/shipping.png')}}"
                                     alt="{{__('lang.how-to.step-5')}}"></a>
                        </div>
                        <div class="entry-title">
                            <h2>{{__('lang.how-to.step-5')}}</h2>
                        </div>
                        <ul class="entry-meta clearfix">
                            <li><i class="icon-walking"></i>{{__('lang.how-to.step')}} 5</li>
                        </ul>
                        <div class="entry-content">
                            {!! __('lang.how-to.desc-5') !!}
                        </div>
                    </div>

                    <div class="entry entry-date-section nobottommargin"><span>{{__('lang.how-to.finish')}}</span></div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(window).on('load', function () {
            var $container = $('#posts');
            $container.isotope({
                itemSelector: '.entry',
                masonry: {
                    columnWidth: '.entry:not(.entry-date-section)'
                }
            });

            setTimeout(function () {
                SEMICOLON.initialize.blogTimelineEntries();
            }, 2500);

            $(window).resize(function () {
                $container.isotope('layout');
                setTimeout(function () {
                    SEMICOLON.initialize.blogTimelineEntries();
                }, 2500);
            });
        });
    </script>
@endpush
