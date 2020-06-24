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
                    {{__('lang.footer.phone')}}: (031) 3814969 | Fax: (031) 3814969<br>
                    {{env('APP_URL')}}<br>{{env('MAIL_USERNAME')}}
                </div>
            </td>
            <td id="co-right">
                <div class="uppercase">#{{$code}}</div>
                <br><br>
                <div style="background: transparent">
                    {!! QrCode::size(100)->generate('indoprintZ.com'); !!}
                    <?php
                    $qrcode = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate('http://indoprint.co.id/en'));
                    ?>
                    <img src="data:image/png;base64, {!! $qrcode !!}">
                </div>
            </td>
        </tr>
    </table>

    <table id="billship" style="margin: 0 auto">
        <tr>
            <td style="font-size: 14px">
                <b class="primary">Kode Pesanan #{{$order->uni_code}} </b> <br>
                <b class="primary">Pembeli : </b> {{$order->getCart->getUser->name}}<br>
                <b class="primary">Tlpn :</b> {{$order->getCart->getUser->getBio->phone}}<br>
                <b class="primary">Tgl.
                    Pembayaran:</b> {{\Carbon\Carbon::parse($order->getCart->getPayment->updated_at)->formatLocalized('%d %B %Y')}}
                <br><br>
            </td>
            <td style="font-size: 14px">
                <b class="primary">Penerima</b><br>
                {{$order->getCart->getAddress->name}}<br>
                {{$order->getCart->getAddress->phone}}<br>
                {{$order->getCart->getAddress->address}}, {{$order->getCart->getAddress->postal_code}}
            </td>
        </tr>
    </table>

    <table id="items" style="font-size: 14px;margin-top: 0">
        <thead>
        <tr>
            <th><b>#</b></th>
            <th><b>Produk</b></th>
            <th><b>Kategori</b></th>
{{--            <th class="center"><b>{{__('lang.product.form.summary.price', ['unit' => 'pcs'])}}</b></th>--}}
            <th class="center"><b>Tgl. Cetak</b></th>
            <th class="center"><b>Qty</b></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>
                @if(!empty($order->getCart->subkategori_id))
                    {{$order->getCart->getSubKategori->name}}
                @elseif(!empty($order->getCart->cluster_id))
                    {{$order->getCart->getCluster->name}}
                @endif
            </td>
            <td>
                @if(!empty($order->getCart->subkategori_id))
                    {{$order->getCart->getSubKategori->getKategori->name}}
                @elseif(!empty($order->getCart->cluster_id))
                    {{$order->getCart->getCluster->getSubKategori->getKategori->name}}
                @endif
            </td>
{{--            <td align="center"> {{number_format(ceil($order->getCart->price_pcs), 2, ',', '.')}}</td>--}}
            <td align="center">{{\Carbon\Carbon::parse($order->getCart->production_finished)->formatLocalized('%d %B %Y')}}</td>
            <td align="center">
                {{$order->getCart->qty}}
            </td>
        </tr>
        </tbody>
    </table>

    <hr style=" color: #f89406;">

    <div id="notes">

    </div>
</div>
</body>
</html>
