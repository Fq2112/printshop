@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': Product Sub-Categories | '.env('APP_TITLE'))
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
            <h1>Product Sub-Categories Table</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Data Master</div>
                <div class="breadcrumb-item">Product</div>
                <div class="breadcrumb-item">Sub-Category</div>
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
                                        <th class="text-center" width="10%">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" class="custom-control-input" id="cb-all">
                                                <label for="cb-all" class="custom-control-label">#</label>
                                            </div>
                                        </th>
                                        <th class="text-center">ID</th>
                                        <th>Name</th>
                                        <th class="text-center">Product</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Created at</th>
                                        <th class="text-center">Last Update</th>
                                        <th class="text-center" width="20%">Action</th>
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
                                                <strong>{{$row->getTranslation('name', 'id')}} (ID)</strong> <br>
                                                <strong>{{$row->getTranslation('name', 'en')}} (EN)</strong>
                                            </td>
                                            <td style="vertical-align: middle;text-transform: uppercase" align="center">
                                                @if($row->is_featured == true)
                                                    <span class="badge badge-primary"><i class="fa fa-star mr-2"></i>Featured</span>
                                                @else
                                                    <span class="badge badge-dark"><i class="far fa-star mr-2"></i>Normal</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;text-transform: uppercase" align="center">
                                                @if($row->isActive == 1)
                                                    <span class="badge badge-success"><i class="fa fa-check mr-2"></i>Active</span>
                                                @else
                                                    <span class="badge badge-danger"><i class="fa fa-times-circle mr-2"></i>Inactive</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle" align="center">
                                                {{\Carbon\Carbon::parse($row->created_at)->format('j F Y')}}</td>
                                            <td style="vertical-align: middle" align="center">
                                                {{$row->updated_at->diffForHumans()}}</td>
                                            <td style="vertical-align: middle" align="center">
                                                @if(!empty(\App\Models\DetailSubkat::where('subkategori_id',$row->id)->first()))
                                                    <a href="{{route('table.categories.subs.gallery', ['id' => encrypt($row->id)])}}"
                                                       class="btn btn-info " data-toggle="tooltip"
                                                       title="Gallery" data-placement="right">
                                                        <i class="fas fa-images"></i></a>
                                                @endif
                                                <button data-placement="left" data-toggle="tooltip" title="Edit"
                                                        type="button" class="btn btn-warning mr-1"
                                                        onclick="editBlogPost('{{$row->id}}','{{route('edit.categories.sub.posts', ['id' => $row->id])}}')">
                                                    <i class="fa fa-edit"></i></button>

                                                @if($row->isActive == 1)
                                                    <a href="{{route('delete.categories.sub.delete', ['id' => encrypt($row->id)])}}"
                                                       class="btn btn-danger deactivate-data" data-toggle="tooltip"
                                                       title="Deactivate Data" data-placement="right">
                                                        <i class="fas fa-times-circle"></i></a>
                                                @else
                                                    <a href="{{route('delete.categories.sub.delete', ['id' => encrypt($row->id)])}}"
                                                       class="btn btn-success activate-data" data-toggle="tooltip"
                                                       title="Activate Data" data-placement="right">
                                                        <i class="fas fa-check-circle"></i></a>
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
                                <form id="form-blogPost" method="post" action="{{route('create.categories')}}"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method">
                                    <input type="hidden" name="id">
                                    <input type="hidden" name="admin_id">

                                    <div class="row form-group">
                                        <div class="col fix-label-group">
                                            <label for="category_id">Product Category</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                </div>
                                                <select id="kategori_id" class="form-control selectpicker" required
                                                        title="-- Choose --" name="kategori_id" data-live-search="true">
                                                    @foreach(\App\Models\Kategori::all() as $material)
                                                        <option
                                                            value="{{$material->id}}">{{$material->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>Product Status</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item" for="_normal">
                                                    <input id="_normal" type="radio" name="is_featured" value="0"
                                                           class="selectgroup-input">
                                                    <span class="selectgroup-button">
                                                        <i class="far fa-star mr-2"></i><b>NORMAL</b>
                                                    </span>
                                                </label>
                                                <label class="selectgroup-item" for="_featured">
                                                    <input id="_featured" type="radio" name="is_featured" value="1"
                                                           class="selectgroup-input">
                                                    <span class="selectgroup-button">
                                                        <i class="fa fa-star mr-2"></i><b>FEATURED</b>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-6 has-feedback">
                                            <label for="title">Name ( EN )</label>
                                            <input id="name_en" type="text" maxlength="191" name="name_en"
                                                   class="form-control"
                                                   placeholder="Write its title here&hellip;" required>
                                            <span class="glyphicon glyphicon-text-width form-control-feedback"></span>
                                        </div>
                                        <div class="col-6 has-feedback">
                                            <label for="title">Name ( ID )</label>
                                            <input id="name_id" type="text" maxlength="191" name="name_id"
                                                   class="form-control"
                                                   placeholder="Write its title here&hellip;" required>
                                            <span class="glyphicon glyphicon-text-width form-control-feedback"></span>
                                        </div>
                                    </div>

                                    <div class="row form-group has-feedback">
                                        <div class="col">
                                            <label for="_content">Caption ( EN )</label>
                                            <textarea id="_content_en" type="text" name="_content_en"
                                                      class="summernote form-control"
                                                      placeholder="Write something about your post here&hellip;"></textarea>
                                            <span class="glyphicon glyphicon-text-height form-control-feedback"></span>
                                        </div>
                                        <div class="col">
                                            <label for="_content">Caption ( ID )</label>
                                            <textarea id="_content_id" type="text" name="_content_id"
                                                      class="summernote form-control"
                                                      placeholder="Write something about your post here&hellip;"></textarea>
                                            <span class="glyphicon glyphicon-text-height form-control-feedback"></span>
                                        </div>
                                    </div>

                                    <div class="row form-group" style="display: none" id="banner_div">
                                        <div class="col lightgallery">
                                            <img width="100%" alt="Banner" class="img-thumbnail" id="banner_img" src="">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col">
                                            <label for="banner">Banner</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-images"></i></span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="thumbnail" class="custom-file-input"
                                                           id="banner" accept="image/*" required
                                                           onchange="$('#txt_banner').text($(this).val().replace(/.*(\/|\\)/, ''))">
                                                    <label class="custom-file-label" id="txt_banner">Choose
                                                        File</label>
                                                </div>
                                            </div>
                                            <div class="form-text text-muted">
                                                Allowed extension: jpg, jpeg, gif, png. Allowed size: < 5 MB
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row form-group" style="display: none" id="guide_div">
                                        <div class="col lightgallery">
                                            <object data="" type="application/pdf" id="object_guid" type="application/pdf">
                                                <iframe src="" id="iframe_guide" type="application/pdf"></iframe>
                                            </object>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col">
                                            <label for="guideline">Guidelines</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-images"></i></span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="guidelines" class="custom-file-input"
                                                           id="guideline" accept="image/*,.rar,.zip,.pdf"
                                                           onchange="$('#txt_guideline').text($(this).val().replace(/.*(\/|\\)/, ''))">
                                                    <label class="custom-file-label" id="txt_guideline">Choose
                                                        File</label>
                                                </div>
                                            </div>
                                            <div class="form-text text-muted">
                                                Allowed extension: jpg, jpeg, gif, png. pdf, rar, zip Allowed size: < 5 MB
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group" id="advance_check">
                                        <div class="col">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="advance" name="advance"
                                                       class="custom-control-input dt-checkboxes">
                                                <label for="advance"
                                                       class="custom-control-label">Advance</label>
                                            </div>
                                            <div class="form-text text-muted">
                                                Activate advance mode to add product specs (P.S.: Product will not have
                                                clusters)
                                            </div>
                                        </div>
                                    </div>

                                    <div id="advance_menu">

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Material</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="material_id" class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="material_id[]" data-live-search="true">
                                                        @foreach(\App\Models\Material::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Type</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="type_id" class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="type_id[]" data-live-search="true">
                                                        @foreach(\App\Models\TypeProduct::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Balance</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="balance_id" class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="balance_id[]" data-live-search="true">
                                                        @foreach(\App\Models\Balance::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Pages</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="page_id" class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="page_id[]" data-live-search="true">
                                                        @foreach(\App\Models\Pages::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Copies</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="copies_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="copies_id[]" data-live-search="true"
                                                    >
                                                        @foreach(\App\Models\Copies::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Size</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="size_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="size_id[]" data-live-search="true">
                                                        @foreach(\App\Models\Size::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Lamination</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="lamination_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="lamination_id[]" data-live-search="true"
                                                    >
                                                        @foreach(\App\Models\Lamination::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Side Print</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="side_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="side_id[]" data-live-search="true">
                                                        @foreach(\App\Models\Side::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Edge</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="edge_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="edge_id[]" data-live-search="true">
                                                        @foreach(\App\Models\Edge::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Colors</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="color_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="color_id[]" data-live-search="true"
                                                    >
                                                        @foreach(\App\Models\Colors::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Front Side</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="front_side_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="front_side_id[]" data-live-search="true"
                                                    >
                                                        @foreach(\App\Models\Front::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Back Side</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="back_side_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="back_side_id[]" data-live-search="true"
                                                    >
                                                        @foreach(\App\Models\BackSide::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Right Side</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="right_side_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="right_side_id[]" data-live-search="true"
                                                    >
                                                        @foreach(\App\Models\RightLeftSide::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Left Side</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="left_side_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="left_side_id[]" data-live-search="true"
                                                    >
                                                        @foreach(\App\Models\RightLeftSide::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Front Cover</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="front_cover_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="front_cover_id[]" data-live-search="true"
                                                    >
                                                        @foreach(\App\Models\Material::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Back Cover</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="back_cover_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="back_cover_id[]" data-live-search="true"
                                                    >
                                                        @foreach(\App\Models\Material::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Binding</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="binding_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="binding_id[]" data-live-search="true"
                                                    >
                                                        @foreach(\App\Models\Finishing::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Print Method</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-tag"></i></span>
                                                    </div>
                                                    <select id="print_method_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --" multiple
                                                            name="print_method_id[]" data-live-search="true"
                                                    >
                                                        @foreach(\App\Models\PrintingMethods::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col fix-label-group">
                                                <label for="category_id">Product Pricing Rules</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item"
                                                                  style="height: 2.25rem">
                                                                <i class="fa fa-funnel-dollar"></i></span>
                                                    </div>
                                                    <select id="type_tier_id"
                                                            class="form-control selectpicker"
                                                            title="-- Choose --"
                                                            name="type_tier_id" data-live-search="true"
                                                    >
                                                        @foreach(\App\Models\TypeTier::all() as $material)
                                                            <option
                                                                value="{{$material->id}}">{{$material->name}} : {{count($material->get_tier)}} tier &#64;{{$material->discount}}%   </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col has-feedback">
                                                <label for="title">Base Price (HPP) </label>
                                                <input id="price" type="number" maxlength="191" name="price"
                                                       class="form-control"
                                                       placeholder="Write its price here&hellip;">
                                                <span
                                                    class="glyphicon glyphicon-text-width form-control-feedback"></span>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col has-feedback">
                                                <label for="title">Weight Product (in Grams)</label>
                                                <input id="weight" type="number" maxlength="191" name="weight"
                                                       class="form-control"
                                                       placeholder="Write its price here&hellip;">
                                                <span
                                                    class="glyphicon glyphicon-text-width form-control-feedback"></span>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-4 has-feedback">
                                                <label for="title">Length (in Centimeter)</label>
                                                <input id="length_inp" type="number" maxlength="191"
                                                       name="length"
                                                       class="form-control"
                                                       placeholder="Write its price here&hellip;">
                                                <span
                                                    class="glyphicon glyphicon-text-width form-control-feedback"></span>
                                            </div>
                                            <div class="col-4 has-feedback">
                                                <label for="title">Width (in Centimeter)</label>
                                                <input id="width_inp" type="number" maxlength="191" name="width"
                                                       class="form-control"
                                                       placeholder="Write its price here&hellip;">
                                                <span
                                                    class="glyphicon glyphicon-text-width form-control-feedback"></span>
                                            </div>
                                            <div class="col-4 has-feedback">
                                                <label for="title">Height (in Centimeter)</label>
                                                <input id="height_inp" type="number" maxlength="191"
                                                       name="height"
                                                       class="form-control"
                                                       placeholder="Write its price here&hellip;">
                                                <span
                                                    class="glyphicon glyphicon-text-width form-control-feedback"></span>
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

            $("#form-blogPost").attr('action', '{{route('table.subkat.add')}}');
            $("#form-blogPost input[name=_method], #form-blogPost input[name=id], #form-blogPost input[name=admin_id], #title").val('');
            $(".input-files").show();
            $("#form-blogPost button[type=submit]").text('Submit');
            $("#category_id").val('default').selectpicker('refresh');
            $('#_content').summernote('code', '');
            $("#banner").attr('required', 'required');
            $("#txt_banner, #txt_guideline").text('Choose File');
            $("#advance").removeAttr('checked');
            $("#advance_check").show();
            $('#advance_menu').hide();
            $("#banner_div").hide();
            $("#guide_div").hide();
            reset_input();
        });

        $('#advance').change(function () {
            $('#advance_menu').toggle(300);
        }).change();

        function reset_input() {
            $("#kategori_id").val('default').selectpicker('refresh');
            $("label[for='_normal']").click();
            $("#name_en").val("");
            $("#name_id").val("");
            $('#_content_en').summernote('code', "");
            $('#_content_id').summernote('code', "");

            $('#material_id').selectpicker('val', null);
            $('#type_id').selectpicker('val', null);
            $('#balance_id').selectpicker('val', null);
            $('#page_id').selectpicker('val', null);
            $('#copies_id').selectpicker('val', null);
            $('#size_id').selectpicker('val', null);
            $('#lamination_id').selectpicker('val', null);
            $('#side_id').selectpicker('val', null);
            $('#edge_id').selectpicker('val', null);
            $('#color_id').selectpicker('val', null);
            $('#front_side_id').selectpicker('val', null);
            $('#back_side_id').selectpicker('val', null);
            $('#right_side_id').selectpicker('val', null);
            $('#left_side_id').selectpicker('val', null);
            $('#front_cover_id').selectpicker('val', null);
            $('#back_cover_id').selectpicker('val', null);
            $('#binding_id').selectpicker('val', null);
            $('#print_method_id').selectpicker('val', null);
            $('#type_tier_id').selectpicker('val', null);
            $('#price').val(null);
            $('#weight').val(null);
            $('#length_inp').val(null);
            $('#width_inp').val(null);
            $('#height_inp').val(null);
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

            $("#form-blogPost").attr('action', '{{route('table.subkat.update')}}');
            $("#form-blogPost input[name=_method]").val('PUT');
            $("#form-blogPost input[name=id]").val(id);
            $(".input-files").hide();
            $("#form-blogPost button[type=submit]").text('Save Changes');

            $.get(url, function (data) {
                $("#form-blogPost input[name=admin_id]").val(data.admin_id);
                $("#category_id").val(data.category_id).selectpicker('refresh');
                if(data.data.is_featured == 1) {
                    $("label[for='_featured']").click();
                } else{
                    $("label[for='_normal']").click();
                }
                $("#name_en").val(data.data.name.en);
                $("#name_id").val(data.data.name.id);
                $('#kategori_id').selectpicker('val', data.data.kategoris_id);
                $('#_content_en').summernote('code', data.data.caption.en);
                $('#_content_id').summernote('code', data.data.caption.id);
                $("#banner").removeAttr('required');
                $("#txt_banner").text(data.data.banner);
                $("#txt_guideline").text(data.data.guidelines);

                $("#banner_div").show();
                $("#banner_img").attr('src',data.banner_path);

                if(data.guideline != null) {
                    $("#guide_div").show();
                    $("#object_guid").attr('data',data.guideline);
                    $("#iframe_guide").attr('src',data.guideline);
                }

                if (!data.detail) {
                    $("#advance_check").hide();
                } else {
                    $("#advance").attr('checked', true);
                    $('#advance_menu').show();
                    $('#material_id').selectpicker('val', data.detail.material_ids);
                    $('#type_id').selectpicker('val', data.detail.type_ids);
                    $('#balance_id').selectpicker('val', data.detail.balance_ids);
                    $('#page_id').selectpicker('val', data.detail.page_ids);
                    $('#copies_id').selectpicker('val', data.detail.copies_ids);
                    $('#size_id').selectpicker('val', data.detail.size_ids);
                    $('#lamination_id').selectpicker('val', data.detail.lamination_ids);
                    $('#side_id').selectpicker('val', data.detail.side_ids);
                    $('#edge_id').selectpicker('val', data.detail.edge_ids);
                    $('#color_id').selectpicker('val', data.detail.color_ids);
                    $('#front_side_id').selectpicker('val', data.detail.front_side_ids);
                    $('#back_side_id').selectpicker('val', data.detail.back_side_ids);
                    $('#right_side_id').selectpicker('val', data.detail.right_side_ids);
                    $('#left_side_id').selectpicker('val', data.detail.left_side_ids);
                    $('#front_cover_id').selectpicker('val', data.detail.front_cover_ids);
                    $('#back_cover_id').selectpicker('val', data.detail.back_side_ids);
                    $('#binding_id').selectpicker('val', data.detail.binding_ids);
                    $('#print_method_id').selectpicker('val', data.detail.print_method_ids);
                    $('#type_tier_id').selectpicker('val', data.detail.type_tier_id);
                    $('#price').val(data.detail.price);
                    $('#weight').val(data.detail.weight);
                    $('#length_inp').val(data.detail.length);
                    $('#width_inp').val(data.detail.width);
                    $('#height_inp').val(data.detail.height);
                    $("#advance_check").show();
                }

            }).fail(function () {
                swal("Error!", "There's no any selected record!", "error");
            });
        }
    </script>
@endpush
