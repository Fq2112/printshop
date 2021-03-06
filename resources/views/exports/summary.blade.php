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
                <img src="{{public_path('images/logotype-invoice.png')}}" alt="logo" width="128">
                <div id="co-left">
                    {{env('APP_TITLE')}}<br>Raya Kenjeran 471 Gading, Tambaksari<br>
                    Surabaya, Jawa Timur &ndash; 60134<br>
                    {{__('lang.footer.phone')}}: (031) 3814969 | Fax: (031) 3814969<br>
                    {{env('APP_URL')}}<br>{{env('MAIL_USERNAME')}}
                </div>
            </td>
            <td id="co-right">
                <div class="uppercase">{{__('lang.order.invoice')}}</div>
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
                <b class="primary">{{__('lang.invoice.bill-to')}}</b><br>
               Nama RUmah<br>
                Alamat Lengkap<br>
               KOta Prov Postal Code
            </td>
            <td>
                <b class="primary">{{__('lang.order.invoice')}} #:</b> <br>
                <b class="primary">DOP:</b> {{now()->formatLocalized('%d %B %Y')}}<br>
                <b class="primary">P.O. #:</b> <br>
                <b class="primary">Due Date:</b> {{now()->addDay()->formatLocalized('%d %B %Y')}}
            </td>
        </tr>
    </table>

    <table id="items">
        <thead>
        <tr>
            <th><b>{{__('lang.breadcrumb.product')}}</b></th>
            <th class="center"><b>{{__('lang.product.form.summary.quantity')}}</b></th>
            <th class="center"><b>{{__('lang.product.form.summary.price', ['unit' => 'pcs'])}}</b></th>
            <th class="center"><b>{{__('lang.product.form.summary.ongkir')}}</b></th>
            <th class="center"><b>Total</b></th>
        </tr>
        </thead>
        <tbody>

        <tr class="ttl">
            <td class="right" colspan="4">SUBTOTAL</td>
            <td class="right">Rp</td>
        </tr>
        <tr class="ttl">
            <td class="right uppercase" colspan="4">Diskon</td>
            <td class="right">Jumlah Diskon</td>
        </tr>
        <tr class="ttl">
            <td class="right uppercase" colspan="4">{{__('lang.product.form.summary.ongkir')}}</td>
            <td class="right">Rp ongkor</td>
        </tr>
        <tr class="ttl">
            <td class="right" colspan="4">GRAND TOTAL</td>
            <td class="right">Rp TOtal</td>
        </tr>
        </tbody>
    </table>

    <hr style=" color: #f89406;">

    <div id="notes">

    </div>
</div>
</body>
</html>
