@extends("layouts.user")

@section("title")
    Pay For order
@endsection

@section('content')

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
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <div class=" text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="page-header">Select Your Method of Payment</h3>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <a href="{{ route(\App\PaymentMethods::MTN_MOMO, ['code' => $order->order_code]) }}"
                                    class="btn  btn-flat btn-mtn  f-16">
                                    <img src="/userfiles/img/momo_image.jpg" alt=""
                                        width="100%" height="100%">
                                    <br>
                                    <strong>MTN Mobile Money</strong>
                                </a>

                                <br><br>

                                <a href="{{ route(\App\PaymentMethods::ORANGE_MONEY, ['code' => $order->order_code]) }}"
                                    class="btn  btn-flat btn-orange f-16">
                                    <img src="/userfiles/img/orange_money.jpg" alt=""
                                        width="100%" height="100%">
                                    <br>
                                    <strong>Orange Money</strong>
                                </a>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-xs-6 offset-md-3">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
