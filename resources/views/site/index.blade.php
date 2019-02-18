@extends('layouts.home')

@section('title')
    {{ __("Home") }}
@endsection

@section('content')
<div class="main-content home-page main-content-home1">
    <div class="container">
        <div class="container-offset">
            <!--Slideshow-->
            <div class="main-slideshow slideshow1">
                <div class="owl-carousel nav-style1" data-autoplay="true" data-nav="true" data-dots="false" data-loop="true" data-slidespeed="800" data-margin="30"  data-responsive = '{"0":{"items":1}, "640":{"items":1}, "768":{"items":1}, "1024":{"items":1}, "1200":{"items":1}}'>
                    <div class="slide-item item1">
                        <img src="/site/images/slide1.jpg" alt="">
                        <div class="slide-content">
                            <h5 class="subtitle">up to <span class="text-main-color">60% off</span> </h5>
                            <h3 class="title">Smart Watchs</h3>
                            <h5 class="smalltitle">Only: <span> $226.00</span></h5>
                            <a href="#" class="button">Shop Now</a>
                        </div>
                    </div>
                    <div class="slide-item item2">
                        <img src="/site/images/slide2.jpg" alt="">
                        <div class="slide-content">
                            <h3 class="title"><span>Sales</span> & Sevice of Laptop</h3>
                            <h4 class="subtitle">up to <span class="text-main-color"> 50% off</span></h4>
                            <h5 class="smalltitle">Only: <span> $268.00</span></h5>
                            <a href="#" class="button">Shop Now</a>
                        </div>
                    </div>
                    <div class="slide-item item3">
                        <img src="/site/images/slide3.jpg" alt="">
                        <div class="slide-content">
                            <h4 class="subtitle text-main-color">Up to 50% Off</h4>
                            <h3 class="title">Gear VR 3D.</h3>
                            <h5 class="smalltitle">Virtual reality through a new lens</h5>
                            <a href="#" class="button">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Slideshow-->
        </div>

        <!--List Products-->
        <div class="group-product layout1">
            <div class="kt-tab nav-tab-style1">
                <div class="section-head box-has-content">
                    <h4 class="section-title">Featured Products</h4>
                    <ul class="nav list-nav">
                        <li class="active"><a data-animated="pulse" data-toggle="pill" href="#tab1">ALL</a></li>
                        <li><a data-animated="fadeIn" data-toggle="pill" href="#tab2">TV & Audio</a></li>
                        <li><a data-animated="fadeInDown" data-toggle="pill" href="#tab1">Laptop </a></li>
                        <li><a data-animated="fadeInUp" data-toggle="pill" href="#tab2">Accessories </a></li>
                    </ul>
                </div>
                <div class="section-content">
                    <div class="tab-content">
                        <div id="tab1" class="tab-panel active">
                            <div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "640":{"items":3,"margin":-1}, "992":{"items":4}, "1200":{"items":5}}'>
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <div class="thumb">
                                            <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                            <a href="detail.html" class="thumb-link"><img src="/site/images/product1.jpg" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <a href="detail.html" class="product-name">Rubberized Hard Case Older MacBook Pro 13.3"</a>
                                            <div class="price">
                                                <span>$350.00</span>
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                                <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                                <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                                <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <ul class="group-flash">
                                            <li><span class="new flash">NEW</span></li>
                                        </ul>
                                        <div class="thumb">
                                            <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                            <a href="detail.html" class="thumb-link"><img src="/site/images/product2.jpg" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <a href="detail.html" class="product-name">Smartphone RAM 4 GB New</a>
                                            <div class="price">
                                                <span >$350.00</span>
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                            <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                            <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                            <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <ul class="group-flash">
                                            <li><span class="sale flash">-50%</span></li>
                                            <li><span class="best flash">Bestseller</span></li>
                                        </ul>
                                        <div class="thumb">
                                            <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                            <a href="detail.html" class="thumb-link"><img src="/site/images/product3.jpg" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <a href="detail.html" class="product-name">Fujifilm INSTAX Mini 8 Instant Camera (White)</a>
                                            <div class="price">
                                                <span class="del">$700.00</span>
                                                <span class="ins">$350.00</span>
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                            <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                            <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                            <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <div class="thumb">
                                            <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                            <a href="detail.html" class="thumb-link"><img src="/site/images/product4.jpg" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <a href="detail.html" class="product-name">PC Prox 21.5-inch and 27-inch (Late 2018) reviews</a>
                                            <div class="price">
                                                <span >$550.00</span>
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                            <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                            <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                            <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <ul class="group-flash">
                                            <li><span class="sale flash">-50%</span></li>
                                        </ul>
                                        <div class="thumb">
                                            <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                            <a href="detail.html" class="thumb-link"><img src="/site/images/product5.jpg" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <a href="detail.html" class="product-name">Best Accessories- SteelSeries NIMBUS Controlle</a>
                                            <div class="price">
                                                <span class="del">$500.00</span>
                                                <span class="ins">$250.00</span>
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                            <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                            <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                            <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <div class="thumb">
                                            <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                            <a href="detail.html" class="thumb-link"><img src="/site/images/product6.jpg" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <a href="detail.html" class="product-name">Headphone </a>
                                            <div class="price">
                                                <span >$450.00</span>
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                            <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                            <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                            <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab2" class="tab-panel">
                            <div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "640":{"items":3,"margin":-1}, "992":{"items":4}, "1200":{"items":5}}'>
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <div class="thumb">
                                            <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                            <a href="detail.html" class="thumb-link"><img src="/site/images/product1.jpg" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <a href="detail.html" class="product-name">Rubberized Hard Case Older MacBook Pro 13.3"</a>
                                            <div class="price">
                                                <span>$350.00</span>
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                                <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                                <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                                <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <ul class="group-flash">
                                            <li><span class="new flash">NEW</span></li>
                                        </ul>
                                        <div class="thumb">
                                            <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                            <a href="detail.html" class="thumb-link"><img src="/site/images/product2.jpg" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <a href="detail.html" class="product-name">Smartphone RAM 4 GB New</a>
                                            <div class="price">
                                                <span >$350.00</span>
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                            <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                            <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                            <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <ul class="group-flash">
                                            <li><span class="sale flash">-50%</span></li>
                                            <li><span class="best flash">Bestseller</span></li>
                                        </ul>
                                        <div class="thumb">
                                            <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                            <a href="detail.html" class="thumb-link"><img src="/site/images/product3.jpg" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <a href="detail.html" class="product-name">Fujifilm INSTAX Mini 8 Instant Camera (White)</a>
                                            <div class="price">
                                                <span class="del">$700.00</span>
                                                <span class="ins">$350.00</span>
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                            <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                            <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                            <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <div class="thumb">
                                            <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                            <a href="detail.html" class="thumb-link"><img src="/site/images/product4.jpg" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <a href="detail.html" class="product-name">PC Prox 21.5-inch and 27-inch (Late 2018) reviews</a>
                                            <div class="price">
                                                <span >$550.00</span>
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                            <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                            <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                            <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <ul class="group-flash">
                                            <li><span class="sale flash">-50%</span></li>
                                        </ul>
                                        <div class="thumb">
                                            <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                            <a href="detail.html" class="thumb-link"><img src="/site/images/product5.jpg" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <a href="detail.html" class="product-name">Best Accessories- SteelSeries NIMBUS Controlle</a>
                                            <div class="price">
                                                <span class="del">$500.00</span>
                                                <span class="ins">$250.00</span>
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                            <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                            <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                            <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <div class="thumb">
                                            <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                            <a href="detail.html" class="thumb-link"><img src="/site/images/product6.jpg" alt=""></a>
                                        </div>
                                        <div class="info">
                                            <a href="detail.html" class="product-name">Headphone </a>
                                            <div class="price">
                                                <span >$450.00</span>
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                            <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                            <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                            <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/List Products-->

        <!--Banner-->
        <div class="row row-banner">
            <div class="col-ts-12 col-xs-6 col-sm-6">
                <div class="banner banner-effect1">
                    <a href="#"><img src="/site/images/banner1.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-ts-12 col-xs-6 col-sm-6">
                <div class="banner banner-effect1">
                    <a href="#"><img src="/site/images/banner2.jpg" alt=""></a>
                </div>
            </div>
        </div>
        <!--/Banner-->

        <div class="product-show box-has-content">
            <div class="section-head box-has-content">
                <h4 class="section-title">Featured Products</h4>
            </div>
            <div class="section-content">
                <div class="item-show">
                    <div class="owl-carousel nav-style3 has-thumbs" data-autoplay="false" data-nav="false" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "640":{"items":1}, "768":{"items":1}, "1024":{"items":1}, "1200":{"items":1}}'>
                        <a href="detail.html"><img src="/site/images/product-slide1.jpg" alt=""></a>
                        <a href="detail.html"><img src="/site/images/product-slide1.jpg" alt=""></a>
                        <a href="detail.html"><img src="/site/images/product-slide1.jpg" alt=""></a>
                        <a href="detail.html"><img src="/site/images/product-slide1.jpg" alt=""></a>
                    </div>
                    <div class="product-item">
                        <div class="product-inner">
                            <div class="info">
                                <div class="rating">
                                    <ul class="list-star">
                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                    </ul>
                                    <span class="count">5 Review(s)</span>
                                </div>
                                <a href="detail.html" class="product-name">27inch PC with Retina 5K Display thunder</a>
                                <div class="price">
                                    <span class="del">$668.00</span>
                                    <span class="ins">$350.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="other-product-show auto-clear box-has-content equal-container">
                    <div class="product-item layout1 col-lg-4 col-md-4 col-sm-4 col-xs-6 col-ts-12">
                        <div class="product-inner equal-elem">
                            <div class="thumb">
                                <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                <a href="detail.html" class="thumb-link"><img src="/site/images/product2.jpg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="detail.html" class="product-name">Smartphone RAM 4 GB New</a>
                                <div class="price">
                                    <span>$350.00</span>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="inner">
                                    <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                    <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                    <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item layout1 col-lg-4 col-md-4 col-sm-4 col-xs-6 col-ts-12">
                        <div class="product-inner equal-elem">
                            <div class="thumb">
                                <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                <a href="detail.html" class="thumb-link"><img src="/site/images/product6.jpg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="detail.html" class="product-name">Best Accessories- SteelSeries NIMBUS Controlle</a>
                                <div class="price">
                                    <span class="del">$500.00</span>
                                    <span class="ins">$250.00</span>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="inner">
                                    <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                    <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                    <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item layout1 col-lg-4 col-md-4 col-sm-4 col-xs-6 col-ts-12">
                        <div class="product-inner equal-elem">
                            <div class="thumb">
                                <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                <a href="detail.html" class="thumb-link"><img src="/site/images/product1.jpg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="detail.html" class="product-name">Rubberized Hard Case Older MacBook Pro 13.3"</a>
                                <div class="price">
                                    <span>$350.00</span>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="inner">
                                    <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                    <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                    <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item layout1 col-lg-4 col-md-4 col-sm-4 col-xs-6 col-ts-12">
                        <div class="product-inner equal-elem">
                            <div class="thumb">
                                <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                <a href="detail.html" class="thumb-link"><img src="/site/images/product3.jpg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="detail.html" class="product-name">Fujifilm INSTAX Mini 8 Instant Camera (White)</a>
                                <div class="price">
                                    <span>$350.00</span>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="inner">
                                    <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                    <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                    <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item layout1 col-lg-4 col-md-4 col-sm-4 col-xs-6 col-ts-12">
                        <div class="product-inner equal-elem">
                            <div class="thumb">
                                <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                <a href="detail.html" class="thumb-link"><img src="/site/images/product4.jpg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="detail.html" class="product-name">PC Prox 21.5-inch and 27-inch (Late 2018) reviews</a>
                                <div class="price">
                                    <span>$350.00</span>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="inner">
                                    <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                    <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                    <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item layout1 col-lg-4 col-md-4 col-sm-4 col-xs-6 col-ts-12">
                        <div class="product-inner equal-elem">
                            <div class="thumb">
                                <a href="#" class="quickview-button"><span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span> Quick View</a>
                                <a href="detail.html" class="thumb-link"><img src="/site/images/product5.jpg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="detail.html" class="product-name">Best Accessories- SteelSeries NIMBUS Controlle</a>
                                <div class="price">
                                    <span >$350.00</span>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="inner">
                                    <a href="#" class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
                                    <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                    <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Blog-->
        <div class="our-blog">
            <div class="section-head box-has-content">
                <h4 class="section-title">From our blog</h4>
            </div>
            <div class="owl-carousel nav-style2" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="20"  data-responsive = '{"0":{"items":1}, "500":{"items":2}, "768":{"items":2}, "1024":{"items":2}, "1200":{"items":2}}'>
                <div class="post-item layout1">
                    <div class="post-format">
                        <a href="blogpost.html"><img src="/site/images/blog1.jpg" alt=""></a>
                    </div>
                    <div class="post-info">
                        <div class="head">
                            <div class="post-date">
                                <span class="day">23</span>
                                <span class="month">Dec</span>
                            </div>
                            <a href="blogpost.html" class="post-title">We’re the best Designers from UK</a>
                        </div>
                        <div class="main-info-post">
                            <ul class="meta-post">
                                <li class="time-post"><a href="#">23 Dec 2018</a></li>
                                <li class="comments"><a href="#"><span class="icon"><i class="fa fa-comment" aria-hidden="true"></i></span><span class="count">68 Comments</span></a></li>
                            </ul>
                            <p class="des">Lorem ipsum dolor sit amet, consectetur dcin Maecenas at rhoncus sapien [...]</p>
                            <a href="blogpost.html" class="button read-more">Read more <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="post-item layout1">
                    <div class="post-format">
                        <a href="blogpost.html"><img src="/site/images/blog2.jpg" alt=""></a>
                    </div>
                    <div class="post-info">
                        <div class="head">
                            <div class="post-date">
                                <span class="day">13</span>
                                <span class="month">May</span>
                            </div>
                            <a href="blogpost.html" class="post-title">We’re the best Designers from UK</a>
                        </div>
                        <div class="main-info-post">
                            <ul class="meta-post">
                                <li class="time-post"><a href="#">13 May 2018</a></li>
                                <li class="comments"><a href="#"><span class="icon"><i class="fa fa-comment" aria-hidden="true"></i></span><span class="count">68 Comments</span></a></li>
                            </ul>
                            <p class="des">Lorem ipsum dolor sit amet, consectetur dcin Maecenas at rhoncus sapien [...]</p>
                            <a href="blogpost.html" class="button read-more">Read more <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="post-item layout1">
                    <div class="post-format">
                        <a href="blogpost.html"><img src="/site/images/blog3.jpg" alt=""></a>
                    </div>
                    <div class="post-info">
                        <div class="head">
                            <div class="post-date">
                                <span class="day">23</span>
                                <span class="month">Dec</span>
                            </div>
                            <a href="blogpost.html" class="post-title">We’re the best Designers from UK</a>
                        </div>
                        <div class="main-info-post">
                            <ul class="meta-post">
                                <li class="time-post"><a href="#">23 Dec 2018</a></li>
                                <li class="comments"><a href="#"><span class="icon"><i class="fa fa-comment" aria-hidden="true"></i></span><span class="count">68 Comments</span></a></li>
                            </ul>
                            <p class="des">Lorem ipsum dolor sit amet, consectetur dcin Maecenas at rhoncus sapien [...]</p>
                            <a href="blogpost.html" class="button read-more">Read more <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Blog-->

        <!--Logo Brand-->
        <div class="brand">
            <div class="owl-carousel" data-autoplay="false" data-nav="false" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="30"  data-responsive = '{"0":{"items":2}, "640":{"items":2}, "768":{"items":3}, "992":{"items":4}, "1200":{"items":5}}'>
                <div class="brand-item"><a href="#"><img src="/site/images/brand1.jpg" alt=""></a></div>
                <div class="brand-item"><a href="#"><img src="/site/images/brand1.jpg" alt=""></a></div>
                <div class="brand-item"><a href="#"><img src="/site/images/brand1.jpg" alt=""></a></div>
                <div class="brand-item"><a href="#"><img src="/site/images/brand1.jpg" alt=""></a></div>
                <div class="brand-item"><a href="#"><img src="/site/images/brand1.jpg" alt=""></a></div>
            </div>
        </div>
        <!--/Logo brand-->

        <!--Recent Post-->
        <div class="post">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="widget widget-recent-post">
                        <h5 class="widgettitle">Most viewed</h5>
                        <ul class="list-recent-posts">
                            <li class="product-item">
                                <div class="thumb"><a href="detail.html"><img src="/site/images/small-product1.jpg" alt=""></a></div>
                                <div class="info">
                                    <a href="detail.html" class="product-name">Fujifilm INSTAX Mini 8 Instant Camera (White) Series</a>
                                    <div class="price">
                                        <span class="del">$700.00</span>
                                        <span class="ins">$350</span>
                                    </div>
                                </div>
                            </li>
                            <li class="product-item">
                                <div class="thumb"><a href="detail.html"><img src="/site/images/small-product2.jpg" alt=""></a></div>
                                <div class="info">
                                    <a href="detail.html" class="product-name">Best Accessories- SteelSeries NIMBUS Controlle</a>
                                    <div class="price">
                                        <span>$100</span>
                                    </div>
                                </div>
                            </li>
                            <li class="product-item">
                                <div class="thumb"><a href="detail.html"><img src="/site/images/small-product3.jpg" alt=""></a></div>
                                <div class="info">
                                    <a href="detail.html" class="product-name">Smartphone RAM 4 GB New</a>
                                    <div class="price">
                                        <span >$350.00</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="widget widget-recent-post">
                        <h5 class="widgettitle">Onsale Products</h5>
                        <ul class="list-recent-posts">
                            <li class="product-item">
                                <div class="thumb"><a href="detail.html"><img src="/site/images/small-product4.jpg" alt=""></a></div>
                                <div class="info">
                                    <a href="detail.html" class="product-name">Smartphone RAM 4 GB New</a>
                                    <div class="price">
                                        <span class="del">$500.00</span>
                                        <span class="ins">$250</span>
                                    </div>
                                </div>
                            </li>
                            <li class="product-item">
                                <div class="thumb"><a href="detail.html"><img src="/site/images/small-product5.jpg" alt=""></a></div>
                                <div class="info">
                                    <a href="detail.html" class="product-name">Smartphone RAM 4 GB New</a>
                                    <div class="price">
                                        <span class="del">$700.00</span>
                                        <span class="ins">$350</span>
                                    </div>
                                </div>
                            </li>
                            <li class="product-item">
                                <div class="thumb"><a href="detail.html"><img src="/site/images/small-product6.jpg" alt=""></a></div>
                                <div class="info">
                                    <a href="detail.html" class="product-name">Best Accessories- SteelSeries NIMBUS Headphone</a>
                                    <div class="price">
                                        <span class="del">$400.00</span>
                                        <span class="ins">$200</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="widget widget-recent-post">
                        <h5 class="widgettitle">New arrivals</h5>
                        <ul class="list-recent-posts">
                            <li class="product-item">
                                <div class="thumb"><a href="detail.html"><img src="/site/images/small-product7.jpg" alt=""></a></div>
                                <div class="info">
                                    <a href="detail.html" class="product-name">PC Prox 21.5-inch and 27-inch (Late 2018) reviews</a>
                                    <div class="price">
                                        <span>$370</span>
                                    </div>
                                </div>
                            </li>
                            <li class="product-item">
                                <div class="thumb"><a href="detail.html"><img src="/site/images/small-product8.jpg" alt=""></a></div>
                                <div class="info">
                                    <a href="detail.html" class="product-name">Bravia KLV-32W562D 32 Inch Full HD  LED 3D Smart TV</a>
                                    <div class="price">
                                        <span >$1000</span>
                                    </div>
                                </div>
                            </li>
                            <li class="product-item">
                                <div class="thumb"><a href="detail.html"><img src="/site/images/small-product9.jpg" alt=""></a></div>
                                <div class="info">
                                    <a href="detail.html" class="product-name"> Bravia KDL 40W600B 40 Inch Full HD LED Television Price in India</a>
                                    <div class="price">
                                        <span>$850</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--/Recent Post-->
    </div>
</div>
@endsection
