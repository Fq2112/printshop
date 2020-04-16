@extends('layouts.mst')
@section('title',  __('lang.product.title').$data->name.' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    <style>
        #content .postcontent {
            width: 70%;
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
                    <div class="postcontent mr-4 nobottommargin clearfix">
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
                                            {{__('lang.product.form.summary.price', ['unit' => $specs->getUnit->name])}}
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
                                            {{__('lang.button.upload')}}<i class="icon-chevron-right fright"></i>
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
                    <div id="modal_upload" class="modal fade" tabindex="-1" role="dialog"
                         aria-labelledby="modal_upload" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-body">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Modal Heading</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label>Select Multiple Items:</label><br>
                                        <input id="files" name="files[]" type="file" class="file"
                                               accept="image/*,.pdf,.zip,.rar" multiple>
                                        <div id="errorBlock" class="form-text"></div>
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
            btn_upload = $("#btn_upload"), upload_input = $("#files"),
            price_pcs = parseInt('25000'), total = 0, str_unit = ' {{$specs->getUnit->name}}';

        $(function () {
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
                        $(".show-production").text('{{now()->formatLocalized('%d %b %Y')}}');
                        $(".show-delivery").html('2 &ndash; 3 days');
                        $(".show-received").text('{{now()->addDays(3)->formatLocalized('%d %b %Y')}}');
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
                showCaption: true,
                showPreview: true,
                allowedFileTypes: ["image"],
                allowedFileExtensions: ["jpg", "jpeg", "png", "tiff", "pdf", "zip", "rar"],
                maxFileSize: 204800, //200 mb
                elErrorContainer: "#errorBlock",
            });

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
            $(".show-materials").text($("input[name='materials']:checked").val());
            $(".show-color").text($("input[name='color']:checked").val());
            $(".show-print_method").text($("input[name='print_method']:checked").val());
            $(".show-size").text($("input[name='size']:checked").val());
            $(".show-side").text($("input[name='side']:checked").val());
            $(".show-corner").text($("input[name='corner']:checked").val());
            $(".show-front_side").text($("input[name='front_side']:checked").val());
            $(".show-back_side").text($("input[name='back_side']:checked").val());
            $(".show-right_side").text($("input[name='right_side']:checked").val());
            $(".show-left_side").text($("input[name='left_side']:checked").val());
            $(".show-balance").text('Rp' + thousandSeparator($("input[name='balance']:checked").val()) + ',00');
            $(".show-copies").text($("input[name='copies']:checked").val());
            $(".show-page").text($("input[name='page']:checked").val());
            $(".show-front_cover").text($("input[name='front_cover']:checked").val());
            $(".show-back_cover").text($("input[name='back_cover']:checked").val());
            $(".show-binding").text($("input[name='binding']:checked").val());
            $(".show-lamination").text($("input[name='lamination']:checked").val());
        });

        function productSpecs(check, spec) {
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
            $(".show-" + check).text(str_spec);

            $('#collapse-' + check).collapse('toggle');
        }

        $("#city_id").on("change", function () {
            var rs = range_slider.data("ionRangeSlider");
            rs.reset();
            resetter();

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
            $("#modal_upload").modal('show');
            @elseauth('admin')
            swal('{{__('lang.alert.warning')}}', '{{__('lang.alert.feature-fail')}}', 'warning');
            @else
            openLoginModal();
            @endauth
        });
    </script>
@endpush
