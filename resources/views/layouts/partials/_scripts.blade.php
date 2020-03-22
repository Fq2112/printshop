<script>
    $(function () {
        window.mobilecheck() ? $("body").removeClass('use-nicescroll') : $("body").css("overflow", "hidden");

        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();

        @if(session('register') || session('error') || session('logout') || session('expire') || session('inactive') ||
            session('unknown') || session('recovered'))
        openLoginModal();
        @elseif($errors->has('email') || $errors->has('password') || $errors->has('name'))
        openRegisterModal();
        @elseif(session('resetLink') || session('resetLink_failed'))
        openEmailModal();
        @elseif(session('reset') || session('recover_failed'))
        openPasswordModal();
        @endif
    });

    $("#top-cart-trigger").off('click').on('click', function (e) {
        @guest
        openLoginModal();
        @else
        @auth('admin')
        swal('{{__('lang.alert.warning')}}', '{{__('lang.alert.feature-fail')}}', 'warning');
        @else
        $("#page-menu").toggleClass('pagemenu-active', false);
        $("#top-cart").toggleClass('top-cart-open');
        e.stopPropagation();
        e.preventDefault();
        @endauth
        @endguest
    });

    var substringMatcher = function (strs) {
        return function findMatches(q, cb) {
            var matches, substrRegex;
            matches = [];

            substrRegex = new RegExp(q, 'i');

            $.each(strs, function (i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });

            cb(matches);
        };
    };

    var jsonData = [
            @foreach(\App\Models\ClusterKategori::all() as $row)
        {
            'label': '{{$row->getSubKategori->name . ': ' . $row->name}}',
            'q': '{{$row->name}}',
            'link': '{{route('produk', ['produk' => $row->permalink, 'lang' => $app->getLocale()])}}',
            'image': '{{asset('storage/products/thumb/'.$row->getSubKategori->getKategori->image)}}',
        },
        @endforeach
    ], data = [];

    $.each(jsonData, function (i, val) {
        data.push(val.label + "#" + val.q + "#" + val.link + "#" + val.image);
    });

    $('#keyword').typeahead({
        hint: true,
        highlight: true,
        minLength: 3,
        source: data,
        highlighter: function (item) {
            var parts = item.split('#'),
                html = '<div><div class="typeahead-inner">' +
                    '<div class="item-img" style="background-image: url(' + parts[3] + ')"></div>' +
                    '<div class="item-body"><p class="item-heading">' + parts[0] + '</p></div></div></div>';

            var query = this.query, reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&"),
                reQuery = new RegExp('(' + reEscQuery + ')', "gi"), jElem = $(html),
                textNodes = $(jElem.find('*')).add(jElem).contents().filter(function () {
                    return this.nodeType === 3;
                });

            textNodes.replaceWith(function () {
                return $(this).text().replace(reQuery, '<strong>$1</strong>');
            });

            return jElem.html();
        },
        updater: function (selectedName) {
            $("#top-search form").attr('action', selectedName.split('#')[2]);
            return selectedName.split('#')[1];
        }
    });

    /*$("#top-search form input[name=q]").autocomplete({
        source: function (request, response) {
            $.getJSON('/nama/' + $("#top-search form input[name=q]").val(), {
                name: request.term,
            }, function (data) {
                response(data);
            });
        },
        focus: function (event, ui) {
            event.preventDefault();
        },
        select: function (event, ui) {
            event.preventDefault();
            console.log(ui);
            $("#top-search form").attr('action', ui.item.link);
            $("#top-search form input[name=q]").val(ui.item.q);
            window.location.href = ui.item.link;
        }
    });*/

    $("#top-search form").on('submit', function (e) {
        e.preventDefault();
        if ($("#top-search form").attr('action') == "") {
            return false;
        } else {
            return true;
        }
    });

    var recaptcha_register, recaptchaCallback = function () {
        recaptcha_register = grecaptcha.render(document.getElementById('recaptcha-register'), {
            'sitekey': '{{env('reCAPTCHA_v2_SITEKEY')}}',
            'callback': 'enable_btnRegister',
            'expired-callback': 'disabled_btnRegister'
        });
    };

    function enable_btnRegister() {
        $("#btn_register").removeAttr('disabled');
    }

    function disabled_btnRegister() {
        $("#btn_register").attr('disabled', 'disabled');
    }

    $("#reg_username").on('blur', function () {
        $.get('{{route('cek.username', $app->getLocale())}}?username=' + $("#reg_username").val(), function (data) {
            if (data == 1) {
                $("#reg_errorAlert").html(
                    '<div class="alert alert-danger alert-dismissible">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                    '<h4 class="mb-1"><i class="icon-times"></i> Error!</h4>{{__('lang.alert.username')}}</div>'
                );
                $(".btn-register").attr('disabled', 'disabled');

            } else {
                $("#reg_errorAlert").html('');
                $(".btn-register").removeAttr('disabled');
            }
        });
    });

    $("#form-register").on("submit", function (e) {
        if (grecaptcha.getResponse(recaptcha_register).length === 0) {
            e.preventDefault();
            swal('{{__('lang.alert.warning')}}', '{{__('lang.alert.recaptcha')}}', 'warning');
        }

        if ($.trim($("#reg_email,#reg_name,#reg_password,#reg_password_confirm").val()) === "") {
            return false;

        } else {
            if ($("#reg_password_confirm").val() != $("#reg_password").val()) {
                return false;

            } else {
                $("#reg_errorAlert").html('');
                return true;
            }
        }
    });

    $("#reg_password_confirm").on("keyup", function () {
        if ($(this).val() != $("#reg_password").val()) {
            $("#reg_errorAlert").html(
                '<div class="alert alert-danger alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                '<h4 class="mb-1"><i class="icon-times"></i> Error!</h4>{{__('lang.alert.confirm-password')}}</div>'
            );
        } else {
            $("#reg_errorAlert").html('');
        }
    });

    function checkForgotPassword() {
        var new_pas = $("#forg_password").val(),
            re_pas = $("#forg_password_confirm").val();
        if (new_pas != re_pas) {
            $("#forg_errorAlert").html(
                '<div class="alert alert-danger alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                '<h4 class="mb-1"><i class="icon-times"></i> Error!</h4>{{__('lang.alert.confirm-password')}}</div>'
            );
            $(".btn-password").attr('disabled', 'disabled');

        } else {
            $("#forg_errorAlert").html('');
            $(".btn-password").removeAttr('disabled');
        }
    }

    $("#form-recovery").on("submit", function (e) {
        if ($("#forg_password_confirm").val() != $("#forg_password").val()) {
            $(".btn-password").attr('disabled', 'disabled');
            return false;

        } else {
            $("#forg_errorAlert").html('');
            $(".btn-password").removeAttr('disabled');
            return true;
        }
    });

    $('#log_password + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#log_password').togglePassword();
    });

    $('#reg_password + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#reg_password').togglePassword();
    });

    $('#reg_password_confirm + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#reg_password_confirm').togglePassword();
    });

    $('#forg_password + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#forg_password').togglePassword();
    });

    $('#forg_password_confirm + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#forg_password_confirm').togglePassword();
    });

    function showRegisterForm() {
        $('.loginBox, .emailBox, .passwordBox').fadeOut('fast', function () {
            $('.registerBox, #loginModal .social, #loginModal .division').fadeIn('fast');
            $('.login-footer').fadeOut('fast', function () {
                $('.register-footer').fadeIn('fast');
            });
            $('.modal-title').html('{{__('lang.modal.auth.header-create')}}');
        });
        $('.error').removeClass('alert alert-danger').html('');
    }

    function showLoginForm() {
        $('#loginModal .registerBox, .emailBox, .passwordBox').fadeOut('fast', function () {
            $('.loginBox, #loginModal .social, #loginModal .division').fadeIn('fast');
            $('.register-footer').fadeOut('fast', function () {
                $('.login-footer').fadeIn('fast');
            });
            $('.modal-title').html('{{__('lang.modal.auth.header-login')}}');
        });
        $('.error').removeClass('alert alert-danger').html('');
    }

    function showEmailForm() {
        $('.loginBox, .registerBox, .passwordBox, #loginModal .social, #loginModal .division')
            .fadeOut('fast', function () {
                $('.emailBox').fadeIn('fast');
                $('.register-footer').fadeOut('fast', function () {
                    $('.login-footer').fadeIn('fast');
                });

                $('.modal-title').html('{{__('lang.modal.auth.header-reset')}}');
            });
        $('.error').removeClass('alert alert-danger').html('');
    }

    function showResetPasswordForm() {
        $('.emailBox, .registerBox, .loginBox, #loginModal .social, #loginModal .division')
            .fadeOut('fast', function () {
                $('.passwordBox').fadeIn('fast');
                $('.login-footer, .register-footer').fadeOut('fast');
                $('.modal-title').html('{{__('lang.modal.auth.header-recovery')}}');
            });
        $('.error').removeClass('alert alert-danger').html('');
    }

    function openLoginModal() {
        showLoginForm();
        setTimeout(function () {
            $('#loginModal').modal('show');
        }, 230);
    }

    function openRegisterModal() {
        showRegisterForm();
        setTimeout(function () {
            $('#loginModal').modal('show');
        }, 230);
    }

    function openEmailModal() {
        showEmailForm();
        setTimeout(function () {
            $('#loginModal').modal('show');
        }, 230);
    }

    function openPasswordModal() {
        showResetPasswordForm();
        setTimeout(function () {
            $('#loginModal').modal('show');
        }, 230);
    }

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

    var title = document.getElementsByTagName("title")[0].innerHTML;
    (function titleScroller(text) {
        document.title = text;
        setTimeout(function () {
            titleScroller(text.substr(1) + text.substr(0, 1));
        }, 500);
    }(title + " ~ "));

    <!--Scroll Progress Bar-->
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

    window.onload = function () {
        // $('.images-preloader').fadeOut();

        $(".use-nicescroll").niceScroll({
            cursorcolor: "rgb(248,148,6)",
            cursorwidth: "8px",
            background: "rgba(222, 222, 222, .75)",
            cursorborder: 'none',
            horizrailenabled: false,
            autohidemode: 'leave',
            zindex: 9999999,
        });

        var options = {
            whatsapp: "+62817597777",
            email: "{{env('MAIL_USERNAME')}}",
            call_to_action: "{{__('lang.footer.wh')}}",
            button_color: "#f89406",
            position: "left",
            order: "email,whatsapp",
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    };

    $(document).on('mouseover', '.use-nicescroll', function () {
        $(this).getNiceScroll().resize();
    });
</script>
