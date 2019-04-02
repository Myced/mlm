@extends('layouts.site')

@section('title')
    {{ __('Products') }}
@endsection


@section('content')
<div class="main-content shop-page main-content-grid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <a href="/">Home</a> \ <span class="current">Products</span>
                </div>
            </div>
        </div>
        <br><br>

        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 content-offset">
                <!-- <div class="main-banner">
                    <div class="banner banner-effect1">
                        <a href="#"><img src="/site/images/banner22.jpg" alt=""></a>
                    </div>
                </div> -->
                <div class="categories-content">
                    <h4 class="shop-title">PRODUCTS</h4>
                    <div class="top-control box-has-content">
                        <div class="control">
                            <div class="filter-choice">
                                <select data-placeholder="All Categories" class="chosen-select">
                                    <option value="1">Sort by popularity</option>
                                    <option value="2">Price</option>
                                    <option value="4">Name</option>
                                </select>
                            </div>
                            <div class="select-item">
                                <select data-placeholder="All Categories" class="chosen-select">
                                    <option value="3">12 per page</option>
                                    <option value="4">15 per page</option>
                                    <option value="5">18 per page</option>
                                    <option value="5">21 per page</option>
                                </select>
                            </div>
                            <div class="control-button">
                                <a href="javascript:void(0)" class="grid-button active"><span class="icon"><i class="fa fa-th-large" aria-hidden="true"></i> </span>Grid</a>
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

                                    @if($topProducts->contains($product->id))
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
                                        class="thumb-link">
                                        <img src="{{ $product->thumbnail }}" alt=""
                                            width="214px" height="214px">
                                    </a>
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
                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}" class="product-name">
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
                                        <a href="{{ route('cart.fast', ['slug' => $product->slug]) }}"
                                            class="add-to-cart">
                                            <span class="text">ADD TO CART</span>
                                            <span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span>
                                        </a>
                                        <a href="javascript:void(0)" class="compare-button">
                                            <span class="icon"><i class="fa fa-exchange" aria-hidden="true"></i></span>
                                            <span class="text">Add to Compare</span>
                                        </a>
                                        <a href="javascript:void(0)" class="wishlist-button">
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
                        {{ $products->links() }}
                    </div>


                    <!-- <span class="note">Showing 1-8 of 13 result</span> -->
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 sidebar">
                <h4 class="main-title">Shop by</h4>
                <div class="widget widget-categories">
                    <h5 class="widgettitle">Categories</h5>
                    <ul class="list-categories">
                        @foreach($categories as $category)
                        <li>
                            <input type="checkbox" id="c{{ $category->id }}"
                                name="category[]">
                            <label for="c{{ $category->id }}" class="label-text">
                                {{ $category->name }}
                                ({{ $category->products->count() }})
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="widget widget-brand">
                    <h5 class="widgettitle">Brand</h5>
                    <ul class="list-categories">
                        @foreach($brands as $brand)
                        <li>
                            <input type="checkbox" id="b{{ $brand->id }}" name="brand[]"
                                value="{{ $brand->id }}">
                            <label for="b{{ $brand->id }}" class="label-text">
                                {{ $brand->name }}
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="widget widget_filter_price box-has-content">
                    <h3 class="widgettitle">Filter by price</h3>
                    <div class="price-filter">
                        <div data-label-reasult="price:"
                            data-min="0" data-max="3000" data-unit="$"
                            class="slider-range-price "
                            data-value-min="185"
                            data-value-max="2000"></div>
                        <div class="amount-range-price">
                            Price:
                            <span class="from">$85</span>
                            -
                            <span class="to">$2000</span>
                        </div>
                        <a href="#" class="filter">Filter</a>
                    </div>
                </div>

                <div class="widget widget-banner row-banner">
                    <div class="banner banner-effect2">
                        <a href="#"><img src="/site/images/banner21.jpg" alt=""></a>
                    </div>
                </div>
                <div class="widget widget-recent-post">
                    <h5 class="widgettitle">New Products</h5>
                    <ul class="list-recent-posts">
                        @foreach(\App\Classes\ShopManager::lastestProducts(6) as $product)
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
    @include('site_includes.brands')
</div>
@endsection

@section('scripts')

@endsection
