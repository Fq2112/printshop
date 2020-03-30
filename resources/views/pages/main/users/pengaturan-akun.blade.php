@extends('layouts.mst')
@section('title',  __('lang.header.settings').': '.$user->name.' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    <style>
        blockquote {
            background: unset;
            border-color: unset;
            color: unset;
        }

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
             style="background-image:url('{{asset('images/banner/users.jpg')}}');background-size:cover;padding:120px 0;">
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
                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                        <div class="card">
                            <form class="form-horizontal mb-0" role="form" method="POST" id="form-ava"
                                  enctype="multipart/form-data">
                                @csrf
                                {{ method_field('put') }}
                                <div class="img-card image-upload">
                                    <label for="file-input">
                                        <img style="width: 100%" class="show_ava" alt="Avatar" src="{{$user->getBio->ava == "" ?
                                        asset('images/avatar.png') : asset('storage/users/ava/'.$user->getBio->ava)}}"
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

                            <div class="card-content">
                                <div class="card-title text-center">
                                    <h4 class="aj_name" style="color: #f89406">{{$user->name}}</h4>
                                    <small style="text-transform: none">{{$user->username}}</small>
                                </div>
                                <div class="card-title">
                                    <form class="form-horizontal mb-0" role="form" method="POST" id="form-username">
                                        @csrf
                                        {{ method_field('put') }}
                                        <div id="show_username_settings" class="row"
                                             style="color: #f89406;cursor: pointer;font-size: 14px">
                                            <div class="col text-right">
                                                <i class="icon-edit mr-2"></i>{{__('lang.settings.username-head')}}
                                            </div>
                                        </div>
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

                                            <div class="row form-group">
                                                <div class="col">
                                                    <button id="btn_save_username" class="btn btn-link btn-sm btn-block"
                                                            type="submit" style="border: 1px solid #ccc">
                                                        <i class="icon-user-lock mr-2"></i>{{__('lang.button.save')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <hr style="margin: 10px 0">
                                    <table class="stats" style="font-size: 14px; margin-top: 0">
                                        <tr>
                                            <td><i class="icon-calendar-check"></i></td>
                                            <td>&nbsp;{{__('lang.profile.member-since')}}</td>
                                            <td>
                                                : {{$user->created_at->formatLocalized('%d %B %Y')}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="icon-clock"></i></td>
                                            <td>&nbsp;{{__('lang.profile.last-update')}}</td>
                                            <td style="text-transform: none;">
                                                : {{$user->updated_at->diffForHumans()}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-title">
                                    @if(\Illuminate\Support\Facades\Request::is('account/profile'))
                                        <div id="show_personal_data_settings" class="row justify-content-center"
                                             style="color: #592f83;cursor: pointer;font-size: 14px">
                                            <div class="col text-right"><i class="icon-edit mr-2"></i>EDIT</div>
                                        </div>
                                    @endif
                                    <table class="stats_personal_data" style="font-size: 15px;margin-top: 0">
                                        <tr data-toggle="tooltip" data-placement="left" title="Jenis Kelamin">
                                            <td><i class="icon-transgender"></i></td>
                                            <td>&nbsp;</td>
                                            <td>{{$user->getBio->gender != "" ? ucfirst($user->getBio->gender) : '(kosong)'}}</td>
                                        </tr>
                                        <tr data-toggle="tooltip" data-placement="left" title="Tanggal Lahir">
                                            <td><i class="icon-birthday-cake"></i></td>
                                            <td>&nbsp;</td>
                                            <td>{{$user->getBio->dob != "" ? \Carbon\Carbon::parse($user->getBio->dob)->format('j F Y') : '(kosong)'}}</td>
                                        </tr>
                                        <tr data-toggle="tooltip" data-placement="left" title="Nomor Telepon">
                                            <td><i class="icon-phone"></i></td>
                                            <td>&nbsp;</td>
                                            <td>{{$user->getBio->phone != "" ? $user->getBio->phone : '(kosong)'}}</td>
                                        </tr>
                                    </table>
                                    <hr class="stats_personal_data">
                                    <table class="stats_personal_data" style="font-size: 14px;margin-top: 0">
                                        <tr>
                                            <td><i class="icon-calendar-check"></i></td>
                                            <td>&nbsp;Member Since</td>
                                            <td>: {{$user->created_at->format('j F Y')}}</td>
                                        </tr>
                                        <tr>
                                            <td><i class="icon-clock"></i></td>
                                            <td>&nbsp;Last Update</td>
                                            <td>: {{$user->updated_at->diffForHumans()}}</td>
                                        </tr>
                                    </table>
                                    <div id="personal_data_settings" style="display: none">
                                        <small>Full Name</small>
                                        <div class="row form-group">
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="icon-id-card"></i></span>
                                                    </div>
                                                    <input placeholder="Name" maxlength="191" value="{{$user->name}}"
                                                           type="text" class="form-control" name="name" required
                                                           autofocus>
                                                </div>
                                            </div>
                                        </div>

                                        <small>Gender</small>
                                        <div class="row form-group fix-label-group">
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                    <span class="input-group-text fix-label-item"><i
                                            class="icon-transgender"></i></span>
                                                    </div>
                                                    <select class="form-control selectpicker" title="-- Choose --"
                                                            name="gender" required>
                                                        <option
                                                            value="male" {{$user->getBio->gender == "male" ? 'selected' : ''}}>
                                                            Male
                                                        </option>
                                                        <option
                                                            value="female" {{$user->getBio->gender == "female" ? 'selected' : ''}}>
                                                            Female
                                                        </option>
                                                        <option
                                                            value="other" {{$user->getBio->gender == "other" ? 'selected' : ''}}>
                                                            Rather not say
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <small>Birthday</small>
                                        <div class="row form-group">
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="icon-birthday-cake"></i></span>
                                                    </div>
                                                    <input class="form-control datepicker" name="dob" type="text"
                                                           required
                                                           placeholder="yyyy-mm-dd" value="{{$user->getBio->dob}}"
                                                           maxlength="10">
                                                </div>
                                            </div>
                                        </div>

                                        <small>{{__('lang.footer.phone')}}</small>
                                        <div class="row form-group">
                                            <div class="col">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-phone"></i></span>
                                                    </div>
                                                    <input placeholder="{{__('lang.placeholder.phone')}}" type="text"
                                                           class="form-control" name="phone" required
                                                           onkeypress="return numberOnly(event, false)"
                                                           value="{{$user->getBio->phone != "" ? $user->getBio->phone : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer p-0">
                                <button class="btn btn-outline-primary btn-block noborder"
                                        id="btn_save_personal_data" disabled>
                                    <i class="icon-user mr-2"></i>{{__('lang.button.save')}}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-12">
                        <div class="card">
                            <form class="form-horizontal mb-0" role="form" method="POST" id="form-password">
                                @csrf
                                {{ method_field('put') }}
                                <div class="card-content">
                                    <div class="card-title">
                                        <small style="font-weight: 600">{{__('lang.header.settings')}}</small>
                                        <hr class="mt-0">
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
                                                <div class="col">
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
                                                <div class="col">
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
                                    <button id="btn_save_password" class="btn btn-outline-primary btn-block noborder"
                                            disabled>
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
            $("#username_settings").toggle(300);
            $("#btn_mode_publik").toggle(300);
        });

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
                        swal('{{__('lang.header.settings')}}', '{{__('lang.alert.username')}}', 'success');
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
