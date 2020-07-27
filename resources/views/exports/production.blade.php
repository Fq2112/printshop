<!DOCTYPE html>
@php
    app()->setLocale('id');
    \Carbon\Carbon::setLocale('id');
    setlocale(LC_TIME, config('app.locale'));
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRODUCTION | INVOICE #{{$code}}</title>
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
                    Phone: (031) 3814969 | Fax: (031) 3814969<br>
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
            <td><b class="primary">INVOICE #{{$code}}</b><br></td>
        </tr>
    </table>

    <table id="items">
        <thead>
        <tr>
            <th><b>Produk Cetak</b></th>
            <th><b>Spesifikasi</b></th>
            <th class="center"><b>Qty.</b></th>
            <th class="center"><b>Due Date</b></th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->cart_ids as $data)
            @php
                $cart = \App\Models\Cart::find($data);
                $product = !is_null($cart->subkategori_id) ? $cart->getSubKategori : $cart->getCluster;
                $specs = !is_null($cart->subkategori_id) ? $cart->getSubKategori->getSubkatSpecs : $cart->getCluster->getClusterSpecs;
            @endphp
            <tr>
                <td>{{$product->name}}</td>
                <td>
                    @if(!empty($cart->material_id))
                        <b>Material:</b> {{\App\Models\Material::find($cart->material_id)->name}}<br>
                    @endif

                    @if(!empty($cart->type_id))
                        <b>Tipe:</b> {{\App\Models\TypeProduct::find($cart->type_id)->name}}<br>
                    @endif

                    @if(!empty($cart->balance_id))
                        <b>Saldo:</b> {{\App\Models\Balance::find($cart->balance_id)->name}}<br>
                    @endif

                    @if(!empty($cart->page_id))
                        <b>Lembar / Halaman:</b> {{\App\Models\Pages::find($cart->page_id)->name}}<br>
                    @endif

                    @if(!empty($cart->size_id))
                        <b>Ukuran Produk:</b> {{\App\Models\Size::find($cart->size_id)->name}}<br>
                    @endif

                    @if(!empty($cart->lamination_id))
                        <b>Laminasi:</b> {{\App\Models\Lamination::find($cart->lamination_id)->name}}<br>
                    @endif

                    @if(!empty($cart->side_id))
                        <b>Sisi:</b> {{\App\Models\Side::find($cart->side_id)->name}}<br>
                    @endif

                    @if(!empty($cart->edge_id))
                        <b>Tipe Sudut:</b> {{\App\Models\Edge::find($cart->edge_id)->name}}<br>
                    @endif

                    @if(!empty($cart->color_id))
                        <b>Warna:</b> {{\App\Models\Colors::find($cart->color_id)->name}}<br>
                    @endif

                    @if(!empty($cart->finishing_id))
                        <b>Finishing:</b> {{\App\Models\Finishing::find($cart->finishing_id)->name}}<br>
                    @endif

                    @if(!empty($cart->folding_id))
                        <b>Lipatan:</b> {{\App\Models\Folding::find($cart->folding_id)->name}}<br>
                    @endif

                    @if(!empty($cart->front_side_id))
                        <b>Bagian Depan:</b> {{\App\Models\Front::find($cart->front_side_id)->name}}<br>
                    @endif

                    @if(!empty($cart->back_side_id))
                        <b>Bagian Belakang:</b> {{\App\Models\BackSide::find($cart->back_side_id)->name}}<br>
                    @endif

                    @if(!empty($cart->right_side_id))
                        <b>Lengan Kanan:</b> {{\App\Models\RightLeftSide::find($cart->right_side_id)->name}}
                        <br>
                    @endif

                    @if(!empty($cart->left_side_id))
                        <b>Lengan Kiri:</b> {{\App\Models\RightLeftSide::find($cart->right_side_id)->name}}<br>
                    @endif

                    @if(!empty($cart->front_cover_id))
                        <b>Cover Depan:</b> {{\App\Models\Material::find($cart->front_cover_id)->name}}<br>
                    @endif

                    @if(!empty($cart->back_cover_id))
                        <b>Cover Belakang:</b> {{\App\Models\Material::find($cart->back_cover_id)->name}}<br>
                    @endif

                    @if(!empty($cart->binding_id))
                        <b>Jilid:</b> {{\App\Models\Finishing::find($cart->binding_id)->name}}
                        <br>
                    @endif

                    @if(!empty($cart->print_method_id))
                        <b>Metode
                            Cetak:</b> {{\App\Models\PrintingMethods::find($cart->print_method_id)->name}}
                        <br>
                    @endif

                    @if(!empty($cart->side_cover_id))
                        <b>Sisi Cover:</b> {{\App\Models\Side::find($cart->side_cover_id)->name}}<br>
                    @endif

                    @if(!empty($cart->cover_lamination_id))
                        <b>Lamninasi
                            Cover:</b> {{\App\Models\Lamination::find($cart->cover_lamination_id)->name}}<br>
                    @endif

                    @if(!empty($cart->lid_id))
                        <b>Tipe Lid:</b> {{\App\Models\Lid::find($cart->lid_id)->name}}<br>
                    @endif

                        @if(!empty($cart->material_cover_id))
                            <b>Material Cover:</b> {{\App\Models\Material::find($cart->material_cover_id)->name}}
                            <br>
                        @endif

                        @if(!empty($cart->orientation_id))
                            <b>Orientasi:</b> {{\App\Models\Finishing::find($cart->orientation_id)->name}}<br>
                        @endif

                        @if(!empty($cart->extra_id))
                            <b>Ekstra:</b> {{\App\Models\Finishing::find($cart->extra_id)->name}}<br>
                        @endif

                        @if(!empty($cart->holder_id))
                            <b>Holder Kartu:</b> {{\App\Models\Finishing::find($cart->holder_id)->name}}<br>
                        @endif

                        @if(!empty($cart->material_color_id))
                            <b>Warna Material:</b> {{\App\Models\Colors::find($cart->material_color_id)->name}}<br>
                        @endif
                        <br><b>File Desain:</b> {{!is_null($cart->link) ? $cart->link : $cart->file}}
                </td>
                <td align="center">{{$cart->qty.' '.$specs->getUnit->name}}</td>
                <td align="center">
                    {{\Carbon\Carbon::parse($cart->production_finished)->formatLocalized('%d %B %Y')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
