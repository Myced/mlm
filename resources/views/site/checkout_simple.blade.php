@extends('layouts.site')

@section('title')
    {{ __("Checkout - Simple") }}
@endsection

@section('style')
    <link rel="stylesheet" href="/site/css/flat/green.css">
    <link rel="stylesheet" href="/site/css/smart_wizard.min.css">
    <link rel="stylesheet" href="/site/css/smart_wizard_theme_arrows.min.css">
    <link rel="stylesheet" href="/site/css/smart_wizard_theme_dots.min.css">

@endsection

@section('content')
<!-- hidden but needed content -->
<input type="hidden" name="cookie" value="{{ $cookie }}" id="cookie">
<input type="hidden" name="token" value="{{ csrf_token() }}" id="token">

<div class="main-content shop-page checkout-page">
    <div class="container">
        <div class="breadcrumbs">
            <a href="#">Home</a> \ <span class="current">CHECKOUT</span>
            \ <span class="current">SIMPLE CHECKOUT</span>
        </div>


        <form class="" action="{{ route('checkout.simple.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">

                    <!-- SmartWizard html -->
                    <div id="smartwizard">
                        <ul>

                            <li>
                                <a href="#step-1">Step 1<br>
                                    <small>Your Cart</small>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2">Step 2<br>
                                    <small>Payment Method</small>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3">Step 3<br>
                                    <small>Order Confirmation</small>
                                </a>
                            </li>
                        </ul>

                        <div>

                            <div id="step-1" class="">

                                <div class="row">
                                    <div class="col-md-12">

                                        <!-- account iformation -->
                                        <div class="checkout-form content-form">
                                            <h4 class="main-title">Your Cart</h4>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped">
                                                            <tr>
                                                                <th>S/N</th>
                                                                <th>Image</th>
                                                                <th>Product</th>
                                                                <th>Unit Cost</th>
                                                                <th>Quantity</th>
                                                                <th>Total</th>
                                                            </tr>

                                                            @if(Cart::count() == 0)
                                                            <tr>
                                                                <th class="text-center" colspan="7">
                                                                    <strong class="text-primary">
                                                                        Your cart is empty
                                                                    </strong>
                                                                </th>
                                                            </tr>
                                                            @else
                                                            <?php
                                                            $count = 1;
                                                             ?>
                                                                @foreach(Cart::content() as $item)
                                                                    <tr >
                                                                        <td class="middle"> {{ $count++ }} </td>
                                                                        <td>
                                                                            <img src="{{ $item->model->thumbnail }}" alt="Image"
                                                                            width="100px" height="100px">
                                                                        </td>
                                                                        <td class="middle"> {{ $item->name }} </td>
                                                                        <td class="middle"> {{ number_format($item->price )}} </td>
                                                                        <td class="middle"> {{ $item->qty }} </td>
                                                                        <td class="middle"> {{ $item->total }} FCFA</td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <th colspan="5"  class="f-16 text-center">Total</th>
                                                                    <th class="f-20"> {{ Cart::total() }} FCFA</th>
                                                                </tr>
                                                            @endif

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- end account iformatio -->

                                    </div>
                                </div>

                            </div>

                            <!-- //div step 5 -->
                            <div id="step-2" class="">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="checkout-form content-form">
                                            <h4 class="main-title">CHOOSE A PAYMENT METHOD</h4>

                                            <div class="col-xs-12 col-md-4 col-lg-5">
                                                <div class="m-l-20">

                                                    @foreach(\App\PaymentMethods::all() as $method)
                                                    <div class="form-group">
                                                        <input type="radio" name="payment_method" id="{{ $method }}"
                                                        class="flat-red momo_class" value="{{ $method }}"  >
                                                        <label for="{{ $method }}" class="control-label my-label">
                                                            {{ \App\PaymentMethods::format($method) }}
                                                        </label>
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                </div>
                            </div>

                            <!-- STEP 6 -->
                            <div id="step-3" class="">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="checkout-form content-form">
                                            <h4 class="main-title">ALL DONE</h4>

                                            <div class="col-xs-12 col-md-4 col-lg-5">
                                                <div class="m-l-20">

                                                    <p>
                                                        <strong>Click below to place order.</strong>
                                                    </p>

                                                    <div class="group-button">

                                                        <input type="submit" name="submit" value="PLACE ORDER"
                                                            class="button submit submit-btn">
                        							</div>

                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- END OF STEP 6 -->

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
<script src="/site/js/checkout_simple.js"></script>

@endsection
