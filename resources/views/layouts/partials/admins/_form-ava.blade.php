<style>
    .btn-instagram {
        background-color: #C13584;
    }

    .btn-instagram:focus, .btn-instagram.focus {
        background-color: #a52f6e;
    }

    .btn-instagram:hover {
        background-color: #a52f6e;
    }

    .btn-instagram:active, .btn-instagram.active, .open > .dropdown-toggle.btn-instagram {
        background-color: #a52f6e;
    }

    .btn-instagram:active:hover, .btn-instagram.active:hover, .open > .dropdown-toggle.btn-instagram:hover, .btn-instagram:active:focus, .btn-instagram.active:focus, .open > .dropdown-toggle.btn-instagram:focus, .btn-instagram:active.focus, .btn-instagram.active.focus, .open > .dropdown-toggle.btn-instagram.focus {
        background-color: #872a55;
    }

    .btn-instagram.disabled:hover, .btn-instagram[disabled]:hover, fieldset[disabled] .btn-instagram:hover, .btn-instagram.disabled:focus, .btn-instagram[disabled]:focus, fieldset[disabled] .btn-instagram:focus, .btn-instagram.disabled.focus, .btn-instagram[disabled].focus, fieldset[disabled] .btn-instagram.focus {
        background-color: #C13584;
    }

    .btn-instagram .badge {
        color: #C13584;
    }

    .btn-whatsapp {
        color: #fff;
        background-color: #25d366;
        border-color: rgba(0, 0, 0, 0.2)
    }

    .btn-whatsapp:focus, .btn-whatsapp.focus {
        color: #fff;
        background-color: #20af57;
        border-color: rgba(0, 0, 0, 0.2)
    }

    .btn-whatsapp:hover {
        color: #fff;
        background-color: #20af57;
        border-color: rgba(0, 0, 0, 0.2)
    }

    .btn-whatsapp:active, .btn-whatsapp.active, .open > .dropdown-toggle.btn-whatsapp {
        color: #fff;
        background-color: #20af57;
        border-color: rgba(0, 0, 0, 0.2)
    }

    .btn-whatsapp:active:hover, .btn-whatsapp.active:hover, .open > .dropdown-toggle.btn-whatsapp:hover, .btn-whatsapp:active:focus, .btn-whatsapp.active:focus, .open > .dropdown-toggle.btn-whatsapp:focus, .btn-whatsapp:active.focus, .btn-whatsapp.active.focus, .open > .dropdown-toggle.btn-whatsapp.focus {
        color: #fff;
        background-color: #16873c;
        border-color: rgba(0, 0, 0, 0.2)
    }

    .btn-whatsapp:active, .btn-whatsapp.active, .open > .dropdown-toggle.btn-whatsapp {
        background-image: none
    }

    .btn-whatsapp.disabled:hover, .btn-whatsapp[disabled]:hover, fieldset[disabled] .btn-whatsapp:hover, .btn-whatsapp.disabled:focus, .btn-whatsapp[disabled]:focus, fieldset[disabled] .btn-whatsapp:focus, .btn-whatsapp.disabled.focus, .btn-whatsapp[disabled].focus, fieldset[disabled] .btn-whatsapp.focus {
        background-color: #25d366;
        border-color: rgba(0, 0, 0, 0.2)
    }

    .btn-whatsapp .badge {
        color: #25d366;
        background-color: #fff
    }
</style>
<div class="card profile-widget">
    <div class="profile-widget-header">
        <img alt="image" src="{{$admin->ava != "" ? asset('storage/admins/ava/'.$admin->ava) :
        asset('admins/img/avatar/avatar-'.rand(1,5).'.png')}}" class="rounded-circle profile-widget-picture">
        <div class="profile-widget-items">
            <div class="profile-widget-item">
                <div class="profile-widget-item-label">Posts</div>
                <div class="profile-widget-item-value" id="posts" data-toggle="tooltip" title="Blog Posted"
                     data-placement="bottom">{{$admin->getBlog != null ? $admin->getBlog->count() : 0}}</div>
            </div>
            <div class="profile-widget-item">
                <div class="profile-widget-item-label">Member Since</div>
                <div class="profile-widget-item-value">{{\Carbon\Carbon::parse($admin->created_at)->formatLocalized('%b %d, %Y')}}</div>
            </div>
            <div class="profile-widget-item">
                <div class="profile-widget-item-label">Last Update</div>
                <div class="profile-widget-item-value">{{\Carbon\Carbon::parse($admin->updated_at)->diffForHumans()}}</div>
            </div>
        </div>
    </div>
    <div class="profile-widget-description">
        <div class="profile-widget-name">{{$admin->name}}
            <div class="text-muted d-inline font-weight-normal text-uppercase">
                <div class="slash"></div>
                <strong class="text-lowercase">{{$admin->username}}</strong>
                <div class="slash"></div> {{$admin->role}}</div>
        </div>
        {{$admin->about != "" ? $admin->about : '(empty)'}}
    </div>
    <div class="card-footer">
        <div class="font-weight-bold mb-2">Follow {{$admin->username}} On</div>
        <a href="mailto:{{$admin->email}}" class="btn btn-social-icon btn-google">
            <i class="fas fa-envelope"></i></a>
        <a href="{{$admin->facebook != "" ? 'https://fb.com/'.$admin->facebook : '#'}}"
           class="btn btn-social-icon btn-facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="{{$admin->twitter != "" ? 'https://twitter.com/'.$admin->twitter : '#'}}"
           class="btn btn-social-icon btn-twitter"><i class="fab fa-twitter"></i></a>
        <a href="{{$admin->instagram != "" ? 'https://instagram.com/'.$admin->instagram : '#'}}"
           class="btn btn-social-icon btn-instagram"><i class="fab fa-instagram"></i></a>
        <a href="{{$admin->whatsapp != "" ? 'https://web.whatsapp.com/send?text=Halo, '.$admin->name.'!&phone='.
        $admin->whatsapp.'&abid='.$admin->whatsapp : '#'}}" class="btn btn-social-icon btn-whatsapp">
            <i class="fab fa-whatsapp"></i></a>
    </div>
</div>
