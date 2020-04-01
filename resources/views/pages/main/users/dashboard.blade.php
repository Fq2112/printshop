@extends('layouts.mst')
@section('title',  'Dashboard – '.__('lang.header.order').': '.$user->name.' | '.__('lang.title'))
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
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{$bio->background == "" ? asset('images/banner/users.jpg') :
             asset('storage/users/background/'.$bio->background)}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>Dashboard: {{__('lang.header.order')}}</h1>
            <span>{{__('lang.order.capt')}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">{{__('lang.breadcrumb.account')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </section>

    <div id="page-menu">
        <div id="page-menu-wrap">
            <div class="container clearfix">
                <div class="menu-title"><span>{{$user->name}}</span></div>
                <nav>
                    <ul>
                        <li class="current"><a href="{{URL::current()}}">
                                <div>Dashboard</div>
                            </a></li>
                        <li><a href="{{route('user.profil')}}">
                                <div>{{__('lang.header.profile')}}</div>
                            </a></li>
                        <li><a href="{{route('user.pengaturan')}}">
                                <div>{{__('lang.header.settings')}}</div>
                            </a></li>
                    </ul>
                </nav>
                <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>
            </div>
        </div>
    </div>

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <form id="form-loadOrder">
                    <input type="hidden" name="filter" id="category">
                    <div class="form-group has-feedback">
                        <input id="order-keyword" type="text" name="q" class="form-control"
                               autocomplete="off" spellcheck="false" value="{{$keyword}}"
                               placeholder="{{__('lang.order.search')}}" style="border-radius: 1rem;">
                        <span class="glyphicon glyphicon-search form-control-feedback"
                              style="width: 35px;height: 35px;line-height: 35px;"></span>
                    </div>
                </form>

                <nav id="tabs">
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link show active" style="color: #495057"
                           id="tabList-all" data-toggle="tab" href="#tabContent-all"
                           role="tab" aria-controls="nav-all" aria-selected="true">
                            <i class="icon-sort-alpha-up"></i>&ensp;{{__('lang.blog.tabs')}}&ensp;
                            <span class="badge badge-primary">0</span>
                        </a>
                        <a class="nav-item nav-link" style="color: #495057" id="tabList-or"
                           data-toggle="tab" href="#tabContent-or" role="tab"
                           aria-controls="nav-or" aria-selected="true">
                            {{__('lang.order.tab-or')}}&ensp;<span class="badge badge-secondary">0</span>
                        </a>
                        <a class="nav-item nav-link" style="color: #495057" id="tabList-pr"
                           data-toggle="tab" href="#tabContent-pr" role="tab"
                           aria-controls="nav-pr" aria-selected="true">
                            {{__('lang.order.tab-pr')}}&ensp;<span class="badge badge-secondary">0</span>
                        </a>
                        <a class="nav-item nav-link" style="color: #495057" id="tabList-bp"
                           data-toggle="tab" href="#tabContent-bp" role="tab"
                           aria-controls="nav-bp" aria-selected="true">
                            {{__('lang.order.tab-bp')}}&ensp;<span class="badge badge-secondary">0</span>
                        </a>
                        <a class="nav-item nav-link" style="color: #495057" id="tabList-id"
                           data-toggle="tab" href="#tabContent-id" role="tab"
                           aria-controls="nav-id" aria-selected="true">
                            {{__('lang.order.tab-id')}}&ensp;<span class="badge badge-secondary">0</span>
                        </a>
                        <a class="nav-item nav-link" style="color: #495057" id="tabList-ir"
                           data-toggle="tab" href="#tabContent-ir" role="tab"
                           aria-controls="nav-ir" aria-selected="true">
                            {{__('lang.order.tab-ir')}}&ensp;<span class="badge badge-secondary">0</span>
                        </a>
                    </div>
                </nav>
                <div id="nav-tabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade show active" id="tabContent-all"
                         aria-labelledby="nav-all-tab" style="border: none">
                        <div class="row justify-content-center text-center">
                            <div class="col">
                                <img width="300" class="img-fluid" src="{{asset('images/loader-image.gif')}}" alt="">
                                <h3 class="mt-0 mb-1">{{__('lang.order.empty-head')}}</h3>
                                <h4 class="mt-0 mb-3">{{__('lang.order.empty-capt')}}</h4>
                                <a href="{{route('beranda')}}"
                                   class="button button-rounded button-reveal button-border button-primary button-large tright nomargin">
                                    <i class="icon-angle-right"></i><span>{{__('lang.button.shop')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabContent-or"
                         aria-labelledby="nav-or-tab" style="border: none">
                        <div class="row justify-content-center text-center">
                            <div class="col">
                                <img width="300" class="img-fluid" src="{{asset('images/loader-image.gif')}}" alt="">
                                <h3 class="mt-0 mb-1">{{__('lang.order.empty-head')}}</h3>
                                <h4 class="mt-0 mb-3">{{__('lang.order.empty-capt')}}</h4>
                                <a href="{{route('beranda')}}"
                                   class="button button-rounded button-reveal button-border button-primary button-large tright nomargin">
                                    <i class="icon-angle-right"></i><span>{{__('lang.button.shop')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabContent-pr"
                         aria-labelledby="nav-pr-tab" style="border: none">
                        <div class="row justify-content-center text-center">
                            <div class="col">
                                <img width="300" class="img-fluid" src="{{asset('images/loader-image.gif')}}" alt="">
                                <h3 class="mt-0 mb-1">{{__('lang.order.empty-head')}}</h3>
                                <h4 class="mt-0 mb-3">{{__('lang.order.empty-capt')}}</h4>
                                <a href="{{route('beranda')}}"
                                   class="button button-rounded button-reveal button-border button-primary button-large tright nomargin">
                                    <i class="icon-angle-right"></i><span>{{__('lang.button.shop')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabContent-bp"
                         aria-labelledby="nav-bp-tab" style="border: none">
                        <div class="row justify-content-center text-center">
                            <div class="col">
                                <img width="300" class="img-fluid" src="{{asset('images/loader-image.gif')}}" alt="">
                                <h3 class="mt-0 mb-1">{{__('lang.order.empty-head')}}</h3>
                                <h4 class="mt-0 mb-3">{{__('lang.order.empty-capt')}}</h4>
                                <a href="{{route('beranda')}}"
                                   class="button button-rounded button-reveal button-border button-primary button-large tright nomargin">
                                    <i class="icon-angle-right"></i><span>{{__('lang.button.shop')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabContent-id"
                         aria-labelledby="nav-id-tab" style="border: none">
                        <div class="row justify-content-center text-center">
                            <div class="col">
                                <img width="300" class="img-fluid" src="{{asset('images/loader-image.gif')}}" alt="">
                                <h3 class="mt-0 mb-1">{{__('lang.order.empty-head')}}</h3>
                                <h4 class="mt-0 mb-3">{{__('lang.order.empty-capt')}}</h4>
                                <a href="{{route('beranda')}}"
                                   class="button button-rounded button-reveal button-border button-primary button-large tright nomargin">
                                    <i class="icon-angle-right"></i><span>{{__('lang.button.shop')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tabContent-ir"
                         aria-labelledby="nav-ir-tab" style="border: none">
                        <div class="row justify-content-center text-center">
                            <div class="col">
                                <img width="300" class="img-fluid" src="{{asset('images/loader-image.gif')}}" alt="">
                                <h3 class="mt-0 mb-1">{{__('lang.order.empty-head')}}</h3>
                                <h4 class="mt-0 mb-3">{{__('lang.order.empty-capt')}}</h4>
                                <a href="{{route('beranda')}}"
                                   class="button button-rounded button-reveal button-border button-primary button-large tright nomargin">
                                    <i class="icon-angle-right"></i><span>{{__('lang.button.shop')}}</span>
                                </a>
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
        $("#tabs .nav-link").on('click', function () {
            $("#tabs .nav-link span").removeClass('badge-primary').addClass('badge-secondary');
            $(this).find('span').addClass('badge-primary').removeClass('badge-secondary');
        });
    </script>
@endpush
