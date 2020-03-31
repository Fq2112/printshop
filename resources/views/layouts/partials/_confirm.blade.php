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
</script>
