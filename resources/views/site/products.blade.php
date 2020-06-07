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
                        <span class="f-16">
                            ALL PRODUCTS

                            <strong>
                                ({{ $products->count() }} results)
                            </strong>
                        </span>
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

            @include('site_includes.sidebar')

        </div>
    </div>
    @include('site_includes.brands')
</div>
@endsection

@section('scripts')

@endsection
