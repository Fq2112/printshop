<ul class="sidebar-menu">
    <li class="menu-header">General</li>
    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('scott.royce/dashboard*') ? 'active' : ''}}">
        <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
    </li>

    @if(Auth::user()->isRoot() || Auth::user()->isOwner())
        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('scott.royce/inbox*') ? 'active' : ''}}">
            <a href="{{route('admin.inbox')}}" class="nav-link"><i
                    class="fas fa-envelope"></i><span>{{__('admin.sidebar.inbox')}}</span></a>
        </li>
        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('scott.royce/invoice*') ? 'active' : ''}}">
            <a href="{{route('admin.invoice')}}" class="nav-link"><i class="fas fa-money-bill"></i><span>Invoices</span></a>
        </li>
        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('scott.royce/inbox*') ? 'active' : ''}}">
            <a href="{{route('admin.inbox')}}" class="nav-link"><i class="fas fa-archive"></i><span>Orders</span></a>
        </li>
    @endif

    <li class="menu-header">Data Master</li>

    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog*') ? 'active' : ''}}">
        <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-blog"></i><span>Blog</span></a>
        <ul class="dropdown-menu">
            <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/categories*') ?
            'active' : ''}}"><a href="{{route('table.blog.categories')}}"
                                class="nav-link">{{__('admin.sidebar.blog-category')}}</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.blog.posts')}}"
                                class="nav-link">{{__('admin.sidebar.blog-post')}}</a></li>
        </ul>
    </li>
    @if(Auth::user()->isRoot() || Auth::user()->isOwner())

        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog*') ? 'active' : ''}}">
            <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-database"></i><span>Category</span></a>
            <ul class="dropdown-menu">
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/categories*') ?
            'active' : ''}}"><a href="{{route('table.categories.main')}}"
                                class="nav-link">Main Category</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.categories.subkat')}}"
                                class="nav-link">Sub-Category</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.blog.posts')}}"
                                class="nav-link">Cluster-Category</a></li>
            </ul>
        </li>

        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog*') ? 'active' : ''}}">
            <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-database"></i><span>Specification</span></a>
            <ul class="dropdown-menu">
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/categories*') ?
            'active' : ''}}"><a href="{{route('table.backside')}}"
                                class="nav-link">Back Side</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.balance')}}"
                                class="nav-link">Balances</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.colors')}}"
                                class="nav-link">Colors</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.copies')}}"
                                class="nav-link">Copies</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.edge')}}"
                                class="nav-link">Edges</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.finishing')}}"
                                class="nav-link">Finishing</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.folding')}}"
                                class="nav-link">Folding</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.front')}}"
                                class="nav-link">Front Side</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.lamination')}}"
                                class="nav-link">Lamination</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.lid')}}"
                                class="nav-link">Lid</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.material')}}"
                                class="nav-link">Materials</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.pages')}}"
                                class="nav-link">Pages</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.print')}}"
                                class="nav-link">Printing Method</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.right')}}"
                                class="nav-link">Right & Left Side</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.blog.posts')}}"
                                class="nav-link">Side</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.blog.posts')}}"
                                class="nav-link">Size</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.blog.posts')}}"
                                class="nav-link">Product Type</a></li>
            </ul>
        </li>

        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog*') ? 'active' : ''}}">
            <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-database"></i><span>Miscellaneous</span></a>
            <ul class="dropdown-menu">
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/categories*') ?
            'active' : ''}}"><a href="{{route('table.blog.categories')}}"
                                class="nav-link">Promo Code</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.blog.posts')}}"
                                class="nav-link">Privacy & Term</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('scott.royce/tables/blog/posts*') ?
            'active' : ''}}"><a href="{{route('table.blog.posts')}}"
                                class="nav-link">Maintenance</a></li>
            </ul>
        </li>

    @endif

</ul>

<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="{{route('beranda')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <b><i class="fas fa-rocket"></i> {{__('admin.sidebar.footer')}}</b></a>
</div>
