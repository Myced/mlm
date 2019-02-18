@extends('layouts.site')

@section('title')
    {{ __('Products') }}
@endsection


@section('content')
<div class="main-content shop-page main-content-grid">
    <div class="container">
        <div class="breadcrumbs">
            <a href="/">Home</a> \ <span class="current">Products</span>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 content-offset">
                <div class="main-banner">
                    <div class="banner banner-effect1">
                        <a href="#"><img src="/site/images/banner22.jpg" alt=""></a>
                    </div>
                </div>
                <div class="categories-content">
                    <h4 class="shop-title">Grid Category</h4>
                    <div class="top-control box-has-content">
                        <div class="control">
                            <div class="filter-choice">
                                <select data-placeholder="All Categories" class="chosen-select">
                                    <option value="1">Sort by popularity</option>
                                    <option value="2">Size</option>
                                    <option value="3">Type</option>
                                    <option value="4">Name</option>
                                    <option value="5">Data Modified</option>
                                </select>
                            </div>
                            <div class="select-item">
                                <select data-placeholder="All Categories" class="chosen-select">
                                    <option value="1">12 per page</option>
                                    <option value="2">9 per page</option>
                                    <option value="3">12 per page</option>
                                    <option value="4">15 per page</option>
                                    <option value="5">18 per page</option>
                                    <option value="5">21 per page</option>
                                </select>
                            </div>
                            <div class="control-button">
                                <a href="#" class="grid-button active"><span class="icon"><i class="fa fa-th-large" aria-hidden="true"></i> </span>Grid</a>
                                <a href="#" class="list-button"><span class="icon"><i class="fa fa-th-list" aria-hidden="true"></i></span> List</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-container auto-clear grid-style equal-container box-has-content">


                        @foreach($products as $product)
                        <div class="product-item layout1 col-ts-12 col-xs-6 col-sm-6 col-md-4 col-lg-4 no-padding">
                            <div class="product-inner equal-elem">
                                <ul class="group-flash">
                                    @if($product->isNew())
                                    <li><span class="new flash">NEW</span></li>
                                    @endif

                                    @if($product->isOnPromotion())
                                    <li>
                                        <span class="sale flash">
                                            -{{ $product->getPercentage() }}%
                                        </span>
                                    </li>
                                    @endif

                                    @if($product->isBestSeller())
                                    <li><span class="best flash">Bestseller</span></li>
                                    @endif
                                </ul>
                                <div class="thumb">
                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}" class="quickview-button">
                                        <span class="icon">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </span>
                                        DETAILS
                                    </a>
                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}"
                                        class="thumb-link"><img src="{{ $product->thumbnail }}" alt=""></a>
                                </div>
                                <div class="info">
                                    <div class="rating">
                                        <ul class="list-star">
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                        </ul>
                                        <span class="count">5 Review(s)</span>
                                    </div>
                                    <a href="detail.html" class="product-name">
                                        {{ $product->name }}
                                    </a>
                                    <p class="description">
                                        {{ str_limit($product->description, 100) }}
                                    </p>
                                    <div class="price">
                                        @if($product->isOnPromotion())
                                        <span class="del">FCFA {{ number_format($product->price) }}</span>
                                        <span class="ins">FCFA {{ number_format($product->getPrice()) }} </span>
                                        @else
                                        <span >FCFA {{ number_format($product->price) }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="group-button">
                                    <div class="inner">
                                        <a href="#" class="add-to-cart">
                                            <span class="text">ADD TO CART</span>
                                            <span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span>
                                        </a>
                                        <a href="#" class="compare-button">
                                            <span class="icon"><i class="fa fa-exchange" aria-hidden="true"></i></span>
                                            <span class="text">Add to Compare</span>
                                        </a>
                                        <a href="#" class="wishlist-button">
                                            <span class="icon"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                                            <span class="text">Add to Wishlist</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                    <div class="pagination">
                        <ul class="list-page">
                            <li><a href="#" class="page-number current">1</a></li>
                            <li><a href="#" class="page-number">2</a></li>
                            <li><a href="#" class="page-number">3</a></li>
                            <li><a href="#" class="nav-button">Next</a></li>
                        </ul>
                    </div>
                    <span class="note">Showing 1-8 of 12 result</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 sidebar">
                <h4 class="main-title">Shop by</h4>
                <div class="widget widget-categories">
                    <h5 class="widgettitle">Categories</h5>
                    <ul class="list-categories">
                        <li><input type="checkbox" id="cb1"><label for="cb1" class="label-text">Home Audio & Theater</label></li>
                        <li><input type="checkbox" id="cb2"><label for="cb2" class="label-text">TV & Video</label></li>
                        <li><input type="checkbox" id="cb3"><label for="cb3" class="label-text">Camera, Photo & Video</label></li>
                        <li><input type="checkbox" id="cb4"><label for="cb4" class="label-text">Cell Phones & Accessories</label></li>
                        <li><input type="checkbox" id="cb5"><label for="cb5" class="label-text">Headphones</label></li>
                        <li><input type="checkbox" id="cb6"><label for="cb6" class="label-text">Video Games</label></li>
                        <li><input type="checkbox" id="cb7"><label for="cb7" class="label-text">Bluetooth & Wireless Speakers</label></li>
                        <li><input type="checkbox" id="cb8"><label for="cb8" class="label-text">Gaming Console</label></li>
                        <li><input type="checkbox" id="cb9"><label for="cb9" class="label-text">Computers & Tablets</label></li>
                    </ul>
                </div>
                <div class="widget widget-brand">
                    <h5 class="widgettitle">Brand</h5>
                    <ul class="list-categories">
                        <li><input type="checkbox" id="cb10"><label for="cb10" class="label-text">Cameras</label></li>
                        <li><input type="checkbox" id="cb11"><label for="cb11" class="label-text">Smartphone</label></li>
                        <li><input type="checkbox" id="cb12"><label for="cb12" class="label-text">Printer & Ink</label></li>
                        <li><input type="checkbox" id="cb13"><label for="cb13" class="label-text">Game & Consoles</label></li>
                        <li><input type="checkbox" id="cb14"><label for="cb14" class="label-text">Sound & Speaker</label></li>
                    </ul>
                </div>
                <div class="widget widget_filter_price box-has-content">
                    <h3 class="widgettitle">Filter by price</h3>
                    <div class="price-filter">
                        <div data-label-reasult="price:" data-min="0" data-max="3000" data-unit="$" class="slider-range-price " data-value-min="185" data-value-max="2000"></div>
                        <div class="amount-range-price">Price: <span class="from">$85</span> - <span class="to">$2000</span></div>
                        <a href="#" class="filter">Filter</a>
                    </div>
                </div>
                <div class="widget widget_filter_size">
                    <h3 class="widgettitle">size</h3>
                    <ul class="list-size">
                        <li><a href="#">S</a></li>
                        <li><a href="#">M</a></li>
                        <li><a href="#">L</a></li>
                        <li><a href="#">xl</a></li>
                        <li><a href="#">XXL</a></li>
                    </ul>
                </div>
                <div class="widget widget_filter_color box-has-content">
                    <h3 class="widgettitle">color</h3>
                    <ul class="list-color">
                        <li><input type="checkbox" id="cb15"><label for="cb15" class="label-text">Red<span class="count">(12)</span></label></li>
                        <li><input type="checkbox" id="cb16"><label for="cb16" class="label-text">Black<span class="count">(34)</span></label></li>
                        <li><input type="checkbox" id="cb17"><label for="cb17" class="label-text">Pink<span class="count">(52)</span></label></li>
                        <li><input type="checkbox" id="cb18"><label for="cb18" class="label-text">Grey<span class="count">(55)</span></label></li>
                        <li><input type="checkbox" id="cb19"><label for="cb19" class="label-text">White<span class="count">(16)</span></label></li>
                        <li><input type="checkbox" id="cb20"><label for="cb20" class="label-text">Yellow<span class="count">(21)</span></label></li>
                        <li><input type="checkbox" id="cb21"><label for="cb21" class="label-text">Blue<span class="count">(19)</span></label></li>
                        <li><input type="checkbox" id="cb22"><label for="cb22" class="label-text">Green<span class="count">(31)</span></label></li>
                    </ul>
                </div>
                <div class="widget widget-banner row-banner">
                    <div class="banner banner-effect2">
                        <a href="#"><img src="/site/images/banner21.jpg" alt=""></a>
                    </div>
                </div>
                <div class="widget widget-recent-post">
                    <h5 class="widgettitle">New Products</h5>
                    <ul class="list-recent-posts">
                        <li class="product-item">
                            <div class="thumb"><a href="detail.html"><img src="/site/images/small-product14.jpg" alt=""></a></div>
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
                                <a href="detail.html" class="product-name">Instant Camera</a>
                                <div class="price">
                                    <span class="del">$700.00</span>
                                    <span class="ins">$350</span>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="thumb"><a href="detail.html"><img src="/site/images/small-product15.jpg" alt=""></a></div>
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
                                <a href="detail.html" class="product-name">SteelSeries NIMBUS Controlle</a>
                                <div class="price">
                                    <span>$100</span>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="thumb"><a href="detail.html"><img src="/site/images/small-product16.jpg" alt=""></a></div>
                            <div class="info">
                                <a href="detail.html" class="product-name">Smartphone RAM 4 GB New</a>
                                <div class="price">
                                    <span >$350.00</span>
                                </div>
                            </div>
                        </li>
                        <li class="product-item">
                            <div class="thumb"><a href="detail.html"><img src="/site/images/small-product15.jpg" alt=""></a></div>
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
                                <a href="detail.html" class="product-name">SteelSeries NIMBUS Controlle</a>
                                <div class="price">
                                    <span>$100</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @include('site_includes.brands')
</div>
@endsection

@section('scripts')

@endsection
