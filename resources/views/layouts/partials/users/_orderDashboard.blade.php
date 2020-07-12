<div class="component-accordion">
    <div class="panel-group" id="acc-{{$all.$acc}}" role="tablist">
        @php
            if($acc == 'produced') {
                $color = '#ffc107';
                $stats = __('lang.order.tab-bp');
                $or_class = 'ui-tabs-passed ui-state-passed';
                $pr_class = 'ui-tabs-passed ui-state-passed';
                $bp_class = 'ui-tabs-active ui-state-active';
                $id_class = '';
                $ir_class = '';

            } elseif($acc == 'shipped') {
                $color = '#17a2b8';
                $stats = __('lang.order.tab-id');
                $or_class = 'ui-tabs-passed ui-state-passed';
                $pr_class = 'ui-tabs-passed ui-state-passed';
                $bp_class = 'ui-tabs-passed ui-state-passed';
                $id_class = 'ui-tabs-active ui-state-active';
                $ir_class = '';

            } else {
                $color = '#007bff';
                $stats = __('lang.order.tab-ir');
                $or_class = 'ui-tabs-passed ui-state-passed';
                $pr_class = 'ui-tabs-passed ui-state-passed';
                $bp_class = 'ui-tabs-passed ui-state-passed';
                $id_class = 'ui-tabs-passed ui-state-passed';
                $ir_class = 'ui-tabs-active ui-state-active';
            }
        @endphp
        @foreach($item as $pcode => $val)
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-{{$all.$code}}">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" href="#collapse-{{$all.$code}}" aria-expanded="false"
                           aria-controls="collapse-{{$all.$code}}" class="collapsed">
                            @if($acc == 'unpaid' || $acc == 'paid')
                                {!! __('lang.order.payment_id', ['id' => substr($code,0,-1)]) !!}
                            @else
                                {!! __('lang.order.order_id', ['id' => substr($code,0,-1)]) !!}
                            @endif
                            <b class="text-uppercase" style="color: {{$color}}">{{$stats}}</b>
                        </a>
                    </h4>
                </div>
                <div id="collapse-{{$all.$code}}" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="heading-{{$all.$code}}" aria-expanded="false" style="height: 0;"
                     data-parent="#acc-{{$all.$acc}}">
                    <div class="panel-body">
                        @foreach($val as $cart)
                            @php
                                $data = !is_null($cart->subkategori_id) ? $cart->getSubKategori : $cart->getCluster;
                                $image = !is_null($cart->subkategori_id) ?
                                asset('storage/products/banner/'.$cart->getSubKategori->banner) :
                                asset('storage/products/thumb/'.$cart->getCluster->thumbnail);
                                $specs = !is_null($cart->subkategori_id) ? $data->getSubkatSpecs : $data->getClusterSpecs;
                                $weight = ($specs->weight / 1000) * $cart->qty;

                                if($acc == 'unpaid') {
                                    $or_date = \Carbon\Carbon::parse($cart->created_at)->formatLocalized('%d %b %Y – %H:%M');
                                    $pr_date = '';
                                    $bp_date = '';
                                    $id_date = '';
                                    $ir_date = '';

                                } else {
                                    $or_date = \Carbon\Carbon::parse($cart->created_at)->formatLocalized('%d %b %Y – %H:%M');
                                    $pr_date = \Carbon\Carbon::parse($cart->updated_at)->formatLocalized('%d %b %Y – %H:%M');
                                    $bp_date = '';
                                    $id_date = '';
                                    $ir_date = '';
                                }
                            @endphp
                            <div class="media">
                                <a data-placement="bottom" class="content-area align-self-center"
                                   data-toggle="tooltip" style="cursor: pointer"
                                   href="{{route('user.download.file',['id'=>encrypt($cart->id),'file'=>'design'])}}">
                                    <img alt="icon" width="150" src="{{$image}}">
                                    <div class="custom-overlay">
                                        <div class="custom-text">
                                            <i class="icon-drafting-compass icon-2x"></i>
                                        </div>
                                    </div>
                                </a>
                                <div class="ml-3 media-body">
                                    <h5 class="mt-3 mb-1">
                                        <i class="icon-drafting-compass mr-2"></i>{{$data->name}}
                                        <span class="fright text-uppercase">
                                            <a style="color: #17a2b8;"
                                               href="{{route('user.download.file',['id'=>encrypt($val->id),'file'=>'invoice'])}}">
                                                <i class="icon-file-invoice-dollar mr-1"></i>
                                                {{__('lang.order.invoice')}}
                                            </a>
                                        </span>
                                    </h5>
                                    <blockquote class="mb-3 pr-0" style="font-size: 14px;text-transform: none">
                                        <div class="toggle toggle-border mb-3">
                                            <div class="togglet toggleta font-weight-normal text-uppercase">
                                                <i class="toggle-closed icon-chevron-down1"></i>
                                                <i class="toggle-open icon-chevron-up1"></i>
                                                {{__('lang.cart.order.calc')}}
                                            </div>
                                            <div class="togglec">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item noborder">
                                                        {{__('lang.product.form.summary.quantity')}}
                                                        <b class="fright">{{$cart->qty.' '.$specs->getUnit->name}}</b>
                                                    </li>
                                                    <li class="list-group-item noborder">
                                                        {{__('lang.product.form.summary.price', ['unit' => strtok($specs->getUnit->name, '(')])}}
                                                        <b class="fright">Rp{{number_format($cart->price_pcs,2,',','.')}}</b>
                                                    </li>
                                                    <li class="list-group-item noborder">
                                                        {{__('lang.product.form.summary.weight')}}
                                                        <b class="fright">{{number_format($weight,2,',','.')}} kg</b>
                                                    </li>
                                                </ul>
                                                <div class="divider divider-right mt-0 mb-0">
                                                    <i class="icon-plus-sign"></i>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item noborder">
                                                        TOTAL
                                                        <b class="fright" style="font-size: large">
                                                            Rp{{number_format($cart->total,2,',','.')}}</b>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="toggle toggle-border mb-3">
                                            <div class="togglet toggleta font-weight-normal text-uppercase">
                                                <i class="toggle-closed icon-chevron-down1"></i>
                                                <i class="toggle-open icon-chevron-up1"></i>
                                                {{__('lang.product.form.summary.specification')}}
                                            </div>
                                            <div class="togglec">
                                                <table style="margin: 0;font-size: 14px;">
                                                    <tbody class="font-weight-bold">
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
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        @if($cart->note != "")
                                            <div class="toggle toggle-border mb-3">
                                                <div class="togglet toggleta font-weight-normal text-uppercase">
                                                    <i class="toggle-closed icon-chevron-down1"></i>
                                                    <i class="toggle-open icon-chevron-up1"></i>
                                                    {{__('lang.tooltip.note')}}
                                                </div>
                                                <div class="togglec">
                                                    <p class="m-0" align="justify">{{$cart->note}}</p>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="toggle toggle-border mb-3">
                                            <div class="togglet toggleta font-weight-normal text-uppercase">
                                                <i class="toggle-closed icon-chevron-down1"></i>
                                                <i class="toggle-open icon-chevron-up1"></i>
                                                {{__('lang.cart.addressee.head')}}
                                            </div>
                                            <div class="togglec">
                                                <div class="media">
                                                    <div class="align-self-center ml-3">
                                                        <img alt="icon" width="80"
                                                             src="{{asset('images/icons/occupancy/'.$shipping->getOccupancy->image)}}">
                                                    </div>
                                                    <div class="ml-3 media-body">
                                                        <h5 class="mt-3 mb-1">
                                                            <i class="icon-map-marked-alt"></i>
                                                            {{__('lang.product.form.shipping.head')}}
                                                        </h5>
                                                        <blockquote class="mb-3"
                                                                    style="font-size: 14px;text-transform: none">
                                                            <table class="m-0" style="font-size: 14px">
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{ucwords(__('lang.placeholder.occupancy'))}}">
                                                                    <td><i class="icon-building"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{!! $shipping->is_main == false ? $shipping->getOccupancy->name : $shipping->getOccupancy->name.' <span style="font-weight: 500;color: unset">['.__('lang.profile.main-address').']</span>'!!}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{ucwords(__('lang.placeholder.name'))}}">
                                                                    <td><i class="icon-id-card"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$shipping->name}}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.footer.phone')}}">
                                                                    <td><i class="icon-phone"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$shipping->phone}}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.profile.city')}}">
                                                                    <td><i class="icon-city"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$shipping->getAreas->getSuburbs->getCities->getProvince->name.', '.$shipping->getAreas->getSuburbs->getCities->name}}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.profile.address')}}">
                                                                    <td><i class="icon-map-marker-alt"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$shipping->address.' - '.$shipping->postal_code}}</td>
                                                                </tr>
                                                            </table>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                                <div class="divider mt-1 mb-2"><i class="icon-circle"></i></div>

                                                <div class="media">
                                                    <div class="align-self-center ml-3">
                                                        <img alt="icon" width="80" src="{{$val->rate_logo}}">
                                                    </div>
                                                    <div class="ml-3 media-body">
                                                        <h5 class="mt-3 mb-1">
                                                            <i class="icon-shipping-fast"></i>
                                                            {{__('lang.product.form.shipping.head2')}}
                                                        </h5>
                                                        <blockquote class="mb-3"
                                                                    style="font-size: 14px;text-transform: none">
                                                            <table class="m-0" style="font-size: 14px">
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.order.logistic')}}">
                                                                    <td><i class="icon-luggage-cart"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$val->rate_name}}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.product.form.summary.production')}}">
                                                                    <td><i class="icon-printer2"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{\Carbon\Carbon::parse($val->production_finished)->formatLocalized('%d %b %Y')}}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.product.form.summary.ongkir')}}">
                                                                    <td><i class="icon-money-bill-wave"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <b>Rp{{number_format($val->ongkir,2,',','.')}}</b>
                                                                    </td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.product.form.summary.delivery')}}">
                                                                    <td><i class="icon-clock"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{!! $etd !!}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.product.form.summary.received')}}">
                                                                    <td><i class="icon-calendar-check"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{!! $str_date !!}</td>
                                                                </tr>
                                                            </table>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                                <div class="divider mt-1 mb-2"><i class="icon-circle"></i></div>

                                                <div class="media">
                                                    <div class="align-self-center ml-3">
                                                        <img alt="icon" width="80"
                                                             src="{{asset('images/icons/occupancy/'.$billing->getOccupancy->image)}}">
                                                    </div>
                                                    <div class="ml-3 media-body">
                                                        <h5 class="mt-3 mb-1">
                                                            <i class="icon-map-marked-alt"></i>
                                                            {{__('lang.cart.billing.head')}}
                                                        </h5>
                                                        <blockquote class="mb-3"
                                                                    style="font-size: 14px;text-transform: none">
                                                            <table class="m-0" style="font-size: 14px">
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{ucwords(__('lang.placeholder.occupancy'))}}">
                                                                    <td><i class="icon-building"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{!! $billing->is_main == false ? $billing->getOccupancy->name : $billing->getOccupancy->name.' <span style="font-weight: 500;color: unset">['.__('lang.profile.main-address').']</span>'!!}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{ucwords(__('lang.placeholder.name'))}}">
                                                                    <td><i class="icon-id-card"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$billing->name}}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.footer.phone')}}">
                                                                    <td><i class="icon-phone"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$billing->phone}}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.profile.city')}}">
                                                                    <td><i class="icon-city"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$billing->getAreas->getSuburbs->getCities->getProvince->name.', '.$billing->getAreas->getSuburbs->getCities->name}}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.profile.address')}}">
                                                                    <td><i class="icon-map-marker-alt"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$billing->address.' - '.$billing->postal_code}}</td>
                                                                </tr>
                                                            </table>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="toggle toggle-border mb-0">
                                            <div class="togglet toggleta font-weight-normal text-uppercase">
                                                <i class="toggle-closed icon-chevron-down1"></i>
                                                <i class="toggle-open icon-chevron-up1"></i>
                                                {{__('lang.order.status')}}
                                            </div>
                                            <div class="togglec">
                                                <div class="row justify-content-center processTabs clearfix">
                                                    <ul class="process-steps process-5 w-100 mb-2 clearfix">
                                                        <li class="{{$or_class}}">
                                                            <a href="#unpaid"
                                                               class="i-circled i-bordered i-alt divcenter icon-clipboard-list"></a>
                                                            <h5>{{__('lang.order.tab-or')}}</h5>
                                                            <span>{{$or_date}}</span>
                                                        </li>
                                                        <li class="{{$pr_class}}">
                                                            <a href="#paid"
                                                               class="i-circled i-bordered i-alt divcenter icon-file-invoice-dollar"></a>
                                                            <h5>{{__('lang.order.tab-pr')}}</h5>
                                                            <span>{{$pr_date}}</span>
                                                        </li>
                                                        <li class="{{$bp_class}}">
                                                            <a href="#produced"
                                                               class="i-circled i-bordered i-alt divcenter icon-printer2"></a>
                                                            <h5>{{__('lang.order.tab-bp')}}</h5>
                                                            <span>{{$bp_date}}</span>
                                                        </li>
                                                        <li class="{{$id_class}}">
                                                            <a href="#shipped"
                                                               class="i-circled i-bordered i-alt divcenter icon-shipping-fast"></a>
                                                            <h5>{{__('lang.order.tab-id')}}</h5>
                                                            <span>{{$id_date}}</span>
                                                        </li>
                                                        <li class="{{$ir_class}}">
                                                            <a href="#received"
                                                               class="i-circled i-bordered i-alt divcenter icon-box-open"></a>
                                                            <h5>{{__('lang.order.tab-ir')}}</h5>
                                                            <span>{{$ir_date}}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="divider mt-1 mb-2"><i class="icon-circle"></i></div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
