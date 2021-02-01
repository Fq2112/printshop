<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{strtoupper(__('lang.order.invoice')).' #'.$code}}</title>
    <style>
        html, body {
            font-family: sans-serif;
        }

        #invoice {
            max-width: 800px;
            margin: 0 auto
        }

        #billship, #company, #msc {
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

        #billship td, #msc td, #items td, #items th {
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

        #billship, #company, #items, #msc {
            width: 100%;
            border-collapse: collapse
        }

        #billship td, #msc td {
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
                    <img src="{{$data->finish_payment == true ? public_path('images/stamp_paid.png') :
                    public_path('images/stamp_unpaid.png')}}" alt="logo">
                </div>
            </td>
        </tr>
    </table>

    <table id="billship">
        <tr>
            <td>
                <b class="primary">{{__('lang.invoice.bill-to')}}</b><br>
                {{$data->getBillingAddress->name}}<br>
                {{$data->getBillingAddress->address}}
            </td>
            <td>
                <b class="primary">{{__('lang.invoice.ship-to')}}</b><br>
                {{$data->getShippingAddress->name}}<br>
                {{$data->getShippingAddress->address}}
            </td>
            <td>
                <b class="primary">{{__('lang.order.invoice')}} #:</b> {{$code}}<br>
                <b class="primary">DOP:</b> {{now()->formatLocalized('%d %B %Y')}}<br>
                <b class="primary">P.O. #:</b> {{str_pad($data->id,14,0,STR_PAD_LEFT)}}<br>
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
            <th class="center"><b>{{__('lang.product.form.summary.weight')}}</b></th>
            <th class="center"><b>Total</b></th>
        </tr>
        </thead>
        <tbody>
        @php $subtotal = 0; @endphp
        @foreach(\App\Models\Cart::whereIn('id', $data->cart_ids)->get() as $cart)
            @php
                $data_cart = !is_null($cart->subkategori_id) ? $cart->getSubKategori : $cart->getCluster;
                $specs = !is_null($cart->subkategori_id) ? $data_cart->getSubkatSpecs : $data_cart->getClusterSpecs;
                $subtotal += $cart->total;
                $weight = ($specs->weight / 1000) * $cart->qty;
            @endphp
            <tr>
                <td>
                    <div><b>{{$data_cart->name}}</b></div>
                    <table id="specs">
                        <tr>
                            <td colspan="3" class="uppercase">{{__('lang.product.form.summary.specification')}}</td>
                        </tr>
                        @if($specs->is_type == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.type')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\TypeProduct::find($cart->type_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_material_cover == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.cover_material')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Material::find($cart->material_cover_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_side_cover == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.cover_side')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Side::find($cart->side_cover_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_cover_lamination == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.cover_lamination')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Lamination::find($cart->cover_lamination_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_material == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.materials')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Material::find($cart->material_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_material_color == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.material_color')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Colors::find($cart->material_color_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_color == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.color')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Colors::find($cart->color_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_print_method == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.print_method')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\PrintingMethods::find($cart->print_method_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_size == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.size')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Size::find($cart->size_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_side == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.side')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Side::find($cart->side_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_holder == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.holder')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Finishing::find($cart->holder_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_lid == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.lid')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Lid::find($cart->lid_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_edge == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.corner')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Edge::find($cart->edge_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_folding == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.folding')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Folding::find($cart->folding_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_front_side == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.front_side')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Front::find($cart->front_side_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_back_side == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.back_side')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\BackSide::find($cart->back_side_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_right_side == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.right_side')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\RightLeftSide::find($cart->right_side_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_left_side == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.left_side')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\RightLeftSide::find($cart->left_side_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_balance == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.balance')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Balance::find($cart->balance_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_copies == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.copies')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Copies::find($cart->copies_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_page == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.page')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Pages::find($cart->page_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_front_cover == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.front_cover')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Material::find($cart->front_cover_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_back_cover == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.back_cover')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Material::find($cart->back_cover_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_orientation == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.orientation')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Finishing::find($cart->orientation_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_binding == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.binding')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Finishing::find($cart->binding_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_lamination == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.lamination')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Lamination::find($cart->lamination_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_finishing == true)
                            <tr>
                                <td>
                                    Finishing
                                </td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Finishing::find($cart->finishing_id)->name}}</td>
                            </tr>
                        @endif
                        @if($specs->is_extra == true)
                            <tr>
                                <td>{{__('lang.product.form.summary.extra')}}</td>
                                <td>:&nbsp;</td>
                                <td>{{\App\Models\Finishing::find($cart->extra_id)->name}}</td>
                            </tr>
                        @endif
                        @if(!is_null($cart->note))
                            <tr>
                                <td style="text-transform: capitalize">{{strtolower(__('lang.tooltip.note'))}}</td>
                                <td>:&nbsp;</td>
                                <td>{{$cart->note}}</td>
                            </tr>
                        @endif
                    </table>
                </td>
                <td class="center">{{$cart->qty}}</td>
                <td class="center">Rp{{number_format($cart->price_pcs,2,',','.')}}</td>
                <td class="center">{{number_format($weight,2,',','.')}} kg</td>
                <td class="right">Rp{{number_format($cart->total,2,',','.')}}</td>
            </tr>
        @endforeach
        @php
            if($data->is_discount == true) {
                $discount = $data->discount;
                $discount_price = ceil($subtotal * $discount / 100);
            } else {
                $discount = 0;
                $discount_price = 0;
            }
        @endphp
        <tr class="ttl">
            <td class="right" colspan="4">SUBTOTAL</td>
            <td class="right">Rp{{number_format($subtotal,2,',','.')}}</td>
        </tr>
        <tr class="ttl">
            <td class="right uppercase" colspan="4">{{__('lang.cart.summary.discount').' '.$discount.'%'}}</td>
            <td class="right">{{'-Rp'.number_format($discount_price,2,',','.')}}</td>
        </tr>
        <tr class="ttl">
            <td class="right uppercase" colspan="4">{{__('lang.product.form.summary.ongkir')}}</td>
            <td class="right">Rp{{number_format($data->ongkir,2,',','.')}}</td>
        </tr>
        <tr class="ttl">
            <td class="right" colspan="4">GRAND TOTAL</td>
            <td class="right">Rp{{number_format($subtotal - $discount_price + $data->ongkir,2,',','.')}}</td>
        </tr>
        </tbody>
    </table>

    <table id="msc" style="background: #fff5e6;margin-top: 30px">
        <tr>
            <td><b class="primary">{{strtoupper(__('lang.mail.content.payment5'))}}</b></td>
            <td><b class="primary">{{strtoupper(__('lang.product.form.shipping.head2'))}}</b></td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="50%">
                            <img width="150" alt="{{$payment['bank']}}"
                                 src="{{public_path('images/paymentMethod/'.$payment['bank'].'.png')}}">
                        </td>
                        <td>
                            {{strtoupper(str_replace('_',' ',$payment['type']))}}
                            @if($payment['type'] == 'credit_card' || $payment['type'] == 'bank_transfer' || $payment['type'] == 'cstore')
                                <br>{{$payment['account']}}
                                @if($payment['type'] == 'bank_transfer')
                                    <br>a/n {{env('APP_TITLE')}}
                                @endif
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td width="50%"><img alt="Logo" src="{{$input['rate_logo']}}"></td>
                        <td>{{$input['rate_name']}}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
