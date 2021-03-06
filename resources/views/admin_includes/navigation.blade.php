<div class="sidebar-content">
    <!-- Brand -->
    <a href="{{ route('dashboard') }}" class="sidebar-brand">
        <i class="gi gi-flash"></i>
        <span class="sidebar-nav-mini-hide">
            <strong>{{ config('app.name', 'MLM') }}</strong>

        </span>
    </a>
    <!-- END Brand -->

    <!-- User Info -->
    <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
        <div class="sidebar-user-avatar">
            <a href="javascript:void(0)">
                <img src="/adminn/img/placeholders/avatars/avatar2.jpg" alt="avatar">
            </a>
        </div>
        <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
        <div class="sidebar-user-links">
            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
            <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
            <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>

            <form class="" action="{{ route('logout') }}"
                method="post" style="display: none;"
                id="logout">
                @csrf

            </form>

            <a href="{{ route('logout') }}"
                data-toggle="tooltip"
                data-placement="bottom" title="Logout"
                onclick="event.preventDefault();
                              document.getElementById('logout').submit();">
                <i class="gi gi-exit"></i>
            </a>
        </div>
    </div>
    <!-- END User Info -->


    <ul class="sidebar-section sidebar-themes clearfix sidebar-nav-mini-hide">


        <li>

        </li>

    </ul>


    <!-- Sidebar Navigation -->
    <ul class="sidebar-nav">
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-dashboard sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">Dashboard</span>
            </a>
        </li>



        <li class="sidebar-header">
            <span class="sidebar-header-options clearfix">
                <a href="javascript:void(0)" data-toggle="tooltip"
                    title="Create and Manage Categories and Brands">
                    <i class="gi gi-show_big_thumbnails sidebar-header-title"></i>
                </a>
            </span>
            <span class="sidebar-header-title">Categories/Brands</span>
        </li>

        <li class="{{ Request::is('categories') ? 'active' : '' }}">
            <a href="{{ route('categories') }}">
                <i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">Categories</span>
            </a>

        </li>

        <li>
            <a href="{{ route('brands') }}">
                <i class="gi gi-fire sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">Brands</span>
            </a>
        </li>

        <li >
            <a href="#" class="sidebar-nav-menu">
                <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                <i class="gi gi-edit sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">Manage </span>
            </a>

            <ul>
                <li>
                    <a href="{{ route('categories.manage') }}">
                        Manage Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('brands.manage') }}">
                        Manage Brands
                    </a>
                </li>
            </ul>
        </li>

        <li class="sidebar-header">
            <span class="sidebar-header-options clearfix">
                <a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings">
                    <i class="gi gi-settings"></i>
                </a>
                <a href="javascript:void(0)" data-toggle="tooltip"
                title="Create the most amazing pages with the widget kit!">
                <i class="gi gi-lightbulb"></i></a></span>
            <span class="sidebar-header-title">Products</span>
        </li>

        <li class="{{ Request::is('/admin/product/featured')
                        || Request::is('/admin/product/featured/*')  ? 'active' : '' }}">
            <a href="{{ route('product.create') }}">
                <i class="fa fa-plus sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">Add Product</span>
            </a>
        </li>

        <li>
            <a href="{{ route('products.featured') }}"
                class="{{ Request::is('/admin/product/featured')
                        || Request::is('/admin/product/featured/*')  ? 'active' : '' }}">
                <i class="gi gi-snowflake sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">Featured Products</span>
            </a>
        </li>

        <li>
            <a href="{{ route('products.promoted') }}">
                <i class="gi gi-gift sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">Promoted Products</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.products') }}">
                <i class="gi gi-tags sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">View Products</span>
            </a>
        </li>

        <li class="sidebar-header">
            <span class="sidebar-header-options clearfix">
                <a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings">
                    <i class="gi gi-settings"></i>
                </a>
                <a href="javascript:void(0)" data-toggle="tooltip"
                title="Create the most amazing pages with the widget kit!">
                <i class="gi gi-lightbulb"></i></a></span>
            <span class="sidebar-header-title">Orders</span>
        </li>

        <li>
            <a href="#" class="sidebar-nav-menu">
                <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                <i class="gi gi-shopping_cart sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">Orders</span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('orders.today') }}">Orders Today</a>
                </li>
                <li>
                    <a href="{{ route('orders.yesterday') }}">Orders Yesterday</a>
                </li>
                <li>
                    <a href="{{ route('orders.thisweek') }}">Orders This Week</a>
                </li>
                <li>
                    <a href="{{ route('orders.thismonth') }}">This Month</a>
                </li>
                <li>
                    <a href="{{ route('orders.filter.period') }}">Filter Period</a>
                </li>
                <li>
                    <a href="{{ route('orders') }}">All Orders</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-header">
            <span class="sidebar-header-options clearfix">
                <a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings">
                    <i class="gi gi-settings"></i>
                </a>
                <a href="javascript:void(0)" data-toggle="tooltip"
                title="Create the most amazing pages with the widget kit!">
                <i class="gi gi-lightbulb"></i></a></span>
            <span class="sidebar-header-title">Orders</span>
        </li>

        <li>
            <a href="#" class="sidebar-nav-menu">
                <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                <i class="fa fa-money sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">Payout</span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('payout.orange') }}">Orange Money</a>
                </li>
                <li>
                    <a href="{{ route('payout.mtn') }}">MTN Mobile Money</a>
                </li>
                <li>
                    <a href="{{ route('payout.failed') }}">Failed Payments</a>
                </li>

            </ul>
        </li>

        <li class="sidebar-header">
            <span class="sidebar-header-options clearfix">
                <a href="javascript:void(0)" data-toggle="tooltip"
                title="Quick Settings">
                    <i class="gi gi-users"></i>
                </a>
            </span>
            <span class="sidebar-header-title">CUSTOMERS</span>
        </li>

        <li>
            <a href="{{ route('distributor.create') }}">
                <i class="gi gi-user_add sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">Add Distributor</span>
            </a>
        </li>
        <li>
            <a href="{{ route('distributors') }}">
                <i class="fa fa-sitemap sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">Manage distributors</span>
            </a>
        </li>
        <li>
            <a href="{{ route('customers') }}">
                <i class="gi gi-group sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">All Customers</span>
            </a>
        </li>

        <li class="sidebar-header">
            <span class="sidebar-header-options clearfix">
                <a href="javascript:void(0)" data-toggle="tooltip"
                title="sITE Settings">
                    <i class="gi gi-users"></i>
                </a>
            </span>
            <span class="sidebar-header-title">SETTINGS</span>
        </li>

        <li>
            <a href="javascript:void(0)" class="sidebar-nav-menu">
                <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                <i class="fa fa-wrench sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">General Settings</span>
            </a>
            <ul>
                <li>
                    <a href="{{ route('settings.company') }}">Company Information</a>
                </li>
                <li>
                    <a href="{{ route('settings.geneology.depth') }}">Geneology Depth</a>
                </li>
                <li>
                    <a href="{{ route('settings.geneology.levels') }}">Geneology Levels</a>
                </li>
                <li>
                    <a href="{{ route('settings.membership.levels') }}">Membership Levels</a>
                </li>
                <li>
                    <a href="{{ route('settings.payout') }}">Payout Settings</a>
                </li>

            </ul>
        </li>


    </ul>
    <!-- END Sidebar Navigation -->

    <br><br><br>

    <!-- END Sidebar Notifications -->
</div>
