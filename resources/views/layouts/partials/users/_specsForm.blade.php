<div class="panel-group" id="accordion" role="tablist">
    @if($specs->is_type == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-type">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse"
                       href="#collapse-type" aria-expanded="false"
                       aria-controls="collapse-type" class="collapsed">
                        {{__('lang.product.form.summary.type')}}
                        <b class="show-type"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-type" class="panel-collapse collapse"
                 role="tabpanel" aria-labelledby="heading-type"
                 aria-expanded="false" style="height: 0;"
                 data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\TypeProduct::whereIn('id', $specs->type_ids)->get() as $row)
                            <div class="col-{{$row->image != "" ? 6 : 4}}">
                                <label class="card-label"
                                       for="type-{{$row->id}}">
                                    <input id="type-{{$row->id}}"
                                           class="card-rb"
                                           name="type" type="radio"
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
                                                 onclick="productSpecs('type', $(this).parents('label').attr('for'))">
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
                        @foreach(\App\Models\Colors::whereIn('id', $specs->color_ids)->get() as $row)
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

    @if($specs->is_balance == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-balance">
                <h4 class="panel-title">
                    <a class="collapsed" role="button"
                       data-toggle="collapse"
                       href="#collapse-balance" aria-expanded="false"
                       aria-controls="collapse-balance">
                        {{__('lang.product.form.summary.balance')}}
                        <b class="show-balance"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-balance" class="panel-collapse collapse"
                 role="tabpanel"
                 aria-labelledby="heading-balance" aria-expanded="false"
                 style="height: 0;" data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Balance::whereIn('id', $specs->balance_ids)->get() as $row)
                            <div class="col-{{$row->image != "" ? 6 : 4}}">
                                <label class="card-label"
                                       for="balance-{{$row->id}}">
                                    <input id="balance-{{$row->id}}"
                                           class="card-rb"
                                           name="balance" type="radio"
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
                                                 onclick="productSpecs('balance', $(this).parents('label').attr('for'))">
                                                <div class="card-block p-2">
                                                    <h4 class="card-title {{$row->image != "" ? '' : 'text-center'}}">
                                                        Rp{{number_format($row->name,2,',','.')}}</h4>
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

    @if($specs->is_copies == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-copies">
                <h4 class="panel-title">
                    <a class="collapsed" role="button"
                       data-toggle="collapse"
                       href="#collapse-copies" aria-expanded="false"
                       aria-controls="collapse-copies">
                        {{__('lang.product.form.summary.copies')}}
                        <b class="show-copies"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-copies" class="panel-collapse collapse"
                 role="tabpanel"
                 aria-labelledby="heading-copies" aria-expanded="false"
                 style="height: 0;" data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Copies::whereIn('id', $specs->copies_ids)->get() as $row)
                            <div class="col-{{$row->image != "" ? 6 : 4}}">
                                <label class="card-label"
                                       for="copies-{{$row->id}}">
                                    <input id="copies-{{$row->id}}"
                                           class="card-rb"
                                           name="copies" type="radio"
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
                                                 onclick="productSpecs('copies', $(this).parents('label').attr('for'))">
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

    @if($specs->is_page == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-page">
                <h4 class="panel-title">
                    <a class="collapsed" role="button"
                       data-toggle="collapse"
                       href="#collapse-page" aria-expanded="false"
                       aria-controls="collapse-page">
                        {{__('lang.product.form.summary.page')}}
                        <b class="show-page"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-page" class="panel-collapse collapse"
                 role="tabpanel"
                 aria-labelledby="heading-page" aria-expanded="false"
                 style="height: 0;" data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Pages::whereIn('id', $specs->page_ids)->get() as $row)
                            <div class="col-{{$row->image != "" ? 6 : 4}}">
                                <label class="card-label"
                                       for="page-{{$row->id}}">
                                    <input id="page-{{$row->id}}"
                                           class="card-rb"
                                           name="page" type="radio"
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
                                                 onclick="productSpecs('page', $(this).parents('label').attr('for'))">
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
