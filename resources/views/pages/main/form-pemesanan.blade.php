@extends('layouts.mst')
@section('title',  __('lang.product.title').$data->name.' | '.__('lang.title'))
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

        #content .sidebar .button {
            width: 100%;
            margin: 0;
            padding: {{$app->isLocale('en') ? '.5em' : '.5em 0'}};
            text-transform: none;
            font-size: 18px;
            background-color: #fff;
            border-color: transparent;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }

        #content .sidebar .button:hover {
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        #content .sidebar .button table {
            width: 100%;
            margin: 0;
            padding: 0;
            border-collapse: separate;
            border-spacing: {{$app->isLocale('en') ? '1.1em' : '1.1rem'}} 0;
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

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <form id="form-pemesanan" class="row" method="POST" enctype="multipart/form-data"
                      action="{{route('produk.submit.pemesanan', ['produk' => $data->permalink])}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="postcontent mb-0 pb-0 clearfix">
                        <div class="myCard mb-4">
                            <div class="card-content">
                                <div class="card-title">
                                    <h4 class="text-center" style="color: #f89406">{{__('lang.product.form.head')}}</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        {{__('lang.product.form.capt')}}</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    <div class="component-accordion">
                                        @include('layouts.partials.users._specsForm')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="myCard mb-4">
                            <div class="card-content">
                                <div class="card-title" style="text-transform: none">
                                    <h4 class="text-center"
                                        style="color: #f89406">{{__('lang.product.form.quantity.head')}}</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        {{__('lang.product.form.quantity.capt')}}</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <small>{{__('lang.product.form.summary.quantity')}}
                                                <span class="required">*</span></small>
                                            <input id="range-quantity" name="qty" class="input-range-slider">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="card-shipping" class="myCard" style="display: none">
                            <div class="card-content">
                                <div class="card-title" style="text-transform: none">
                                    <h4 class="text-center" style="color: #f89406">
                                        {{__('lang.product.form.shipping.head')}}</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        {{__('lang.product.form.shipping.capt')}}</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    <div class="component-accordion">
                                        <div class="panel-group" id="accordion2" role="tablist">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="heading-address">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse"
                                                           href="#collapse-address" aria-expanded="false"
                                                           aria-controls="collapse-address" class="collapsed">
                                                            {{__('lang.profile.address-head')}}
                                                            <b class="show-address"></b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-address" class="panel-collapse collapse"
                                                     role="tabpanel"
                                                     aria-labelledby="heading-address" aria-expanded="false"
                                                     style="height: 0;" data-parent="#accordion2">
                                                    <div class="panel-body">
                                                        @if(count($addresses) > 0)
                                                            <div class="row">
                                                                @foreach($addresses as $row)
                                                                    <div class="col-12 mb-3">
                                                                        <label class="card-label"
                                                                               for="address_{{$row->id}}"
                                                                               onclick="getShipping('{{$row->city_id}}',
                                                                                   'address','{{$row->is_main == false ? $row->getOccupancy->name :
                                                                                   $row->getOccupancy->name.' ['.__('lang.profile.main-address').']'}}')">
                                                                            <input id="address_{{$row->id}}"
                                                                                   class="card-rb address-rb"
                                                                                   type="radio" name="address_id"
                                                                                   value="{{$row->id}}"
                                                                                {{!is_null($shipping) && $shipping == $row->city_id ? 'checked' : ''}}>
                                                                            <div class="card card-input p-3">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="media">
                                                                                            <img
                                                                                                class="align-self-center"
                                                                                                alt="icon" width="100"
                                                                                                src="{{asset('images/icons/occupancy/'.$row->getOccupancy->image)}}">
                                                                                            <div
                                                                                                class="ml-2 media-body">
                                                                                                <h5 class="mt-0 mb-1">
                                                                                                    <i class="icon-building mr-1"></i>{{$row->getOccupancy->name}}
                                                                                                    {!! $row->is_main == false ? '' :
                                                                                                    '<span style="font-weight: 500;color: unset">['.
                                                                                                    __('lang.profile.main-address').']</span>'!!}
                                                                                                </h5>
                                                                                                <blockquote class="mb-0"
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
                                                                                                            <td>{{$row->name}}</td>
                                                                                                        </tr>
                                                                                                        <tr data-toggle="tooltip"
                                                                                                            data-placement="left"
                                                                                                            title="{{__('lang.footer.phone')}}">
                                                                                                            <td>
                                                                                                                <i class="icon-phone"></i>
                                                                                                            </td>
                                                                                                            <td>&nbsp;
                                                                                                            </td>
                                                                                                            <td>{{$row->phone}}</td>
                                                                                                        </tr>
                                                                                                        <tr data-toggle="tooltip"
                                                                                                            data-placement="left"
                                                                                                            title="{{__('lang.profile.city')}}">
                                                                                                            <td>
                                                                                                                <i class="icon-city"></i>
                                                                                                            </td>
                                                                                                            <td>&nbsp;
                                                                                                            </td>
                                                                                                            <td>{{$row->getCity->getProvince->name.
                                                                                ', '.$row->getCity->name}}</td>
                                                                                                        </tr>
                                                                                                        <tr data-toggle="tooltip"
                                                                                                            data-placement="left"
                                                                                                            title="{{__('lang.profile.address')}}">
                                                                                                            <td>
                                                                                                                <i class="icon-map-marker-alt"></i>
                                                                                                            </td>
                                                                                                            <td>&nbsp;
                                                                                                            </td>
                                                                                                            <td>{{$row->address.' - '.
                                                                                $row->postal_code}}</td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </blockquote>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <div class="row justify-content-center text-center">
                                                                <div class="col">
                                                                    <img width="256" class="img-fluid" alt="Empty"
                                                                         src="{{asset('images/loader-image.gif')}}">
                                                                    <h3 class="mt-0 mb-1">
                                                                        {{__('lang.product.form.shipping.empty-head')}}
                                                                    </h3>
                                                                    <h4 class="mt-0 mb-3" style="text-transform: none">
                                                                        {{__('lang.product.form.shipping.empty-capt')}}
                                                                    </h4>
                                                                    <button type="button"
                                                                            class="button button-rounded button-reveal button-border button-primary tright mb-4"
                                                                            onclick="@auth window.location.href='{{route('user.profil')}}' @else openLoginModal() @endauth">
                                                                        <i class="icon-angle-right"></i><span>{{__('lang.header.profile')}}</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        @auth
                                            <!-- add address -->
                                            @else
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="heading-city">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                               href="#collapse-city" aria-expanded="false"
                                                               aria-controls="collapse-city" class="collapsed">
                                                                {{__('lang.product.form.shipping.estimate')}}
                                                                <b class="show-city"></b>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse-city" class="panel-collapse collapse"
                                                         role="tabpanel"
                                                         aria-labelledby="heading-city" aria-expanded="false"
                                                         style="height: 0;" data-parent="#accordion2">
                                                        <div class="panel-body">
                                                            <div class="row form-group">
                                                                <div class="col">
                                                                    <small>{{__('lang.profile.city')}}</small>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i
                                                                                    class="icon-city"></i></span>
                                                                        </div>
                                                                        <select id="city_id" name="address_id"
                                                                                data-live-search="true"
                                                                                class="form-control selectpicker"
                                                                                title="{{__('lang.placeholder.choose')}}">
                                                                            @foreach($provinces as $province)
                                                                                <optgroup label="{{$province->name}}">
                                                                                    @foreach($province->getCity as $city)
                                                                                        <option value="{{$city->id}}"
                                                                                                data-name="{{$city->name.', '.$city->getProvince->name}}">
                                                                                            {{$city->name}}</option>
                                                                                    @endforeach
                                                                                </optgroup>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endauth
                                        </div>
                                    </div>
                                    <input id="price_pcs" type="hidden" name="price_pcs">
                                    <input id="production_finished" type="hidden" name="production_finished">
                                    <input id="ongkir" type="hidden" name="ongkir">
                                    <input id="delivery_duration" type="hidden" name="delivery_duration">
                                    <input id="received_date" type="hidden" name="received_date">
                                    <input id="total" type="hidden" name="total">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar sticky-sidebar-wrap col_last nobottommargin clearfix">
                        <div class="sidebar-widgets-wrap">
                            <div class="sticky-sidebar">
                                <div class="myCard {{$guidelines != "" ? 'mb-4' : ''}}">
                                    <div class="card-content pb-0">
                                        <div class="card-title m-0">
                                            <h4 class="text-center"
                                                style="color: #f89406">{{__('lang.product.form.summary.head')}}</h4>
                                            <h5 class="text-center mb-2" style="text-transform: none">
                                                {{__('lang.product.form.summary.capt')}}</h5>
                                            <div class="divider divider-center mt-1 mb-2"><i class="icon-circle"></i>
                                            </div>
                                            <table style="margin: 0;font-size: 14px;text-transform: none">
                                                <thead>
                                                <tr>
                                                    <td colspan="3" class="font-weight-normal text-uppercase">
                                                        {{__('lang.product.form.summary.specification')}}
                                                    </td>
                                                </tr>
                                                </thead>
                                                @include('layouts.partials.users._summaryForm')
                                            </table>
                                            <div class="divider divider-right mt-1 mb-0"><i class="icon-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <div class="css3-spinner" style="z-index: 1;top: -1rem;display: none">
                                            <div class="css3-spinner-bounce1"></div>
                                            <div class="css3-spinner-bounce2"></div>
                                            <div class="css3-spinner-bounce3"></div>
                                        </div>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.quantity')}}
                                            <b class="fright show-quantity">&ndash;</b>
                                        </li>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.price', ['unit' => strtok($specs->getUnit->name, '(')])}}
                                            <b class="fright show-price">&ndash;</b>
                                        </li>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.production')}}
                                            <b class="fright show-production">&ndash;</b>
                                        </li>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.ongkir')}}
                                            <b class="fright show-ongkir">&ndash;</b>
                                        </li>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.delivery')}}
                                            <b class="fright show-delivery">&ndash;</b>
                                        </li>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.received')}}
                                            <b class="fright show-received">&ndash;</b>
                                        </li>
                                    </ul>
                                    <div class="card-content pt-0 pb-0">
                                        <div class="divider divider-right mt-0 mb-0"><i class="icon-plus-sign"></i>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item noborder">
                                            TOTAL<b class="fright show-total" style="font-size: large">&ndash;</b>
                                        </li>
                                    </ul>
                                    <div id="summary-alert" class="card-content pb-0" style="display: none">
                                        <div class="alert alert-warning text-justify">
                                            <i class="icon-exclamation-sign"></i><b>{{__('lang.alert.warning')}}</b>
                                            {!! __('lang.product.form.summary.alert', ['quantity' => '1 '.
                                            $specs->getUnit->name, 'product' => $data->name]) !!}
                                        </div>
                                    </div>
                                    <div class="card-footer p-0">
                                        <button id="btn_upload" type="button" disabled
                                                class="btn btn-primary btn-block text-uppercase text-left noborder">
                                            {{$specs->is_design == true ? __('lang.button.create') : __('lang.button.upload')}}
                                            <i class="icon-chevron-right fright"></i>
                                        </button>
                                    </div>
                                </div>

                                @if($guidelines != "")
                                    <a class="button button-desc button-border button-primary button-rounded"
                                       href="{{asset('storage/products/guidelines/'. $guidelines)}}">
                                        <table>
                                            <tr>
                                                <td>
                                                    {{__('lang.product.form.summary.layout')}}
                                                    <span>{{__('lang.button.download')}}</span>
                                                </td>
                                                <td><i class="icon-cloud-download"></i></td>
                                            </tr>
                                        </table>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div id="modal_upload" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_upload"
                         aria-hidden="true">
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
                                                   value="upload_file" checked required>
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
                                            <input id="um-link" class="card-rb" name="upload_method" type="radio"
                                                   value="file_link">
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
                                            <i class="icon-drafting-compass mr-2"></i>{{__('lang.button.submit')}}
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
    <script>
        var collapse = $('.panel-collapse'), range_slider = $("#range-quantity"),
            btn_upload = $("#btn_upload"), upload_input = $("#file"), link_input = $("#link"),
            qty = '{{!$qty ? 0 : $qty}}', price_pcs = parseInt('25000'), str_unit = ' {{$specs->getUnit->name}}',
            production_day = 3, ongkir = 0, etd = '', str_etd = '', total = 0;

        $(function () {
            moment.locale('{{$app->getLocale()}}');

            range_slider.ionRangeSlider({
                grid: true,
                grid_num: 5,
                min: 0,
                max: 100,
                from: qty,
                postfix: str_unit,
                onChange: function (data) {
                    if (data.from > 0) {
                        total = (parseInt(data.from) * price_pcs) + ongkir;
                        $(".show-quantity").text(data.from + str_unit);
                        $(".show-price").text("Rp" + thousandSeparator(price_pcs) + ",00");
                        $(".show-production").text(moment().add(production_day, 'days').format('DD MMM YYYY'));
                        $("#price_pcs").val(price_pcs);
                        $("#production_finished").val(moment().add(production_day, 'days').format('YYYY-MM-DD'));
                        $(".show-total").text("Rp" + thousandSeparator(total) + ",00");

                        $("#card-shipping").show();

                    } else {
                        resetter();
                        $("#card-shipping").hide();
                    }
                }
            });

            upload_input.fileinput({
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
            });

            $(".file-input .file-caption-name").attr('placeholder', '{{__('lang.placeholder.choose-file')}}')
                .attr('disabled', 'disabled').css('cursor', 'text');

            collapse.on('show.bs.collapse', function () {
                $(this).siblings('.panel-heading').addClass('active');
                $(this).siblings('.panel-heading').find('a').addClass('active font-weight-bold');
                $(this).siblings('.panel-heading').find('b').toggle(300);
            });

            collapse.on('hide.bs.collapse', function () {
                $(this).siblings('.panel-heading').removeClass('active');
                $(this).siblings('.panel-heading').find('a').removeClass('active font-weight-bold');
                $(this).siblings('.panel-heading').find('b').toggle(300);
            });

            $($.unique(
                $('.component-accordion .panel-body INPUT:radio:not(.address-rb)').map(function (i, e) {
                    return $(e).attr('name')
                }).get()
            )).each(function (i, e) {
                $('.component-accordion .panel-body INPUT:radio[name="' + e + '"]:first')
                    .attr('checked', 'checked').attr('required', 'required');
            });

            $(".show-type").text($("input[name='type']:checked").data('name'));
            $(".show-cover_material").text($("input[name='cover_material']:checked").data('name'));
            $(".show-cover_side").text($("input[name='cover_side']:checked").data('name'));
            $(".show-cover_lamination").text($("input[name='cover_lamination']:checked").data('name'));
            $(".show-materials").text($("input[name='materials']:checked").data('name'));
            $(".show-material_color").text($("input[name='material_color']:checked").data('name'));
            $(".show-color").text($("input[name='color']:checked").data('name'));
            $(".show-print_method").text($("input[name='print_method']:checked").data('name'));
            $(".show-size").text($("input[name='size']:checked").data('name'));
            $(".show-side").text($("input[name='side']:checked").data('name'));
            $(".show-holder").text($("input[name='holder']:checked").data('name'));
            $(".show-lid").text($("input[name='lid']:checked").data('name'));
            $(".show-corner").text($("input[name='corner']:checked").data('name'));
            $(".show-folding").text($("input[name='folding']:checked").data('name'));
            $(".show-front_side").text($("input[name='front_side']:checked").data('name'));
            $(".show-back_side").text($("input[name='back_side']:checked").data('name'));
            $(".show-right_side").text($("input[name='right_side']:checked").data('name'));
            $(".show-left_side").text($("input[name='left_side']:checked").data('name'));
            $(".show-balance").text('Rp' + thousandSeparator($("input[name='balance']:checked").data('name')) + ',00');
            $(".show-copies").text($("input[name='copies']:checked").data('name'));
            $(".show-page").text($("input[name='page']:checked").data('name'));
            $(".show-front_cover").text($("input[name='front_cover']:checked").data('name'));
            $(".show-back_cover").text($("input[name='back_cover']:checked").data('name'));
            $(".show-orientation").text($("input[name='orientation']:checked").data('name'));
            $(".show-binding").text($("input[name='binding']:checked").data('name'));
            $(".show-lamination").text($("input[name='lamination']:checked").data('name'));
            $(".show-finishing").text($("input[name='finishing']:checked").data('name'));
            $(".show-extra").text($("input[name='extra']:checked").data('name'));

            @if(!is_null($shipping))
            @php $find = \App\Models\Address::find($shipping); @endphp
            getShipping('{{$shipping}}', 'address',
                '{{$find->is_main == false ? $find->getOccupancy->name : $find->getOccupancy->name.' ['.__('lang.profile.main-address').']'}}');
            @endif
        });

        function productSpecs(check, spec, custom) {
            var spec_val = $("#" + spec).data('name'), str_spec = '';
            resetter();
            $("#card-shipping").hide();

            if (check == 'balance') {
                var val = parseInt(spec_val);
                str_spec = 'Rp' + thousandSeparator(val) + ',00';
                if (val > 0) {
                    price_pcs += val;
                } else {
                    price_pcs = parseInt('25000');
                }
            } else {
                str_spec = spec_val;
            }

            if (custom == '1') {
                var length = $("#length"), width = $("#width");
                $("#custom_size").show();

                $("#length, #width").on("keyup", function () {
                    if (parseInt(length.val()) > 0 && parseInt(width.val()) > 0) {
                        $("#custom_size button").removeAttr('disabled');
                    } else {
                        $("#custom_size button").attr('disabled', 'disabled');
                    }
                });

                $("#custom_size button").on("click", function () {
                    $(".show-" + check).text(str_spec + " (" + length.val() + " x " + width.val() + " cm)");
                    $('#collapse-' + check).collapse('toggle');
                });

            } else if (custom == '0') {
                $("#custom_size").hide();
                $(".show-" + check).text(str_spec);
                $('#collapse-' + check).collapse('toggle')

            } else {
                $(".show-" + check).text(str_spec);
                $('#collapse-' + check).collapse('toggle');
            }
        }

        $("#city_id").on("change", function () {
            getShipping($(this).val(), 'city', $('option:selected', this).attr("data-name"));
        });

        function getShipping(city, check, name) {
            $(".show-" + check).text(name);
            $('#collapse-' + check).collapse('toggle');

            clearTimeout(this.delay);
            this.delay = setTimeout(function () {
                $.ajax({
                    url: "{{route('get.cari-pengiriman.produk')}}?destination=" + city,
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
                        $.each(data['rajaongkir']['results'][0]['costs'], function (i, val) {
                            if (val.service == 'REG' || val.service == 'CTCYES') {
                                ongkir = val.cost[0].value;
                                etd = val.cost[0].etd;
                            }
                        });

                        total += parseInt(ongkir);

                        if (etd == '1-1') {
                            str_etd = '&le; 1 {{__('lang.product.form.summary.day', ['s' => null])}}'
                        } else {
                            str_etd = etd.replace('-', ' – ') + ' {{__('lang.product.form.summary.day', ['s' => 's'])}}';
                        }

                        $(".show-ongkir").text("Rp" + thousandSeparator(ongkir) + ",00");
                        $(".show-delivery").html(str_etd);
                        $(".show-received").text(moment().add(parseInt(etd.substr(-1)) + production_day, 'days').format('DD MMM YYYY'));
                        $(".show-total").text("Rp" + thousandSeparator(total) + ",00");

                        $("#ongkir").val(ongkir);
                        $("#delivery_duration").val(etd);
                        $("#received_date").val(moment().add(parseInt(etd.substr(-1)) + production_day, 'days').format('YYYY-MM-DD'));
                        $("#total").val(total);

                        $("#summary-alert").show();
                        btn_upload.removeAttr('disabled');
                    },
                    error: function () {
                        swal('{{__('lang.alert.error')}}', '{{__('lang.alert.error-capt')}}', 'error');
                    }
                });
            }.bind(this), 800);

            return false;
        }

        function resetter() {
            range_slider.data("ionRangeSlider").update({from: 0});
            $("#card-shipping input[type=radio]").prop('checked', false);
            qty = 0;
            ongkir = 0;
            total = 0;

            $(".show-quantity").html('&ndash;');
            $(".show-price").html('&ndash;');
            $(".show-production").html('&ndash;');
            $(".show-ongkir").html('&ndash;');
            $(".show-delivery").html('&ndash;');
            $(".show-received").html('&ndash;');
            $(".show-total").html('&ndash;');

            $("#price_pcs").val(null);
            $("#production_finished").val(null);
            $("#ongkir").val(null);
            $("#delivery_duration").val(null);
            $("#received_date").val(null);
            $("#total").val(null);

            $("#summary-alert").hide();
            btn_upload.attr('disabled', 'disabled');
        }

        btn_upload.on('click', function () {
            @auth
            @if($specs->is_design == true)
            $("#modal_design").modal('show');
            @else
            $("#modal_upload").modal('show');
            @endif
            @elseauth('admin')
            swal('{{__('lang.alert.warning')}}', '{{__('lang.alert.feature-fail')}}', 'warning');
            @else
            openLoginModal();
            @endauth
        });

        function uploadMethod() {
            if ($("#um-upload").is(':checked')) {
                $(".file-input").show()
                    .parents('label').find('.card-text').hide();
                link_input.hide().attr('disabled', 'disabled').removeAttr('required')
                    .parents('label').find('.card-text').show();

                if (!upload_input.val()) {
                    $("#form-pemesanan button[type=submit]").attr('disabled', 'disabled');
                } else {
                    $("#form-pemesanan button[type=submit]").removeAttr('disabled');
                }
            }

            if ($("#um-link").is(':checked')) {
                $(".file-input").hide()
                    .parents('label').find('.card-text').show();
                link_input.show().attr('required', 'required').removeAttr('disabled')
                    .parents('label').find('.card-text').hide();

                if (!link_input.val() || link_input.val() == 'http://') {
                    $("#form-pemesanan button[type=submit]").attr('disabled', 'disabled');
                } else {
                    $("#form-pemesanan button[type=submit]").removeAttr('disabled');
                }
            }
        }

        upload_input.on('change', function () {
            if (!$(this).val()) {
                $("#form-pemesanan button[type=submit]").attr('disabled', 'disabled');
            } else {
                $("#form-pemesanan button[type=submit]").removeAttr('disabled');
            }
        });

        upload_input.on('fileclear').on('fileerror', function () {
            $("#form-pemesanan button[type=submit]").attr('disabled', 'disabled');
        });

        link_input.on("keyup", function () {
            var $uri = $(this).val().substr(0, 4) != 'http' ? 'http://' + $(this).val() : $(this).val();
            $(this).val($uri);

            if (!$(this).val() || $(this).val() == 'http://') {
                $("#form-pemesanan button[type=submit]").attr('disabled', 'disabled');
            } else {
                $("#form-pemesanan button[type=submit]").removeAttr('disabled');
            }
        });
    </script>
@endpush
