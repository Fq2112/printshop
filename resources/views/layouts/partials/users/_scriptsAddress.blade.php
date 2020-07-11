<script>
    var google, myLatlng, geocoder, map, marker, infoWindow,
        $city = $("#city_id"), $suburb = $("#suburb_id"), $area = $("#area_id"), $postal = $("#postal_code");

    function init(lat, long) {
        geocoder = new google.maps.Geocoder();
        myLatlng = new google.maps.LatLng(lat, long);

        var mapOptions = {
            zoom: 15,
            center: myLatlng,
            scrollwheel: true,
        }, mapElement = document.getElementById('map');

        map = new google.maps.Map(mapElement, mapOptions);

        marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable: true,
            icon: '{{asset('images/pin.png')}}',
            anchorPoint: new google.maps.Point(0, -29)
        });

        infoWindow = new google.maps.InfoWindow({
            maxWidth: 350,
            content:
                '<div id="iw-container">' +
                '<div class="iw-title">{{__('lang.profile.address')}}</div>' +
                '<div class="iw-content">' +
                '<div class="iw-subTitle" style="text-transform: none">{{__('lang.profile.set-address')}}</div>' +
                '<img src="{{asset('images/searchPlace.png')}}">' +
                '</div><div class="iw-bottom-gradient"></div></div>'
        });

        marker.addListener('click', function () {
            infoWindow.open(map, marker);
        });

        google.maps.event.addListener(map, 'click', function () {
            infoWindow.close();
        });

        google.maps.event.addListener(marker, "dragend", function (event) {
            geocodePosition(marker.getPosition());
            $("#lat").val(event.latLng.lat());
            $("#long").val(event.latLng.lng());
        });

        var autocomplete = new google.maps.places.Autocomplete(document.getElementById('address_map'));

        autocomplete.bindTo('bounds', map);

        autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);

        autocomplete.addListener('place_changed', function () {
            marker.setVisible(false);

            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("{{__('lang.profile.autocomplete-fail')}} '" + place.name + "'");
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            for (var i = 0; i < place.address_components.length; i++) {
                for (var j = 0; j < place.address_components[i].types.length; j++) {
                    if (place.address_components[i].types[j] == "postal_code") {
                        $postal.val(place.address_components[i].long_name);
                    }
                }
            }

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infoWindow.setContent(
                '<div id="iw-container">' +
                '<div class="iw-title">{{__('lang.profile.address')}}</div>' +
                '<div class="iw-content">' +
                '<div class="iw-subTitle" style="text-transform: none">' + place.name + '</div>' +
                '<img src="{{asset('images/searchPlace.png')}}">' +
                '<p>' + address + '</p>' +
                '</div><div class="iw-bottom-gradient"></div></div>'
            );
            infoWindow.open(map, marker);
            $("#lat").val(place.geometry.location.lat());
            $("#long").val(place.geometry.location.lng());

            google.maps.event.addListener(infoWindow, 'domready', function () {
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
        });
    }

    function geocodePosition(pos) {
        geocoder.geocode({
            latLng: pos
        }, function (responses) {
            if (responses && responses.length > 0) {
                marker.formatted_address = responses[0].formatted_address;
            } else {
                marker.formatted_address = '{{__('lang.profile.address-fail')}}';
            }

            for (var i = 0; i < responses[0].address_components.length; i++) {
                for (var j = 0; j < responses[0].address_components[i].types.length; j++) {
                    if (responses[0].address_components[i].types[j] == "postal_code") {
                        $postal.val(responses[0].address_components[i].long_name);
                    }
                }
            }

            infoWindow.setContent(
                '<div id="iw-container">' +
                '<div class="iw-title">{{__('lang.profile.address')}}</div>' +
                '<div class="iw-content">' +
                '<div class="iw-subTitle" style="text-transform: none">' + marker.formatted_address + '</div>' +
                '<img src="{{asset('images/searchPlace.png')}}">' +
                '</div><div class="iw-bottom-gradient"></div></div>'
            );
            infoWindow.open(map, marker);
            $("#address_map").val(marker.formatted_address);
        });
    }

    function addAddress() {
        @auth
        resetterAddress();
        @elseauth('admin')
        swal('{{__('lang.alert.warning')}}', '{{__('lang.alert.feature-fail')}}', 'warning');
        @else
        openLoginModal();
        @endauth
    }

    function resetterAddress() {
        init(-7.250445, 112.768845);
        infoWindow.setContent(
            '<div id="iw-container">' +
            '<div class="iw-title">{{__('lang.profile.address')}}</div>' +
            '<div class="iw-content">' +
            '<div class="iw-subTitle" style="text-transform: none">{{__('lang.profile.set-address')}}</div>' +
            '<img src="{{asset('images/searchPlace.png')}}">' +
            '</div><div class="iw-bottom-gradient"></div></div>'
        );
        infoWindow.open(map, marker);

        $("#method, #lat, #long, #address_name, #address_phone, #address_map, #postal_code").val(null);
        $("#city_id, #occupancy_id").val('default').selectpicker('refresh');
        $("#form-address").attr('action', '{{route('user.profil-alamat.create')}}');
        $("#is_main").prop('checked', false);

        $("#modal_address").modal('show');
    }

    $city.on('change', function () {
        $suburb.removeAttr('disabled').attr('required', 'required').empty().selectpicker('refresh');
        $area.removeAttr('required').attr('disabled', 'disabled').empty().selectpicker('refresh');
        $postal.val(null);

        $.get('{{route('get.shipper.location')}}?q=suburb&id=' + $(this).val(), function (data) {
            $.each(data, function (i, val) {
                $suburb.append('<option value="' + val.id + '">' + val.name + '</option>').selectpicker('refresh');
            });
        });
    });

    $suburb.on('change', function () {
        $area.removeAttr('disabled').attr('required', 'required').empty().selectpicker('refresh');
        $postal.val(null);

        $.get('{{route('get.shipper.location')}}?q=area&id=' + $(this).val(), function (data) {
            $.each(data, function (i, val) {
                $area.append('<option value="' + val.id + '" data-postal="' + val.postal_code + '">' + val.name + '</option>').selectpicker('refresh');
            });
        });
    });

    $area.on('change', function () {
        $postal.val($("option[value=" + $(this).val() + "]", this).attr('data-postal'));
    });

    function editAddress(name, phone, lat, long, city_id, suburb_id, area_id, address, postal_code, occupancy_id, occupancy, is_main, url) {
        $('#preload-shipping').show();
        $("#accordion2").css('opacity', '.3');

        var main_str = is_main == 1 ? ' <span class="font-weight-normal">[{{__('lang.profile.main-address')}}]</span>' : '',
            attr_suburb = '', attr_area = '';

        init(lat, long);
        infoWindow.setContent(
            '<div id="iw-container">' +
            '<div class="iw-title">{{__('lang.profile.address')}}</div>' +
            '<div class="iw-content">' +
            '<div class="iw-subTitle" style="text-transform: none">' + occupancy + main_str + '</div>' +
            '<img src="{{asset('images/searchPlace.png')}}">' +
            '<p>' + address + '</p>' +
            '</div><div class="iw-bottom-gradient"></div></div>'
        );
        infoWindow.open(map, marker);

        $("#address_name").val(name);
        $("#address_phone").val(phone);
        $("#address_map").val(address);

        $city.val(city_id).selectpicker('refresh');
        $suburb.removeAttr('disabled').attr('required', 'required').empty().selectpicker('refresh');
        $area.removeAttr('required').attr('disabled', 'disabled').empty().selectpicker('refresh');
        $postal.val(null);
        $.get('{{route('get.shipper.location')}}?q=suburb&id=' + city_id, function (data) {
            $.each(data, function (i, val) {
                attr_suburb = val.id == suburb_id ? 'selected' : '';
                $suburb.append('<option value="' + val.id + '" ' + attr_suburb + '>' + val.name + '</option>').selectpicker('refresh');
            });
        });

        $area.removeAttr('disabled').attr('required', 'required').empty().selectpicker('refresh');
        $postal.val(null);
        $.get('{{route('get.shipper.location')}}?q=area&id=' + suburb_id, function (data) {
            $.each(data, function (i, val) {
                attr_area = val.id == area_id ? 'selected' : '';
                $area.append('<option value="' + val.id + '" data-postal="' + val.postal_code + '" ' + attr_area + '>' + val.name + '</option>').selectpicker('refresh');
            });
        });
        $postal.val(postal_code);

        $("#occupancy_id").val(occupancy_id).selectpicker('refresh');
        if (is_main == 1) {
            $("#is_main").prop('checked', true);
        } else {
            $("#is_main").prop('checked', false);
        }

        $("#method").val('PUT');
        $("#lat").val(lat);
        $("#long").val(long);
        $("#form-address").attr('action', url);

        clearTimeout(this.delay);
        this.delay = setTimeout(function () {
            $('#preload-shipping').hide();
            $("#accordion2").css('opacity', '1');

            $("#modal_address").modal('show');

        }.bind(this), 800);
    }
</script>
