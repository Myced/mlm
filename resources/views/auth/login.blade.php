@extends('layouts.site')

@section('title')
    {{ __("Login") }}
@endsection

@section('content')

<div class="main-content shop-page login-page">
    <div class="container">
        <div class="breadcrumbs">
            <a href="/">Home</a> \ <span class="current"> Login </span>
        </div>

        <!-- //login form  -->
        <form class="" action="{{ route('login') }}" method="post">
            @csrf
            <div class="login-register-form content-form row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="login-form">
                        <h4 class="main-title">Login</h4>

                        <span class="label-text">
                            Email
                            <span class="required f-24">*</span>
                        </span>
                        <input type="text" class="input-info" name="email" required
                            placeholder="">

                        <span class="label-text">
                            Password
                            <span class="required f-24">*</span>
                        </span>
                        <input type="password" class="input-info"
                            name="password" placeholder="" required>
                        <div class="check-box">
                            <input type="checkbox" class="login-check"
                                id="login-check" name="remember" checked>
                            <label class="text-label" for="login-check">Remember me</label>

                            <a href="{{ route('password.request') }}" class="forgot">Fogot your password ?</a>
                        </div>
                        <div class="group-button">
                            <button type="submit" class="button submit submit-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- end login form -->

    </div>

    @include('site_includes.brands')
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    @if ($errors->has('email'))
        var message = "<strong>" + "{{ $errors->first('email') }}" + "</strong>";
        notify(message, 'error');
    @endif

    @if ($errors->has('password'))
        var message = "<strong>" + "{{ $errors->first('password') }}" + "</strong>";
        notify(message, 'error');
    @endif
</script>
@endsection
