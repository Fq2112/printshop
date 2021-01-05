@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': Tier Type | '.env('APP_TITLE'))
@push('styles')
    <link rel="stylesheet" href="{{asset('admins/modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('admins/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/datatables/Buttons-1.5.6/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/summernote/summernote-bs4.css')}}">
    <style>
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
            <h1>Tier List {{$data->name}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Privilege</div>
                <div class="breadcrumb-item">Admin List</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-form">
                                <button onclick="createBlogCategory()" class="btn btn-primary text-uppercase">
                                    <strong><i class="fas fa-plus mr-2"></i>Create</strong>
                                </button>
                            </div>
                        </div>

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

                                        <th width="15%">Start</th>
                                        <th>End</th>
                                        <th class="text-center">Created at</th>
                                        <th class="text-center">Last Update</th>
                                        <th class="text-center" width="25%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($data->get_tier as $row)
                                        <tr>
                                            <td style="vertical-align: middle" align="center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="cb-{{$row->id}}"
                                                           class="custom-control-input dt-checkboxes">
                                                    <label for="cb-{{$row->id}}"
                                                           class="custom-control-label">{{$no++}}</label>
                                                </div>
                                            </td>

                                            <td style="vertical-align: middle">
                                                <strong>{{$row->start}}</strong>
                                            </td>
                                            <td style="vertical-align: middle"><strong>{{$row->end}}</strong></td>

                                            <td style="vertical-align: middle" align="center">
                                                {{\Carbon\Carbon::parse($row->created_at)->format('j F Y')}}</td>
                                            <td style="vertical-align: middle" align="center">
                                                {{$row->updated_at->diffForHumans()}}</td>
                                            <td style="vertical-align: middle" align="center">

                                                <button data-placement="top" data-toggle="tooltip"
                                                        title="Edit"
                                                        type="button" class="btn btn-info mr-1"
                                                        onclick="editUser('{{$row->id}}','{{$row->start}}','{{$row->end}}')">
                                                    <i class="fa fa-edit"></i></button>

                                                @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Support\Role::OWNER)

                                                        <a href="{{route('create.tier_list.delete', ['id' => encrypt($row->id)])}}"
                                                           class="btn btn-danger delete-data" data-toggle="tooltip"
                                                           title="Delete" data-placement="top">
                                                            <i class="fas fa-trash-alt"></i></a>

                                                @endif
                                                <form action="{{route('admin.reset')}}" id="update_form_{{$row->id}}"
                                                      method="post">
                                                    @CSRF
                                                    <input type="hidden" name="id" value="{{$row->id}}">
                                                </form>

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
                                <form id="form-blogPost" method="post" action="{{route('create.tier.create')}}"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method">
                                    <input type="hidden" name="id">
                                    <input type="hidden" name="admin_id">

                                    <div class="row form-group">
                                        <div class="col-6 has-feedback">
                                            <label for="title">Name ( En )</label>
                                            <input id="name_en" type="text" maxlength="191" name="name_en"
                                                   class="form-control"
                                                   placeholder="Write its title here&hellip;" required>
                                            <span class="glyphicon glyphicon-text-width form-control-feedback"></span>
                                        </div>
                                        <div class="col-6 has-feedback">
                                            <label for="title">Name ( Id )</label>
                                            <input id="name_id" type="text" maxlength="191" name="name_id"
                                                   class="form-control"
                                                   placeholder="Write its title here&hellip;" required>
                                            <span class="glyphicon glyphicon-text-width form-control-feedback"></span>
                                        </div>
                                    </div>

                                    <div class="row form-group has-feedback">
                                        <div class="col">
                                            <label for="_content">Caption ( En )</label>
                                            <textarea id="_content_en" type="text" name="_content_en"
                                                      class="summernote form-control"
                                                      placeholder="Write something about your post here&hellip;"></textarea>
                                            <span class="glyphicon glyphicon-text-height form-control-feedback"></span>
                                        </div>
                                        <div class="col">
                                            <label for="_content">Caption ( Id )</label>
                                            <textarea id="_content_id" type="text" name="_content_id"
                                                      class="summernote form-control"
                                                      placeholder="Write something about your post here&hellip;"></textarea>
                                            <span class="glyphicon glyphicon-text-height form-control-feedback"></span>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col">
                                            <label for="thumbnail">Thumbnail</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-images"></i></span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="thumbnail" class="custom-file-input"
                                                           id="thumbnail" accept="image/*" required>
                                                    <label class="custom-file-label" id="txt_thumbnail">Choose
                                                        File</label>
                                                </div>
                                            </div>
                                            <div class="form-text text-muted">
                                                Allowed extension: jpg, jpeg, gif, png. Allowed size: < 5 MB
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col has-feedback">
                                            <label for="title">Price</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Rp.</div>
                                                </div>
                                                <input id="price" type="number" maxlength="191" name="price"
                                                       class="form-control"
                                                       placeholder="1xxxxxx" required>
                                            </div>
                                            <span class="glyphicon glyphicon-text-width form-control-feedback"></span>
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

    <div class="modal fade " id="blogCategoryModal" tabindex="-1" role="dialog"
         aria-labelledby="blogCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-blogCategory" method="post" action="{{route('create.tier_list.create')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method">
                    <input type="hidden" name="id">
                    <input type="hidden" name="type_id" value="{{$data->id}}" id="">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col">
                                <label for="name">Start <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-tag"></i></span>
                                    </div>
                                    <input  type="text" maxlength="191" name="start" class="form-control" onkeypress="return numberOnly(event,',')"
                                           placeholder="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <label for="name">End <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-tag"></i></span>
                                    </div>
                                    <input type="text" maxlength="191" name="end" class="form-control" onkeypress="return numberOnly(event,',')"
                                           placeholder="1" required>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade " id="editUser" tabindex="-1" role="dialog"
         aria-labelledby="blogCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_title">Edit form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-blogCategory" method="post" action="{{route('create.tier_list.update')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method">
                    <input type="hidden" name="id" id="id_update">
                    <input type="hidden" name="type_id" value="{{$data->id}}" id="">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col">
                                <label for="name">Start <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-tag"></i></span>
                                    </div>
                                    <input id="start_" type="text" maxlength="191" name="start" class="form-control" onkeypress="return numberOnly(event,',')"
                                            placeholder="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <label for="name">End <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-tag"></i></span>
                                    </div>
                                    <input id="end_" type="text" maxlength="191" name="end" class="form-control" onkeypress="return numberOnly(event,',')"
                                           placeholder="1" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

                    ],
                    buttons: [
                        {
                            text: '<strong class="text-uppercase"><i class="far fa-clipboard mr-2"></i>Copy</strong>',
                            extend: 'copy',
                            exportOptions: {
                                columns: [0, 2, 3, 4, 5, 6]
                            },
                            className: 'btn btn-warning assets-export-btn export-copy ttip'
                        }, {
                            text: '<strong class="text-uppercase"><i class="far fa-file-excel mr-2"></i>Excel</strong>',
                            extend: 'excel',
                            exportOptions: {
                                columns: [0, 2, 3, 4, 5, 6]
                            },
                            className: 'btn btn-success assets-export-btn export-xls ttip',
                            title: export_filename,
                            extension: '.xls'
                        }, {
                            text: '<strong class="text-uppercase"><i class="fa fa-print mr-2"></i>Print</strong>',
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 2, 3, 4, 5, 6]
                            },
                            className: 'btn btn-info assets-select-btn export-print'
                        },
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
        });

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

            $("#form-blogPost").attr('action', '{{route('create.balance')}}');
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

        function createBlogCategory() {
            $("#blogCategoryModal").modal('show');
        }

        function editUser(id, start, end,) {

            $("#edit_title").text('Edit ' + name);
            $("#id_update").val(id);
            $("#start_").val(start);
            $("#end_").val(end);
            $("#editUser").modal('show');
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

            $("#form-blogPost").attr('action', '{{route('update.balance')}}');
            $("#form-blogPost input[name=_method]").val('PUT');
            $("#form-blogPost input[name=id]").val(id);
            $(".input-files").hide();
            $("#form-blogPost button[type=submit]").text('Save Changes');

            $.get(url, function (data) {
                // console.log(data.name.id);
                $("#form-blogPost input[name=admin_id]").val(data.admin_id);
                $("#category_id").val(data.category_id).selectpicker('refresh');
                $("#name_en").val(data.name.en);
                $("#name_id").val(data.name.id);
                $("#price").val(data.price);
                $('#_content_en').summernote('code', data.caption.en);
                $('#_content_id').summernote('code', data.caption.id);
                $("#thumbnail").removeAttr('required', 'required');
                $("#txt_thumbnail").text(data.image.length > 60 ? data.image.slice(0, 60) + "..." : data.thumbnail);
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
