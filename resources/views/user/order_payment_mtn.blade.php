@extends("layouts.user")

@section("title")
    Pay For order
@endsection

@section('content')

<div class="preloader themed-background ">
    <div class="inner">
        <h3 class="text-light visible-lt-ie10">
            <strong class="loader-message">
                Processing...
            </strong>
        </h3>
        <div class="preloader-spinner hidden-lt-ie10"></div>
    </div>
</div>

<div class="row animated slideInRight m-b-20">
    <div class="col-md-12">
        <a href="{{ route('user.order.detail', ['code' => $order->order_code]) }}"
        class="mb-1 btn btn-outline-primary">
            <i class="fa fa-arrow-circle-left"></i>
            <strong>
                Back to Order
            </strong>
        </a>
    </div>
</div>

<div class="row animated slideInUp">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <div class=" text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="page-header text-black">
                                Order {{ $order->order_code }} Payment
                            </h3>
                        </div>
                    </div>

                    <br>
                    <div class="row animated slideInRight">
                        <div class="col-md-12">
                            <a href="{{ route('order.payment', ['code' => $order->order_code]) }}"
                                title="Change Payment method"
                                data-toggle="tooltip"
                                class="btn btn-info">
                                <i class="fa fa-exchange-alt"></i>
                                <strong>Change Payment Method</strong>
                            </a>
                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="text-center">

                                <img src="/userfiles/img/momo_image.jpg" alt=""
                                    width="100%" height="100%">

                            </div>
                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="text-center">

                                <span class="text-black f-20">
                                    Amount:
                                    <strong >
                                        {{ number_format($order->total) }} FCFA
                                    </strong>
                                </span>

                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="text-center">

                                <input type="hidden" name="" id="order"
                                    value="{{ $order->order_code }}">
                                <input type="hidden" name="" id="token"
                                    value="{{ csrf_token() }}">

                                <input type="text" name="tel" id="tel"
                                    value="{{ $order->user->userData->tel }}"
                                    class="form-control pay-input"
                                    placeholder="Enter Phone number">

                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="text-center">

                                <button type="button" name="button"
                                    id="pay"
                                    class="btn btn-info btn-flat f-20">
                                    <strong>Pay Order</strong>
                                </button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/userfiles/js/momo.js"></script>
@endsection
