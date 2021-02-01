<!DOCTYPE html>
@php
    app()->setLocale('id');
    \Carbon\Carbon::setLocale('id');
    setlocale(LC_TIME, config('app.locale'));
   // $cart = $order->getCart;
    //$product = !is_null($cart->subkategori_id) ? $cart->getSubKategori : $cart->getCluster;
    //$specs = !is_null($cart->subkategori_id) ? $cart->getSubKategori->getSubkatSpecs : $cart->getCluster->getClusterSpecs;
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SHIPPING LABEL | INVOICE #</title>
    <style>
        html, body {
            font-family: sans-serif;
            font-size: 8pt;
        }

        #invoice {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
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
            font-size: 8pt;
            color: #888
        }

        #co-right {
            vertical-align: center
        }

        #co-right div {
            float: right;
            text-align: center;
            font-size: 8pt;
            padding: 10px;
            color: #fff;
            width: 240px;
            background: #f89406;
        }

        #items td, #items th {
            font-size: 8pt;
            font-weight: 400;
            border-bottom: 3px solid #fff
        }

        #billship td, #items td, #items th, #notes {
            padding: 10px
        }

        #specs {
            font-size: 8pt;
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
<div id="invoice" style="border:1px solid black;">
    <!-- Header -->
    <table id="company" style="margin-bottom: 0">
        <tr>
            <td>
                <img src="{{public_path('images/logotype-invoice.png')}}" alt="logo"
                     style="margin-bottom: 0;width: 64px">
            </td>
            <td style="color: white">asdasdasdasdasdasdasdasdasd</td>
            <td align="left">
                <img src="{{asset($data->rate_logo)}}" alt="" style="width: 60px">
            </td>
        </tr>
    </table>
    <!-- Origin -->
    <table id="company" style="margin-bottom: 0" width="100%">
        <tr>
            <td>
                <div id="co-left" style="margin-top: 0">
                    {{env('APP_TITLE')}}<br>Raya Kenjeran 471 Gading, Tambaksari<br>
                    Surabaya, Jawa Timur &ndash; 60134<br>
                    Phone: (031) 3814969<br>Fax: (031) 3814969<br>
                </div>
                <br>
                <div class="uppercase" style="
                text-align: center;
                font-size: 8pt;
                padding: 5px;
                color: #fff;
                width: 240px;
                background: #f89406;">#{{$data->uni_code_payment}}</div>
            </td>

            <td align="center">
                <div style="background: transparent">

                    <img alt="QR Code"
                         src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(75)->errorCorrection('H')->generate(asset('storage/users/order/invoice/'.$data->user_id.'/'.$data->uni_code_payment))) !!}">
                </div>

            </td>
        </tr>
    </table>
    <hr>
    <!-- Destination -->
    <table id="">
        <tr>
            <td id="co-left" style="font-size: 10px">
                <b class="primary">Penerima</b><br>
                {{$data->getUser->name}} <br>
                {{$detail['detail']['destination']['address']}} Kel. {{$detail['detail']['destination']['areaName']}}
                Kec. {{$detail['detail']['destination']['suburbName']}} {{$detail['detail']['destination']['cityName']}}
                - {{$detail['detail']['destination']['provinceName']}} ({{$detail['detail']['destination']['postcode']}}
                ) <br>
                Telepon: {{$data->getUser->getBio->phone}}<br>
                Pembayaran: {{\Carbon\Carbon::parse($data->updated_at)->formatLocalized('%d %B %Y pukul %H:%I')}}

            </td>
            <td style="font-size: 14px">
            </td>
        </tr>
    </table>
    <hr>

    <!-- Item -->
    <table id="items" style="font-size: 14px;margin-top: 0">
        <thead>
        <tr>
            <th><b>Produk Cetak</b></th>
            <th class="center"><b>Qty.</b></th>
            <th class="center"><b>Berat (Kg)</b></th>
        </tr>
        </thead>
        <tbody>
        <?
        $weightTotal = 0;
        ?>
        @foreach($data->cart_ids as $item)
            <?
            $cart = \App\Models\Cart::find($item);
            $product = !is_null($cart->subkategori_id) ? $cart->getSubKategori : $cart->getCluster;
            $specs = !is_null($cart->subkategori_id) ? $cart->getSubKategori->getSubkatSpecs : $cart->getCluster->getClusterSpecs;
            $weight = ($specs->weight / 1000) * $cart->qty;
            $weightTotal = $weightTotal + $weight;
            ?>
            <tr>
                <td>{{$product->name}}</td>
                <td align="center">{{$cart->qty}} pcs</td>
                <td align="center">{{$weight}} </td>
            </tr>
            <?

            ?>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2" align="right"><strong>Total Berat :</strong></td>
            <td align="center">{{$weightTotal}}
                <small>{{$detail['detail']['package']['weight']['UoM']}} </small></td>
        </tr>
        <tr>
            <td align="right" colspan="2"><strong>Kurir / Jenis :</strong></td>
            <td align="center">{{$detail['detail']['courier']['name']}} / {{$detail['detail']['courier']['rate_name']}}

            </td>
        </tr>
        {{--        <tr >--}}
        {{--            <td align="right">Asuransi :</td>--}}
        {{--            <td align="left">Rp {{number_format($detail['detail']['rates']['insurance']['value'])}}</td>--}}
        {{--        </tr>--}}
        <tr>
            <td align="right" colspan="2"><strong>Biaya Kirim :</strong></td>
            <td align="center">Rp {{number_format($detail['detail']['courier']['rate']['value'])}}</td>
        </tr>
        </tfoot>
    </table>

</div>
</body>
</html>
