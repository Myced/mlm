@extends('layouts.user')

@section('title')
    Order Detail @if(!is_null($order)) - {{ $order->order_code }} @endif
@endsection

@section('styles')
<link rel="stylesheet" href="/userfiles/vendor/sweetalert2/sweetalert2.min.css">
@endsection

@section('content')

<div class="row animated slideInRight m-b-20">
    <div class="col-md-12">
        <a href="{{ route('user.orders') }}"
        class="mb-1 btn btn-outline-primary">
            <i class="fa fa-arrow-circle-left"></i>
            <strong>
                Back to Orders
            </strong>
        </a>
    </div>
</div>

    @if(is_null($order))
    <div class="row m-t-10">
        <div class="col-md-12">

            <div class="card mb-3 border-danger">
                <div class="card-header text-white bg-danger">
                    <h4 class="">Error.</h4>
                </div>

                <div class="card-body">
                    <div class="text-danger">
                        <div class="row">
                            <div class=" col-xs-1 col-md-1">
                                <i class="fa fa-exclamation-triangle fa-4x"></i>
                            </div>

                            <div class="col-xs-10 col-md-10 m-t-10">
                                <strong class="f-18">
                                    Order does not exist or you do not have permission
                                    to view it.
                                </strong>
                            </div>
                        </div>
                    </div>

                    <div class="row m-t-10">
                        <div class="col-md-12">
                            <a href="{{ route('user.orders') }}"
                            class="btn btn-danger text-bold">
                                <i class="fa fa-arrow-left"></i>
                                Back to Orders
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    @elseif($order->user_id != auth()->user()->id)
    <div class="row m-t-10">
        <div class="col-md-12">

            <div class="card mb-3 border-danger">
                <div class="card-header text-white bg-danger">
                    <h4 class="">Error.</h4>
                </div>

                <div class="card-body">
                    <div class="text-danger">
                        <div class="row">
                            <div class=" col-xs-1 col-md-1">
                                <i class="fa fa-exclamation-triangle fa-4x"></i>
                            </div>

                            <div class="col-xs-10 col-md-10 m-t-10">
                                <strong class="f-18">
                                    Order does not exist or you do not have permission
                                    to view it.
                                </strong>
                            </div>
                        </div>
                    </div>

                    <div class="row m-t-10">
                        <div class="col-md-12">
                            <a href="{{ route('user.orders') }}"
                            class="btn btn-danger text-bold">
                                <i class="fa fa-arrow-left"></i>
                                Back to Orders
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    @else
        <!-- //order confirmation -->
        @if($order->status == \App\OrderStatus::PENDING)
        <div class="row animated shake">
            <div class="col-md-12">

                <div class="card mb-3 border-warning">
                    <div class="card-header text-white bg-warning">
                        <h4 class="">Confirm Your Order</h4>
                    </div>

                    <div class="card-body">
                        <div class="text-dark text-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong class="f-24 text-dark">
                                        Your order is still pending.
                                        <br>
                                        Please either confirm or cancel your order
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <a href="javascript:void(0)"
                                    class="btn btn-success" id="confirm">
                                        <i class="fa fa-check"></i>
                                        <strong>Confirm Order</strong>
                                    </a>

                                    <a href="javascript:void(0)"
                                    class="btn btn-danger" id="cancel">
                                        <i class="fa fa-times"></i>
                                        <strong>Cancel Order</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        @endif
        <!-- end of order confirmation -->

        <!-- order payment -->
        @if($order->payment_status == false
            && $order->status == \App\OrderStatus::CONFIRMED
            && $order->payment_method != \App\PaymentMethods::CASH_ON_DELIVERY)
        <div class="row animated slideInUp">
            <div class="col-md-12">

                <div class="card mb-3 border-info">
                    <div class="card-header text-white bg-info">
                        <h4 class="">Pay For Your Order</h4>
                    </div>

                    <div class="card-body">
                        <div class="text-dark text-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong class="f-24 text-dark">
                                        In order for your order to be processed,
                                        you have to pay for your order
                                    </strong>
                                </div>
                            </div>

                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <a href="{{ route('order.payment', ['code' => $order->order_code]) }}"
                                        class="btn btn-info">
                                        <strong>Pay for Order</strong>
                                        <i class="fa fa-arrow-right"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        @endif
        <!-- end of order payment -->

        <!-- order statistics -->
        <div class="row">
            <div class="col-xl-3 animated slideInUp">
            <!-- START card-->
                <div class="card border-0">
                    <div class="row row-flush">
                        <div class="col-4 bg-info text-center d-flex align-items-center justify-content-center rounded-left">
                            <em class="fa fa-cart-arrow-down fa-4x"></em>
                        </div>
                        <div class="col-8">
                            <div class="card-body text-center">
                                <h4 class="mt-0 text-dark text-bold">
                                    {{ $order->created_at->format("j M, Y") }}
                                </h4>
                                <p class="mb-0 text-bold text-gray-custom">Order Placed</p>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END card-->
            </div>

            <div class="col-xl-3 animated slideInUp">
            <!-- START card-->
                <div class="card border-0">
                    <div class="row row-flush">
                        <div class="col-4 bg-danger text-center d-flex align-items-center justify-content-center rounded-left">
                            <em class="fa fa-dollar-sign fa-4x"></em>
                        </div>
                        <div class="col-8">
                            <div class="card-body text-center">
                                <h4 class="mt-0 text-dark">{{ number_format($order->total) }} XAF</h4>
                                <p class="mb-0  text-bold text-gray-custom">Order Value</p>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END card-->
            </div>

            <div class="col-xl-3 animated slideInUp">
            <!-- START card-->
                <div class="card border-0">
                    <div class="row row-flush">
                        <div class="col-4 bg-inverse text-center d-flex align-items-center justify-content-center rounded-left">
                            <em class="fas fa-cubes fa-4x"></em>
                        </div>
                        <div class="col-8">
                            <div class="card-body text-center">
                                <h4 class="mt-0 text-black">{{ $order->item_number }}</h4>
                                <p class="mb-0 text-bold text-gray-custom"># of Items</p>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END card-->
            </div>

            <div class="col-xl-3 animated slideInUp">
            <!-- START card-->
                <div class="card border-0">
                    <div class="row row-flush">
                        <div class="col-4 bg-green text-center d-flex align-items-center justify-content-center rounded-left">
                            <em class="fa fa-inbox fa-4x"></em>
                        </div>
                        <div class="col-8">
                            <div class="card-body text-center">
                                <h4 class="mt-0 text-dark">
                                    <strong>
                                        {{ $order->status }}
                                    </strong>
                                </h4>
                                <p class="mb-0 text-bold text-gray-custom">Order Status</p>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END card-->
            </div>
        </div>
        <!-- end of order statitics -->
        <input type="hidden" name="" value="{{ $order->order_code }}"
            id="code">
        <!-- order content and data -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="card animated slideInUp">
                    <div class="card-body">
                        <h3 class="page-header">Order Details</h3>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Order Code: <strong>{{ $order->order_code }}</strong>
                                    </li>

                                    <li class="list-group-item">
                                        Client Name: <strong>{{ $order->user->name }}</strong>
                                    </li>

                                    <li class="list-group-item">
                                        Order Placed: <strong>{{ $order->created_at->format("j M, Y") }}</strong>
                                    </li>

                                    <li class="list-group-item">
                                        Number of Items: <strong>{{ $order->item_number }}</strong>
                                    </li>

                                    <li class="list-group-item">
                                        Order Total: <strong>{{ number_format($order->total) }} FCFA</strong>
                                    </li>

                                    <li class="list-group-item">
                                        Payment Method:
                                        <strong>{{ \App\PaymentMethods::format($order->payment_method) }}</strong>
                                    </li>

                                    <li class="list-group-item">
                                        Payment Status:
                                        @if($order->payment_status == true)
                                        <div class="badge badge-success">
                                            PAID
                                        </div>
                                        @else
                                        <div class="badge badge-danger">
                                            UNPAID
                                        </div>
                                        @endif
                                    </li>

                                    <li class="list-group-item">
                                        Order Status:
                                        <div class="badge badge-{{ \App\OrderStatus::getClass($order->status) }}">
                                            {{ $order->status }}
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        Delivered On:
                                        @if($order->delivered_at == null)
                                        <strong class="text-danger">NOT DELIVERED</strong>
                                        @else
                                        <strong>
                                            {{ $order->delivered_at->format("j M, Y") }}
                                        </strong>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card animated slideInUp">
                    <div class="card-body">
                        <h3 class="page-header">Order Content</h3>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive table-bordered">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>

                                        <?php $count = 1; ?>
                                        @foreach($order->content as $content)
                                        <tr>
                                            <td> {{ $count++ }} </td>
                                            <td> {{ $content->name }} </td>
                                            <td> {{ $content->quantity }} </td>
                                            <td> {{ number_format($content->price) }} </td>
                                            <td> {{ number_format($content->price * $content->quantity) }} FCFA </td>
                                        </tr>
                                        @endforeach

                                        <tr>
                                            <th class="text-center f-18" colspan="4">Total</th>
                                            <th class="f-18"> {{ number_format($order->total) }} FCFA </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end data content and data -->
    @endif
@endsection

@section('scripts')
    <script src="/userfiles/vendor/sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript">
    var $cancel = $('#cancel');
    var $confirm = $("#confirm");

    var code = $("#code").val();

    var confirmedUrl = "/user/order/" + code + "/confirm";
    var cancelUrl = "/user/order/" + code + "/cancel";

    $confirm.click(function(){
        Swal.fire({
            title: 'Confirm your order ?',
            text: "You won't be able to revert this!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, confirm it!'
            })
            .then(function(result) {
                if (result.value) {
                    Swal.fire(
                      'Confirmed!',
                      'Your order has been confirmed',
                      'success'
                  )
                  .then(function(){
                      //then redirect to a url
                      window.location.href= confirmedUrl;
                  });


                }
            })
    });

    $cancel.click(function(){
        Swal.fire({
            title: 'Cancel your order ?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, cancel it!'
            })
            .then(function(result) {
                if (result.value) {
                    Swal.fire(
                      'Canceled!',
                      'Your order has been canceled',
                      'success'
                  )
                  .then(function(){
                      //then redirect to a url
                      window.location.href= cancelUrl;
                  });


                }
            })
    });

    </script>
@endsection
