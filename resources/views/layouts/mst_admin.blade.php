<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('admins/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/fonts/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/bootstrap/css/glyphicons.css')}}">
    <!-- Page Specific CSS File -->
    <link rel="stylesheet" href="{{asset('admins/modules/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/sweetalert/sweetalert2.css')}}">
    <link rel="stylesheet" href="{{asset('admins/modules/izitoast/css/iziToast.min.css')}}">
@stack('styles')

<!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('admins/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admins/css/components.css')}}">

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
    <!-- /END GA -->
</head>
<body class="use-nicescroll">
@php
    $role = Auth::guard('admin')->user();
    $contacts = \App\Models\Kontak::where('created_at', '>=', today()->subDays('3')->toDateTimeString())
    ->orderByDesc('id')->get()
@endphp
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <ul class="navbar-nav mr-auto">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>
            <ul class="navbar-nav navbar-right">
                @if($role->isRoot())
                    <li class="dropdown dropdown-list-toggle">
                        <a href="#" data-toggle="dropdown"
                           class="nav-link nav-link-lg message-toggle {{count($contacts) > 0 ? 'beep' : ''}}">
                            <i class="far fa-envelope"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">{{__('admin.header.message.head')}}</div>
                            <div class="dropdown-list-content dropdown-list-message">
                                @if(count($contacts) > 0)
                                    @foreach($contacts as $row)
                                        <a href="{{route('admin.inbox', ['id' => $row->id])}}" class="dropdown-item">
                                            <div class="dropdown-item-avatar">
                                                <img src="{{asset('admins/img/avatar/avatar-'.rand(1,5).'.png')}}"
                                                     class="rounded-circle" alt="Avatar">
                                            </div>
                                            <div class="dropdown-item-desc">
                                                <b>{{$row->name}}</b>
                                                <p>{{$row->subject}}</p>
                                                <div class="time">
                                                    {{\Carbon\Carbon::parse($row->created_at)->diffForHumans()}}
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                @else
                                    <a class="dropdown-item">
                                        <div class="dropdown-item-avatar">
                                            <img src="{{asset('images/searchPlace.png')}}" class="img-fluid">
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <p>{{__('admin.header.message.empty')}}</p>
                                        </div>
                                    </a>
                                @endif
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="{{route('admin.inbox')}}">
                                    {{__('admin.header.message.footer')}}<i class="fas fa-chevron-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                @endif

                <li class="dropdown">
                    @if($app->isLocale('id'))
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img class="h-100 mr-1" width="20" src="{{asset('images/icons/flags/id.svg')}}" alt="Indonesia"></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedURL('en')}}">
                                <img width="20" src="{{asset('images/icons/flags/en.svg')}}" alt="English">
                                <b class="text-uppercase ml-1">{{__('lang.lang.en')}}</b></a>
                            <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedURL('id')}}">
                                <img width="20" src="{{asset('images/icons/flags/id.svg')}}" alt="Indonesia">
                                <b class="text-uppercase ml-1">{{__('lang.lang.id')}}</b></a>
                        </div>
                    @else
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img class="h-100 mr-1" width="20" src="{{asset('images/icons/flags/en.svg')}}" alt="English"></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedURL('id')}}">
                                <img width="20" src="{{asset('images/icons/flags/id.svg')}}" alt="Indonesia">
                                <b class="text-uppercase ml-1">{{__('lang.lang.id')}}</b></a>
                            <a class="dropdown-item" href="{{LaravelLocalization::getLocalizedURL('en')}}">
                                <img width="20" src="{{asset('images/icons/flags/en.svg')}}" alt="English">
                                <b class="text-uppercase ml-1">{{__('lang.lang.en')}}</b></a>
                        </div>
                    @endif
                </li>

                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"
                       class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{$role->ava != "" ? asset('storage/admins/ava/'.$role->ava) :
                        asset('admins/img/avatar/avatar-'.rand(1,5).'.png')}}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">{{$role->name}}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('admin.profil')}}" class="dropdown-item has-icon">
                            <i class="fas fa-user-edit"></i> {{__('lang.header.profile')}}</a>
                        <a href="{{route('admin.pengaturan')}}" class="dropdown-item has-icon">
                            <i class="fas fa-cogs"></i> {{__('lang.header.settings')}}</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item has-icon text-warning btn_signOut">
                            <i class="fas fa-sign-out-alt"></i> {{__('lang.header.sign-out')}}</a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{route('admin.dashboard')}}">{{__('admin.sidebar.head')}}</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{route('admin.dashboard')}}">
                        <img class="img-fluid" width="75%" src="{{asset('images/logotype.png')}}">
                    </a>
                </div>
                @include('layouts.partials.admins._sidebarMenu')
            </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                &copy;&nbsp;{{now()->format('Y')}} Premier Printing. All rights reserved.
            </div>
            <div class="footer-right">
                Designed & Developed by <a href="http://rabbit-media.net" target="_blank">Rabbit Media</a>
            </div>
        </footer>
    </div>
</div>
<div class="progress">
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
<script src="{{asset('js/hideShowPassword.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('admins/modules/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('admins/modules/izitoast/js/iziToast.min.js')}}"></script>
<script src="{{asset('js/checkMobileDevice.js')}}"></script>
@stack('scripts')

<!-- Template JS File -->
<script src="{{asset('admins/js/main.js')}}"></script>
<script src="{{asset('admins/js/custom.js')}}"></script>
<script>
    @if(session('signed'))
    swal('Signed In!', 'Halo {{$role->name}}! You\'re now signed in.', 'success');

    @endif

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

        @if(!\Illuminate\Support\Facades\Request::is('scott.royce/tables*'))
    var title = document.getElementsByTagName("title")[0].innerHTML;
    (function titleScroller(text) {
        document.title = text;
        setTimeout(function () {
            titleScroller(text.substr(1) + text.substr(0, 1));
        }, 500);
    }(title + " ~ "));
    @endif
</script>
@include('layouts.partials._confirm')
@include('layouts.partials.admins._toastnotify')
</body>
</html>