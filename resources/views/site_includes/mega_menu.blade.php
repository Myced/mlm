<div class="row">
    <div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-3">
        <h5 class="title widgettitle">Product Brands</h5>
        <ul>
            @foreach($brands as $brand)
                <li>
                    <a href="{{ route('products.brand', ['brand' => $brand->slug]) }}">
                        {{ $brand->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-3">
        <h5 class="title widgettitle">Categories</h5>
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('products.category', ['category' => $category->slug]) }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-3">
        <h5 class="title widgettitle">Featured Phones</h5>
        <ul>
            @foreach(\App\Classes\ShopManager::topOrdered() as $content)
                <li>
                    <a href="{{ route('product.detail', ['slug' => $content->product()->slug]) }}">
                        {{$content->product()->name}}
                    </a>
                </li>
            @endforeach
<!--

            <li><a href="#">Phone Batteries</a></li>
            <li><a href="#">Phone Charger</a></li>
            <li><a href="#">Phone Screen</a></li>
            <li><a href="#">Head Set</a></li>
            <li><a href="#">Software</a></li> -->
        </ul>
    </div>
</div>
<!-- <div class="row">
    <div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-3">
        <h5 class="title widgettitle">Headphone</h5>
        <ul>
            <li><a href="#">Accessories</a></li>
            <li><a href="#">Phone Batteries</a></li>
            <li><a href="#">Phone Charger</a></li>
            <li><a href="#">Phone Screen</a></li>
            <li><a href="#">Head Set</a></li>
            <li><a href="#">Software</a></li>
        </ul>
    </div>
    <div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-3">
        <h5 class="title widgettitle">Camera</h5>
        <ul>
            <li><a href="#">Accessories</a></li>
            <li><a href="#">Phone Batteries</a></li>
            <li><a href="#">Phone Charger</a></li>
            <li><a href="#">Phone Screen</a></li>
            <li><a href="#">Head Set</a></li>
            <li><a href="#">Software</a></li>
        </ul>
    </div>
    <div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-3">
        <h5 class="title widgettitle">Printer & ink</h5>
        <ul>
            <li><a href="#">Accessories</a></li>
            <li><a href="#">Phone Batteries</a></li>
            <li><a href="#">Phone Charger</a></li>
            <li><a href="#">Phone Screen</a></li>
            <li><a href="#">Head Set</a></li>
            <li><a href="#">Software</a></li>
        </ul>
    </div>
</div> -->
