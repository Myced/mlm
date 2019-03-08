
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Multi level marketing">
    <meta name="keywords" content="MLM, MultiLevel Marketing Cameroon, Glothelo">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <title>User Panel - @yield('title')</title>

    @include('user_includes.styles')

    @yield('styles')

    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="/userfiles/css/app.css" id="maincss">
    <link rel="stylesheet" href="/userfiles/css/styles.css">
  </head>

  <body>
    <div class="wrapper">
      <!-- top navbar-->
      <header class="topnavbar-wrapper">
        <!-- START Top Navbar-->
        @include('user_includes.topnav')
        <!-- END Top Navbar-->
      </header>
      <!-- sidebar-->
      <aside class="aside-container">
        <!-- START Sidebar (left)-->
        <div class="aside-inner">
          @include('user_includes.sidenav')
        </div>
        <!-- END Sidebar (left)-->
      </aside>
      <!-- offsidebar-->
      <aside class="offsidebar d-none">
        <!-- START Off Sidebar (right)-->
        @include('user_includes.rightbar')
        <!-- END Off Sidebar (right)-->
      </aside>
      <!-- Main section-->
      <section class="section-container">
        <!-- Page content-->
        <div class="content-wrapper">
          <div class="content-heading">
            <div>@yield('title')
              <small data-localize="dashboard.WELCOME"></small>
            </div>
          </div>

          <!-- page content  -->
          @yield('content')
          <!-- end page content  -->

        </div>
      </section>
      <!-- Page footer-->
      <footer class="footer-container">
        <span>&copy; <?php  echo date("Y")  ?> </span>
      </footer>
    </div>


    @include('user_includes.scripts')
    @yield('scripts')

    <script src="/userfiles/js/app.js"></script>
    @include('user_includes.notification')

</body>

</html>
