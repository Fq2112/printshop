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
                                        style="color: #f89406">{{__('lang.product.form.shipping.head')}}</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        {{__('lang.product.form.shipping.capt')}}</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <small>{{__('lang.profile.city')}} <span class="required">*</span></small>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-city"></i></span>
                                                </div>
                                                <select id="city_id" name="city_id" data-live-search="true"
                                                        class="form-control selectpicker" required
                                                        title="{{__('lang.placeholder.choose')}}">
                                                    @foreach($provinces as $province)
                                                        <optgroup label="{{$province->name}}">
                                                            @foreach($province->getCity as $city)
                                                                <option
                                                                    value="{{$city->id}}" {{!is_null($address) && $address->city_id == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
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

                        <div id="card-quantity" class="myCard" style="display: none">
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
                                            <input id="range-quantity" name="quantity" class="input-range-slider">
                                        </div>
                                    </div>
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
                                                   checked required>
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
            price_pcs = parseInt('25000'), total = 0, str_unit = ' {{$specs->getUnit->name}}',
            production_day = 3, etd = '';

        $(function () {
            moment.locale('{{$app->getLocale()}}');

            range_slider.ionRangeSlider({
                grid: true,
                grid_num: 5,
                min: 0,
                max: 100,
                from: 0,
                postfix: str_unit,
                onChange: function (data) {
                    if (data.from > 0) {
                        total = parseInt(data.from) * price_pcs;
                        $(".show-quantity").text(data.from + str_unit);
                        $(".show-price").text("Rp" + thousandSeparator(price_pcs) + ",00");
                        $(".show-production").text(moment().add(production_day, 'days').format('DD MMM YYYY'));
                        $(".show-delivery").text(etd.replace('-', ' – ') + ' {{__('lang.product.form.summary.day')}}');
                        $(".show-received").text(moment().add(parseInt(etd.substr(-1)) + production_day, 'days').format('DD MMM YYYY'));
                        $(".show-total").text("Rp" + thousandSeparator(total) + ",00");
                        $("#summary-alert").show();
                        btn_upload.removeAttr('disabled');
                    } else {
                        resetter();
                    }
                }
            });

            upload_input.fileinput({
                showUpload: false,
                showBrowse: false,
                showCaption: true,
                browseOnZoneClick: true,
                showPreview: true,
                required: true,
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
                $('.component-accordion .panel-body INPUT:radio').map(function (i, e) {
                    return $(e).attr('name')
                }).get()
            )).each(function (i, e) {
                $('.component-accordion .panel-body INPUT:radio[name="' + e + '"]:first')
                    .attr('checked', 'checked').attr('required', 'required');
            });

            $(".show-type").text($("input[name='type']:checked").val());
            $(".show-cover_material").text($("input[name='cover_material']:checked").val());
            $(".show-cover_side").text($("input[name='cover_side']:checked").val());
            $(".show-cover_lamination").text($("input[name='cover_lamination']:checked").val());
            $(".show-materials").text($("input[name='materials']:checked").val());
            $(".show-material_color").text($("input[name='material_color']:checked").val());
            $(".show-color").text($("input[name='color']:checked").val());
            $(".show-print_method").text($("input[name='print_method']:checked").val());
            $(".show-size").text($("input[name='size']:checked").val());
            $(".show-side").text($("input[name='side']:checked").val());
            $(".show-holder").text($("input[name='holder']:checked").val());
            $(".show-lid").text($("input[name='lid']:checked").val());
            $(".show-corner").text($("input[name='corner']:checked").val());
            $(".show-folding").text($("input[name='folding']:checked").val());
            $(".show-front_side").text($("input[name='front_side']:checked").val());
            $(".show-back_side").text($("input[name='back_side']:checked").val());
            $(".show-right_side").text($("input[name='right_side']:checked").val());
            $(".show-left_side").text($("input[name='left_side']:checked").val());
            $(".show-balance").text('Rp' + thousandSeparator($("input[name='balance']:checked").val()) + ',00');
            $(".show-copies").text($("input[name='copies']:checked").val());
            $(".show-page").text($("input[name='page']:checked").val());
            $(".show-front_cover").text($("input[name='front_cover']:checked").val());
            $(".show-back_cover").text($("input[name='back_cover']:checked").val());
            $(".show-orientation").text($("input[name='orientation']:checked").val());
            $(".show-binding").text($("input[name='binding']:checked").val());
            $(".show-lamination").text($("input[name='lamination']:checked").val());
            $(".show-finishing").text($("input[name='finishing']:checked").val());
            $(".show-extra").text($("input[name='extra']:checked").val());
        });

        function productSpecs(check, spec, custom) {
            var rs = range_slider.data("ionRangeSlider"), spec_val = $("#" + spec).val(), str_spec = '';
            rs.reset();
            resetter();

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
            var rs = range_slider.data("ionRangeSlider");
            rs.reset();
            resetter();

            $.get('{{route('get.cari-pengiriman.produk')}}?destination=' + $(this).val(), function (data) {
                $.each(data['rajaongkir']['results'][0]['costs'], function (i, val) {
                    if (val.service == 'REG' || val.service == 'CTCYES') {
                        etd = val.cost[0].etd;
                    }
                });
            });

            $("#card-quantity").show();
        });

        function resetter() {
            total = 0;
            $(".show-quantity").html('&ndash;');
            $(".show-price").html('&ndash;');
            $(".show-production").html('&ndash;');
            $(".show-delivery").html('&ndash;');
            $(".show-received").html('&ndash;');
            $(".show-total").html('&ndash;');
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
