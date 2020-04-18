<script>
    @if(session('success'))
    iziToast.success({
        title: 'Success!',
        message: '{{session('success')}}',
        position: 'topRight'
    });
    @elseif(session('warning'))
    iziToast.warning({
        title: 'ATTENTION!',
        message: '{{session('warning')}}',
        position: 'topRight'
    });
    @elseif(session('error'))
    iziToast.error({
        title: 'Error!',
        message: '{{session('error')}}',
        position: 'topRight'
    });
    @endif

    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    iziToast.error({
        title: 'Error!',
        message: '{{$error}}',
        position: 'topRight'
    });
    @endforeach
    @endif
</script>
