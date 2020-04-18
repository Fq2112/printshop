@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': '.__('lang.header.profile').' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('admins/modules/bootstrap-social/bootstrap-social.css')}}">
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('lang.header.profile')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Account</div>
                <div class="breadcrumb-item">{{__('lang.header.profile')}}</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hi, {{$admin->name}}!</h2>
            <p class="section-lead">Change information about yourself on this page.</p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="row">
                        <div class="col">
                            @include('layouts.partials.admins._form-ava')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <form action="{{route('admin.update.profil')}}" method="post"
                                      class="needs-validation" novalidate>
                                    @csrf
                                    {{method_field('PUT')}}
                                    <input type="hidden" name="check_form" value="socmed">
                                    <div class="card-header">
                                        <h4>Social Media</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row form-group">
                                            <div class="col">
                                                <label for="fb">Facebook <sub>(optional)</sub></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-facebook-f"></i>
                                                        </span>
                                                    </div>
                                                    <input id="fb" placeholder="Facebook account" maxlength="191"
                                                           value="{{$admin->facebook}}" type="text" class="form-control"
                                                           name="facebook">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="tw">Twitter <sub>(optional)</sub></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-twitter"></i>
                                                        </span>
                                                    </div>
                                                    <input id="tw" placeholder="Twitter account" maxlength="191"
                                                           value="{{$admin->twitter}}" type="text" class="form-control"
                                                           name="twitter">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="ig">Instagram</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-instagram"></i>
                                                        </span>
                                                    </div>
                                                    <input id="ig" placeholder="Instagram account" maxlength="191"
                                                           value="{{$admin->instagram}}" type="text"
                                                           class="form-control" name="instagram" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="wa">Whatsapp</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-whatsapp"></i>
                                                        </span>
                                                    </div>
                                                    <input id="wa" placeholder="Whatsapp number" maxlength="191"
                                                           value="{{$admin->whatsapp}}" type="text"
                                                           onkeypress="return numberOnly(event, false)"
                                                           class="form-control" name="whatsapp" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                            <strong>Save Changes</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card">
                        <form action="{{route('admin.update.profil')}}" method="post" class="needs-validation"
                              novalidate enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <input type="hidden" name="check_form" value="personal_data">
                            <div class="card-header">
                                <h4>Personal Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col">
                                        <label class="control-label mb-0" for="ava">Avatar <sub>(optional)</sub></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="ava" class="custom-file-input" id="ava" accept="image/*">
                                                <label class="custom-file-label" id="txt_ava">
                                                    {{$admin->ava != "" ? $admin->ava : 'Choose File'}}</label>
                                            </div>
                                        </div>
                                        <div class="form-text text-muted">
                                            Allowed extension: jpg, jpeg, gif, png. Allowed size: < 2 MB
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <label for="name">Full Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                            </div>
                                            <input id="name" placeholder="Full name" maxlength="191" name="name"
                                                   value="{{$admin->name}}" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="bio">Bio <sub>(optional)</sub></label>
                                        <textarea id="bio" class="form-control" name="about"
                                                  style="min-height: 296px !important;"
                                                  placeholder="Write something about you here&hellip;">{{$admin
                                                  ->about}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                    <strong>Save Changes</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push("scripts")
    <script>
        $("#ava").on('change', function () {
            var files = $(this).prop("files"), names = $.map(files, function (val) {
                return val.name;
            }), text = names[0];
            $("#txt_ava").text(text.length > 60 ? text.slice(0, 60) + "..." : text);
        });

        function numberOnly(e, decimal) {
            var key;
            var keychar;
            if (window.event) {
                key = window.event.keyCode;
            } else if (e) {
                key = e.which;
            } else return true;
            keychar = String.fromCharCode(key);
            if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27) || (key == 188)) {
                return true;
            } else if ((("0123456789").indexOf(keychar) > -1)) {
                return true;
            } else if (decimal && (keychar == ".")) {
                return true;
            } else return false;
        }
    </script>
@endpush
