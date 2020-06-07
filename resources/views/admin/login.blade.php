<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">

        <title>Admin Login</title>

        <meta name="description" content="Admin Panel for Green Tree MLM">
        <meta name="author" content="T N CEDRIC">
        <meta name="robots" content="noindex, nofollow">
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
        <!-- Login Full Background -->
        <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
        <img src="/adminn/img/placeholders/backgrounds/login_full_bg.jpg" alt="Login Full Background" class="full-bg animation-pulseSlow">
        <!-- END Login Full Background -->

        <!-- Login Container -->
        <div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center">
                <h1>
                    <strong>{{ config('app.name', 'Glothelo') }}</strong>
                    <br>
                    <small>Please <strong>Login</strong> </small>
                </h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block push-bit">
                <!-- Login Form -->
                <form action="{{ route('admin.login.store') }}" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">

                    @csrf
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group {{ !is_null(session('error')) ? 'has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="gi gi-envelope"></i>
                                </span>
                                <input type="text" id="login-email" name="email" required
                                    class="form-control input-lg" placeholder="Email"
                                    value="{{ old('email') }}">

                                @if(session('error'))
                                <div id="login-email-error" class="help-block animation-slideDown">
                                    <strong>{{ session('error') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="gi gi-asterisk"></i>
                                </span>
                                <input type="password" id="login-password" name="password"
                                    class="form-control input-lg" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-4">
                            <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                                <input type="checkbox" id="login-remember-me" name="remember">
                                <span></span>
                            </label>
                        </div>
                        <div class="col-xs-8 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login to Dashboard</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <a href="javascript:void(0)" id="link-reminder-login"><small>Forgot password?</small></a>
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->

                <!-- Reminder Form -->
                <form action="{{ route('password.email') }}" method="post" id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none">
                    @csrf
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="gi gi-envelope"></i>
                                </span>
                                <input type="text" id="reminder-email" name="email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Reset Password</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <small>Did you remember your password?</small> <a href="javascript:void(0)" id="link-reminder"><small>Login</small></a>
                        </div>
                    </div>
                </form>
                <!-- END Reminder Form -->

            </div>
            <!-- END Login Block -->
        </div>
        <!-- END Login Container -->


        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="/adminn/js/vendor/jquery.min.js"></script>
        <script src="/adminn/js/vendor/bootstrap.min.js"></script>
        <script src="/adminn/js/plugins.js"></script>
        <script src="/adminn/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="/adminn/js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
    </body>
</html>
