<div class="header-nav-inner">
    <div class="box-header-nav">
        <div class=" container-wapper text-center ">
            <a class="menu-bar mobile-navigation" href="#">
                <span class="icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <span class="text">Main Menu</span>
            </a>
            <a href="#" class="header-top-menu-mobile">
                <span class="fa fa-cog" aria-hidden="true"></span>
            </a>
            <ul id="menu-main-menu" class=" main-menu clone-main-menu ovic-clone-mobile-menu box-has-content">
                <li class="menu-item">
                    <a href="/" class="kt-item-title ovic-menu-item-title" title="Home">HOME</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('products') }}" class="kt-item-title ovic-menu-item-title" title="Demos">
                        Products
                    </a>

                </li>
                <li class="menu-item menu-item-has-children">
                    <a href="#" class="kt-item-title ovic-menu-item-title" title="Megamenu">Menu </a>
                    <div class="sub-menu mega-menu mega-menu1">
                        <div class="row">
                            <div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                <h5 class="title widgettitle">Laptop & Tablet</h5>
                                <ul>
                                    <li><a href="#">Laptops, Desktops & Monitors</a></li>
                                    <li><a href="#">Printers & Ink</a></li>
                                    <li><a href="#">Computer Accessories</a></li>
                                    <li><a href="#">Software</a></li>
                                    <li><a href="#">Macbook</a></li>
                                    <li><a href="#">Macbook Air</a></li>
                                    <li><a href="#">Laptop Pro</a></li>
                                </ul>
                            </div>
                            <div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                <h5 class="title widgettitle">TV & Audio</h5>
                                <ul>
                                    <li><a href="#">Mouse</a></li>
                                    <li><a href="#">Printer and Accessories</a></li>
                                    <li><a href="#">Network Equipment</a></li>
                                    <li><a href="#">Computer Components</a></li>
                                    <li><a href="#">Memory Stick</a></li>
                                    <li><a href="#">Selfie Stick</a></li>
                                    <li><a href="#">Binoculars</a></li>
                                </ul>
                            </div>
                            <div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                <h5 class="title widgettitle">Smartphone</h5>
                                <ul>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Phone Batteries</a></li>
                                    <li><a href="#">Phone Charger</a></li>
                                    <li><a href="#">Phone Screen</a></li>
                                    <li><a href="#">Head Set</a></li>
                                    <li><a href="#">Software</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
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
                        </div>
                    </div>
                </li>



                <li class="menu-item menu-item-has-children">
                    <a href="javascript:void(0)"
                        class="kt-item-title ovic-menu-item-title" title="Blog">
                        ABOUT US
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('about-us') }}"
                                class="kt-item-title ovic-menu-item-title" title="Sub Menu">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"
                            class="kt-item-title ovic-menu-item-title" title="Contact Us">
                                Contact Us
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="">
                    <a href="{{ route('blog') }}"
                    class="kt-item-title ovic-menu-item-title" title="Blog">
                    Blog
                </a>
                @auth()
                <li class="menu-item menu-item-has-children">
                    <a href="javascript:void(0)"
                        class="kt-item-title ovic-menu-item-title" title="Blog">
                        My Account
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('cart') }}">Cart</a></li>
                        <li><a href="{{ route('user.orders') }}">Orders</a></li>
                        <li>
                            <form class="" action="{{ route('logout') }}"
                             method="post" id="logout">
                                @csrf
                            </form>
                            <a href="javascript:void(0)"
                            onclick="event.preventDefault();
                                          document.getElementById('logout').submit();">
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
                @else
                <li class="">
                    <a href="{{ route('login') }}"
                    class="kt-item-title ovic-menu-item-title" title="Login">
                    Login
                </a>

                </li>
                @endauth
            </ul>
        </div>
    </div>
</div>
