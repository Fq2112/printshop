@extends('layouts.mst')
@section('title',  __('lang.header.settings').': '.$user->name.' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    <style>
        .has-feedback .form-control-feedback {
            width: 36px;
            height: 36px;
            line-height: 36px;
        }

        .image-upload > input {
            display: none;
        }

        .image-upload label {
            cursor: pointer;
            width: 100%;
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{$bio->background == "" ? asset('images/banner/users.jpg') :
             asset('storage/users/background/'.$bio->background)}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{__('lang.header.settings')}}</h1>
            <span>{{__('lang.settings.capt')}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">{{__('lang.breadcrumb.account')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('lang.breadcrumb.settings')}}</li>
            </ol>
        </div>
    </section>

    <div id="page-menu">
        <div id="page-menu-wrap">
            <div class="container clearfix">
                <div class="menu-title"><span>{{$user->name}}</span></div>
                <nav>
                    <ul>
                        <li><a href="{{route('user.dashboard')}}">
                                <div>Dashboard</div>
                            </a></li>
                        <li><a href="{{route('user.profil')}}">
                                <div>{{__('lang.header.profile')}}</div>
                            </a></li>
                        <li class="current"><a href="{{URL::current()}}">
                                <div>{{__('lang.header.settings')}}</div>
                            </a></li>
                    </ul>
                </nav>
                <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>
            </div>
        </div>
    </div>

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-12 text-center">
                        <div class="myCard">
                            <form class="form-horizontal mb-0" role="form" method="POST" id="form-ava"
                                  enctype="multipart/form-data">
                                @csrf
                                {{ method_field('put') }}
                                <div class="img-card image-upload">
                                    <label for="file-input">
                                        <img style="width: 100%" class="show_ava" alt="Avatar" src="{{$bio->ava == "" ?
                                        asset('admins/img/avatar/avatar-'.rand(1,5).'.png') : asset('storage/users/ava/'.$bio->ava)}}"
                                             data-placement="bottom" data-toggle="tooltip"
                                             title="{{__('lang.tooltip.ava')}}">
                                    </label>
                                    <input id="file-input" name="ava" type="file" accept="image/*">
                                    <div id="progress-upload">
                                        <div class="progress-bar progress-bar-info progress-bar-striped active"
                                             role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                             aria-valuemax="100" style="background-color: #f89406;z-index: 20">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form class="form-horizontal mb-0" role="form" method="POST" id="form-username">
                                @csrf
                                {{ method_field('put') }}
                                <div class="card-content">
                                    <div class="card-title text-center">
                                        <h4 class="aj_name" style="color: #f89406">{{$user->name}}</h4>
                                        <h5 class="show_username" style="text-transform: none">{{$user->username}}</h5>
                                    </div>
                                    <div class="card-title">
                                        <div class="row justify-content-center">
                                            <div class="col">
                                                <small style="font-weight: 600">
                                                <span id="show_username_settings" class="fright"
                                                      style="cursor: pointer;color: #f89406">
                                                    <i class="icon-edit mr-1"></i> USERNAME</span>
                                                    <span id="hide_username_settings" class="fright"
                                                          style="color: #f89406;cursor: pointer;display:none">
                                                    <i class="icon-line2-action-undo mr-1"></i>
                                                    {{__('lang.button.cancel')}}</span>
                                                </small>
                                            </div>
                                        </div>
                                        <table class="stats_username m-0" style="font-size: 14px">
                                            <tr data-toggle="tooltip" data-placement="left"
                                                title="{{__('lang.profile.gender')}}">
                                                <td><i class="icon-transgender"></i></td>
                                                <td>&nbsp;</td>
                                                <td>{{$bio->gender != "" ? ucfirst($bio->gender) : __('lang.profile.empty')}}</td>
                                            </tr>
                                            <tr data-toggle="tooltip" data-placement="left"
                                                title="{{__('lang.profile.birthday')}}">
                                                <td><i class="icon-birthday-cake"></i></td>
                                                <td>&nbsp;</td>
                                                <td>{{$bio->dob != "" ? \Carbon\Carbon::parse($bio->dob)->format('j F Y') : __('lang.profile.empty')}}</td>
                                            </tr>
                                            <tr data-toggle="tooltip" data-placement="left"
                                                title="{{__('lang.footer.phone')}}">
                                                <td><i class="icon-phone"></i></td>
                                                <td>&nbsp;</td>
                                                <td>{{$bio->phone != "" ? $bio->phone : __('lang.profile.empty')}}</td>
                                            </tr>
                                            <tr data-toggle="tooltip" data-placement="left"
                                                title="{{__('lang.profile.address')}}">
                                                <td><i class="icon-map-marked-alt"></i></td>
                                                <td>&nbsp;</td>
                                                <td>{{$address != "" ? $address->address.' - '.$address->postal_code.' ('.$address->save_as.').' : __('lang.profile.empty')}}</td>
                                            </tr>
                                        </table>
                                        <div class="divider divider-center stats_username mt-2 mb-1">
                                            <i class="icon-circle"></i></div>
                                        <table class="stats_username m-0" style="font-size: 14px">
                                            <tr data-toggle="tooltip" data-placement="left"
                                                title="{{__('lang.profile.member-since')}}">
                                                <td><i class="icon-calendar-check"></i></td>
                                                <td>&nbsp;</td>
                                                <td>{{$user->created_at->formatLocalized('%d %B %Y')}}</td>
                                            </tr>
                                            <tr data-toggle="tooltip" data-placement="left"
                                                title="{{__('lang.profile.last-update')}}">
                                                <td><i class="icon-clock"></i></td>
                                                <td>&nbsp;</td>
                                                <td class="text-lowercase">{{$user->updated_at->diffForHumans()}}</td>
                                            </tr>
                                        </table>
                                        <div id="username_settings" style="display: none">
                                            <div id="error_username" class="row form-group has-feedback"
                                                 style="margin-bottom: 0">
                                                <div class="col">
                                                    <input id="username" type="text" class="form-control"
                                                           name="username" placeholder="Username"
                                                           value="{{$user->username}}" minlength="4" required>
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                    <span class="invalid-feedback">
                                                        <b class="aj_username" style="text-transform: none"></b>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <button type="submit" id="btn_save_username"
                                            class="btn btn-outline-primary btn-block noborder" disabled>
                                        <i class="icon-user mr-2"></i>{{__('lang.button.save')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12">
                        <div class="myCard">
                            <form class="form-horizontal mb-0" role="form" method="POST" id="form-password">
                                @csrf
                                {{ method_field('put') }}
                                <div class="card-content">
                                    <div class="card-title">
                                        <small style="font-weight: 600">{{__('lang.header.settings')}}</small>
                                        <div class="divider divider-center stats_username mt-0 mb-2"><i
                                                class="icon-circle"></i></div>
                                        <small>{{__('lang.settings.email-head')}}</small>
                                        <div class="row form-group has-feedback">
                                            <div class="col">
                                                <input type="email" class="form-control" value="{{$user->email}}"
                                                       disabled>
                                                <span class="glyphicon glyphicon-check form-control-feedback"></span>
                                            </div>
                                        </div>

                                        <small style="cursor: pointer; color: #f89406" id="show_password_settings">
                                            {{__('lang.settings.password-head2')}}
                                        </small>
                                        <div id="password_settings" style="display: none">
                                            <div id="error_curr_pass" class="row form-group has-feedback">
                                                <div class="col">
                                                    <input placeholder="{{__('lang.placeholder.old-password')}}"
                                                           id="check_password" type="password" class="form-control"
                                                           name="password" minlength="6" required autofocus>
                                                    <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                                          style="pointer-events: all;cursor: pointer"></span>
                                                    <span class="invalid-feedback">
                                                        <strong class="aj_pass" style="text-transform: none"></strong>
                                                    </span>
                                                </div>
                                            </div>

                                            <div id="error_new_pass" class="row form-group has-feedback">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <input placeholder="{{__('lang.placeholder.new-password')}}"
                                                           id="password" type="password" class="form-control"
                                                           name="new_password" minlength="6" required>
                                                    <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                                          style="pointer-events: all;cursor: pointer"></span>
                                                    @if($errors->has('new_password'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('new_password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <input placeholder="{{__('lang.placeholder.re-password')}}"
                                                           id="password-confirm" type="password" class="form-control"
                                                           name="password_confirmation" minlength="6" required
                                                           onkeyup="return checkPassword()">
                                                    <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                                          style="pointer-events: all;cursor: pointer"></span>
                                                    <span class="invalid-feedback">
                                                        <strong class="aj_new_pass"
                                                                style="text-transform: none"></strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <button type="submit" id="btn_save_password"
                                            class="btn btn-outline-primary btn-block noborder" disabled>
                                        <i class="icon-lock mr-2"></i>{{__('lang.button.save')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $("#show_username_settings").on('click', function () {
            $(this).toggle(300);
            $("#hide_username_settings").toggle(300);

            resetterUsername();

            $('html,body').animate({scrollTop: $("#form-ava").offset().top}, 500);
        });

        $("#hide_username_settings").on('click', function () {
            $(this).toggle(300);
            $("#show_username_settings").toggle(300);

            resetterUsername();
        });

        function resetterUsername() {
            $("#username_settings").toggle(300);
            $(".stats_username").toggle(300);

            if ($("#btn_save_username").attr('disabled')) {
                $("#btn_save_username").removeAttr('disabled');
            } else {
                $("#btn_save_username").attr('disabled', 'disabled');
            }
        }

        $("#form-username").on("submit", function (e) {
            $.ajax({
                type: 'POST',
                url: '{{route('user.update.pengaturan')}}',
                data: new FormData($("#form-username")[0]),
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data == 0) {
                        swal('{{__('lang.header.settings')}}', '{{__('lang.alert.username')}}', 'error');
                        $("#error_username").addClass('has-error');
                        $(".aj_username").text("{{__('lang.alert.username')}}").parent().show();

                    } else {
                        swal('{{__('lang.header.settings')}}', '{{__('lang.settings.username')}}', 'success');
                        $("#error_username").removeClass('has-error');
                        $(".aj_username").text("").parent().hide();
                        $("#show_username_settings").click();
                        $(".show_username").text(data);
                    }
                },
                error: function () {
                    swal('{{__('lang.alert.error')}}', '{{__('lang.alert.error-capt')}}', 'error');
                }
            });
            return false;
        });

        $("#show_password_settings").on('click', function () {
            $(this).text(function (i, v) {
                return v === "{{__('lang.settings.password-head')}}" ? "{{__('lang.settings.password-head2')}}" : "{{__('lang.settings.password-head')}}";
            });
            if ($(this).text() === '{{__('lang.settings.password-head2')}}') {
                this.style.color = "#f89406";
            } else {
                this.style.color = "#7f7f7f";
            }

            $("#password_settings").toggle(300);
            if ($("#btn_save_password").attr('disabled')) {
                $("#btn_save_password").removeAttr('disabled');
            } else {
                $("#btn_save_password").attr('disabled', 'disabled');
            }
        });

        $('#check_password + .glyphicon').on('click', function () {
            $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
            $('#check_password').togglePassword();
        });

        $('#password + .glyphicon').on('click', function () {
            $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
            $('#password').togglePassword();
        });

        $('#password-confirm + .glyphicon').on('click', function () {
            $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
            $('#password-confirm').togglePassword();
        });

        function checkPassword() {
            var new_pas = $("#password").val(),
                re_pas = $("#password-confirm").val();
            if (new_pas != re_pas) {
                $("#password, #password-confirm").addClass('is-invalid');
                $("#error_new_pass").addClass('has-danger');
                $(".aj_new_pass").text("Konfirmasi password harus sama dengan password baru Anda!").parent().show();
                $("#btn_save_password").attr('disabled', 'disabled');
            } else {
                $("#password, #password-confirm").removeClass('is-invalid');
                $("#error_new_pass").removeClass('has-danger');
                $(".aj_new_pass").text("").parent().hide();
                $("#btn_save_password").removeAttr('disabled');
            }
        }

        $("#form-password").on("submit", function (e) {
            $.ajax({
                type: 'POST',
                url: '{{route('user.update.pengaturan')}}',
                data: new FormData($("#form-password")[0]),
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data == 0) {
                        swal('{{__('lang.header.settings')}}', '{{__('lang.settings.old-password')}}', 'error');
                        $("#error_curr_pass").addClass('has-danger');
                        $("#error_new_pass").removeClass('has-danger');
                        $("#check_password").addClass('is-invalid');
                        $("#password, #password-confirm").removeClass('is-invalid');
                        $(".aj_pass").text("{{__('lang.settings.old-password')}}").parent().show();
                        $(".aj_new_pass").text("").parent().hide();

                    } else if (data == 1) {
                        swal('{{__('lang.header.settings')}}', '{{__('lang.alert.confirm-password')}}', 'error');
                        $("#error_curr_pass").removeClass('has-danger');
                        $("#error_new_pass").addClass('has-danger');
                        $("#check_password").removeClass('is-invalid');
                        $("#password, #password-confirm").addClass('is-invalid');
                        $(".aj_pass").text("").parent().hide();
                        $(".aj_new_pass").text("{{__('lang.alert.confirm-password')}}").parent().show();

                    } else {
                        swal('{{__('lang.header.settings')}}', '{{__('lang.settings.password')}}', 'success');
                        $("#form-password").trigger("reset");
                        $("#error_curr_pass").removeClass('has-danger');
                        $("#error_new_pass").removeClass('has-danger');
                        $("#check_password").removeClass('is-invalid');
                        $("#password, #password-confirm").removeClass('is-invalid');
                        $(".aj_pass").text("").parent().hide();
                        $(".aj_new_pass").text("").parent().hide();
                        $("#show_password_settings").click();
                    }
                },
                error: function () {
                    swal('{{__('lang.alert.error')}}', '{{__('lang.alert.error-capt')}}', 'error');
                }
            });
            return false;
        });

        document.getElementById("file-input").onchange = function () {
            var files_size = this.files[0].size,
                max_file_size = 2000000, allowed_file_types = ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg'],
                file_name = $(this).val().replace(/C:\\fakepath\\/i, ''),
                progress_bar_id = $("#progress-upload .progress-bar");

            if (!window.File && window.FileReader && window.FileList && window.Blob) {
                swal('{{__('lang.alert.warning')}}', "{{__('lang.alert.browser')}}", 'warning');

            } else {
                if (files_size > max_file_size) {
                    swal('{{__('lang.alert.error')}}', '{!! __('lang.alert.upload-fail') !!}', 'error');

                } else {
                    $(this.files).each(function (i, ifile) {
                        if (ifile.value !== "") {
                            if (allowed_file_types.indexOf(ifile.type) === -1) {
                                swal('{{__('lang.alert.error')}}', '{!! __('lang.alert.upload-fail2') !!}', 'error');

                            } else {
                                $.ajax({
                                    type: 'POST',
                                    url: '{{route('user.update.pengaturan')}}',
                                    data: new FormData($("#form-ava")[0]),
                                    contentType: false,
                                    processData: false,
                                    mimeType: "multipart/form-data",
                                    xhr: function () {
                                        var xhr = $.ajaxSettings.xhr();
                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function (event) {
                                                var percent = 0;
                                                var position = event.loaded || event.position;
                                                var total = event.total;
                                                if (event.lengthComputable) {
                                                    percent = Math.ceil(position / total * 100);
                                                }
                                                //update progressbar
                                                $("#progress-upload").css("display", "block");
                                                progress_bar_id.css("width", +percent + "%");
                                                progress_bar_id.text(percent + "%");
                                                if (percent == 100) {
                                                    progress_bar_id.removeClass("progress-bar-info");
                                                    progress_bar_id.addClass("progress-bar");
                                                } else {
                                                    progress_bar_id.removeClass("progress-bar");
                                                    progress_bar_id.addClass("progress-bar-info");
                                                }
                                            }, true);
                                        }
                                        return xhr;
                                    },
                                    success: function (data) {
                                        $(".show_ava").attr('src', data);
                                        swal('{{__('lang.alert.success')}}', '{{__('lang.alert.upload')}}', 'success');
                                        $("#progress-upload").css("display", "none");
                                    },
                                    error: function () {
                                        swal('{{__('lang.alert.error')}}', '{{__('lang.alert.error-capt')}}', 'error');
                                    }
                                });
                                return false;
                            }
                        } else {
                            swal('{{__('lang.alert.error')}}', '{{__('lang.alert.upload-fail3')}}', 'error');
                        }
                    });
                }
            }
        };

        function humanFileSize(size) {
            var i = Math.floor(Math.log(size) / Math.log(1024));
            return (size / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
        }
    </script>
@endpush
