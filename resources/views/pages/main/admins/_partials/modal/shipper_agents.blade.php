<form id="form-blogCategory" method="post" action="{{route('admin.shipper.create.pickup')}}">
    {{csrf_field()}}

    <div class="row">
        <div class="col">
            <label for="name">Pickup Date<sup class="text-danger">*</sup></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input id="pickup_date" type="datetime-local" name="pickup_date" class="form-control disabled" min="{{Carbon\Carbon::parse(now())->format('Y-m-d').'T08:30'}}"
                         value=""
                       placeholder="Write its name here&hellip;" required>
                <input type="hidden" name="payment_code" value="{{$code}}" readonly>
                <input type="hidden" name="agent_name" id="agent_name">
                <input type="hidden" name="agent_phone" id="agent_phone">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <label for="name">Choose One of Available Agents <sup class="text-danger">*</sup></label>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                @foreach($data as $datum)
                    <div class=" col-md-6 col-lg-6 col-sm-4 ">
                        <label>
                            <input type="radio" name="agent_id" class="card-input-element d-none" id="demo1" value="{{$datum['agent']['id']}}" required onchange="getPhoneAgent('{{$datum["contact"]["phone"]}}','{{$datum["contact"]["name"]}}')">

                            <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                <div class="row">
                                    <div class="col">
                                        {{$datum['agent']['name']}} <br>
                                        <small> <i class="fa fa-user"></i> {{$datum['contact']['name']}}</small><br>
                                        <small> <i class="fa fa-phone"></i> {{$datum['contact']['phone']}}</small>
                                    </div>
                                </div>

                            </div>
                        </label>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
