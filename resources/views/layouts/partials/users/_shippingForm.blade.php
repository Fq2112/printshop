<div class="panel-group" id="accordion2" role="tablist">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading-address">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapse-address" aria-expanded="false"
                   aria-controls="collapse-address" class="collapsed">
                    {{__('lang.profile.address-head')}}<b class="show-address">&ndash;</b></a>
            </h4>
        </div>
        <div id="collapse-address" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-address"
             aria-expanded="false" style="height: 0;" data-parent="#accordion2">
            <div class="panel-body">
                <div class="row {{count($addresses) > 0 ? '' : 'justify-content-center text-center'}}">
                    @if(count($addresses) > 0)
                        @foreach($addresses as $row)
                            @php $occupancy = $row->is_main == false ? $row->getOccupancy->name : $row->getOccupancy->name.' ['.__('lang.profile.main-address').']'; @endphp
                            <div class="col-12 mb-3">
                                <label class="card-label" for="address_{{$row->id}}">
                                    <input id="address_{{$row->id}}" class="card-rb address-rb" type="radio"
                                           name="address_id" value="{{$row->id}}" data-name="{{$occupancy}}"
                                        {{!\Illuminate\Support\Facades\Request::is('*cart*') &&
                                        (!is_null($shipping) && $shipping->city_id) == $row->city_id ? 'checked' : ''}}>
                                    <div class="card card-input">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="media">
                                                    <div class="content-area align-self-center ml-3"
                                                         data-toggle="tooltip" data-placement="bottom"
                                                         title="{{__('lang.tooltip.edit-address')}}"
                                                         style="cursor: pointer" onclick="editAddress('{{$row->name}}',
                                                        '{{$row->phone}}','{{$row->lat}}','{{$row->long}}',
                                                        '{{$row->city_id}}','{{$row->address}}','{{$row->postal_code}}',
                                                        '{{$row->getOccupancy->id}}','{{$row->getOccupancy->name}}',
                                                        '{{$row->is_main}}','{{route('user.profil-alamat.update', ['id' => $row->id])}}')">
                                                        <img alt="icon" width="100"
                                                             src="{{asset('images/icons/occupancy/'.$row->getOccupancy->image)}}">
                                                        <div class="custom-overlay">
                                                            <div class="custom-text">
                                                                <i class="icon-edit icon-2x"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ml-3 media-body"
                                                         onclick="getShipping('{{$row->city_id}}','address','{{$occupancy}}')">
                                                        <h5 class="mt-3 mb-1">
                                                            <i class="icon-building mr-1"></i>{{$row->getOccupancy->name}}
                                                            {!! $row->is_main == false ? '' : '<span style="font-weight: 500;color: unset">['.__('lang.profile.main-address').']</span>'!!}
                                                        </h5>
                                                        <blockquote class="mb-3"
                                                                    style="font-size: 14px;text-transform: none">
                                                            <table class="m-0" style="font-size: 14px">
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{ucwords(__('lang.placeholder.name'))}}">
                                                                    <td><i class="icon-id-card"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$row->name}}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.footer.phone')}}">
                                                                    <td><i class="icon-phone"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$row->phone}}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.profile.city')}}">
                                                                    <td><i class="icon-city"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$row->getCity->getProvince->name.', '.$row->getCity->name}}</td>
                                                                </tr>
                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                    title="{{__('lang.profile.address')}}">
                                                                    <td><i class="icon-map-marker-alt"></i></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{$row->address.' - '.$row->postal_code}}</td>
                                                                </tr>
                                                            </table>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                        <div class="col-12">
                            <button type="button" onclick="addAddress()"
                                    class="button button-3d button-primary button-rounded w-100 m-0">
                                <i class="icon-map-marked-alt mr-1"></i>
                                {{__('lang.button.add').' '.__('lang.profile.address')}}
                            </button>
                        </div>
                    @else
                        <div class="col-12">
                            <img width="256" class="img-fluid" alt="Empty" src="{{asset('images/loader-image.gif')}}">
                            <h3 class="mt-0 mb-1">{{__('lang.product.form.shipping.empty-head')}}</h3>
                            <h4 class="mt-0 mb-3" style="text-transform: none">
                                {{__('lang.product.form.shipping.empty-capt')}}</h4>
                            <button type="button" onclick="addAddress()"
                                    class="button button-rounded button-reveal button-border button-primary tright mb-4">
                                <i class="icon-angle-right"></i>
                                <span>{{__('lang.button.add').' '.__('lang.profile.address')}}</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(!\Illuminate\Support\Facades\Request::is('*cart*'))
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-city">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" href="#collapse-city" aria-expanded="false"
                       aria-controls="collapse-city" class="collapsed">
                        {{__('lang.product.form.shipping.estimate')}}<b class="show-city">&ndash;</b></a>
                </h4>
            </div>
            <div id="collapse-city" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-city"
                 aria-expanded="false" style="height: 0;" data-parent="#accordion2">
                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col">
                            <small>{{__('lang.profile.city')}}</small>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-city"></i></span>
                                </div>
                                <select id="shipping_estimation" data-live-search="true"
                                        class="form-control selectpicker" title="{{__('lang.placeholder.choose')}}"
                                        onchange="getShipping($(this).val(), 'city', $('option:selected', this).attr('data-name'))">
                                    @foreach($provinces as $province)
                                        <optgroup label="{{$province->name}}">
                                            @foreach($province->getCity as $city)
                                                <option value="{{$city->id}}"
                                                        data-name="{{$city->name.', '.$city->getProvince->name}}">
                                                    {{$city->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
