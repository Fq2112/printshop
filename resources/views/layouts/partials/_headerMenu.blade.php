<ul>
    @foreach(\App\Models\Kategori::all() as $kat)
        <li class="mega-menu">
            <a href="#">
                <div>{{$kat->name}}</div>
            </a>
            <div class="mega-menu-content style-2 clearfix">
                @foreach($kat->getSubKategori as $sub)
                    <ul class="mega-menu-column border-left-0 col-lg-3">
                        <li class="mega-menu-title">
                            <a href="#">
                                <div>{{$sub->name}}</div>
                            </a>
                            @if($sub->getCluster)
                                <ul>
                                    @foreach($sub->getCluster as $row)
                                        <li><a href="#">
                                                <div>{{$row->name}}</div>
                                            </a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    </ul>
                @endforeach
                <ul class="mega-menu-column col-lg-3 border-left-0">
                    <li class="card p-0 nobg noborder">
                        <a href="#">
                            <img class="card-img-top" src="{{asset('demos/shop/images/menu-image.jpg')}}" alt="">
                            <p>{{$kat->caption}}</p>
                        </a>
                    </li>
                </ul>
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
    <a href="#modal-register" data-lightbox="inline"><i
            class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i><span
            class="d-none d-sm-inline-block font-primary t500">{{__('lang.button.login')}}</span></a>
</div>
