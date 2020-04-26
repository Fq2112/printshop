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

        .content-area {
            cursor: pointer;
        }

        .custom-overlay {
            background: rgba(0, 0, 0, 0.4);
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
                <div class="row">
                    <div class="postcontent mb-0 pb-0 clearfix">
                        <div class="myCard">
                            <div class="card-content">
                                <div class="card-title">
                                    <h4 class="text-center"
                                        style="color: #f89406">{{__('lang.cart.order.head')}}</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        {{__('lang.cart.order.capt')}}</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    @if(count($user->getCart) > 0)
                                        <div class="component-accordion">
                                            <div class="panel-group" id="accordion" role="tablist">
                                                @foreach($carts as $monthYear => $archive)
                                                    @php $a++; $b++; $c++; $d++; $e++; $f++; @endphp
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading-{{$a}}">
                                                            <h4 class="panel-title">
                                                                <a role="button" data-toggle="collapse"
                                                                   href="#collapse-{{$b}}" aria-expanded="false"
                                                                   aria-controls="collapse-{{$c}}" class="collapsed">
                                                                    {{$monthYear}}
                                                                    <b class="show-{{$d}}"></b>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-{{$e}}" class="panel-collapse collapse"
                                                             role="tabpanel" aria-labelledby="heading-{{$f}}"
                                                             aria-expanded="false" style="height: 0;"
                                                             data-parent="#accordion">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    @foreach($archive as $row)
                                                                        @php
                                                                            $data = !is_null($row->subkategori_id) ? $row->getSubKategori : $row->getCluster;
                                                                            $subtotal += ($row->total - $row->ongkir);
                                                                            $ongkir += $row->ongkir;
                                                                            $image = !is_null($row->subkategori_id) ?
                                                                            asset('storage/products/banner/'.$row->getSubKategori->banner) :
                                                                            asset('storage/products/thumb/'.$row->getCluster->thumbnail);
                                                                            $specs = !is_null($row->subkategori_id) ? $data->getSubkatSpecs : $data->getClusterSpecs;
                                                                        @endphp
                                                                        <div class="col-12 mb-3">
                                                                            <label class="card-label"
                                                                                   for="address_{{$row->id}}">
                                                                                <input id="cart_{{$row->id}}"
                                                                                       class="card-rb"
                                                                                       type="checkbox" name="cart_id"
                                                                                       value="{{$row->id}}">
                                                                                <div class="card card-input">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-12">
                                                                                            <div class="media">
                                                                                                <div
                                                                                                    class="content-area align-self-center ml-3">
                                                                                                    <img alt="icon"
                                                                                                         width="100"
                                                                                                         src="{{$image}}">
                                                                                                    <div
                                                                                                        class="custom-overlay">
                                                                                                        <div
                                                                                                            class="custom-text">
                                                                                                            <i class="icon-zoom-in icon-flip-horizontal icon-2x"></i>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="ml-3 media-body"
                                                                                                    onclick="javascript:void(0)">
                                                                                                    <h5 class="mt-3 mb-1">
                                                                                                        <i class="icon-drafting-compass mr-1"></i>{{$data->name}}
                                                                                                    </h5>
                                                                                                    <blockquote
                                                                                                        class="mb-3"
                                                                                                        style="font-size: 14px;text-transform: none">
                                                                                                        <table
                                                                                                            style="margin: 0;font-size: 14px;">
                                                                                                            <thead>
                                                                                                            <tr>
                                                                                                                <td colspan="3"
                                                                                                                    class="font-weight-normal text-uppercase">
                                                                                                                    {{__('lang.product.form.summary.specification')}}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            </thead>
                                                                                                            @include('layouts.partials.users._summaryForm')
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
                                                            {{count($user->getCart) > 0 ? '' : 'disabled'}}>
                                                        <div class="input-group-append">
                                                            <button id="btn_apply" class="btn btn-primary"
                                                                    type="button" disabled>APPLY
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
                                            {{__('lang.cart.summary.subtotal', ['qty' => count($user->getCart), 's' => count($user->getCart) > 1 ? 's' : null])}}
                                            <b class="fright">
                                                {!! count($user->getCart) > 0 ? 'Rp'.number_format($subtotal,2,',','.') : '&ndash;' !!}
                                            </b>
                                        </li>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.ongkir')}}
                                            <b class="fright">
                                                {!! count($user->getCart) > 0 ? 'Rp'.number_format($ongkir,2,',','.') : '&ndash;' !!}
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
                                                {!!count($user->getCart) > 0 ? 'Rp'.number_format($subtotal + $ongkir,2,',','.') : '&ndash;'!!}</b>
                                        </li>
                                    </ul>
                                    <div class="card-footer p-0">
                                        <button id="btn_pay" type="button"
                                                {{count($user->getCart) > 0 ? '' : 'disabled'}}
                                                class="btn btn-primary btn-block text-uppercase text-left noborder">
                                            CHECKOUT <i class="icon-chevron-right fright"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        var collapse = $('.panel-collapse'), upload_input = $("#file"), link_input = $("#link");

        $(function () {
            upload_input.fileinput({
                showUpload: false,
                showBrowse: false,
                showCaption: true,
                browseOnZoneClick: true,
                showPreview: true,
                initialPreviewAsData: true,
                overwriteInitial: true,
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
        });

        function editDesign(is_design, file, size, link) {
            if (is_design == 1) {
                $("#modal_design").modal('show');
            } else {
                if (file != "") {
                    $("#um-upload").prop('checked', true);
                    link_input.val(null);

                    upload_input.fileinput('refresh', {
                        initialPreview: '{{asset('storage/users/order/design/'.$user->id)}}/' + file,
                        initialPreviewConfig: [
                            {
                                caption: file, filename: file, size: size,
                                downloadUrl: '{{asset('storage/users/order/design/'.$user->id)}}/' + file,
                            },
                        ],
                        initialCaption: file,
                    });

                    $(".file-input").show()
                        .parents('label').find('.card-text').hide();
                    link_input.hide().attr('disabled', 'disabled').removeAttr('required')
                        .parents('label').find('.card-text').show();
                } else {
                    $("#um-link").prop('checked', true);
                    link_input.val(link);

                    upload_input.fileinput('refresh', {
                        initialPreview: null,
                        initialPreviewConfig: [{caption: null, filename: null, downloadUrl: null, size: null}],
                        initialCaption: "{{__('lang.placeholder.choose-file')}}",
                    });

                    $(".file-input").hide()
                        .parents('label').find('.card-text').show();
                    link_input.show().attr('required', 'required').removeAttr('disabled')
                        .parents('label').find('.card-text').hide();
                }

                $("#modal_upload button[type=submit]").removeAttr('disabled');
                $("#modal_upload").modal('show');
            }
        }

        function uploadMethod() {
            if ($("#um-upload").is(':checked')) {
                $(".file-input").show()
                    .parents('label').find('.card-text').hide();
                link_input.hide().attr('disabled', 'disabled').removeAttr('required')
                    .parents('label').find('.card-text').show();

                if (!upload_input.val()) {
                    $("#modal_upload button[type=submit]").attr('disabled', 'disabled');
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

        upload_input.on('change', function () {
            if (!$(this).val()) {
                $("#modal_upload button[type=submit]").attr('disabled', 'disabled');
            } else {
                $("#modal_upload button[type=submit]").removeAttr('disabled');
            }
        });

        upload_input.on('fileclear').on('fileerror', function () {
            $("#modal_upload button[type=submit]").attr('disabled', 'disabled');
        });

        link_input.on("keyup", function () {
            var $uri = $(this).val().substr(0, 4) != 'http' ? 'http://' + $(this).val() : $(this).val();
            $(this).val($uri);

            if (!$(this).val() || $(this).val() == 'http://') {
                $("#modal_upload button[type=submit]").attr('disabled', 'disabled');
            } else {
                $("#modal_upload button[type=submit]").removeAttr('disabled');
            }
        });

        $("#promo_code").on('keyup', function (e) {
            if (!$(this).val()) {
                $("#btn_apply").attr('disabled', 'disabled');
            } else {
                $("#btn_apply").removeAttr('disabled');
            }

            $("#promo_code").css('border-color', '#ced4da');
            $("#error_promo").hide().find('b').text(null);

            if (e.keyCode === 13) {
                $("#btn_apply").click();
            }
        });

        $("#btn_apply").on('click', function () {
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
                            $("#btn_apply").attr('disabled', 'disabled');

                            $("#discount").hide().find('b').text(null);
                            $(".show-total").text('Rp{{number_format($subtotal + $ongkir,2,',','.')}}');
                        } else {
                            $("#promo_code").css('border-color', '#ced4da');
                            $("#error_promo").hide().find('b').text(null);
                            $("#btn_apply").removeAttr('disabled');

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
    </script>
@endpush
