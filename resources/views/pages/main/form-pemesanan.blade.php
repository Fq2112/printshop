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
                                            @if($specs->is_material == true)
                                                <div class="panel panel-default">
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
                                                         role="tabpanel" aria-labelledby="heading-materials"
                                                         aria-expanded="false" style="height: 0;"
                                                         data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                @foreach(\App\Models\Material::whereIn('id', $specs->material_ids)->get() as $row)
                                                                    <div class="col-{{$row->image != "" ? 6 : 4}}">
                                                                        <label class="card-label"
                                                                               for="materials-{{$row->id}}">
                                                                            <input id="materials-{{$row->id}}"
                                                                                   class="card-rb"
                                                                                   name="materials" type="radio"
                                                                                   value="{{$row->name}}">
                                                                            <div class="card card-input">
                                                                                <div class="row no-gutters">
                                                                                    @if($row->image != "")
                                                                                        <div class="col-auto">
                                                                                            <a href="{{$row->image}}"
                                                                                               data-lightbox="image">
                                                                                                <img
                                                                                                    src="{{$row->image}}"
                                                                                                    alt="Thumbnail">
                                                                                                <div
                                                                                                    class="card-img-overlay d-flex">
                                                                                                    <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    @endif
                                                                                    <div class="col"
                                                                                         onclick="productSpecs('materials', $(this).parents('label').attr('for'))">
                                                                                        <div class="card-block p-2">
                                                                                            <h4 class="card-title {{$row->image != "" ? '' : 'text-center'}}">{{$row->name}}</h4>
                                                                                            @if($row->image != "")
                                                                                                <p class="card-text">{{$row->description}}</p>
                                                                                            @endif
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
                                            @endif

                                            @if($specs->is_color == true)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="heading-color">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                               href="#collapse-color" aria-expanded="false"
                                                               aria-controls="collapse-color" class="collapsed">
                                                                {{__('lang.product.form.summary.color')}}
                                                                <b class="show-color"></b>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse-color" class="panel-collapse collapse"
                                                         role="tabpanel" aria-labelledby="heading-color"
                                                         aria-expanded="false" style="height: 0;"
                                                         data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                @foreach(\App\Models\Color::whereIn('id', $specs->color_ids)->get() as $row)
                                                                    <div class="col-{{$row->image != "" ? 6 : 4}}">
                                                                        <label class="card-label"
                                                                               for="color-{{$row->id}}">
                                                                            <input id="color-{{$row->id}}"
                                                                                   class="card-rb"
                                                                                   name="color" type="radio"
                                                                                   value="{{$row->name}}">
                                                                            <div class="card card-input">
                                                                                <div class="row no-gutters">
                                                                                    @if($row->image != "")
                                                                                        <div class="col-auto">
                                                                                            <a href="{{$row->image}}"
                                                                                               data-lightbox="image">
                                                                                                <img
                                                                                                    src="{{$row->image}}"
                                                                                                    alt="Thumbnail">
                                                                                                <div
                                                                                                    class="card-img-overlay d-flex">
                                                                                                    <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    @endif
                                                                                    <div class="col"
                                                                                         onclick="productSpecs('color', $(this).parents('label').attr('for'))">
                                                                                        <div class="card-block p-2">
                                                                                            <h4 class="card-title {{$row->image != "" ? '' : 'text-center'}}">{{$row->name}}</h4>
                                                                                            @if($row->image != "")
                                                                                                <p class="card-text">{{$row->description}}</p>
                                                                                            @endif
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
                                            @endif

                                            @if($specs->is_size == true)
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
                                                    <div id="collapse-size" class="panel-collapse collapse"
                                                         role="tabpanel"
                                                         aria-labelledby="heading-size" aria-expanded="false"
                                                         style="height: 0;" data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                @foreach(\App\Models\Size::whereIn('id', $specs->size_ids)->get() as $row)
                                                                    <div class="col-{{$row->image != "" ? 6 : 4}}">
                                                                        <label class="card-label"
                                                                               for="size-{{$row->id}}">
                                                                            <input id="size-{{$row->id}}"
                                                                                   class="card-rb"
                                                                                   name="size" type="radio"
                                                                                   value="{{$row->name}}">
                                                                            <div class="card card-input">
                                                                                <div class="row no-gutters">
                                                                                    @if($row->image != "")
                                                                                        <div class="col-auto">
                                                                                            <a href="{{$row->image}}"
                                                                                               data-lightbox="image">
                                                                                                <img
                                                                                                    src="{{$row->image}}"
                                                                                                    alt="Thumbnail">
                                                                                                <div
                                                                                                    class="card-img-overlay d-flex">
                                                                                                    <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    @endif
                                                                                    <div class="col"
                                                                                         onclick="productSpecs('size', $(this).parents('label').attr('for'))">
                                                                                        <div
                                                                                            class="card-block p-2">
                                                                                            <h4 class="card-title {{$row->image != "" ? '' : 'text-center'}}">
                                                                                                {{$row->name}}</h4>
                                                                                            @if($row->image != "")
                                                                                                <p class="card-text">{{$row->description}}</p>
                                                                                            @endif
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
                                            @endif

                                            @if($specs->is_side == true)
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
                                                    <div id="collapse-side" class="panel-collapse collapse"
                                                         role="tabpanel"
                                                         aria-labelledby="heading-side" aria-expanded="false"
                                                         style="height: 0;" data-parent="#accordion">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                @foreach(\App\Models\Side::whereIn('id', $specs->side_ids)->get() as $row)
                                                                    <div class="col-{{$row->image != "" ? 6 : 4}}">
                                                                        <label class="card-label"
                                                                               for="side-{{$row->id}}">
                                                                            <input id="side-{{$row->id}}"
                                                                                   class="card-rb"
                                                                                   name="side" type="radio"
                                                                                   value="{{$row->name}}">
                                                                            <div class="card card-input">
                                                                                <div class="row no-gutters">
                                                                                    @if($row->image != "")
                                                                                        <div class="col-auto">
                                                                                            <a href="{{$row->image}}"
                                                                                               data-lightbox="image">
                                                                                                <img
                                                                                                    src="{{$row->image}}"
                                                                                                    alt="Thumbnail">
                                                                                                <div
                                                                                                    class="card-img-overlay d-flex">
                                                                                                    <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    @endif
                                                                                    <div class="col"
                                                                                         onclick="productSpecs('side', $(this).parents('label').attr('for'))">
                                                                                        <div class="card-block p-2">
                                                                                            <h4 class="card-title {{$row->image != "" ? '' : 'text-center'}}">
                                                                                                {{$row->name}}</h4>
                                                                                            @if($row->image != "")
                                                                                                <p class="card-text">{{$row->description}}</p>
                                                                                            @endif
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
                                            @endif

                                            @if($specs->is_edge == true)
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
                                                                @foreach(\App\Models\Edge::whereIn('id', $specs->edge_ids)->get() as $row)
                                                                    <div class="col-{{$row->image != "" ? 6 : 4}}">
                                                                        <label class="card-label"
                                                                               for="corner-{{$row->id}}">
                                                                            <input id="corner-{{$row->id}}"
                                                                                   class="card-rb"
                                                                                   name="corner" type="radio"
                                                                                   value="{{$row->name}}">
                                                                            <div class="card card-input">
                                                                                <div class="row no-gutters">
                                                                                    @if($row->image != "")
                                                                                        <div class="col-auto">
                                                                                            <a href="{{$row->image}}"
                                                                                               data-lightbox="image">
                                                                                                <img
                                                                                                    src="{{$row->image}}"
                                                                                                    alt="Thumbnail">
                                                                                                <div
                                                                                                    class="card-img-overlay d-flex">
                                                                                                    <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    @endif
                                                                                    <div class="col"
                                                                                         onclick="productSpecs('corner', $(this).parents('label').attr('for'))">
                                                                                        <div class="card-block p-2">
                                                                                            <h4 class="card-title {{$row->image != "" ? '' : 'text-center'}}">
                                                                                                {{$row->name}}</h4>
                                                                                            @if($row->image != "")
                                                                                                <p class="card-text">{{$row->description}}</p>
                                                                                            @endif
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
                                                @endif

                                                @if($specs->is_front_side == true)
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading-front_side">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button"
                                                                   data-toggle="collapse"
                                                                   href="#collapse-front_side" aria-expanded="false"
                                                                   aria-controls="collapse-front_side">
                                                                    {{__('lang.product.form.summary.front_side')}}
                                                                    <b class="show-front_side"></b>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-front_side" class="panel-collapse collapse"
                                                             role="tabpanel"
                                                             aria-labelledby="heading-front_side" aria-expanded="false"
                                                             style="height: 0;" data-parent="#accordion">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    @foreach(\App\Models\Front::whereIn('id', $specs->front_side_ids)->get() as $row)
                                                                        <div class="col-{{$row->image != "" ? 6 : 4}}">
                                                                            <label class="card-label"
                                                                                   for="front_side-{{$row->id}}">
                                                                                <input id="front_side-{{$row->id}}"
                                                                                       class="card-rb"
                                                                                       name="front_side" type="radio"
                                                                                       value="{{$row->name}}">
                                                                                <div class="card card-input">
                                                                                    <div class="row no-gutters">
                                                                                        @if($row->image != "")
                                                                                            <div class="col-auto">
                                                                                                <a href="{{$row->image}}"
                                                                                                   data-lightbox="image">
                                                                                                    <img
                                                                                                        src="{{$row->image}}"
                                                                                                        alt="Thumbnail">
                                                                                                    <div
                                                                                                        class="card-img-overlay d-flex">
                                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                        @endif
                                                                                        <div class="col"
                                                                                             onclick="productSpecs('front_side', $(this).parents('label').attr('for'))">
                                                                                            <div class="card-block p-2">
                                                                                                <h4 class="card-title {{$row->image != "" ? '' : 'text-center'}}">
                                                                                                    {{$row->name}}</h4>
                                                                                                @if($row->image != "")
                                                                                                    <p class="card-text">{{$row->description}}</p>
                                                                                                @endif
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
                                                @endif

                                                @if($specs->is_back_side == true)
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading-back_side">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button"
                                                                   data-toggle="collapse"
                                                                   href="#collapse-back_side" aria-expanded="false"
                                                                   aria-controls="collapse-back_side">
                                                                    {{__('lang.product.form.summary.back_side')}}
                                                                    <b class="show-back_side"></b>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-back_side" class="panel-collapse collapse"
                                                             role="tabpanel"
                                                             aria-labelledby="heading-back_side" aria-expanded="false"
                                                             style="height: 0;" data-parent="#accordion">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    @foreach(\App\Models\BackSide::whereIn('id', $specs->back_side_ids)->get() as $row)
                                                                        <div class="col-{{$row->image != "" ? 6 : 4}}">
                                                                            <label class="card-label"
                                                                                   for="back_side-{{$row->id}}">
                                                                                <input id="back_side-{{$row->id}}"
                                                                                       class="card-rb"
                                                                                       name="back_side" type="radio"
                                                                                       value="{{$row->name}}">
                                                                                <div class="card card-input">
                                                                                    <div class="row no-gutters">
                                                                                        @if($row->image != "")
                                                                                            <div class="col-auto">
                                                                                                <a href="{{$row->image}}"
                                                                                                   data-lightbox="image">
                                                                                                    <img
                                                                                                        src="{{$row->image}}"
                                                                                                        alt="Thumbnail">
                                                                                                    <div
                                                                                                        class="card-img-overlay d-flex">
                                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                        @endif
                                                                                        <div class="col"
                                                                                             onclick="productSpecs('back_side', $(this).parents('label').attr('for'))">
                                                                                            <div class="card-block p-2">
                                                                                                <h4 class="card-title {{$row->image != "" ? '' : 'text-center'}}">
                                                                                                    {{$row->name}}</h4>
                                                                                                @if($row->image != "")
                                                                                                    <p class="card-text">{{$row->description}}</p>
                                                                                                @endif
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
                                                @endif

                                                @if($specs->is_right_side == true)
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading-right_side">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button"
                                                                   data-toggle="collapse"
                                                                   href="#collapse-right_side" aria-expanded="false"
                                                                   aria-controls="collapse-right_side">
                                                                    {{__('lang.product.form.summary.right_side')}}
                                                                    <b class="show-right_side"></b>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-right_side" class="panel-collapse collapse"
                                                             role="tabpanel"
                                                             aria-labelledby="heading-right_side" aria-expanded="false"
                                                             style="height: 0;" data-parent="#accordion">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    @foreach(\App\Models\RightLeftSide::whereIn('id', $specs->right_side_ids)->get() as $row)
                                                                        <div class="col-{{$row->image != "" ? 6 : 4}}">
                                                                            <label class="card-label"
                                                                                   for="right_side-{{$row->id}}">
                                                                                <input id="right_side-{{$row->id}}"
                                                                                       class="card-rb"
                                                                                       name="right_side" type="radio"
                                                                                       value="{{$row->name}}">
                                                                                <div class="card card-input">
                                                                                    <div class="row no-gutters">
                                                                                        @if($row->image != "")
                                                                                            <div class="col-auto">
                                                                                                <a href="{{$row->image}}"
                                                                                                   data-lightbox="image">
                                                                                                    <img
                                                                                                        src="{{$row->image}}"
                                                                                                        alt="Thumbnail">
                                                                                                    <div
                                                                                                        class="card-img-overlay d-flex">
                                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                        @endif
                                                                                        <div class="col"
                                                                                             onclick="productSpecs('right_side', $(this).parents('label').attr('for'))">
                                                                                            <div class="card-block p-2">
                                                                                                <h4 class="card-title {{$row->image != "" ? '' : 'text-center'}}">
                                                                                                    {{$row->name}}</h4>
                                                                                                @if($row->image != "")
                                                                                                    <p class="card-text">{{$row->description}}</p>
                                                                                                @endif
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
                                                @endif

                                                @if($specs->is_left_side == true)
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading-left_side">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button"
                                                                   data-toggle="collapse"
                                                                   href="#collapse-left_side" aria-expanded="false"
                                                                   aria-controls="collapse-left_side">
                                                                    {{__('lang.product.form.summary.left_side')}}
                                                                    <b class="show-left_side"></b>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-left_side" class="panel-collapse collapse"
                                                             role="tabpanel"
                                                             aria-labelledby="heading-left_side" aria-expanded="false"
                                                             style="height: 0;" data-parent="#accordion">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    @foreach(\App\Models\RightLeftSide::whereIn('id', $specs->left_side_ids)->get() as $row)
                                                                        <div class="col-{{$row->image != "" ? 6 : 4}}">
                                                                            <label class="card-label"
                                                                                   for="left_side-{{$row->id}}">
                                                                                <input id="left_side-{{$row->id}}"
                                                                                       class="card-rb"
                                                                                       name="left_side" type="radio"
                                                                                       value="{{$row->name}}">
                                                                                <div class="card card-input">
                                                                                    <div class="row no-gutters">
                                                                                        @if($row->image != "")
                                                                                            <div class="col-auto">
                                                                                                <a href="{{$row->image}}"
                                                                                                   data-lightbox="image">
                                                                                                    <img
                                                                                                        src="{{$row->image}}"
                                                                                                        alt="Thumbnail">
                                                                                                    <div
                                                                                                        class="card-img-overlay d-flex">
                                                                                                        <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                        @endif
                                                                                        <div class="col"
                                                                                             onclick="productSpecs('left_side', $(this).parents('label').attr('for'))">
                                                                                            <div class="card-block p-2">
                                                                                                <h4 class="card-title {{$row->image != "" ? '' : 'text-center'}}">
                                                                                                    {{$row->name}}</h4>
                                                                                                @if($row->image != "")
                                                                                                    <p class="card-text">{{$row->description}}</p>
                                                                                                @endif
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
                                                @endif

                                                @if($specs->is_lamination == true)
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading-lamination">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button"
                                                                   data-toggle="collapse"
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
                                                                @foreach(\App\Models\Lamination::whereIn('id', $specs->lamination_ids)->get() as $row)
                                                                    <div class="col-{{$row->image != "" ? 6 : 4}}">
                                                                        <label class="card-label"
                                                                               for="lamination-{{$row->id}}">
                                                                            <input id="lamination-{{$row->id}}"
                                                                                   class="card-rb"
                                                                                   name="lamination" type="radio"
                                                                                   value="{{$row->name}}">
                                                                            <div class="card card-input">
                                                                                <div class="row no-gutters">
                                                                                    @if($row->image != "")
                                                                                        <div class="col-auto">
                                                                                            <a href="{{$row->image}}"
                                                                                               data-lightbox="image">
                                                                                                <img
                                                                                                    src="{{$row->image}}"
                                                                                                    alt="Thumbnail">
                                                                                                <div
                                                                                                    class="card-img-overlay d-flex">
                                                                                                    <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    @endif
                                                                                    <div class="col"
                                                                                         onclick="productSpecs('lamination', $(this).parents('label').attr('for'))">
                                                                                        <div class="card-block p-2">
                                                                                            <h4 class="card-title {{$row->image != "" ? '' : 'text-center'}}">
                                                                                                {{$row->name}}</h4>
                                                                                            @if($row->image != "")
                                                                                                <p class="card-text">{{$row->description}}</p>
                                                                                            @endif
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
                                            @endif
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
                                                @if($specs->is_material == true)
                                                    <tr>
                                                        <td>{{__('lang.product.form.summary.materials')}}</td>
                                                        <td>:&nbsp;</td>
                                                        <td class="show-materials"></td>
                                                    </tr>
                                                @endif
                                                @if($specs->is_color == true)
                                                    <tr>
                                                        <td>{{__('lang.product.form.summary.color')}}</td>
                                                        <td>:&nbsp;</td>
                                                        <td class="show-color"></td>
                                                    </tr>
                                                @endif
                                                @if($specs->is_size == true)
                                                    <tr>
                                                        <td>{{__('lang.product.form.summary.size')}}</td>
                                                        <td>:&nbsp;</td>
                                                        <td class="show-size"></td>
                                                    </tr>
                                                @endif
                                                @if($specs->is_side == true)
                                                    <tr>
                                                        <td>{{__('lang.product.form.summary.side')}}</td>
                                                        <td>:&nbsp;</td>
                                                        <td class="show-side"></td>
                                                    </tr>
                                                @endif
                                                @if($specs->is_edge == true)
                                                    <tr>
                                                        <td>{{__('lang.product.form.summary.corner')}}</td>
                                                        <td>:&nbsp;</td>
                                                        <td class="show-corner"></td>
                                                    </tr>
                                                @endif
                                                @if($specs->is_front_side == true)
                                                    <tr>
                                                        <td>{{__('lang.product.form.summary.front_side')}}</td>
                                                        <td>:&nbsp;</td>
                                                        <td class="show-front_side"></td>
                                                    </tr>
                                                @endif
                                                @if($specs->is_back_side == true)
                                                    <tr>
                                                        <td>{{__('lang.product.form.summary.back_side')}}</td>
                                                        <td>:&nbsp;</td>
                                                        <td class="show-back_side"></td>
                                                    </tr>
                                                @endif
                                                @if($specs->is_right_side == true)
                                                    <tr>
                                                        <td>{{__('lang.product.form.summary.right_side')}}</td>
                                                        <td>:&nbsp;</td>
                                                        <td class="show-right_side"></td>
                                                    </tr>
                                                @endif
                                                @if($specs->is_left_side == true)
                                                    <tr>
                                                        <td>{{__('lang.product.form.summary.left_side')}}</td>
                                                        <td>:&nbsp;</td>
                                                        <td class="show-left_side"></td>
                                                    </tr>
                                                @endif
                                                @if($specs->is_lamination == true)
                                                    <tr>
                                                        <td>{{__('lang.product.form.summary.lamination')}}</td>
                                                        <td>:&nbsp;</td>
                                                        <td class="show-lamination"></td>
                                                    </tr>
                                                @endif
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

            $($.unique(
                $('.component-accordion .panel-body INPUT:radio').map(function (i, e) {
                    return $(e).attr('name')
                }).get()
            )).each(function (i, e) {
                $('.component-accordion .panel-body INPUT:radio[name="' + e + '"]:first')
                    .attr('checked', 'checked').attr('required', 'required');
            });

            $(".show-materials").text($("input[name='materials']:checked").val());
            $(".show-color").text($("input[name='color']:checked").val());
            $(".show-size").text($("input[name='size']:checked").val());
            $(".show-side").text($("input[name='side']:checked").val());
            $(".show-corner").text($("input[name='corner']:checked").val());
            $(".show-front_side").text($("input[name='front_side']:checked").val());
            $(".show-back_side").text($("input[name='back_side']:checked").val());
            $(".show-right_side").text($("input[name='right_side']:checked").val());
            $(".show-left_side").text($("input[name='left_side']:checked").val());
            $(".show-lamination").text($("input[name='lamination']:checked").val());
        });

        function productSpecs(check, spec) {
            $(".show-" + check).text($("#" + spec).val());
            $('#collapse-' + check).collapse('toggle');
        }
    </script>
@endpush
