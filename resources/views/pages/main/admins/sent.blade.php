@extends('layouts.mst_admin')
@section('title', __('admin.sidebar.head').': Sent | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" href="{{asset('admins/modules/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('css/components/bs-filestyle.css')}}">
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

        .fix-label-group .bootstrap-select {
            padding: 0 !important;
        }

        .bootstrap-select .dropdown-menu {
            min-width: 100% !important;
        }

        .form-control-feedback {
            position: absolute;
            top: 3em;
            right: 2em;
        }

        .bootstrap-tagsinput {
            background-color: #fff !important;
            border: 1px solid #e4e6fc !important;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075) !important;
            display: inline-block !important;
            padding: 0;
            color: #555;
            vertical-align: middle;
            border-radius: .25rem;
            width: 95.5%;
            height: 42px !important;
            line-height: 22px;
            cursor: text;
        }

        .bootstrap-tagsinput .badge {
            background-color: #f89406 !important;
        }

        .bootstrap-tagsinput .badge [data-role="remove"]:after {
            content: "\f00d";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
        }

        .bootstrap-multiemail {
            width: 100%;
            cursor: text;
            margin-bottom: 0;
        }

        .bootstrap-multiemail .tag {
            background-color: transparent !important;
            border: 1px solid #ccc;
            border-radius: 10px !important;
            color: #555 !important;
            padding: 1px 5px !important;
            line-height: 18px;
        }

        .bootstrap-multiemail .tag.invalid {
            background-color: #E74C3C !important;
            color: #fff !important;
            border-color: #E74C3C !important;
        }

        #attach-div .input-group {
            margin-bottom: 0;
        }

        #attach-div .file-preview {
            border-radius: 0;
            border-color: #ccc;
        }

        .file-drop-zone.clickable:focus {
            border-color: #f89406
        }
    </style>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('admin.sidebar.inbox')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">{{__('admin.sidebar.inbox')}}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" id="inbox">
                        <div class="card-header">
                            <h4>Messages</h4>
                            <div class="card-header-action">
                                <button id="compose" class="btn btn-sm btn-primary" type="button">
                                    <strong><i class="fas fa-edit"></i>&ensp;COMPOSE</strong>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(count($sents) > 0)
                                <a href="javascript:void(0)" data-toggle-slide="#message-items"
                                   class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none">
                                    <i class="fas fa-list"></i> All Message</a>
                                <div class="tickets">
                                    <div class="ticket-items" id="message-items" style="height: 800px">
                                        @foreach($sents as $row)
                                            <div class="ticket-item" style="cursor: pointer" id="{{$row->id}}"
                                                 onclick="viewMail('{{$row->id}}','{{route('admin.get.read', ['id' => encrypt($row->id), 'type' => 'sent'])}}')">
                                                <div class="ticket-title">
                                                    <h4>{{ucfirst($row->subject)}}</h4>
                                                </div>
                                                <div class="ticket-desc">
                                                    <div>{{$row->name}}</div>
                                                    <div class="bullet"></div>
                                                    <div>{{\Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div id="preload-mail" class="css3-spinner"
                                         style="z-index: 1;position:relative;top:3em;display: none">
                                        <div class="css3-spinner-bounce1"></div>
                                        <div class="css3-spinner-bounce2"></div>
                                        <div class="css3-spinner-bounce3"></div>
                                    </div>
                                    <div class="ticket-content" id="message-contents" style="height: 800px;"></div>
                                </div>
                            @else
                                <img class="img-fluid float-left" src="{{asset('images/searchPlace.png')}}" width="128">
                                <h5><em>There seems to be none of the sent mail was found&hellip;</em></h5>
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
                    <form action="{{route('admin.compose.inbox')}}" method="post" id="form-compose"
                          enctype="multipart/form-data" novalidate>
                        {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col">
                                <input class="form-control" id="inbox_to" type="email" name="inbox_to"
                                       placeholder="To:">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-text-width"></i></span>
                                    </div>
                                    <input class="form-control" id="inbox_subject" type="text" name="inbox_subject"
                                           placeholder="Subject:">
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col fix-label-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fix-label-item" style="height: 2.25rem">
                                            <i class="fa fa-tags"></i></span>
                                    </div>
                                    <select id="inbox_category" class="form-control selectpicker"
                                            title="-- Choose Category --" name="inbox_category"
                                            data-live-search="true">
                                        <option value="promo">Promo</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col fix-label-group" style="display: none">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fix-label-item" style="height: 2.25rem">
                                            <i class="fa fa-ticket-alt"></i></span>
                                    </div>
                                    <select id="inbox_promo" class="form-control selectpicker"
                                            title="-- Choose Promo --" name="inbox_promo" data-live-search="true">
                                        @foreach($promo as $row)
                                            <option value="{{$row->promo_code}}"
                                                    data-subtext="{{$row->description}}">{{$row->promo_code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <textarea class="summernote form-control" name="inbox_message"
                                          id="inbox_message"></textarea>
                            </div>
                        </div>
                        <div id="attach-div" class="row form-group" style="display: none">
                            <div class="col">
                                <input accept="image/*,.pdf,.doc,.docx,.xls,.xlsx,.odt,.ppt,.pptx"
                                       type="file" name="attachments[]" multiple>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <button id="attach" class="btn btn-icon btn-light" type="button">
                                    <i class="fa fa-paperclip"></i></button>
                            </div>
                            <div class="col">
                                <button id="send" class="btn btn-block btn-primary" type="submit">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('admins/modules/summernote/summernote-bs4.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap-tagsinput/bootstrap-multiEmail.js')}}"></script>
    <script src="{{asset('js/components/bs-filestyle.js')}}"></script>
    <script>
        var inbox_to = $("#inbox_to"), multiEmailInput = inbox_to.multiEmail(),
            inbox_category = $("#inbox_category"),
            inbox_promo = $("#inbox_promo"),
            btn_attach = $("#attach"), input_attach = $("#attach-div input[type=file]");

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
                cursorborder: "1px solid #592f83",
            });
        });

        $("#compose, .compose-close").on("click", function () {
            $(".compose").slideToggle()
        });

        $("#compose").on("click", function () {
            $("#compose_title").text('New Message');
            $('.summernote').summernote('code', '');
            inbox_to.tagsinput('removeAll');
            inbox_category.parents('.fix-label-group').next().hide();
            $("#inbox_category, #inbox_promo").val('default').selectpicker('refresh');
            $("#form-compose")[0].reset();
        });

        inbox_category.on('change', function () {
            inbox_promo.val('default').selectpicker('refresh');

            if ($(this).val() == 'promo') {
                $(this).parents('.fix-label-group').next().show();
            } else {
                $(this).parents('.fix-label-group').next().hide();
            }
        });

        btn_attach.on('click', function () {
            $("#attach-div").toggle(300);
            $(".file-input").hide().parents('label').find('.card-text').show();

            input_attach.fileinput('destroy').fileinput({
                showUpload: false,
                showBrowse: false,
                showCaption: true,
                browseOnZoneClick: true,
                showPreview: true,
                initialPreviewAsData: true,
                overwriteInitial: true,
                initialCaption: "Choose file...",
                dropZoneTitle: 'Drag & drop your design file here...',
                dropZoneClickTitle: '<br>(or click to choose it)',
                removeLabel: 'DELETE',
                removeIcon: '<i class="fa fa-trash-alt mr-1"></i>',
                removeClass: 'btn btn-danger btn-block m-0',
                removeTitle: 'Click here to clear the file you selected!',
                cancelLabel: 'CANCEL',
                cancelIcon: '<i class="fa fa-undo mr-1"></i>',
                cancelClass: 'btn btn-danger btn-block m-0',
                cancelTitle: 'Click here to cancel your file upload process!',
                allowedFileExtensions: ["jpg", "jpeg", "png", "tiff", "pdf", "doc", "docx"],
                maxFileSize: 5120,
                msgSizeTooLarge: 'File \"{name}\" (<b>{size} KB</b>) exceeds maximum allowed upload size of <b>{maxSize} KB (5 MB)</b>, try to upload smaller file!',
                msgInvalidFileExtension: 'Invalid extension for file \"{name}\", only \"{extensions}\" files are supported!',
            });

            $(".file-input .file-caption-name").attr('disabled', 'disabled').removeAttr('title').css('cursor', 'text');
            $(".file-input .file-caption").removeClass('icon-visible');
        });

        $("#form-compose").on('submit', function (e) {
            e.preventDefault();
            if (!inbox_to.val()) {
                swal('ATTENTION!', 'You have to write the recipient\'s email!', 'warning');

            } else {
                if (!$("#inbox_subject").val()) {
                    swal('ATTENTION!', 'You have to write the email subject!', 'warning');

                } else {
                    if (!inbox_category.val()) {
                        swal('ATTENTION!', 'You have to choose the category!', 'warning');

                    } else {
                        if (inbox_category.val() == 'promo' && !inbox_promo.val()) {
                            swal('ATTENTION!', 'You have to choose the promo code!', 'warning');

                        } else {
                            if ($('.summernote').summernote('isEmpty')) {
                                swal('ATTENTION!', 'Please, write some messages!', 'warning');

                            } else {
                                var validEmails = $.grep(inbox_to.tagsinput('items'), function (email, index) {
                                    return multiEmailInput[0].validEmail(email);
                                });
                                multiEmailInput[0].removeAll();
                                $.each(validEmails, function (i, val) {
                                    multiEmailInput[0].add(val);
                                });

                                $(this)[0].submit();
                            }
                        }
                    }
                }
            }
        });

        function viewMail(id, url) {
            $(".ticket-item").removeClass('active');
            $("#" + id).addClass('active');
            $(".compose").hide("slide");

            clearTimeout(this.delay);
            this.delay = setTimeout(function () {
                $.ajax({
                    url: url,
                    type: 'GET',
                    beforeSend: function () {
                        $('#preload-mail').show();
                        $('#message-contents').hide();
                    },
                    complete: function () {
                        $('#preload-mail').hide();
                        $('#message-contents').show();
                    },
                    success: function (data) {
                        $("#message-contents").html(
                            '<div class="ticket-header">' +
                            '<div class="ticket-sender-picture img-shadow"><img src="' + data.ava + '" alt="Avatar"></div>' +
                            '<div class="ticket-detail">' +
                            '<div class="ticket-title"><h4>' + data.subject + '</h4></div>' +
                            '<div class="ticket-info">' +
                            '<div class="font-weight-600">' + data.name + '</div> <div class="bullet"></div> ' +
                            '<div class="text-primary font-weight-600">' + data.created_at + '</div></div></div></div>' +
                            '<div class="ticket-description"><p>' + data.message + '</p>' +
                            '<div class="ticket-divider"></div></div>' +
                            '<div class="btn-group" role="group">' +
                            '<button class="btn btn-primary btn_reply' + data.id + '" type="button">' +
                            '<i class="fas fa-reply mr-2"></i>Reply</button>' +
                            '<button class="btn btn-info btn_forward' + data.id + '" type="button">' +
                            '<i class="fas fa-share mr-2"></i>Forward</button>' +
                            '<button class="btn btn-danger btn_delete_inbox' + data.id + '" type="button">' +
                            '<i class="fas fa-trash mr-2"></i>Delete</button></div>'
                        ).fadeIn("slow");

                        $(".btn_reply" + data.id).on("click", function () {
                            $("#compose_title").text('Reply Message');
                            inbox_to.val(data.email);
                            $("#inbox_subject").val('Re: ' + data.subject);
                            $('.summernote').summernote('code', '');
                            $(".compose").slideToggle();
                        });

                        $(".btn_forward" + data.id).on("click", function () {
                            $("#compose_title").text('Forward Message');
                            inbox_to.val('');
                            $("#inbox_subject").val('Fwd: ' + data.subject);
                            $('.summernote').summernote('code', data.message);
                            $(".compose").slideToggle();
                        });

                        $(".btn_delete_inbox" + data.id).on("click", function () {
                            swal({
                                title: 'Delete Message',
                                text: "Are you sure to delete " + data.name + "'s message? You can't revert it!",
                                icon: 'warning',
                                dangerMode: true,
                                buttons: ["No", "Yes"],
                                closeOnEsc: false,
                                closeOnClickOutside: false,
                            }).then((confirm) => {
                                if (confirm) {
                                    swal({icon: "success", buttons: false});
                                    window.location.href = data.del_route;
                                }
                            });
                            return false;
                        });

                        $('html, body').animate({
                            scrollTop: $('#inbox').offset().top
                        }, 500);
                    },
                    error: function () {
                        swal('Oops..', 'Something went wrong! Please, refresh your browser.', 'error');
                    }
                });
            }.bind(this), 800);
        }

        $(document).on('mouseover', '.use-nicescroll', function () {
            $(this).getNiceScroll().resize();
        });
    </script>
@endpush
