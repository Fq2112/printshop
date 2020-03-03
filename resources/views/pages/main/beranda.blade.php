@extends('layouts.mst')
@section('title', __('lang.header.home').' | '.__('lang.title'))
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/settings.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/navigation.css')}}">
@endpush
@section('content')
    <section id="slider" class="slider-element slider-parallax revslider-wrap ohidden clearfix">
        <div id="rev_slider_ishop_wrapper" class="rev_slider_wrapper fullwidth-container" data-alias="default-slider"
             style="padding:0px;">
            <div id="rev_slider_ishop" class="rev_slider fullwidthbanner" style="display:none;" data-version="5.1.4">
                <ul>
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-delay="5000"
                        data-saveperformance="off" data-title="Latest Collections" style="background-color: #F6F6F6;">
                        <div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="100"
                             data-y="50"
                             data-transform_in="x:-200;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="400"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <img src="{{asset('images/slider/rev/shop/girl1.jpg')}}" alt="Girl">
                        </div>

                        <div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="570"
                             data-y="75"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333;">Get your Shopping Bags Ready
                        </div>

                        <div class="tp-caption ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                             data-x="570"
                             data-y="105"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1200"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333; max-width: 430px; line-height: 1.15;">
                            Latest Fashion<br>Collections
                        </div>

                        <div class="tp-caption ltl tp-resizeme revo-slider-desc-text tleft"
                             data-x="570"
                             data-y="275"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1400"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn"
                             style=" color: #333; max-width: 550px; white-space: normal;">We have created a Design that
                            looks Awesome, performs Brilliantly &amp; senses Orientations.
                        </div>

                        <div class="tp-caption ltl tp-resizeme"
                             data-x="570"
                             data-y="375"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1550"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <a href="#" class="button button-border button-large button-rounded tright nomargin">
                                <span>Start Shopping</span><i class="icon-angle-right"></i></a>
                        </div>
                    </li>

                    <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-delay="5000"
                        data-saveperformance="off" data-title="Messenger bags" style="background-color: #E9E8E3;">
                        <div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="630"
                             data-y="78"
                             data-transform_in="x:250;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:400;e:Power4.easeOutQuad;"
                             data-speed="400"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <img src="{{asset('images/slider/rev/shop/bag.png')}}" alt="Bag">
                        </div>

                        <div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="0"
                             data-y="110"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333;">Buy Stylish Bags at Discounted Prices
                        </div>

                        <div class="tp-caption ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                             data-x="0"
                             data-y="140"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1200"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333; line-height: 1.15;">Messenger Bags
                        </div>

                        <div class="tp-caption ltl tp-resizeme revo-slider-desc-text tleft"
                             data-x="0"
                             data-y="240"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1400"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn"
                             style=" color: #333; max-width: 550px; white-space: normal;">Grantees insurmountable
                            challenges invest protect, growth improving quality social entrepreneurship.
                        </div>

                        <div class="tp-caption ltl tp-resizeme"
                             data-x="0"
                             data-y="340"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="700"
                             data-start="1550"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <a href="#" class="button button-border button-large button-rounded tright nomargin">
                                <span>Start Shopping</span><i class="icon-angle-right"></i></a>
                        </div>

                        <div class="tp-caption utb tp-resizeme revo-slider-caps-text uppercase"
                             data-x="510"
                             data-y="0"
                             data-transform_in="x:0;y:-236;z:0;rotationZ:0;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
                             data-speed="600"
                             data-start="2100"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="">
                            <img src="{{asset('images/slider/rev/shop/tag.png')}}" alt="Bag">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="fancy-title title-dotted-border title-center mb-4">
                    <h4>Shop popular categories</h4>
                </div>

                <div class="row shop-categories clearfix">
                    <div class="col-lg-7">
                        <a href="#"
                           style="background: url('{{asset('demos/shop/images/categories/2-1.jpg')}}') no-repeat right center; background-size: cover;">
                            <div class="vertical-middle dark center">
                                <div class="heading-block nomargin noborder">
                                    <h3 class="nott t600 ls0">For Him</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-5">
                        <a href="#"
                           style="background: url('{{asset('demos/shop/images/categories/1.jpg')}}') no-repeat center right; background-size: cover;">
                            <div class="vertical-middle dark center">
                                <div class="heading-block nomargin noborder">
                                    <h3 class="nott t600 ls0">For Her</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4">
                        <a href="#"
                           style="background: url('{{asset('demos/shop/images/categories/4.jpg')}}') no-repeat center center; background-size: cover;">
                            <div class="vertical-middle dark center">
                                <div class="heading-block nomargin noborder">
                                    <h3 class="nott t600 ls0">Popular Products</h3>
                                    <small class="button bg-white text-dark button-light button-mini">Browse Now</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="#"
                           style="background: url('{{asset('demos/shop/images/categories/3.jpg')}}') no-repeat center center; background-size: cover;">
                            <div class="vertical-middle dark center">
                                <div class="heading-block nomargin noborder">
                                    <h3 class="nott t600 ls0">Footwears</h3>
                                    <small class="button bg-white text-dark button-light button-mini">Shop Now</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="#"
                           style="background: url('{{asset('demos/shop/images/categories/5.jpg')}}') no-repeat center center; background-size: cover;">
                            <div class="vertical-middle dark center">
                                <div class="heading-block nomargin noborder">
                                    <h3 class="nott t600 ls0">Sportswear</h3>
                                    <small class="button bg-white text-dark button-light button-mini">Shop Now</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="fancy-title title-dotted-border mt-4 mb-1 title-center">
                    <h4>Weekly Featured Items</h4>
                </div>

                <div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-margin="20"
                     data-loop="true" data-autoplay="5000" data-nav="true" data-pagi="false" data-items-xs="1"
                     data-items-sm="2" data-items-md="3" data-items-lg="4" data-items-xl="5">
                    <div class="oc-item">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#">
                                    <img src="{{asset('demos/shop/images/items/featured/1.jpg')}}"
                                         alt="Round Neck T-shirts"></a>
                                <a href="#">
                                    <img src="{{asset('demos/shop/images/items/featured/1-1.jpg')}}"
                                         alt="Round Neck T-shirts"></a>
                                <div class="sale-flash">Sale!</div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Round Neck Solid Light Blue Colour
                                            T-shirts</a></h3></div>
                                <div class="product-price font-primary">
                                    <del class="mr-1">$24.99</del>
                                    <ins>$12.49</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="oc-item">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#">
                                    <img src="{{asset('demos/shop/images/items/featured/2.jpg')}}"
                                         alt="Navy Blue Dress"></a>
                                <a href="#">
                                    <img src="{{asset('demos/shop/images/items/featured/2-1.jpg')}}"
                                         alt="Navy Blue Dress"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Navy Blue Dress For Women</a></h3></div>
                                <div class="product-price font-primary">
                                    <ins>$19.99</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="oc-item">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{asset('demos/shop/images/items/featured/5.jpg')}}" alt="Shoes"></a>
                                <a href="#"><img src="{{asset('demos/shop/images/items/featured/5-1.jpg')}}"
                                                 alt="Shoes"></a>
                                <div class="product-overlay">
                                    <a href="demos/shop/ajax/shop-item-no-stock.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="sale-flash bg-danger">Out of Stock!</div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">White athletic shoe</a></h3></div>
                                <div class="product-price font-primary">
                                    <ins>$35.00</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="oc-item">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <div class="fslider" data-arrows="false" data-autoplay="4500">
                                    <div class="flexslider">
                                        <div class="slider-wrap">
                                            <div class="slide">
                                                <a href="#">
                                                    <img src="{{asset('demos/shop/images/items/featured/4.jpg')}}" alt="T-shirts"></a>
                                            </div>
                                            <div class="slide">
                                                <a href="#">
                                                    <img src="{{asset('demos/shop/images/items/featured/4-1.jpg')}}" alt="T-shirts"></a></div>
                                            <div class="slide">
                                                <a href="#">
                                                    <img src="{{asset('demos/shop/images/items/featured/4-2.jpg')}}" alt="T-shirts"></a></div>
                                            <div class="slide">
                                                <a href="#">
                                                    <img src="{{asset('demos/shop/images/items/featured/4-3.jpg')}}" alt="T-shirts"></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="sale-flash">Sale!</div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Navy blue T-shirt, Round neck, Short
                                            Sleeves</a></h3></div>
                                <div class="product-price font-primary">
                                    <del class="mr-1">$27.99</del>
                                    <ins>$21.00</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-empty"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="oc-item">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{asset('demos/shop/images/items/featured/3.jpg')}}"
                                                 alt="T-shirts"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Women Black T-Shirt</a></h3></div>
                                <div class="product-price font-primary">
                                    <ins>$13.00</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section my-4">
                <div class="container">
                    <div class="row align-items-stretch grid-container clearfix" data-layout="fitRows">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 center p-5">
                                    <div class="heading-block mb-1 nobottomborder divcenter">
                                        <div class="font-secondary text-black-50 mb-1">New Arrivals</div>
                                        <h3 class="nott ls0">Fresh Arrivals / Autumn 18</h3>
                                        <p class="t400 mt-2 mb-3 text-muted" style="font-size: 17px; line-height: 1.4">
                                            Dynamically drive interdependent metrics for worldwide portals. Proactively
                                            grow client technology schemas.</p>
                                        <a href="#"
                                           class="button bg-dark text-white button-dark button-small noleftmargin">Shop
                                            Now</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="demos/shop/images/sections/1-2.jpg" data-lightbox="image">
                                        <img src="{{asset('demos/shop/images/sections/1-2.jpg')}}" alt=""></a>
                                </div>
                                <div class="col-6">
                                    <a href="demos/shop/images/sections/1-3.jpg" data-lightbox="image">
                                        <img src="{{asset('demos/shop/images/sections/1-3.jpg')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 d-none d-md-block">
                            <a href="https://www.youtube.com/watch?v=bpNcuh_BnsA" data-lightbox="iframe" class="d-block"
                               style="background: url('{{asset('demos/shop/images/sections/1.jpg')}}') center center no-repeat; background-size: cover; height:100%">
                                <div class="vertical-middle center">
                                    <div class="play-icon"><i class="icon-play-sign display-3 text-light"></i></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>

            <div class="container clearfix">
                <div class="fancy-title title-dotted-border topmargin-sm mb-4 title-center">
                    <h4>New Arrivals: Men</h4>
                </div>

                <div class="row grid-6">
                    <div class="col-lg-2 col-md-3 col-6 px-2">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/1.jpg')}}" alt="Image 1"></a>
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/1-1.jpg')}}"
                                                 alt="Image 1"></a>
                                <div class="sale-flash">Sale!</div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Light Blue Denim</a></h3></div>
                                <div class="product-price font-primary">
                                    <del class="mr-1">$24.99</del>
                                    <ins>$12.49</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6 px-2">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/2.jpg')}}" alt="Image 2"></a>
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/2-1.jpg')}}"
                                                 alt="Image 2"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Deep Blue Sport Shoe</a></h3></div>
                                <div class="product-price font-primary">
                                    <ins>$19.99</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6 px-2">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/4.jpg')}}" alt="Image 3"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="sale-flash">Sale!</div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Printed Men Short</a></h3></div>
                                <div class="product-price font-primary">
                                    <del class="mr-1">$41.99</del>
                                    <ins>$35.00</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-empty"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shop Item 4
                    ============================================= -->
                    <div class="col-lg-2 col-md-3 col-6 px-2">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <div class="fslider" data-arrows="false" data-autoplay="4500">
                                    <div class="flexslider">
                                        <div class="slider-wrap">
                                            <div class="slide"><a href="#">
                                                    <img src="{{asset('demos/shop/images/items/new/3.jpg')}}" alt="Image 4"></a></div>
                                            <div class="slide"><a href="#">
                                                    <img src="{{asset('demos/shop/images/items/new/3-1.jpg')}}" alt="Image 4"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Women Sportd Track Pant</a></h3></div>
                                <div class="product-price font-primary">
                                    <ins>$21.00</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6 px-2">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/6.jpg')}}" alt="Image 5"></a>
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/6-1.jpg')}}"
                                                 alt="Image 5"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Cool Printed Dress</a></h3></div>
                                <div class="product-price font-primary">
                                    <ins>$31.49</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6 px-2">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/5.jpg')}}" alt="Image 6"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="sale-flash">Sale!</div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Red Stripe Girls Top</a></h3></div>
                                <div class="product-price font-primary">
                                    <del class="mr-1">$41.99</del>
                                    <ins>$35.00</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6 px-2">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/7.jpg')}}" alt="Image 7"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Dark Brown Lady Bag for Women</a></h3>
                                </div>
                                <div class="product-price font-primary">
                                    <ins>$49.49</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6 px-2">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/8.jpg')}}" alt="Image 8"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">UV Poection Sunglass</a></h3></div>
                                <div class="product-price font-primary">
                                    <ins>$39.99</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6 px-2">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/9.jpg')}}" alt="Image 9"></a>
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/9-1.jpg')}}"
                                                 alt="Image 3"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="sale-flash">Sale!</div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Workout Sweat T-shirt</a></h3></div>
                                <div class="product-price font-primary">
                                    <del class="mr-1">$21.99</del>
                                    <ins>$15.00</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-empty"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6 px-2">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/10.jpg')}}"
                                                 alt="Image 10"></a>
                                <div class="product-overlay">
                                    <a href="demos/shop/ajax/shop-item-no-stock.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="sale-flash bg-danger">Out of Stock!</div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Sky Blue Printed Bag</a></h3></div>
                                <div class="product-price font-primary">
                                    <ins>$61.49</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6 px-2">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <div class="fslider" data-arrows="false" data-autoplay="4500">
                                    <div class="flexslider">
                                        <div class="slider-wrap">
                                            <div class="slide">
                                                <a href="#">
                                                    <img src="{{asset('demos/shop/images/items/new/11.jpg')}}" alt="Image 10">
                                                </a>
                                            </div>
                                            <div class="slide">
                                                <a href="#">
                                                    <img src="{{asset('demos/shop/images/items/new/11-1.jpg')}}" alt="Image 10">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Blue Women Watch</a></h3></div>
                                <div class="product-price font-primary">
                                    <ins>$23.00</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6 px-2">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a href="#"><img src="{{asset('demos/shop/images/items/new/12.jpg')}}"
                                                 alt="Image 6"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i
                                            class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="demos/shop/ajax/shop-item.html" class="item-quick-view"
                                       data-lightbox="ajax"><i class="icon-line-search"></i><span>Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title mb-1"><h3><a href="#">Blue Party Shoe</a></h3></div>
                                <div class="product-price font-primary">
                                    <ins>$51.00</ins>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section my-4 py-5 clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row align-items-stretch align-items-center clearfix">
                                <div class="col-md-7"
                                     style="background: url('{{asset('demos/shop/images/sections/3.jpg')}}') center center no-repeat; background-size: cover; height:100%">
                                    <div class="vertical-middle pl-5">
                                        <h2 class="pl-5"><strong>40%</strong> Off<br>First Order*</h2>
                                    </div>
                                </div>
                                <div class="col-md-5 bg-white">
                                    <div class="card noborder py-2">
                                        <div class="card-body">
                                            <h3 class="card-title mb-4 ls0">Sign up to get the most out of
                                                shopping.</h3>
                                            <ul class="iconlist ml-3">
                                                <li><i class="icon-circle-blank text-black-50"></i> Receive Exclusive
                                                    Sale Alerts
                                                </li>
                                                <li><i class="icon-circle-blank text-black-50"></i> 30 Days Return
                                                    Policy
                                                </li>
                                                <li><i class="icon-circle-blank text-black-50"></i> Cash on Delivery
                                                    Accepted
                                                </li>
                                            </ul>
                                            <a href="#" class="button button-rounded ls0 t600 ml-0 mb-2 nott px-4">Sign
                                                Up</a><br>
                                            <small class="font-italic text-black-50">Don't worry, it's totally
                                                free.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>

            <div class="container clearfix">
                <div class="row topmargin clearfix">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="feature-box fbox-small fbox-plain">
                                    <div class="fbox-icon">
                                        <a href="#"><i class="icon-line2-present text-dark text-dark"></i></a>
                                    </div>
                                    <h3 class="t400">100% Original</h3>
                                    <p>Canvas provides support for Native HTML5 Videos that can be added to a Full Width
                                        Background.</p>
                                </div>
                            </div>

                            <div class="col-sm-6 mt-4 mt-sm-0">
                                <div class="feature-box fbox-small fbox-plain">
                                    <div class="fbox-icon">
                                        <a href="#"><i class="icon-line2-globe text-dark"></i></a>
                                    </div>
                                    <h3 class="t400">Free Shipping</h3>
                                    <p>Display your Content attractively using Parallax Sections that have unlimited
                                        customizable areas.</p>
                                </div>
                            </div>

                            <div class="col-sm-6 mt-4">
                                <div class="feature-box fbox-small fbox-plain">
                                    <div class="fbox-icon">
                                        <a href="#"><i class="icon-line2-reload text-dark"></i></a>
                                    </div>
                                    <h3 class="t400">30-Days Returns</h3>
                                    <p>You have complete easy control on each &amp; every element that provides endless
                                        customization possibilities.</p>
                                </div>
                            </div>

                            <div class="col-sm-6 mt-4">
                                <div class="feature-box fbox-small fbox-plain">
                                    <div class="fbox-icon">
                                        <a href="#"><i class="icon-line2-wallet text-dark"></i></a>
                                    </div>
                                    <h3 class="t400">Payment Options</h3>
                                    <p>We accept Visa, MasterCard and American Express. And We also Deliver by COD(only
                                        in US)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 mt-4 mt-lg-0">
                        <div class="accordion clearfix">
                            <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i
                                    class="acc-open icon-remove-circle"></i>Our Mission
                            </div>
                            <div class="acc_content clearfix">Donec sed odio dui. Nulla vitae elit libero, a pharetra
                                augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a
                                ante venenatis dapibus posuere velit aliquet.
                            </div>

                            <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i
                                    class="acc-open icon-remove-circle"></i>What we Do?
                            </div>
                            <div class="acc_content clearfix">Integer posuere erat a ante venenatis dapibus posuere
                                velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed
                                consectetur. Cras mattis consectetur purus sit amet fermentum.
                            </div>

                            <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i
                                    class="acc-open icon-remove-circle"></i>Our Company's Values
                            </div>
                            <div class="acc_content clearfix">Nullam id dolor id nibh ultricies vehicula ut id elit.
                                Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est
                                non commodo luctus. Aenean lacinia bibendum nulla sed consectetur.
                            </div>

                            <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i
                                    class="acc-open icon-remove-circle"></i>Our Return Policy
                            </div>
                            <div class="acc_content clearfix">Integer posuere erat a ante venenatis dapibus posuere
                                velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed
                                consectetur. Cras mattis consectetur purus sit amet fermentum.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clear"></div>

                <div class="row mt-5 clearfix">
                    <div class="col-12">
                        <div class="fancy-title title-dotted-border title-center mb-4">
                            <h4>Brands who give Flat <span class="text-danger">40%</span> Off</h4>
                        </div>

                        <ul class="clients-grid grid-8 nobottommargin clearfix">
                            <li><a href="#"><img src="{{asset('images/clients/logo/1.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/2.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/3.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/4.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/5.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/6.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/7.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/8.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/9.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/10.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/11.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/12.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/13.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/14.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/15.png')}}" alt="Clients"></a></li>
                            <li><a href="#"><img src="{{asset('images/clients/logo/16.png')}}" alt="Clients"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="clear"></div>

            <div class="section pb-0 mb-0 clearfix" style="background-color: #f8f5f0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-1 bottommargin-lg d-flex flex-column align-self-center">
                            <h3 class="card-title t400 ls0">Follow. Find. Favorite.<br>Discover Fashion on the Go.</h3>
                            <span>Proactively enable Corporate Benefits.</span>
                            <div class="mt-3">
                                <a href="#"
                                   class="button inline-block button-small button-rounded button-desc t400 ls1 clearfix"><i
                                        class="icon-apple"></i>
                                    <div><span>Download Canvas Shop</span>App Store</div>
                                </a>
                                <a href="#"
                                   class="button inline-block button-small button-rounded button-desc button-light text-dark t400 ls1 bg-white border clearfix"><i
                                        class="icon-googleplay"></i>
                                    <div><span>Download Canvas Shop</span>Google Play</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 d-none d-md-flex align-items-end">
                            <img src="{{asset('demos/shop/images/sections/app.png')}}" alt="Image"
                                 class="nobottommargin">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section footer-stick bg-white nomargin py-3 border-bottom">
                <div class="container clearfix">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6">
                            <div class="shop-footer-features mb-3 mb-lg-3"><i class="icon-line2-globe-alt"></i><h5
                                    class="inline-block mb-0 ml-2 t600"><a href="#">Free Shipping</a><span
                                        class="t400 text-muted"> &amp; Easy Returns</span></h5></div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="shop-footer-features mb-3 mb-lg-3"><i class="icon-line2-notebook"></i><h5
                                    class="inline-block mb-0 ml-2"><a href="#">Geniune Products</a><span
                                        class="t400 text-muted"> Guaranteed</span></h5></div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="shop-footer-features mb-3 mb-lg-3"><i class="icon-line2-lock"></i><h5
                                    class="inline-block mb-0 ml-2"><a href="#">256-Bit</a> <span
                                        class="t400 text-muted">Secured Checkouts</span></h5></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('include/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script>
        $(function () {
            var apiRevoSlider = $('#rev_slider_ishop').show().revolution(
                {
                    sliderType: "standard",
                    jsFileLocation: "include/rs-plugin/js/",
                    sliderLayout: "fullwidth",
                    dottedOverlay: "none",
                    delay: 9000,
                    responsiveLevels: [1200, 992, 768, 480, 320],
                    gridwidth: 1140,
                    gridheight: 500,
                    lazyType: "none",
                    shadow: 0,
                    spinner: "off",
                    autoHeight: "off",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        disableFocusListener: false,
                    },
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "ares",
                            enable: true,
                            hide_onmobile: false,
                            hide_onleave: false,
                            tmp: '<div class="tp-title-wrap">	<span class="tp-arr-titleholder">'+$("#rev_slider_ishop ul li").data('title')+'</span> </div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            }
                        }
                    }
                });

            apiRevoSlider.bind("revolution.slide.onloaded", function (e) {
                SEMICOLON.slider.sliderParallaxDimensions();
            });
        });
    </script>
@endpush
