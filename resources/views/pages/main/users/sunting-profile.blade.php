@extends('layouts.mst')
@section('title',  __('lang.header.profile').': '.$user->name.' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    <style>
        .datepicker {
            padding: 0.375rem 0.75rem;
        }

        .has-feedback .form-control-feedback {
            width: 36px;
            height: 36px;
            line-height: 36px;
        }

        .image-upload > input {
            display: none;
        }

        .image-upload label {
            cursor: pointer;
            width: 100%;
        }

        .gm-style-iw {
            width: 350px !important;
            top: 15px;
            left: 22px;
            background-color: #fff;
            box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
            border: 1px solid rgba(248, 148, 6, 0.6);
            border-radius: 2px 2px 10px 10px;
        }

        .gm-style-iw > div:first-child {
            max-width: 350px !important;
        }

        #iw-container {
            margin-bottom: 10px;
        }

        #iw-container .iw-title {
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 22px;
            font-weight: 400;
            padding: 10px;
            background-color: #f89406;
            color: white;
            margin: 0;
            border-radius: 2px 2px 0 0;
        }

        #iw-container .iw-content {
            font-size: 13px;
            line-height: 18px;
            font-weight: 400;
            margin-right: 1px;
            padding: 15px 5px 20px 15px;
            max-height: 140px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .iw-content a {
            color: #f89406;
            text-decoration: none;
        }

        .iw-content img {
            float: right;
            margin: 0 5px 5px 10px;
            width: 30%;
        }

        .iw-subTitle {
            font-size: 16px;
            font-weight: 700;
            padding: 5px 0;
        }

        .iw-bottom-gradient {
            position: absolute;
            width: 326px;
            height: 25px;
            bottom: 10px;
            right: 18px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            background: -ms-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{$bio->background == "" ? asset('images/banner/users.jpg') :
             asset('storage/users/background/'.$bio->background)}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{__('lang.header.profile')}}</h1>
            <span>{{__('lang.profile.capt')}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">{{__('lang.breadcrumb.account')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('lang.header.profile')}}</li>
            </ol>
        </div>
    </section>

    <div id="page-menu">
        <div id="page-menu-wrap">
            <div class="container clearfix">
                <div class="menu-title"><span>{{$user->name}}</span></div>
                <nav>
                    <ul>
                        <li><a href="{{route('user.dashboard')}}">
                                <div>Dashboard</div>
                            </a></li>
                        <li class="current"><a href="{{URL::current()}}">
                                <div>{{__('lang.header.profile')}}</div>
                            </a></li>
                        <li><a href="{{route('user.pengaturan')}}">
                                <div>{{__('lang.header.settings')}}</div>
                            </a></li>
                    </ul>
                </nav>
                <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>
            </div>
        </div>
    </div>

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-12 text-center">
                        <div class="myCard">
                            <form class="form-horizontal mb-0" role="form" method="POST" id="form-ava"
                                  enctype="multipart/form-data">
                                @csrf
                                {{ method_field('put') }}
                                <div class="img-card image-upload">
                                    <label for="file-input">
                                        <img style="width: 100%" class="show_ava" alt="Avatar" src="{{$bio->ava == "" ?
                                        asset('admins/img/avatar/avatar-'.rand(1,5).'.png') : asset('storage/users/ava/'.$bio->ava)}}"
                                             data-placement="bottom" data-toggle="tooltip"
                                             title="{{__('lang.tooltip.ava')}}">
                                    </label>
                                    <input id="file-input" name="ava" type="file" accept="image/*">
                                    <div id="progress-upload">
                                        <div class="progress-bar progress-bar-info progress-bar-striped active"
                                             role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                             aria-valuemax="100" style="background-color: #f89406;z-index: 20">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form class="form-horizontal mb-0" role="form" method="POST" id="form-personal"
                                  action="{{route('user.update.profil')}}">
                                @csrf
                                {{ method_field('put') }}
                                <div class="card-content">
                                    <div class="card-title text-center">
                                        <h4 class="aj_name" style="color: #f89406">{{$user->name}}</h4>
                                        <h5 style="text-transform: none">{{$user->username}}</h5>
                                    </div>
                                    <div class="card-title">
                                        <div class="row justify-content-center">
                                            <div class="col">
                                                <small style="font-weight: 600">
                                                    <span id="show_personal_settings" class="fright"
                                                          style="cursor: pointer;color: #f89406">
                                                        <i class="icon-edit mr-1"></i> PERSONAL</span>
                                                    <span id="hide_personal_settings" class="fright"
                                                          style="color: #f89406;cursor: pointer;display:none">
                                                        <i class="icon-line2-action-undo mr-1"></i>
                                                        {{__('lang.button.cancel')}}</span>
                                                </small>
                                            </div>
                                        </div>
                                        <table class="stats_personal m-0" style="font-size: 14px">
                                            <tr data-toggle="tooltip" data-placement="left"
                                                title="{{__('lang.profile.gender')}}">
                                                <td><i class="icon-transgender"></i></td>
                                                <td>&nbsp;</td>
                                                <td>{{$bio->gender != "" ? ucfirst($bio->gender) : __('lang.profile.empty')}}</td>
                                            </tr>
                                            <tr data-toggle="tooltip" data-placement="left"
                                                title="{{__('lang.profile.birthday')}}">
                                                <td><i class="icon-birthday-cake"></i></td>
                                                <td>&nbsp;</td>
                                                <td>{{$bio->dob != "" ? \Carbon\Carbon::parse($bio->dob)->format('j F Y') : __('lang.profile.empty')}}</td>
                                            </tr>
                                            <tr data-toggle="tooltip" data-placement="left"
                                                title="{{__('lang.footer.phone')}}">
                                                <td><i class="icon-phone"></i></td>
                                                <td>&nbsp;</td>
                                                <td>{{$bio->phone != "" ? $bio->phone : __('lang.profile.empty')}}</td>
                                            </tr>
                                            <tr data-toggle="tooltip" data-placement="left"
                                                title="{{__('lang.tooltip.address')}}">
                                                <td><i class="icon-map-marked-alt"></i></td>
                                                <td>&nbsp;</td>
                                                <td>{{$address != "" ? $address->address.' - '.$address->postal_code.' ('.$address->getOccupancy->name.').' : __('lang.profile.empty')}}</td>
                                            </tr>
                                        </table>
                                        <div class="divider divider-center stats_personal mt-2 mb-1">
                                            <i class="icon-circle"></i></div>
                                        <table class="stats_personal m-0" style="font-size: 14px">
                                            <tr data-toggle="tooltip" data-placement="left"
                                                title="{{__('lang.profile.member-since')}}">
                                                <td><i class="icon-calendar-check"></i></td>
                                                <td>&nbsp;</td>
                                                <td>{{$user->created_at->formatLocalized('%d %B %Y')}}</td>
                                            </tr>
                                            <tr data-toggle="tooltip" data-placement="left"
                                                title="{{__('lang.profile.last-update')}}">
                                                <td><i class="icon-clock"></i></td>
                                                <td>&nbsp;</td>
                                                <td class="text-lowercase">{{$user->updated_at->diffForHumans()}}</td>
                                            </tr>
                                        </table>
                                        <div id="personal_settings" style="display: none">
                                            <small>{{ucwords(__('lang.placeholder.name'))}}
                                                <span class="required">*</span></small>
                                            <div class="row form-group">
                                                <div class="col">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-id-card"></i></span>
                                                        </div>
                                                        <input placeholder="{{__('lang.placeholder.name')}}"
                                                               maxlength="191" value="{{$user->name}}" type="text"
                                                               class="form-control" name="name" required autofocus>
                                                    </div>
                                                </div>
                                            </div>

                                            <small>{{__('lang.profile.gender')}} <span class="required">*</span></small>
                                            <div class="row form-group fix-label-group">
                                                <div class="col">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text fix-label-item">
                                                                <i class="icon-transgender"></i></span>
                                                        </div>
                                                        <select class="form-control selectpicker" name="gender" required
                                                                title="{{__('lang.placeholder.choose')}}">
                                                            <option
                                                                value="male" {{$bio->gender == 'male' ? 'selected' : ''}}>
                                                                {{__('lang.profile.male')}}</option>
                                                            <option
                                                                value="female" {{$bio->gender == 'female' ? 'selected' : ''}}>
                                                                {{__('lang.profile.female')}}</option>
                                                            <option
                                                                value="other" {{$bio->gender == 'other' ? 'selected' : ''}}>
                                                                {{__('lang.profile.other')}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <small>{{__('lang.profile.birthday')}} <span
                                                    class="required">*</span></small>
                                            <div class="row form-group">
                                                <div class="col">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-birthday-cake"></i></span>
                                                        </div>
                                                        <input class="form-control datepicker" name="dob" type="text"
                                                               placeholder="yyyy-mm-dd" maxlength="10"
                                                               value="{{$bio->dob}}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <small>{{__('lang.footer.phone')}} <span class="required">*</span></small>
                                            <div class="row form-group">
                                                <div class="col">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-phone"></i></span>
                                                        </div>
                                                        <input placeholder="{{__('lang.placeholder.phone')}}"
                                                               type="text" class="form-control" name="phone" required
                                                               onkeypress="return numberOnly(event, false)"
                                                               value="{{$bio->phone != "" ? $bio->phone : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <button type="submit" id="btn_save_personal"
                                            class="btn btn-outline-primary btn-block noborder" disabled>
                                        <i class="icon-user mr-2"></i>{{__('lang.button.save')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12">
                        <div class="row">
                            <div class="col">
                                <div class="myCard">
                                    <form class="form-horizontal mb-0" role="form" method="POST" id="form-background"
                                          enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('put') }}
                                        <div class="img-card image-upload">
                                            <label for="file-input-bg">
                                                <img style="width: 100%" class="show_bg" alt="Background"
                                                     src="{{$bio->background == "" ? asset('images/banner/users.jpg') :
                                                     asset('storage/users/background/'.$bio->background)}}"
                                                     data-placement="bottom" data-toggle="tooltip"
                                                     title="{{__('lang.tooltip.background')}}">
                                            </label>
                                            <input id="file-input-bg" name="background" type="file" accept="image/*">
                                            <div id="progress-upload-bg">
                                                <div class="progress-bar progress-bar-info progress-bar-striped active"
                                                     role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                     aria-valuemax="100" style="background-color: #f89406;z-index: 20">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-title">
                                                <small style="font-weight: 600">
                                                    {{__('lang.profile.bg-head')}}
                                                    <span id="show_bg_settings" class="fright"
                                                          style="cursor: pointer; color: #f89406">
                                                <i class="icon-edit mr-1"></i>
                                                {{__('lang.button.edit')}}</span>
                                                </small>
                                                <div class="divider divider-center mt-0 mb-2"><i
                                                        class="icon-circle"></i></div>
                                                <blockquote class="mb-0" style="font-size: 14px;text-transform: none">
                                                    <table class="m-0" style="font-size: 14px">
                                                        <tr>
                                                            <td><i class="icon-picture"></i></td>
                                                            <td>&nbsp;</td>
                                                            <td id="show_bg_name">
                                                                {{$bio->background != "" ? $bio->background : '(empty)'}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="myCard">
                                    <form class="form-horizontal mb-0" role="form" method="POST" id="form-address"
                                          action="{{route('user.profil-alamat.create')}}">
                                        @csrf
                                        <input id="method" type="hidden" name="_method">
                                        <input id="lat" type="hidden" name="lat">
                                        <input id="long" type="hidden" name="long">
                                        <div class="card-content">
                                            <div class="card-title">
                                                <small style="font-weight: 600">
                                                    {{__('lang.profile.address-head')}}
                                                    <span id="show_address_settings" class="fright"
                                                          style="cursor: pointer;color: #f89406">
                                                <i class="icon-map-marked-alt mr-1"></i>
                                                {{__('lang.button.add')}}</span>
                                                    <span id="hide_address_settings" class="fright"
                                                          style="color: #f89406;cursor: pointer;display:none">
                                                <i class="icon-line2-action-undo mr-1"></i>
                                                {{__('lang.button.cancel')}}</span>
                                                </small>
                                                <div class="divider divider-center mt-0 mb-2"><i
                                                        class="icon-circle"></i></div>
                                                <div class="mt-0 stats_address" style="font-size: 14px;">
                                                    @if(count($addresses) > 0)
                                                        <div class="css3-spinner" style="z-index:1;top:0;display:none">
                                                            <div class="css3-spinner-bounce1"></div>
                                                            <div class="css3-spinner-bounce2"></div>
                                                            <div class="css3-spinner-bounce3"></div>
                                                        </div>
                                                        @foreach($addresses as $row)
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="media">
                                                                        <img class="align-self-center" alt="icon"
                                                                             width="100"
                                                                             src="{{asset('images/icons/occupancy/'.$row->getOccupancy->image)}}">
                                                                        <div class="ml-2 media-body">
                                                                            <h5 class="mt-0 mb-1">
                                                                                <i class="icon-building mr-1"></i>{{$row->getOccupancy->name}}
                                                                                {!! $row->is_main == false ? '' :
                                                                                '<span style="font-weight: 500;color: unset">['.
                                                                                __('lang.profile.main-address').']</span>'!!}
                                                                                <span class="fright">
                                                                            <a style="color: #f89406;cursor: pointer;"
                                                                               onclick="editAddress('{{$row->name}}',
                                                                                   '{{$row->phone}}','{{$row->lat}}',
                                                                                   '{{$row->long}}','{{$row->getAreas->getSuburbs->cities_id}}',
                                                                                   '{{$row->getAreas->suburbs_id}}','{{$row->area_id}}',
                                                                                   '{{$row->address}}','{{$row->postal_code}}',
                                                                                   '{{$row->getOccupancy->id}}',
                                                                                   '{{$row->getOccupancy->name}}',
                                                                                   '{{$row->is_main}}','{{route('user.profil-alamat.update', ['id' => $row->id])}}')">
                                                                                {{__('lang.button.edit')}}
                                                                                <i class="icon-edit ml-1"></i>
                                                                            </a>
                                                                            <small style="color: #7f7f7f">&nbsp;&#124;&nbsp;</small>
                                                                            <a style="color: #dc3545;cursor: pointer;"
                                                                               onclick="deleteAddress('{{$row->is_main}}',
                                                                                   '{{$row->getOccupancy->name}}','{{$row->address}}',
                                                                                   '{{route('user.profil-alamat.delete', ['id' => $row->id])}}')">
                                                                                <i class="icon-eraser mr-1"></i>
                                                                                {{__('lang.button.delete')}}
                                                                            </a>
                                                                        </span>
                                                                            </h5>
                                                                            <blockquote class="mb-0"
                                                                                        style="font-size: 14px;text-transform: none">
                                                                                <table class="m-0"
                                                                                       style="font-size: 14px">
                                                                                    <tr data-toggle="tooltip"
                                                                                        data-placement="left"
                                                                                        title="{{ucwords(__('lang.placeholder.name'))}}">
                                                                                        <td><i class="icon-id-card"></i>
                                                                                        </td>
                                                                                        <td>&nbsp;</td>
                                                                                        <td>{{$row->name}}</td>
                                                                                    </tr>
                                                                                    <tr data-toggle="tooltip"
                                                                                        data-placement="left"
                                                                                        title="{{__('lang.footer.phone')}}">
                                                                                        <td><i class="icon-phone"></i>
                                                                                        </td>
                                                                                        <td>&nbsp;</td>
                                                                                        <td>{{$row->phone}}</td>
                                                                                    </tr>
                                                                                    <tr data-toggle="tooltip"
                                                                                        data-placement="left"
                                                                                        title="{{__('lang.profile.city')}}">
                                                                                        <td><i class="icon-city"></i>
                                                                                        </td>
                                                                                        <td>&nbsp;</td>
                                                                                        <td>{{$row->getAreas->getSuburbs->getCities->getProvince->name.', '.$row->getAreas->getSuburbs->getCities->name}}</td>
                                                                                    </tr>
                                                                                    <tr data-toggle="tooltip"
                                                                                        data-placement="left"
                                                                                        title="{{__('lang.profile.address')}}">
                                                                                        <td>
                                                                                            <i class="icon-map-marker-alt"></i>
                                                                                        </td>
                                                                                        <td>&nbsp;</td>
                                                                                        <td>{{$row->address.' - '.$row->postal_code}}</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </blockquote>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="divider mt-1 mb-2"><i class="icon-circle"></i>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <p class="mb-0 text-justify">{{__('lang.profile.address-capt')}}</p>
                                                    @endif
                                                </div>
                                                <div id="address_settings" style="display: none">
                                                    <div class="row form-group">
                                                        <div class="col-lg-7 col-md-12 col-sm-12">
                                                            <small>{{ucwords(__('lang.placeholder.name'))}}
                                                                <span class="required">*</span></small>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-id-card"></i></span>
                                                                </div>
                                                                <input placeholder="{{__('lang.placeholder.name')}}"
                                                                       type="text"
                                                                       id="address_name" maxlength="191"
                                                                       value="{{$user->name}}"
                                                                       class="form-control" name="address_name"
                                                                       spellcheck="false" autocomplete="off" autofocus
                                                                       required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 col-md-12 col-sm-12">
                                                            <small>{{__('lang.footer.phone')}}
                                                                <span class="required">*</span></small>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-phone"></i></span>
                                                                </div>
                                                                <input placeholder="{{__('lang.placeholder.phone')}}"
                                                                       id="address_phone" class="form-control"
                                                                       name="address_phone" type="text"
                                                                       onkeypress="return numberOnly(event, false)"
                                                                       value="{{$bio->phone != "" ? $bio->phone : ''}}"
                                                                       spellcheck="false" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-7 col-md-12 col-sm-12">
                                                            <div id="map" class="gmap img-thumbnail"
                                                                 style="height: 520px;"></div>
                                                        </div>
                                                        <div class="col-lg-5 col-md-12 col-sm-12">
                                                            <div class="row form-group">
                                                                <div class="col">
                                                                    <small>{{__('lang.profile.city')}}
                                                                        <span class="required">*</span></small>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-city"></i></span>
                                                                        </div>
                                                                        <select id="city_id" name="city_id"
                                                                                data-live-search="true" required
                                                                                class="form-control selectpicker"
                                                                                title="{{__('lang.placeholder.choose')}}">
                                                                            @foreach($provinces as $province)
                                                                                <optgroup label="{{$province->name}}">
                                                                                    @foreach($province->getCity as $city)
                                                                                        <option value="{{$city->id}}">
                                                                                            {{$city->name}}</option>
                                                                                    @endforeach
                                                                                </optgroup>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col">
                                                                    <small>Suburb <span
                                                                            class="required">*</span></small>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-road"></i></span>
                                                                        </div>
                                                                        <select id="suburb_id" name="suburb_id"
                                                                                data-live-search="true" disabled
                                                                                class="form-control selectpicker"
                                                                                title="{{__('lang.placeholder.choose')}}">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col">
                                                                    <small>Area <span class="required">*</span></small>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-map-signs"></i></span>
                                                                        </div>
                                                                        <select id="area_id" name="area_id"
                                                                                data-live-search="true" disabled
                                                                                class="form-control selectpicker"
                                                                                title="{{__('lang.placeholder.choose')}}">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col">
                                                                    <small>{{__('lang.profile.address')}}
                                                                        <span class="required">*</span></small>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-map-marker-alt"></i></span>
                                                                        </div>
                                                                        <textarea id="address_map" class="form-control"
                                                                                  placeholder="{{__('lang.profile.address')}}"
                                                                                  name="address" rows="3"
                                                                                  spellcheck="false"
                                                                                  autocomplete="off"
                                                                                  required></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col">
                                                                    <small>{{__('lang.profile.zip')}}
                                                                        <span class="required">*</span></small>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-hashtag"></i></span>
                                                                        </div>
                                                                        <input spellcheck="false" autocomplete="off"
                                                                               placeholder="{{ucfirst(strtolower(__('lang.profile.zip')))}}"
                                                                               id="postal_code" type="text"
                                                                               class="form-control"
                                                                               name="postal_code" maxlength="5" required
                                                                               onkeypress="return numberOnly(event, false)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col">
                                                                    <small>{{__('lang.profile.save-as')}}
                                                                        <span class="required">*</span></small>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="icon-building"></i></span>
                                                                        </div>
                                                                        <select id="occupancy_id" name="occupancy_id"
                                                                                data-live-search="true"
                                                                                class="form-control selectpicker"
                                                                                required
                                                                                title="{{__('lang.placeholder.choose')}}">
                                                                            @foreach($occupancy as $row)
                                                                                <option
                                                                                    value="{{$row->id}}">{{$row->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col">
                                                                    <div>
                                                                        <input id="is_main" class="checkbox-style"
                                                                               name="is_main" value="1" type="checkbox">
                                                                        <label for="is_main"
                                                                               class="checkbox-style-2-label checkbox-small"
                                                                               style="text-transform: none">{{__('lang.profile.cb-main')}}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer p-0">
                                            <button type="submit" id="btn_save_address"
                                                    class="btn btn-outline-primary btn-block noborder" disabled>
                                                <i class="icon-map-marked-alt mr-2"></i>{{__('lang.button.save')}}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIljHbKjgtTrpZhEiHum734tF1tolxI68&libraries=geometry,places"></script>
    <script>
        var $city = $("#city_id"), $suburb = $("#suburb_id"), $area = $("#area_id"), $postal = $("#postal_code");

        $(function () {
            $(".stats_address .divider:last-child").remove();

            @if($check == 'false' || is_null($bio->dob) || is_null($bio->gender) || is_null($bio->phone))
            swal({
                title: "{{__('lang.alert.warning')}}",
                text: "{{__('lang.alert.login-bio3')}}",
                icon: 'warning',
                closeOnEsc: false,
                closeOnClickOutside: false,
            }).then((confirm) => {
                if (confirm) {
                    $('html,body').animate({scrollTop: $("#form-ava").offset().top}, 500);
                }
            });
            @endif
        });

        var google, myLatlng, geocoder, map, marker, infoWindow;

        function init(lat, long) {
            geocoder = new google.maps.Geocoder();
            myLatlng = new google.maps.LatLng(lat, long);

            var mapOptions = {
                zoom: 15,
                center: myLatlng,
                scrollwheel: true,
            }, mapElement = document.getElementById('map');

            map = new google.maps.Map(mapElement, mapOptions);

            marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                draggable: true,
                icon: '{{asset('images/pin.png')}}',
                anchorPoint: new google.maps.Point(0, -29)
            });

            infoWindow = new google.maps.InfoWindow({
                maxWidth: 350,
                content:
                    '<div id="iw-container">' +
                    '<div class="iw-title">{{__('lang.profile.address')}}</div>' +
                    '<div class="iw-content">' +
                    '<div class="iw-subTitle" style="text-transform: none">{{__('lang.profile.set-address')}}</div>' +
                    '<img src="{{asset('images/searchPlace.png')}}">' +
                    '</div><div class="iw-bottom-gradient"></div></div>'
            });

            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });

            google.maps.event.addListener(map, 'click', function () {
                infoWindow.close();
            });

            google.maps.event.addListener(marker, "dragend", function (event) {
                geocodePosition(marker.getPosition());
                $("#lat").val(event.latLng.lat());
                $("#long").val(event.latLng.lng());
            });

            var autocomplete = new google.maps.places.Autocomplete(document.getElementById('address_map'));

            autocomplete.bindTo('bounds', map);

            autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);

            autocomplete.addListener('place_changed', function () {
                marker.setVisible(false);

                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("{{__('lang.profile.autocomplete-fail')}} '" + place.name + "'");
                    return;
                }

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                for (var i = 0; i < place.address_components.length; i++) {
                    for (var j = 0; j < place.address_components[i].types.length; j++) {
                        if (place.address_components[i].types[j] == "postal_code") {
                            $postal.val(place.address_components[i].long_name);
                        }
                    }
                }

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infoWindow.setContent(
                    '<div id="iw-container">' +
                    '<div class="iw-title">{{__('lang.profile.address')}}</div>' +
                    '<div class="iw-content">' +
                    '<div class="iw-subTitle" style="text-transform: none">' + place.name + '</div>' +
                    '<img src="{{asset('images/searchPlace.png')}}">' +
                    '<p>' + address + '</p>' +
                    '</div><div class="iw-bottom-gradient"></div></div>'
                );
                infoWindow.open(map, marker);
                $("#lat").val(place.geometry.location.lat());
                $("#long").val(place.geometry.location.lng());

                google.maps.event.addListener(infoWindow, 'domready', function () {
                    var iwOuter = $('.gm-style-iw');
                    var iwBackground = iwOuter.prev();

                    iwBackground.children(':nth-child(2)').css({'display': 'none'});
                    iwBackground.children(':nth-child(4)').css({'display': 'none'});

                    iwOuter.css({left: '5px', top: '1px'});
                    iwOuter.parent().parent().css({left: '0'});

                    iwBackground.children(':nth-child(1)').attr('style', function (i, s) {
                        return s + 'left: -39px !important;'
                    });

                    iwBackground.children(':nth-child(3)').attr('style', function (i, s) {
                        return s + 'left: -39px !important;'
                    });

                    iwBackground.children(':nth-child(3)').find('div').children().css({
                        'box-shadow': 'rgba(72, 181, 233, 0.6) 0 1px 6px',
                        'z-index': '1'
                    });

                    var iwCloseBtn = iwOuter.next();
                    iwCloseBtn.css({
                        background: '#fff',
                        opacity: '1',
                        width: '30px',
                        height: '30px',
                        right: '15px',
                        top: '6px',
                        border: '6px solid #48b5e9',
                        'border-radius': '50%',
                        'box-shadow': '0 0 5px #3990B9'
                    });

                    if ($('.iw-content').height() < 140) {
                        $('.iw-bottom-gradient').css({display: 'none'});
                    }

                    iwCloseBtn.mouseout(function () {
                        $(this).css({opacity: '1'});
                    });
                });
            });
        }

        function geocodePosition(pos) {
            geocoder.geocode({
                latLng: pos
            }, function (responses) {
                if (responses && responses.length > 0) {
                    marker.formatted_address = responses[0].formatted_address;
                } else {
                    marker.formatted_address = '{{__('lang.profile.address-fail')}}';
                }

                for (var i = 0; i < responses[0].address_components.length; i++) {
                    for (var j = 0; j < responses[0].address_components[i].types.length; j++) {
                        if (responses[0].address_components[i].types[j] == "postal_code") {
                            $postal.val(responses[0].address_components[i].long_name);
                        }
                    }
                }

                infoWindow.setContent(
                    '<div id="iw-container">' +
                    '<div class="iw-title">{{__('lang.profile.address')}}</div>' +
                    '<div class="iw-content">' +
                    '<div class="iw-subTitle" style="text-transform: none">' + marker.formatted_address + '</div>' +
                    '<img src="{{asset('images/searchPlace.png')}}">' +
                    '</div><div class="iw-bottom-gradient"></div></div>'
                );
                infoWindow.open(map, marker);
                $("#address_map").val(marker.formatted_address);
            });
        }

        $("#show_personal_settings").on('click', function () {
            $(this).toggle(300);
            $("#hide_personal_settings").toggle(300);

            resetterPersonal();

            $('html,body').animate({scrollTop: $("#form-personal").offset().top}, 500);
        });

        $("#hide_personal_settings").on('click', function () {
            $(this).toggle(300);
            $("#show_personal_settings").toggle(300);

            resetterPersonal();
        });

        function resetterPersonal() {
            $("#personal_settings").toggle(300);
            $(".stats_personal").toggle(300);

            if ($("#btn_save_personal").attr('disabled')) {
                $("#btn_save_personal").removeAttr('disabled');
            } else {
                $("#btn_save_personal").attr('disabled', 'disabled');
            }
        }

        $("#show_bg_settings").on('click', function () {
            $("#file-input-bg").trigger('click');

            $('html,body').animate({scrollTop: $("#form-background").offset().top}, 500);
        });

        $("#show_address_settings").on('click', function () {
            $(".css3-spinner").show();
            $(".stats_address .row").css('opacity', '.3');

            clearTimeout(this.delay);
            this.delay = setTimeout(function () {
                $(".css3-spinner").hide();
                $(".stats_address .row").css('opacity', '1');

                $(this).toggle(300);
                $("#hide_address_settings").toggle(300);

                resetterAddress();

                $('html,body').animate({scrollTop: $("#form-address").parent().parent().parent().offset().top}, 500);

            }.bind(this), 800);
        });

        $("#hide_address_settings").on('click', function () {
            $(this).toggle(300);
            $("#show_address_settings").toggle(300);

            resetterAddress();
        });

        $city.on('change', function () {
            $suburb.removeAttr('disabled').attr('required', 'required').empty().selectpicker('refresh');
            $area.removeAttr('required').attr('disabled', 'disabled').empty().selectpicker('refresh');
            $postal.val(null);

            $.get('{{route('get.shipper.location')}}?q=suburb&id=' + $(this).val(), function (data) {
                $.each(data, function (i, val) {
                    $suburb.append('<option value="' + val.id + '">' + val.name + '</option>').selectpicker('refresh');
                });
            });
        });

        $suburb.on('change', function () {
            $area.removeAttr('disabled').attr('required', 'required').empty().selectpicker('refresh');
            $postal.val(null);

            $.get('{{route('get.shipper.location')}}?q=area&id=' + $(this).val(), function (data) {
                $.each(data, function (i, val) {
                    $area.append('<option value="' + val.id + '" data-postal="' + val.postal_code + '">' + val.name + '</option>').selectpicker('refresh');
                });
            });
        });

        $area.on('change', function () {
            $postal.val($("option[value=" + $(this).val() + "]", this).attr('data-postal'));
        });

        function resetterAddress() {
            $("#address_settings").toggle(300);
            $(".stats_address").toggle(300);

            init(-7.250445, 112.768845);
            infoWindow.setContent(
                '<div id="iw-container">' +
                '<div class="iw-title">{{__('lang.profile.address')}}</div>' +
                '<div class="iw-content">' +
                '<div class="iw-subTitle" style="text-transform: none">{{__('lang.profile.set-address')}}</div>' +
                '<img src="{{asset('images/searchPlace.png')}}">' +
                '</div><div class="iw-bottom-gradient"></div></div>'
            );
            infoWindow.open(map, marker);

            $("#method, #lat, #long, #address_name, #address_phone, #address_map, #postal_code").val(null);
            $("#city_id, #occupancy_id").val('default').selectpicker('refresh');
            $("#suburb_id, #area_id").removeAttr('required').attr('disabled', 'disabled').empty().selectpicker('refresh');
            $("#form-address").attr('action', '{{route('user.profil-alamat.create')}}');
            $("#is_main").prop('checked', false);

            if ($("#btn_save_address").attr('disabled')) {
                $("#btn_save_address").removeAttr('disabled');
            } else {
                $("#btn_save_address").attr('disabled', 'disabled');
            }
        }

        function editAddress(name, phone, lat, long, city_id, suburb_id, area_id, address, postal_code, occupancy_id, occupancy, is_main, url) {
            $(".css3-spinner").show();
            $(".stats_address .row").css('opacity', '.3');

            var main_str = is_main == 1 ? ' <span class="font-weight-normal">[{{__('lang.profile.main-address')}}]</span>' : '',
                attr_suburb = '', attr_area = '';
            init(lat, long);
            infoWindow.setContent(
                '<div id="iw-container">' +
                '<div class="iw-title">{{__('lang.profile.address')}}</div>' +
                '<div class="iw-content">' +
                '<div class="iw-subTitle" style="text-transform: none">' + occupancy + main_str + '</div>' +
                '<img src="{{asset('images/searchPlace.png')}}">' +
                '<p>' + address + '</p>' +
                '</div><div class="iw-bottom-gradient"></div></div>'
            );
            infoWindow.open(map, marker);

            $("#address_name").val(name);
            $("#address_phone").val(phone);
            $("#address_map").val(address);

            $city.val(city_id).selectpicker('refresh');
            $suburb.removeAttr('disabled').attr('required', 'required').empty().selectpicker('refresh');
            $area.removeAttr('required').attr('disabled', 'disabled').empty().selectpicker('refresh');
            $postal.val(null);
            $.get('{{route('get.shipper.location')}}?q=suburb&id=' + city_id, function (data) {
                $.each(data, function (i, val) {
                    attr_suburb = val.id == suburb_id ? 'selected' : '';
                    $suburb.append('<option value="' + val.id + '" ' + attr_suburb + '>' + val.name + '</option>').selectpicker('refresh');
                });
            });

            $area.removeAttr('disabled').attr('required', 'required').empty().selectpicker('refresh');
            $postal.val(null);
            $.get('{{route('get.shipper.location')}}?q=area&id=' + suburb_id, function (data) {
                $.each(data, function (i, val) {
                    attr_area = val.id == area_id ? 'selected' : '';
                    $area.append('<option value="' + val.id + '" data-postal="' + val.postal_code + '" ' + attr_area + '>' + val.name + '</option>').selectpicker('refresh');
                });
            });
            $postal.val(postal_code);

            $("#occupancy_id").val(occupancy_id).selectpicker('refresh');
            if (is_main == 1) {
                $("#is_main").prop('checked', true);
            } else {
                $("#is_main").prop('checked', false);
            }

            $("#method").val('PUT');
            $("#lat").val(lat);
            $("#long").val(long);
            $("#form-address").attr('action', url);

            if ($("#btn_save_address").attr('disabled')) {
                $("#btn_save_address").removeAttr('disabled');
            } else {
                $("#btn_save_address").attr('disabled', 'disabled');
            }

            clearTimeout(this.delay);
            this.delay = setTimeout(function () {
                $(".css3-spinner").hide();
                $(".stats_address .row").css('opacity', '1');

                $("#show_address_settings").hide();
                $("#hide_address_settings").show();
                $("#address_settings").toggle(300);
                $(".stats_address").toggle(300);

                $('html,body').animate({scrollTop: $("#form-address").parent().parent().parent().offset().top}, 500);

            }.bind(this), 800);
        }

        function deleteAddress(is_main, occupancy, address, url) {
            if (is_main == 1) {
                swal('{{__('lang.alert.warning')}}', '{{__('lang.profile.delete-fail')}}', 'warning');
            } else {
                swal({
                    title: '{!! __('lang.profile.delete-head') !!}',
                    text: '{!! __('lang.profile.delete-capt') !!}',
                    icon: 'warning',
                    dangerMode: true,
                    buttons: ["{{__('lang.button.no')}}", "{{__('lang.button.yes')}}"],
                    closeOnEsc: false,
                    closeOnClickOutside: false,
                }).then((confirm) => {
                    if (confirm) {
                        swal({icon: "success", buttons: false});
                        window.location.href = url;
                    }
                });
            }
        }

        document.getElementById("file-input").onchange = function () {
            var files_size = this.files[0].size,
                max_file_size = 2000000, allowed_file_types = ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg'],
                file_name = $(this).val().replace(/C:\\fakepath\\/i, ''),
                progress_bar_id = $("#progress-upload .progress-bar");

            if (!window.File && window.FileReader && window.FileList && window.Blob) {
                swal('{{__('lang.alert.warning')}}', "{{__('lang.alert.browser')}}", 'warning');

            } else {
                if (files_size > max_file_size) {
                    swal('{{__('lang.alert.error')}}', '{!! __('lang.alert.upload-fail') !!}', 'error');

                } else {
                    $(this.files).each(function (i, ifile) {
                        if (ifile.value !== "") {
                            if (allowed_file_types.indexOf(ifile.type) === -1) {
                                swal('{{__('lang.alert.error')}}', '{!! __('lang.alert.upload-fail2') !!}', 'error');

                            } else {
                                $.ajax({
                                    type: 'POST',
                                    url: '{{route('user.update.pengaturan')}}',
                                    data: new FormData($("#form-ava")[0]),
                                    contentType: false,
                                    processData: false,
                                    mimeType: "multipart/form-data",
                                    xhr: function () {
                                        var xhr = $.ajaxSettings.xhr();
                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function (event) {
                                                var percent = 0;
                                                var position = event.loaded || event.position;
                                                var total = event.total;
                                                if (event.lengthComputable) {
                                                    percent = Math.ceil(position / total * 100);
                                                }
                                                //update progressbar
                                                $("#progress-upload").css("display", "block");
                                                progress_bar_id.css("width", +percent + "%");
                                                progress_bar_id.text(percent + "%");
                                                if (percent == 100) {
                                                    progress_bar_id.removeClass("progress-bar-info");
                                                    progress_bar_id.addClass("progress-bar");
                                                } else {
                                                    progress_bar_id.removeClass("progress-bar");
                                                    progress_bar_id.addClass("progress-bar-info");
                                                }
                                            }, true);
                                        }
                                        return xhr;
                                    },
                                    success: function (data) {
                                        $(".show_ava").attr('src', data);
                                        swal('{{__('lang.alert.success')}}', '{{__('lang.alert.upload')}}', 'success');
                                        $("#progress-upload").css("display", "none");
                                    },
                                    error: function () {
                                        swal('{{__('lang.alert.error')}}', '{{__('lang.alert.error-capt')}}', 'error');
                                    }
                                });
                                return false;
                            }
                        } else {
                            swal('{{__('lang.alert.error')}}', '{{__('lang.alert.upload-fail3')}}', 'error');
                        }
                    });
                }
            }
        };

        document.getElementById("file-input-bg").onchange = function () {
            var files_size = this.files[0].size,
                max_file_size = 5000000, allowed_file_types = ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg'],
                file_name = $(this).val().replace(/C:\\fakepath\\/i, ''),
                progress_bar_id = $("#progress-upload-bg .progress-bar");

            if (!window.File && window.FileReader && window.FileList && window.Blob) {
                swal('{{__('lang.alert.warning')}}', "{{__('lang.alert.browser')}}", 'warning');

            } else {
                if (files_size > max_file_size) {
                    swal('{{__('lang.alert.error')}}', '{!! __('lang.alert.upload-fail') !!}', 'error');

                } else {
                    $(this.files).each(function (i, ifile) {
                        if (ifile.value !== "") {
                            if (allowed_file_types.indexOf(ifile.type) === -1) {
                                swal('{{__('lang.alert.error')}}', '{!! __('lang.alert.upload-fail2') !!}', 'error');

                            } else {
                                $.ajax({
                                    type: 'POST',
                                    url: '{{route('user.update.pengaturan')}}',
                                    data: new FormData($("#form-background")[0]),
                                    contentType: false,
                                    processData: false,
                                    mimeType: "multipart/form-data",
                                    xhr: function () {
                                        var xhr = $.ajaxSettings.xhr();
                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function (event) {
                                                var percent = 0;
                                                var position = event.loaded || event.position;
                                                var total = event.total;
                                                if (event.lengthComputable) {
                                                    percent = Math.ceil(position / total * 100);
                                                }
                                                //update progressbar
                                                $("#progress-upload-bg").css("display", "block");
                                                progress_bar_id.css("width", +percent + "%");
                                                progress_bar_id.text(percent + "%");
                                                if (percent == 100) {
                                                    progress_bar_id.removeClass("progress-bar-info");
                                                    progress_bar_id.addClass("progress-bar");
                                                } else {
                                                    progress_bar_id.removeClass("progress-bar");
                                                    progress_bar_id.addClass("progress-bar-info");
                                                }
                                            }, true);
                                        }
                                        return xhr;
                                    },
                                    success: function (data) {
                                        $("#show_bg_name").text(data);
                                        $("#page-title").css('background-image', 'url("{{asset('storage/users/background')}}/' + data + '")');
                                        $(".show_bg").attr('src', '{{asset('storage/users/background')}}/' + data);
                                        swal('{{__('lang.alert.success')}}', '{{__('lang.alert.upload-bg')}}', 'success');
                                        $("#progress-upload-bg").css("display", "none");
                                    },
                                    error: function () {
                                        swal('{{__('lang.alert.error')}}', '{{__('lang.alert.error-capt')}}', 'error');
                                    }
                                });
                                return false;
                            }
                        } else {
                            swal('{{__('lang.alert.error')}}', '{{__('lang.alert.upload-fail3')}}', 'error');
                        }
                    });
                }
            }
        };

        function humanFileSize(size) {
            var i = Math.floor(Math.log(size) / Math.log(1024));
            return (size / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
        }
    </script>
@endpush
