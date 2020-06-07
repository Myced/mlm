<form class="" action="{{ route('products.filter') }}" method="get">

    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 sidebar">
        <h4 class="main-title">Shop by</h4>
        <div class="widget widget-categories">
            <h5 class="widgettitle">Categories</h5>
            <ul class="list-categories">
                @foreach($categories as $category)
                <li>
                    <input type="checkbox" id="c{{ $category->id }}"
                        name="categories[]" value="{{ $category->id }}">
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
                    <input type="checkbox" id="b{{ $brand->id }}" name="brands[]"
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
                    data-min="0" data-max="{{ $max_price }}" data-unit="F"
                    class="slider-range-price "
                    data-value-min="{{ $min_price }}"
                    data-value-max="{{ $max_price }}"></div>

                    <input type="hidden" name="min_price" value="{{ $min_price }}" id="min_price">
                    <input type="hidden" name="max_price" value="{{ $max_price }}" id="max_price">
                <div class="amount-range-price">
                    Price:
                    <span class="from">F {{ number_format($min_price) }}</span>
                    -
                    <span class="to">F {{ number_format($max_price) }}</span>

                </div>
            </div>
        </div>

        <div class="widget widget_filter_price box-has-content">
            <div class="checkout-form content-form">
                <div class="group-button">

                    <input type="submit" name="submit" value="Filter"
                        class="button submit submit-btn">
                </div>
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
</form>
