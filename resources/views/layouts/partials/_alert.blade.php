<script>
    @if(session('contact'))
    swal('{{__('lang.alert.success')}}', '{{session('contact')}}', 'success');

    @elseif(session('activated'))
    swal('{{__('lang.alert.success')}}', '{{__('lang.alert.login')}}', 'success');

    @elseif(session('inactive'))
    swal('{{__('lang.alert.error')}}', '{{__('lang.alert.login-inactive')}}', 'error');

    @elseif(session('signed'))
    swal('{{__('lang.alert.success')}}', '{{__('lang.mail.content.hello')}} {{Auth::guard('admin')->check() ?
    Auth::guard('admin')->user()->name : Auth::user()->name}}! {{__('lang.alert.login')}}', 'success');

    @elseif(session('expire'))
    swal('{{__('lang.alert.error')}}', '{{session('expire')}}', 'error');

    @elseif(session('logout'))
    swal('{{__('lang.alert.warning')}}', '{{__('lang.alert.logout')}}', 'warning');

    @elseif(session('warning'))
    swal('{{__('lang.alert.warning')}}', '{{session('warning')}}', 'warning');

    @elseif(session('status'))
    swal('{{__('lang.alert.success')}}', '{{session('status')}}', 'success', '3500');

    @elseif(session('unknown'))
    swal('{{__('lang.alert.error')}}', '{{__('lang.alert.socialite-fail')}}', 'error');

    @elseif(session('add'))
    swal('{{__('lang.alert.success')}}', '{{session('add')}}', 'success');

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
