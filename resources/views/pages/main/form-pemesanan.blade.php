@extends('layouts.mst')
@section('title',  __('lang.product.title').$data->name.' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    <style>
        #content .postcontent {
            width: 70%;
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
            width: 100%;
            height: 100%;
        }

        .card-input .card-title {
            font-weight: 600 !important;
            font-size: 15px;
            text-transform: none;
        }

        .card-input .card-text {
            font-weight: 500;
            text-align: justify;
            line-height: unset !important;
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
                                    <div class="component-accordion">
                                        <div class="panel-group" id="accordion" role="tablist">
                                            <div class="panel">
                                                <div class="panel-heading" role="tab" id="heading-materials">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse"
                                                           href="#collapse-materials" aria-expanded="false"
                                                           aria-controls="collapse-materials" class="collapsed">
                                                            {{__('lang.product.form.summary.materials')}}
                                                            <b class="show-materials"></b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-materials" class="panel-collapse collapse"
                                                     role="tabpanel"
                                                     aria-labelledby="heading-materials" aria-expanded="false"
                                                     style="height: 0;" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="card-label" for="ac-260">
                                                                    <input id="ac-260" class="card-rb" name="materials"
                                                                           type="radio" value="Art Carton 260gsm"
                                                                           checked required>
                                                                    <div class="card card-input">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-auto">
                                                                                <a href="//placehold.it/500"
                                                                                   data-lightbox="image">
                                                                                    <img src="//placehold.it/100"
                                                                                         alt="Thumbnail">
                                                                                    <div
                                                                                        class="card-img-overlay d-flex">
                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col"
                                                                                 onclick="productSpecs('materials', $(this).parents('label').attr('for'))">
                                                                                <div class="card-block p-2">
                                                                                    <h4 class="card-title">Art Carton
                                                                                        260gsm</h4>
                                                                                    <p class="card-text">Thick but
                                                                                        economical. Shiny surface on
                                                                                        both sides with a thickness of
                                                                                        260 gsm.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label class="card-label" for="ac-310">
                                                                    <input id="ac-310" class="card-rb" name="materials"
                                                                           type="radio" value="Art Carton 310gsm">
                                                                    <div class="card card-input">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-auto">
                                                                                <a href="//placehold.it/500"
                                                                                   data-lightbox="image">
                                                                                    <img src="//placehold.it/100"
                                                                                         alt="Thumbnail">
                                                                                    <div
                                                                                        class="card-img-overlay d-flex">
                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col"
                                                                                 onclick="productSpecs('materials', $(this).parents('label').attr('for'))">
                                                                                <div class="card-block p-2">
                                                                                    <h4 class="card-title">Art Carton
                                                                                        310gsm</h4>
                                                                                    <p class="card-text">Same with
                                                                                        260gsm Art Carton but
                                                                                        thicker.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="heading-size">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse"
                                                           href="#collapse-size" aria-expanded="false"
                                                           aria-controls="collapse-size">
                                                            {{__('lang.product.form.summary.size')}}
                                                            <b class="show-size"></b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-size" class="panel-collapse collapse" role="tabpanel"
                                                     aria-labelledby="heading-size" aria-expanded="false"
                                                     style="height: 0;" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <label class="card-label" for="size-95">
                                                                    <input id="size-95" class="card-rb" name="size"
                                                                           type="radio" value="9,0 x 5,5 cm" checked
                                                                           required>
                                                                    <div class="card card-input">
                                                                        <div class="row no-gutters">
                                                                            <div class="col"
                                                                                 onclick="productSpecs('size', $(this).parents('label').attr('for'))">
                                                                                <div class="card-block py-2 px-5">
                                                                                    <h4 class="card-title text-center">
                                                                                        9,0 x 5,5 cm</h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="heading-side">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse"
                                                           href="#collapse-side" aria-expanded="false"
                                                           aria-controls="collapse-side">
                                                            {{__('lang.product.form.summary.side')}}
                                                            <b class="show-side"></b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-side" class="panel-collapse collapse" role="tabpanel"
                                                     aria-labelledby="heading-side" aria-expanded="false"
                                                     style="height: 0;" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="card-label" for="side-1">
                                                                    <input id="side-1" class="card-rb" name="side"
                                                                           type="radio" value="1 side" checked required>
                                                                    <div class="card card-input">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-auto">
                                                                                <a href="//placehold.it/500"
                                                                                   data-lightbox="image">
                                                                                    <img src="//placehold.it/100"
                                                                                         alt="Thumbnail">
                                                                                    <div
                                                                                        class="card-img-overlay d-flex">
                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col"
                                                                                 onclick="productSpecs('side', $(this).parents('label').attr('for'))">
                                                                                <div class="card-block p-2">
                                                                                    <h4 class="card-title">1 side</h4>
                                                                                    <p class="card-text">Design will be
                                                                                        printed on one side.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label class="card-label" for="side-2">
                                                                    <input id="side-2" class="card-rb" name="side"
                                                                           type="radio" value="2 sides">
                                                                    <div class="card card-input">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-auto">
                                                                                <a href="//placehold.it/500"
                                                                                   data-lightbox="image">
                                                                                    <img src="//placehold.it/100"
                                                                                         alt="Thumbnail">
                                                                                    <div
                                                                                        class="card-img-overlay d-flex">
                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col"
                                                                                 onclick="productSpecs('side', $(this).parents('label').attr('for'))">
                                                                                <div class="card-block p-2">
                                                                                    <h4 class="card-title">2 sides</h4>
                                                                                    <p class="card-text">Design will be
                                                                                        printed on both sides.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="heading-corner">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse"
                                                           href="#collapse-corner" aria-expanded="false"
                                                           aria-controls="collapse-corner">
                                                            {{__('lang.product.form.summary.corner')}}
                                                            <b class="show-corner"></b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-corner" class="panel-collapse collapse"
                                                     role="tabpanel"
                                                     aria-labelledby="heading-corner" aria-expanded="false"
                                                     style="height: 0;" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="card-label" for="corner-square">
                                                                    <input id="corner-square" class="card-rb"
                                                                           name="corner"
                                                                           type="radio" value="Square" checked required>
                                                                    <div class="card card-input">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-auto">
                                                                                <a href="//placehold.it/500"
                                                                                   data-lightbox="image">
                                                                                    <img src="//placehold.it/100"
                                                                                         alt="Thumbnail">
                                                                                    <div
                                                                                        class="card-img-overlay d-flex">
                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col"
                                                                                 onclick="productSpecs('corner', $(this).parents('label').attr('for'))">
                                                                                <div class="card-block p-2">
                                                                                    <h4 class="card-title">Square
                                                                                        Corner</h4>
                                                                                    <p class="card-text">Standard
                                                                                        cutting with 90° square
                                                                                        corner.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label class="card-label" for="corner-rounded">
                                                                    <input id="corner-rounded" class="card-rb"
                                                                           name="corner"
                                                                           type="radio" value="Rounded">
                                                                    <div class="card card-input">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-auto">
                                                                                <a href="//placehold.it/500"
                                                                                   data-lightbox="image">
                                                                                    <img src="//placehold.it/100"
                                                                                         alt="Thumbnail">
                                                                                    <div
                                                                                        class="card-img-overlay d-flex">
                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col"
                                                                                 onclick="productSpecs('corner', $(this).parents('label').attr('for'))">
                                                                                <div class="card-block p-2">
                                                                                    <h4 class="card-title">Rounded
                                                                                        Corner</h4>
                                                                                    <p class="card-text">Advance cutting
                                                                                        with rounded corner.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="heading-lamination">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse"
                                                           href="#collapse-lamination" aria-expanded="false"
                                                           aria-controls="collapse-lamination">
                                                            {{__('lang.product.form.summary.lamination')}}
                                                            <b class="show-lamination"></b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-lamination" class="panel-collapse collapse"
                                                     role="tabpanel"
                                                     aria-labelledby="heading-lamination" aria-expanded="false"
                                                     style="height: 0;" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="card-label" for="lamination-non">
                                                                    <input id="lamination-non" class="card-rb"
                                                                           name="lamination"
                                                                           type="radio" value="Non-laminated" required>
                                                                    <div class="card card-input">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-auto">
                                                                                <a href="//placehold.it/500"
                                                                                   data-lightbox="image">
                                                                                    <img src="//placehold.it/100"
                                                                                         alt="Thumbnail">
                                                                                    <div
                                                                                        class="card-img-overlay d-flex">
                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col"
                                                                                 onclick="productSpecs('lamination', $(this).parents('label').attr('for'))">
                                                                                <div class="card-block p-2">
                                                                                    <h4 class="card-title">
                                                                                        Non-laminated</h4>
                                                                                    <p class="card-text">Paper surface
                                                                                        is not laminated.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label class="card-label" for="lamination-doff">
                                                                    <input id="lamination-doff" class="card-rb"
                                                                           name="lamination"
                                                                           type="radio" value="Doff/Matte" checked>
                                                                    <div class="card card-input">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-auto">
                                                                                <a href="//placehold.it/500"
                                                                                   data-lightbox="image">
                                                                                    <img src="//placehold.it/100"
                                                                                         alt="Thumbnail">
                                                                                    <div
                                                                                        class="card-img-overlay d-flex">
                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col"
                                                                                 onclick="productSpecs('lamination', $(this).parents('label').attr('for'))">
                                                                                <div class="card-block p-2">
                                                                                    <h4 class="card-title">
                                                                                        Doff/Matte</h4>
                                                                                    <p class="card-text">Paper surface
                                                                                        is smooth, non-glossy, and looks
                                                                                        more exclusive.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label class="card-label" for="lamination-glossy">
                                                                    <input id="lamination-glossy" class="card-rb"
                                                                           name="lamination"
                                                                           type="radio" value="Glossy">
                                                                    <div class="card card-input">
                                                                        <div class="row no-gutters">
                                                                            <div class="col-auto">
                                                                                <a href="//placehold.it/500"
                                                                                   data-lightbox="image">
                                                                                    <img src="//placehold.it/100"
                                                                                         alt="Thumbnail">
                                                                                    <div
                                                                                        class="card-img-overlay d-flex">
                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col"
                                                                                 onclick="productSpecs('lamination', $(this).parents('label').attr('for'))">
                                                                                <div class="card-block p-2">
                                                                                    <h4 class="card-title">Glossy</h4>
                                                                                    <p class="card-text">Paper surface
                                                                                        is glossy, brighter, and print
                                                                                        colors are more visible.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="myCard mb-4">
                            <div class="card-content">
                                <div class="card-title" style="text-transform: none">
                                    <h4 class="text-center"
                                        style="color: #f89406">{{__('lang.product.form.shipping.head')}}</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        {{__('lang.product.form.shipping.capt')}}</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <small>{{__('lang.profile.city')}} <span class="required">*</span></small>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="icon-city"></i></span>
                                                </div>
                                                <select id="city_id" name="city_id" data-live-search="true"
                                                        class="form-control selectpicker" required
                                                        title="{{__('lang.placeholder.choose')}}">
                                                    @foreach($provinces as $province)
                                                        <optgroup label="{{$province->name}}">
                                                            @foreach($province->getCity as $city)
                                                                <option
                                                                    value="{{$city->id}}" {{!is_null($address) && $address->city_id == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
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

                        <div class="myCard">
                            <div class="card-content">
                                <div class="card-title" style="text-transform: none">
                                    <h4 class="text-center"
                                        style="color: #f89406">{{__('lang.product.form.quantity.head')}}</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        {{__('lang.product.form.quantity.capt')}}</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <small>{{__('lang.product.form.summary.quantity')}}
                                                <span class="required">*</span></small>
                                            <input id="range-quantity" name="quantity" class="input-range-slider"
                                                   required>
                                        </div>
                                    </div>
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
                                                    <td class="show-materials"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{__('lang.product.form.summary.size')}}</td>
                                                    <td>:&nbsp;</td>
                                                    <td class="show-size"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{__('lang.product.form.summary.side')}}</td>
                                                    <td>:&nbsp;</td>
                                                    <td class="show-side"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{__('lang.product.form.summary.corner')}}</td>
                                                    <td>:&nbsp;</td>
                                                    <td class="show-corner"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{__('lang.product.form.summary.lamination')}}</td>
                                                    <td>:&nbsp;</td>
                                                    <td class="show-lamination"></td>
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
                                            <b class="fright show-quantity"></b>
                                        </li>
                                        <li class="list-group-item noborder">
                                            {{__('lang.product.form.summary.price', ['unit' => 'box'])}}
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
                                            TOTAL<b class="fright show-total" style="font-size: large">&ndash;</b>
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
        var collapse = $('.panel-collapse'), range_slider = $("#range-quantity"), total = 0, str_unit = ' box';

        $(function () {
            range_slider.ionRangeSlider({
                grid: true,
                grid_num: 5,
                min: 1,
                max: 100,
                from: 1,
                postfix: str_unit,
                onStart: function (data) {
                    total = parseInt(data.from) * 25000;
                    $(".show-quantity").text(data.from + str_unit);
                    $(".show-total").text("Rp" + thousandSeparator(total) + ",00");
                },
                onChange: function (data) {
                    total = parseInt(data.from) * 25000;
                    $(".show-quantity").text(data.from + str_unit);
                    $(".show-total").text("Rp" + thousandSeparator(total) + ",00");
                }
            });

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

            $(".show-materials").text($("input[name='materials']:checked").val());
            $(".show-size").text($("input[name='size']:checked").val());
            $(".show-side").text($("input[name='side']:checked").val());
            $(".show-corner").text($("input[name='corner']:checked").val());
            $(".show-lamination").text($("input[name='lamination']:checked").val());
        });

        function productSpecs(check, spec) {
            $(".show-" + check).text($("#" + spec).val());
            $('#collapse-' + check).collapse('toggle');
        }
    </script>
@endpush
