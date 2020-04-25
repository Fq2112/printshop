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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="type-{{$row->id}}">
                                    <input id="type-{{$row->id}}" class="card-rb" name="type" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->type_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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

    @if($specs->is_material_cover == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-cover_material">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse"
                       href="#collapse-cover_material" aria-expanded="false"
                       aria-controls="collapse-cover_material" class="collapsed">
                        {{__('lang.product.form.summary.cover_material')}}
                        <b class="show-cover_material"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-cover_material" class="panel-collapse collapse"
                 role="tabpanel" aria-labelledby="heading-cover_material"
                 aria-expanded="false" style="height: 0;"
                 data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Material::whereIn('id', $specs->material_cover_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="cover_material-{{$row->id}}">
                                    <input id="cover_material-{{$row->id}}" class="card-rb" name="cover_material"
                                           type="radio" value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->material_cover_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
                                            @if($row->image != "")
                                                <div class="col-auto">
                                                    <a href="{{$row->image}}" data-lightbox="image">
                                                        <img src="{{$row->image}}" alt="Thumbnail">
                                                        <div class="card-img-overlay d-flex">
                                                            <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="col"
                                                 onclick="productSpecs('cover_material', $(this).parents('label').attr('for'))">
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

    @if($specs->is_side_cover == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-cover_side">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                       href="#collapse-cover_side" aria-expanded="false"
                       aria-controls="collapse-cover_side">
                        {{__('lang.product.form.summary.cover_side')}}
                        <b class="show-cover_side"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-cover_side" class="panel-collapse collapse"
                 role="tabpanel"
                 aria-labelledby="heading-cover_side" aria-expanded="false"
                 style="height: 0;" data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Side::whereIn('id', $specs->side_cover_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="cover_side-{{$row->id}}">
                                    <input id="cover_side-{{$row->id}}" class="card-rb" name="cover_side" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->side_cover_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('cover_side', $(this).parents('label').attr('for'))">
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

    @if($specs->is_cover_lamination == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-cover_lamination">
                <h4 class="panel-title">
                    <a class="collapsed" role="button"
                       data-toggle="collapse"
                       href="#collapse-cover_lamination" aria-expanded="false"
                       aria-controls="collapse-cover_lamination">
                        {{__('lang.product.form.summary.cover_lamination')}}
                        <b class="show-cover_lamination"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-cover_lamination" class="panel-collapse collapse"
                 role="tabpanel"
                 aria-labelledby="heading-cover_lamination" aria-expanded="false"
                 style="height: 0;" data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Lamination::whereIn('id', $specs->cover_lamination_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="cover_lamination-{{$row->id}}">
                                    <input id="cover_lamination-{{$row->id}}" class="card-rb" name="cover_lamination"
                                           type="radio" value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->cover_lamination_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('cover_lamination', $(this).parents('label').attr('for'))">
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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="materials-{{$row->id}}">
                                    <input id="materials-{{$row->id}}" class="card-rb" name="materials"
                                           type="radio" value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->material_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
                                            @if($row->image != "")
                                                <div class="col-auto">
                                                    <a href="{{$row->image}}" data-lightbox="image">
                                                        <img src="{{$row->image}}" alt="Thumbnail">
                                                        <div class="card-img-overlay d-flex">
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

    @if($specs->is_material_color == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-material_color">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse"
                       href="#collapse-material_color" aria-expanded="false"
                       aria-controls="collapse-material_color" class="collapsed">
                        {{__('lang.product.form.summary.material_color')}}
                        <b class="show-material_color"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-material_color" class="panel-collapse collapse"
                 role="tabpanel" aria-labelledby="heading-material_color"
                 aria-expanded="false" style="height: 0;"
                 data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Colors::whereIn('id', $specs->material_color_ids)->get() as $row)
                            @if(strpos($row->description, '#') !== false)
                                <div class="col">
                                    <label class="card-label" for="material_color-{{$row->id}}">
                                        <input id="material_color-{{$row->id}}" class="card-rb" name="material_color"
                                               type="radio" value="{{$row->id}}" data-name="{{$row->name}}"
                                            {{!is_null($cart) && $cart->material_color_id == $row->id ? 'checked' :''}}>
                                        <div class="card card-input">
                                            <div class="row no-gutters">
                                                <div class="col" style="background-color: {{$row->name}}"
                                                     onclick="productSpecs('material_color', $(this).parents('label').attr('for'))">
                                                    <div class="card-block p-2">
                                                        <h4 class="card-title text-center"
                                                            style="color: {{$row->description == '#FFFFFF' || $row->description == '#E8DD1C' || $row->description == '#0096FF' ? '' : '#fff'}}">
                                                            {{$row->name}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            @else
                                <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                    <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                           for="material_color-{{$row->id}}">
                                        <input id="material_color-{{$row->id}}" class="card-rb" name="material_color"
                                               type="radio" value="{{$row->id}}" data-name="{{$row->name}}"
                                            {{!is_null($cart) && $cart->material_color_id == $row->id ? 'checked' :''}}>
                                        <div class="card card-input h-100">
                                            <div
                                                class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
                                                @if($row->image != "")
                                                    <div class="col-auto">
                                                        <a href="{{$row->image}}" data-lightbox="image">
                                                            <img src="{{$row->image}}" alt="Thumbnail">
                                                            <div class="card-img-overlay d-flex">
                                                                <i class="icon-zoom-in icon-flip-horizontal align-self-center mx-auto"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                                <div class="col"
                                                     onclick="productSpecs('material_color', $(this).parents('label').attr('for'))">
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
                            @endif
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
                            @if(strpos($row->description, '#') !== false)
                                <div class="col">
                                    <label class="card-label" for="color-{{$row->id}}">
                                        <input id="color-{{$row->id}}" class="card-rb" name="color" type="radio"
                                               value="{{$row->id}}" data-name="{{$row->name}}"
                                            {{!is_null($cart) && $cart->color_id == $row->id ? 'checked' : ''}}>
                                        <div class="card card-input">
                                            <div class="row no-gutters">
                                                <div class="col" style="background-color: {{$row->name}}"
                                                     onclick="productSpecs('color', $(this).parents('label').attr('for'))">
                                                    <div class="card-block p-2">
                                                        <h4 class="card-title text-center"
                                                            style="color: {{$row->description == '#FFFFFF' || $row->description == '#E8DD1C' || $row->description == '#0096FF' ? '' : '#fff'}}">
                                                            {{$row->name}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            @else
                                <div
                                    class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                    <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                           for="color-{{$row->id}}">
                                        <input id="color-{{$row->id}}" class="card-rb" name="color" type="radio"
                                               value="{{$row->id}}" data-name="{{$row->name}}"
                                            {{!is_null($cart) && $cart->color_id == $row->id ? 'checked' : ''}}>
                                        <div class="card card-input h-100">
                                            <div
                                                class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
                                                @if($row->image != "")
                                                    <div class="col-auto">
                                                        <a href="{{$row->image}}" data-lightbox="image">
                                                            <img src="{{$row->image}}" alt="Thumbnail">
                                                            <div class="card-img-overlay d-flex">
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
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($specs->is_print_method == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-print_method">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                       href="#collapse-print_method" aria-expanded="false"
                       aria-controls="collapse-print_method">
                        {{__('lang.product.form.summary.print_method')}}
                        <b class="show-print_method"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-print_method" class="panel-collapse collapse"
                 role="tabpanel"
                 aria-labelledby="heading-print_method" aria-expanded="false"
                 style="height: 0;" data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\PrintingMethods::whereIn('id', $specs->print_method_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="print_method-{{$row->id}}">
                                    <input id="print_method-{{$row->id}}" class="card-rb" name="print_method"
                                           type="radio" value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->print_method_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('print_method', $(this).parents('label').attr('for'))">
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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="size-{{$row->id}}">
                                    <input id="size-{{$row->id}}" class="card-rb" name="size" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->size_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('size', $(this).parents('label').attr('for'), '{{$row->id == 90 ? 1 : 0}}')">
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
                            @if($row->id == 90)
                                <div id="custom_size" class="col-12" style="display: none">
                                    <div class="input-group">
                                        <input id="length" type="number" placeholder="{{__('lang.placeholder.length')}}"
                                               class="form-control" name="length" min="1"
                                               value="{{!is_null($cart) ? $cart->length : null}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text text-lowercase"><b>x</b></span>
                                        </div>
                                        <input id="width" type="number" placeholder="{{__('lang.placeholder.width')}}"
                                               class="form-control" name="width" min="1"
                                               value="{{!is_null($cart) ? $cart->width : null}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text text-lowercase"><b>cm</b></span>
                                            <button class="btn btn-primary" type="button" disabled>SET</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="side-{{$row->id}}">
                                    <input id="side-{{$row->id}}" class="card-rb" name="side" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->side_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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

    @if($specs->is_holder == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-holder">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                       href="#collapse-holder" aria-expanded="false"
                       aria-controls="collapse-holder">
                        {{__('lang.product.form.summary.holder')}}
                        <b class="show-holder"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-holder" class="panel-collapse collapse"
                 role="tabpanel"
                 aria-labelledby="heading-holder" aria-expanded="false"
                 style="height: 0;" data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Finishing::whereIn('id', $specs->holder_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="holder-{{$row->id}}">
                                    <input id="holder-{{$row->id}}" class="card-rb" name="holder" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->holder_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('holder', $(this).parents('label').attr('for'))">
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

    @if($specs->is_lid == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-lid">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                       href="#collapse-lid" aria-expanded="false"
                       aria-controls="collapse-lid">
                        {{__('lang.product.form.summary.lid')}}
                        <b class="show-lid"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-lid" class="panel-collapse collapse"
                 role="tabpanel"
                 aria-labelledby="heading-lid" aria-expanded="false"
                 style="height: 0;" data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Lid::whereIn('id', $specs->lid_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="lid-{{$row->id}}">
                                    <input id="lid-{{$row->id}}" class="card-rb" name="lid" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->lid_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('lid', $(this).parents('label').attr('for'))">
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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="corner-{{$row->id}}">
                                    <input id="corner-{{$row->id}}" class="card-rb" name="corner" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->edge_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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

    @if($specs->is_folding == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-folding">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                       href="#collapse-folding" aria-expanded="false"
                       aria-controls="collapse-folding">
                        {{__('lang.product.form.summary.folding')}}
                        <b class="show-folding"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-folding" class="panel-collapse collapse"
                 role="tabpanel"
                 aria-labelledby="heading-folding" aria-expanded="false"
                 style="height: 0;" data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Folding::whereIn('id', $specs->folding_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="folding-{{$row->id}}">
                                    <input id="folding-{{$row->id}}" class="card-rb" name="folding" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->folding_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('folding', $(this).parents('label').attr('for'))">
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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="front_side-{{$row->id}}">
                                    <input id="front_side-{{$row->id}}" class="card-rb" name="front_side" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->front_side_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="back_side-{{$row->id}}">
                                    <input id="back_side-{{$row->id}}" class="card-rb" name="back_side" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->back_side_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="right_side-{{$row->id}}">
                                    <input id="right_side-{{$row->id}}" class="card-rb" name="right_side" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->right_side_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="left_side-{{$row->id}}">
                                    <input id="left_side-{{$row->id}}" class="card-rb" name="left_side" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->left_side_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="balance-{{$row->id}}">
                                    <input id="balance-{{$row->id}}" class="card-rb" name="balance" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->balance_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="copies-{{$row->id}}">
                                    <input id="copies-{{$row->id}}" class="card-rb" name="copies" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->copies_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="page-{{$row->id}}">
                                    <input id="page-{{$row->id}}" class="card-rb" name="page" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->page_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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

    @if($specs->is_front_cover == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-front_cover">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse"
                       href="#collapse-front_cover" aria-expanded="false"
                       aria-controls="collapse-front_cover" class="collapsed">
                        {{__('lang.product.form.summary.front_cover')}}
                        <b class="show-front_cover"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-front_cover" class="panel-collapse collapse"
                 role="tabpanel" aria-labelledby="heading-front_cover"
                 aria-expanded="false" style="height: 0;"
                 data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Material::whereIn('id', $specs->front_cover_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="front_cover-{{$row->id}}">
                                    <input id="front_cover-{{$row->id}}" class="card-rb" name="front_cover" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->front_cover_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('front_cover', $(this).parents('label').attr('for'))">
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

    @if($specs->is_back_cover == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-back_cover">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse"
                       href="#collapse-back_cover" aria-expanded="false"
                       aria-controls="collapse-back_cover" class="collapsed">
                        {{__('lang.product.form.summary.back_cover')}}
                        <b class="show-back_cover"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-back_cover" class="panel-collapse collapse"
                 role="tabpanel" aria-labelledby="heading-back_cover"
                 aria-expanded="false" style="height: 0;"
                 data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Material::whereIn('id', $specs->back_cover_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="back_cover-{{$row->id}}">
                                    <input id="back_cover-{{$row->id}}" class="card-rb" name="back_cover" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->back_cover_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('back_cover', $(this).parents('label').attr('for'))">
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

    @if($specs->is_orientation == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-orientation">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse"
                       href="#collapse-orientation" aria-expanded="false"
                       aria-controls="collapse-orientation" class="collapsed">
                        {{__('lang.product.form.summary.orientation')}}
                        <b class="show-orientation"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-orientation" class="panel-collapse collapse"
                 role="tabpanel" aria-labelledby="heading-orientation"
                 aria-expanded="false" style="height: 0;"
                 data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Finishing::whereIn('id', $specs->orientation_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="orientation-{{$row->id}}">
                                    <input id="orientation-{{$row->id}}" class="card-rb" name="orientation" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->orientation_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('orientation', $(this).parents('label').attr('for'))">
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

    @if($specs->is_binding == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-binding">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse"
                       href="#collapse-binding" aria-expanded="false"
                       aria-controls="collapse-binding" class="collapsed">
                        {{__('lang.product.form.summary.binding')}}
                        <b class="show-binding"></b>
                    </a>
                </h4>
            </div>
            <div id="collapse-binding" class="panel-collapse collapse"
                 role="tabpanel" aria-labelledby="heading-binding"
                 aria-expanded="false" style="height: 0;"
                 data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Finishing::whereIn('id', $specs->binding_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="binding-{{$row->id}}">
                                    <input id="binding-{{$row->id}}" class="card-rb" name="binding" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->binding_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('binding', $(this).parents('label').attr('for'))">
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
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="lamination-{{$row->id}}">
                                    <input id="lamination-{{$row->id}}" class="card-rb" name="lamination" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->lamination_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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

    @if($specs->is_finishing == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-finishing">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-finishing"
                       aria-expanded="false" aria-controls="collapse-finishing">
                        Finishing <b class="show-finishing"></b></a>
                </h4>
            </div>
            <div id="collapse-finishing" class="panel-collapse collapse"
                 role="tabpanel"
                 aria-labelledby="heading-finishing" aria-expanded="false"
                 style="height: 0;" data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Finishing::whereIn('id', $specs->finishing_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="finishing-{{$row->id}}">
                                    <input id="finishing-{{$row->id}}" class="card-rb" name="finishing" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->finishing_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('finishing', $(this).parents('label').attr('for'))">
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

    @if($specs->is_extra == true)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-extra">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-extra"
                       aria-expanded="false" aria-controls="collapse-extra">
                        {{__('lang.product.form.summary.extra')}} <b class="show-extra"></b></a>
                </h4>
            </div>
            <div id="collapse-extra" class="panel-collapse collapse"
                 role="tabpanel"
                 aria-labelledby="heading-extra" aria-expanded="false"
                 style="height: 0;" data-parent="#accordion">
                <div class="panel-body">
                    <div class="row">
                        @foreach(\App\Models\Finishing::whereIn('id', $specs->extra_ids)->get() as $row)
                            <div class="col-lg-{{$row->image != "" ? 6 : 4}} col-md-6 col-sm-12 mb-3">
                                <label class="card-label h-100 {{$row->image != "" ? '' : 'align-items-center'}}"
                                       for="extra-{{$row->id}}">
                                    <input id="extra-{{$row->id}}" class="card-rb" name="extra" type="radio"
                                           value="{{$row->id}}" data-name="{{$row->name}}"
                                        {{!is_null($cart) && $cart->extra_id == $row->id ? 'checked' : ''}}>
                                    <div class="card card-input h-100">
                                        <div
                                            class="row no-gutters h-100 {{$row->image != "" ? '' : 'align-items-center'}}">
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
                                                 onclick="productSpecs('extra', $(this).parents('label').attr('for'))">
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
