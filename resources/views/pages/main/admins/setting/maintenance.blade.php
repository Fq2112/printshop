<form id="setting-form" enctype="multipart/form-data" method="post"
      action="{{route('admin.setting.maintenance.update')}}">
    {{csrf_field()}}
    <?php
    $data = \App\Models\Setting::where('id', '!=', 0)->first();
    ?>
    <div class="card-body">
        <p class="text-muted">Fill the form to Activate / Deactivate Maintenance mode.</p>
        <div class="form-group row align-items-center">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Maintenance Status</label>
            <div class="col-sm-6 col-md-9">
                @if($data->is_maintenance == 0)
                    <h4 class="text-danger">Non-Active</h4>
                    @else
                    <h4 class="text-success">Active</h4>
                @endif
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Owner Password</label>
            <div class="col-sm-6 col-md-9">
                <input type="password" name="password" class="form-control" id="site-title" required>
                <input type="hidden" name="id" value="{{$data->id}}">
            </div>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <button class="btn btn-primary" id="save-btn">Save Changes</button>
    </div>
</form>


