@extends('layouts.site')

@section('title')
    {{ __("Checkout Confirmation") }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="text-center animated slideInUp">
                <img src="/site/images/check.png" alt="" width="200px" height="200px">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="text-center animated zoomIn">
                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <strong class="text-black">
                                Action was successful
                                <br>
                                Please go to your account and confirm your order.
                            </strong>
                        </h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="checkout-form content-form">

                            <div class="text-center">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="text-center">

                                        <div class="group-button">
                                            <a href="{{ route('user.orders') }}"
                                            class="button submit submit-btn m-t-10"
                                            title="Your orders">
                                                My Orders
                                            </a>

                                            <a href="{{ route('products') }}"
                                                class="button submit submit-btn m-t-10"
                                                title="Our Products">
                                                Products
                                            </a>

                                            <a href="/"
                                                class="button submit submit-btn m-t-10"
                                                title="HomePage">
                                                Home
                                            </a>

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
@endsection
