<div class="card card-input">
    <div class="row">
        <div class="col-lg-12">
            <div class="media">
                <div class="content-area align-self-center ml-3"
                     data-toggle="tooltip"
                     data-placement="bottom"
                     title="{{__('lang.tooltip.edit-address')}}"
                     style="cursor: pointer"
                     onclick="editAddress('{{$row->name}}',
                         '{{$row->phone}}','{{$row->lat}}','{{$row->long}}',
                         '{{$row->city_id}}','{{$row->address}}','{{$row->postal_code}}',
                         '{{$row->getOccupancy->id}}','{{$row->getOccupancy->name}}',
                         '{{$row->is_main}}','{{route('user.profil-alamat.update', ['id' => $row->id])}}')">
                    <img alt="icon"
                         width="100"
                         src="{{asset('images/icons/occupancy/'.$row->getOccupancy->image)}}">
                    <div class="custom-overlay">
                        <div class="custom-text">
                            <i class="icon-edit icon-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="ml-3 media-body"
                     onclick="getShipping('{{$row->city_id}}','{{$check}}','{{$occupancy}}')">
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
