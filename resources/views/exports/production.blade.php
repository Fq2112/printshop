<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{strtoupper(__('lang.order.invoice')).' #'}}</title>
    <style>
        html, body {
            font-family: sans-serif;
        }

        #invoice {
            max-width: 800px;
            margin: 0 auto
        }

        #billship, #company {
            margin-bottom: 30px
        }

        #company img {
            max-width: 180px;
            height: auto
        }

        #co-left {
            padding: 10px;
            font-size: .95em;
            color: #888
        }

        #co-right {
            vertical-align: center
        }

        #co-right div {
            float: right;
            text-align: center;
            font-size: 28px;
            padding: 10px;
            color: #fff;
            width: 240px;
            background: #f89406;
        }

        #items td, #items th {
            font-weight: 400;
            border-bottom: 3px solid #fff
        }

        #billship td, #items td, #items th, #notes {
            padding: 10px
        }

        #specs {
            font-size: 14px;
            margin: 1em 0;
        }

        #specs td, #specs th {
            border-bottom: none;
            padding: 0;
        }

        .primary {
            color: #f89406;
        }

        #billship, #company, #items {
            width: 100%;
            border-collapse: collapse
        }

        #billship td {
            width: 33%
        }

        #items th {
            color: #fff;
            background: #ff9a06;
            text-align: left
        }

        #items td {
            background: #fff5e6
        }

        .idesc {
            color: #d77906
        }

        .ttl {
            color: #c37906
        }

        .center {
            text-align: center !important;
        }

        .right {
            text-align: right !important;
        }

        .uppercase {
            text-transform: uppercase !important;
        }

        #notes {
            background: #fff5e6;
            margin-top: 30px
        }
    </style>
</head>
<body>
<div id="invoice">
    <table id="company">
        <tr>
            <td>
                <img src="{{public_path('images/logotype-invoice.png')}}" alt="logo">
                <div id="co-left">
                    {{env('APP_TITLE')}}<br>Raya Kenjeran 469 Gading, Tambaksari<br>
                    Surabaya, Jawa Timur &ndash; 60134<br>
                    {{__('lang.footer.phone')}}: (031) 3814969 | Fax: (031) 3814969<br>
                    {{env('APP_URL')}}<br>{{env('MAIL_USERNAME')}}
                </div>
            </td>
            <td id="co-right">
                <div class="uppercase">Production</div>
                <br><br><br><br><br>
                <div style="background: none">
                    <img src="" alt="logo">
                </div>
            </td>
        </tr>
    </table>

    <table id="billship">
        <tr>
            <td>
                <?php
                $user = \App\Models\PaymentCart::where('uni_code_payment', $code)->first();
                ?>
                <b class="primary">Customer</b><br>
                {{$user->getUser->name}}<br>
                {{$user->getUser->email}}<br>
                {{$user->getUser->getBio->phone}}
            </td>
            <td>
                <b class="primary">{{__('lang.order.invoice')}} #{{$code}}</b> <br>
            </td>
        </tr>
    </table>

    <table id="items">
        <thead>
        <tr>
            <th><b>{{__('lang.breadcrumb.product')}}</b></th>
            <th class="center"><b>Description</b></th>
            <th class="center"><b>{{__('lang.product.form.summary.quantity')}}</b></th>
            <th class="center"><b>Due Date</b></th>
            <th class="center"><b>File Name</b></th>
        </tr>
        </thead>
        <tbody>
        @foreach($order as $data)
            <tr>
                <td>@if(!empty($data->getCart->subkategori_id))
                        {{$data->getCart->getSubKategori->name}}
                    @elseif(!empty($data->getCart->cluster_id))
                        {{$data->getCart->getCluster->name}}
                    @endif</td>
                <td>
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
                    <br>

                </td>
                <td align="center">{{$data->getCart->qty}}</td>
                <td>{{\Carbon\Carbon::parse($data->getCart->production_finished)->format('d-m-Y')}}</td>
                <td>
                    @if($data->getCart->link)
                        Attachment
                    @elseif($data->gerCart->file)
                        {{$data->uni_code}}.jpg
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <hr style=" color: #f89406;">

    <div id="notes">

    </div>
</div>
</body>
</html>
