@extends('layouts.mst')
@section('title',  __('lang.header.cart').': '.$user->name.' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    <style>
        #content .postcontent {
            width: 70%;
            margin-right: 1.5rem;
        }

        #content .sidebar {
            width: 27%;
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

        .gm-style-iw {
            width: 350px !important;
            top: 15px;
            left: 22px;
            background-color: #fff;
            box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
            border: 1px solid rgba(248, 148, 6, 0.6);
            border-radius: 2px 2px 10px 10px;
        }

        .gm-style-iw > div:first-child {
            max-width: 350px !important;
        }

        .pac-container {
            z-index: 1051 !important;
        }

        #iw-container {
            margin-bottom: 10px;
        }

        #iw-container .iw-title {
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 22px;
            font-weight: 400;
            padding: 10px;
            background-color: #f89406;
            color: white;
            margin: 0;
            border-radius: 2px 2px 0 0;
        }

        #iw-container .iw-content {
            font-size: 13px;
            line-height: 18px;
            font-weight: 400;
            margin-right: 1px;
            padding: 15px 5px 20px 15px;
            max-height: 140px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .iw-content a {
            color: #f89406;
            text-decoration: none;
        }

        .iw-content img {
            float: right;
            margin: 0 5px 5px 10px;
            width: 30%;
        }

        .iw-subTitle {
            font-size: 16px;
            font-weight: 700;
            padding: 5px 0;
        }

        .iw-bottom-gradient {
            position: absolute;
            width: 326px;
            height: 25px;
            bottom: 10px;
            right: 18px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            background: -ms-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
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

        .card-label {
            width: 100%;
        }

        .card-label .card-title {
            text-transform: none;
        }

        .card-rb {
            display: none;
        }

        .card-input {
            cursor: pointer;
            border: 1px solid #eee;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            opacity: .6;
        }

        .card-input:hover {
            border-color: #f89406;
            opacity: .8;
        }

        .card-rb:checked + .card-input {
            border-color: #f89406;
            opacity: 1;
        }

        .card-input .card-img-overlay {
            background: rgba(0, 0, 0, 0.4);
            font-size: 2rem;
            opacity: 0;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }

        .card-input a:hover .card-img-overlay {
            opacity: 1;
            color: #fff;
        }

        .card-input img {
            width: 128px;
            height: 100%;
        }

        .card-input .card-title {
            font-weight: 600 !important;
            font-size: 15px;
            text-transform: none !important;
        }

        .card-input .card-text {
            font-weight: 500;
            line-height: unset !important;
        }

        .file-input > * {
            text-transform: none;
        }

        .file-input .button-3d {
            height: 38px;
        }

        .modal-footer button {
            margin: 0;
            padding: 10px 0;
            border-radius: 0 0 4px 4px;
            font-weight: 600;
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{$bio->background == "" ? asset('images/banner/users.jpg') :
             asset('storage/users/background/'.$bio->background)}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{__('lang.header.cart')}}</h1>
            <span>{{__('lang.cart.capt')}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">{{__('lang.breadcrumb.account')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('lang.header.cart')}}</li>
            </ol>
        </div>
    </section>

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <form id="form-pembayaran" class="row" method="POST" action="#">
                    @csrf
                    <div class="postcontent mb-0 pb-0 clearfix">
                        <div class="myCard mb-4">
                            <div class="card-content">
                                <div class="card-title">
                                    <h4 class="text-center"
                                        style="color: #f89406">{{__('lang.cart.order.head')}}</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        {{__('lang.cart.order.capt')}}</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    @if(count($carts) > 0)
                                        <div class="component-accordion">
                                            <div class="panel-group" id="accordion" role="tablist">
                                                @foreach($carts as $monthYear => $archive)
                                                    @php $a++; $b++; $c++; $d++; $e++; @endphp
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading-{{$a}}">
                                                            <h4 class="panel-title">
                                                                <a role="button" data-toggle="collapse"
                                                                   href="#collapse-{{$b}}" aria-expanded="false"
                                                                   aria-controls="collapse-{{$c}}" class="collapsed">
                                                                    {{$monthYear}}
                                                                    <b>Rp{{number_format($archive->pluck('total')->sum(), 2,',','.') . ' ('.__('lang.cart.order.product', ['qty' => count($archive), 's' => count($archive) > 1 ? 's' : null]).')'}}</b>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-{{$d}}" class="panel-collapse collapse"
                                                             role="tabpanel" aria-labelledby="heading-{{$e}}"
                                                             aria-expanded="false" style="height: 0;"
                                                             data-parent="#accordion">
                                                            <div class="panel-body">
                                                                @foreach($archive as $row)
                                                                    @php
                                                                        $data = !is_null($row->subkategori_id) ? $row->getSubKategori : $row->getCluster;
                                                                        $subtotal += ($row->total - $row->ongkir);
                                                                        $ongkir += $row->ongkir;
                                                                        $image = !is_null($row->subkategori_id) ?
                                                                        asset('storage/products/banner/'.$row->getSubKategori->banner) :
                                                                        asset('storage/products/thumb/'.$row->getCluster->thumbnail);
                                                                        $specs = !is_null($row->subkategori_id) ? $data->getSubkatSpecs : $data->getClusterSpecs;
                                                                        if(strpos($row->delivery_duration, '+')) {
                                                                            $etd = '&ge; '. str_replace('+','',$row->delivery_duration) .' '.__(__('lang.product.form.summary.day', ['s' => 's']));
                                                                            $received = str_replace('+','',$row->delivery_duration);
                                                                        } else {
                                                                            if($row->delivery_duration == '1-1') {
                                                                                $etd = '&le; 1 ' . __(__('lang.product.form.summary.day', ['s' => null]));
                                                                            } else {
                                                                                $etd = str_replace('-', ' – ',$row->delivery_duration) . ' ' . __('lang.product.form.summary.day', ['s' => 's']);
                                                                            }
                                                                            $received = substr($row->delivery_duration,-1);
                                                                        }
                                                                    @endphp
                                                                    <div class="media">
                                                                        <div data-placement="bottom"
                                                                             class="content-area align-self-center"
                                                                             data-toggle="tooltip"
                                                                             title="{{__('lang.tooltip.edit-design')}}"
                                                                             style="cursor: pointer"
                                                                             onclick="editDesign('{{route('user.edit-design.cart', ['id' => $row->id])}}',
                                                                                 '{{route('user.update-order.cart', ['id' => $row->id])}}')">
                                                                            <img alt="ico" width="150" src="{{$image}}">
                                                                            <div class="custom-overlay">
                                                                                <div class="custom-text">
                                                                                    <i class="icon-edit icon-2x"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="ml-3 media-body">
                                                                            <h5 class="mt-3 mb-1">
                                                                                <i class="icon-drafting-compass mr-1"></i>
                                                                                {{$data->name}}
                                                                                <i class="i-plain i-small icon-line2-note ml-1"
                                                                                   data-toggle="tooltip"
                                                                                   data-placement="right"
                                                                                   title="{{__('lang.tooltip.note')}}"
                                                                                   style="cursor: pointer;float: none"
                                                                                   onclick="manageNote('{{$row->note}}','{{$data->name}}',
                                                                                       '{{route('user.update-order.cart', ['id' => $row->id])}}',
                                                                                       '{{route('user.delete-note.cart', ['id' => $row->id])}}')"></i>
                                                                                <span class="fright">
                                                                                    <a style="color: #f89406;cursor: pointer;"
                                                                                       href="{{route('produk', ['produk' => $data->permalink, 'cart_id' => encrypt($row->id)])}}">
                                                                                        {{__('lang.button.edit')}}
                                                                                        <i class="icon-edit ml-1"></i>
                                                                                    </a>
                                                                                    <small style="color: #7f7f7f">&nbsp;&#124;&nbsp;</small>
                                                                                    <a class="delete-data"
                                                                                       style="color: #dc3545;cursor: pointer;"
                                                                                       href="{{route('produk.delete.pemesanan', ['produk' => $data->permalink, 'id' => encrypt($row->id)])}}">
                                                                                        <i class="icon-eraser mr-1"></i>
                                                                                        {{__('lang.button.delete')}}
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
                                                                                                <b class="fright">{{$row->qty.' '.$specs->getUnit->name}}</b>
                                                                                            </li>
                                                                                            <li class="list-group-item noborder">
                                                                                                {{__('lang.product.form.summary.price', ['unit' => strtok($specs->getUnit->name, '(')])}}
                                                                                                <b class="fright">Rp{{number_format($row->price_pcs,2,',','.')}}</b>
                                                                                            </li>
                                                                                            <li class="list-group-item noborder">
                                                                                                {{__('lang.product.form.summary.production')}}
                                                                                                <b class="fright">{{now()->addDays(3)->formatLocalized('%d %b %Y')}}</b>
                                                                                            </li>
                                                                                            <li class="list-group-item noborder">
                                                                                                {{__('lang.product.form.summary.ongkir')}}
                                                                                                <b class="fright">Rp{{number_format($row->ongkir,2,',','.')}}</b>
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
                                                                                                   style="font-size: large">Rp{{number_format($row->total,2,',','.')}}</b>
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
                                                                                        <table
                                                                                            style="margin: 0;font-size: 14px;">
                                                                                            <tbody
                                                                                                class="font-weight-bold">
                                                                                            @if($specs->is_type == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.type')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\TypeProduct::find($row->type_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_material_cover == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.cover_material')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Material::find($row->material_cover_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_side_cover == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.cover_side')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Side::find($row->side_cover_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_cover_lamination == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.cover_lamination')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Lamination::find($row->cover_lamination_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_material == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.materials')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Material::find($row->material_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_material_color == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.material_color')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Colors::find($row->material_color_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_color == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.color')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Colors::find($row->color_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_print_method == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.print_method')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\PrintingMethods::find($row->print_method_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_size == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.size')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Size::find($row->size_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_side == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.side')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Side::find($row->side_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_holder == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.holder')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Finishing::find($row->holder_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_lid == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.lid')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Lid::find($row->lid_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_edge == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.corner')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Edge::find($row->edge_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_folding == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.folding')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Folding::find($row->folding_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_front_side == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.front_side')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Front::find($row->front_side_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_back_side == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.back_side')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\BackSide::find($row->back_side_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_right_side == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.right_side')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\RightLeftSide::find($row->right_side_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_left_side == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.left_side')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\RightLeftSide::find($row->left_side_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_balance == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.balance')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Balance::find($row->balance_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_copies == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.copies')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Copies::find($row->copies_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_page == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.page')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Pages::find($row->page_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_front_cover == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.front_cover')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Material::find($row->front_cover_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_back_cover == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.back_cover')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Material::find($row->back_cover_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_orientation == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.orientation')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Finishing::find($row->orientation_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_binding == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.binding')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Finishing::find($row->binding_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_lamination == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.lamination')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Lamination::find($row->lamination_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_finishing == true)
                                                                                                <tr>
                                                                                                    <td>Finishing</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Finishing::find($row->finishing_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            @if($specs->is_extra == true)
                                                                                                <tr>
                                                                                                    <td>{{__('lang.product.form.summary.extra')}}</td>
                                                                                                    <td>:&nbsp;</td>
                                                                                                    <td>{{\App\Models\Finishing::find($row->extra_id)->name}}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="toggle toggle-border {{$row->note != "" ? 'mb-3' : 'mb-0'}}">
                                                                                    <div
                                                                                        class="togglet toggleta font-weight-normal text-uppercase">
                                                                                        <i class="toggle-closed icon-chevron-down1"></i>
                                                                                        <i class="toggle-open icon-chevron-up1"></i>
                                                                                        {{__('lang.product.form.shipping.head')}}
                                                                                    </div>
                                                                                    <div class="togglec">
                                                                                        <div class="media">
                                                                                            <div
                                                                                                class="align-self-center ml-3">
                                                                                                <img alt="icon"
                                                                                                     width="80"
                                                                                                     src="{{asset('images/icons/occupancy/'.$row->getAddress->getOccupancy->image)}}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="ml-3 media-body">
                                                                                                <h5 class="mt-3 mb-1">
                                                                                                    <i class="icon-building mr-1"></i>{{$row->getAddress->getOccupancy->name}}
                                                                                                    {!! $row->getAddress->is_main == false ? '' : '<span style="font-weight: 500;color: unset">['.__('lang.profile.main-address').']</span>'!!}
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
                                                                                                            <td>&nbsp;
                                                                                                            </td>
                                                                                                            <td>{{$row->getAddress->name}}</td>
                                                                                                        </tr>
                                                                                                        <tr data-toggle="tooltip"
                                                                                                            data-placement="left"
                                                                                                            title="{{__('lang.footer.phone')}}">
                                                                                                            <td>
                                                                                                                <i class="icon-phone"></i>
                                                                                                            </td>
                                                                                                            <td>&nbsp;
                                                                                                            </td>
                                                                                                            <td>{{$row->getAddress->phone}}</td>
                                                                                                        </tr>
                                                                                                        <tr data-toggle="tooltip"
                                                                                                            data-placement="left"
                                                                                                            title="{{__('lang.profile.city')}}">
                                                                                                            <td>
                                                                                                                <i class="icon-city"></i>
                                                                                                            </td>
                                                                                                            <td>&nbsp;
                                                                                                            </td>
                                                                                                            <td>{{$row->getAddress->getCity->getProvince->name.', '.$row->getAddress->getCity->name}}</td>
                                                                                                        </tr>
                                                                                                        <tr data-toggle="tooltip"
                                                                                                            data-placement="left"
                                                                                                            title="{{__('lang.profile.address')}}">
                                                                                                            <td>
                                                                                                                <i class="icon-map-marker-alt"></i>
                                                                                                            </td>
                                                                                                            <td>&nbsp;
                                                                                                            </td>
                                                                                                            <td>{{$row->getAddress->address.' - '.$row->getAddress->postal_code}}</td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </blockquote>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                @if($row->note != "")
                                                                                    <div
                                                                                        class="toggle toggle-border mb-0">
                                                                                        <div
                                                                                            class="togglet toggleta font-weight-normal text-uppercase">
                                                                                            <i class="toggle-closed icon-chevron-down1"></i>
                                                                                            <i class="toggle-open icon-chevron-up1"></i>
                                                                                            {{__('lang.tooltip.note')}}
                                                                                        </div>
                                                                                        <div class="togglec">
                                                                                            <p class="m-0"
                                                                                               align="justify">
                                                                                                {{$row->note}}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </blockquote>
                                                                        </div>
                                                                    </div>
                                                                    <div class="divider mt-1 mb-2">
                                                                        <i class="icon-circle"></i>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <div class="row justify-content-center text-center">
                                            <div class="col">
                                                <img width="300" class="img-fluid"
                                                     src="{{asset('images/loader-image.gif')}}" alt="">
                                                <h3 class="mt-0 mb-1" style="text-transform: none">
                                                    {{__('lang.order.empty-head')}}</h3>
                                                <h4 class="mt-0 mb-3" style="text-transform: none">
                                                    {{__('lang.order.empty-capt')}}</h4>
                                                <a href="{{route('beranda')}}"
                                                   class="button button-rounded button-reveal button-border button-primary tright mb-3">
                                                    <i class="icon-angle-right"></i><span>{{__('lang.button.shop')}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="myCard">
                            <div class="card-content">
                                <div class="card-title" style="text-transform: none">
                                    <h4 class="text-center" style="color: #f89406">
                                        {{__('lang.cart.billing.head')}}</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        {{__('lang.cart.billing.capt')}}</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    <div class="component-accordion">
                                        @include('layouts.partials.users._shippingForm')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar sticky-sidebar-wrap col_last nobottommargin clearfix">
                        <div class="sidebar-widgets-wrap">
                            <div class="sticky-sidebar">
                                <div class="myCard">
                                    <div class="card-content pb-0">
                                        <div class="card-title m-0">
                                            <h4 class="text-center"
                                                style="color: #f89406">{{__('lang.product.form.summary.head')}}</h4>
                                            <h5 class="text-center mb-2" style="text-transform: none">
                                                {{__('lang.product.form.summary.capt')}}</h5>
                                            <div class="divider divider-center mt-1 mb-2"><i class="icon-circle"></i>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col">
                                                    <small>{{__('lang.cart.summary.promo')}}</small>
                                                    <div class="input-group">
                                                        <input id="promo_code" type="text" class="form-control"
                                                               name="promo_code"
                                                               placeholder="{{__('lang.placeholder.promo')}}"
                                                            {{count($carts) > 0 ? '' : 'disabled'}}>
                                                        <div class="input-group-append">
                                                            <button id="btn_set" class="btn btn-primary"
                                                                    type="button" disabled>SET
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <span id="error_promo" class="invalid-feedback">
                                                        <b style="text-transform: none"></b>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <div class="css3-spinner" style="z-index: 1;top: 4em;display: none">
                                            <div class="css3-spinner-bounce1"></div>
                                            <div class="css3-spinner-bounce2"></div>
                                            <div class="css3-spinner-bounce3"></div>
                                        </div>
                                        <li class="list-group-item noborder">
                                            Subtotal
                                            ({{__('lang.cart.order.product', ['qty' => count($carts), 's' =>
                                            count($carts) > 1 ? 's' : null])}})
                                            <b class="fright">
                                                {!! count($carts) > 0 ? 'Rp'.number_format($subtotal,2,',','.') : '&ndash;' !!}
                                            </b>
                                        </li>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.ongkir')}}
                                            <b class="fright">
                                                {!! count($carts) > 0 ? 'Rp'.number_format($ongkir,2,',','.') : '&ndash;' !!}
                                            </b>
                                        </li>
                                        <li id="discount" class="list-group-item noborder" style="display: none">
                                            {{__('lang.cart.summary.discount')}}
                                            <i class="i-plain i-small icon-trash2" data-toggle="tooltip"
                                               data-placement="right" title="{{__('lang.button.delete')}}"
                                               style="cursor:pointer;float:none"></i>
                                            <b class="fright"></b>
                                        </li>
                                    </ul>
                                    <div class="card-content pt-0 pb-0">
                                        <div class="divider divider-right mt-0 mb-0"><i class="icon-plus-sign"></i>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item noborder">
                                            TOTAL<b class="fright show-total" style="font-size: large">
                                                {!!count($carts) > 0 ? 'Rp'.number_format($subtotal + $ongkir,2,',','.') : '&ndash;'!!}</b>
                                        </li>
                                    </ul>
                                    <div class="card-footer p-0">
                                        <button id="btn_pay" type="button" disabled
                                                class="btn btn-primary btn-block text-uppercase text-left noborder">
                                            CHECKOUT <i class="icon-chevron-right fright"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form id="form-design" action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div id="modal_upload" class="modal fade" tabindex="-1" role="dialog"
                         aria-labelledby="modal_upload" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-body">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{__('lang.modal.upload-design.head')}}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label class="card-label mb-3" for="um-upload" onclick="uploadMethod()">
                                            <input id="um-upload" class="card-rb" name="upload_method" type="radio"
                                                   value="upload_file" required>
                                            <div class="card card-input">
                                                <div class="card-block p-2">
                                                    <h4 class="card-title">
                                                        {{__('lang.modal.upload-design.upload-head')}}</h4>
                                                    {!! __('lang.modal.upload-design.upload-capt') !!}
                                                    <input id="file" name="file" type="file"
                                                           accept=".jpg,.jpeg,.png,.tiff,.pdf,.zip,.rar">
                                                </div>
                                            </div>
                                        </label>
                                        <label class="card-label" for="um-link" onclick="uploadMethod()">
                                            <input id="um-link" class="card-rb" name="upload_method" type="radio">
                                            <div class="card card-input">
                                                <div class="card-block p-2">
                                                    <h4 class="card-title">{{__('lang.modal.upload-design.link-head')}}</h4>
                                                    <p class="card-text mb-0"
                                                       style="text-transform: none">{{__('lang.modal.upload-design.link-capt')}}</p>
                                                    <input id="link" placeholder="http://example.com" type="text"
                                                           class="form-control" name="link" maxlength="191"
                                                           style="display: none" disabled>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="modal-footer p-0">
                                        <button type="submit" id="btn_submit"
                                                class="btn btn-primary btn-block noborder" disabled>
                                            <i class="icon-drafting-compass mr-2"></i>{{__('lang.button.save')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form id="form-note" action="#" method="post">
                    @csrf
                    {{method_field('PUT')}}
                    <div id="modal_note" class="modal fade" tabindex="-1" role="dialog"
                         aria-labelledby="modal_note" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-body">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-capitalize"></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="note">{{strtolower(ucfirst(__('lang.tooltip.note')))}}
                                            <span class="required">*</span></label>
                                        <textarea class="sm-form-control" id="note"
                                                  name="note" placeholder="{{__('lang.placeholder.note')}}"
                                                  rows="6" cols="30" required></textarea>
                                    </div>
                                    <div class="modal-footer p-0">
                                        <button type="submit" class="btn btn-primary btn-block noborder">
                                            <i class="icon-line2-note mr-2"></i>{{__('lang.button.save')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIljHbKjgtTrpZhEiHum734tF1tolxI68&libraries=geometry,places"></script>
    <script>
        var collapse = $('.panel-collapse'), upload_input = $("#file"), link_input = $("#link"), check_file = null,
            btn_pay = $("#btn_pay");

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

            $(".panel-body .divider:last-child").remove();
        });

        function editDesign(url_edit, url_update) {
            clearTimeout(this.delay);
            this.delay = setTimeout(function () {
                $.get(url_edit, function (data) {
                    if (data.is_design == 1) {
                        $("#form-design").attr('action', '#');
                        $("#modal_upload button[type=submit]").attr('disabled', 'disabled');
                        $("#modal_design").modal('show');

                    } else {
                        if (data.link == null) {
                            $("#um-upload").prop('checked', true);
                            $("#um-link").prop('checked', false);
                            link_input.val(null);

                            upload_input.fileinput('destroy').fileinput({
                                showUpload: false,
                                showBrowse: false,
                                showCaption: true,
                                browseOnZoneClick: true,
                                showPreview: true,
                                initialPreviewAsData: true,
                                overwriteInitial: true,
                                initialPreview: data.path,
                                initialPreviewConfig: [{
                                    caption: data.file,
                                    filename: data.file,
                                    size: data.size,
                                    downloadUrl: data.path
                                }],
                                initialCaption: data.file,
                                dropZoneTitle: '{{__('lang.placeholder.drag-drop')}}',
                                dropZoneClickTitle: '{!! __('lang.placeholder.click-select') !!}',
                                removeLabel: '{{__('lang.button.delete')}}',
                                removeIcon: '<i class="icon-trash-alt mr-1"></i>',
                                removeClass: 'button button-3d button-rounded button-red w-100 m-0',
                                removeTitle: '{{__('lang.tooltip.clear-upload')}}',
                                cancelLabel: '{{__('lang.button.cancel')}}',
                                cancelIcon: '<i class="icon-line2-action-undo mr-1"></i>',
                                cancelClass: 'button button-3d button-rounded button-red w-100 m-0',
                                cancelTitle: '{{__('lang.tooltip.cancel-upload')}}',
                                allowedFileExtensions: ["jpg", "jpeg", "png", "tiff", "pdf", "zip", "rar"],
                                maxFileSize: 204800,
                                msgFileRequired: '{{__('lang.modal.upload-design.msg-required')}}',
                                msgSizeTooLarge: '{!! __('lang.modal.upload-design.msg-size') !!}',
                                msgInvalidFileExtension: '{!! __('lang.modal.upload-design.msg-extension') !!}',
                            }).on('change', function () {
                                if (!$(this).val()) {
                                    $("#modal_upload button[type=submit]").attr('disabled', 'disabled');
                                } else {
                                    $("#modal_upload button[type=submit]").removeAttr('disabled');
                                }
                            }).on('fileclear').on('fileerror', function () {
                                $("#modal_upload button[type=submit]").attr('disabled', 'disabled');
                            });

                            check_file = data.file;

                            $(".file-input .file-caption-name").attr('placeholder', '{{__('lang.placeholder.choose-file')}}')
                                .attr('disabled', 'disabled').css('cursor', 'text');

                            $(".file-input").show()
                                .parents('label').find('.card-text').hide();
                            link_input.hide().attr('disabled', 'disabled').removeAttr('required')
                                .parents('label').find('.card-text').show();

                        } else {
                            $("#um-link").prop('checked', true);
                            $("#um-upload").prop('checked', false);
                            link_input.val(data.link);

                            upload_input.fileinput();
                            upload_input.fileinput('destroy').fileinput({
                                showUpload: false,
                                showBrowse: false,
                                showCaption: true,
                                browseOnZoneClick: true,
                                showPreview: true,
                                dropZoneTitle: '{{__('lang.placeholder.drag-drop')}}',
                                dropZoneClickTitle: '{!! __('lang.placeholder.click-select') !!}',
                                removeLabel: '{{__('lang.button.delete')}}',
                                removeIcon: '<i class="icon-trash-alt mr-1"></i>',
                                removeClass: 'button button-3d button-rounded button-red w-100 m-0',
                                removeTitle: '{{__('lang.tooltip.clear-upload')}}',
                                cancelLabel: '{{__('lang.button.cancel')}}',
                                cancelIcon: '<i class="icon-line2-action-undo mr-1"></i>',
                                cancelClass: 'button button-3d button-rounded button-red w-100 m-0',
                                cancelTitle: '{{__('lang.tooltip.cancel-upload')}}',
                                allowedFileExtensions: ["jpg", "jpeg", "png", "tiff", "pdf", "zip", "rar"],
                                maxFileSize: 204800,
                                msgFileRequired: '{{__('lang.modal.upload-design.msg-required')}}',
                                msgSizeTooLarge: '{!! __('lang.modal.upload-design.msg-size') !!}',
                                msgInvalidFileExtension: '{!! __('lang.modal.upload-design.msg-extension') !!}',
                            }).on('change', function () {
                                if (!$(this).val()) {
                                    $("#modal_upload button[type=submit]").attr('disabled', 'disabled');
                                } else {
                                    $("#modal_upload button[type=submit]").removeAttr('disabled');
                                }
                            }).on('fileclear').on('fileerror', function () {
                                $("#modal_upload button[type=submit]").attr('disabled', 'disabled');
                            });

                            check_file = null;

                            $(".file-input .file-caption").removeClass('icon-visible');
                            $(".file-input .file-caption-name").attr('placeholder', '{{__('lang.placeholder.choose-file')}}')
                                .attr('disabled', 'disabled').css('cursor', 'text').removeAttr('title');

                            $(".file-input").hide()
                                .parents('label').find('.card-text').show();
                            link_input.show().attr('required', 'required').removeAttr('disabled')
                                .parents('label').find('.card-text').hide();
                        }

                        $("#form-design").attr('action', url_update);
                        $("#modal_upload button[type=submit]").removeAttr('disabled');
                        $("#modal_upload").modal('show');
                    }
                });
            }.bind(this), 800);

            return false;
        }

        function uploadMethod() {
            if ($("#um-upload").is(':checked')) {
                $(".file-input").show()
                    .parents('label').find('.card-text').hide();
                link_input.hide().attr('disabled', 'disabled').removeAttr('required')
                    .parents('label').find('.card-text').show();

                if (check_file == null) {
                    if (!upload_input.val()) {
                        $("#modal_upload button[type=submit]").attr('disabled', 'disabled');
                    } else {
                        $("#modal_upload button[type=submit]").removeAttr('disabled');
                    }
                } else {
                    $("#modal_upload button[type=submit]").removeAttr('disabled');
                }
            }

            if ($("#um-link").is(':checked')) {
                $(".file-input").hide()
                    .parents('label').find('.card-text').show();
                link_input.show().attr('required', 'required').removeAttr('disabled')
                    .parents('label').find('.card-text').hide();

                if (!link_input.val() || link_input.val() == 'http://') {
                    $("#modal_upload button[type=submit]").attr('disabled', 'disabled');
                } else {
                    $("#modal_upload button[type=submit]").removeAttr('disabled');
                }
            }
        }

        link_input.on("keyup", function () {
            var $uri = $(this).val().substr(0, 4) != 'http' ? 'http://' + $(this).val() : $(this).val();
            $(this).val($uri);

            if (!$(this).val() || $(this).val() == 'http://') {
                $("#modal_upload button[type=submit]").attr('disabled', 'disabled');
            } else {
                $("#modal_upload button[type=submit]").removeAttr('disabled');
            }
        });

        function manageNote(note, name, url_update, url_delete) {
            if (note != "") {
                swal({
                    title: '{{__('lang.tooltip.note')}}',
                    text: '{!! __('lang.alert.note') !!}',
                    icon: 'warning',
                    dangerMode: true,
                    buttons: {
                        cancel: '{{__('lang.button.cancel')}}',
                        edit: {
                            text: '{{__('lang.button.edit')}}',
                            value: 'edit',
                        },
                        delete: {
                            text: '{{__('lang.button.delete')}}',
                            value: 'delete',
                        }
                    },
                    closeOnEsc: false,
                    closeOnClickOutside: false,
                }).then((value) => {
                    if (value == 'edit') {
                        $("#form-note .modal-title").html("{{strtolower(__('lang.button.edit').' '.__('lang.tooltip.note'))}}: " +
                            "<b style='text-transform: none'>" + name + "</b>");
                        $("#form-note").attr('action', url_update);
                        $("#note").val(note);
                        $("#modal_note").modal('show');

                    } else if (value == 'delete') {
                        swal({
                            title: "{{__('lang.alert.delete-head')}}",
                            text: "{{__('lang.alert.delete-capt')}}",
                            icon: 'warning',
                            dangerMode: true,
                            buttons: ["{{__('lang.button.no')}}", "{{__('lang.button.yes')}}"],
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                        }).then((confirm) => {
                            if (confirm) {
                                swal({icon: "success", buttons: false});
                                window.location.href = url_delete;
                            }
                        });
                    } else {
                        swal.close();
                    }
                });

            } else {
                $("#form-note .modal-title").html("{{strtolower(__('lang.button.add').' '.__('lang.tooltip.note'))}}: " +
                    "<b style='text-transform: none'>" + name + "</b>");
                $("#form-note").attr('action', url_update);
                $("#note").val(null);
                $("#modal_note").modal('show');
            }
        }

        function getShipping(city, check, name) {
            $(".show-" + check).text(name);
            $('#collapse-' + check).collapse('hide');
            btn_pay.removeAttr('disabled');

            $('html,body').animate({scrollTop: $("#accordion2").parent().parent().offset().top}, 0);
        }

        $("#promo_code").on('keyup', function (e) {
            if (!$(this).val()) {
                $("#btn_set").attr('disabled', 'disabled');
            } else {
                $("#btn_set").removeAttr('disabled');
            }

            $("#promo_code").css('border-color', '#ced4da');
            $("#error_promo").hide().find('b').text(null);

            if (e.keyCode === 13) {
                $("#btn_set").click();
            }
        });

        $("#btn_set").on('click', function () {
            clearTimeout(this.delay);
            this.delay = setTimeout(function () {
                $.ajax({
                    url: "{{route('get.cari-promo.cart',['total' => $subtotal + $ongkir])}}&kode=" + $("#promo_code").val(),
                    type: "GET",
                    beforeSend: function () {
                        $('.css3-spinner').show();
                        $(".list-group-flush").css('opacity', '.3');
                    },
                    complete: function () {
                        $('.css3-spinner').hide();
                        $(".list-group-flush").css('opacity', '1');
                    },
                    success: function (data) {
                        if (data == 0) {
                            swal('{{__('lang.cart.summary.promo')}}', '{{__('lang.alert.promo')}}', 'error');
                            $("#promo_code").css('border-color', '#dc3545');
                            $("#error_promo").show().find('b').text("{{__('lang.alert.promo')}}");
                            $("#btn_set").attr('disabled', 'disabled');

                            $("#discount").hide().find('b').text(null);
                            $(".show-total").text('Rp{{number_format($subtotal + $ongkir,2,',','.')}}');
                        } else {
                            $("#promo_code").css('border-color', '#ced4da');
                            $("#error_promo").hide().find('b').text(null);
                            $("#btn_set").removeAttr('disabled');

                            $("#discount").show().find('b').text(data.discount + '%');
                            $(".show-total").text(data.str_total);
                        }
                    },
                    error: function () {
                        swal('{{__('lang.alert.error')}}', '{{__('lang.alert.error-capt')}}', 'error');
                    }
                });
            }.bind(this), 800);
        });

        $("#discount i").on("click", function () {
            swal({
                title: "{{__('lang.alert.delete-head')}}",
                text: "{{__('lang.alert.delete-capt')}}",
                icon: 'warning',
                dangerMode: true,
                buttons: ["{{__('lang.button.no')}}", "{{__('lang.button.yes')}}"],
                closeOnEsc: false,
                closeOnClickOutside: false,
            }).then((confirm) => {
                if (confirm) {
                    swal({icon: "success", buttons: false});
                    $("#discount").hide().find('b').text(null);
                    $(".show-total").text('Rp{{number_format($subtotal + $ongkir,2,',','.')}}');
                }
            });
        });

        btn_pay.on("click", function () {
            // midtrans
        });
    </script>
    @include('layouts.partials.users._scriptsAddress')
@endpush
