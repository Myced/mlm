
<div class="topbar layout1">
    <div class="container">
        <ul class="menu-topbar">
            <li class="language menu-item-has-children">
                @if(app()->getLocale() == 'en')
                <a href="javascript:void(0)" class="toggle-sub-menu">
                    <span class="flag">
                        <img src="/site/images/flag1.jpg" alt="">
                    </span>
                    English
                </a>
                <ul class="list-language sub-menu">
                    <li>
                        <a href="{{ route('locale.fr') }}">
                            <span class="flag">
                                <img src="/site/images/flag4.jpg" alt="">
                            </span>
                            Francias
                        </a>
                    </li>
                </ul>
                @else
                <a href="javascript:void(0)">
                    <span class="flag">
                        <img src="/site/images/flag4.jpg" alt="">
                    </span>
                    Francias
                </a>
                <ul class="list-language sub-menu">
                    <li>
                        <a href="{{ route('locale.en') }}">
                            <span class="flag">
                                <img src="/site/images/flag1.jpg" alt="">
                            </span>
                            English
                        </a>
                    </li>
                </ul>
                @endif
            </li>
            <!--
            <li class="currencies menu-item-has-children">
                <a href="#" class="toggle-sub-menu"><span class="text">DOLLAR</span>(USD)</a>
                <ul class="list-currencies sub-menu">
                    <li><a href="#"><span class="text">POUND </span>(GBP)</a></li>
                    <li><a href="#"><span class="text">EURRO </span>(EUR)</a></li>
                    <li><a href="#"><span class="text">DOLLAR </span>(USD)</a></li>
                </ul>
            </li> -->
        </ul>
        <ul class="list-socials">
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
        </ul>
        <ul class="menu-topbar top-links">
            @auth
            <li><a href="{{ route('user.dashboard') }}">My Account</a></li>
            @else
            <li><a href="{{ route('register') }}">Register</a></li>
            <li><a href="{{ route('login') }}">Sign in</a></li>
            @endauth
            <li><a href="{{ route('about-us') }}">About</a></li>
        </ul>
    </div>
</div>
