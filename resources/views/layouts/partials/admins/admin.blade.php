<ul class="sidebar-menu">
    <li class="menu-header">General</li>
    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/dashboard*') ? 'active' : ''}}">
        <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
    </li>

    <li class="menu-header">Tables</li>
    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/categories*') ? 'active' : ''}}">
        <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-print"></i><span>Print Products</span></a>
        <ul class="dropdown-menu">
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/categories/main*') ?
                'active' : ''}}"><a href="{{route('table.categories.main')}}" class="nav-link">Categories</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/categories/sub*') ?
                'active' : ''}}"><a href="{{route('table.categories.subkat')}}" class="nav-link">Sub-Categories</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/categories/cluster*') ?
                'active' : ''}}"><a href="{{route('table.categories.cluster')}}" class="nav-link">Clusters</a></li>
        </ul>
    </li>

    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec*') ? 'active' : ''}}">
        <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-drafting-compass"></i><span>Product Specifications</span></a>
        <ul class="dropdown-menu">
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/backside*') ?
                'active' : ''}}"><a href="{{route('table.backside')}}" class="nav-link">Back Side</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/balance*') ?
                'active' : ''}}"><a href="{{route('table.balance')}}" class="nav-link">Balances</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/colors*') ?
                'active' : ''}}"><a href="{{route('table.colors')}}" class="nav-link">Colors</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/copies*') ?
                'active' : ''}}"><a href="{{route('table.copies')}}" class="nav-link">Copies</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/edge*') ?
                'active' : ''}}"><a href="{{route('table.edge')}}" class="nav-link">Edges</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/finishing*') ?
                'active' : ''}}"><a href="{{route('table.finishing')}}" class="nav-link">Finishing</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/folding*') ?
                'active' : ''}}"><a href="{{route('table.folding')}}" class="nav-link">Folding</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/front*') ?
                'active' : ''}}"><a href="{{route('table.front')}}" class="nav-link">Front Side</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/lamination*') ?
                'active' : ''}}"><a href="{{route('table.lamination')}}" class="nav-link">Lamination</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/lid*') ?
                'active' : ''}}"><a href="{{route('table.lid')}}" class="nav-link">Lid</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/material*') ?
                'active' : ''}}"><a href="{{route('table.material')}}" class="nav-link">Materials</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/pages*') ?
                'active' : ''}}"><a href="{{route('table.pages')}}" class="nav-link">Pages</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/print*') ?
                'active' : ''}}"><a href="{{route('table.print')}}" class="nav-link">Printing Method</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/right*') ?
                'active' : ''}}"><a href="{{route('table.right')}}" class="nav-link">Right & Left Side</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/side*') ?
                'active' : ''}}"><a href="{{route('table.side')}}" class="nav-link">Side</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec/size*') ?
                'active' : ''}}"><a href="{{route('table.size')}}" class="nav-link">Size</a></li>
        </ul>
    </li>

    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/msc*') ? 'active' : ''}}">
        <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-cogs"></i><span>Miscellaneous</span></a>
        <ul class="dropdown-menu">
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/msc/promo*') ?
                'active' : ''}}"><a href="{{route('admin.promo')}}" class="nav-link">Promo Code</a></li>
            {{--                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/msc/privacy*') ?--}}
            {{--                'active' : ''}}"><a href="{{route('table.blog.posts')}}" class="nav-link">Privacy & Term</a></li>--}}
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/msc/setting*') ?
                'active' : ''}}"><a href="{{route('admin.setting.general')}}" class="nav-link">Setting</a></li>
        </ul>
    </li>

    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/account*') ? 'active' : ''}}">
        <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-user-cog"></i><span>Privilege</span></a>
        <ul class="dropdown-menu">
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/account/admins*') ?
                'active' : ''}}"><a href="{{route('admin.show.list')}}" class="nav-link">Admins</a></li>
            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/account/profile*') ?
                'active' : ''}}"><a href="{{route('admin.profil')}}" class="nav-link">Edit Profile</a></li>
        </ul>
    </li>
</ul>

<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="{{route('beranda')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <b><i class="fas fa-rocket"></i> {{__('admin.sidebar.footer')}}</b></a>
</div>
