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

        .component-accordion .panel-group .panel {
            border: 0 none;
            box-shadow: 0 4px 5px -1px #E5E5E5;
            margin-bottom: 15px;
        }

        .component-accordion .panel-group .panel-heading {
            background-color: #fff;
            border-radius: 5px 5px 0 0;
            color: #444;
            padding: 0;
        }

        .component-accordion .panel-group .panel-heading h4 {
            margin: 0;
        }

        .component-accordion .panel-group .panel-heading a:hover.active,
        .component-accordion .panel-group .panel-heading a.active {
            color: #f89406;
        }

        .component-accordion .panel-group .panel-title a {
            border-radius: 5px 5px 0 0;
            color: #888;
            display: block;
            font-size: 16px;
            font-weight: 500;
            text-transform: none;
            position: relative;
            padding: 15px;
            transition: color .2s ease-in-out;
        }

        .component-accordion .panel-group .panel-title a:hover {
            color: #444;
            text-decoration: none;
        }

        .component-accordion .panel-group .panel-title a b {
            margin-right: 4em;
            float: right;
        }

        .component-accordion .panel-group .panel-title a.collapsed::after,
        .component-accordion .panel-group .panel-title a::after {
            border-left: 1px solid #eee;
            font-family: 'font-icons';
            content: "\ec52";
            line-height: 55px;
            padding-left: 20px;
            position: absolute;
            right: 19px;
            top: 0;
        }

        .component-accordion .panel-group .panel-title a:after {
            content: "\e9eb";
        }

        .component-accordion .panel-body {
            background: #fff;
            color: #888;
            padding: 20px;
        }

        .component-accordion .panel-group .panel-heading + .panel-collapse > .panel-body,
        .component-accordion .panel-group .panel-heading + .panel-collapse > .list-group {
            border-top: 1px solid #eee;
        }

        .content-area {
            cursor: pointer;
        }

        .custom-overlay {
            background: rgba(0, 0, 0, 0.4);
        }

        .toggle-border {
            border-color: #E5E5E5 !important;
        }

        .togglet {
            font-size: 14px !important;
            padding: 0 1em !important;
        }

        .togglet i {
            left: unset !important;
            right: 1em;
            font-size: 14px !important;
        }

        .togglec {
            padding: 0 1em .5em !important;
        }

        .togglec .list-group-flush {
            margin: 0 !important;
        }

        .togglec .list-group-item {
            padding: 0.75rem 0 !important;
        }

        .process-steps.process-5 li:not(.ui-state-passed):not(.ui-state-active) {
            opacity: .6;
        }

        .process-steps.process-5 li a {
            pointer-events: none;
            cursor: default;
        }

        .process-steps.process-5 li.ui-tabs-passed a {
            border-color: #f89406;
            color: #f89406;
            background-color: #fff;
        }

        .process-steps.process-5 li.ui-tabs-passed h5 {
            color: #f89406;
            font-weight: 400;
        }

        .process-steps.process-5 li.ui-tabs-passed:before,
        .process-steps.process-5 li.ui-tabs-passed:after,
        .process-steps.process-5 li.ui-tabs-active:before {
            border-top: 1px solid #f89406;
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
                <form id="form-loadOrder" action="{{URL::current()}}">
                    <div class="form-group has-feedback">
                        <input id="order-keyword" type="text" name="q" class="form-control"
                               autocomplete="off" spellcheck="false" value="{{$keyword}}"
                               placeholder="{{__('lang.order.search')}}" style="border-radius: 1rem;">
                        <span class="glyphicon glyphicon-search form-control-feedback"
                              style="width: 35px;height: 35px;line-height: 35px;"></span>
                    </div>
                    <input type="hidden" name="filter" id="category"
                           value="{{is_null($category) || $category == 'all' ? 'all' : $category}}">
                </form>

                <nav id="tabs">
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link {{is_null($category) || $category == 'all' ? 'show active' : ''}}"
                           style="color: #495057" id="tabList-all" data-toggle="tab" href="#tabContent-all"
                           role="tab" aria-controls="nav-all" aria-selected="true" onclick="$('#category').val('all')">
                            <i class="icon-sort-alpha-up"></i>&ensp;{{__('lang.blog.tabs')}}&ensp;
                            <span
                                class="badge badge-{{is_null($category) || $category == 'all' ? 'primary' : 'secondary'}}">
                                {{$all <= 999 ? $all : '999+'}}</span>
                        </a>
                        <a class="nav-item nav-link {{$category == 'unpaid' ? 'show active' : ''}}"
                           style="color: #495057" id="tabList-or" data-toggle="tab" href="#tabContent-or" role="tab"
                           aria-controls="nav-or" aria-selected="true" onclick="$('#category').val('unpaid')">
                            {{__('lang.order.tab-or')}}&ensp;<span
                                class="badge badge-{{$category == 'unpaid' ? 'primary' : 'secondary'}}">
                                {{count($unpaid) <= 999 ? count($unpaid) : '999+'}}</span>
                        </a>
                        <a class="nav-item nav-link {{$category == 'paid' ? 'show active' : ''}}"
                           style="color: #495057" id="tabList-pr" data-toggle="tab" href="#tabContent-pr" role="tab"
                           aria-controls="nav-pr" aria-selected="true" onclick="$('#category').val('paid')">
                            {{__('lang.order.tab-pr')}}&ensp;<span
                                class="badge badge-{{$category == 'paid' ? 'primary' : 'secondary'}}">
                                {{count($paid) <= 999 ? count($paid) : '999+'}}</span>
                        </a>
                        <a class="nav-item nav-link {{$category == 'produced' ? 'show active' : ''}}"
                           style="color: #495057" id="tabList-bp" data-toggle="tab" href="#tabContent-bp" role="tab"
                           aria-controls="nav-bp" aria-selected="true" onclick="$('#category').val('produced')">
                            {{__('lang.order.tab-bp')}}&ensp;<span
                                class="badge badge-{{$category == 'produced' ? 'primary' : 'secondary'}}">
                                {{count($produced) <= 999 ? count($produced) : '999+'}}</span>
                        </a>
                        <a class="nav-item nav-link {{$category == 'shipped' ? 'show active' : ''}}"
                           style="color: #495057" id="tabList-id" data-toggle="tab" href="#tabContent-id" role="tab"
                           aria-controls="nav-id" aria-selected="true" onclick="$('#category').val('shipped')">
                            {{__('lang.order.tab-id')}}&ensp;<span
                                class="badge badge-{{$category == 'shipped' ? 'primary' : 'secondary'}}">
                                {{count($shipped) <= 999 ? count($shipped) : '999+'}}</span>
                        </a>
                        <a class="nav-item nav-link {{$category == 'received' ? 'show active' : ''}}"
                           style="color: #495057" id="tabList-ir" data-toggle="tab" href="#tabContent-ir" role="tab"
                           aria-controls="nav-ir" aria-selected="true" onclick="$('#category').val('received')">
                            {{__('lang.order.tab-ir')}}&ensp;<span
                                class="badge badge-{{$category == 'received' ? 'primary' : 'secondary'}}">
                                {{count($received) <= 999 ? count($received) : '999+'}}</span>
                        </a>
                    </div>
                </nav>

                <div id="nav-tabContent" class="tab-content mt-3">
                    <div class="tab-pane fade {{is_null($category) || $category == 'all' ? 'show active' : ''}}"
                         id="tabContent-all" role="tabpanel" aria-labelledby="nav-all-tab" style="border: none">
                        @if($all > 0)
                            @if(count($unpaid) > 0)
                                @php $item = $unpaid; $all = 'all-unpaid-'; $acc = 'unpaid'; @endphp
                                @include('layouts.partials.users._paymentDashboard')
                            @endif
                            @if(count($paid) > 0)
                                @php $item = $paid; $all = 'all-paid-'; $acc = 'paid'; @endphp
                                @include('layouts.partials.users._paymentDashboard')
                            @endif
                            @if(count($produced) > 0)
                                @php $item = $produced; $all = 'all-'; $acc = 'produced'; @endphp
                                @include('layouts.partials.users._orderDashboard')
                            @endif
                            @if(count($shipped) > 0)
                                @php $item = $shipped; $all = 'all-'; $acc = 'shipped'; @endphp
                                @include('layouts.partials.users._orderDashboard')
                            @endif
                            @if(count($received) > 0)
                                @php $item = $received; $all = 'all-'; $acc = 'received'; @endphp
                                @include('layouts.partials.users._orderDashboard')
                            @endif
                        @else
                            @include('layouts.partials.users._emptyDashboard')
                        @endif
                    </div>

                    <div class="tab-pane fade {{$category == 'unpaid' ? 'show active' : ''}}"
                         id="tabContent-or" role="tabpanel" aria-labelledby="nav-or-tab" style="border: none">
                        @if(count($unpaid) > 0)
                            @php $item = $unpaid; $all = 'unpaid'; $acc = 'unpaid'; @endphp
                            @include('layouts.partials.users._paymentDashboard')
                        @else
                            @include('layouts.partials.users._emptyDashboard')
                        @endif
                    </div>

                    <div class="tab-pane fade {{$category == 'paid' ? 'show active' : ''}}"
                         id="tabContent-pr" role="tabpanel" aria-labelledby="nav-pr-tab" style="border: none">
                        @if(count($paid) > 0)
                            @php $item = $paid; $all = 'paid'; $acc = 'paid'; @endphp
                            @include('layouts.partials.users._paymentDashboard')
                        @else
                            @include('layouts.partials.users._emptyDashboard')
                        @endif
                    </div>

                    <div class="tab-pane fade {{$category == 'produced' ? 'show active' : ''}}"
                         id="tabContent-bp" role="tabpanel" aria-labelledby="nav-bp-tab" style="border: none">
                        @if(count($produced) > 0)
                            @php $item = $produced; $all = null; $acc = 'produced'; @endphp
                            @include('layouts.partials.users._orderDashboard')
                        @else
                            @include('layouts.partials.users._emptyDashboard')
                        @endif
                    </div>

                    <div class="tab-pane fade {{$category == 'shipped' ? 'show active' : ''}}"
                         id="tabContent-id" role="tabpanel" aria-labelledby="nav-id-tab" style="border: none">
                        @if(count($shipped) > 0)
                            @php $item = $shipped; $all = null; $acc = 'shipped'; @endphp
                            @include('layouts.partials.users._orderDashboard')
                        @else
                            @include('layouts.partials.users._emptyDashboard')
                        @endif
                    </div>

                    <div class="tab-pane fade {{$category == 'received' ? 'show active' : ''}}"
                         id="tabContent-ir" role="tabpanel" aria-labelledby="nav-ir-tab" style="border: none">
                        @if(count($received) > 0)
                            @php $item = $received; $all = null; $acc = 'received'; @endphp
                            @include('layouts.partials.users._orderDashboard')
                        @else
                            @include('layouts.partials.users._emptyDashboard')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        var collapse = $('.panel-collapse');

        $(function () {
            collapse.on('show.bs.collapse', function () {
                $(this).siblings('.panel-heading').addClass('active');
                $(this).siblings('.panel-heading').find('a').addClass('active font-weight-bold');
                $(this).siblings('.panel-heading').find('b').toggle(300);

                $('html,body').animate({scrollTop: $(this).parent().offset().top}, 0);
            });

            collapse.on('hide.bs.collapse', function () {
                $(this).siblings('.panel-heading').removeClass('active');
                $(this).siblings('.panel-heading').find('a').removeClass('active font-weight-bold');
                $(this).siblings('.panel-heading').find('b').toggle(300);

                $('html,body').animate({scrollTop: $("#form-loadOrder").offset().top}, 0);
            });

            $(".panel-body .divider:last-child").remove();

            $(".processTabs").tabs({show: {effect: "slide", duration: 500}});
        });

        $("#order-keyword").on('keyup', function () {
            var string = $(this).val();
            $(this).val(string.replace('#', ''));
        });

        $("#tabs .nav-link").on('click', function () {
            $("#tabs .nav-link span").removeClass('badge-primary').addClass('badge-secondary');
            $(this).find('span').addClass('badge-primary').removeClass('badge-secondary');
        });

        function received(name, code, url) {
            swal({
                title: '{{__('lang.order.tab-ir')}}',
                text: '{!! __('lang.alert.received') !!}',
                icon: 'warning',
                dangerMode: true,
                buttons: ["{{__('lang.button.no')}}", "{{__('lang.button.yes')}}"],
                closeOnEsc: false,
                closeOnClickOutside: false,
            }).then((confirm) => {
                if (confirm) {
                    swal({icon: "success", buttons: false});
                    window.location.href = url;
                }
            });
        }

        function reOrder(name, url) {
            swal({
                title: '{{__('lang.order.reorder')}}',
                text: '{!! __('lang.alert.reorder') !!}',
                icon: 'warning',
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
                    window.location.href = url;
                }
            });
        }
    </script>
@endpush
