@extends('layouts.mst_admin')
@section('title','Manage Cluster Gallery | '.env('APP_TITLE'))
@push('styles')
    <link rel="stylesheet" href="{{asset('admins/modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('admins/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/datatables/Buttons-1.5.6/css/buttons.dataTables.min.css')}}">
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

        .modal-header {
            padding: 1rem !important;
            border-bottom: 1px solid #e9ecef !important;
        }

        .modal-footer {
            padding: 1rem !important;
            border-top: 1px solid #e9ecef !important;
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

        #div-photo, #div-video, #video {

        }
    </style>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('admin.sidebar.blog-gallery')}} {{$data->name}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Blog</div>
                <div class="breadcrumb-item"></div>
                <div class="breadcrumb-item">{{__('admin.sidebar.blog-gallery')}}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-form">
                                <button id="btn_ADD" class="btn btn-primary text-uppercase">
                                    <strong><i class="fas fa-plus mr-2"></i>ADD</strong>
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
                                        <th class="text-center" width="10%">Category</th>
                                        <th width="25%">Files</th>
                                        <th class="text-center" width="15%">Created at</th>
                                        <th class="text-center" width="15%">Last Update</th>
                                        <th class="text-center" width="30%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($data->getGallery as $row)

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
                                            <td style="vertical-align: middle" align="center">
                                                <span class="badge badge-{{$row->type == 'photos' ? 'info' :
                                                'success'}} text-uppercase"><strong>{{$data->name}}</strong></span>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <div class="row lightgallery float-left mr-0">
                                                    <div class="col item" data-src="{{asset('storage/products/gallery/'.$row->image)}}"
                                                         data-sub-html="<h4>{{$row->files}}</h4><p></p>">
                                                        <a href="javascript:void(0)">
                                                            <img width="100" alt="Thumbnail" class="img-thumbnail"
                                                                 src="{{asset('storage/products/gallery/'.$row->image)}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                @if($row->type == 'photos')
                                                    <strong>{{$row->files}}</strong>
                                                @else
                                                    <a href="{{$row->files}}" target="_blank">
                                                        <strong>{{$row->files}}</strong>
                                                    </a>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle" align="center">
                                                {{\Carbon\Carbon::parse($row->created_at)->format('j F Y')}}</td>
                                            <td style="vertical-align: middle"
                                                align="center">{{$row->updated_at->diffForHumans()}}</td>
                                            <td style="vertical-align: middle" align="center">

                                                <a href="{{route('table.categories.cluster.gallery.delete',['id' => $row->id])}}" class="btn btn-danger delete-data"
                                                   data-toggle="tooltip" title="Delete" data-placement="right">
                                                    <i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <form method="post" id="form-mass">
                                    {{csrf_field()}}
                                    <input type="hidden" name="gallery_ids">
                                </form>
                            </div>

                            <div id="content2" style="display: none;">
                                <form id="form-blogGallery" method="post" enctype="multipart/form-data"
                                      action="{{route('table.categories.cluster.gallery.add')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="cluster_id" value="{{$data->id}}">
                                    <div id="div-photo" class="row form-group">
                                        <div class="col">
                                            <label for="photo">Photo</label>
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
    <script src="{{asset('admins/modules/bootstrap-tagsinput/tagsinput.js')}}"></script>
    <script src="{{asset('js/plugins/lightgallery/dist/js/lightgallery-all.min.js')}}"></script>
    <script>
        $(function () {
            var export_filename = 'Blog Galleries Table ({{now()->format('j F Y')}})',
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
                                columns: [0, 2, 3, 4, 5]
                            },
                            className: 'btn btn-warning assets-export-btn export-copy ttip'
                        }, {
                            text: '<strong class="text-uppercase"><i class="far fa-file-excel mr-2"></i>Excel</strong>',
                            extend: 'excel',
                            exportOptions: {
                                columns: [0, 2, 3, 4, 5]
                            },
                            className: 'btn btn-success assets-export-btn export-xls ttip',
                            title: export_filename,
                            extension: '.xls'
                        }, {
                            text: '<strong class="text-uppercase"><i class="fa fa-print mr-2"></i>Print</strong>',
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 2, 3, 4, 5]
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

                        $('.lightgallery').lightGallery({
                            loadYoutubeThumbnail: true,
                            youtubeThumbSize: 'default',
                        });

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
                            $("#form-mass input[name=gallery_ids]").val(ids);
                            $("#form-mass").attr("action", "");

                            if (ids.length > 0) {
                                swal({
                                    title: 'Delete Blog Galleries',
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

        $("#btn_ADD").on('click', function () {
            $("#content1").toggle(300);
            $("#content2").toggle(300);
            $(this).toggleClass('btn-primary btn-outline-primary');
            $("#btn_ADD strong").html(function (i, v) {
                return v === '<i class="fas fa-plus mr-2"></i>ADD' ?
                    '<i class="fas fa-th-list mr-2"></i>View' : '<i class="fas fa-plus mr-2"></i>ADD';
            }).tooltip('show');

            $(".fix-label-group .bootstrap-select").addClass('p-0');
            $(".fix-label-group .bootstrap-select button").css('border-color', '#e4e6fc');

            $("#txt_photo").text('Choose File');
            $("#count_files").text('Allowed extension: jpg, jpeg, gif, png. Allowed size: < 5 MB');
            $("#video").tagsinput('removeAll');
        });

        $("#type").on('change', function () {
            $("#txt_photo").text('Choose File');
            $("#count_files").text('Allowed extension: jpg, jpeg, gif, png. Allowed size: < 5 MB');
            $("#video").tagsinput('removeAll');

            if($(this).val() == "photos"){
                $("#div-photo").show();
                $("#photo").attr('required','required');
                $("#div-video").hide();
                $("#video").removeAttr('required');

            } else if($(this).val() == "videos") {
                $("#div-photo").hide();
                $("#photo").removeAttr('required');
                $("#div-video").show();
                $("#video").attr('required','required');

            } else {
                $("#div-photo, #div-video").show();
                $("#photo, #video").attr('required','required');
            }
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

        $(document).on('mouseover', '.use-nicescroll', function () {
            $(this).getNiceScroll().resize();
        });
    </script>
@endpush
