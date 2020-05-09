<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{__('admin.sidebar.head').': Authenticate | '.__('lang.title')}}</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('admins/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/fonts/fontawesome/css/all.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('admins/modules/bootstrap-social/bootstrap-social.css')}}">
    <!-- NProgress -->
    <link href="{{asset('admins/css/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <!-- Sweet Alert v2 -->
    <link rel="stylesheet" href="{{asset('js/plugins/sweetalert/sweetalert2.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('admins/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admins/css/components.css')}}">
    <style>
        a:hover, a:focus, a:active {
            color: #d77906;
            text-decoration: none;
        }

        .has-feedback .form-control-feedback {
            position: absolute;
            display: block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
        }

        #log_password + .glyphicon, #forg_password + .glyphicon, #forg_password_confirm + .glyphicon {
            cursor: pointer;
            pointer-events: all;
            transition: all .3s ease-in-out;
        }

        #log_password + .glyphicon:hover, #forg_password + .glyphicon:hover, #forg_password_confirm + .glyphicon:hover {
            color: #f89406;
        }

        #particles-js canvas {
            display: block;
            vertical-align: bottom;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            background: transparent;
        }

        .myProgress {
            position: fixed;
            margin-bottom: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 5px;
            border-radius: 0;
            z-index: 20;
        }

        .myProgress .bar {
            height: 100%;
            width: 10%;
            background: #f89406;
            transition: background 0.15s ease;
        }
    </style>

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <script src='https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit' async defer></script>
</head>
<body class="use-nicescroll">
<section class="section">
    <div id="particles-js"></div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <a href="{{URL::current()}}">
                        <img src="{{asset('images/logotype.png')}}" alt="logo" width="100"
                             class="shadow-light rounded-circle"></a>
                </div>

                <!-- sign-in -->
                <div id="sign-in" class="card card-primary">
                    <div class="card-header"><h4>SIGN IN</h4></div>

                    <div class="card-body">
                        @if(session('recovered'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                {{session('recovered')}}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <h4><i class="icon fa fa-times"></i> Alert!</h4>
                                {{session('error')}}
                            </div>
                        @endif
                        <p class="text-muted">Welcome back, please sign in to your account.</p>
                        <form method="POST" action="{{route('login')}}" class="needs-validation" novalidate="">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <label for="useremail">Username or Email</label>
                                <input id="useremail" type="text" class="form-control" name="useremail"
                                       tabindex="1" placeholder="Enter your username or email"
                                       value="{{old('useremail')}}" required autofocus>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <div class="invalid-feedback">Please fill in your username or email</div>
                            </div>

                            <div class="form-group has-feedback">
                                <div class="d-block">
                                    <label for="log_password" class="control-label">Password</label>
                                    <div class="float-right">
                                        <a href="javascript:void(0)" class="btn-reset text-small">Forgot
                                            Password?</a>
                                    </div>
                                </div>
                                <input id="log_password" type="password" class="form-control" name="password"
                                       tabindex="2" placeholder="Enter your password" required>
                                <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                      style="top: 25px"></span>
                                <div class="invalid-feedback">Please fill in your password</div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                           id="remember-me" {{old('remember') ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div>

                            <div id="recaptcha-login" class="form-group"></div>

                            <div class="form-group">
                                <button id="btn_login" type="submit" class="btn btn-primary btn-lg btn-block"
                                        tabindex="4" disabled>SIGN IN
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Reset & Recover password form -->
                <div id="recover-password" class="card card-primary" style="display: none;">
                    <div class="card-header">
                        <h4>{{session('reset') || session('recover_failed') ? 'Recovery' : 'Reset'}} Password</h4>
                    </div>

                    <div class="card-body">
                        @if(session('resetLink') || session('resetLink_failed'))
                            <div
                                class="alert alert-{{session('resetLink') ? 'success' : 'danger'}} alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <h4><i class="icon fa fa-{{session('resetLink') ? 'check' : 'times'}}"></i> Alert!
                                </h4>
                                {{session('resetLink') ? session('resetLink') : session('resetLink_failed')}}
                            </div>
                        @elseif(session('recover_failed'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <h4><i class="icon fa fa-times"></i> Alert!</h4>{{ session('recover_failed') }}
                            </div>
                        @endif
                        <p class="text-muted">
                            {{session('reset') || session('recover_failed') ? 'Please, enter your new password.' :
                            'To recover your password, please enter an email that associated with your account.'}}
                        </p>
                        <form method="POST" action="{{session('reset') || session('recover_failed') ?
                            route('password.reset', ['token' => session('reset') ? session('reset')['token'] :
                            old('token')]) : route('password.email')}}">{{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <div class="d-block">
                                    <label for="res_email" class="control-label">Email</label>
                                    <div class="float-right">
                                        <a href="javascript:void(0)" class="btn-sign-in text-small">
                                            Already have an account? Sign In</a>
                                    </div>
                                </div>
                                <input id="res_email" type="text" class="form-control" name="email"
                                       tabindex="1" placeholder="Enter your email" value="{{session('reset') ||
                                       session('recover_failed') ? session('reset')['email'] : ''}}" required autofocus>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"
                                      style="top: 25px"></span>
                            </div>

                            @if(session('reset') || session('recover_failed'))
                                <div class="form-group has-feedback error_forgPass">
                                    <label for="forg_password">New Password</label>
                                    <input id="forg_password" type="password" class="form-control pwstrength"
                                           data-indicator="pwindicator" name="password" tabindex="2"
                                           placeholder="Enter your new password" minlength="6" required>
                                    <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                          style="top: 25px"></span>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>

                                <div class="form-group has-feedback error_forgPass">
                                    <label for="forg_password_confirm">Confirm Password</label>
                                    <input id="forg_password_confirm" type="password" class="form-control"
                                           name="password_confirmation" tabindex="2" placeholder="Retype password"
                                           onkeyup="return checkForgotPassword()" minlength="6" required>
                                    <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                          style="top: 25px"></span>
                                    <span class="help-block"><b class="aj_forgPass"
                                                                style="text-transform: none"></b></span>
                                </div>
                            @endif

                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary btn-lg btn-block btn-password text-uppercase"
                                        tabindex="4">
                                    {{session('reset')||session('recover_failed') ? 'Reset Password' :
                                    'Send Password Reset Link'}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="simple-footer">
                    © {{now()->format('Y')}} Premier Printing. All rights reserved.<br>
                    Designed & Developed by <a href="http://rabbit-media.net" target="_blank">Rabbit Media</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="myProgress">
    <div class="bar"></div>
</div>
<!-- General JS Scripts -->
<script src="{{asset('admins/modules/jquery.min.js')}}"></script>
<script src="{{asset('admins/modules/popper.js')}}"></script>
<script src="{{asset('admins/modules/tooltip.js')}}"></script>
<script src="{{asset('admins/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/nicescroll/jquery.nicescroll.js')}}"></script>
<script src="{{asset('admins/modules/moment.min.js')}}"></script>
<script src="{{asset('admins/js/stisla.js')}}"></script>

<!-- JS Libraies -->
<!-- Page Specific JS File -->
<script src="{{asset('js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('js/hideShowPassword.min.js')}}"></script>
<script src="{{asset('js/checkMobileDevice.js')}}"></script>
<script src="{{asset('admins/modules/particles.min.js')}}"></script>

<!-- Template JS File -->
<script src="{{asset('admins/js/scripts.js')}}"></script>
<script src="{{asset('admins/js/custom.js')}}"></script>

<script>
    $('.btn-reset').on("click", function () {
        $('#sign-in').hide();
        $('#recover-password').fadeIn(300);
    });

    $('.btn-sign-in').on("click", function () {
        $('#sign-in').fadeIn(300);
        $('#recover-password').hide();
    });

    @if(session('resetLink') || session('resetLink_failed') || session('reset') || session('recover_failed'))
    $(".btn-reset").click();
        @endif

    var recaptcha_login, recaptchaCallback = function () {
            recaptcha_login = grecaptcha.render(document.getElementById('recaptcha-login'), {
                'sitekey': '{{env('reCAPTCHA_v2_SITEKEY')}}',
                'callback': 'enable_btnLogin',
                'expired-callback': 'disabled_btnLogin'
            });
        };

    function enable_btnLogin() {
        $("#btn_login").removeAttr('disabled');
    }

    function disabled_btnLogin() {
        $("#btn_login").attr('disabled', 'disabled');
    }

    $("#form-login").on("submit", function (e) {
        if (grecaptcha.getResponse(recaptcha_login).length === 0) {
            e.preventDefault();
            swal('ATTENTION!', 'Please confirm us that you\'re not a robot by clicking in ' +
                'the reCAPTCHA dialog-box.', 'warning');
        }
    });

    function checkForgotPassword() {
        var new_pas = $("#forg_password").val(),
            re_pas = $("#forg_password_confirm").val();
        if (new_pas != re_pas) {
            $(".error_forgPass").addClass('has-error');
            $(".aj_forgPass").text("Must match with your new password!");
            $(".btn-password").attr('disabled', 'disabled');
        } else {
            $(".error_forgPass").removeClass('has-error');
            $(".aj_forgPass").text("");
            $(".btn-password").removeAttr('disabled');
        }
    }

    $("#form-recovery").on("submit", function (e) {
        @if(session('reset') || session('recover_failed'))
        if ($("#forg_password_confirm").val() != $("#forg_password").val()) {
            $(".btn-password").attr('disabled', 'disabled');
            return false;

        } else {
            $("#forg_errorAlert").html('');
            $(".btn-password").removeAttr('disabled');
            return true;
        }
        @endif
    });

    $('#log_password + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#log_password').togglePassword();
    });

    $('#forg_password + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#forg_password').togglePassword();
    });

    $('#forg_password_confirm + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#forg_password_confirm').togglePassword();
    });

    (function () {
        particlesJS('particles-js', {
            'particles': {
                'number': {
                    'value': 100,
                    'density': {
                        'enable': true,
                        'value_area': 1000
                    }
                },
                'color': {
                    'value': ['#111111', '#222222']
                },
                'shape': {
                    'type': 'circle',
                    'stroke': {
                        'width': 0,
                        'color': '#fff'
                    },
                    'polygon': {
                        'nb_sides': 5
                    }
                },
                'opacity': {
                    'value': 0.6,
                    'random': false,
                    'anim': {
                        'enable': false,
                        'speed': 1,
                        'opacity_min': 0.1,
                        'sync': false
                    }
                },
                'size': {
                    'value': 2,
                    'random': true,
                    'anim': {
                        'enable': false,
                        'speed': 40,
                        'size_min': 0.1,
                        'sync': false
                    }
                },
                'line_linked': {
                    'enable': true,
                    'distance': 80,
                    'color': '#111',
                    'opacity': 0.9,
                    'width': 1
                }
            },
            'interactivity': {
                'detect_on': 'canvas',
                'events': {
                    'onhover': {
                        'enable': true,
                        'mode': 'grab'
                    },
                    'onclick': {
                        'enable': false
                    },
                    'resize': true
                },
                'modes': {
                    'grab': {
                        'distance': 240,
                        'line_linked': {
                            'opacity': 1
                        }
                    },
                    'bubble': {
                        'distance': 600,
                        'size': 80,
                        'duration': 8,
                        'opacity': 6,
                        'speed': 3
                    },
                    'repulse': {
                        'distance': 300,
                        'duration': 0.4
                    },
                    'push': {
                        'particles_nb': 2
                    },
                    'remove': {
                        'particles_nb': 4
                    }
                }
            },
            'retina_detect': true
        });

    }).call(this);

    var title = document.getElementsByTagName("title")[0].innerHTML;
    (function titleScroller(text) {
        document.title = text;
        setTimeout(function () {
            titleScroller(text.substr(1) + text.substr(0, 1));
        }, 500);
    }(title + " ~ "));

    function progress() {
        var windowScrollTop = $(window).scrollTop();
        var docHeight = $(document).height();
        var windowHeight = $(window).height();
        var progress = (windowScrollTop / (docHeight - windowHeight)) * 100;
        var $bgColor = progress > 99 ? '#ff9a06' : '#f89406';
        var $textColor = progress > 99 ? '#fff' : '#333';

        $('.myProgress .bar').width(progress + '%').css({backgroundColor: $bgColor});
        // $('h1').text(Math.round(progress) + '%').css({color: $textColor});
        $('.fill').height(progress + '%').css({backgroundColor: $bgColor});
    }

    progress();

    $(document).on('scroll', progress);

    $(document).on('mouseover', '.use-nicescroll', function () {
        $(this).getNiceScroll().resize();
    });
</script>
@include('layouts.partials._alert')
</body>
</html>
