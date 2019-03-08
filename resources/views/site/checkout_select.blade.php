@extends('layouts.site')

@section('title')
    {{ __("Checkout") }}
@endsection

@section('content')

<div class="main-content shop-page checkout-page">
    <div class="container">
        <div class="breadcrumbs">
            <a href="#">Home</a> \ <span class="current">CHECKOUT</span>
            \ <span class="current">SELECT OPTION</span>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="checkout-form content-form">
                    <h4 class="main-title">CHOOSE ONE</h4>

                    <div class="col-xs-12 col-md-4 col-lg-5">
                        <div class="m-l-20">

                            <p>
                                <strong>Choose an option below to checkout.</strong>
                            </p>

                            <div class="group-button">

                                <a href="{{ route('checkout.user.register') }}"
                                    class="button submit submit-btn m-t-10">
                                    Register New User
                                </a>

                                <a href="{{ route('checkout.simple.create') }}"
                                    class="button submit submit-btn m-t-10">
                                    Simple Checkout
                                </a>
                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>

    @include('site_includes.brands')
</div>
@endsection
