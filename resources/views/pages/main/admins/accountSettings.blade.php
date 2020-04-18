@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': '.__('lang.header.settings').' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('admins/modules/bootstrap-social/bootstrap-social.css')}}">
    <style>
        #password + .glyphicon, #confirm + .glyphicon,
        #curr_password + .glyphicon, #as-password + .glyphicon, #as-confirm + .glyphicon {
            cursor: pointer;
            pointer-events: all;
        }

        .form-control-feedback {
            position: absolute;
            top: 3em;
            right: 2em;
        }
    </style>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('lang.header.settings')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Account</div>
                <div class="breadcrumb-item">{{__('lang.header.settings')}}</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hi, {{$admin->name}}!</h2>
            <p class="section-lead">Change your account information on this page.</p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-6">
                    @include('layouts.partials.admins._form-ava')
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card">
                        <form action="{{route('admin.update.pengaturan')}}" method="post" id="form-as">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="card-header">
                                <h4>Password Settings</h4>
                            </div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col has-feedback">
                                        <label for="email">Primary E-mail (verified)</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                               placeholder="Email" value="{{$admin->email}}" {{$admin->isRoot() ?
                                               'required' : 'readonly'}}>
                                        <span class="glyphicon glyphicon-check form-control-feedback right"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col has-feedback">
                                        <label for="curr_password">Current Password</label>
                                        <input id="curr_password" type="password" class="form-control" minlength="6"
                                               name="password" placeholder="Current Password" required>
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback right"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col has-feedback">
                                        <label for="as-password">New Password</label>
                                        <input id="as-password" type="password" class="form-control" minlength="6"
                                               name="new_password" placeholder="New Password" required>
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback right"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col has-feedback">
                                        <label for="as-confirm">Password Confirmation</label>
                                        <input id="as-confirm" type="password" class="form-control" minlength="6"
                                               name="password_confirmation" placeholder="Retype password" required
                                               onkeyup="return checkPassword($('#as-password').val(), $(this).val())">
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback right"
                                              aria-hidden="true"></span>
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
        $(".browse_files").on('click', function () {
            $("#ava").trigger('click');
        });

        $("#ava").on('change', function () {
            var files = $(this).prop("files");
            var names = $.map(files, function (val) {
                return val.name;
            });
            var txt = $("#txt_ava");
            txt.val(names);
            $("#txt_ava[data-toggle=tooltip]").attr('data-original-title', names).tooltip('show');
        });

        $('#curr_password + .glyphicon').on('click', function () {
            $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
            $('#curr_password').togglePassword();
        });

        $('#as-password + .glyphicon').on('click', function () {
            $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
            $('#as-password').togglePassword();
        });

        $('#as-confirm + .glyphicon').on('click', function () {
            $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
            $('#as-confirm').togglePassword();
        });

        function checkPassword(password, confirm) {
            if (password != confirm) {
                $("#as-password, #as-confirm").addClass('is-invalid');
                $("#as-password").parent().parent().addClass('has-danger');
                $("#form-as button[type=submit]").attr('disabled', 'disabled');
            } else {
                $("#as-password, #as-confirm").removeClass('is-invalid');
                $("#as-password").parent().parent().removeClass('has-danger');
                $("#form-as button[type=submit]").removeAttr('disabled');
            }
        }
    </script>
@endpush
