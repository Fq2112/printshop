<script>
    $(".delete-data").on('click', function () {
        var linkURL = $(this).attr("href");
        swal({
            title: "{{__('lang.alert.delete-head')}}",
            text: "{{__('lang.alert.delete-capt')}}",
            icon: 'warning',
            dangerMode: true,
            buttons: ["{{__('lang.button.no')}}", "{{__('lang.button.yes')}}"],
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

    $(".deactivate-data").on('click', function () {
        var linkURL = $(this).attr("href");
        swal({
            title: "Deactivate",
            text: "You can activate this data again later",
            icon: 'warning',
            dangerMode: true,
            buttons: ["{{__('lang.button.no')}}", "Deactivate"],
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

    $(".activate-data").on('click', function () {
        var linkURL = $(this).attr("href");
        swal({
            title: "Activate",
            text: "You can deactivate this data again later",
            icon: 'warning',
            dangerMode: true,
            buttons: ["{{__('lang.button.no')}}", "Activate"],
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

    $(".btn_signOut").click(function () {
        swal({
            title: "{{__('lang.alert.logout-head')}}",
            text: "{{__('lang.alert.logout-capt')}}",
            icon: 'warning',
            dangerMode: true,
            buttons: ["{{__('lang.button.no')}}", "{{__('lang.button.yes')}}"],
            closeOnEsc: false,
            closeOnClickOutside: false,
        }).then((confirm) => {
            if (confirm) {
                swal({icon: "success", text: '{{__('lang.alert.logout-message')}}', buttons: false});
                $("#logout-form").submit();
            }
        });
        return false;
    });

    function actionOrder(name, edit_uri, delete_uri) {
        swal({
            title: '{{__('lang.header.cart')}}',
            text: '{!! __('lang.alert.cart') !!}',
            icon: 'warning',
            dangerMode: true,
            buttons: {
                cancel: '{{__('lang.button.cancel')}}',
                edit: {
                    text: '{{__('lang.button.edit')}}',
                    value: 'edit',
                },
                delete: {
                    text: '{{__('lang.button.delete')}}',
                    value: 'delete',
                }
            },
            closeOnEsc: false,
            closeOnClickOutside: false,
        }).then((value) => {
            if (value == 'edit') {
                swal({icon: "success", buttons: false});
                window.location.href = edit_uri;
            } else if (value == 'delete') {
                swal({
                    title: "{{__('lang.alert.delete-head')}}",
                    text: "{{__('lang.alert.delete-capt')}}",
                    icon: 'warning',
                    dangerMode: true,
                    buttons: ["{{__('lang.button.no')}}", "{{__('lang.button.yes')}}"],
                    closeOnEsc: false,
                    closeOnClickOutside: false,
                }).then((confirm) => {
                    if (confirm) {
                        swal({icon: "success", buttons: false});
                        window.location.href = delete_uri;
                    }
                });
            } else {
                swal.close();
            }
        });
    }
</script>
