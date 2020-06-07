<nav class="navbar topnavbar">
  <!-- START navbar header-->
  <div class="navbar-header">
    <a class="navbar-brand" href="{{ route('user.dashboard') }}">
      <div class="brand-logo">
        <img class="img-fluid" src="/userfiles/img/gen_logo.png" alt="App Logo">
      </div>
      <div class="brand-logo-collapsed">
        <img class="img-fluid" src="/userfiles/img/GEN_Tree.png" alt="App Logo">
      </div>
    </a>
  </div>
  <!-- END navbar header-->
  <!-- START Left navbar-->
  <ul class="navbar-nav mr-auto flex-row">
    <li class="nav-item">
      <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
      <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed">
        <em class="fas fa-bars"></em>
      </a>
      <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
      <a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true">
        <em class="fas fa-bars"></em>
      </a>
    </li>
    <!-- START User avatar toggle-->
    <li class="nav-item d-none d-md-block">
      <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
      <a class="nav-link" id="user-block-toggle" href="#user-block" data-toggle="collapse">
        <em class="icon-user"></em>
      </a>
    </li>
    <!-- END User avatar toggle-->

  </ul>
  <!-- END Left navbar-->
  <!-- START Right Navbar-->
  <ul class="navbar-nav flex-row">


    <!-- START Alert menu-->
    <li class="nav-item dropdown dropdown-list">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"
        href="#" data-toggle="dropdown">
        <em class="icon-bell"></em>

        <?php
        $notifications = auth()->user()->unreadNotifications;
         ?>

        @if( $notifications->count() > 0)
            <span class="badge badge-danger">{{ $notifications->count() }}</span>
        @endif
      </a>
      <!-- START Dropdown menu-->
      <div class="dropdown-menu dropdown-menu-right animated flipInX">
        <div class="dropdown-item">
          <!-- START list group-->
          <div class="list-group">
            <!-- list item-->

            @foreach($notifications as $notification)
            <?php
            $data = $notification->data;

             ?>
            <div class="list-group-item list-group-item-action">
              <div class="media">
                <div class="align-self-start mr-2">
                  <em class="{{ $data['icon'] }} fa-2x text-{{ $data['class'] }}"></em>
                </div>
                <div class="media-body">
                  <p class="m-0">{{ $data['heading'] }}</p>
                  <p class="m-0 text-muted text-sm">{!! $data['title'] !!}</p>
                </div>
              </div>
            </div>
            @endforeach


            <!-- last list item-->

              <a href="{{ route('user.notifications') }}"
                title="View all notifications">
                    <div class="list-group-item list-group-item-action">
                          <span class="d-flex align-items-center">
                              <span class="text-sm">All notifications</span>
                              <span class="badge badge-danger ml-auto">
                                  <i class="fa fa-arrow-right"></i>
                              </span>
                          </span>
                      </div>
              </a>

          </div>
          <!-- END list group-->
        </div>
      </div>
      <!-- END Dropdown menu-->
    </li>
    <!-- END Alert menu-->
    <!-- START Offsidebar button-->
    <li class="nav-item">
        <div class="" style="width: 40px;">
            <!-- /empty space -->
        </div>
    </li>
    <!-- END Offsidebar menu-->
  </ul>
  <!-- END Right Navbar-->
</nav>
