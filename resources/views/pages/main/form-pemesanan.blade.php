@extends('layouts.mst')
@section('title',  __('lang.product.title').$data->name.' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    <style>
        #content .postcontent {
            width: 70%;
        }

        #content .postcontent .accordion .acctitle {
            padding: 10px 0;
            font-weight: normal;
            text-transform: none;
        }

        #content .postcontent .accordion .acctitle i {
            right: 0;
            left: unset;
        }

        #content .sidebar {
            width: 27%;
        }

        #content .sidebar .button {
            width: 100%;
            margin: 0;
            padding: {{$app->isLocale('en') ? '.5em' : '.5em 0'}};
            text-transform: none;
            font-size: 18px;
            background-color: #fff;
            border-color: transparent;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }

        #content .sidebar .button:hover {
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        #content .sidebar .button table {
            width: 100%;
            margin: 0;
            padding: 0;
            border-collapse: separate;
            border-spacing: {{$app->isLocale('en') ? '1.1em' : '1.1rem'}} 0;
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{asset('storage/products/banner/'.$data->banner)}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{$data->name}}</h1>
            <span>{{$data->caption}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">{{__('lang.breadcrumb.product')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$data->name}}</li>
            </ol>
        </div>
    </section>

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row">
                    <div class="postcontent mr-4 nobottommargin clearfix">
                        <div class="myCard mb-4">
                            <div class="card-content">
                                <div class="card-title">
                                    <h4 class="text-center" style="color: #f89406">{{__('lang.product.form.head')}}</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        {{__('lang.product.form.capt')}}</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    <div class="accordion pl-3 pr-3 clearfix" data-state="closed">
                                        <div class="acctitle">
                                            <i class="acc-closed icon-edit1"></i>
                                            <i class="acc-open icon-edit"></i>
                                            {{__('lang.product.form.summary.materials')}}
                                            <b class="fright mr-4">Art Carton 260gsm</b>
                                        </div>
                                        <div class="acc_content p-0 clearfix">
                                            Art Carton 260gsm
                                        </div>

                                        <div class="acctitle">
                                            <i class="acc-closed icon-edit1"></i>
                                            <i class="acc-open icon-edit"></i>
                                            {{__('lang.product.form.summary.size')}}
                                            <b class="fright mr-4">9,0 &times; 5,5 cm</b>
                                        </div>
                                        <div class="acc_content p-0 clearfix">
                                            9,0 &times; 5,5 cm
                                        </div>

                                        <div class="acctitle">
                                            <i class="acc-closed icon-edit1"></i>
                                            <i class="acc-open icon-edit"></i>
                                            {{__('lang.product.form.summary.side')}}
                                            <b class="fright mr-4">2 sides</b>
                                        </div>
                                        <div class="acc_content p-0 clearfix">
                                            2 sides
                                        </div>

                                        <div class="acctitle">
                                            <i class="acc-closed icon-edit1"></i>
                                            <i class="acc-open icon-edit"></i>
                                            {{__('lang.product.form.summary.corner')}}
                                            <b class="fright mr-4">Rounded</b>
                                        </div>
                                        <div class="acc_content p-0 clearfix">
                                            Rounded
                                        </div>

                                        <div class="acctitle">
                                            <i class="acc-closed icon-edit1"></i>
                                            <i class="acc-open icon-edit"></i>
                                            {{__('lang.product.form.summary.lamination')}}
                                            <b class="fright mr-4">Non-laminated</b>
                                        </div>
                                        <div class="acc_content p-0 clearfix">
                                            Non-laminated
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="myCard">
                            <div class="card-content">
                                <div class="card-title">
                                    <h4 class="text-center"
                                        style="color: #f89406">{{__('lang.product.form.quantity.head')}}</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        {{__('lang.product.form.quantity.capt')}}</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar sticky-sidebar-wrap col_last nobottommargin clearfix">
                        <div class="sidebar-widgets-wrap">
                            <div class="sticky-sidebar">
                                <div class="myCard {{$guidelines != "" ? 'mb-4' : ''}}">
                                    <div class="card-content pb-0">
                                        <div class="card-title m-0">
                                            <h4 class="text-center"
                                                style="color: #f89406">{{__('lang.product.form.summary.head')}}</h4>
                                            <h5 class="text-center mb-2" style="text-transform: none">
                                                {{__('lang.product.form.summary.capt')}}</h5>
                                            <div class="divider divider-center mt-1 mb-2"><i class="icon-circle"></i>
                                            </div>
                                            <table style="margin: 0;font-size: 14px;text-transform: none">
                                                <thead>
                                                <tr>
                                                    <td colspan="3" class="font-weight-normal text-uppercase">
                                                        {{__('lang.product.form.summary.specification')}}
                                                    </td>
                                                </tr>
                                                </thead>
                                                <tbody class="font-weight-bold">
                                                <tr>
                                                    <td>{{__('lang.product.form.summary.materials')}}</td>
                                                    <td>:&nbsp;</td>
                                                    <td>Art Carton 260gsm</td>
                                                </tr>
                                                <tr>
                                                    <td>{{__('lang.product.form.summary.size')}}</td>
                                                    <td>:&nbsp;</td>
                                                    <td>9,0 &times; 5,5 cm</td>
                                                </tr>
                                                <tr>
                                                    <td>{{__('lang.product.form.summary.side')}}</td>
                                                    <td>:&nbsp;</td>
                                                    <td>2 sides</td>
                                                </tr>
                                                <tr>
                                                    <td>{{__('lang.product.form.summary.corner')}}</td>
                                                    <td>:&nbsp;</td>
                                                    <td>Rounded</td>
                                                </tr>
                                                <tr>
                                                    <td>{{__('lang.product.form.summary.lamination')}}</td>
                                                    <td>:&nbsp;</td>
                                                    <td>Non-laminated</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="divider divider-right mt-1 mb-0"><i class="icon-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.quantity')}}
                                            <b class="fright">1 box</b>
                                        </li>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.price')}}
                                            <b class="fright">Rp{{number_format(25000,2,',','.')}}</b>
                                        </li>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.production')}}
                                            <b class="fright">{{now()->formatLocalized('%d %b %Y')}}</b>
                                        </li>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.delivery')}}
                                            <b class="fright">2 &ndash; 3 days</b>
                                        </li>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.received')}}
                                            <b class="fright"><b>{{now()->addDays(3)->formatLocalized('%d %b %Y')}}</b></b>
                                        </li>
                                    </ul>
                                    <div class="card-content pt-0 pb-0">
                                        <div class="divider divider-right mt-0 mb-0"><i class="icon-plus-sign"></i>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item noborder">
                                            TOTAL<b class="fright" style="font-size: large">&ndash;</b>
                                        </li>
                                    </ul>
                                    <div class="card-content pb-0">
                                        <div class="alert alert-warning text-justify">
                                            <i class="icon-exclamation-sign"></i><b>{{__('lang.alert.warning')}}</b> {!! __('lang.product.form.summary.alert', ['quantity' => '1 box', 'product' => $data->name]) !!}
                                        </div>
                                    </div>
                                    <div class="card-footer p-0">
                                        <button
                                            class="btn btn-primary btn-block text-uppercase text-left noborder">
                                            {{__('lang.button.upload')}}<i class="icon-chevron-right fright"></i>
                                        </button>
                                    </div>
                                </div>

                                @if($guidelines != "")
                                    <a class="button button-desc button-border button-primary button-rounded"
                                       href="{{asset('storage/products/guidelines/'. $guidelines)}}">
                                        <table>
                                            <tr>
                                                <td>
                                                    {{__('lang.product.form.summary.layout')}}
                                                    <span>{{__('lang.button.download')}}</span>
                                                </td>
                                                <td><i class="icon-cloud-download"></i></td>
                                            </tr>
                                        </table>
                                    </a>
                                @endif
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

    </script>
@endpush
