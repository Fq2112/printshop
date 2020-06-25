<!DOCTYPE html>
@php
    app()->setLocale('id');
    \Carbon\Carbon::setLocale('id');
    setlocale(LC_TIME, config('app.locale'));
@endphp
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
            <td><b class="primary">{{strtoupper(__('lang.order.invoice')).' #'.$code}}</b><br></td>
        </tr>
    </table>

    <table id="items">
        <thead>
        <tr>
            <th>Produk Cetak</th>
            <th>Spesifikasi</th>
            <th class="center">Qty.</th>
            <th class="center">Due Date</th>
            <th class="center">File Desain</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order as $data)
            <tr>
                <td>
                    @if(!empty($data->getCart->subkategori_id))
                        {{$data->getCart->getSubKategori->name}}
                    @elseif(!empty($data->getCart->cluster_id))
                        {{$data->getCart->getCluster->name}}
                    @endif
                </td>
                <td>
                    @if(!empty($data->getCart->material_id))
                        <b>Material:</b> {{\App\Models\Material::find($data->getCart->material_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->type_id))
                        <b>Tipe:</b> {{\App\Models\TypeProduct::find($data->getCart->type_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->balance_id))
                        <b>Saldo:</b> {{\App\Models\Balance::find($data->getCart->balance_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->page_id))
                        <b>Lembar / Halaman:</b> {{\App\Models\Pages::find($data->getCart->page_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->size_id))
                        <b>Ukuran Produk:</b> {{\App\Models\Size::find($data->getCart->size_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->lamination_id))
                        <b>Laminasi:</b> {{\App\Models\Lamination::find($data->getCart->lamination_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->side_id))
                        <b>Sisi:</b> {{\App\Models\Side::find($data->getCart->side_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->edge_id))
                        <b>Tipe Sudut:</b> {{\App\Models\Edge::find($data->getCart->edge_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->color_id))
                        <b>Warna:</b> {{\App\Models\Colors::find($data->getCart->color_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->finishing_id))
                        <b>Finishing:</b> {{\App\Models\Finishing::find($data->getCart->finishing_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->folding_id))
                        <b>Lipatan:</b> {{\App\Models\Folding::find($data->getCart->folding_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->front_side_id))
                        <b>Bagian Depan:</b> {{\App\Models\Front::find($data->getCart->front_side_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->back_side_id))
                        <b>Bagian Belakang:</b> {{\App\Models\BackSide::find($data->getCart->back_side_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->right_side_id))
                        <b>Lengan Kanan:</b> {{\App\Models\RightLeftSide::find($data->getCart->right_side_id)->name}}
                        <br>
                    @endif

                    @if(!empty($data->getCart->left_side_id))
                        <b>Lengan Kiri:</b> {{\App\Models\RightLeftSide::find($data->getCart->right_side_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->front_cover_id))
                        <b>Cover Depan:</b> {{\App\Models\Material::find($data->getCart->front_cover_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->back_cover_id))
                        <b>Cover Belakang:</b> {{\App\Models\Material::find($data->getCart->back_cover_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->binding_id))
                        <b>Jilid:</b> {{\App\Models\Finishing::find($data->getCart->binding_id)->name}}
                        <br>
                    @endif

                    @if(!empty($data->getCart->print_method_id))
                        <b>Metode
                            Cetak:</b> {{\App\Models\PrintingMethods::find($data->getCart->print_method_id)->name}}
                        <br>
                    @endif

                    @if(!empty($data->getCart->side_cover_id))
                        <b>Sisi Cover:</b> {{\App\Models\Side::find($data->getCart->side_cover_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->cover_lamination_id))
                        <b>Lamninasi
                            Cover:</b> {{\App\Models\Lamination::find($data->getCart->cover_lamination_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->lid_id))
                        <b>Tipe Lid:</b> {{\App\Models\Lid::find($data->getCart->lid_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->material_cover_id))
                        <b>Material Cover:</b> {{\App\Models\Material::find($data->getCart->material_cover_id)->name}}
                        <br>
                    @endif

                    @if(!empty($data->getCart->orientation_id))
                        <b>Orientasi:</b> {{\App\Models\Finishing::find($data->getCart->orientation_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->extra_id))
                        <b>Ekstra:</b> {{\App\Models\Finishing::find($data->getCart->extra_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->holder_id))
                        <b>Holder Kartu:</b> {{\App\Models\Finishing::find($data->getCart->holder_id)->name}}<br>
                    @endif

                    @if(!empty($data->getCart->material_color_id))
                        <b>Warna Material:</b> {{\App\Models\Colors::find($data->getCart->material_color_id)->name}}<br>
                    @endif
                </td>
                <td align="center">{{$data->getCart->qty}}</td>
                <td align="center">{{\Carbon\Carbon::parse($data->getCart->production_finished)->formatLocalized('%d %b %Y')}}</td>
                <td align="center">
                    @if($data->getCart->link)
                        Terlampir
                    @elseif($data->getCart->file)
                        {{$data->getCart->file}}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
