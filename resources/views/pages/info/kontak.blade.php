@extends('layouts.mst')
@section('title',  __('lang.header.contact').' | '.__('lang.title'))
@push('styles')
    <style>
        .gm-style-iw {
            width: 350px !important;
            top: 15px;
            left: 22px;
            background-color: #fff;
            box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
            border: 1px solid rgba(248, 148, 6, 0.6);
            border-radius: 2px 2px 10px 10px;
        }

        .gm-style-iw > div:first-child {
            max-width: 350px !important;
        }

        #iw-container {
            margin-bottom: 10px;
        }

        #iw-container .iw-title {
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 22px;
            font-weight: 400;
            padding: 10px;
            background-color: #f89406;
            color: white;
            margin: 0;
            border-radius: 2px 2px 0 0;
        }

        #iw-container .iw-content {
            font-size: 13px;
            line-height: 18px;
            font-weight: 400;
            margin-right: 1px;
            padding: 15px 5px 20px 15px;
            max-height: 140px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .iw-content a {
            color: #f89406;
            text-decoration: none;
        }

        .iw-content img {
            float: right;
            margin: 0 5px 5px 10px;
            width: 30%;
        }

        .iw-subTitle {
            font-size: 16px;
            font-weight: 700;
            padding: 5px 0;
        }

        .iw-bottom-gradient {
            position: absolute;
            width: 326px;
            height: 25px;
            bottom: 10px;
            right: 18px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            background: -ms-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
        }
    </style>
@endpush
@section('content')
    <section id="page-title" class="page-title-parallax page-title-dark"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url('{{asset('images/banner/kontak.jpg')}}');background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>{{__('lang.header.contact')}}</h1>
            <span>{{__('lang.contact.capt')}}</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('beranda')}}">{{__('lang.breadcrumb.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::current()}}">Info</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('lang.header.contact')}}</li>
            </ol>
        </div>
    </section>

    <section id="content" style="background-color: #F9F9F9">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="col_half">
                    <div class="fancy-title title-dotted-border">
                        <h3 style="background-color: #F9F9F9">{{__('lang.contact.head')}}</h3>
                    </div>
                    <div class="form-widget">
                        <div class="form-result"></div>
                        <form class="no-ajax nobottommargin" method="post" action="{{route('kirim.kontak')}}">
                            @csrf
                            <div class="col_one_third">
                                <label for="con-name">
                                    {{__('lang.placeholder.name')}} <small>*</small></label>
                                <input type="text" id="con-name" name="name" required
                                       class="sm-form-control" placeholder="{{__('lang.placeholder.name')}}"
                                       value="{{Auth::check() ? Auth::user()->name : ''}}">
                            </div>
                            <div class="col_one_third">
                                <label for="con-email">Email <small>*</small></label>
                                <input type="email" id="con-email" name="email"
                                       placeholder="{{__('lang.placeholder.email')}}" required
                                       class="email sm-form-control" value="{{Auth::check()? Auth::user()->email :''}}">
                            </div>
                            <div class="col_one_third col_last">
                                <label for="con-phone">{{__('lang.footer.phone')}}</label>
                                <input type="text" id="con-phone" name="phone"
                                       placeholder="{{__('lang.placeholder.phone')}}" class="sm-form-control"
                                       value="{{Auth::check() ? Auth::user()->getBio->phone : ''}}"
                                       onkeypress="return numberOnly(event, false)">
                            </div>

                            <div class="clear"></div>

                            <div class="col_two_third">
                                <label for="con-subject">
                                    {{__('lang.placeholder.subject')}} <small>*</small></label>
                                <input type="text" id="con-subject" name="subject" required
                                       placeholder="{{__('lang.placeholder.subject')}}" class="sm-form-control">
                            </div>
                            <div class="col_one_third col_last">
                                <label for="con-topic">
                                    {{__('lang.contact.topic')}} <small>*</small></label>
                                <select id="con-topic" name="topic" class="sm-form-control" required>
                                    <option value="" disabled selected>{{__('lang.placeholder.choose')}}</option>
                                    @for($i=1;$i<=6;$i++)
                                        <option value="{{__('lang.contact.opt-'.$i)}}">
                                            {{__('lang.contact.opt-'.$i)}}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="con-message">
                                    {{__('lang.contact.message')}} <small>*</small></label>
                                <textarea class="sm-form-control" id="con-message"
                                          name="message" placeholder="{{__('lang.placeholder.message')}}"
                                          rows="6" cols="30" required></textarea>
                            </div>
                            <div class="col_full">
                                <button type="submit" tabindex="5" class="button button-3d btn-block nomargin">
                                    {{__('lang.button.contact')}}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col_half col_last">
                    <section id="google-map" class="gmap img-thumbnail" style="height: 500px"></section>
                </div>

                <div class="clear"></div>

                <div class="row clear-bottommargin">
                    <div class="col-lg-4 col-md-6 bottommargin clearfix">
                        <div class="feature-box fbox-center fbox-bg fbox-plain" style="background-color: #f9f9f9">
                            <div class="fbox-icon" style="background-color: #f9f9f9">
                                <i class="icon-line-clock"></i>
                            </div>
                            <h3>{{__('lang.contact.work')}}<span class="subtitle">08:15 &ndash; 19:00</span></h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 bottommargin clearfix">
                        <div class="feature-box fbox-center fbox-bg fbox-plain" style="background-color: #f9f9f9">
                            <div class="fbox-icon" style="background-color: #f9f9f9">
                                <a href="https://fb.com/pages/Premiere-Digital-Printing/164943546903733" target="blank">
                                    <i class="icon-line2-social-facebook"></i></a>
                            </div>
                            <h3>{{__('lang.contact.visit')}}<span class="subtitle">Premiere Digital Printing</span></h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 bottommargin clearfix">
                        <div class="feature-box fbox-center fbox-bg fbox-plain" style="background-color: #f9f9f9">
                            <div class="fbox-icon" style="background-color: #f9f9f9">
                                <a href="https://instagram.com/premierprintingsby" target="blank">
                                    <i class="icon-instagram"></i></a>
                            </div>
                            <h3>{{__('lang.contact.follow')}}<span class="subtitle">@premierprintingsby</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIljHbKjgtTrpZhEiHum734tF1tolxI68&libraries=places"></script>
    <script>
        var google;

        function init() {
            var myLatlng = new google.maps.LatLng(-7.250445, 112.768845);

            var mapOptions = {
                zoom: 15,
                center: myLatlng,
            };

            var mapElement = document.getElementById('google-map');

            var map = new google.maps.Map(mapElement, mapOptions);

            var contentString =
                '<div id="iw-container">' +
                '<div class="iw-title">{{env('APP_TITLE')}}</div>' +
                '<div class="iw-content">' +
                '<img class="img-fluid" src="{{asset('images/logotype.png')}}">' +
                '<div class="iw-subTitle">{{__('lang.header.contact')}}</div>' +
                '<p>Raya Kenjeran 469 Gading, Tambaksari, Surabaya, Jawa Timur — 60134.<br>' +
                '<br>{{__('lang.footer.phone')}}: <a href="tel:+62313814969">(031) 3814969</a>' +
                '<br>E-mail: <a href="mailto:{{env('MAIL_USERNAME')}}">{{env('MAIL_USERNAME')}}</a>' +
                '</p></div><div class="iw-bottom-gradient"></div></div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 350
            });

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                icon: '{{asset('images/pin.png')}}',
                anchorPoint: new google.maps.Point(0, -29)
            });

            infowindow.open(map, marker);

            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });

            google.maps.event.addListener(map, 'click', function () {
                infowindow.close();
            });

            google.maps.event.addListener(infowindow, 'domready', function () {
                var iwOuter = $('.gm-style-iw');
                var iwBackground = iwOuter.prev();

                iwBackground.children(':nth-child(2)').css({'display': 'none'});
                iwBackground.children(':nth-child(4)').css({'display': 'none'});

                iwOuter.css({left: '5px', top: '1px'});
                iwOuter.parent().parent().css({left: '0'});

                iwBackground.children(':nth-child(1)').attr('style', function (i, s) {
                    return s + 'left: -39px !important;'
                });

                iwBackground.children(':nth-child(3)').attr('style', function (i, s) {
                    return s + 'left: -39px !important;'
                });

                iwBackground.children(':nth-child(3)').find('div').children().css({
                    'box-shadow': 'rgba(72, 181, 233, 0.6) 0 1px 6px',
                    'z-index': '1'
                });

                var iwCloseBtn = iwOuter.next();
                iwCloseBtn.css({
                    background: '#fff',
                    opacity: '1',
                    width: '30px',
                    height: '30px',
                    right: '15px',
                    top: '6px',
                    border: '6px solid #48b5e9',
                    'border-radius': '50%',
                    'box-shadow': '0 0 5px #3990B9'
                });

                if ($('.iw-content').height() < 140) {
                    $('.iw-bottom-gradient').css({display: 'none'});
                }

                iwCloseBtn.mouseout(function () {
                    $(this).css({opacity: '1'});
                });
            });
        }

        google.maps.event.addDomListener(window, 'load', init);
    </script>
@endpush
