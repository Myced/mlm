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

    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-warning">
                <h4 class="widget-content-light"><i class="fa fa-archive"></i> <strong>Packaging</strong></h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-warning"><i class="fa fa-refresh fa-spin"></i></span></div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-muted">
                <h4 class="widget-content-light"><i class="fa fa-truck"></i> <strong>Delivery</strong></h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-muted animation-pulse"><i class="fa fa-ellipsis-h"></i></span></div>
        </div>
    </div>
</div>
<!-- END Order Status -->


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
                <?php $total = 0; ?>
                @foreach($order->content as $product)
                <tr>
                    <td class="text-center">
                        <a href="javascript:void(0)">
                            <strong>{{ $product->model()->code }}</strong>
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0)">
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
                        <strong>{{ $product->order->payment_status == true ? number_format($tot) . ' F' : '0 F' }}</strong>
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
    </div>
    <!-- END Addresses -->

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
