@extends('layouts.mst')
@section('title',  __('lang.header.cart').': '.$user->name.' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    <style>
        .component-accordion .panel-group .panel {
            border: 0 none;
            box-shadow: 0 4px 5px -1px #E5E5E5;
            margin-bottom: 15px;
        }

        .component-accordion .panel-group .panel-heading {
            background-color: #fff;
            border-radius: 5px 5px 0 0;
            color: #444;
            padding: 0;
        }

        .component-accordion .panel-group .panel-heading h4 {
            margin: 0;
        }

        .component-accordion .panel-group .panel-heading a:hover.active,
        .component-accordion .panel-group .panel-heading a.active {
            color: #f89406;
        }

        .component-accordion .panel-group .panel-title a {
            border-radius: 5px 5px 0 0;
            color: #888;
            display: block;
            font-size: 16px;
            font-weight: 500;
            text-transform: none;
            position: relative;
            padding: 15px;
            transition: color .2s ease-in-out;
        }

        .component-accordion .panel-group .panel-title a:hover {
            color: #444;
            text-decoration: none;
        }

        .component-accordion .panel-group .panel-title a b {
            margin-right: 4em;
            float: right;
        }

        .component-accordion .panel-group .panel-title a.collapsed::after,
        .component-accordion .panel-group .panel-title a::after {
            border-left: 1px solid #eee;
            font-family: 'font-icons';
            content: "\ec52";
            line-height: 55px;
            padding-left: 20px;
            position: absolute;
            right: 19px;
            top: 0;
        }

        .component-accordion .panel-group .panel-title a:after {
            content: "\e9eb";
        }

        .component-accordion .panel-body {
            background: #fff;
            color: #888;
            padding: 20px;
        }

        .component-accordion .panel-group .panel-heading + .panel-collapse > .panel-body,
        .component-accordion .panel-group .panel-heading + .panel-collapse > .list-group {
            border-top: 1px solid #eee;
        }

        .card-label {
            width: 100%;
        }

        .card-label .card-title {
            text-transform: none;
        }

        .card-rb {
            display: none;
        }

        .card-input {
            cursor: pointer;
            border: 1px solid #eee;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            opacity: .6;
        }

        .card-input:hover {
            border-color: #f89406;
            opacity: .8;
        }

        .card-rb:checked + .card-input {
            border-color: #f89406;
            opacity: 1;
        }

        .card-input .card-img-overlay {
            background: rgba(0, 0, 0, 0.4);
            font-size: 2rem;
            opacity: 0;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }

        .card-input a:hover .card-img-overlay {
            opacity: 1;
            color: #fff;
        }

        .card-input img {
            width: 128px;
            height: 100%;
        }

        .card-input .card-title {
            font-weight: 600 !important;
            font-size: 15px;
            text-transform: none !important;
        }

        .card-input .card-text {
            font-weight: 500;
            line-height: unset !important;
        }

        .content-area {
            cursor: pointer;
        }

        .custom-overlay {
            background: rgba(0, 0, 0, 0.4);
        }

        .modal-footer button {
            margin: 0;
            padding: 10px 0;
            border-radius: 0 0 4px 4px;
            font-weight: 600;
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{$bio->background == "" ? asset('images/banner/users.jpg') :
             asset('storage/users/background/'.$bio->background)}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{__('lang.header.cart')}}</h1>
            <span>{{__('lang.cart.capt')}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">{{__('lang.breadcrumb.account')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('lang.header.cart')}}</li>
            </ol>
        </div>
    </section>

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="myCard">
                    <div class="card-content">
                        <div class="card-title">
                            <h4 class="text-center" style="color: #f89406">{{__('lang.product.form.head')}}</h4>
                            <h5 class="text-center mb-2" style="text-transform: none">
                                {{__('lang.product.form.capt')}}</h5>
                            <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                            <div class="component-accordion">
                                <div class="panel-group" id="accordion" role="tablist">
                                    @php $carts = $archive;$a = 1;$b = 1;$c = 1;$d = 1;$e = 1;$f = 1;$total = 0; @endphp
                                    @foreach($carts as $monthYear => $archive)
                                        @php $a++; $b++; $c++; $d++; $e++; $f++; @endphp
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading-{{$a}}">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse"
                                                       href="#collapse-{{$b}}" aria-expanded="false"
                                                       aria-controls="collapse-{{$c}}" class="collapsed">
                                                        {{$monthYear``}}
                                                        <b class="show-{{$d}}"></b>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-{{$e}}" class="panel-collapse collapse"
                                                 role="tabpanel" aria-labelledby="heading-{{$f}}"
                                                 aria-expanded="false" style="height: 0;"
                                                 data-parent="#accordion">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        @foreach($archive as $row)
                                                            @php
                                                                $data = !is_null($row->subkategori_id) ? $row->getSubKategori : $row->getCluster;
                                                                $total += $row->total;
                                                                $image = !is_null($row->subkategori_id) ?
                                                                asset('storage/products/banner/'.$row->getSubKategori->banner) :
                                                                asset('storage/products/thumb/'.$row->getCluster->thumbnail);
                                                                $specs = !is_null($row->subkategori_id) ? $data->getSubkatSpecs : $data->getClusterSpecs;
                                                            @endphp
                                                            <div class="col-12 mb-3">
                                                                <label class="card-label" for="address_{{$row->id}}">
                                                                    <input id="cart_{{$row->id}}" class="card-rb"
                                                                           type="checkbox" name="cart_id"
                                                                           value="{{$row->id}}">
                                                                    <div class="card card-input">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="media">
                                                                                    <div
                                                                                        class="content-area align-self-center ml-3">
                                                                                        <img alt="icon" width="100"
                                                                                             src="{{$image}}">
                                                                                        <div class="custom-overlay">
                                                                                            <div class="custom-text">
                                                                                                <i class="icon-zoom-in icon-flip-horizontal icon-2x"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="ml-3 media-body"
                                                                                         onclick="javascript:void(0)">
                                                                                        <h5 class="mt-3 mb-1">
                                                                                            <i class="icon-drafting-compass mr-1"></i>{{$data->name}}
                                                                                        </h5>
                                                                                        <blockquote class="mb-3"
                                                                                                    style="font-size: 14px;text-transform: none">
                                                                                            <table
                                                                                                style="margin: 0;font-size: 14px;">
                                                                                                <thead>
                                                                                                <tr>
                                                                                                    <td colspan="3"
                                                                                                        class="font-weight-normal text-uppercase">
                                                                                                        {{__('lang.product.form.summary.specification')}}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </thead>
                                                                                                @include('layouts.partials.users._summaryForm')
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
    <script>
        $(function () {
            collapse.on('show.bs.collapse', function () {
                $(this).siblings('.panel-heading').addClass('active');
                $(this).siblings('.panel-heading').find('a').addClass('active font-weight-bold');
                $(this).siblings('.panel-heading').find('b').toggle(300);
            });

            collapse.on('hide.bs.collapse', function () {
                $(this).siblings('.panel-heading').removeClass('active');
                $(this).siblings('.panel-heading').find('a').removeClass('active font-weight-bold');
                $(this).siblings('.panel-heading').find('b').toggle(300);
            });
        });
    </script>
@endpush
