@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': Inbox | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('admins/modules/summernote/summernote-bs4.css')}}">
    <style>
        .compose {
            padding: 0;
            position: fixed;
            bottom: 0;
            right: 0;
            background: #fff;
            border: 1px solid #D9DEE4;
            border-right: 0;
            border-bottom: 0;
            border-top-left-radius: 5px;
            z-index: 20;
            display: none
        }

        .compose .compose-header {
            padding: 5px;
            background: #f89406;
            color: #fff;
            border-top-left-radius: 5px
        }

        .compose .compose-header .close {
            text-shadow: 0 1px 0 #fff;
            line-height: .8
        }

        .compose .compose-footer {
            padding: 10px
        }
    </style>
@endpush

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Detail Order </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Order</div>
                <div class="breadcrumb-item">Detail</div>
                <div class="breadcrumb-item">{{$data->uni_code}}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card" id="inbox">
                        <div class="card-header">
                            <h4>Action</h4>
                            <div class="card-header-action">
                                @if($data->progress_status == \App\Support\StatusProgress::NEW)
                                    <span class="badge badge-info"><span
                                            class="fa fa-shopping-basket"></span> New</span>
                                @elseif($data->progress_status == \App\Support\StatusProgress::START_PRODUCTION || $data->progress_status == \App\Support\StatusProgress::FINISH_PRODUCTION)
                                    <span class="badge badge-warning"><span class="fa fa-cogs"></span> On Produce</span>
                                @elseif($data->progress_status == \App\Support\StatusProgress::SHIPPING)
                                    <span class="badge badge-info"><span
                                            class="fa fa-shipping-fast"></span>  Shipping</span>
                                @elseif($data->progress_status == \App\Support\StatusProgress::RECEIVED)
                                    <span class="badge badge-success"><span
                                            class="fa fa-clipboard-check"></span>  Received</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            Customer
                            <hr>
                            <table>
                                <tr data-toggle="tooltip" title="Payment code" data-placement="left">
                                    <td><strong>{{$data->getCart->getPayment->uni_code_payment}}</strong></td>
                                </tr>
                                <tr data-toggle="tooltip" title="Order Code" data-placement="left">
                                    <td> #{{$data->uni_code}}</td>
                                </tr>
                                <tr data-toggle="tooltip" title="Customer Name" data-placement="left">
                                    <td> {{$data->getCart->getUser->name}}</td>
                                </tr>
                                <tr data-toggle="tooltip" title="Customer Phone Number" data-placement="left">
                                    <td> {{$data->getCart->getUser->getBio->phone}}</td>
                                </tr>
                            </table>
                            <hr>
                            <center>
                                <div class="btn-group ">
                                    @if($data->getCart->link)
                                        <a href="{{$data->getCart->link}}" target="_blank" class="btn btn-info">
                                            <i class="fa fa-file-download"></i> DOWNLOAD
                                        </a>
                                    @endif
                                    @if($data->gerCart->file)

                                    @endif

                                    @if($data->progress_status == \App\Support\StatusProgress::NEW)
                                        <button class="btn btn-primary" onclick="proceed_order('{{$data->id}}')"><i
                                                class="fa fa-check"></i> PROCEED
                                        </button>
                                    @elseif($data->progress_status == \App\Support\StatusProgress::START_PRODUCTION || $data->progress_status == \App\Support\StatusProgress::FINISH_PRODUCTION)
                                        <button class="btn btn-primary" onclick="proceed_order('{{$data->id}}')"><i
                                                class="fa fa-shipping-fast"></i> SHIPPING
                                        </button>
                                    @endif

                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card" id="inbox">
                        <div class="card-header">
                            <h4>#{{$data->uni_code}} / @if(!empty($data->getCart->subkategori_id))
                                    {{$data->getCart->getSubKategori->name}}
                                @elseif(!empty($data->getCart->cluster_id))
                                    {{$data->getCart->getCluster->name}}
                                @endif&nbsp; <span class="fa fa-calendar-alt"> </span> {{$data->updated_at}}
                            </h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive">
                                <thead class="bg-warning" style="height: 20pt">
                                <tr>
                                    <th style="color: white">Product</th>
                                    <th style="color: white">Description</th>
                                    <th style="color: white">Qty</th>
                                    <th style="color: white">Price per pcs</th>
                                    <th style="color: white">Shipping Cost</th>
                                    <th style="color: white">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>@if(!empty($data->getCart->subkategori_id))
                                            {{$data->getCart->getSubKategori->name}}
                                        @elseif(!empty($data->getCart->cluster_id))
                                            {{$data->getCart->getCluster->name}}
                                        @endif</td>
                                    <td>
                                        <br>
                                        <br>

                                        @if(!empty($data->getCart->material_id))
                                            <strong>Material
                                                :</strong>  {{\App\Models\Material::find($data->getCart->material_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->type_id))
                                            <strong>Type
                                                :</strong>  {{\App\Models\TypeProduct::find($data->getCart->type_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->balance_id))
                                            <strong>Balance
                                                :</strong>  {{\App\Models\Balance::find($data->getCart->balance_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->page_id))
                                            <strong>Page
                                                :</strong>  {{\App\Models\Pages::find($data->getCart->page_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->size_id))
                                            <strong>Size
                                                :</strong>  {{\App\Models\Size::find($data->getCart->size_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->lamination_id))
                                            <strong>Lamination
                                                :</strong>  {{\App\Models\Lamination::find($data->getCart->lamination_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->side_id))
                                            <strong>Side
                                                :</strong>  {{\App\Models\Side::find($data->getCart->side_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->edge_id))
                                            <strong>Edge type
                                                :</strong>  {{\App\Models\Edge::find($data->getCart->edge_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->color_id))
                                            <strong>Color type
                                                :</strong>  {{\App\Models\Colors::find($data->getCart->color_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->finishing_id))
                                            <strong>Finishing
                                                :</strong>  {{\App\Models\Finishing::find($data->getCart->finishing_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->folding_id))
                                            <strong>Folding type
                                                :</strong>  {{\App\Models\Folding::find($data->getCart->folding_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->front_side_id))
                                            <strong>Front Side
                                                :</strong>  {{\App\Models\Front::find($data->getCart->front_side_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->right_side_id))
                                            <strong>Right Side
                                                :</strong>  {{\App\Models\RightLeftSide::find($data->getCart->right_side_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->left_side_id))
                                            <strong>Left Side
                                                :</strong>  {{\App\Models\RightLeftSide::find($data->getCart->right_side_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->back_side_id))
                                            <strong>Back Side
                                                :</strong>  {{\App\Models\BackSide::find($data->getCart->back_side_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->front_cover_id))
                                            <strong>Front Cover
                                                :</strong>  {{\App\Models\Material::find($data->getCart->front_cover_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->back_cover_id))
                                            <strong>Back Cover
                                                :</strong>  {{\App\Models\Material::find($data->getCart->back_cover_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->binding_id))
                                            <strong>Binding type
                                                :</strong>  {{\App\Models\Finishing::find($data->getCart->binding_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->print_method_id))
                                            <strong>Print Method
                                                :</strong>  {{\App\Models\PrintingMethods::find($data->getCart->print_method_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->side_cover_id))
                                            <strong>Side Cover
                                                :</strong>  {{\App\Models\Side::find($data->getCart->side_cover_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->cover_lamination_id))
                                            <strong>Cover Lamnination
                                                :</strong>  {{\App\Models\Lamination::find($data->getCart->cover_lamination_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->lid_id))
                                            <strong>Lid Type
                                                :</strong>  {{\App\Models\Lid::find($data->getCart->lid_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->material_cover_id))
                                            <strong>Material Cover
                                                :</strong>  {{\App\Models\Material::find($data->getCart->material_cover_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->orientation_id))
                                            <strong>Orientation
                                                :</strong>  {{\App\Models\Finishing::find($data->getCart->orientation_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->extra_id))
                                            <strong>Extra
                                                :</strong>  {{\App\Models\Finishing::find($data->getCart->extra_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->holder_id))
                                            <strong>Holder type
                                                :</strong>  {{\App\Models\Finishing::find($data->getCart->holder_id)->name}}
                                            <br>
                                        @endif

                                        @if(!empty($data->getCart->material_color_id))
                                            <strong>Material Color
                                                :</strong>  {{\App\Models\Colors::find($data->getCart->material_color_id)->name}}
                                            <br>
                                        @endif
                                    </td>
                                    <td> {{$data->getCart->qty}}</td>
                                    <td> Rp{{number_format($data->getCart->price_pcs)}}</td>
                                    <td> Rp{{number_format($data->getCart->ongkir)}}</td>
                                    <td> Rp{{number_format($data->getCart->total)}}</td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <strong> Shipping to</strong> : {{$data->getCart->getAddress->address}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('admins/modules/summernote/summernote-bs4.js')}}"></script>
    <script>
        $(function () {


            $("#message-items, .ticket-content").niceScroll({
                cursoropacitymin: 0,
                cursoropacitymax: .8,
                cursorwidth: 7,
                cursorcolor: "#f89406",
                cursorborder: "none",
            });
        });

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


        $(document).on('mouseover', '.use-nicescroll', function () {
            $(this).getNiceScroll().resize();
        });
    </script>
@endpush
