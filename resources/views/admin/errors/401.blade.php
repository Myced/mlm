
<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>{{ config('app.name') }} - 401 Error</title>

        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">


        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="/adminn/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="/adminn/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="/adminn/css/main.css">

        <!-- Include a specific file here from /adminn/css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="/adminn/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="/adminn/js/vendor/modernizr.min.js"></script>
    </head>
    <body>
        <!-- Error Container -->
        <div id="error-container">
            <div class="error-options">
                <h3>
                    <i class="fa fa-chevron-circle-left text-muted"></i>
                    <a href="{{ url()->previous() }}">Go Back</a>
                </h3>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h1 class="animation-fadeIn">
                        <i class="fa fa-times-circle-o text-muted"></i>
                        401
                    </h1>

                    <h2 class="h3 animation-slideExpandUp">
                        Oops, we are sorry but you are not
                        authorized to access this page..
                    </h2>
                </div>
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 animation-slideRight">
                    <div class="text-center">
                        <a href="/" class="btn btn-primary btn-lg">
                            <i class="fa fa-home"></i>
                            Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Error Container -->
    </body>
</html>
