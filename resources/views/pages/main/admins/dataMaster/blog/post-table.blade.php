@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': '.__('admin.tables.blog-post').' | '.env('APP_TITLE'))
@push('styles')
    <link rel="stylesheet" href="{{asset('admins/modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('admins/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/datatables/Buttons-1.5.6/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/bootstrap-tagsinput/tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/lightgallery/dist/css/lightgallery.min.css')}}">
    <style>
        .bootstrap-select .dropdown-menu {
            min-width: 100% !important;
        }

        .form-control-feedback {
            position: absolute;
            top: 3em;
            right: 2em;
        }

        .bootstrap-tagsinput {
            background-color: #fff !important;
            border: 1px solid #e4e6fc !important;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075) !important;
            display: inline-block !important;
            padding: 4px 6px;
            color: #555;
            vertical-align: middle;
            border-radius: 0 4px 4px 0;
            width: 95.5%;
            height: 42px !important;
            line-height: 22px;
            cursor: text;
        }

        .bootstrap-tagsinput .badge {
            background-color: #E31B23 !important;
        }

        .bootstrap-tagsinput .badge [data-role="remove"]:after {
            content: "\f00d";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
        }

        #video {
            display: none;
        }
    </style>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('admin.tables.blog-post')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Blog</div>
                <div class="breadcrumb-item">{{__('admin.sidebar.blog-post')}}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-form">
                                <button id="btn_create" class="btn btn-primary text-uppercase">
                                    <strong><i class="fas fa-plus mr-2"></i>Create</strong>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="content1" class="table-responsive">
                                <table class="table table-striped" id="dt-buttons">
                                    <thead>
                                    <tr>
                                        <th class="text-center" width="5%">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="custom-control-input" id="cb-all">
                                                <label for="cb-all" class="custom-control-label">#</label>
                                            </div>
                                        </th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Title URI</th>
                                        <th class="text-center" width="10%">Category</th>
                                        <th width="50%">Details</th>
                                        <th class="text-center" width="15%">Author</th>
                                        <th class="text-center" width="15%">Created at</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($posts as $row)
                                        @php
                                            $date = \Carbon\Carbon::parse($row->created_at);
                                            $url = route('detail.blog', ['author' => $row->getAdmin->username,
                                            'y' => $date->format('Y'), 'm' => $date->format('m'), 'd' => $date->format('d'),
                                            'title' => $row->permalink]);
                                        @endphp
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
                                            <td style="vertical-align: middle" align="center">{{$row->permalink}}</td>
                                            <td style="vertical-align: middle" align="center">
                                                <strong class="text-uppercase">{{$row->getBlogCategory->name}}</strong>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <div class="row float-left mr-0">
                                                    <div class="col">
                                                        <a href="javascript:void(0)" id="preview{{$row->id}}"
                                                           onclick="preview('{{$row->id}}')">
                                                            <img width="100" src="{{asset('storage/blog/thumbnail/'.
                                                            $row->thumbnail)}}" alt="Thumbnail" class="img-thumbnail">
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="{{$url}}"><strong>{{$row->title}}</strong></a><br>
                                                {!!\Illuminate\Support\Str::words($row->content, 20, '...') . '</p>'!!}
                                            </td>
                                            <td style="vertical-align: middle" align="center">
                                                <a href="{{route('detail.blog', ['author' => $row->getAdmin->username])}}">
                                                    {{$row->getAdmin->username}}</a>
                                            </td>
                                            <td style="vertical-align: middle"
                                                align="center">{{$date->format('j F Y')}}</td>
                                            <td style="vertical-align: middle" align="center">
                                                <a href="{{route('table.blog.galleries', ['blog_id' => encrypt($row->id)])}}"
                                                   data-placement="left" data-toggle="tooltip" title="Gallery"
                                                   class="btn btn-info"><i class="fa fa-photo-video"></i></a>
                                                <hr class="mt-1 mb-1">
                                                <button data-placement="left" data-toggle="tooltip" title="Edit"
                                                        type="button" class="btn btn-warning"
                                                        onclick="editBlogPost('{{$row->id}}','{{route('edit.blog.posts', ['id' => $row->id])}}')">
                                                    <i class="fa fa-edit"></i></button>
                                                <hr class="mt-1 mb-1">
                                                <a href="{{route('delete.blog.posts', ['id' => encrypt($row->id)])}}"
                                                   class="btn btn-danger delete-data" data-toggle="tooltip"
                                                   title="Delete" data-placement="right">
                                                    <i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <form method="post" id="form-mass">
                                    {{csrf_field()}}
                                    <input type="hidden" name="post_ids">
                                </form>
                            </div>

                            <div id="content2" style="display: none;">
                                <form id="form-blogPost" method="post" action="{{route('create.blog.posts')}}"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method">
                                    <input type="hidden" name="id">
                                    <input type="hidden" name="admin_id">
                                    <div class="row form-group">
                                        <div class="col fix-label-group">
                                            <label for="category_id">Category</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                        <span class="input-group-text fix-label-item" style="height: 2.25rem">
                                            <i class="fa fa-tag"></i></span>
                                                </div>
                                                <select id="category_id" class="form-control selectpicker"
                                                        title="-- Choose --"
                                                        name="category_id" data-live-search="true" required>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-8 has-feedback">
                                            <label for="title">Title</label>
                                            <input id="title" type="text" maxlength="191" name="title"
                                                   class="form-control"
                                                   placeholder="Write its title here&hellip;" required>
                                            <span class="glyphicon glyphicon-text-width form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="row form-group has-feedback">
                                        <div class="col">
                                            <label for="_content">Content</label>
                                            <textarea id="_content" type="text" name="_content"
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
                                    <div class="row form-group input-files">
                                        <div class="col">
                                            <label for="photo">Photo <sub>(optional)</sub></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-images"></i></span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="photos[]" class="custom-file-input"
                                                           id="photo" accept="image/*" multiple>
                                                    <label class="custom-file-label" id="txt_photo">Choose File</label>
                                                </div>
                                            </div>
                                            <div id="count_files" class="form-text text-muted">
                                                Allowed extension: jpg, jpeg, gif, png. Allowed size: < 5 MB
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group input-files">
                                        <div class="col">
                                            <label for="video">Video URL <sub>(optional)</sub></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-film"></i></span>
                                                </div>
                                                <input id="video" type="text" name="videos" class="form-control"
                                                       placeholder="Enter the video URL here&hellip;">
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
    <script src="{{asset('admins/modules/bootstrap-tagsinput/tagsinput.js')}}"></script>
    <script src="{{asset('js/plugins/lightgallery/dist/js/lightgallery-all.min.js')}}"></script>
    <script>
        $(function () {
            var export_filename = 'Blog Posts Table ({{now()->format('j F Y')}})',
                table = $("#dt-buttons").DataTable({
                    dom: "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-5'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    columnDefs: [
                        {sortable: false, targets: 7},
                        {targets: 1, visible: false, searchable: false},
                        {targets: 2, visible: false, searchable: true},
                    ],
                    buttons: [
                        {
                            text: '<strong class="text-uppercase"><i class="far fa-clipboard mr-2"></i>Copy</strong>',
                            extend: 'copy',
                            exportOptions: {
                                columns: [0, 3, 4, 5, 6]
                            },
                            className: 'btn btn-warning assets-export-btn export-copy ttip'
                        }, {
                            text: '<strong class="text-uppercase"><i class="far fa-file-excel mr-2"></i>Excel</strong>',
                            extend: 'excel',
                            exportOptions: {
                                columns: [0, 3, 4, 5, 6]
                            },
                            className: 'btn btn-success assets-export-btn export-xls ttip',
                            title: export_filename,
                            extension: '.xls'
                        }, {
                            text: '<strong class="text-uppercase"><i class="fa fa-print mr-2"></i>Print</strong>',
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 3, 4, 5, 6]
                            },
                            className: 'btn btn-info assets-select-btn export-print'
                        }, {
                            text: '<strong class="text-uppercase"><i class="fa fa-trash-alt mr-2"></i>Deletes</strong>',
                            className: 'btn btn-danger btn_massDelete'
                        }
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
                            $("#form-mass input[name=post_ids]").val(ids);
                            $("#form-mass").attr("action", "{{route('massDelete.blog.posts')}}");

                            if (ids.length > 0) {
                                swal({
                                    title: 'Delete Blog Posts',
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

            @if($find != "")
            $(".dataTables_filter input[type=search]").val('{{$find}}').trigger('keyup');
            @endif
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

            $("#form-blogPost").attr('action', '{{route('create.blog.posts')}}');
            $("#form-blogPost input[name=_method], #form-blogPost input[name=id], #form-blogPost input[name=admin_id], #title").val('');
            $(".input-files").show();
            $("#form-blogPost button[type=submit]").text('Submit');
            $("#category_id").val('default').selectpicker('refresh');
            $('#_content').summernote('code', '');
            $("#thumbnail").attr('required', 'required');
            $("#txt_thumbnail, #txt_photo").text('Choose File');
            $("#count_files").text('Allowed extension: jpg, jpeg, gif, png. Allowed size: < 5 MB');
            $("#video").tagsinput('removeAll');
        });

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

            $("#form-blogPost").attr('action', '{{route('update.blog.posts')}}');
            $("#form-blogPost input[name=_method]").val('PUT');
            $("#form-blogPost input[name=id]").val(id);
            $(".input-files").hide();
            $("#form-blogPost button[type=submit]").text('Save Changes');

            $.get(url, function (data) {
                $("#form-blogPost input[name=admin_id]").val(data.admin_id);
                $("#category_id").val(data.category_id).selectpicker('refresh');
                $("#title").val(data.title);
                $('#_content').summernote('code', data.content);
                $("#thumbnail").removeAttr('required', 'required');
                $("#txt_thumbnail").text(data.thumbnail.length > 60 ? data.thumbnail.slice(0, 60) + "..." : data.thumbnail);
            });
        }

        $("#thumbnail").on('change', function () {
            var files = $(this).prop("files"), names = $.map(files, function (val) {
                return val.name;
            }), text = names[0];
            $("#txt_thumbnail").text(text.length > 60 ? text.slice(0, 60) + "..." : text);
        });

        $("#photo").on('change', function () {
            var files = $(this).prop("files");
            var count = $(this).get(0).files.length;
            var names = $.map(files, function (val) {
                return val.name;
            });
            $("#txt_photo").text(names);
            if (count > 1) {
                $("#count_files").text(count + " files selected");
            } else {
                $("#count_files").text(count + " file selected");
            }
        });

        $("#video").tagsinput({
            confirmKeys: [13, 32, 44],
            trimValue: true,
            allowDuplicates: false
        });

        $("#form-blogPost").on('submit', function (e) {
            e.preventDefault();
            if ($('#_content').summernote('isEmpty')) {
                swal('ATTENTION!', 'Please, write something about this post!', 'warning');

            } else {
                $(this)[0].submit();
            }
        });

        function preview(id) {
            $.get('{{route('get.blog.galleries', ['id' => ''])}}' + id, function (data) {
                var source = [], file;

                if (data.gallery.length > 0) {
                    $.each(data.gallery, function (i, val) {
                        file = val.type == 'photos' ? '{{asset('storage/blog')}}/' + val.files : val.files;
                        source.push({
                            'src': file,
                            'thumb': file,
                            'subHtml': '<h4>' + val.files + '</h4><p>' + data.title + '</p>'
                        });
                    });
                } else {
                    source.push({
                        'src': data.thumbnail,
                        'thumb': data.thumbnail,
                        'subHtml': '<h4>' + data.title + '</h4>'
                    });
                }

                $("#preview" + id).lightGallery({
                    dynamic: true,
                    dynamicEl: source
                });
            });
        }

        $(document).on('mouseover', '.use-nicescroll', function () {
            $(this).getNiceScroll().resize();
        });
    </script>
@endpush
