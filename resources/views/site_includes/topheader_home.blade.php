<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12  left-content">
                <div class="logo">
                    <a href="/">
                        <img src="/site/images/gen_logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-md-4 col-sm-6 col-xs-12 midle-content">
                <form class="" action="{{ route('products.search') }}" method="get">

                    <div class="search-form layout1 box-has-content">
                        <div class="search-block">
                            <div class="search-inner">
                                <input type="text" class="search-info" placeholder="Search..."
                                name="keyword" required>
                            </div>
                            <div class="search-choice parent-content">
                                <select data-placeholder="All Categories" class="chosen-select"
                                    name="category">
                                    <option value="-1">All categories</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="search-button">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 right-content">
                <ul class="header-control">
                    <li class="hotline">
                        <div class="icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <span class="text">Call us now</span>
                            <span class="number">(+237) 6 73 90 19 39</span>
                        </div>
                    </li>
                    <li class="box-minicart">
                        @include('site_includes.cart')
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
