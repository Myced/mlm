@extends('layouts.admin')

@section('title')
    Order Detail - {{ $order->order_code }}
@endsection

@section('content')
<!-- Fixed Top Header + Footer Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-cart"></i>
            ORDER - {{ $order->order_code }}
            <br>
            <small> by {{ $order->user->name }}</small>
        </h1>
    </div>
</div>

<!-- END Fixed Top Header + Footer Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')

<div class="row">
    <div class="col-md-12">
        <a href="{{ url()->previous() }}"
            data-toggle="tooltip" title="Go back "
            class="btn btn-info"
            data-original-title="Go Back">
            <i class="fa fa-arrow-left"></i>
            Go Back
        </a>

        <a href="{{ route('orders') }}"
            data-toggle="tooltip" title="Go back "
            class="btn btn-info"
            data-original-title="Back to All Orders">
            <i class="fa fa-arrow-left"></i>
            Back to all Orders
        </a>

    </div>
</div>
<br>

<!-- Order Status -->
<div class="row text-center">

    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-success">
                <h4 class="widget-content-light">
                    <strong>{{ $order->order_code }}</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 text-success animation-expandOpen">
                    {{ $order->created_at->format(\App\Functions::DATE_FORMAT) }}
                </span>
            </div>
        </div>
    </div>

    @if($order->payment_method == \App\PaymentMethods::CASH_ON_DELIVERY)
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-info">
                <h4 class="widget-content-light">
                    <i class="fa fa-paypal"></i>
                    <strong>Payment</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h3 text-primary animation-expandOpen">
                    Cash On Delivery
                </span>
            </div>
        </div>
    </div>
    @elseif($order->payment_status == true)
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-success">
                <h4 class="widget-content-light">
                    <i class="fa fa-paypal"></i>
                    <strong>Payment</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 text-success animation-expandOpen">
                    <i class="fa fa-check"></i>
                </span>
            </div>
        </div>
    </div>
    @else
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-danger">
                <h4 class="widget-content-light">
                    <i class="fa fa-paypal"></i>
                    <strong>Payment</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 text-danger animation-expandOpen">
                    <i class="fa fa-times"></i>
                </span>
            </div>
        </div>
    </div>
    @endif

    @if($order->status == \App\OrderStatus::CANCELED)
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-danger">
                <h4 class="widget-content-light">
                    <i class="fa fa-times"></i>
                    <strong>Cancelled</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 text-danger">
                    <i class="fa fa-times"></i>
                </span>
            </div>
        </div>
    </div>

    @elseif($order->status == \App\OrderStatus::PENDING)
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-warning">
                <h4 class="widget-content-light">
                    <i class="fa fa-info-circle"></i>
                    <strong>Pending</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 text-warning">
                    <i class="fa fa-info"></i>
                </span>
            </div>
        </div>
    </div>

    @elseif($order->status == \App\OrderStatus::CONFIRMED)
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-info">
                <h4 class="widget-content-light">
                    <i class="fa fa-thumbs-up"></i>
                    <strong>Confirmed</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 text-primary">
                    <i class="fa fa-thumbs-up"></i>
                </span>
            </div>
        </div>
    </div>

    @elseif($order->status == \App\OrderStatus::SHIPPED || $order->status == \App\OrderStatus::DELIVERED)
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-success">
                <h4 class="widget-content-light">
                    <i class="fa fa-truck"></i>
                    <strong>Shipped</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 text-success">
                    <i class="fa fa-check"></i>
                </span>
            </div>
        </div>
    </div>
    @elseif($order->status == \App\OrderStatus::PROCESSING)
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-warning">
                <h4 class="widget-content-light">
                    <i class="fa fa-archive"></i>
                    <strong>Packaging</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 text-warning">
                    <i class="fa fa-refresh fa-spin"></i>
                </span>
            </div>
        </div>
    </div>
    @endif

    @if($order->status == \App\OrderStatus::DELIVERED)
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-success">
                <h4 class="widget-content-light">
                    <i class="fa fa-truck"></i>
                    <strong>Delivered</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 text-success ">
                    {{ \Carbon\Carbon::parse($order->delivered_at)->format(\App\Functions::DATE_FORMAT) }}
                </span>
            </div>
        </div>
    </div>
    @else
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-muted">
                <h4 class="widget-content-light"><i class="fa fa-truck"></i> <strong>Delivery</strong></h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-muted "><i class="fa fa-ellipsis-h"></i></span></div>
        </div>
    </div>
    @endif
</div>
<!-- END Order Status -->

<!-- order status change buttons -->

<div class="row">
    <div class="col-md-12">
        <div class="block">
            <!-- Products Title -->
            <div class="block-title">
                <h2> <strong>Order Actions</strong> </h2>
            </div>

            <input type="hidden" name="" value="{{ $order->order_code }}" id="order">

            <a href="javascript:void(0)"
                data-toggle="tooltip" title="Cancel Order "
                class="btn btn-danger btn-flat cancel"
                data-status="{{ \App\OrderStatus::CANCELED }}"
                data-original-title="Cancel Order">
                <i class="fa fa-times"></i>
                <strong>Cancel Order</strong>
            </a>

            <a href="javascript:void(0)"
                data-toggle="tooltip" title="Set Order to Pending"
                class="btn btn-warning btn-flat pending"
                data-status="{{ \App\OrderStatus::PENDING }}"
                data-original-title="Set Order to Pending">
                <i class="gi gi-stopwatch"></i>
                <strong>To Pending</strong>
            </a>

            <a href="javascript:void(0)"
                data-toggle="tooltip" title="Confirm Order"
                class="btn btn-primary btn-flat confirm"
                data-status="{{ \App\OrderStatus::CONFIRMED }}"
                data-original-title="Confirm Order">
                <i class="fa fa-thumbs-up"></i>
                <strong>Confirm Order</strong>
            </a>

            <a href="javascript:void(0)"
                data-toggle="tooltip" title="Start Processing Order"
                class="btn btn-info btn-flat process"
                data-status="{{ \App\OrderStatus::PROCESSING }}"
                data-original-title="Start Processing Order">
                <i class="fa fa-refresh"></i>
                <strong>Process Order</strong>
            </a>

            <a href="javascript:void(0)"
                data-toggle="tooltip" title="Ship this Order"
                class="btn btn-ship btn-flat ship"
                data-status="{{ \App\OrderStatus::SHIPPED }}"
                data-original-title="Ship This Order">
                <i class="fa fa-truck"></i>
                <strong>Ship  Order</strong>
            </a>

            <a href="javascript:void(0)"
                data-toggle="tooltip" title="Deliver This Order"
                class="btn btn-success btn-flat deliver"
                data-status="{{ \App\OrderStatus::DELIVERED }}"
                data-original-title="Deliver This Order">
                <i class="fa fa-check"></i>
                <strong>Deliver  Order</strong>
            </a>

            <br><br>

        </div>
    </div>
</div>

<!-- end of order status change buttons -->


<!-- Products Block -->
<div class="block">
    <!-- Products Title -->
    <div class="block-title">
        <h2><i class="fa fa-shopping-cart"></i> <strong>Products</strong></h2>
    </div>
    <!-- END Products Title -->

    <!-- Products Content -->
    <div class="table-responsive">
        <table class="table table-bordered table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">ID</th>
                    <th>Product Name</th>
                    <th class="text-center">Stock</th>
                    <th class="text-center">QTY</th>
                    <th class="text-right" style="width: 10%;">UNIT COST</th>
                    <th class="text-right" style="width: 10%;">PRICE</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; $tot = 0; ?>
                @foreach($order->content as $product)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('admin.product.detail', ['id' => $product->model()->id]) }}">
                            <strong>{{ $product->model()->code }}</strong>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.product.detail', ['id' => $product->model()->id]) }}">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td class="text-center">
                        <strong>{{ $product->model()->quantity }}</strong>
                    </td>
                    <td class="text-center">
                        <strong>{{ $product->quantity }}</strong>
                    </td>
                    <td class="text-right">
                        <strong>{{ number_format($product->price) }} F</strong>
                    </td>
                    <td class="text-right">
                        <?php
                        $tot = $product->price * $product->quantity;
                        $total += $tot;
                         ?>
                        <strong>{{ number_format($tot) }} F</strong>
                    </td>
                </tr>
                @endforeach


                <tr>
                    <td colspan="5" class="text-right text-uppercase">
                        <strong>Total Price:</strong>
                    </td>
                    <td class="text-right">
                        <strong>{{ number_format($tot) }} F</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right text-uppercase">
                        <strong>Total Paid:</strong>
                    </td>
                    <td class="text-right">
                        <strong>{{ $order->payment_status == true ? number_format($tot) . ' F' : '0 F' }}</strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- END Products Content -->
</div>
<!-- END Products Block -->

    <!-- Addresses -->
    <div class="row">
        <div class="col-sm-6">
            <!-- Billing Address Block -->
            <div class="block">
                <!-- Billing Address Title -->
                <div class="block-title">
                    <h2><i class="fa fa-building-o"></i> <strong>Customer </strong> Address</h2>
                </div>
                <!-- END Billing Address Title -->

                <!-- Billing Address Content -->
                <h4><strong>{{ $order->user->name }}</strong></h4>
                <address>
                    {{ $order->user->userData->address }}<br>
                    <i class="fa fa-phone"></i> {{ $order->user->userData->tel }}<br>
                    <i class="fa fa-envelope-o"></i>
                    <a href="javascript:void(0)">{{ $order->user->email }}</a>
                </address>
                <!-- END Billing Address Content -->
            </div>
            <!-- END Billing Address Block -->
        </div>

        <!-- //order informatio -->
        <div class="col-sm-6">
            <div class="block">
                <div class="block-title">
                    <h2>
                        Order Details
                    </h2>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">
                        Order Code: <strong>{{ $order->order_code }}</strong>
                    </li>

                    <li class="list-group-item">
                        Client Name: <strong>{{ $order->user->name }}</strong>
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


                </ul>
            </div>
        </div>
        <!-- end order information -->
    </div>
    <!-- END Addresses -->

    <div class="row">
        <div class="col-sm-12">
            <div class="block">
                <div class="block-title">
                    <h2> <strong>Order Commissions Received</strong> </h2>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                       <thead>
                          <tr>
                             <th>S/N</th>
                             <th>Time Occured</th>
                             <th>Receiver</th>
                             <th>Order Value</th>
                             <th>Level</th>
                             <th>Percentage</th>
                             <th>Commission</th>
                          </tr>
                       </thead>
                       <tbody>

                           <?php
                               $count = 1;
                               $total = 0;
                           ?>

                           @if($order->payment_status == false)
                           <tr>
                               <th class="text-center" colspan="10">
                                   <strong class="text-primary f-20" style="font-size: 20px" >
                                       Payment for this Order is not yet received.
                                   </strong>
                               </th>
                           </tr>

                           @elseif($order->commissions->count() == 0)
                           <tr>
                               <th class="text-center" colspan="10">
                                   <strong class="text-primary f-20" style="font-size: 20px" >
                                       There are no commissions or benefitiaries for this order.
                                   </strong>
                               </th>
                           </tr>

                           @else

                             @foreach($order->commissions as $commission)
                             <?php
                                 $total += $commission->commission;
                              ?>
                                 <tr>
                                     <td> {{ $count++ }} </td>
                                     <td> {{ $commission->created_at->diffForHumans() }} </td>
                                     <td> {{ $commission->beneficiary()->name }} </td>
                                     <td> {{ number_format($commission->order->total) }} FCFA </td>
                                     <td> Level {{ $commission->level }} </td>
                                     <td> {{ $commission->percentage}} % </td>
                                     <th> {{ number_format($commission->commission) }} FCFA </th>

                                 </tr>
                             @endforeach
                           @endif

                           <tr style="color: #333;">
                               <th class="f-20 text-center" colspan="6">
                                   Total Commissions
                               </th>
                               <th class="f-20 text-center" colspan="2">
                                   {{ number_format($total) }} FCFA
                               </th>
                           </tr>

                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Log Block -->
    <div class="block">
        <!-- Log Title -->
        <div class="block-title">
            <h2><i class="fa fa-file-text-o"></i> <strong>Log</strong> Messages</h2>
        </div>
        <!-- END Log Title -->

        <!-- Log Content -->
        <div class="table-responsive">
            <table class="table table-bordered table-vcenter">
                <tbody>
                    @foreach($order->logs as $log)
                    <tr>
                        <td>
                            <span class="label label-{{ $log->class }}">
                                {{ $log->tag }}
                            </span>
                        </td>
                        <td class="text-center">{{ $log->created_at->format(\App\Functions::DATE_TIME_FORMAT) }}</td>
                        <td><a href="javascript:void(0)">{{ $log->name }}</a></td>
                        <td class="text-{{ $log->class }}">
                            <i class="fa fa-fw fa-{{ $log->icon }}"></i>
                            <strong>{{ $log->description }}</strong>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- END Log Content -->
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" name="button"
                data-target="#log" data-toggle="modal">
                    <i class="fa fa-plus"></i>
                    Add Log message
                </button>
            </div>
        </div>
        <br>
    </div>
    <!-- END Log Block -->
</div>
<!-- END Page Content -->

<div id="log" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <!-- Modal Header -->
           <div class="modal-header">
               <h2 class="modal-title">
                   <i class="fa fa-pencil"></i>
                   Log Order Information
               </h2>
           </div>
           <!-- END Modal Header -->

           <!-- Modal Body -->
           <div class="modal-body">
               <form action="{{ route('order.log', ['code' => $order->order_code]) }}" method="post"
                   class="form-horizontal">
                   @csrf
                   <div class="row">
                       <div class="col-md-8">
                           <div class="form-group">
                               <label class="col-md-3 control-label">Log Tag:</label>
                               <div class="col-md-9">
                                   <input type="text"  name="tag" class="form-control"
                                   placeholder="E.g. Information, Or Order, etc"
                                   required>
                               </div>
                           </div>

                           <div class="form-group">
                               <label class="col-md-3 control-label">Log Type:</label>
                               <div class="col-md-9">
                                   <select class="form-control" name="type">
                                       @foreach(\App\Models\OrderLog::allTypes() as $key => $type)
                                       <option value="{{ $key }}">
                                           <strong class="text-{{ $key }}">
                                               {{ $type }}
                                           </strong>
                                       </option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>

                           <div class="form-group">
                               <label class="col-md-3 control-label">Information:</label>
                               <div class="col-md-9">
                                   <textarea name="description" rows="8"
                                   class="form-control" required
                                   placeholder="Enter the log description or information here"></textarea>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="form-group form-actions">
                       <div class="col-xs-12 text-right">
                           <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-sm btn-primary">Save Info</button>
                       </div>
                   </div>
               </form>
           </div>
           <!-- END Modal Body -->
       </div>
   </div>
</div>
<!-- END User Settings -->

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        var order = $("#order").val();

        $('.cancel').click(function(){
            var status = $(this).data('status');

            if(confirm("Do you want to cancel this order ??"))
            {
                updateStatus(order, status);
            }
        });

        $('.pending').click(function(){
            var status = $(this).data('status');

            if(confirm("Do you want to set this order to Pending ? ??"))
            {
                updateStatus(order, status);
            }
        });

        $('.confirm').click(function(){
            var status = $(this).data('status');

            if(confirm("Do you want to Confirm this order ??"))
            {
                updateStatus(order, status);
            }
        });

        $('.process').click(function(){
            var status = $(this).data('status');

            if(confirm("Do you want to set this order to Processing ??"))
            {
                updateStatus(order, status);
            }
        });

        $('.ship').click(function(){
            var status = $(this).data('status');

            if(confirm("Do you want to ship this order ??"))
            {
                updateStatus(order, status);
            }
        });

        $('.deliver').click(function(){
            var status = $(this).data('status');

            if(confirm("Do you want to Deliver this order ??"))
            {
                updateStatus(order, status);
            }
        });


        function updateStatus (order, status)
        {
            var url = '/admin/order/' + order + '/status/'
                        + status + '/update';

            window.location.href = url;
        }
    })
</script>
@endsection
