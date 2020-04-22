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
                                    <img class="card-img-top" src="{{asset('storage/products/menu/'.$kat->image)}}"
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
                        <div class="card card-body nopadding nomargin">
                            <ul class="mega-menu-column border-left-0">
                                <li class="mega-menu-title">
                                    <a href="{{route('produk', ['produk' => $sub->permalink])}}">
                                        <div>{{$sub->name}}</div>
                                    </a>
                                    @if($sub->getCluster)
                                        <ul>
                                            @foreach($sub->getCluster as $row)
                                                <li>
                                                    <a href="{{route('produk',['produk' => $row->permalink])}}">
                                                        <div>{{$row->name}}</div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
    @endforeach

    @if(Auth::check() || Auth::guard('admin')->check())
        <li class="avatar">
            <a href="#">
                <div style="text-transform: none">
                    @if(Auth::check())
                        <img alt="Ava" class="img-thumbnail show_ava" src="{{Auth::user()->getBio->ava != "" ?
                        asset('storage/users/ava/'.Auth::user()->getBio->ava) : asset('admins/img/avatar/avatar-'.rand(1,5).'.png')}}">
                        <b class="show_username">{{Auth::user()->username}}</b>
                    @elseif(Auth::guard('admin')->check())
                        <img alt="Ava" class="img-thumbnail show_ava" src="{{Auth::guard('admin')->user()->ava != "" ?
                        asset('storage/admins/ava/'.Auth::guard('admin')->user()->ava) :
                        asset('admins/img/avatar/avatar-'.rand(1,5).'.png')}}">{{Auth::guard('admin')->user()->username}}
                    @endif
                </div>
            </a>
            <ul>
                <li><a href="{{Auth::guard('admin')->check() ? route('admin.dashboard') : route('user.dashboard')}}">
                        <div><i class="icon-dashboard"></i>Dashboard</div>
                    </a></li>
                <li><a href="{{Auth::guard('admin')->check() ? route('admin.profil') : route('user.profil')}}">
                        <div><i class="icon-user-edit"></i>{{__('lang.header.profile')}}</div>
                    </a></li>
                <li><a href="{{Auth::guard('admin')->check() ? route('admin.pengaturan') : route('user.pengaturan')}}">
                        <div><i class="icon-cogs"></i>{{__('lang.header.settings')}}</div>
                    </a></li>
                <li class="dropdown-divider"></li>
                <li>
                    <a href="#" class="btn_signOut">
                        <div><i class="icon-sign-out-alt"></i>{{__('lang.header.sign-out')}}</div>
                    </a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    @endif
</ul>

<div id="top-search">
    <a href="#" id="top-search-trigger">
        <i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
    <form action="#">
        <input id="keyword" type="text" class="form-control" autocomplete="off" spellcheck="false"
               placeholder="{{__('lang.placeholder.search')}}">
    </form>
</div>

@if(!Auth::check() && !Auth::guard('admin')->check())
    <div id="top-account">
        <a href="#" onclick="openRegisterModal();">
            <i class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i>
            <span class="d-none d-sm-inline-block font-primary t500 text-uppercase">
                {{__('lang.header.sign-up-in')}}</span></a>
    </div>
@else
    <div id="top-cart">
        <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart1"></i><span>9+</span></a>
        <div class="top-cart-content">
            <div class="top-cart-title">
                <h4 data-toc-skip>{{__('lang.header.cart')}}</h4>
            </div>
            <div class="top-cart-items use-nicescroll" style="max-height: 200px">
                @foreach(\App\Models\SubKategori::find(32)->getCluster as $row)
                    <div class="top-cart-item clearfix">
                        <a href="{{route('produk', ['produk' => $row->permalink])}}">
                            <div class="top-cart-item-image">
                                <img src="{{asset('storage/products/thumb/'.$row->thumbnail)}}" alt="Thumbnail">
                            </div>
                            <div class="top-cart-item-desc">
                                <span class="top-cart-item-title">{{$row->name}}</span>
                                <span class="top-cart-item-price">Rp{{number_format('25000',2,',','.')}}</span>
                                <span class="top-cart-item-quantity t600">x 1</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="top-cart-action clearfix">
                <span class="top-checkout-price t600 text-dark">
                    Rp{{\App\Support\Facades\NumberShorten::redenominate('989898989')}}</span>
                <a href="{{route('user.cart')}}" class="button button-3d button-primary button-small m-0 fright">
                    {{__('lang.button.view')}}</a>
            </div>
        </div>
    </div>
@endif
