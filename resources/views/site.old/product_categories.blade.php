@extends('layouts.site')

@section('title')
    {{ __(' Category - ') }} {{ $category->name }}
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="/site/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/site/styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="/site/styles/shop_responsive.css">

@endsection

@section('content')
    <!-- page title  -->
    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll"
            data-image-src="/site/images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title"> {{ $category->name }} </h2>
        </div>
    </div>
    <!-- end page title  -->

    <div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
                                <li><a href="{{ route('products') }}">All Products</a></li>

                                @foreach($categories as $category)
                                    <li class="active">
                                        <a href="{{ route('products.category', ['category' => $category->slug]) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach

							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p>
                                    <input type="text" id="amount" class="amount"
                                    readonly style="border:0; font-weight:bold;">
                                </p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								@foreach($brands as $brand)
                                    <li class="brand">
                                        <a href="{{ route('products.brand', ['brand' => $brand->slug]) }}">
                                            {{ $brand->name }}
                                        </a>
                                    </li>
                                @endforeach
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">

					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count">
                                <span class="text-bold">
                                    {{ count($products) }}
                                </span>
                                Products
                            </div>

							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>

							@foreach($products as $product)
                                <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ $product->thumbnail }}" alt="">
                                    </div>
                                    <div class="product_content">
                                        <div class="product_price">
                                            {{ number_format($product->price) }} FCFA
                                        </div>
                                        <div class="product_name"><div>
                                            <a href="{{ route('product.detail', ['slug' => $product->slug]) }}" tabindex="0">
                                                {{ \Illuminate\Support\Str::title($product->name) }}
                                            </a>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>

                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                                <!-- end product item  -->
                            @endforeach

						</div>

						<!-- Shop Page Navigation -->


					</div>

				</div>
			</div>
		</div>
	</div>


@endsection

@section('scripts')
    <script src="/site/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/site/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="/site/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="/site/js/shop_custom.js"></script>
@endsection
