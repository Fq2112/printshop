<ul class="sidebar-menu">
    <li class="menu-header">General</li>
    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/dashboard*') ? 'active' : ''}}">
        <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
    </li>


    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/inbox*') ? 'active' : ''}}">
        <a href="{{route('admin.inbox')}}" class="nav-link"><i
                class="fas fa-envelope"></i><span>{{__('admin.sidebar.inbox')}}</span></a>
    </li>


    <li class="dropdown  {{\Illuminate\Support\Facades\Request::is('*scott.royce/order*') ? 'active' : ''}}">
        <a href="{{route('admin.order')}}" class="nav-link"><i class="fas fa-archive"></i><span>Orders</span></a>
    </li>


    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/account*') ? 'active' : ''}}">
        <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-user-cog"></i><span>Setting</span></a>
        <ul class="dropdown-menu">
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/account/profile*') ?
                'active' : ''}}"><a href="{{route('admin.profil')}}" class="nav-link">Edit Profile</a></li>
        </ul>
    </li>

</ul>

