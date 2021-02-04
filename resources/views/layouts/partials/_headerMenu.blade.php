<ul>
    @foreach(\App\Models\Kategori::where('isActive', true)->get() as $kat)
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
                                         alt="Thumbnail" style="width: 230px;height: 170px;object-fit: cover;">
                                    <div class="custom-overlay">
                                        <div class="custom-text"></div>
                                    </div>
                                </div>
                                <p class="topmargin-sm nobottommargin">{{$kat->caption}}</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-columns col-lg-9" style="max-height: 500px; overflow: auto;">
                    @foreach(\App\Models\SubKategori::where('kategoris_id', $kat->id)->where('isActive', true)->get() as $sub)
                        @php
                            $clusters = \App\Models\ClusterKategori::where('subkategori_id', $sub->id)->where('isActive', true)->get();
                        @endphp
                        @if(count($clusters) > 0 || (count($clusters) <= 0 && $sub->getSubkatSpecs))
                            <div class="card card-body nopadding nomargin">
                                <ul class="mega-menu-column border-left-0">
                                    <li class="mega-menu-title">
                                        <a href="{{route('produk', ['produk' => $sub->permalink])}}">
                                            <div>{{$sub->name}}</div>
                                        </a>
                                        @if(count($clusters) > 0)
                                            <ul>
                                                @foreach(\App\Models\ClusterKategori::where('subkategori_id', $sub->id)->where('isActive', true)->get() as $row)
                                                    @if($row->getClusterSpecs)
                                                        <li>
                                                            <a href="{{route('produk',['produk' => $row->permalink])}}">
                                                                <div>{{$row->name}}</div>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        @endif
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
                        <b class="show_username">{{\Illuminate\Support\Str::limit(Auth::user()->username,15)}}</b>
                    @elseif(Auth::guard('admin')->check())
                        <img alt="Ava" class="img-thumbnail show_ava" src="{{Auth::guard('admin')->user()->ava != "" ?
                        asset('storage/admins/ava/'.Auth::guard('admin')->user()->ava) :
                        asset('admins/img/avatar/avatar-'.rand(1,5).'.png')}}">
                        {{\Illuminate\Support\Str::limit(Auth::guard('admin')->user()->username,15)}}
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
                    <a href="javascript:void(0)" class="btn_signOut">
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
    <a href="javascript:void(0)" id="top-search-trigger">
        <i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
    <form action="#">
        <input id="keyword" type="text" class="form-control" autocomplete="off" spellcheck="false"
               placeholder="{{__('lang.placeholder.search')}}">
    </form>
</div>

@if(!Auth::check() && !Auth::guard('admin')->check())
    <div id="top-account">
        <a href="javascript:void(0)" onclick="openRegisterModal();">
            <i class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i>
            <span class="d-none d-sm-inline-block font-primary t500 text-uppercase">
                {{__('lang.header.sign-up-in')}}</span></a>
    </div>
@else
    @php
        $total = 0;
        $carts = \App\Models\Cart::where('user_id', Auth::id())->where('isCheckout', false)->orderByDesc('id')->get();
        if(!is_null($carts)){
            $cart_amount = count($carts) > 9 ? '9+' : count($carts);
        } else {
            $cart_amount = 0;
        }
    @endphp
    <div id="top-cart">
        <a href="javascript:void(0)" id="top-cart-trigger">
            <i class="icon-shopping-cart1"></i>
            <span>{{$cart_amount}}</span>
        </a>
        <div class="top-cart-content">
            <div class="top-cart-title">
                <h4 data-toc-skip>{{__('lang.header.cart')}}</h4>
            </div>
            @if(count($carts) > 0)
                <div class="top-cart-items use-nicescroll" style="max-height: 200px">
                    @foreach($carts as $row)
                        @php
                            $data = !is_null($row->subkategori_id) ? $row->getSubKategori : $row->getCluster;
                            $image = !is_null($row->subkategori_id) ? asset('storage/products/banner/'.$row->getSubKategori->banner) :
                                     asset('storage/products/thumb/'.$row->getCluster->thumbnail);
                            $total += $row->total;
                        @endphp
                        <div class="top-cart-item clearfix">
                            <a href="javascript:void(0)" onclick="actionOrder('{{$data->name}}',
                                '{{route('produk', ['produk' => $data->permalink, 'cart_id' => encrypt($row->id)])}}',
                                '{{route('produk.delete.pemesanan', ['produk' => $data->permalink, 'id' => encrypt($row->id)])}}')">
                                <div class="top-cart-item-image">
                                    <img src="{{$image}}" alt="Thumbnail">
                                </div>
                                <div class="top-cart-item-desc">
                                    <span class="top-cart-item-title">{{$data->name}}</span>
                                    <span
                                        class="top-cart-item-price">Rp{{number_format($row->price_pcs,2,',','.')}}</span>
                                    <span class="top-cart-item-quantity t600">x {{$row->qty}}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="top-cart-action clearfix">
                <span class="top-checkout-price t600 text-dark">
                    Rp{{\App\Support\Facades\NumberShorten::redenominate($total)}}</span>
                    <a href="{{route('user.cart')}}" class="button button-3d button-primary button-small m-0 fright">
                        {{__('lang.button.view')}}</a>
                </div>
            @else
                <div class="row justify-content-center text-center m-0">
                    <div class="col">
                        <img width="150" class="img-fluid" src="{{asset('images/loader-image.gif')}}" alt="">
                        <h5 class="mt-0 mb-1">{{__('lang.order.empty-head')}}</h5>
                        <h6 class="mt-0 mb-3">{{__('lang.order.empty-capt')}}</h6>
                        <a href="{{route('beranda')}}"
                           class="button button-rounded button-reveal button-border button-primary button-small tright mb-3">
                            <i class="icon-angle-right"></i><span>{{__('lang.button.shop')}}</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
