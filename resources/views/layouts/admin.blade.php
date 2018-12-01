@include('admin_includes.head')
    <!-- Stylesheets -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    @include('admin_includes.styles')
    @yield('styles')

    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) -->
    <script src="/adminn/js/vendor/modernizr.min.js"></script>
</head>

    <body>

        <div id="page-wrapper" class="page-loading">

            <div class="preloader themed-background page-loading">
                <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie10"></div>
                </div>
            </div>
            <!-- END Preloader -->


            <div id="page-container" class="header-fixed-top sidebar-partial sidebar-visible-lg sidebar-no-animations footer-fixed">
                <!-- Alternative Sidebar -->

                @include('admin_includes.right_sidebar')

                <!-- END Alternative Sidebar -->

                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        @include('admin_includes.navigation')
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">

                    @include('admin_includes.topnav')
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">

                        @yield('content')
                        <!-- END Dummy Content -->
                    </div>
                    <!-- END Page Content -->

                    <!-- Footer -->
                    @include('admin_includes.footer')
                    <!-- END Footer -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Scroll to top link, initialized in /adminn/js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
        @include('admin_includes.usermodal')
        <!-- END User Settings -->

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        @include('admin_includes.scripts')
        @yield('scripts')
    </body>
</html>
