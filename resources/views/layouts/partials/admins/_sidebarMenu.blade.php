<ul class="sidebar-menu">
    <li class="menu-header">General</li>
    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('scott.royce/dashboard*') ? 'active' : ''}}">
        <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
    </li>

    @if(Auth::user()->isRoot())
        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('scott.royce/inbox*') ? 'active' : ''}}">
            <a href="{{route('admin.inbox')}}" class="nav-link"><i class="fas fa-envelope"></i><span>{{__('admin.sidebar.inbox')}}</span></a>
        </li>
    @endif

    <li class="menu-header">Data Master</li>

    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog*') ? 'active' : ''}}">
        <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-blog"></i><span>Blog</span></a>
        <ul class="dropdown-menu">
            <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/categories*') ?
            'active' : ''}}"><a href="{{route('table.blog.categories')}}" class="nav-link">{{__('admin.sidebar.blog-category')}}</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.blog.posts')}}" class="nav-link">{{__('admin.sidebar.blog-post')}}</a></li>
        </ul>
    </li>
</ul>

<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="{{route('beranda')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <b><i class="fas fa-rocket"></i> {{__('admin.sidebar.footer')}}</b></a>
</div>
