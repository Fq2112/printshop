<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scaleable=no">
    <title>{{__('lang.title')}}</title>
    <style type="text/css">
        .alert {
            padding: 15px;
            margin: 0 1.5em 1em 1.5em;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert h4 {
            margin-top: 0;
            color: inherit;
        }

        .alert .alert-link {
            font-weight: bold;
        }

        .alert > p,
        .alert > ul {
            margin-bottom: 0;
        }

        .alert > p + p {
            margin-top: 5px;
        }

        .alert-dismissable,
        .alert-dismissible {
            padding-right: 35px;
        }

        .alert-dismissable .close,
        .alert-dismissible .close {
            position: relative;
            top: -2px;
            right: -21px;
            color: inherit;
        }

        .alert-success {
            background-color: #dff0d8;
            border-color: #d6e9c6;
            color: #3c763d;
        }

        .alert-success hr {
            border-top-color: #c9e2b3;
        }

        .alert-success .alert-link {
            color: #2b542c;
        }

        .alert-info {
            background-color: #d9edf7;
            border-color: #bce8f1;
            color: #31708f;
        }

        .alert-info hr {
            border-top-color: #a6e1ec;
        }

        .alert-info .alert-link {
            color: #245269;
        }

        .alert-warning {
            background-color: #fcf8e3;
            border-color: #faebcc;
            color: #8a6d3b;
        }

        .alert-warning hr {
            border-top-color: #f7e1b5;
        }

        .alert-warning .alert-link {
            color: #66512c;
        }

        .alert-danger {
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }

        .alert-danger hr {
            border-top-color: #e4b9c0;
        }

        .alert-danger .alert-link {
            color: #843534;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        blockquote {
            padding: 10px 20px;
            margin: 0 0 20px;
            font-size: 17.5px;
            border-left: 5px solid #eeeeee;
        }

        blockquote p:last-child,
        blockquote ul:last-child,
        blockquote ol:last-child {
            margin-bottom: 0;
        }

        blockquote footer,
        blockquote small,
        blockquote .small {
            display: block;
            font-size: 80%;
            line-height: 1.42857;
            color: #777777;
        }

        blockquote footer:before,
        blockquote small:before,
        blockquote .small:before {
            content: '\2014 \00A0';
        }

        .blockquote-reverse,
        blockquote.pull-right {
            padding-right: 15px;
            padding-left: 0;
            border-right: 5px solid #eeeeee;
            border-left: 0;
            text-align: right;
        }

        .blockquote-reverse footer:before,
        .blockquote-reverse small:before,
        .blockquote-reverse .small:before,
        blockquote.pull-right footer:before,
        blockquote.pull-right small:before,
        blockquote.pull-right .small:before {
            content: '';
        }

        .blockquote-reverse footer:after,
        .blockquote-reverse small:after,
        .blockquote-reverse .small:after,
        blockquote.pull-right footer:after,
        blockquote.pull-right small:after,
        blockquote.pull-right .small:after {
            content: '\00A0 \2014';
        }

        .list-inline {
            padding-left: 0;
            list-style: none;
            margin-left: -5px;
        }

        .list-inline > li {
            display: inline-block;
            padding-left: 5px;
            padding-right: 5px;
        }

        .hr-divider {
            margin: 0 0 .5em 0;
            border: 0;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, .4), rgba(0, 0, 0, .1), rgba(0, 0, 0, 0));
        }

        #activate {
            color: #FFFFFF;
            background: #f89406;
            -moz-border-radius: 9px;
            -webkit-border-radius: 9px;
            border-radius: 9px;
            padding-left: 20px;
            padding-right: 20px;
            width: 320px;
            display: block;
            font-size: 18px;
            font-weight: bold;
            line-height: 50px;
            text-align: center;
            text-decoration: none;
            font-family: helvetica, arial;
            text-transform: uppercase;
        }

        .zoom {
            transition: transform .3s;
        }

        .zoom:hover {
            -ms-transform: scale(1.3); /* IE 9 */
            -webkit-transform: scale(1.3); /* Safari 3-8 */
            transform: scale(1.3);
        }

        div, p, a, li, td {
            -webkit-text-size-adjust: none;
        }

        .ExternalClass * {
            line-height: 100%
        }

        .ReadMsgBody {
            width: 100%
        }

        .ExternalClass {
            width: 100%
        }

        .appleLinks a {
            color: #646464;
            text-decoration: none;
        }

        table {
            border-collapse: collapse;
        }

        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }

        .appleLinksWhite a {
            color: #949494;
            text-decoration: none;
        }

        table.custom td div {
            margin-bottom: 1.3em;
        }

        .alizarin {
            background: #fa5555
        }

        .amethyst {
            background: #9b59b6
        }

        .emerald {
            background: #2ecc71
        }

        .midnight-blue {
            background: #2c3e50
        }

        .peter-river {
            background: #3498db
        }

        .dl {
            width: 60%;
            background: #f0f0f0;
            padding: 30px 0;
            border-radius: 20px;
            position: relative;
        }

        .dl:before {
            content: " ";
            height: 20px;
            width: 20px;
            background: #ddd;
            border-radius: 20px;
            position: absolute;
            left: 50%;
            top: 20px;
            margin-left: -10px
        }

        .dl .brand {
            text-transform: uppercase;
            letter-spacing: 3px;
            padding: 10px 15px;
            margin-top: 10px;
            text-align: center;
            min-height: 100px
        }

        .dl .discount {
            min-height: 50px;
            position: relative;
            font-size: 80px;
            line-height: 65px;
            text-align: center;
            font-weight: 700;
            padding: 20px 15px 10px;
            color: #f1c40f
        }

        .dl .discount:after {
            content: " ";
            border-right: 20px solid transparent;
            border-left: 20px solid transparent;
            position: absolute;
            bottom: -20px;
            left: 20%;
        }

        .dl .discount.alizarin:after {
            border-top: 20px solid #fa5555
        }

        .dl .discount.peter-river:after {
            border-top: 20px solid #3498db
        }

        .dl .discount.emerald:after {
            border-top: 20px solid #2ecc71
        }

        .dl .discount.amethyst:after {
            border-top: 20px solid #9b59b6
        }

        .dl .discount .type {
            font-size: 25px;
            letter-spacing: 1px;
            text-transform: uppercase;
            line-height: 40px;
        }

        .dl .descr {
            color: #999;
            margin-top: 10px;
            padding: 20px 15px
        }

        .dl .ends {
            padding: 0 15px;
            color: #f1c40f;
            margin-bottom: 10px
        }

        .dl .coupon {
            min-height: 50px;
            text-align: center;
            text-transform: uppercase;
            font-weight: 700;
            font-size: 18px;
            padding: 20px 15px
        }

        .dl .coupon a.open-code {
            color: #16a085;
            text-decoration: none;
        }

        .dl .coupon .code {
            letter-spacing: 1px;
            border-radius: 4px;
            margin-top: 10px;
            padding: 10px 15px;
            color: #f1c40f;
            background: #f0f0f0
        }

        @media screen and (max-width: 480px) {
            /* Width Control */
            table[class=full-width], img[class=full-width], a[class=full-width], div[class=full-width] {
                width: 100% !important;
                height: auto !important;
            }

            div[class=line40] {
                line-height: 40px !important;
            }

            /* Hiding Elements */
            table[id=hide], td[class="hide"], img[id=hide] {
                display: none !important;
            }

            img[class=logo] {
                width: 240px !important;
                height: 75px !important;
            }
        }

        /* Medium Screen Tablets */
        @media screen and (max-width: 650px) {
            img[class=logo] {
                width: 240px !important;
                height: 75px !important;
            }

            a[class=footerlinks] {
                display: block !important;
                font-size: 16px !important;
                padding: 0px 4px 2px 4px !important;
                line-height: 14px !important;
                width: 70% !important;
                text-align: center !important;
                color: #F9F9F9 !important;
                text-decoration: none !important;
            }

            table[class=full-width], img[class=full-width], a[class=full-width], div[class=full-width] {
                width: 100% !important;
                height: auto !important;
            }

            table[class=hide], img[class=hide], td[class=hide], span[class=hide] {
                display: none !important;
            }

            div[class=line40] {
                line-height: 40px !important;
            }

            td[class=headline] {
                padding-left: 10px !important;
            }

            span[class=content2] {
                font-size: 18px !important;
            }

            span[class=appleLinksWhite] {
                color: #949494 !important;
            }

            td[class=body], span[class=body] {
                padding-right: 25px !important;
                padding-left: 25px !important;
                font-size: 20px !important;
            }

            td[class=footer-padding] {
                padding-right: 15px !important;
                padding-left: 15px !important;
            }

            img[class=social-icons] {
                height: 90px !important;
                width: auto !important;
            }
        }
    </style>
</head>
<body>
<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="#FAFAFA" class="full-width">
    <tbody>
    <tr>
        <td>
            <div style="font-size:10px;line-height:10px;">&nbsp;</div>
        </td>
    </tr>
    </tbody>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FAFAFA">
    <tbody>
    <tr>
        <td align="center">
            <table width="700" border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF"
                   class="full-width" style="margin:0 auto;">
                <tbody>
                <tr>
                    <td width="700" align="center">
                        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"
                               class="full-width" style="margin:0 auto;">
                            <tbody>
                            <tr>
                                <td width="14" bgcolor="#fafafa"></td>
                                <td width="2" bgcolor="#f9f9f9"></td>
                                <td width="2" bgcolor="#f7f7f7"></td>
                                <td width="2" bgcolor="#f3f3f3"></td>
                                <td width="660" valign="top" bgcolor="#FFFFFF">
                                    <table width="660" border="0" cellspacing="0" cellpadding="0" class="full-width"
                                           bgcolor="#FFFFFF" style="border-top: 2px solid #f3f3f3">
                                        <tbody>
                                        <tr>
                                            <td align="center" width="660">
                                                <a name="Logo" style="display:block" href="{{route('beranda')}}"
                                                   target="_blank">
                                                    <img src="{{asset('images/logotype.png')}}" border="0"
                                                         style="display:block;width: 25%;margin: 1em" class="logo"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="border-top: 1px solid #e0e0e0; width: 660px; height: 2px"
                                                     class="full-width"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="font-size:30px;line-height:29px;">&nbsp;</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="font-size:30px;line-height:30px;">&nbsp;</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="10" cellspacing="0"
                                                       style="margin: .5em 1em">
                                                    <tr>
                                                        <td>
                                                            {!! $data['body-message'] !!}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="660" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#FFFFFF" class="full-width">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div style="font-size:20px;line-height:20px;">&nbsp;</div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    @if(!is_null($promo))
                                        <table bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" width="660"
                                               align="center" style="border-top: 2px solid #f3f3f3">
                                            <tr>
                                                <td>
                                                    <table border="0" cellpadding="10" cellspacing="0"
                                                           style="margin: .5em 1em">
                                                        <tr>
                                                            <td align="center" width="600" class="full-width"
                                                                style="padding-left: 20px; padding-right:20px"
                                                                valign="top">
                                                                <div class="dl">
                                                                    <div class="brand">
                                                                        <h2>Discount Voucher</h2>
                                                                    </div>
                                                                    <div class="discount alizarin">{{$promo->discount}}%
                                                                        <div class="type">off</div>
                                                                    </div>
                                                                    <div class="descr">
                                                                        {{$promo->description}}
                                                                    </div>
                                                                    <div class="ends">
                                                                        <small>*
                                                                            Expires: {{\Carbon\Carbon::parse($promo->end)->format('l, j F Y')}}
                                                                            .</small>
                                                                    </div>
                                                                    <div class="coupon midnight-blue">
                                                                        <a data-toggle="collapse" href="#code-1"
                                                                           class="open-code">Use Promo Code</a>
                                                                        <div id="code-1" class="collapse code">
                                                                            {{$promo->promo_code}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    @endif

                                    <table width="660" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#FFFFFF" class="full-width">

                                        <tbody>
                                        <tr>
                                            <td>
                                                <div style="font-size:20px;line-height:19px;">&nbsp;</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="660">
                                                <div style="border-bottom: 1px solid #e0e0e0; width: 660px; height:2px;"
                                                     class="full-width"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="font-size:20px;line-height:40px;">&nbsp;</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="660" border="0" align="center" cellspacing="0"
                                                       cellpadding="0" bgcolor="#FFFFFF" class="full-width"
                                                       style="color: #949494">
                                                    <tbody>

                                                    <tr>
                                                        <td>
                                                            <div style="font-size:15px;line-height:15px;">&nbsp;</div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" width="600" class="full-width"
                                                            style="padding-left: 20px; padding-right:20px" valign="top">
                                                            <a class="zoom" id="activate" href="{{route('beranda')}}"
                                                               target="_blank">
                                                                {{__('lang.button.shop')}}</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="show">
                                                            <div style="font-size:20px;line-height:0px;" class="line40">
                                                                &nbsp;
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="2" bgcolor="#f3f3f3"></td>
                                <td width="2" bgcolor="#f7f7f7"></td>
                                <td width="2" bgcolor="#f9f9f9"></td>
                                <td width="14" bgcolor="#fafafa"></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
    <tbody>
    <tr>
        <td valign="top" align="center">
            <table width="700" border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                   class="full-width" style="margin:0 auto;">
                <tbody>
                <tr>
                    <td valign="top" width="20" class="hide" bgcolor="#1a1c21">
                        <div style="font-size:44px;line-height:44px;">&nbsp;</div>
                    </td>
                    <td valign="top" width="660" bgcolor="#FFFFFF" class="hide" height="40" alt="" border="0"></td>
                    <td valign="top" width="20" class="hide" bgcolor="#1a1c21">
                        <div style="font-size:44px;line-height:44px;">&nbsp;</div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table width="700" border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="#1a1c21"
                   class="full-width" style="margin:0 auto;">
                <tbody>
                <tr>
                    <td valign="top" align="center">
                        <table width="700" border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="#1a1c21"
                               class="full-width">
                            <tbody>
                            <tr>
                                <td valign="top" align="center">
                                    <table width="700" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#1a1c21" class="full-width">
                                        <tbody>
                                        <tr>
                                            <td valign="top" width="660" bgcolor="#1a1c21">
                                                <div style="font-size:39px;line-height:39px;">&nbsp;</div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="700" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#1a1c21" class="full-width">
                                        <tbody>
                                        <tr>
                                            <td valign="top" width="20" class="hide">&nbsp;</td>
                                            <td align="center" valign="top" width="660" bgcolor="#1a1c21">
                                                <a name="Logo_1" style="display:block;" href="{{route('beranda')}}"
                                                   target="_blank">
                                                    <img src="{{asset('images/logotype-footer.png')}}" alt="logo"
                                                         border="0" style="display:block;width: 64px;"></a>
                                            </td>
                                            <td valign="top" width="20" class="hide">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="700" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#1a1c21" class="full-width">
                                        <tbody>
                                        <tr>
                                            <td valign="top" width="20" class="hide">&nbsp;</td>
                                            <td align="center" valign="top" width="660" bgcolor="#1a1c21">
                                                <div style="font-size:5px;line-height:5px;">&nbsp;</div>
                                            </td>
                                            <td valign="top" width="20" class="hide">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="700" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#1a1c21" class="full-width">
                                        <tbody>
                                        <tr>
                                            <td align="center" valign="top" width="660" bgcolor="#1a1c21">
                                                <div style="font-size:25px;line-height:25px;">&nbsp;</div>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="700" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#1a1c21" class="full-width">
                                        <tbody>
                                        <tr>
                                            <td align="center" valign="top" width="660" bgcolor="#1a1c21"
                                                style="font-family:Helvetica, arial,helv,sans-serif;font-size:12px;color:#F9F9F9;">
                                                {{__('lang.mail.content.footer')}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" width="700">
                                                <table width="700" border="0" align="center" cellpadding="0"
                                                       cellspacing="0" bgcolor="#1a1c21" class="full-width">
                                                    <tbody>
                                                    <tr>
                                                        <td align="center">
                                                            <table border="0" align="center" cellpadding="0"
                                                                   cellspacing="0" bgcolor="#1a1c21">
                                                                <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                        <a href="https://fb.com/pages/Premiere-Digital-Printing/164943546903733"
                                                                           name="Facebook" target="_blank">
                                                                            <img class="social-icons"
                                                                                 src="https://cdn.shazam.com/shazamauth/facebook.jpg"
                                                                                 width="34" height="50" alt="Facebook"
                                                                                 style="display:block" border="0"></a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="https://instagram.com/premierprintingsby"
                                                                           name="Instagram" target="_blank"><img
                                                                                class="social-icons"
                                                                                src="https://cdn.shazam.com/shazamauth/instagram.jpg"
                                                                                width="39" height="50"
                                                                                style="display:block" border="0"
                                                                                alt="Instagram"></a>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="700" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#1a1c21" class="full-width">
                                        <tbody>
                                        <tr>
                                            <td align="center" valign="top" width="660" bgcolor="#1a1c21">
                                                <div style="font-size:25px;line-height:25px;">&nbsp;</div>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="700" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#1a1c21" class="full-width">
                                        <tbody>
                                        <tr>
                                            <td valign="top" width="700">
                                                <table width="700" border="0" align="center" cellpadding="0"
                                                       cellspacing="0" bgcolor="#1a1c21" class="full-width">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0"
                                                                   width="700" class="full-width" bgcolor="#1a1c21">
                                                                <tbody>
                                                                <tr>
                                                                    <td align="center"
                                                                        style="font-family:Helvetica, arial,helv,sans-serif;font-size:16px;color:#F9F9F9; font-weight:bold;"
                                                                        bgcolor="#1a1c21">
                                                                        <a class="footerlinks" target="_blank"
                                                                           style="color:#F9F9F9; text-decoration:none;"
                                                                           href="{{route('syarat-ketentuan')}}">{{__('lang.footer.tnc')}}</a>
                                                                        <a class="footerlinks" target="_blank"
                                                                           style="color:#F9F9F9; text-decoration:none;"
                                                                           href="{{route('kebijakan-privasi')}}">{{__('lang.footer.pp')}}</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="700" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#1a1c21" class="full-width">
                                        <tbody>
                                        <tr>
                                            <td align="center" valign="top" width="660" bgcolor="#1a1c21">
                                                <div style="font-size:25px;line-height:25px;">&nbsp;</div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="700" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#1a1c21" class="full-width">
                                        <tbody>
                                        <tr>
                                            <td align="center" valign="top" width="620" bgcolor="#1a1c21">
                                                <table width="93%" border="0" align="center" cellspacing="0"
                                                       cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td align="center" height="1">
                                                            <table width="660" border="0" align="center" cellspacing="0"
                                                                   cellpadding="0" class="full-width">
                                                                <tbody>
                                                                <tr>
                                                                    <td align="center" height="1" bgcolor="#646464">
                                                                        <div style="font-size:1px;line-height:1px;">
                                                                            &nbsp;
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="700" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#1a1c21" class="full-width">
                                        <tbody>
                                        <tr>
                                            <td align="center" valign="top" width="660" bgcolor="#1a1c21">
                                                <div style="font-size:25px;line-height:25px;">&nbsp;</div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="700" border="0" align="center" cellspacing="0" cellpadding="0"
                                           bgcolor="#1a1c21" class="full-width">
                                        <tbody>
                                        <tr>
                                            <td valign="top" width="700">
                                                <table width="700" border="0" align="center" cellpadding="0"
                                                       cellspacing="0" bgcolor="#1a1c21" class="full-width">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0"
                                                                   width="700" class="full-width" bgcolor="#1a1c21">
                                                                <tbody>
                                                                <tr>
                                                                    <td align="center" class="footer-padding"
                                                                        style="font-family:Helvetica, arial,helv,sans-serif;font-size:10px; color:#949494; font-weight:bold; padding-left:20px; padding-right:20px"
                                                                        bgcolor="#1a1c21">
                                                                        <span class="appleLinksWhite">© {{now()->format('Y').' '.env('APP_TITLE')}}. All rights reserved. Raya Kenjeran 471, Surabaya &ndash; 60134, East Java, Indonesia.</span>
                                                                        <br>
                                                                        <div id="stat-div"
                                                                             style="visibility:hidden !important;"
                                                                             height="0px">
                                                                            <img id="stat-link"
                                                                                 src="https://www.shazam.com/validate-email/email-view?email=matt@reallygoodemails.com"
                                                                                 alt="" border="0" width="0px"
                                                                                 height="0px"
                                                                                 style="visibility:hidden !important;">
                                                                        </div>
                                                                        <br>
                                                                        <br>
                                                                        <br></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
