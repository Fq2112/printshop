<ul class="sidebar-menu">
    <li class="menu-header">General</li>
    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/dashboard*') ? 'active' : ''}}">
        <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
    </li>

    @if(Auth::user()->isRoot() || Auth::user()->isOwner())
        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/inbox*') ? 'active' : ''}}">
            <a href="{{route('admin.inbox')}}" class="nav-link"><i
                    class="fas fa-envelope"></i><span>{{__('admin.sidebar.inbox')}}</span></a>
        </li>
{{--        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/invoice*') ? 'active' : ''}}">--}}
{{--            <a href="{{route('admin.invoice')}}" class="nav-link"><i class="fas fa-money-bill"></i><span>Invoices</span></a>--}}
{{--        </li>--}}

    @endif

    <li class="dropdown  {{\Illuminate\Support\Facades\Request::is('*scott.royce/order*') ? 'active' : ''}}">
        <a href="{{route('admin.order')}}" class="nav-link"><i class="fas fa-archive"></i><span>Orders</span></a>
    </li>

{{--    <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/order/show*') ? 'active' : ''}}">--}}
{{--        <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">--}}
{{--            <i class="fas fa-archive"></i><span>Orders</span></a>--}}
{{--        <ul class="dropdown-menu">--}}
{{--            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/order/show/new*') ? 'active' : ''}}">--}}
{{--                <a href="{{route('admin.order', ['condition' => \App\Support\StatusProgress::NEW])}}"--}}
{{--                   class="nav-link">New Orders</a></li>--}}
{{--            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/order/show/start*') ? 'active' : ''}}">--}}
{{--                <a href="{{route('admin.order', ['condition' => \App\Support\StatusProgress::START_PRODUCTION])}}"--}}
{{--                   class="nav-link">On Produce</a></li>--}}
{{--            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/order/show/shipping*') ? 'active' : ''}}">--}}
{{--                <a href="{{route('admin.order', ['condition' => \App\Support\StatusProgress::SHIPPING])}}"--}}
{{--                   class="nav-link">Shipping</a></li>--}}
{{--            <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/order/show/received*') ? 'active' : ''}}">--}}
{{--                <a href="{{route('admin.order', ['condition' => \App\Support\StatusProgress::RECEIVED])}}"--}}
{{--                   class="nav-link">Received Orders</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}

    <li class="menu-header">Tables</li>



    @if(Auth::user()->isRoot() || Auth::user()->isOwner())
        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/categories*') ? 'active' : ''}}">
            <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-database"></i><span>Product Categories</span></a>
            <ul class="dropdown-menu">
                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/categories/main*') ?
                'active' : ''}}"><a href="{{route('table.categories.main')}}" class="nav-link">Main</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/categories/sub*') ?
                'active' : ''}}"><a href="{{route('table.categories.subkat')}}" class="nav-link">Subs</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/categories/cluster*') ?
                'active' : ''}}"><a href="{{route('table.categories.cluster')}}" class="nav-link">Clusters</a></li>
            </ul>
        </li>

        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/spec*') ? 'active' : ''}}">
            <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-database"></i><span>Product Specs</span></a>
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

        <li class="dropdown {{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/msc*') ? 'active' : ''}}">
            <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-database"></i><span>Miscellaneous</span></a>
            <ul class="dropdown-menu">
                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/msc/promo*') ?
                'active' : ''}}"><a href="{{route('admin.promo')}}" class="nav-link">Promo Code</a></li>
{{--                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/msc/privacy*') ?--}}
{{--                'active' : ''}}"><a href="{{route('table.blog.posts')}}" class="nav-link">Privacy & Term</a></li>--}}
                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/tables/msc/setting*') ?
                'active' : ''}}"><a href="{{route('admin.setting.general')}}" class="nav-link">Setting</a></li>
            </ul>
        </li>

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
                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/account/admins*') ?
                'active' : ''}}"><a href="{{route('admin.show.list')}}" class="nav-link">Admins</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/account/admins/user*') ?
                'active' : ''}}"><a href="{{route('admin.user.list')}}" class="nav-link">Users</a></li>
                <li class="{{\Illuminate\Support\Facades\Request::is('*scott.royce/account/profile*') ?
                'active' : ''}}"><a href="{{route('admin.profil')}}" class="nav-link">Edit Profile</a></li>
            </ul>
        </li>

    @endif

</ul>

<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="{{route('beranda')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <b><i class="fas fa-rocket"></i> {{__('admin.sidebar.footer')}}</b></a>
</div>
