<ul class="sidebar-menu">
    <li class="menu-header">General</li>
    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/dashboard*') ? 'active' : ''}}">
        <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
    </li>





    <li class="menu-header">Tables</li>



        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/blog*') ? 'active' : ''}}">
            <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-blog"></i><span>Blog</span></a>
            <ul class="dropdown-menu">
                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/blog/categories*') ? 'active' : ''}}">
                    <a href="{{route('table.blog.categories')}}" class="nav-link">{{__('admin.sidebar.blog-category')}}</a>
                </li>
                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/blog/posts*') ? 'active' : ''}}">
                    <a href="{{route('table.blog.posts')}}" class="nav-link">{{__('admin.sidebar.blog-post')}}</a></li>
            </ul>
        </li>

        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/account*') ? 'active' : ''}}">
            <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-user-cog"></i><span>Privilege</span></a>
            <ul class="dropdown-menu">
                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/account/profile*') ?
                'active' : ''}}"><a href="{{route('admin.profil')}}" class="nav-link">Edit Profile</a></li>
            </ul>
        </li>


</ul>
