@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': '.__('lang.header.order').' | '.env('APP_TITLE'))
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
            <h1>Order History & Status</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Order</div>
                <div class="breadcrumb-item">History & Status</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.order',['condition' => \App\Support\StatusProgress::NEW])}}"
                                  method="get">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="row form-group">
                                                <div class="col">
                                                    <div class="fix-label-group">
                                                        <label for="category_id">Time Period</label>
                                                        <div class="">
                                                            <select id="period"
                                                                    class="form-control selectpicker"
                                                                    title="-- Choose --"
                                                                    name="period" data-live-search="true"
                                                            >

                                                                <option value="99999">{{strtoupper('all')}}</option>
                                                                <option value="7">{{strtoupper('One Week')}}</option>
                                                                <option
                                                                    value="30">{{strtoupper('One Month')}}</option>
                                                                <option
                                                                    value="90">{{strtoupper('Three Months')}}</option>
                                                                <option
                                                                    value="180">{{strtoupper('Six Months')}}</option>
                                                                <option value="360">{{strtoupper('One Year')}}</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row form-group">
                                                <div class="col">
                                                    <div class="fix-label-group">
                                                        <label for="category_id">Status Order</label>
                                                        <div class="input-group">
                                                            <select id="status"
                                                                    class="form-control selectpicker"
                                                                    title="-- Choose --"
                                                                    name="status" data-live-search="true"
                                                            >
                                                                <option
                                                                    value="">{{strtoupper('all')}}</option>
                                                                @foreach(\App\Support\StatusProgress::ALL as $material)
                                                                    <option
                                                                        value="{{$material}}">{{strtoupper($material)}}</option>
                                                                @endforeach
                                                            </select>
                                                            <button data-placement="right" data-toggle="tooltip"
                                                                    title="Submit Filter"
                                                                    type="submit" class="btn btn-warning mr-1">
                                                                <i class="fa fa-filter"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
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
                                        <th width="15%">Code</th>
                                        <th width="15%">Customer</th>
                                        <th width="15%">Phone</th>
                                        <th width="20%">Description</th>
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
                                            <td style="vertical-align: middle">
                                                <strong>{{$row->getCart->getPayment->uni_code_payment}}</strong>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <strong>{{$row->getCart->getUser->name}}</strong>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <strong>{{$row->getCart->getUser->getBio->phone}}</strong>
                                            </td>
                                            <td style="vertical-align: middle">
                                                @if(!empty($row->getCart->subkategori_id))
                                                    <strong> Product
                                                        :</strong>   {{$row->getCart->getSubKategori->name}}
                                                @elseif(!empty($row->getCart->cluster_id))
                                                    <strong> Product
                                                        :</strong>  {{$row->getCart->getCluster->name}}
                                                @endif

                                                <br>
                                                <br>

                                                @if(!empty($row->getCart->material_id))
                                                    <strong>Material
                                                        :</strong>  {{\App\Models\Material::find($row->getCart->material_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->type_id))
                                                    <strong>Type
                                                        :</strong>  {{\App\Models\TypeProduct::find($row->getCart->type_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->balance_id))
                                                    <strong>Balance
                                                        :</strong>  {{\App\Models\Balance::find($row->getCart->balance_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->page_id))
                                                    <strong>Page
                                                        :</strong>  {{\App\Models\Pages::find($row->getCart->page_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->size_id))
                                                    <strong>Size
                                                        :</strong>  {{\App\Models\Size::find($row->getCart->size_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->lamination_id))
                                                    <strong>Lamination
                                                        :</strong>  {{\App\Models\Lamination::find($row->getCart->lamination_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->side_id))
                                                    <strong>Side
                                                        :</strong>  {{\App\Models\Side::find($row->getCart->side_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->edge_id))
                                                    <strong>Edge type
                                                        :</strong>  {{\App\Models\Edge::find($row->getCart->edge_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->color_id))
                                                    <strong>Color type
                                                        :</strong>  {{\App\Models\Colors::find($row->getCart->color_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->finishing_id))
                                                    <strong>Finishing
                                                        :</strong>  {{\App\Models\Finishing::find($row->getCart->finishing_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->folding_id))
                                                    <strong>Folding type
                                                        :</strong>  {{\App\Models\Folding::find($row->getCart->folding_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->front_side_id))
                                                    <strong>Front Side
                                                        :</strong>  {{\App\Models\Front::find($row->getCart->front_side_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->right_side_id))
                                                    <strong>Right Side
                                                        :</strong>  {{\App\Models\RightLeftSide::find($row->getCart->right_side_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->left_side_id))
                                                    <strong>Left Side
                                                        :</strong>  {{\App\Models\RightLeftSide::find($row->getCart->right_side_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->back_side_id))
                                                    <strong>Back Side
                                                        :</strong>  {{\App\Models\BackSide::find($row->getCart->back_side_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->front_cover_id))
                                                    <strong>Front Cover
                                                        :</strong>  {{\App\Models\Material::find($row->getCart->front_cover_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->back_cover_id))
                                                    <strong>Back Cover
                                                        :</strong>  {{\App\Models\Material::find($row->getCart->back_cover_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->binding_id))
                                                    <strong>Binding type
                                                        :</strong>  {{\App\Models\Finishing::find($row->getCart->binding_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->print_method_id))
                                                    <strong>Print Method
                                                        :</strong>  {{\App\Models\PrintingMethods::find($row->getCart->print_method_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->side_cover_id))
                                                    <strong>Side Cover
                                                        :</strong>  {{\App\Models\Side::find($row->getCart->side_cover_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->cover_lamination_id))
                                                    <strong>Cover Lamnination
                                                        :</strong>  {{\App\Models\Lamination::find($row->getCart->cover_lamination_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->lid_id))
                                                    <strong>Lid Type
                                                        :</strong>  {{\App\Models\Lid::find($row->getCart->lid_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->material_cover_id))
                                                    <strong>Material Cover
                                                        :</strong>  {{\App\Models\Material::find($row->getCart->material_cover_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->orientation_id))
                                                    <strong>Orientation
                                                        :</strong>  {{\App\Models\Finishing::find($row->getCart->orientation_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->extra_id))
                                                    <strong>Extra
                                                        :</strong>  {{\App\Models\Finishing::find($row->getCart->extra_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->holder_id))
                                                    <strong>Holder type
                                                        :</strong>  {{\App\Models\Finishing::find($row->getCart->holder_id)->name}}
                                                    <br>
                                                @endif

                                                @if(!empty($row->getCart->material_color_id))
                                                    <strong>Material Color
                                                        :</strong>  {{\App\Models\Colors::find($row->getCart->material_color_id)->name}}
                                                    <br>
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
                                                @if($row->progress_status == \App\Support\StatusProgress::NEW)
                                                    <button data-placement="left" data-toggle="tooltip"
                                                            title="Proceed this order"
                                                            onclick="proceed_order('{{$row->id}}')"
                                                            type="button" class="btn btn-warning mr-1">
                                                        <i class="fa fa-paper-plane"></i></button>
                                                @elseif($row->progress_status == \App\Support\StatusProgress::START_PRODUCTION || $row->progress_status  == \App\Support\StatusProgress::FINISH_PRODUCTION)
                                                    <button data-placement="left" data-toggle="tooltip"
                                                            title="Send this order"
                                                            onclick="proceed_order('{{$row->id}}')"
                                                            type="button" class="btn btn-warning mr-1">
                                                        <i class="fa fa-shipping-fast"></i></button>
                                                @endif
                                                @if($row->getCart->link)
                                                    <a href="{{$row->getCart->link}}" target="_blank">
                                                        <button data-placement="right" data-toggle="tooltip"
                                                                title="Design"
                                                                type="button" class="btn btn-info mr-1">
                                                            <i class="fa fa-link"></i></button>
                                                    </a>
                                                @elseif($row->getChart->file)
                                                    <button data-placement="right" data-toggle="tooltip"
                                                            title="Design" onclick="get_design('{{$row->getCart->id}}')"
                                                            type="button" class="btn btn-info mr-1">
                                                        <i class="fa fa-file-download"></i></button>
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
                        <div class="row">
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
                        <div class="row">
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
                        <div class="row">
                            <div class="col">
                                <label for="name">email <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input id="name_id" type="email" maxlength="191" name="email" class="form-control"
                                           placeholder="Write its name here&hellip;" required>
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
        });

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

        function set_end_date(value) {

            $('#end-date').attr({
                "min": value
            });
        }

        function get_design(cart_id) {
            $.ajax({
                type: 'get',
                url: '{{route('admin.order.download')}}',
                data: {
                    cart_id: cart_id
                },
                success: function (data) {


                }, error: function (xhr, ajaxOptions, thrownError) {
                    if (xhr.status == 404) {
                        console.log(xhr);
                        swal('Error', xhr.responseJSON.error, 'error');
                    }
                }
            });
        }

        function proceed_order(order_id) {
            $.ajax({
                type: 'post',
                url: '{{route('update.order.status')}}',
                data: {
                    id: order_id,
                    _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    // console.log(data);
                    swal('Success', "Order Successfully Updated!", 'success');
                    setTimeout(function () {// wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 1500);
                }, error: function (xhr, ajaxOptions, thrownError) {
                    if (xhr.status == 404) {
                        console.log(xhr);
                        swal('Error', xhr.responseJSON.error, 'error');
                    }
                }
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
