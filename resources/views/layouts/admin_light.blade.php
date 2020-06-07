
<!DOCTYPE html>

<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">

        <title> {{ env('ADMIN_TITLE') }} - @yield('title') </title>

        <meta name="description" content="Admin part of the ecommerce application">
        <meta name="author" content="tncedric">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <link rel="shortcut icon" href="/adminn/img/favicon.png">

        <link rel="dns-prefetch" href="//fonts.gstatic.com">

        <link rel="stylesheet" href="/adminn/css/bootstrap.min.css">

        <link rel="stylesheet" href="/adminn/css/main.css">

        <link rel="stylesheet" href="/adminn/css/themes.css">

        @yield('styles')

    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) -->
    <script src="/adminn/js/vendor/modernizr.min.js"></script>
</head>

    <body style="background: #fff; color: #08162b; font-size: 15px;">

        <div class="container-fluid m-t-20" >
            @yield('content')
        </div>


        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="/adminn/js/vendor/jquery.min.js"></script>
        <script src="/adminn/js/vendor/bootstrap.min.js"></script>
        <script src="/adminn/js/app.js"></script>
        @yield('scripts')
    </body>
</html>
