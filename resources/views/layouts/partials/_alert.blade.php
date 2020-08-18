<script>
    @if(session('profil'))
    swal({
        title: "{{__('lang.alert.warning')}}",
        text: "{{__('lang.alert.login-bio')}}",
        icon: 'warning',
        closeOnEsc: false,
        closeOnClickOutside: false,
    }).then((confirm) => {
        if (confirm) {
            swal({icon: "success", text: '{{__('lang.alert.login-bio2')}}', buttons: false});
            window.location.href = '{{route('user.profil', ['check' => 'false'])}}';
        }
    });

    @elseif(session('contact'))
    swal('{{__('lang.alert.success')}}', '{{__('lang.alert.contact')}}', 'success');

    @elseif(session('activated'))
    swal('{{__('lang.alert.success')}}', '{{__('lang.alert.login')}}', 'success');

    @elseif(session('inactive'))
    swal('{{__('lang.alert.error')}}', '{{__('lang.alert.login-inactive')}}', 'error');

    @elseif(session('signed'))
    swal('{{__('lang.alert.success')}}', '{{__('lang.mail.content.hello')}} {{Auth::guard('admin')->check() ?
    Auth::guard('admin')->user()->name : Auth::user()->name}}! {{__('lang.alert.login')}}', 'success');

    @elseif(session('token'))
    swal('{{__('lang.alert.error')}}', '{{__('lang.alert.token-fail')}}', 'error');

    @elseif(session('expire'))
    swal('{{__('lang.alert.error')}}', '{{__('lang.alert.auth-expire')}}', 'error');

    @elseif(session('logout'))
    swal('{{__('lang.alert.warning')}}', '{{__('lang.alert.logout')}}', 'warning');

    @elseif(session('warning'))
    swal('{{__('lang.alert.warning')}}', '{{session('warning')}}', 'warning');

    @elseif(session('register'))
    swal('{{__('lang.alert.success')}}', '{{__('lang.alert.register')}}', 'success');

    @elseif(session('unknown'))
    swal('{{__('lang.alert.error')}}', '{{__('lang.alert.socialite-fail')}}', 'error');

    @elseif(session('add'))
    swal('{{__('lang.alert.success')}}', '{{session('add')}}', 'success');

    @elseif(session('claim'))
    swal('{{__('lang.alert.success')}}', '{{session('claim')}}', 'success');

    @elseif(session('update'))
    swal('{{__('lang.alert.success')}}', '{{session('update')}}', 'success');

    @elseif(session('delete'))
    swal('{{__('lang.alert.success')}}', '{{session('delete')}}', 'success');

    @elseif(session('error'))
    swal('{{__('lang.alert.error')}}', '{{__('lang.alert.login-fail')}}', 'error');
    @endif

    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    swal('Oops..!', '{{$error}}', 'error');
    @endforeach
    @endif
</script>
