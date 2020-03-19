<ul>
    @foreach(\App\Models\Kategori::all() as $kat)
        <li class="mega-menu">
            <a href="#">
                <div>{{$kat->name}}</div>
            </a>
            <div class="mega-menu-content style-2 clearfix">
                <div class="col-lg-3" style="border-right: 1px solid #F2F2F2;">
                    <ul class="mega-menu-column mega-menu-thumb border-left-0">
                        <li>
                            <div class="widget clearfix">
                                <div class="content-area">
                                    <img class="card-img-top" src="{{asset('images/products/thumb/'.$kat->image)}}"
                                         alt="Thumbnail">
                                    <div class="custom-overlay">
                                        <div class="custom-text"></div>
                                    </div>
                                </div>
                                <p class="topmargin-sm nobottommargin">{{$kat->caption}}</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-columns col-lg-9">
                    @foreach($kat->getSubKategori as $sub)
                        <div class="card">
                            <div class="card-body nopadding nomargin">
                                <ul class="mega-menu-column border-left-0">
                                    <li class="mega-menu-title">
                                        <a href="{{route('produk', ['produk' => $sub->permalink], $app->getLocale())}}">
                                            <div>{{$sub->name}}</div>
                                        </a>
                                        @if($sub->getCluster)
                                            <ul>
                                                @foreach($sub->getCluster as $row)
                                                    <li>
                                                        <a href="{{route('produk',['produk' => $row->permalink], $app->getLocale())}}">
                                                            <div>{{$row->name}}</div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
    @endforeach
</ul>

<div id="top-search">
    <a href="#" id="top-search-trigger">
        <i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
    <form action="search.html">
        <input type="text" name="q" class="form-control" value=""
               placeholder="{{__('lang.placeholder.search')}}">
    </form>
</div>

<div id="top-cart">
    <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart1"></i><span>5</span></a>
    <div class="top-cart-content">
        <div class="top-cart-title">
            <h4>{{__('lang.header.cart')}}</h4>
        </div>
        <div class="top-cart-items">
            <div class="top-cart-item clearfix">
                <div class="top-cart-item-image">
                    <a href="#">
                        <img src="{{asset('demos/shop/images/items/featured/5.jpg')}}"
                             alt="Blue Shoulder Bag"/></a>
                </div>
                <div class="top-cart-item-desc">
                    <a href="#" class="t400">White athletic shoe</a>
                    <span class="top-cart-item-price">$35.00</span>
                    <span class="top-cart-item-quantity t600">x 1</span>
                </div>
            </div>
            <div class="top-cart-item clearfix">
                <div class="top-cart-item-image">
                    <a href="#" class="t400"><img
                            src="{{asset('demos/shop/images/items/featured/1.jpg')}}"
                            alt="Leather Bag"/></a>
                </div>
                <div class="top-cart-item-desc">
                    <a href="#" class="t400">Round Neck Solid Light Blue Colour T-shirts</a>
                    <span class="top-cart-item-price">$12.49</span>
                    <span class="top-cart-item-quantity t600">x 2</span>
                </div>
            </div>
        </div>
        <div class="top-cart-action clearfix">
            <span class="fleft top-checkout-price t600 text-dark">$59.98</span>
            <button
                class="button button-dark button-small nomargin fright">{{__('lang.button.cart')}}</button>
        </div>
    </div>
</div>

<div id="top-account">
    @if(Auth::check() || Auth::guard('admin')->check())
        <li class="has-children avatar">
            <a href="javascript:void(0)" style="font-weight: 900;">
                @if(Auth::check())
                    <img class="img-thumbnail show_ava" src="{{Auth::user()->ava != "" ?
                            asset('storage/users/ava/'.Auth::user()->ava) :
                            asset('images/avatar.png')}}">{{Auth::user()->name}}
                @elseif(Auth::guard('admin')->check())
                    <img class="img-thumbnail show_ava" src="{{Auth::guard('admin')->user()->ava != "" ?
                            asset('storage/admins/ava/'.Auth::guard('admin')->user()->ava) :
                            asset('images/avatar.png')}}">{{Auth::guard('admin')->user()->name}}
                @endif
            </a>
            <ul class="dropdown">
                @auth('admin')
                    @if(Auth::guard('admin')->user()->isRoot() || Auth::guard('admin')->user()->isAdmin())
                        <li><a href="{{route('home-admin')}}"><i class="fa fa-tachometer-alt mr-2"></i>
                                Dashboard</a></li>
                    @else
                        <li><a href="{{route('show.schedules')}}"><i class="fa fa-calendar-day mr-2"></i>
                                Schedules</a></li>
                    @endif
                @else
                    <li><a href="{{route('client.dashboard')}}"><i class="fa fa-tachometer-alt mr-2"></i>
                            Dashboard</a></li>
                @endauth
                <li><a href="{{Auth::guard('admin')->check() ? route('admin.edit.profile') :
                        route('client.edit.profile')}}"><i class="fa fa-user-edit mr-2"></i>Edit Profile</a></li>
                <li><a href="{{Auth::guard('admin')->check() ? route('admin.settings') :
                        route('client.settings')}}"><i class="fa fa-cogs mr-2"></i>Account Settings</a></li>
                <li class="dropdown-divider"></li>
                <li>
                    <a class="btn_signOut"><i class="fa fa-sign-out-alt mr-2"></i>Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    @else
        <a href="javascript:void(0)" data-toggle="modal" onclick="openRegisterModal();">
            <i class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i>
            <span class="d-none d-sm-inline-block font-primary t500 text-uppercase">{{__('lang.header.sign-up-in')}}</span></a>
    @endif
</div>
