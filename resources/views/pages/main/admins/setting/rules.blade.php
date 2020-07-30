<form id="setting-form" enctype="multipart/form-data" method="post"
      action="{{route('admin.setting.rules.update')}}">
    {{csrf_field()}}
    <?
    $data = \App\Models\Setting::where('id', '!=', 0)->first();
    ?>
    <div class="card-body">
        <p class="text-muted">Price reduction is nested and stops at the quantity of 100 units.</p>
        <div class="form-group row align-items-center">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Rule Amount</label>
            <div class="col-sm-6 col-md-9">
                {{$data->rules}} %
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Rule Value</label>
            <div class="col-sm-6 col-md-9">
                <input type="number" name="rule" class="form-control" id="site-title" required placeholder="in percent"
                       min="1" max="10">
                <input type="hidden" name="id" value="{{$data->id}}">
            </div>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <button class="btn btn-primary" id="save-btn">Save Changes</button>
    </div>
</form>


