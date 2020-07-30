@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': Inbox | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('admins/modules/summernote/summernote-bs4.css')}}">
    <style>
        .compose {
            padding: 0;
            position: fixed;
            bottom: 0;
            right: 0;
            background: #fff;
            border: 1px solid #D9DEE4;
            border-right: 0;
            border-bottom: 0;
            border-top-left-radius: 5px;
            z-index: 20;
            display: none
        }

        .compose .compose-header {
            padding: 5px;
            background: #f89406;
            color: #fff;
            border-top-left-radius: 5px
        }

        .compose .compose-header .close {
            text-shadow: 0 1px 0 #fff;
            line-height: .8
        }

        .compose .compose-footer {
            padding: 10px
        }
    </style>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>General Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                <div class="breadcrumb-item">General Settings</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">All About General Settings</h2>
            <p class="section-lead">
                You can adjust all general settings here
            </p>

            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menu</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a
                                        onclick="viewMail('general_','{{route('admin.setting.general.show')}}','General Setting')"
                                        href="javascript:void(0)" class="nav-link active" id="general_">General</a></li>
                                <li class="nav-item"><a href="javascript:void(0)"
                                                        onclick="viewMail('maintenance_','{{route('admin.setting.maintenance.show')}}','Maintenance')"
                                                        class="nav-link" id="maintenance_">Maintenance</a></li>
                                <li class="nav-item"><a href="javascript:void(0)"
                                                        onclick="viewMail('rule_','{{route('admin.setting.rules.show')}}','Pricing Rules')"
                                                        class="nav-link" id="rule_">Pricing Rules</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4 id="title_form"></h4>
                        </div>
                        <div id="content_setting"></div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('admins/modules/summernote/summernote-bs4.js')}}"></script>
    <script>
        $(function () {
            $.get('{{route('admin.setting.general.show')}}', function (data) {
                $('#title_form').text("General Setting");
                $("#content_setting").html(data
                ).fadeIn("slow");
                $('.summernote').summernote();
            });
        });

        $("#compose, .compose-close").on("click", function () {
            $(".compose").slideToggle()
        });

        function test(t) {
            console.log(t)
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-logo').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".input-logo").change(function () {
            console.log("it changed");
            readURL(this);
        });

        $("#compose").on("click", function () {
            $("#compose_title").text('New Message');
            $('.summernote').summernote('code', '');
            $("#form-compose")[0].reset();
        });

        $("#form-compose").on('submit', function (e) {
            e.preventDefault();
            if ($('.summernote').summernote('isEmpty')) {
                swal('ATTENTION!', 'Please, write some messages!', 'warning');

            } else {
                $(this)[0].submit();
            }
        });

        function viewMail(id, route, titleDiv) {
            var loading = "<div class=\"spinner-border text-primary\" role=\"status\">\n" +
                "  <span class=\"sr-only\">Loading...</span>\n" +
                "</div>";

            $(".nav-link").removeClass('active');
            $("#" + id).addClass('active');
            $(".compose").hide("slide");

            $("#message-contents").html(loading
            ).fadeIn("slow");

            $.get(route, function (data) {
                $('#title_form').text(titleDiv);
                $("#content_setting").html(data
                ).fadeIn("slow");
                $('.summernote').summernote();
            });


        }

        $(document).on('mouseover', '.use-nicescroll', function () {
            $(this).getNiceScroll().resize();
        });
    </script>
@endpush
