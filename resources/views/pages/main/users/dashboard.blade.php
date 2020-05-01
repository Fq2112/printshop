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
                                {{count($all) <= 999 ? count($all) : '999+'}}</span>
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
                                0</span>
                        </a>
                        <a class="nav-item nav-link {{$category == 'shipped' ? 'show active' : ''}}"
                           style="color: #495057" id="tabList-id" data-toggle="tab" href="#tabContent-id" role="tab"
                           aria-controls="nav-id" aria-selected="true" onclick="$('#category').val('shipped')">
                            {{__('lang.order.tab-id')}}&ensp;<span
                                class="badge badge-{{$category == 'shipped' ? 'primary' : 'secondary'}}">
                                0</span>
                        </a>
                        <a class="nav-item nav-link {{$category == 'received' ? 'show active' : ''}}"
                           style="color: #495057" id="tabList-ir" data-toggle="tab" href="#tabContent-ir" role="tab"
                           aria-controls="nav-ir" aria-selected="true" onclick="$('#category').val('received')">
                            {{__('lang.order.tab-ir')}}&ensp;<span
                                class="badge badge-{{$category == 'received' ? 'primary' : 'secondary'}}">
                                0</span>
                        </a>
                    </div>
                </nav>

                <div id="nav-tabContent" class="tab-content mt-3">
                    <div class="tab-pane fade {{is_null($category) || $category == 'all' ? 'show active' : ''}}"
                         id="tabContent-all" role="tabpanel" aria-labelledby="nav-all-tab" style="border: none">
                        @if(count($all) > 0)
                            <div class="component-accordion">
                                <div class="panel-group" id="acc-all" role="tablist">
                                    @foreach($all as $row)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading-all{{$row->id}}">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse"
                                                       href="#collapse-all{{$row->id}}" aria-expanded="false"
                                                       aria-controls="collapse-all{{$row->id}}" class="collapsed">
                                                        {!! __('lang.order.payment', ['id' => $row->uni_code_payment]) !!}
                                                        <b>{{$row->finish_payment == true ? __('lang.order.paid') : __('lang.order.unpaid')}}</b>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-all{{$row->id}}" class="panel-collapse collapse"
                                                 role="tabpanel" aria-labelledby="heading-all{{$row->id}}"
                                                 aria-expanded="false" style="height: 0;" data-parent="#acc-all">
                                                <div class="panel-body">
                                                    @php
                                                        $cart = $row->getCart;
                                                        if(!is_null($cart->file)) {
                                                            $design = asset('storage/users/order/design/' . $user->id. '/'. $cart->file);
                                                        } else {
                                                            $design = $cart->link;
                                                        }
                                                        $data = !is_null($cart->subkategori_id) ? $cart->getSubKategori : $cart->getCluster;
                                                        $image = !is_null($cart->subkategori_id) ?
                                                        asset('storage/products/banner/'.$cart->getSubKategori->banner) :
                                                        asset('storage/products/thumb/'.$cart->getCluster->thumbnail);
                                                        $specs = !is_null($cart->subkategori_id) ? $data->getSubkatSpecs : $data->getClusterSpecs;
                                                        if(strpos($cart->delivery_duration, '+')) {
                                                            $etd = '&ge; '. str_replace('+','',$cart->delivery_duration) .' '.__(__('lang.product.form.summary.day', ['s' => 's']));
                                                            $received = str_replace('+','',$cart->delivery_duration);
                                                        } else {
                                                            if($cart->delivery_duration == '1-1') {
                                                                $etd = '&le; 1 ' . __(__('lang.product.form.summary.day', ['s' => null]));
                                                            } else {
                                                                $etd = str_replace('-', ' – ',$cart->delivery_duration) . ' ' . __('lang.product.form.summary.day', ['s' => 's']);
                                                            }
                                                            $received = substr($cart->delivery_duration,-1);
                                                        }
                                                    @endphp
                                                    <div class="media">
                                                        <a data-placement="bottom"
                                                           class="content-area align-self-center"
                                                           data-toggle="tooltip" style="cursor: pointer"
                                                           href="{{$design}}" target="_blank"
                                                           title="{{__('lang.tooltip.download-design')}}">
                                                            <img alt="icon" width="150" src="{{$image}}">
                                                            <div class="custom-overlay">
                                                                <div class="custom-text">
                                                                    <i class="icon-cloud-download icon-2x"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="ml-3 media-body">
                                                            <h5 class="mt-3 mb-1">
                                                                <i class="icon-drafting-compass mr-1"></i>
                                                                {{$data->name}}
                                                                <span class="fright text-uppercase">
                                                                    <a style="color: #f89406;" href="#">
                                                                        {{__('lang.order.invoice')}}
                                                                        <i class="icon-file-invoice-dollar ml-1"></i>
                                                                    </a>
                                                                    <small
                                                                        style="color: #7f7f7f">&nbsp;&#124;&nbsp;</small>
                                                                    <a style="color: #dc3545;" href="#">
                                                                        <i class="icon-ban mr-1"></i>
                                                                        {{__('lang.button.cancel')}}
                                                                    </a>
                                                                </span>
                                                            </h5>
                                                            <blockquote class="mb-3 pr-0"
                                                                        style="font-size: 14px;text-transform: none">
                                                                <div class="toggle toggle-border mb-3">
                                                                    <div
                                                                        class="togglet toggleta font-weight-normal text-uppercase">
                                                                        <i class="toggle-closed icon-chevron-down1"></i>
                                                                        <i class="toggle-open icon-chevron-up1"></i>
                                                                        {{__('lang.cart.order.calc')}}
                                                                    </div>
                                                                    <div class="togglec">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item noborder">
                                                                                {{__('lang.product.form.summary.quantity')}}
                                                                                <b class="fright">{{$cart->qty.' '.$specs->getUnit->name}}</b>
                                                                            </li>
                                                                            <li class="list-group-item noborder">
                                                                                {{__('lang.product.form.summary.price', ['unit' => strtok($specs->getUnit->name, '(')])}}
                                                                                <b class="fright">Rp{{number_format($cart->price_pcs,2,',','.')}}</b>
                                                                            </li>
                                                                            <li class="list-group-item noborder">
                                                                                {{__('lang.product.form.summary.production')}}
                                                                                <b class="fright">{{now()->addDays(3)->formatLocalized('%d %b %Y')}}</b>
                                                                            </li>
                                                                            <li class="list-group-item noborder">
                                                                                {{__('lang.product.form.summary.ongkir')}}
                                                                                <b class="fright">Rp{{number_format($cart->ongkir,2,',','.')}}</b>
                                                                            </li>
                                                                            <li class="list-group-item noborder">
                                                                                {{__('lang.product.form.summary.delivery')}}
                                                                                <b class="fright">{!! $etd !!}</b>
                                                                            </li>
                                                                            <li class="list-group-item noborder">
                                                                                {{__('lang.product.form.summary.received')}}
                                                                                <b class="fright">{{now()->addDays(3+$received)->formatLocalized('%d %b %Y')}}</b>
                                                                            </li>
                                                                        </ul>
                                                                        <div
                                                                            class="divider divider-right mt-0 mb-0">
                                                                            <i class="icon-plus-sign"></i>
                                                                        </div>
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item noborder">
                                                                                TOTAL
                                                                                <b class="fright"
                                                                                   style="font-size: large">
                                                                                    Rp{{number_format($cart->total,2,',','.')}}</b>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                                <div class="toggle toggle-border mb-3">
                                                                    <div
                                                                        class="togglet toggleta font-weight-normal text-uppercase">
                                                                        <i class="toggle-closed icon-chevron-down1"></i>
                                                                        <i class="toggle-open icon-chevron-up1"></i>
                                                                        {{__('lang.product.form.summary.specification')}}
                                                                    </div>
                                                                    <div class="togglec">
                                                                        <table style="margin: 0;font-size: 14px;">
                                                                            <tbody class="font-weight-bold">
                                                                            @if($specs->is_type == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.type')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\TypeProduct::find($cart->type_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_material_cover == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.cover_material')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Material::find($cart->material_cover_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_side_cover == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.cover_side')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Side::find($cart->side_cover_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_cover_lamination == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.cover_lamination')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Lamination::find($cart->cover_lamination_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_material == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.materials')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Material::find($cart->material_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_material_color == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.material_color')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Colors::find($cart->material_color_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_color == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.color')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Colors::find($cart->color_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_print_method == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.print_method')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\PrintingMethods::find($cart->print_method_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_size == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.size')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Size::find($cart->size_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_side == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.side')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Side::find($cart->side_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_holder == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.holder')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Finishing::find($cart->holder_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_lid == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.lid')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Lid::find($cart->lid_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_edge == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.corner')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Edge::find($cart->edge_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_folding == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.folding')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Folding::find($cart->folding_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_front_side == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.front_side')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Front::find($cart->front_side_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_back_side == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.back_side')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\BackSide::find($cart->back_side_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_right_side == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.right_side')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\RightLeftSide::find($cart->right_side_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_left_side == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.left_side')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\RightLeftSide::find($cart->left_side_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_balance == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.balance')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Balance::find($cart->balance_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_copies == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.copies')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Copies::find($cart->copies_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_page == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.page')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Pages::find($cart->page_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_front_cover == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.front_cover')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Material::find($cart->front_cover_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_back_cover == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.back_cover')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Material::find($cart->back_cover_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_orientation == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.orientation')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Finishing::find($cart->orientation_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_binding == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.binding')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Finishing::find($cart->binding_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_lamination == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.lamination')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Lamination::find($cart->lamination_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_finishing == true)
                                                                                <tr>
                                                                                    <td>
                                                                                        Finishing
                                                                                    </td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Finishing::find($cart->finishing_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_extra == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.extra')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Finishing::find($cart->extra_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="toggle toggle-border {{$cart->note != "" ? 'mb-3' : 'mb-0'}}">
                                                                    <div
                                                                        class="togglet toggleta font-weight-normal text-uppercase">
                                                                        <i class="toggle-closed icon-chevron-down1"></i>
                                                                        <i class="toggle-open icon-chevron-up1"></i>
                                                                        {{__('lang.product.form.shipping.head')}}
                                                                    </div>
                                                                    <div class="togglec">
                                                                        <div class="media">
                                                                            <div class="align-self-center ml-3">
                                                                                <img alt="icon" width="80"
                                                                                     src="{{asset('images/icons/occupancy/'.$cart->getAddress->getOccupancy->image)}}">
                                                                            </div>
                                                                            <div class="ml-3 media-body">
                                                                                <h5 class="mt-3 mb-1">
                                                                                    <i class="icon-building mr-1"></i>{{$cart->getAddress->getOccupancy->name}}
                                                                                    {!! $cart->getAddress->is_main == false ? '' : '<span style="font-weight: 500;color: unset">['.__('lang.profile.main-address').']</span>'!!}
                                                                                </h5>
                                                                                <blockquote class="mb-3"
                                                                                            style="font-size: 14px;text-transform: none">
                                                                                    <table class="m-0"
                                                                                           style="font-size: 14px">
                                                                                        <tr data-toggle="tooltip"
                                                                                            data-placement="left"
                                                                                            title="{{ucwords(__('lang.placeholder.name'))}}">
                                                                                            <td>
                                                                                                <i class="icon-id-card"></i>
                                                                                            </td>
                                                                                            <td>&nbsp;</td>
                                                                                            <td>{{$cart->getAddress->name}}</td>
                                                                                        </tr>
                                                                                        <tr data-toggle="tooltip"
                                                                                            data-placement="left"
                                                                                            title="{{__('lang.footer.phone')}}">
                                                                                            <td>
                                                                                                <i class="icon-phone"></i>
                                                                                            </td>
                                                                                            <td>&nbsp;</td>
                                                                                            <td>{{$cart->getAddress->phone}}</td>
                                                                                        </tr>
                                                                                        <tr data-toggle="tooltip"
                                                                                            data-placement="left"
                                                                                            title="{{__('lang.profile.city')}}">
                                                                                            <td>
                                                                                                <i class="icon-city"></i>
                                                                                            </td>
                                                                                            <td>&nbsp;</td>
                                                                                            <td>{{$cart->getAddress->getCity->getProvince->name.', '.$cart->getAddress->getCity->name}}</td>
                                                                                        </tr>
                                                                                        <tr data-toggle="tooltip"
                                                                                            data-placement="left"
                                                                                            title="{{__('lang.profile.address')}}">
                                                                                            <td>
                                                                                                <i class="icon-map-marker-alt"></i>
                                                                                            </td>
                                                                                            <td>&nbsp;</td>
                                                                                            <td>{{$cart->getAddress->address.' - '.$cart->getAddress->postal_code}}</td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </blockquote>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @if($cart->note != "")
                                                                    <div class="toggle toggle-border mb-0">
                                                                        <div
                                                                            class="togglet toggleta font-weight-normal text-uppercase">
                                                                            <i class="toggle-closed icon-chevron-down1"></i>
                                                                            <i class="toggle-open icon-chevron-up1"></i>
                                                                            {{__('lang.tooltip.note')}}
                                                                        </div>
                                                                        <div class="togglec">
                                                                            <p class="m-0" align="justify">
                                                                                {{$cart->note}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="row justify-content-center text-center">
                                <div class="col">
                                    <img width="300" class="img-fluid" src="{{asset('images/loader-image.gif')}}"
                                         alt="">
                                    <h3 class="mt-0 mb-1">{{__('lang.order.empty-head')}}</h3>
                                    <h4 class="mt-0 mb-3">{{__('lang.order.empty-capt')}}</h4>
                                    <a href="{{route('beranda')}}"
                                       class="button button-rounded button-reveal button-border button-primary button-large tright nomargin">
                                        <i class="icon-angle-right"></i><span>{{__('lang.button.shop')}}</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade {{$category == 'unpaid' ? 'show active' : ''}}"
                         id="tabContent-or" role="tabpanel" aria-labelledby="nav-or-tab" style="border: none">
                        @if(count($unpaid) > 0)
                            <div class="component-accordion">
                                <div class="panel-group" id="acc-unpaid" role="tablist">
                                    @foreach($unpaid as $row)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading-unpaid{{$row->id}}">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse"
                                                       href="#collapse-unpaid{{$row->id}}" aria-expanded="false"
                                                       aria-controls="collapse-unpaid{{$row->id}}" class="collapsed">
                                                        {!! __('lang.order.payment', ['id' => $row->uni_code_payment]) !!}
                                                        <b>{{$row->finish_payment == true ? __('lang.order.paid') : __('lang.order.unpaid')}}</b>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-unpaid{{$row->id}}" class="panel-collapse collapse"
                                                 role="tabpanel" aria-labelledby="heading-unpaid{{$row->id}}"
                                                 aria-expanded="false" style="height: 0;" data-parent="#acc-unpaid">
                                                <div class="panel-body">
                                                    @php
                                                        $cart = $row->getCart;
                                                        if(!is_null($cart->file)) {
                                                            $design = asset('storage/users/order/design/' . $user->id. '/'. $cart->file);
                                                        } else {
                                                            $design = $cart->link;
                                                        }
                                                        $data = !is_null($cart->subkategori_id) ? $cart->getSubKategori : $cart->getCluster;
                                                        $image = !is_null($cart->subkategori_id) ?
                                                        asset('storage/products/banner/'.$cart->getSubKategori->banner) :
                                                        asset('storage/products/thumb/'.$cart->getCluster->thumbnail);
                                                        $specs = !is_null($cart->subkategori_id) ? $data->getSubkatSpecs : $data->getClusterSpecs;
                                                        if(strpos($cart->delivery_duration, '+')) {
                                                            $etd = '&ge; '. str_replace('+','',$cart->delivery_duration) .' '.__(__('lang.product.form.summary.day', ['s' => 's']));
                                                            $received = str_replace('+','',$cart->delivery_duration);
                                                        } else {
                                                            if($cart->delivery_duration == '1-1') {
                                                                $etd = '&le; 1 ' . __(__('lang.product.form.summary.day', ['s' => null]));
                                                            } else {
                                                                $etd = str_replace('-', ' – ',$cart->delivery_duration) . ' ' . __('lang.product.form.summary.day', ['s' => 's']);
                                                            }
                                                            $received = substr($cart->delivery_duration,-1);
                                                        }
                                                    @endphp
                                                    <div class="media">
                                                        <a data-placement="bottom"
                                                           class="content-area align-self-center"
                                                           data-toggle="tooltip" style="cursor: pointer"
                                                           href="{{$design}}" target="_blank"
                                                           title="{{__('lang.tooltip.download-design')}}">
                                                            <img alt="icon" width="150" src="{{$image}}">
                                                            <div class="custom-overlay">
                                                                <div class="custom-text">
                                                                    <i class="icon-cloud-download icon-2x"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="ml-3 media-body">
                                                            <h5 class="mt-3 mb-1">
                                                                <i class="icon-drafting-compass mr-1"></i>
                                                                {{$data->name}}
                                                                <span class="fright text-uppercase">
                                                                    <a style="color: #f89406;" href="#">
                                                                        {{__('lang.order.invoice')}}
                                                                        <i class="icon-file-invoice-dollar ml-1"></i>
                                                                    </a>
                                                                    <small
                                                                        style="color: #7f7f7f">&nbsp;&#124;&nbsp;</small>
                                                                    <a style="color: #dc3545;" href="#">
                                                                        <i class="icon-ban mr-1"></i>
                                                                        {{__('lang.button.cancel')}}
                                                                    </a>
                                                                </span>
                                                            </h5>
                                                            <blockquote class="mb-3 pr-0"
                                                                        style="font-size: 14px;text-transform: none">
                                                                <div class="toggle toggle-border mb-3">
                                                                    <div
                                                                        class="togglet toggleta font-weight-normal text-uppercase">
                                                                        <i class="toggle-closed icon-chevron-down1"></i>
                                                                        <i class="toggle-open icon-chevron-up1"></i>
                                                                        {{__('lang.cart.order.calc')}}
                                                                    </div>
                                                                    <div class="togglec">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item noborder">
                                                                                {{__('lang.product.form.summary.quantity')}}
                                                                                <b class="fright">{{$cart->qty.' '.$specs->getUnit->name}}</b>
                                                                            </li>
                                                                            <li class="list-group-item noborder">
                                                                                {{__('lang.product.form.summary.price', ['unit' => strtok($specs->getUnit->name, '(')])}}
                                                                                <b class="fright">Rp{{number_format($cart->price_pcs,2,',','.')}}</b>
                                                                            </li>
                                                                            <li class="list-group-item noborder">
                                                                                {{__('lang.product.form.summary.production')}}
                                                                                <b class="fright">{{now()->addDays(3)->formatLocalized('%d %b %Y')}}</b>
                                                                            </li>
                                                                            <li class="list-group-item noborder">
                                                                                {{__('lang.product.form.summary.ongkir')}}
                                                                                <b class="fright">Rp{{number_format($cart->ongkir,2,',','.')}}</b>
                                                                            </li>
                                                                            <li class="list-group-item noborder">
                                                                                {{__('lang.product.form.summary.delivery')}}
                                                                                <b class="fright">{!! $etd !!}</b>
                                                                            </li>
                                                                            <li class="list-group-item noborder">
                                                                                {{__('lang.product.form.summary.received')}}
                                                                                <b class="fright">{{now()->addDays(3+$received)->formatLocalized('%d %b %Y')}}</b>
                                                                            </li>
                                                                        </ul>
                                                                        <div
                                                                            class="divider divider-right mt-0 mb-0">
                                                                            <i class="icon-plus-sign"></i>
                                                                        </div>
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item noborder">
                                                                                TOTAL
                                                                                <b class="fright"
                                                                                   style="font-size: large">
                                                                                    Rp{{number_format($cart->total,2,',','.')}}</b>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                                <div class="toggle toggle-border mb-3">
                                                                    <div
                                                                        class="togglet toggleta font-weight-normal text-uppercase">
                                                                        <i class="toggle-closed icon-chevron-down1"></i>
                                                                        <i class="toggle-open icon-chevron-up1"></i>
                                                                        {{__('lang.product.form.summary.specification')}}
                                                                    </div>
                                                                    <div class="togglec">
                                                                        <table style="margin: 0;font-size: 14px;">
                                                                            <tbody class="font-weight-bold">
                                                                            @if($specs->is_type == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.type')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\TypeProduct::find($cart->type_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_material_cover == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.cover_material')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Material::find($cart->material_cover_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_side_cover == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.cover_side')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Side::find($cart->side_cover_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_cover_lamination == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.cover_lamination')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Lamination::find($cart->cover_lamination_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_material == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.materials')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Material::find($cart->material_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_material_color == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.material_color')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Colors::find($cart->material_color_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_color == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.color')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Colors::find($cart->color_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_print_method == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.print_method')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\PrintingMethods::find($cart->print_method_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_size == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.size')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Size::find($cart->size_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_side == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.side')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Side::find($cart->side_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_holder == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.holder')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Finishing::find($cart->holder_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_lid == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.lid')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Lid::find($cart->lid_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_edge == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.corner')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Edge::find($cart->edge_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_folding == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.folding')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Folding::find($cart->folding_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_front_side == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.front_side')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Front::find($cart->front_side_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_back_side == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.back_side')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\BackSide::find($cart->back_side_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_right_side == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.right_side')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\RightLeftSide::find($cart->right_side_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_left_side == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.left_side')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\RightLeftSide::find($cart->left_side_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_balance == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.balance')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Balance::find($cart->balance_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_copies == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.copies')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Copies::find($cart->copies_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_page == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.page')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Pages::find($cart->page_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_front_cover == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.front_cover')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Material::find($cart->front_cover_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_back_cover == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.back_cover')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Material::find($cart->back_cover_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_orientation == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.orientation')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Finishing::find($cart->orientation_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_binding == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.binding')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Finishing::find($cart->binding_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_lamination == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.lamination')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Lamination::find($cart->lamination_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_finishing == true)
                                                                                <tr>
                                                                                    <td>
                                                                                        Finishing
                                                                                    </td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Finishing::find($cart->finishing_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if($specs->is_extra == true)
                                                                                <tr>
                                                                                    <td>{{__('lang.product.form.summary.extra')}}</td>
                                                                                    <td>:&nbsp;</td>
                                                                                    <td>{{\App\Models\Finishing::find($cart->extra_id)->name}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="toggle toggle-border {{$cart->note != "" ? 'mb-3' : 'mb-0'}}">
                                                                    <div
                                                                        class="togglet toggleta font-weight-normal text-uppercase">
                                                                        <i class="toggle-closed icon-chevron-down1"></i>
                                                                        <i class="toggle-open icon-chevron-up1"></i>
                                                                        {{__('lang.product.form.shipping.head')}}
                                                                    </div>
                                                                    <div class="togglec">
                                                                        <div class="media">
                                                                            <div class="align-self-center ml-3">
                                                                                <img alt="icon" width="80"
                                                                                     src="{{asset('images/icons/occupancy/'.$cart->getAddress->getOccupancy->image)}}">
                                                                            </div>
                                                                            <div class="ml-3 media-body">
                                                                                <h5 class="mt-3 mb-1">
                                                                                    <i class="icon-building mr-1"></i>{{$cart->getAddress->getOccupancy->name}}
                                                                                    {!! $cart->getAddress->is_main == false ? '' : '<span style="font-weight: 500;color: unset">['.__('lang.profile.main-address').']</span>'!!}
                                                                                </h5>
                                                                                <blockquote class="mb-3"
                                                                                            style="font-size: 14px;text-transform: none">
                                                                                    <table class="m-0"
                                                                                           style="font-size: 14px">
                                                                                        <tr data-toggle="tooltip"
                                                                                            data-placement="left"
                                                                                            title="{{ucwords(__('lang.placeholder.name'))}}">
                                                                                            <td>
                                                                                                <i class="icon-id-card"></i>
                                                                                            </td>
                                                                                            <td>&nbsp;</td>
                                                                                            <td>{{$cart->getAddress->name}}</td>
                                                                                        </tr>
                                                                                        <tr data-toggle="tooltip"
                                                                                            data-placement="left"
                                                                                            title="{{__('lang.footer.phone')}}">
                                                                                            <td>
                                                                                                <i class="icon-phone"></i>
                                                                                            </td>
                                                                                            <td>&nbsp;</td>
                                                                                            <td>{{$cart->getAddress->phone}}</td>
                                                                                        </tr>
                                                                                        <tr data-toggle="tooltip"
                                                                                            data-placement="left"
                                                                                            title="{{__('lang.profile.city')}}">
                                                                                            <td>
                                                                                                <i class="icon-city"></i>
                                                                                            </td>
                                                                                            <td>&nbsp;</td>
                                                                                            <td>{{$cart->getAddress->getCity->getProvince->name.', '.$cart->getAddress->getCity->name}}</td>
                                                                                        </tr>
                                                                                        <tr data-toggle="tooltip"
                                                                                            data-placement="left"
                                                                                            title="{{__('lang.profile.address')}}">
                                                                                            <td>
                                                                                                <i class="icon-map-marker-alt"></i>
                                                                                            </td>
                                                                                            <td>&nbsp;</td>
                                                                                            <td>{{$cart->getAddress->address.' - '.$cart->getAddress->postal_code}}</td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </blockquote>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @if($cart->note != "")
                                                                    <div class="toggle toggle-border mb-0">
                                                                        <div
                                                                            class="togglet toggleta font-weight-normal text-uppercase">
                                                                            <i class="toggle-closed icon-chevron-down1"></i>
                                                                            <i class="toggle-open icon-chevron-up1"></i>
                                                                            {{__('lang.tooltip.note')}}
                                                                        </div>
                                                                        <div class="togglec">
                                                                            <p class="m-0" align="justify">
                                                                                {{$cart->note}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="row justify-content-center text-center">
                                <div class="col">
                                    <img width="300" class="img-fluid" src="{{asset('images/loader-image.gif')}}"
                                         alt="">
                                    <h3 class="mt-0 mb-1">{{__('lang.order.empty-head')}}</h3>
                                    <h4 class="mt-0 mb-3">{{__('lang.order.empty-capt')}}</h4>
                                    <a href="{{route('beranda')}}"
                                       class="button button-rounded button-reveal button-border button-primary button-large tright nomargin">
                                        <i class="icon-angle-right"></i><span>{{__('lang.button.shop')}}</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade {{$category == 'paid' ? 'show active' : ''}}"
                         id="tabContent-pr" role="tabpanel" aria-labelledby="nav-pr-tab" style="border: none">
                        @if(count($paid) > 0)
                            @foreach($paid as $row)

                            @endforeach
                        @else
                            <div class="row justify-content-center text-center">
                                <div class="col">
                                    <img width="300" class="img-fluid" src="{{asset('images/loader-image.gif')}}"
                                         alt="">
                                    <h3 class="mt-0 mb-1">{{__('lang.order.empty-head')}}</h3>
                                    <h4 class="mt-0 mb-3">{{__('lang.order.empty-capt')}}</h4>
                                    <a href="{{route('beranda')}}"
                                       class="button button-rounded button-reveal button-border button-primary button-large tright nomargin">
                                        <i class="icon-angle-right"></i><span>{{__('lang.button.shop')}}</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade {{$category == 'produced' ? 'show active' : ''}}"
                         id="tabContent-bp" role="tabpanel" aria-labelledby="nav-bp-tab" style="border: none">
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
                    <div class="tab-pane fade {{$category == 'shipped' ? 'show active' : ''}}"
                         id="tabContent-id" role="tabpanel" aria-labelledby="nav-id-tab" style="border: none">
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
                    <div class="tab-pane fade {{$category == 'received' ? 'show active' : ''}}"
                         id="tabContent-ir" role="tabpanel" aria-labelledby="nav-ir-tab" style="border: none">
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

                $('html,body').animate({scrollTop: $(this).parent().parent().offset().top}, 0);
            });
        });

        $("#tabs .nav-link").on('click', function () {
            $("#tabs .nav-link span").removeClass('badge-primary').addClass('badge-secondary');
            $(this).find('span').addClass('badge-primary').removeClass('badge-secondary');
        });
    </script>
@endpush
