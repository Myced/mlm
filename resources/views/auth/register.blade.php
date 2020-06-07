@extends('layouts.site')

@section('title')
    {{ __("User Registration") }}
@endsection

@section('style')
    <link rel="stylesheet" href="/site/css/flat/green.css">
    <link rel="stylesheet" href="/site/css/smart_wizard.min.css">
    <link rel="stylesheet" href="/site/css/smart_wizard_theme_dots.min.css">
    <style media="screen">

    .callout {
        border-radius: 3px;
        margin: 0 0 20px 0;
        padding: 15px 30px 15px 15px;
        border-left: 5px solid #eee;
    }

    .callout.callout-info {
        border-color: #0097bc;
    }

    .bg-aqua,
    .callout.callout-info,
    .alert-info,
    .label-info,
    .modal-info
    .modal-body {
        background-color: #00c0ef !important;
        color: #fff;
    }

    .f-w-600
    {
        font-weight: 600;
    }
    </style>
@endsection

@section('content')
<input type="hidden" id="token" value="{{ csrf_token() }}">
<input type="hidden" id="cookie" value="{{ $cookie }}">

<div class="main-content shop-page checkout-page">
    <div class="container">
        <div class="breadcrumbs">
            <a href="#">Home</a> \ <span class="current">CHECKOUT</span>
            \ <span class="current">REGISTER NEW USER</span>
        </div>


        <form class="" action="{{ route('user.register') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">

                    <!-- SmartWizard html -->
                    <div id="smartwizard">
                        <ul>
                            <li>
                                <a href="#step-1">Step 1 <br>
                                    <small>Referrral Information</small>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2">Step 2<br>
                                    <small>User Information</small>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3">Step 3<br>
                                    <small>User Account Info</small>
                                </a>
                            </li>
                            <li>
                                <a href="#step-4">Step 4<br>
                                    <small>Registration Confirmation</small>
                                </a>
                            </li>
                        </ul>

                        <div>
                            <div id="step-1" class="">
                                <h3 class="border-bottom border-gray pb-2 page-header">Referall Information</h3>

                                <div class="row">

                                    <div class="col-md-12">
                                        <h3>Were you reffered by someone ?</h3>

                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="row">

                                                    <div class="col-xs-12 col-md-4 col-lg-5">
                                                        <div class="m-l-20">
                                                            <div class="form-group">
                                                                <input type="radio" name="referred" id="referYes"
                                                                class="flat-red ref_radio" value="yes"
                                                                checked>
                                                                <label for="referYes" class="control-label my-label">
                                                                    Yes
                                                                </label>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="radio" name="referred" id="referNo"
                                                                class="flat-red ref_radio" value="no">
                                                                <label for="referNo" class="control-label my-label">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-8 col-lg-7">
                                                        <div class="show" id="refInfo">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="ref_id"
                                                                        value=""
                                                                        class="form-control "
                                                                        placeholder="Referrer id or email" id="ref_id">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <input type="text" name="ref_name"
                                                                        value=""
                                                                        id="ref_name" class="form-control"
                                                                        placeholder="Referrer Full Name (Automatically filled)" disabled>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <button type="button" class="btn btn-info btn-flat"
                                                                            name="button" id="verifyRefBtn">
                                                                            <strong>Verfiy Referrer</strong>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-2" class="">
                                <div class="row" id="info">
                                    <div class="col-md-12">
                                        <div class="checkout-form content-form">
                                            <h4 class="main-title">User Information</h4>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
                                                    <span class="label-text">First Name <span>*</span></span>
                                                    <input type="text" class="input-info"
                                                    name="first_name" id="fname" required>
                                                    <span class="help-block"></span>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <span class="label-text">Last Name <span>*</span></span>
                                                    <input type="text" class="input-info"
                                                        name="last_name" id="lname" required>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <span class="label-text">Region <span>*</span></span>
                                                    <select class="input-info" name="region">
                                                        @foreach(\App\Models\Region::all() as $region)
                                                        <option value="{{ $region->id }}">
                                                            {{ $region->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <span class="label-text">Address <span>*</span></span>
                                                    <input type="text" class="input-info" name="address"
                                                        id="address" required>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <span class="label-text">Email Address <span>*</span></span>
                                                    <input type="text" class="input-info" id="email"
                                                        name="email" required>
                                                    <span class="help-block">Note that you will not be able to change this later!</span>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <span class="label-text">Phone Number <span>*</span></span>
                                                    <input type="text" class="input-info" id="tel" name="tel"
                                                        required>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end of user info -->
                                    </div>

                                    <!-- start of payout settings. -->
                                    <div class="col-md-12 m-t-40">
                                        <div class="checkout-form content-form">
                                            <h4 class="main-title">Payout Settings.</h4>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="callout callout-info">
                                                        <strong>Note:</strong>
                                                        This is the number that will be used for your commission payouts.
                                                        <br>
                                                        Payments are made only through Orange Money for Orange numbers
                                                        and MTN Mobile Money for MTN numbers.
                                                        <br>
                                                        <strong>
                                                            If your telephone number has MTN Mobile Money or
                                                            Orange Money, then you can re-enter it here.
                                                            Else look for a number that has one an enter it here.
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <h4>
                                                                <strong>
                                                                    Select Network
                                                                </strong>
                                                            </h4>
                                                        </div>

                                                        <div class="col-xs-6">
                                                            <div class="m-l-20">
                                                                <div class="form-group">
                                                                    <input type="radio" name="payout_network" id="orange"
                                                                    class="flat-red net_radio" value="orange"
                                                                    checked>
                                                                    <label for="orange" class="control-label my-label">
                                                                        Orange
                                                                    </label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <input type="radio" name="payout_network" id="mtn"
                                                                    class="flat-red net_radio" value="mtn">
                                                                    <label for="mtn" class="control-label my-label">
                                                                        MTN
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <span class="label-text">
                                                        Payout Number <span>*</span>
                                                    </span>
                                                    <input type="text" class="input-info"
                                                        name="payout_number" id="number" required
                                                        placeholder="E.g. 678 678 234">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>




                                        </div>
                                        <!-- end of user info -->
                                    </div>
                                    <!-- end of payout settings. -->

                                </div>
                            </div>
                            <div id="step-3" class="">
                                <div class="row">
                                    <div class="col-md-12">

                                        <!-- account iformation -->
                                        <div class="checkout-form content-form">
                                            <h4 class="main-title">User Account Information</h4>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <span class="label-text">Email <span>*</span></span>
                                                    <input type="text" class="input-info" disabled name="email_account"
                                                        id="userEmail">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <span class="label-text">Password <span>*</span></span>
                                                    <input type="password" class="input-info" name="password" id="password">
                                                    <span class="help-block"></span>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <span class="label-text">Repeat Password <span>*</span></span>
                                                    <input type="password" class="input-info" name="password_confirmation" id="rpassword" >
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- end account iformatio -->
                                    </div>
                                </div>
                            </div>
                            <div id="step-4" class="">

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="checkout-form content-form">
                                            <h4 class="main-title">ALL DONE</h4>

                                            <div class="col-xs-12 col-md-4 col-lg-5">
                                                <div class="m-l-20">

                                                    <p>
                                                        <strong>Click below to complete your registration and place order.</strong>
                                                    </p>

                                                    <div class="group-button">

                                                        <input type="submit" name="submit" value="CONFIRM Registration"
                                                            class="button submit submit-btn">
                        							</div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

    @include('site_includes.brands')
</div>
@endsection

@section('scripts')
<script src="/site/js/icheck.min.js"></script>
<script src="/site/js/jquery.smartWizard.min.js"></script>
<script src="/site/js/registration.js"></script>
@endsection
