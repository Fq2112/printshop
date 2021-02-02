@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': Admin List | '.env('APP_TITLE'))
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
            <h1>{{$title}}</h1>
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
                            <div class="table-responsive">
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
                                        <th width="15%">Name</th>
                                        <th>Username</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Created at</th>
                                        <th class="text-center">Last Update</th>
                                        <th class="text-center" width="25%">Action</th>
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
                                            <td style="vertical-align: middle">
                                                <strong>{{$row->name}}</strong>
                                            </td>
                                            <td style="vertical-align: middle">{{$row->username}}</td>

                                            <td style="vertical-align: middle;text-transform: uppercase" align="center">
                                                @if($row->role == \App\Support\Role::ROOT)
                                                    <span class="badge badge-dark">{{$row->role}}</span>
                                                @elseif($row->role == \App\Support\Role::OWNER)
                                                    <span class="badge badge-primary">{{$row->role}}</span>
                                                @elseif($row->role == \App\Support\Role::ADMIN)
                                                    <span class="badge badge-warning">{{$row->role}}</span>
                                                @elseif($row->role == \App\Support\Role::CS)
                                                    <span class="badge badge-info">{{$row->role}}</span>
                                                @else
                                                    <span class="badge badge-success">{{$row->role}}</span>
                                                @endif
                                            </td>

                                            <td style="vertical-align: middle" align="center">
                                                {{\Carbon\Carbon::parse($row->created_at)->format('j F Y')}}</td>
                                            <td style="vertical-align: middle" align="center">
                                                {{$row->updated_at->diffForHumans()}}</td>
                                            <td style="vertical-align: middle" align="center">
                                                <button data-placement="top" data-toggle="tooltip" title="Edit"
                                                        type="button" class="btn btn-warning mr-1"
                                                        onclick="editUser('{{$row->id}}','{{$row->name}}','{{$row->username}}','{{$row->email}}','{{$row->role}}')">
                                                    <i class="fa fa-edit"></i></button>

                                                <button data-placement="top" data-toggle="tooltip"
                                                        title="Reset Password"
                                                        type="button" class="btn btn-danger mr-1"
                                                        onclick="show_swal_reset('{{$row->id}}')">
                                                    <i class="fa fa-user-lock"></i></button>
                                                @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Support\Role::OWNER)
                                                    @if($row->id != \Illuminate\Support\Facades\Auth::user()->id)
                                                        <a href="{{route('delete.admin', ['id' => encrypt($row->id)])}}"
                                                           class="btn btn-danger delete-data" data-toggle="tooltip"
                                                           title="Delete" data-placement="top">
                                                            <i class="fas fa-trash-alt"></i></a>
                                                    @endif
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
                <form id="form-blogCategory" method="post" action="{{route('admin.add')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method">
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col">
                                <label for="name">Name <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input id="name" type="text" maxlength="191" name="name" class="form-control"
                                           placeholder="Write its name here&hellip;" required>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <label for="name">Username <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input id="name_id" type="text" maxlength="191" name="username" class="form-control"
                                           placeholder="Write its name here&hellip;" required>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <label for="name">Email <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input id="name_id" type="email" maxlength="191" name="email" class="form-control"
                                           placeholder="Write its name here&hellip;" required>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col fix-label-group">
                                <label for="role">Job Desc <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fix-label-item" style="height: 2.25rem">
                                            <i class="fa fa-briefcase"></i></span>
                                    </div>
                                    <select id="role" class="form-control selectpicker" title="-- Choose --"
                                            name="role" data-live-search="true" required>
                                        @foreach(\App\Support\Role::ALL as $role)
                                            @if($role != \App\Support\Role::ROOT && $role != \App\Support\Role::OWNER)
                                                <option
                                                    value="{{$role}}">{{ucwords($role)}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-danger"><strong>Password</strong> will be same with <strong>username</strong>
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
                <form id="form-blogCategory" method="post" action="{{route('admin.edit')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method">
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col">
                                <label for="name">Name <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input id="name_input" type="text" maxlength="191" name="name" class="form-control"
                                           placeholder="Write its name here&hellip;" required>
                                    <input type="hidden" name="id" id="user_id">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <label for="name">Username <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input id="username_input" type="text" maxlength="191" name="username"
                                           class="form-control disabled"
                                           placeholder="Write its name here&hellip;" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <label for="name">Email <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input id="email_input" type="email" maxlength="191" name="email"
                                           class="form-control disabled"
                                           placeholder="Write its name here&hellip;" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col fix-label-group">
                                <label for="role_input">Job Desc <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fix-label-item" style="height: 2.25rem">
                                            <i class="fa fa-briefcase"></i></span>
                                    </div>
                                    <select id="role_input" class="form-control selectpicker" title="-- Choose --"
                                            name="role" data-live-search="true" required>
                                        @foreach(\App\Support\Role::ALL as $role)
                                            @if($role != \App\Support\Role::ROOT && $role != \App\Support\Role::OWNER)
                                                <option
                                                    value="{{$role}}">{{ucwords($role)}}</option>
                                            @endif
                                        @endforeach
                                    </select>
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
                        {sortable: false, targets: 7},
                        {targets: 1, visible: false, searchable: false}
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

        function createBlogCategory() {
            $(".fix-label-group .bootstrap-select").addClass('p-0');
            $(".fix-label-group .bootstrap-select button").css('border-color', '#e4e6fc');
            $("#blogCategoryModal").modal('show');
        }

        function editUser(id, name, username, email, role_id) {
            $(".fix-label-group .bootstrap-select").addClass('p-0');
            $(".fix-label-group .bootstrap-select button").css('border-color', '#e4e6fc');
            $("#edit_title").text('Edit ' + name);
            $("#user_id").val(id);
            $("#name_input").val(name);
            $("#username_input").val(username);
            $("#email_input").val(email);
            $("#role_input").val(role_id).selectpicker('refresh');
            $("#editUser").modal('show');
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
