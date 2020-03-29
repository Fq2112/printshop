@extends('layouts.mst')
@section('title',  __('pp.head').' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-toc/bootstrap-toc.css')}}">
    <style>
        .postcontent h4 {
            margin-top: 1rem;
            margin-bottom: .25rem;
        }

        .postcontent p {
            margin-bottom: 1.5rem;
            text-align: justify;
            font-size: 15px;
        }

        @media (max-width: 768px) {
            nav[data-toggle=toc] .nav .active .nav {
                display: none;
            }
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{asset('images/banner/tnc-pp.jpg')}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{__('lang.footer.pp')}}</h1>
            <span>{{__('pp.capt')}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">Info</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('lang.footer.pp')}}</li>
            </ol>
        </div>
    </section>

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row">
                    <div class="sidebar sticky-sidebar-wrap nobottommargin clearfix">
                        <div class="sidebar-widgets-wrap">
                            <div class="sticky-sidebar">
                                <nav id="toc" data-toggle="toc"></nav>
                            </div>
                        </div>
                    </div>
                    <div class="postcontent nobottommargin col_last clearfix">
                        {!! __('pp.content') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('js/plugins/bootstrap-toc/bootstrap-toc.js')}}"></script>
    <script>
        $(function () {
            $("#toc ul li a").addClass('toc-nav-link');
            $("#toc ul li:first-child").remove();
        });

        $(window).on("scroll", function () {
            var scrollTop = $(this).scrollTop();
            $(".postcontent h4").each(function () {
                if ($(this).offset().top < scrollTop) {
                    $("#toc ul li a[href*='#" + $(this).attr("id") + "']")
                        .parent().addClass('active').siblings().removeClass('active');
                }
            });
        });

        $(document).on('click', '.toc-nav-link', function (event) {
            event.preventDefault();
            $(this).parent().addClass('active').siblings().removeClass('active');
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 500);
        });
    </script>
@endpush
