@extends('layouts.site')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
<div class="main-content shop-page main-content-detail">
    <div class="container">
        <div class="breadcrumbs">
            <a href="/">Home</a> \ <a href="{{ route('products') }}">Products</a> \
            <span class="current">{{ $product->name }}</span>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 content-offset">
                <div class="about-product row">
                    <div class="details-thumb col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="owl-carousel nav-style3 has-thumbs" data-autoplay="false" data-nav="true" data-dots="false"
                         data-loop="true" data-slidespeed="800" data-margin="0"
                         data-responsive = '{"0":{"items":1}, "480":{"items":2}, "768":{"items":1}, "1024":{"items":1}, "1200":{"items":1}}'>
                            <div class="details-item">
                                <img src="{{ $product->image }}" alt=""
                                    width="400px" height="400px">
                            </div>
                            @if($product->images->count() == 0)
                                <div class="details-item">
                                    <img src="{{ $product->image }}" alt=""
                                        width="400px" height="400px">
                                </div>
                            @else
                                @foreach($product->images as $image)
                                    <div class="details-item">
                                        <img src="{{ $image->image }}" alt=""
                                            >
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="details-info col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <a href="javascript:void(0)" class="product-name">
                            {{ $product->name }}
                        </a>
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
                        <p class="description">
                            {!! $product->description !!}
                        </p>
                        <div class="price">
                            @if($product->isOnPromotion())

                                <span class="my-flash sale-flash">
                                    -{{ $product->getPercentage() }}%
                                </span> <br><br>

                                <span class="delete">FCFA {{ number_format($product->price) }}</span> <br>
                                <span class="insert">FCFA {{ number_format($product->getPrice()) }} </span>
                            @else
                                <span >FCFA {{ number_format($product->price) }}</span>
                            @endif
                        </div>
                        <div class="availability">
                            <strong>Availability:</strong>
                            @if($product->quantity < 1)
                                <span class="text-danger">
                                    <strong class="f-20">Out of Stock</strong>
                                </span>
                            @else
                                <span class="text-success text-bold">
                                    <strong>In Stock ({{ $product->quantity }})</strong>
                                </span>
                            @endif

                        </div>

                        <form class="" action="{{ route('cart.add') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="quantity">
                                        <div class="group-quantity-button">
                                            <a class="minus" href="#"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                            <input class="input-text qty text" type="text" size="4" title="Qty"
                                                value="1" name="quantity" max="{{ $product->quantity }}">
                                            <a class="plus" href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            <input type="hidden" name="product_id" value="{{ $product->code }}">
                                        </div>
                                    </div>
                                    <div class="group-button">
                                        <div class="inner">
                                            <button type="submit" name="button" class="my-add-cart">
                                                ADD TO CART
                                            </button>
                                            <a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
                                            <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="kt-tab nav-tab-style2">
                    <ul class="nav list-nav">
                        <li class="active"><a data-animated="fadeIn" data-toggle="pill" href="#tab1">Description</a></li>
                        <li><a data-animated="zoomInUp" data-toggle="pill" href="#tab2">Addtional Infomation</a></li>
                        <li><a data-animated="rotateInDownLeft" data-toggle="pill" href="#tab3">Reviews</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab1" class="tab-panel active ">
                            <div class="description">
                                <p>Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, at everti meliore erroribus sea. Vero graeco cotidieque ea duo, in eirmod insolens interpretaris nam. Pro at nostrud percipit definitiones, eu tale porro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.</p>
                                <p>Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum cotidieque. Est cu nibh clita. Sed an nominavi, et duo corrumpit constituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus voluptaria ex per. Aeque dicam consulatu eu his, probatus neglegentur disputationi sit et. Ei nec ludus epicuri petentium, vis appetere maluisset ad. Et hinc exerci utinam cum. Sonet saperet nominavi est at, vel eu sumo tritani. Cum ex minim legere.</p>
                                <p>Eos cu utroque inermis invenire, eu pri alterum antiopam. Nisl erroribus definitiones nec an, ne mutat scripserit est. Eros veri ad pri. An soleat maluisset per. Has eu idque similique, et blandit scriptorem necessitatibus mea. Vis quaeque ocurreret ea.cu bus scripserit, modus voluptaria ex per. Aeque dicam consulatu eu his, probatus neglegentur disputationi sit et. Ei nec ludus epicuri petentium, vis appetere maluisset ad. Et hinc exerci utinam cum. Sonet saperet nominavi est at, vel eu sumo tritani.</p>

                            </div>
                        </div>
                        <div id="tab2" class="tab-panel">
                            <div class="additional">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                        <p>Lorem ipsum dolor sit amet isse potenti sesquam ante aliquet lacusemper elit. Cras neque nulla convallis non comodo euismod nonsese isse potent.</p>
                                        <ul>
                                            <li>Soft-touch jersey</li>
                                            <li>Crew neck </li>
                                            <li>Logo print</li>
                                            <li>Regular fit - true to size</li>
                                        </ul>
                                        <ul>
                                            <li>Machine wash</li>
                                            <li>100% Cotton</li>
                                            <li>Our model wears a size Medium and is 185.5cm/6'1" tall</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab3" class="tab-panel">
                            <div class="custom-review">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="customer-review">
                                            <h3 class="title supper-title">CUSTOMER REVIEWS <span class="count">( 2 Reviews )</span></h3>
                                            <ul class="list-review">
                                                <li class="review-item">
                                                    <div class="character">
                                                        <div class="rating">
                                                            <ul class="list-star">
                                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <a href="#" class="author">Christiana Doe</a>
                                                        <div class="time-review">20 Dec 2015</div>
                                                    </div>
                                                    <div class="review-content">
                                                        <h3 class="title">What a Beautiful Design</h3>
                                                        <p class="content">Cras neque nulla, convallis non commodo et, euismod nonsese. At vero eos et accusamus et iusto odio dignimos ducimus qui blanditiis praesentium voluptatum</p>
                                                    </div>
                                                </li>
                                                <li class="review-item">
                                                    <div class="character">
                                                        <div class="rating">
                                                            <ul class="list-star">
                                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <a href="#" class="author">Jonathan Doe</a>
                                                        <div class="time-review">20 Dec 2015</div>
                                                    </div>
                                                    <div class="review-content">
                                                        <h3 class="title">Amazing Minimal theme</h3>
                                                        <p class="content">Cras neque nulla, convallis non commodo et, euismod nonsese. At vero eos et accusamus et iusto odio dignimos ducimus qui blanditiis praesentium voluptatum</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="add-review">
                                            <h3 class="title supper-title">ADD A REVIEW</h3>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                    <input type="text" class="input-info" placeholder="Your name">
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                    <input type="text" class="input-info" placeholder="Your email">
                                                </div>
                                            </div>
                                            <textarea rows="6"  class="input-info input-content" placeholder="Your review"></textarea>
                                            <div class="rating">
                                                <span class="text">Your rating</span>
                                                <ul class="list-star">
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="submit">SUBMIT</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 sidebar">
                <div class="equal-container widget-featrue-box">
                    <div class="row">
                        <div class="col-ts-12 col-xs-4 col-sm-12 col-md-12 col-lg-12 featrue-item">
                            <div class="featrue-box layout2 equal-elem">
                                <div class="block-icon"><a href="#"><span class="fa fa-truck"></span></a></div>
                                <div class="block-inner">
                                    <a href="#" class="title">Free Shipping & Return</a>
                                    <p class="des">Free shipping on all oders over $100</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-ts-12 col-xs-4 col-sm-12 col-md-12 col-lg-12 featrue-item">
                            <div class="featrue-box layout2 equal-elem">
                                <div class="block-icon"><a href="#"><span class="fa fa-retweet"></span></a></div>
                                <div class="block-inner">
                                    <a href="#"  class="title">Money back guarantee</a>
                                    <p class="des">100% money back guarantee</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-ts-12 col-xs-4 col-sm-12 col-md-12 col-lg-12 featrue-item">
                            <div class="featrue-box layout2 equal-elem">
                                <div class="block-icon"><a href="#"><span class="fa fa-life-ring"></span></a></div>
                                <div class="block-inner">
                                    <a href="#"  class="title">Online support 24/7</a>
                                    <p class="des">Online support 24/7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget widget-banner row-banner">
                    <div class="banner banner-effect1">
                        <a href="#"><img src="/site/images/banner23.jpg" alt=""></a>
                    </div>
                </div>
                <div class="widget widget-recent-post">
                    <h5 class="widgettitle">Bestseller</h5>
                    <ul class="list-recent-posts">
                        @foreach($topProducts as $product)
                        <?php $product = $product->model(); ?>
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
        <div class="products-arrivals">
            <div class="section-head box-has-content">
                <h4 class="section-title">Related Products</h4>
            </div>
            <div class="section-content">
                <div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2}, "650":{"items":3}, "1024":{"items":4}, "1200":{"items":5}}'>

                    <?php $prod = $product; ?>
                    @foreach(\App\Classes\ShopManager::relatedProducts($prod) as $product)

                    <div class="product-item layout1">
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

                                @if($bestSellers->contains($product->id))
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
                                <a href="{{ route('product.detail', ['slug' => $product->slug]) }}" class="product-name">
                                    {{ $product->name }}
                                </a>
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

                                    <a href="javascript:void(0)" class="wishlist-button">
                                        <span class="icon"><i class="fa fa-heart-o" aria-hidden="true"></i></span>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach


                </div>
            </div>
        </div>
    </div>

    @include('site_includes.brands')
</div>
@endsection
