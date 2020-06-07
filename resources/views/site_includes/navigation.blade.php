<div class="header-nav-inner">
    <div class="box-header-nav">
        <div class=" container-wapper text-center ">
            <a class="menu-bar mobile-navigation" href="#">
                <span class="icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <span class="text"> {{ __('navigation.main_menu') }} </span>
            </a>
            <a href="#" class="header-top-menu-mobile">
                <span class="fa fa-cog" aria-hidden="true"></span>
            </a>
            <ul id="menu-main-menu" class=" main-menu clone-main-menu ovic-clone-mobile-menu box-has-content">
                <li class="menu-item">
                    <a href="/" class="kt-item-title ovic-menu-item-title" title="Home">
                        {{ __('navigation.home') }}
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('products') }}" class="kt-item-title ovic-menu-item-title" title="Demos">
                        {{ __('navigation.products') }}
                    </a>

                </li>
                <li class="menu-item menu-item-has-children">
                    <a href="#" class="kt-item-title ovic-menu-item-title" title="Megamenu">
                        {{ __('navigation.menu') }}
                    </a>
                    <div class="sub-menu mega-menu mega-menu1">
                        @include('site_includes.mega_menu')
                    </div>
                </li>



                <li class="menu-item menu-item-has-children">
                    <a href="javascript:void(0)"
                        class="kt-item-title ovic-menu-item-title" title="Blog">
                        {{ __('navigation.about_us') }}
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('about-us') }}"
                                class="kt-item-title ovic-menu-item-title" title="Sub Menu">
                                {{ __('navigation.about_us') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"
                            class="kt-item-title ovic-menu-item-title" title="Contact Us">
                                {{ __('navigation.contact_us') }}
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="">
                    <a href="{{ route('blog') }}"
                    class="kt-item-title ovic-menu-item-title" title="Blog">
                    {{ __('navigation.blog') }}
                </a>
                @auth()
                <li class="menu-item menu-item-has-children">
                    <a href="javascript:void(0)"
                        class="kt-item-title ovic-menu-item-title" title="Blog">
                        {{ __('navigation.my_account') }}
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
