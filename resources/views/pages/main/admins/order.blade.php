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
    </style>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Order #{{$code}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Order History</div>
                <div class="breadcrumb-item">#{{$code}}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.order.user',['kode'=>$code])}}"
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
                                        <label for="status">Status Order</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fix-label-item" style="height: 2.25rem">
                                                    <i class="fa fa-tag"></i></span>
                                            </div>
                                            <select id="status" class="form-control selectpicker" title="-- Choose --"
                                                    name="status" data-live-search="true">
                                                <option value="">{{strtoupper('all')}}</option>
                                                @foreach(\App\Support\StatusProgress::ALL as $material)
                                                    <option value="{{$material}}">{{strtoupper($material)}}</option>
                                                @endforeach
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
                        {{--                        <div class="card-header">--}}
                        {{--                            <div class="card-header-form">--}}
                        {{--                                --}}{{--                                <button id="btn_create" class="btn btn-primary text-uppercase">--}}
                        {{--                                --}}{{--                                    <strong><i class="fas fa-plus mr-2"></i>Create</strong>--}}
                        {{--                                --}}{{--                                </button>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

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

                                        <th width="15%">Customer</th>
                                        <th width="15%">Phone</th>
                                        <th width="20%">Product</th>
                                        <th width="20%">Shipping</th>
                                        <th>Qty (pcs)</th>
                                        @if($status == \App\Support\StatusProgress::RECEIVED)
                                            <th class="text-center" width="10%">Received date</th>
                                        @else
                                            <th class="text-center" width="10%">Target finish</th>
                                        @endif
                                        <th class="text-center" width="15%">Status</th>
                                        <th width="25%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($kategori as $row)
                                        <tr>
                                            <td style="vertical-align: middle" align="center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="cb-{{$row->id}}"
                                                           class="custom-control-input dt-checkboxes">
                                                    <label for="cb-{{$row->id}}"
                                                           class="custom-control-label">{{$no++}}</label>
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle" align="center">{{$row->id}}</td>
                                            {{--                                            <td style="vertical-align: middle">--}}
                                            {{--                                                <strong>{{$row->getCart->getPayment->uni_code_payment}}</strong>--}}
                                            {{--                                            </td>--}}
                                            <td style="vertical-align: middle">
                                                <strong>{{$row->getCart->getUser->name}}</strong>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <strong>{{$row->getCart->getUser->getBio->phone}}</strong>
                                            </td>
                                            <td style="vertical-align: middle">
                                                @if(!empty($row->getCart->subkategori_id))
                                                    {{$row->getCart->getSubKategori->name}}
                                                @elseif(!empty($row->getCart->cluster_id))
                                                    {{$row->getCart->getCluster->name}}
                                                @endif

                                            </td>
                                            <td style="vertical-align: middle">
                                                {{$row->getCart->getAddress->address}}
                                            </td>

                                            <td style="vertical-align: middle">
                                                {{$row->getCart->qty}}
                                            </td>


                                            <td style="vertical-align: middle" align="center">
                                                @if($status == \App\Support\StatusProgress::RECEIVED)
                                                    {{\Carbon\Carbon::parse($row->getCart->received_date)->format('j F Y')}}
                                                @else
                                                    {{\Carbon\Carbon::parse($row->getCart->production_finished)->format('j F Y')}}
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle" align="center">
                                                @if($row->progress_status == \App\Support\StatusProgress::NEW)
                                                    <span class="badge badge-info"><span
                                                            class="fa fa-shopping-basket"></span> New</span>
                                                @elseif($row->progress_status == \App\Support\StatusProgress::START_PRODUCTION || $row->progress_status == \App\Support\StatusProgress::FINISH_PRODUCTION)
                                                    <span class="badge badge-warning"><span class="fa fa-cogs"></span> On Produce</span>
                                                @elseif($row->progress_status == \App\Support\StatusProgress::SHIPPING)
                                                    <span class="badge badge-info"><span
                                                            class="fa fa-shipping-fast"></span>  Shipping</span>
                                                @elseif($row->progress_status == \App\Support\StatusProgress::RECEIVED)
                                                    <span class="badge badge-success"><span
                                                            class="fa fa-clipboard-check"></span>  Received</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle" align="center">
                                                <div class="btn-group">
                                                    <?php
                                                    $file = storage_path('app/public/users/order/invoice/owner/prodution/' . $code . '/' . $row->uni_code . '.pdf');
                                                    ?>
                                                    @if(file_exists($file))
                                                        <a href="{{asset('storage/users/order/invoice/owner/prodution/' . $code . '/' . $row->uni_code . '.pdf')}}"
                                                           data-placement="right" data-toggle="tooltip"
                                                           title="Download Shipping Label"
                                                           type="button" class="btn btn-danger">

                                                            <i class="fa fa-file-download   "></i>
                                                        </a>
                                                    @endif
                                                    <a href="{{route('get.order.detail',['id' => $row->id])}}"
                                                       data-placement="top" data-toggle="tooltip"
                                                       title="Detail Info"
                                                       type="button" class="btn btn-info">

                                                        <i class="fa fa-info-circle"></i>
                                                    </a>
                                                </div>
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

                            <div id="content2" style="display: none;">
                                <form id="form-blogPost" method="post" action="{{route('add.promo')}}"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method">
                                    <input type="hidden" name="id">
                                    <input type="hidden" name="admin_id">

                                    <div class="row form-group">
                                        <div class="col has-feedback">
                                            <label for="title">Promo Code</label>
                                            <input id="promo_code" type="text" maxlength="191" name="promo_code"
                                                   class="form-control"
                                                   placeholder="Write its promo code here&hellip;" required>
                                            <span class="glyphicon glyphicon-text-width form-control-feedback"></span>
                                        </div>
                                    </div>

                                    <div class="row form-group has-feedback">
                                        <div class="col">
                                            <label for="_content">Description</label>
                                            <textarea id="description" type="text" name="description"
                                                      class="summernote form-control"
                                                      placeholder="Write something about your post here&hellip;"></textarea>
                                            <span class="glyphicon glyphicon-text-height form-control-feedback"></span>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col">
                                            <label for="thumbnail">Start</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="date" name="start" class="form-control"
                                                       onblur="set_end_date(this.value)"
                                                       id="start-date" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="thumbnail">End</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="date" name="end" class="form-control"
                                                       id="end-date" required>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-6 has-feedback">
                                            <label for="title">Amount of Discount</label>
                                            <div class="input-group mb-2">
                                                <input id="discount" type="number" name="discount" max="99" min="1"
                                                       class="form-control"
                                                       placeholder="1xxxxxx" required>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">%</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary btn-block text-uppercase"
                                                    style="font-weight: 900">Submit
                                            </button>
                                        </div>
                                    </div>
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
                        {sortable: false, targets: 5},
                        {targets: 1, visible: false, searchable: false}
                    ],
                    buttons: [
                        {
                            text: '<strong class="text-uppercase"><i class="fa fa-file-pdf mr-2"></i>Generate</strong>',

                            className: 'btn btn-danger assets-select-btn export-print generate'
                        },
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

            $(".generate").on('click', function () {
                get_design('{{$code}}')
            });
        });

        @if(request()->has('period'))
        $('#period').val('{{ request()->get('period') }}');
        @endif

        @if(request()->has('status'))
        $('#status').val('{{ request()->get('status') }}');

        @endif

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
