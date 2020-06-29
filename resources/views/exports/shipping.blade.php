<!DOCTYPE html>
@php
    app()->setLocale('id');
    \Carbon\Carbon::setLocale('id');
    setlocale(LC_TIME, config('app.locale'));
    $cart = $order->getCart;
    $product = !is_null($cart->subkategori_id) ? $cart->getSubKategori : $cart->getCluster;
    $specs = !is_null($cart->subkategori_id) ? $cart->getSubKategori->getSubkatSpecs : $cart->getCluster->getClusterSpecs;
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SHIPPING LABEL | INVOICE #{{$code}}</title>
    <style>
        html, body {
            font-family: sans-serif;
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
            font-size: .95em;
            color: #888
        }

        #co-right {
            vertical-align: center
        }

        #co-right div {
            float: right;
            text-align: center;
            font-size: 14px;
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
<div id="invoice" style="border:1px solid black;">
    <table id="company" style="margin-bottom: 0">
        <tr>
            <td>
                <img src="{{public_path('images/logotype-invoice.png')}}" alt="logo" style="margin-bottom: 0">
                <div id="co-left" style="margin-top: 0">
                    {{env('APP_TITLE')}}<br>Raya Kenjeran 469 Gading, Tambaksari<br>
                    Surabaya, Jawa Timur &ndash; 60134<br>
                    Phone: (031) 3814969<br>Fax: (031) 3814969<br>
                    {{env('APP_URL')}}<br>{{env('MAIL_USERNAME')}}
                </div>
            </td>
            <td id="co-right">
                <div class="uppercase">#{{$code}}</div>
                <br><br>
                <div style="background: transparent">
                    <img alt="QR Code"
                         src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate(asset('storage/users/order/invoice/'.$cart->user_id.'/'.$code))) !!}">
                </div>
            </td>
        </tr>
    </table>

    <table id="billship" style="margin: 0 auto">
        <tr>
            <td style="font-size: 14px">
                <b class="primary">Order ID #{{$order->uni_code}}</b><br>
                <b class="primary">Pemesan: </b>{{$cart->getUser->name}}<br>
                <b class="primary">Telepon: </b>{{$cart->getUser->getBio->phone}}<br>
                <b class="primary">Pembayaran: </b>{{\Carbon\Carbon::parse($cart->getPayment->updated_at)->formatLocalized('%d %B %Y pukul %H:%I')}}
            </td>
            <td style="font-size: 14px">
                <b class="primary">Penerima</b><br>
                {{$cart->getAddress->name}}<br>
                {{$cart->getAddress->phone}}<br>
                {{$cart->getAddress->address}}, {{$cart->getAddress->postal_code}}
            </td>
        </tr>
    </table>

    <table id="items" style="font-size: 14px;margin-top: 0">
        <thead>
        <tr>
            <th><b>Produk Cetak</b></th>
            <th><b>Kategori</b></th>
            {{--            <th class="center"><b>{{__('lang.product.form.summary.price', ['unit' => 'pcs'])}}</b></th>--}}
            <th class="center"><b>Tgl. Cetak</b></th>
            <th class="center"><b>Qty.</b></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$product->name}}</td>
            <td>{{!is_null($cart->subkategori_id) ? $cart->getSubKategori->getKategori->name : $cart->getCluster->getSubKategori->name}}</td>
            {{--            <td align="center"> {{number_format(ceil($cart->price_pcs), 2, ',', '.')}}</td>--}}
            <td align="center">{{\Carbon\Carbon::parse($cart->production_finished)->formatLocalized('%d %B %Y')}}</td>
            <td align="center">{{$cart->qty.' '.$specs->getUnit->name}}</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
