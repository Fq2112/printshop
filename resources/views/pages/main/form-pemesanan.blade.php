@extends('layouts.mst')
@section('title',  __('lang.product.title').$clust->name.' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    <style>
        #content .postcontent {
            width: 70%;
        }

        #content .sidebar {
            width: 27%;
        }

        #content .sidebar .button-3d {
            font-size: 18px;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }

        #content .sidebar .button-3d:hover {
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{asset('storage/products/banner/'.$clust->banner)}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{$clust->name}}</h1>
            <span>{{$clust->caption}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">{{__('lang.breadcrumb.product')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$clust->name}}</li>
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
                                    <div class="divider divider-center m-1"><i class="icon-circle"></i></div>

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
                                    <div class="divider divider-center m-1"><i class="icon-circle"></i></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar sticky-sidebar-wrap col_last nobottommargin clearfix">
                        <div class="sidebar-widgets-wrap">
                            <div class="sticky-sidebar">
                                <div class="myCard mb-4">
                                    <div class="card-content">
                                        <div class="card-title">
                                            <h4 class="text-center"
                                                style="color: #f89406">{{__('lang.product.form.summary.head')}}</h4>
                                            <h5 class="text-center mb-2" style="text-transform: none">
                                                {{__('lang.product.form.summary.capt')}}</h5>
                                            <div class="divider divider-center m-1"><i class="icon-circle"></i></div>

                                        </div>
                                    </div>
                                    <div class="card-footer p-0">
                                        <button
                                            class="btn btn-outline-primary btn-block text-uppercase text-left noborder">
                                            {{__('lang.button.upload')}}<i class="icon-chevron-right fright"></i>
                                        </button>
                                    </div>
                                </div>

                                <a href="#" style="text-transform: none"
                                   class="button button-desc button-3d button-primary button-rounded w-100 m-0 pl-3">
                                    <table class="w-100 m-0 p-0"
                                           style="border-collapse: separate;border-spacing: 1em 0">
                                        <tr>
                                            <td>
                                                {{__('lang.product.form.summary.layout')}}
                                                <span>{{__('lang.button.download')}}</span>
                                            </td>
                                            <td><i class="icon-cloud-download"></i></td>
                                        </tr>
                                    </table>
                                </a>
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
