<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 ERROR &ndash; {{__('lang.errors.404-head').' | '.__('lang.title')}}</title>
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/error.css')}}">
    <style>
        .particle-error,
        .permission_denied,
        #particles-js {
            width: 100%;
            height: 100%;
            margin: 0px !important;
        }

        #particles-js {
            position: fixed !important;
            opacity: 0.23;
        }

        .title-typewriter {
            width: 398px;
            margin: 19.5em auto 0 auto;
        }

        p {
            width: 470px;
            text-align: center;
            color: #fff;
            font-size: 17px;
            line-height: 1.3;
            margin: -.5em auto 0 auto;
        }
    </style>
</head>
<body class="use-nicescroll">
<div id="particles-js"></div>
<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
     width="675.000000pt" height="216.000000pt" viewBox="0 0 675.000000 216.000000"
     preserveAspectRatio="xMidYMid meet">
    <g transform="translate(0.000000,216.000000) scale(0.100000,-0.100000)"
       fill="#ffffff" stroke="none">
        <path d="M0 1080 l0 -1080 1078 2 1077 3 3 1045 c1 575 0 1060 -3 1078 l-6 32
-1074 0 -1075 0 0 -1080z m1193 773 c6 -16 42 -79 79 -141 38 -62 68 -117 68
-123 0 -12 -178 -253 -191 -257 -5 -2 -28 12 -51 30 -94 74 -193 89 -291 44
-106 -48 -152 -121 -152 -236 1 -63 5 -81 27 -116 53 -82 137 -129 233 -129
66 0 110 17 163 62 19 16 150 201 291 413 l257 385 168 5 c105 3 174 1 183 -5
11 -8 2 -27 -42 -95 -30 -46 -55 -90 -55 -96 0 -7 -4 -14 -8 -16 -5 -1 -114
-178 -242 -393 -129 -214 -240 -396 -247 -403 -7 -7 -13 -18 -13 -23 0 -6 -11
-25 -25 -43 -14 -18 -25 -38 -25 -44 0 -6 -7 -17 -14 -25 -8 -8 -28 -37 -43
-64 -15 -28 -65 -111 -110 -186 -46 -74 -83 -140 -83 -147 0 -6 -10 -10 -22
-8 -16 2 -31 21 -53 63 -27 53 -75 139 -112 200 -7 11 -15 27 -19 35 -9 18
-68 123 -140 247 -30 50 -54 94 -54 97 0 3 -17 34 -38 68 -21 35 -41 70 -45
78 -4 8 -23 42 -42 75 -19 33 -39 69 -44 81 -5 11 -27 50 -49 86 -39 63 -100
172 -130 233 -9 17 -18 32 -21 35 -3 3 -13 19 -22 35 -8 17 -37 67 -64 113
-39 67 -46 85 -34 92 7 5 200 9 429 9 389 0 440 2 465 23 31 26 91 67 98 68 4
0 13 -12 20 -27z"/>
    </g>
</svg>
<div class="roll-wrap">
    <div class="roll">
        <div class="roll-roof">
            <div class="roll-silencer">
                <div class="roll-smoke"></div>
            </div>
        </div>
        <div class="roll-main">
            <div class="roll-body"></div>
            <div class="roll-back"></div>
            <div class="roll-front"></div>
        </div>
    </div>
    <div class="road">
        <div class="mud-wrap clearfix">
            <div class="mud"></div>
            <div class="mud"></div>
            <div class="mud"></div>
            <div class="mud"></div>
        </div>
    </div>
</div>
<div class="background-gocel"></div>
<div class="background-ground"></div>
<div class="title-typewriter">
    <h1 class="line-1 anim-typewriter">404 ERROR &ndash; PAGE NOT FOUND</h1>
</div>
<p>{{__('lang.errors.404-capt')}}</p>
@if(Auth::guard('admin')->check() && \Illuminate\Support\Facades\Request::is('scott.royce*'))
    <a href="{{route('admin.dashboard', $app->getLocale())}}">{{__('lang.errors.act1')}}</a>
@else
    <a href="{{route('beranda', $app->getLocale())}}">{{__('lang.errors.act2')}}</a>
@endif
<!-- jquery -->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/checkMobileDevice.js')}}"></script>
<!-- Nicescroll -->
<script src="{{asset('js/plugins/nicescroll/jquery.nicescroll.js')}}"></script>
<!-- ParticleJS -->
<script src="{{asset('js/components/particles.min.js')}}"></script>
<script>
    $(function () {
        window.mobilecheck() ? $("body").removeClass('use-nicescroll') : '';

        $(".use-nicescroll").niceScroll({
            cursorcolor: "rgb(248,148,6)",
            cursorwidth: "8px",
            background: "rgba(222, 222, 222, .75)",
            cursorborder: 'none',
            // cursorborderradius:0,
            autohidemode: 'leave',
            zindex: 99999999,
        });
    });

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

        $('.progress .bar').width(progress + '%').css({backgroundColor: $bgColor});
        // $('h1').text(Math.round(progress) + '%').css({color: $textColor});
        $('.fill').height(progress + '%').css({backgroundColor: $bgColor});
    }

    progress();

    $(document).on('scroll', progress);

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
                    'value': '#fff'
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
                    'value': 1,
                    'random': false,
                    'anim': {
                        'enable': false,
                        'speed': 1,
                        'opacity_min': 0.5,
                        'sync': false
                    }
                },
                'size': {
                    'value': 3,
                    'random': true,
                    'anim': {
                        'enable': false,
                        'speed': 40,
                        'size_min': 0.5,
                        'sync': false
                    }
                },
                'line_linked': {
                    'enable': true,
                    'distance': 80,
                    'color': '#fff',
                    'opacity': .8,
                    'width': 2
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
</script>
</body>
</html>
