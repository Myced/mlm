<div class="header-nav-wapper ">
    <div class="container main-menu-wapper">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 left-content">
                <div class="vertical-wapper parent-content">
                    <div class="block-title show-content">
                        <span class="icon-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="text">Categories</span>
                    </div>
                    <div class="vertical-content hidden-content">
                        @include('site_includes.menu_categories')
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-5 col-sm-8 col-xs-8 col-ts-12 middle-content">
                <form class="" action="{{ route('products.search') }}" method="get">
                    <div class="search-form layout2 box-has-content">
                        <div class="search-block">
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
                            <div class="search-inner">
                                <input type="text" class="search-info"
                                    placeholder="Search  here..."
                                    name="keyword" required>
                            </div>
                            <button class="search-button" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 col-ts-12 right-content">
                <div class="hotline">
                    <div class="icon">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                        <span class="text">Call us now</span>
                        <span class="number">(+237) 6 73 90 19 39</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
