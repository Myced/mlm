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
                            <h5 class="smalltitle">Only: <span> FCFA 226,000</span></h5>
                            <a href="#" class="button">Shop Now</a>
                        </div>
                    </div>
                    <div class="slide-item item2">
                        <img src="/site/images/slide2.jpg" alt="">
                        <div class="slide-content">
                            <h3 class="title"><span>Sales</span> & Sevice of Laptop</h3>
                            <h4 class="subtitle">up to <span class="text-main-color"> 50% off</span></h4>
                            <h5 class="smalltitle">Only: <span>FCFA 268,000</span></h5>
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
                    <h4 class="section-title">TOP ORDERED Products</h4>

                    <ul class="nav list-nav">
                        <li class="active">
                            <a data-animated="pulse" data-toggle="pill" href="#tab1">ALL</a>
                        </li>
                    </ul>
                </div>
                <div class="section-content">
                    <div class="tab-content">
                        <div id="tab1" class="tab-panel active">
                            <div class="owl-carousel product-list-owl nav-style2 equal-container"
                                data-autoplay="true"
                                data-nav="true"
                                data-dots="false"
                                data-loop="true"
                                data-slidespeed="1000"
                                data-margin="0"
                                data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "640":{"items":3,"margin":-1}, "992":{"items":4}, "1200":{"items":5}}'>

                                @foreach($topOrdered as $product)
                                
                                <div class="product-item layout1">
                                    <div class="product-inner equal-elem">
                                        <ul class="group-flash">
                                            <li><span class="best flash">Bestseller</span></li>
                                            @if($product->model()->isOnPromotion())
                                            <li>
                                                <span class="sale flash">
                                                    -{{ $product->model()->getPercentage() }}%
                                                </span>
                                            </li>
                                            @endif
                                        </ul>
                                        <div class="thumb">
                                            <a href="{{ route('product.detail', ['slug' => $product->model()->slug ]) }}"
                                            class="quickview-button">
                                                <span class="icon">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                                Product Details
                                            </a>
                                            <a href="{{ route('product.detail', ['slug' => $product->model()->slug ]) }}"
                                                class="thumb-link">
                                                <img src="{{ $product->model()->thumbnail }}" alt=""
                                                    width="214px" height="214px">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <a href="{{ route('product.detail', ['slug' => $product->model()->slug ]) }}"
                                                class="product-name">
                                                <strong>{{ $product->model()->name }}</strong>
                                            </a>
                                            <div class="price">
                                                @if($product->model()->isOnPromotion())
                                                    <span class="del">XAF {{ number_format($product->model()->price) }}</span>
                                                    <span class="ins">XAF {{ number_format($product->model()->getPrice()) }} </span>
                                                @else
                                                    <span >FCFA {{ number_format($product->model()->price) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="group-button">
                                            <div class="inner">
                                                <a href="{{ route('cart.fast', ['slug' => $product->model()->slug]) }}"
                                                    class="add-to-cart">
                                                    <span class="text">ADD TO CART</span>
                                                    <span class="icon">
                                                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                                <a href="javascript:void(0)" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

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
                    <a href="#">
                        <img src="/site/images/banner1.jpg" alt="">
                    </a>
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
                @if($mainProduct != null)
                    <div class="item-show">
                        <div class="owl-carousel nav-style3 has-thumbs"
                            data-autoplay="true"
                            data-nav="false"
                            data-dots="false"
                            data-loop="false"
                            data-slidespeed="800" data-margin="0"
                            data-responsive = '{"0":{"items":1}, "640":{"items":1}, "768":{"items":1}, "1024":{"items":1}, "1200":{"items":1}}'>
                            <a href="{{ route('product.detail', ['slug' => $mainProduct->model()->slug ]) }}">
                                <img src="{{ $mainProduct->model()->image }}" alt="">
                            </a>
                            @foreach($mainProduct->model()->images as $image)
                            <a href="{{ route('product.detail', ['slug' => $mainProduct->model()->slug ]) }}">
                                <img src="{{ $image->image }}" alt="">
                            </a>
                            @endforeach
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
                                    <a href="{{ route('product.detail', ['slug' => $mainProduct->model()->slug ]) }}"
                                        class="product-name">
                                        {{ $mainProduct->model()->name }}
                                    </a>
                                    <div class="price">
                                        @if($mainProduct->model()->isOnPromotion())
                                            <span class="del">XAF {{ number_format($mainProduct->model()->price) }}</span>
                                            <span class="ins">
                                                XAF {{ number_format($mainProduct->model()->getPrice()) }}
                                                (-{{ $mainProduct->model()->percent_off }}%)
                                            </span>
                                        @else
                                            <span >FCFA {{ number_format($mainProduct->model()->price) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="other-product-show auto-clear box-has-content equal-container">

                    <?php $tops = $topOrdered->pluck('product_id'); ?>
                    @foreach($featuredProducts as $product)
                    <div class="product-item layout1 col-lg-4 col-md-4 col-sm-4 col-xs-6 col-ts-12">
                        <div class="product-inner equal-elem">

                            <ul class="group-flash">

                                @if($tops->contains($product->product_id))
                                    <li><span class="best flash">Bestseller</span></li>
                                @endif

                                @if($product->model()->isOnPromotion())
                                <li>
                                    <span class="sale flash">
                                        -{{ $product->model()->getPercentage() }}%
                                    </span>
                                </li>
                                @endif
                            </ul>

                            <div class="thumb">
                                <a href="{{ route('product.detail', ['slug' => $product->model()->slug ]) }}" class="quickview-button">
                                    <span class="icon">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                    Product Details
                                </a>
                                <a href="{{ route('product.detail', ['slug' => $product->model()->slug ]) }}" class="thumb-link">
                                    <img src="{{ $product->model()->thumbnail }}" alt=""
                                        width="214px" height="214px">
                                </a>
                            </div>
                            <div class="info">
                                <a href="{{ route('product.detail', ['slug' => $product->model()->slug ]) }}"
                                    class="product-name">
                                    {{ $product->model()->name }}
                                </a>
                                <div class="price">
                                    @if($product->model()->isOnPromotion())
                                        <span class="del">XAF {{ number_format($product->model()->price) }}</span>
                                        <span class="ins">XAF {{ number_format($product->model()->getPrice()) }} </span>
                                    @else
                                        <span >FCFA {{ number_format($product->model()->price) }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="inner">
                                    <a href="{{ route('cart.fast', ['slug' => $product->model()->slug]) }}"
                                        class="add-to-cart">
                                        <span class="text">
                                            ADD TO CART
                                        </span>
                                        <span class="icon">
                                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

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
                            <a href="blogpost.html" class="post-title">I AM A GOOD DEVELOPER FROM CAMEROON</a>
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
                            <a href="blogpost.html" class="post-title">I AM A GOOD DEVELOPER FROM CAMEROON</a>
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
                            <a href="blogpost.html" class="post-title">I AM A GOOD DEVELOPER FROM CAMEROON</a>
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
        @include('site_includes.brands')
        <!--/Logo brand-->

        <!--Recent Post-->
        <div class="post">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="widget widget-recent-post">
                        <h5 class="widgettitle">Most viewed</h5>
                        <ul class="list-recent-posts">
                            @foreach(\App\Classes\ShopManager::mostViewed(4) as $product)
                            <li class="product-item">
                                <div class="thumb">
                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                                        <img src="{{ $product->thumbnail }}" alt="">
                                    </a>
                                </div>
                                <div class="info">
                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}"
                                        class="product-name">
                                        {{ $product->name }}
                                    </a>
                                    <div class="price">
                                        @if($product->isOnPromotion())
                                            <span class="del">XAF {{ number_format($product->price) }}</span>
                                            <span class="ins">XAF {{ number_format($product->getPrice()) }} </span>
                                        @else
                                            <span >FCFA {{ number_format($product->price) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="widget widget-recent-post">
                        <h5 class="widgettitle">Top Promo</h5>
                        <ul class="list-recent-posts">
                            @foreach(\App\Classes\ShopManager::topPromo(4) as $product)
                            <li class="product-item">
                                <div class="thumb">
                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                                        <img src="{{ $product->thumbnail }}" alt="">
                                    </a>
                                </div>
                                <div class="info">
                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}"
                                        class="product-name">
                                        {{ $product->name }}
                                    </a>
                                    <div class="price">
                                        @if($product->isOnPromotion())
                                            <span class="del">XAF {{ number_format($product->price) }}</span>
                                            <span class="ins">XAF {{ number_format($product->getPrice()) }} </span>
                                            <span class="ins">(-{{ $product->percent_off }}%) </span>
                                        @else
                                            <span >FCFA {{ number_format($product->price) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="widget widget-recent-post">
                        <h5 class="widgettitle">Latest Products</h5>
                        <ul class="list-recent-posts">
                            @foreach(\App\Classes\ShopManager::lastestProducts(4) as $product)
                            <li class="product-item">
                                <div class="thumb">
                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                                        <img src="{{ $product->thumbnail }}" alt="">
                                    </a>
                                </div>
                                <div class="info">
                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}"
                                        class="product-name">
                                        {{ $product->name }}
                                    </a>
                                    <div class="price">
                                        @if($product->isOnPromotion())
                                            <span class="del">XAF {{ number_format($product->price) }}</span>
                                            <span class="ins">XAF {{ number_format($product->getPrice()) }} </span>
                                        @else
                                            <span >FCFA {{ number_format($product->price) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--/Recent Post-->
    </div>
</div>
@endsection
