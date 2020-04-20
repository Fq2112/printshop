@extends('layouts.mst')
@section('title',  __('lang.header.faq').' | '.__('lang.title'))
@push('styles')
    <style>
        #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #f89406 !important;
            background-color: #F9F9F9 !important;
            border-color: transparent transparent #f3f3f3;
            border-bottom: 4px solid #f89406 !important;
        }

        #tabs .nav-tabs .nav-link {
            text-transform: uppercase;
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        }

        #tabs .nav-tabs .nav-link span.badge-primary {
            color: #fff;
            background-color: #f89406;
        }

        #tabs .nav-tabs .nav-link span.badge-primary:hover, #tabs .nav-tabs .nav-link span.badge-primary:focus {
            color: #fff;
            background-color: #cd7c06;
        }

        #tabs .nav-tabs .nav-link span.badge-primary:focus, #tabs .nav-tabs .nav-link span.badge-primary.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(248, 148, 6, 0.5);
        }

        #nav-tabContent h4 {
            margin: 1rem auto;
        }

        #nav-tabContent p {
            margin-bottom: 0;
            text-align: justify;
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{asset('images/banner/faq.jpg')}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>FAQ</h1>
            <span>{{__('lang.faq.capt')}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">Info</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ</li>
            </ol>
        </div>
    </section>

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="fancy-title title-dotted-border title-center mb-4">
                    <h4 style="background-color: #f9f9f9">{{__('lang.faq.head')}}</h4>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <nav id="tabs">
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link show active" style="color: #495057" id="tabList-all"
                                   data-toggle="tab" href="#tabContent-all" role="tab"
                                   aria-controls="nav-all" aria-selected="true"><i class="icon-sort-alpha-up"></i>&ensp;
                                    {{__('lang.blog.tabs')}}&ensp;<span class="badge badge-primary">
                                        {{count($faqs) > 999 ? '999+' : count($faqs)}}</span></a>
                                @foreach($category as $cat)
                                    <a class="nav-item nav-link" style="color: #495057" id="tabList-{{$cat->id}}"
                                       data-toggle="tab" href="#tabContent-{{$cat->id}}" role="tab"
                                       aria-controls="nav-{{$cat->id}}" aria-selected="true">
                                        {{$cat->name}}&ensp;<span class="badge badge-secondary">
                                            {{count($cat->getFaq) > 999 ? '999+' : count($cat->getFaq)}}</span></a>
                                @endforeach
                            </div>
                        </nav>
                        <div id="nav-tabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="tabContent-all"
                                 aria-labelledby="nav-all-tab" style="border: none">
                                <div class="accordion accordion-border clearfix" data-state="closed">
                                    @foreach($faqs as $faq)
                                        <div class="acctitle">
                                            <i class="acc-closed icon-chevron-down1"></i>
                                            <i class="acc-open icon-chevron-up1"></i>{{$faq->question}}
                                        </div>
                                        <div class="acc_content clearfix">{!! $faq->answer !!}</div>
                                    @endforeach
                                </div>
                            </div>
                            @foreach($category as $cat)
                                <div role="tabpanel" class="tab-pane fade" id="tabContent-{{$cat->id}}"
                                     aria-labelledby="nav-{{$cat->id}}-tab" style="border: none">
                                    <div class="accordion accordion-border clearfix" data-state="closed">
                                        @foreach($cat->getFaq as $faq)
                                            <div class="acctitle">
                                                <i class="acc-closed icon-chevron-down1"></i>
                                                <i class="acc-open icon-chevron-up1"></i>{{$faq->question}}
                                            </div>
                                            <div class="acc_content clearfix">{!! $faq->answer !!}</div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $('#tabs a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            $(this).parent().find('span').removeClass('badge-primary').addClass('badge-secondary');
            $(this).find('span').addClass('badge-primary').removeClass('badge-secondary');
        });
    </script>
@endpush
