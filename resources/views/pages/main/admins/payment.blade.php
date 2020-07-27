@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': '.__('admin.tables.blog-category').' | '.env('APP_TITLE'))
@push('styles')
    <link rel="stylesheet" href="{{asset('admins/modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('admins/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/datatables/Buttons-1.5.6/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/summernote/summernote-bs4.css')}}">
    <style>
        .fix-label-group .bootstrap-select {
            padding: 0 !important;
        }

        .bootstrap-select .dropdown-menu {
            min-width: 100% !important;
        }

        .form-control-feedback {
            position: absolute;
            top: 3em;
            right: 2em;
        }

        .modal-header {
            padding: 1rem !important;
            border-bottom: 1px solid #e9ecef !important;
        }

        .modal-footer {
            padding: 1rem !important;
            border-top: 1px solid #e9ecef !important;
        }

        label {
            width: 100%;
            font-size: 1rem;
        }

        .card-input-element + .card {
            height: calc(45px + 2 * 1rem);
            color: var(--primary);
            -webkit-box-shadow: none;
            box-shadow: none;
            border: 2px solid transparent;
            border-radius: 4px;
        }

        .card-input-element + .card:hover {
            cursor: pointer;
        }

        .card-input-element:checked + .card {
            border: 2px solid #f89406;
            -webkit-transition: border .3s;
            -o-transition: border .3s;
            transition: border .3s;
        }

        .card-input-element:checked + .card::after {
            font-family: "Font Awesome 5 Free";
            content: "\f14a";
            color: #f89406;
            font-size: 24px;
            -webkit-animation-name: fadeInCheckbox;
            animation-name: fadeInCheckbox;
            -webkit-animation-duration: .5s;
            animation-duration: .5s;
            -webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        @-webkit-keyframes fadeInCheckbox {
            from {
                opacity: 0;
                -webkit-transform: rotateZ(-20deg);
            }
            to {
                opacity: 1;
                -webkit-transform: rotateZ(0deg);
            }
        }

        @keyframes fadeInCheckbox {
            from {
                opacity: 0;
                transform: rotateZ(-20deg);
            }
            to {
                opacity: 1;
                transform: rotateZ(0deg);
            }
        }

    </style>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Order History & Status</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Order History</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route(Route::currentRouteName())}}"
                                  method="get">
                                <div class="row form-group">
                                    <div class="col-3 fix-label-group">
                                        <label for="period">Time Period</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fix-label-item" style="height: 2.25rem">
                                                    <i class="fa fa-calendar-week"></i></span>
                                            </div>
                                            <select id="period" class="form-control selectpicker" title="-- Choose --"
                                                    name="period" data-live-search="true">
                                                <option value="99999">{{strtoupper('all')}}</option>
                                                <option value="7">{{strtoupper('One Week')}}</option>
                                                <option value="30">{{strtoupper('One Month')}}</option>
                                                <option value="90">{{strtoupper('Three Months')}}</option>
                                                <option value="180">{{strtoupper('Six Months')}}</option>
                                                <option value="360">{{strtoupper('One Year')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3 fix-label-group">
                                        <label for="status">Status Payment</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                                                    <span
                                                                                        class="input-group-text fix-label-item"
                                                                                        style="height: 2.25rem">
                                                                                        <i class="fa fa-tag"></i></span>
                                            </div>
                                            <select id="status" class="form-control selectpicker" title="-- Choose --"
                                                    name="status" data-live-search="true">
                                                <option value="">{{strtoupper('all')}}</option>
                                                <option value="1">{{strtoupper('Paid')}}</option>
                                                <option value="false">{{strtoupper('Unppaid')}}</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button data-placement="right" data-toggle="tooltip"
                                                        title="Submit Filter"
                                                        type="submit" class="btn btn-warning" style="height: 2.25rem">
                                                    <i class="fa fa-filter"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="content1" class="table-responsive">
                                <table class="table table-striped" id="dt-buttons">
                                    <thead>
                                    <tr>
                                        <th class="text-center" width="10%">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="custom-control-input" id="cb-all">
                                                <label for="cb-all" class="custom-control-label">#</label>
                                            </div>
                                        </th>
                                        <th class="text-center">ID</th>
                                        <th width="15%">Code</th>
                                        <th width="15%">Customer</th>
                                        <th width="15%"> <center>Courier</center></th>
                                        <th class="text-center" width="10%">Order date</th>
                                        <th class="text-center" width="10%">Payment</th>
                                        <th class="text-center" width="10%">Shipper</th>
                                        <th width="25%" align="center">
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($data as $item)
                                        <tr>
                                            <td style="vertical-align: middle" align="center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="cb-{{$item->id}}"
                                                           class="custom-control-input dt-checkboxes">
                                                    <label for="cb-{{$item->id}}"
                                                           class="custom-control-label">{{$no++}}</label>
                                                </div>
                                            </td>
                                            <td class="text-center">ID</td>
                                            <td width="15%">{{ucfirst($item->uni_code_payment)}}</td>
                                            <td width="15%">{{$item->getUser->name}} <br>
                                            ( {{$item->getUser->getBio->phone}} )
                                            </td>
                                            <td width="15%" align="center">
                                                <img src="{{asset($item->rate_logo)}}" alt="" width="50px"> <br>
                                                {{$item->rate_name}}
                                            </td>

                                            <td class="text-center" width="10%">{{$item->updated_at}}</td>
                                            <td class="text-center" width="10%">
                                                @if($item->finish_payment == 1)
                                                    <div class="badge badge-success" data-placement="top"
                                                         data-toggle="tooltip"
                                                         title="Paid"><i class="fa fa-check"></i></div>
                                                @else
                                                    <div class="badge badge-danger" data-placement="top"
                                                         data-toggle="tooltip"
                                                         title="Unpaid"><i class="fa fa-window-close"></i></div>
                                                @endif
                                            </td>
                                            <td class="text-center" width="10%">
                                                @if($item->tracking_id == null | $item->tracking_id == "")

                                                    <div class="badge badge-danger" data-placement="top"
                                                         data-toggle="tooltip"
                                                         title="Not Connected with Shipper Yet"><i
                                                            class="fa fa-window-close"></i></div>
                                                @else
                                                    <div class="badge badge-success" data-placement="top"
                                                         data-toggle="tooltip"
                                                         title="Connected With Shipper"><i class="fa fa-check"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td width="25%" align="center">
                                                <?php
                                                $order = \App\Models\PaymentCart::where('uni_code_payment', $item->uni_code_payment)->get()
                                                ?>
                                                @if($item->finish_payment == 1)
                                                    <div class="btn-group">
                                                        @if($item->tracking_id == null)
                                                            <button type="button" class="btn btn-danger"
                                                                    data-toggle="tooltip"
                                                                    onclick="openModal('{{ucfirst($item->uni_code_payment)}}','{{route('admin.shipper.modal.create')}}','Create Data to Shipper')"
                                                                    title="Create to Shipper" data-html="true"
                                                                    data-placement="top"><i
                                                                    class="fa fa-shipping-fast"></i>
                                                            </button>
                                                        @else
                                                            @if($item->agent_id == null)
                                                            <!--button type="button" class="btn btn-primary"
                                                                        data-toggle="tooltip"
                                                                        onclick="openModal('{{ucfirst($item->uni_code_payment)}}','{{route('admin.shipper.modal.agents')}}','Get Agents')"
                                                                        title="Set Pickup Order" data-html="true"
                                                                        data-placement="top"><i
                                                                        class="fa fa-calendar"></i>
                                                                </button-->
                                                            @else
                                                            @endif
                                                        @endif

                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"><i
                                                                    class="fa fa-file-download"></i>
                                                                Download
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                 aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                   onclick="getInvoice('{{$item->getUser->id}}','{{ucfirst($item->uni_code_payment)}}')">Invoice</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                   onclick=" get_design('{{ucfirst($item->uni_code_payment)}}')">Production
                                                                    Summary</a>
                                                                <a class="dropdown-item"
                                                                   href="{{route('admin.order.shipping',['code' =>$item->uni_code_payment])}}"
                                                                   target="_blank" style="display: none">Shipping
                                                                    Label Test</a>
                                                                <?php
                                                                $file_path = storage_path('app/public/users/order/invoice/owner/prodution/' . $item->uni_code_payment . '/' . $item->uni_code_payment . '.pdf');
                                                                ?>
                                                                @if(file_exists($file_path))
                                                                    <a class="dropdown-item" href="javascript:void(0)"
                                                                       onclick="get_shipping('{{ucfirst($item->uni_code_payment)}}')">Shipping
                                                                        Label</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-primary "
                                                                style="display: none"
                                                                data-toggle="popover" data-trigger="focus"
                                                                title="{{count($order)}} Items" data-html="true"
                                                                data-placement="left" data-content='

                                                    @if(empty($order))
                                                            Nothing To Show
@else

                                                            <table>
@foreach($order as $order_item)
                                                            <tr>
                                                                <td>
@if(!empty($order_item->getCart->subkategori_id))
                                                        {{$order_item->getCart->getSubKategori->name}}

                                                        @elseif(!empty($order_item->getCart->cluster_id))
                                                        {{$order_item->getCart->getCluster->name}}
                                                        @endif
                                                            </td>
@if(empty($order_item->getCart->getOrder))
                                                        @else
                                                            <td>
@if($order_item->getCart->getOrder->progress_status == \App\Support\StatusProgress::NEW)
                                                            <span class="badge badge-danger"><span
                                                                    class="fa fa-shopping-basket"></span> New</span> <br>
@elseif($order_item->getCart->getOrder->progress_status == \App\Support\StatusProgress::START_PRODUCTION || $order_item->getCart->getOrder->progress_status == \App\Support\StatusProgress::FINISH_PRODUCTION)
                                                            <span class="badge badge-warning"><span class="fa fa-cogs"></span> On Produce</span> <br>
@elseif($order_item->getCart->getOrder->progress_status == \App\Support\StatusProgress::SHIPPING)
                                                            <span class="badge badge-info"><span
                                                                    class="fa fa-shipping-fast"></span>  Shipping</span> <br>
@elseif($order_item->getCart->getOrder->progress_status == \App\Support\StatusProgress::RECEIVED)
                                                            <span class="badge badge-success"><span
                                                                    class="fa fa-clipboard-check"></span>  Received</span> <br>
@endif
                                                            </td>
@endif
                                                            </tr>
@endforeach
                                                            </table>

@endif
                                                            '>
                                                            <i class="fa fa-tag"></i>
                                                        </button>

                                                        <a href="{{route('admin.order.user',['kode'=>$item->uni_code_payment])}}"
                                                           data-placement="right" data-toggle="tooltip"
                                                           title="Detail Info" type="button" class="btn btn-info">
                                                            <i class="fa fa-info-circle"></i></a>
                                                    </div>
                                                @else
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger"
                                                                data-toggle="tooltip"
                                                                onclick="getInvoice('{{$item->getUser->id}}','{{ucfirst($item->uni_code_payment)}}')"
                                                                title="Download Invoice" data-html="true"
                                                                data-placement="top"><i class="fa fa-file-pdf"></i>
                                                        </button>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <form method="post" id="form-mass">
                                    {{csrf_field()}}
                                    <input type="hidden" name="category_ids">
                                </form>
                                <form method="post" id="form-mass">
                                    {{csrf_field()}}
                                    <input type="hidden" name="post_ids">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@push("scripts")
    <script src="{{asset('admins/modules/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('admins/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admins/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('admins/modules/datatables/Buttons-1.5.6/js/buttons.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/modules/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admins/modules/summernote/summernote-bs4.js')}}"></script>
    <script>
        $(function () {
            var export_filename = 'Blog Categories Table ({{now()->format('j F Y')}})',
                table = $("#dt-buttons").DataTable({
                    dom: "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-5'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    columnDefs: [
                        {sortable: false, targets: 6},
                        {targets: 1, visible: false, searchable: false}
                    ],
                    buttons: [
                        {
                            text: '<strong class="text-uppercase"><i class="far fa-clipboard mr-2"></i>Copy</strong>',
                            extend: 'copy',
                            exportOptions: {
                                columns: [0, 2, 3, 4]
                            },
                            className: 'btn btn-warning assets-export-btn export-copy ttip'
                        }, {
                            text: '<strong class="text-uppercase"><i class="far fa-file-excel mr-2"></i>Excel</strong>',
                            extend: 'excel',
                            exportOptions: {
                                columns: [0, 2, 3, 4]
                            },
                            className: 'btn btn-success assets-export-btn export-xls ttip',
                            title: export_filename,
                            extension: '.xls'
                        }, {
                            text: '<strong class="text-uppercase"><i class="fa fa-print mr-2"></i>Print</strong>',
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 2, 3, 4]
                            },
                            className: 'btn btn-info assets-select-btn export-print'
                        },
                        // {
                        //     text: '<strong class="text-uppercase"><i class="fa fa-trash-alt mr-2"></i>Deletes</strong>',
                        //     className: 'btn btn-danger btn_massDelete'
                        // }
                    ],
                    fnDrawCallback: function (oSettings) {
                        $('.use-nicescroll').getNiceScroll().resize();
                        $('[data-toggle="tooltip"]').tooltip();
                        $('[data-toggle="popover"]').popover();

                        $("#cb-all").on('click', function () {
                            if ($(this).is(":checked")) {
                                $("#dt-buttons tbody tr").addClass("terpilih")
                                    .find('.dt-checkboxes').prop("checked", true).trigger('change');
                            } else {
                                $("#dt-buttons tbody tr").removeClass("terpilih")
                                    .find('.dt-checkboxes').prop("checked", false).trigger('change');
                            }
                        });

                        $("#dt-buttons tbody tr").on("click", function () {
                            $(this).toggleClass("terpilih");
                            if ($(this).hasClass('terpilih')) {
                                $(this).find('.dt-checkboxes').prop("checked", true).trigger('change');
                            } else {
                                $(this).find('.dt-checkboxes').prop("checked", false).trigger('change');
                            }
                        });

                        $('.dt-checkboxes').on('click', function () {
                            if ($(this).is(':checked')) {
                                $(this).parent().parent().parent().addClass("terpilih");
                            } else {
                                $(this).parent().parent().parent().removeClass("terpilih");
                            }
                        });

                        $('.btn_massDelete').on("click", function () {
                            var ids = $.map(table.rows('.terpilih').data(), function (item) {
                                return item[1]
                            });
                            $("#form-mass input[name=category_ids]").val(ids);
                            $("#form-mass").attr("action", "{{route('massDelete.blog.categories')}}");

                            if (ids.length > 0) {
                                swal({
                                    title: 'Delete Blog Categories',
                                    text: 'Are you sure to delete this ' + ids.length + ' selected record(s)? ' +
                                        'You won\'t be able to revert this!',
                                    icon: 'warning',
                                    dangerMode: true,
                                    buttons: ["No", "Yes"],
                                    closeOnEsc: false,
                                    closeOnClickOutside: false,
                                }).then((confirm) => {
                                    if (confirm) {
                                        swal({icon: "success", buttons: false});
                                        $("#form-mass")[0].submit();
                                    }
                                });
                            } else {
                                $("#cb-all").prop("checked", false).trigger('change');
                                swal("Error!", "There's no any selected record!", "error");
                            }
                        });
                    },
                });
        });

        function openModal(code, url_action, title) {
            console.log(code);
            $.post(url_action, {
                    _token: '{{csrf_token()}}',
                    code: code
                },
                function (data) {
                    $('#customModalbody').html(data);
                });
            $('#payment_code').val(code);
            $('#customModalTitle').text(title);
            $('#customModal').modal({backdrop: 'static', keyboard: false})
        }

        function getPhoneAgent(phone, name) {
            $("#agent_name").val(name);
            $("#agent_phone").val(phone);
        }

        function getInvoice(user_id, code) {
            $.ajax({
                type: 'post',
                url: '{{route('admin.order.invoice.download')}}',
                data: {
                    _token: '{{csrf_token()}}',
                    code: code,
                    user_id: user_id
                },
                success: function (data) {
                    // swal('Success', "Plesae Wait Till Page Succesfully Realoded", 'success');
                    // setTimeout(
                    //     function () {
                    //         location.reload();
                    //     }, 5000);
                }, error: function (xhr, ajaxOptions, thrownError) {
                    if (xhr.status == 404) {
                        console.log(xhr);
                        swal('Error', xhr.responseJSON.message, 'error');
                    }
                }
            });
        }

        function get_shipping(code) {
            $.ajax({
                type: 'get',
                url: '{{route('admin.order.shipping')}}',
                data: {
                    code: code,
                },
                success: function (data) {
                    // swal('Success', "Plesae Wait Till Page Succesfully Realoded", 'success');
                    // setTimeout(
                    //     function () {
                    //         location.reload();
                    //     }, 5000);
                }, error: function (xhr, ajaxOptions, thrownError) {
                    if (xhr.status == 404) {
                        console.log(xhr);
                        swal('Error', xhr.responseJSON.message, 'error');
                    }
                }
            });
        }

        @if(request()->has('period'))
        $('#period').val('{{ request()->get('period') }}');
        @endif

        @if(request()->has('status'))
        $('#status').val('{{ request()->get('status') }}');
        @endif

        $("#btn_create").on('click', function () {
            $("#content1").toggle(300);
            $("#content2").toggle(300);
            $(this).toggleClass('btn-primary btn-outline-primary');
            $("#btn_create strong").html(function (i, v) {
                return v === '<i class="fas fa-plus mr-2"></i>Create' ?
                    '<i class="fas fa-th-list mr-2"></i>View' : '<i class="fas fa-plus mr-2"></i>Create';
            });

            $(".fix-label-group .bootstrap-select").addClass('p-0');
            $(".fix-label-group .bootstrap-select button").css('border-color', '#e4e6fc');

            $("#form-blogPost").attr('action', '{{route('add.promo')}}');
            $("#form-blogPost input[name=_method], #form-blogPost input[name=id], #form-blogPost input[name=admin_id], #title").val('');
            $(".input-files").show();
            $("#form-blogPost button[type=submit]").text('Submit');
            $("#category_id").val('default').selectpicker('refresh');
            $('#_content').summernote('code', '');
            $("#thumbnail").attr('required', 'required');
            $("#txt_thumbnail, #txt_photo").text('Choose File');
            $("#count_files").text('Allowed extension: jpg, jpeg, gif, png. Allowed size: < 5 MB');
            $("#name_en").val("");
            $("#name_id").val("");
            $("#price").val("");
            $('#_content_en').summernote('code', "");
            $('#_content_id').summernote('code', "");
        });

        function get_design(code) {
            $.ajax({
                type: 'post',
                url: '{{route('admin.order.production.pdf')}}',
                data: {
                    _token: '{{csrf_token()}}',
                    code: code
                },
                success: function (data) {

                    setTimeout(
                        function () {
                            $.ajax({ //Download File from above
                                type: 'post',
                                url: '{{route('admin.order.production.download')}}',
                                data: {
                                    _token: '{{csrf_token()}}',
                                    code: code
                                },
                                success: function (data) {
                                    console.log('downloaded')
                                }
                            });
                        }, 1000);


                    swal('Success', "Plesae Wait Till Page Succesfully Realoded", 'success');
                    setTimeout(
                        function () {
                            location.reload();
                        }, 5000);


                }, error: function (xhr, ajaxOptions, thrownError) {
                    if (xhr.status == 500) {
                        console.log(xhr);
                        swal('Error', xhr.responseJSON.error, 'error');
                    }
                }
            });
        }

        function set_end_date(value) {

            $('#end-date').attr({
                "min": value
            });
        }


        // $("#start-date").datepicker({
        //     format: "yyyy-mm-dd", todayHighlight: true, todayBtn: true,
        // }).on('changeDate', function (selected) {
        //
        //     var minDate = new Date(selected.date);
        //     console.log(selected.toString());
        //     $("#end-date").attr({
        //         "min" : "2020-05-12"
        //     })
        //     // $('#end-date input').datepicker({
        //     //     format: "yyyy-mm-dd",    todayHighlight: true, todayBtn: true,
        //     //     startDate: minDate,
        //     // });
        // });

        function createBlogCategory() {
            $("#blogCategoryModal").modal('show');
        }

        function editBlogCategory(id, name, name_id, caption) {
            $("#blogCategoryModal .modal-title").text('Edit Form');
            $("#form-blogCategory").attr('action', '{{route('update.balance')}}');
            $("#form-blogCategory input[name=_method]").val('PUT');
            $("#form-blogCategory input[name=id]").val(id);
            $("#form-blogCategory button[type=submit]").text('Save Changes');
            $('#_content').summernote('code', caption);
            $("#name").val(name);
            $("#name_id").val(name_id);
            $("#blogCategoryModal").modal('show');
        }

        function editBlogPost(id, url) {
            $("#content1").toggle(300);
            $("#content2").toggle(300);
            $("#btn_create").toggleClass('btn-primary btn-outline-primary');
            $("#btn_create strong").html(function (i, v) {
                return v === '<i class="fas fa-plus mr-2"></i>Create' ?
                    '<i class="fas fa-th-list mr-2"></i>View' : '<i class="fas fa-plus mr-2"></i>Create';
            });

            $(".fix-label-group .bootstrap-select").addClass('p-0');
            $(".fix-label-group .bootstrap-select button").css('border-color', '#e4e6fc');

            $("#form-blogPost").attr('action', '{{route('update.promo')}}');
            $("#form-blogPost input[name=_method]").val('PUT');
            $("#form-blogPost input[name=id]").val(id);
            $(".input-files").hide();
            $("#form-blogPost button[type=submit]").text('Save Changes');

            $.get(url, function (data) {
                // console.log(data.name.id);
                $("#form-blogPost input[name=admin_id]").val(data.admin_id);
                $("#promo_code").val(data.promo_code);
                $("#discount").val(data.discount);
                $("#price").val(data.price);
                $("#start-date").val(data.start);
                $("#end-date").attr({
                    "min": data.start,
                    "value": data.end
                });
                $('#description').summernote('code', data.description);

            }).fail(function () {
                swal("Error!", "There's no any selected record!", "error");
            });
        }

        function show_swal_reset(id) {
            swal({
                title: 'Reset Password',
                text: 'Are you sure want to reset this users password? ' +
                    'Password will be set same with username',
                icon: 'warning',
                dangerMode: true,
                buttons: ["No", "Yes"],
                closeOnEsc: false,
                closeOnClickOutside: false,
            }).then((confirm) => {
                if (confirm) {
                    swal({icon: "success", buttons: false});
                    document.getElementById('update_form_' + id).submit();
                }
            });
        }
    </script>
@endpush
