<nav class="sidebar" data-sidebar-anyclick-close="">
  <!-- START sidebar nav-->
  <ul class="sidebar-nav">
    <!-- START user info-->
    <li class="has-user-block">
      <div class="collapsee show" id="user-block">
        <div class="item user-block">
          <!-- User picture-->
          <div class="user-block-picture">
            <div class="user-block-status">
              <img class="img-thumbnail rounded-circle"
              src="{{ auth()->user()->userData->avatar }}"
              alt="Avatar" width="60" height="60">
              <div class="circle bg-success circle-lg"></div>
            </div>
          </div>
          <!-- Name and Job-->
          <div class="user-block-info">
            <span class="user-block-name">{{ auth()->user()->name }}</span>
            <span class="user-block-role">{{ auth()->user()->email }}</span>
          </div>
        </div>
      </div>
    </li>
    <!-- END user info-->
    <!-- Iterates over all sidebar items-->
    <li class="nav-heading ">
      <span data-localize="sidebar.heading.HEADER">Main WEBSITE</span>
    </li>

    <li class="">
      <a href="{{ route('home') }}" title="To Website">
        <em class="fa fa-home"></em>
        <span >To Home</span>
      </a>
    </li>

    <li class="">
      <a href="{{ route('products') }}" title="To Website">
        <em class="fa fa-cubes"></em>
        <span >To Products</span>
      </a>
    </li>

    <li class="nav-heading ">
      <span >DASHBOARD</span>
    </li>

    <li class="{{ Request::is('user') ? 'active' : '' }}">
      <a href="{{ route('user.dashboard') }}" title="Dashboard">
        <em class="icon-speedometer"></em>
        <span >Dashboard</span>
      </a>
    </li>

    <li class="nav-heading ">
      <span data-localize="sidebar.heading.HEADER">NAVIGATION</span>
    </li>

    <li class=" ">
      <a href="#geneology" title="Dashboard" data-toggle="collapse">
        <div class="float-right ">
            <i class="icon-arrow-down"></i>
        </div>
        <em class="icon-people"></em>
        <span data-localize="sidebar.nav.DASHBOARD">Geneology</span>
      </a>
      <ul class="sidebar-nav sidebar-subnav collapse" id="geneology">
        <li class="sidebar-subnav-header">Geneology</li>
        <li class="{{ Request::is('user/geneology/tree') ? 'active' : '' }} ">
          <a href="{{ route('user.geneology') }}" title="Geneology Tree">
            <span>Tree</span>
          </a>
        </li>
        <li class="{{ Request::is('user/geneology/tabular') ? 'active' : '' }}">
          <a href="{{ route('user.geneology.tabular') }}" title="Tabular Genology">
            <span>Tabular</span>
          </a>
        </li>

        <li class="{{ Request::is('user/geneology/statistics') ? 'active' : '' }}">
          <a href="{{ route('user.geneology.statistics') }}" title="Tabular Genology">
            <span>Statistics</span>
          </a>
        </li>

      </ul>
    </li>

    <li class="{{ Request::is('user/orders') || Request::is('user/order/*') ? 'active' : '' }}">
      <a href="{{ route('user.orders') }}" title="My Orders">
        <em class=" icon-present"></em>
        <span>My Orders</span>
      </a>
    </li>

    <li class="{{ Request::is('user/commissions') ? 'active' : '' }}">
      <a href="{{ route('user.commissions') }}" title="My Commissions">
        <em class=" icon-wallet"></em>
        <span>Commissions</span>
      </a>
    </li>

    <li class="nav-heading ">
      <span >Account Information</span>
    </li>
    <li class="{{ Request::is('user/profile') ? 'active' : '' }}">
      <a href="{{ route('user.profile') }}" title="My Profile" >
        <em class="icon-user"></em>
        <span data-localize="sidebar.nav.element.ELEMENTS">My Profile</span>
      </a>

    </li>
    <li class="{{ Request::is('user/password/change') ? 'active' : '' }}">
      <a href="{{ route('user.password.change') }}"  title="Change Password" >
        <em class="icon-lock"></em>
        <span >Change Password</span>
      </a>

    </li>

    <li class=" ">
        <form class="" action="{{ route('logout') }}"
            method="post" style="display: none;"
            id="logout">
            @csrf

        </form>
      <a href="{{ route('logout') }}"  title="Logout"
      onclick="event.preventDefault();
                    document.getElementById('logout').submit();" >
        <em class="icon-power"></em>

        <span >Logout</span>
      </a>

    </li>

  </ul>
  <!-- END sidebar nav-->
</nav>
