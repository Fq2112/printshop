@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': '.__('lang.order.invoice').' | '.__('lang.title'))
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
            <h1>Invoice</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.order')}}">Order</a></div>
                <div class="breadcrumb-item">Invoice</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" id="inbox">
                        <div class="card-header">
                            <h4>List</h4>
                            <div class="card-header-action">
{{--                                <button id="compose" class="btn btn-sm btn-primary" type="button">--}}
{{--                                    <strong><i class="fas fa-filter"></i>&ensp;FILTER</strong>--}}
{{--                                </button>--}}
                            </div>
                        </div>
                        <div class="card-body">
                            @if(count($contacts) > 0)
                                <a href="javascript:void(0)" data-toggle-slide="#message-items"
                                   class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none">
                                    <i class="fas fa-list"></i> All Message</a>
                                <div class="tickets">
                                    <div class="ticket-items" id="message-items" style="height: 800px">
                                        @foreach($contacts as $row)
                                            <div class="ticket-item" style="cursor: pointer"
                                                 id="{{$row->uni_code_payment}}"
                                                 onclick="viewMail('{{$row->uni_code_payment}}')">
                                                <div class="ticket-title">
                                                    <h4>{{ucfirst($row->uni_code_payment)}}</h4>
                                                </div>
                                                <div class="ticket-desc">
                                                    <div>{{$row->getUser->name}}</div>
                                                    <div class="bullet"></div>
                                                    <div>{{\Carbon\Carbon::parse($row->updated_at)->diffForHumans()}}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="ticket-content" id="message-contents"
                                         style="height: 800px;display: none"></div>
                                </div>
                            @else
                                <img class="img-fluid float-left" src="{{asset('images/searchPlace.png')}}" width="128">
                                <h5><em>There seems to be none of the feedback was found&hellip;</em></h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- compose -->
            <div class="compose col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="compose-header">
                    <strong id="compose_title">New Message</strong>
                    <button type="button" class="close compose-close text-white">
                        <span>×</span>
                    </button>
                </div>

                <div class="compose-body" style="margin: 1em">
                    <form action="{{route('admin.compose.inbox')}}" method="post" id="form-compose">
                        {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input class="form-control" id="inbox_to" type="email" name="inbox_to"
                                           placeholder="To:"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-text-width"></i></span>
                                    </div>
                                    <input class="form-control" id="inbox_subject" type="text" name="inbox_subject"
                                           placeholder="Subject:" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <textarea class="summernote form-control" name="inbox_message"
                                          id="inbox_message"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button id="send" class="btn btn-block btn-primary" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /compose -->
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('admins/modules/summernote/summernote-bs4.js')}}"></script>
    <script>
        $(function () {
            @if($findMessage != null)
            $("#{{$findMessage}}").click();
            @else
            $("#message-items .ticket-item").first().click();
            @endif

            $("#message-items, .ticket-content").niceScroll({
                cursoropacitymin: 0,
                cursoropacitymax: .8,
                cursorwidth: 7,
                cursorcolor: "#f89406",
                cursorborder: "none",
            });
        });

        $("#compose, .compose-close").on("click", function () {
            $(".compose").slideToggle()
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

        function viewMail(id) {
            var loading = "<div class=\"spinner-border text-primary\" role=\"status\">\n" +
                "  <span class=\"sr-only\">Loading...</span>\n" +
                "</div>";

            $(".ticket-item").removeClass('active');
            $("#" + id).addClass('active');
            $(".compose").hide("slide");

            $("#message-contents").html(loading
            ).fadeIn("slow");

            $.ajax({
                url: '{{route('admin.invoice.data')}}',
                type: 'post',
                data: {
                    _token: '{{csrf_token()}}',
                    uni_code : id
                },
                success: function (data) {
                    $("#message-contents").html(data
                    ).fadeIn("slow");
                    // alert('success!');
                },
                error: function (data) {
                    swal('Oops!!', 'Something Went Wrong , Please Try Again or Contacting Admin', 'error');
                    // alert(data);
                }
            });


            $(".btn_reply" + id).on("click", function () {
                $("#compose_title").text('Reply Message');
                $("#inbox_to").val(email);
                $("#inbox_subject").val('Re: ' + subject);
                $('.summernote').summernote('code', '');
                $(".compose").slideToggle();
            });

            $(".btn_forward" + id).on("click", function () {
                $("#compose_title").text('Forward Message');
                $("#inbox_to").val('');
                $("#inbox_subject").val('Fwd: ' + subject);
                $('.summernote').summernote('code', message);
                $(".compose").slideToggle();
            });

            $(".btn_delete_inbox" + id).on("click", function () {
                var linkURL = '{{url('scott.royce/inbox')}}/' + deleteId + '/delete';
                swal({
                    title: 'Delete Message',
                    text: "Are you sure to delete " + name + "'s message? You can't revert it!",
                    icon: 'warning',
                    dangerMode: true,
                    buttons: ["No", "Yes"],
                    closeOnEsc: false,
                    closeOnClickOutside: false,
                }).then((confirm) => {
                    if (confirm) {
                        swal({icon: "success", buttons: false});
                        window.location.href = linkURL;
                    }
                });
                return false;
            });

            $('html, body').animate({
                scrollTop: $('#inbox').offset().top
            }, 500);
        }

        $(document).on('mouseover', '.use-nicescroll', function () {
            $(this).getNiceScroll().resize();
        });
    </script>
@endpush
