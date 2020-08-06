<form id="setting-form" enctype="multipart/form-data" action="{{route('admin.setting.general.update')}}" method="post">
    {{csrf_field()}}

    <div class="card-body">
        <p class="text-muted">General settings such as, site title, site description, address
            and so on.</p>
        <div class="form-group row align-items-center">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email </label>
            <div class="col-sm-6 col-md-9">
                <input type="email" name="site_email" class="form-control" id="site-title" onkeyup="test(this.value)"
                       value="{{$data->email_premier}}">
                <input type="hidden" name="id" value="{{$data->id}}">
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="site-description" class="form-control-label col-sm-3 text-md-right">Address</label>
            <div class="col-sm-6 col-md-9">
                                        <textarea class="form-control summernote" name="address"
                                                  id="site-description">{!! $data->address !!}</textarea>
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
            <div class="col-sm-6 col-md-9">
                <div>
                    <img src="{{asset($data->logo)}}" alt="logo" id="img-logo" class="img-thumbnail img-logo">
                </div>
                <div class="custom-file">
                    <input type="file" name="site_logo" class="custom-file-input input-logo"
                           id="site-logo">
                    <input type="hidden" name="old_logo" value="{{$data->logo}}">
                    <label class="custom-file-label">Choose File</label>
                </div>
                <div class="form-text text-muted">The image must have a maximum size of 1MB
                </div>

            </div>
        </div>
{{--        <div class="form-group row align-items-center">--}}
{{--            <label class="form-control-label col-sm-3 text-md-right">Favicon</label>--}}
{{--            <div class="col-sm-6 col-md-9">--}}
{{--                <div class="custom-file">--}}
{{--                    <input type="file" name="site_favicon" class="custom-file-input"--}}
{{--                           id="site-favicon">--}}
{{--                    <label class="custom-file-label">Choose File</label>--}}
{{--                </div>--}}
{{--                <div class="form-text text-muted">The image must have a maximum size of 1MB--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="form-group row align-items-center">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Phone </label>
            <div class="col-sm-6 col-md-9">
                <input type="text" name="site_phone" class="form-control" id="site-title" value="{{$data->phone}}">
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Fax </label>
            <div class="col-sm-6 col-md-9">
                <input type="text" name="site_fax" class="form-control" id="site-title" value="{{$data->fax}}">
            </div>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <button class="btn btn-primary" id="save-btn">Save Changes</button>
    </div>
</form>

