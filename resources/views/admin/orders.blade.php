@extends('layouts.admin')

@section('title')
    {{ __("Orders") }}
@endsection

@section('content')
<!-- eCommerce Dashboard Header -->
<div class="content-header">
    <ul class="nav-horizontal text-center">

        <li class="{{ Request::is('admin/order') ? 'active' : '' }}">
            <a href="{{ route('orders') }}"><i class="gi gi-shop_window"></i>All Orders</a>
        </li>

        <li class="{{ Request::is('admin/order/period/today') ? 'active' : '' }}">
            <a href="{{ route('orders.today') }}"><i class="gi gi-shop_window"></i> Today </a>
        </li>

        <li class="{{ Request::is('admin/order/period/yesterday') ? 'active' : '' }}">
            <a href="{{ route('orders.yesterday') }}"><i class="gi gi-shop_window"></i> Yesterday </a>
        </li>

        <li class="{{ Request::is('admin/order/period/this-week') ? 'active' : '' }}">
            <a href="{{ route('orders.thisweek') }}"><i class="gi gi-shop_window"></i> This Week</a>
        </li>

        <li class="{{ Request::is('admin/order/period/this-month') ? 'active' : '' }}">
            <a href="{{ route('orders.thismonth') }}"><i class="gi gi-shop_window"></i> This Month</a>
        </li>

        <li>
            <a href="{{ route('orders.filter.period') }}"><i class="gi gi-shop_window"></i> Filter Period</a>
        </li>

    </ul>
</div>
<!-- END eCommerce Dashboard Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')

<!-- Quick Stats -->
<div class="row text-center">
    <div class="col-sm-6 col-lg-2">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-danger">
                <h4 class="widget-content-light">
                    <strong> Cancelled <br> Orders </strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 themed-color-dark animation-expandOpen">
                    {{ $stats->data[\App\OrderStatus::CANCELED] }}
                </span>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-2">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-warning">
                <h4 class="widget-content-light">
                    <strong> Pending <br> Orders </strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 themed-color-dark animation-expandOpen">
                    {{ $stats->data[\App\OrderStatus::PENDING] }}
                </span>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-2">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-primary">
                <h4 class="widget-content-light">
                    <strong> Confirmed <br> Orders</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 themed-color-dark animation-expandOpen">
                    {{ $stats->data[\App\OrderStatus::CONFIRMED] }}
                </span>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-2">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-info">
                <h4 class="widget-content-light">
                    <strong> Processing <br> Orders</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 themed-color-dark animation-expandOpen">
                    {{ $stats->data[\App\OrderStatus::PROCESSING] }}
                </span>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-lg-2">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-shipped">
                <h4 class="widget-content-light">
                    <strong> Shipped <br> Orders</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 themed-color-dark animation-expandOpen">
                    {{ $stats->data[\App\OrderStatus::SHIPPED] }}
                </span>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-lg-2">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-success">
                <h4 class="widget-content-light">
                    <strong> Delivered <br> Orders</strong>
                </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 themed-color-dark animation-expandOpen">
                    {{ $stats->data[\App\OrderStatus::DELIVERED] }}
                </span>
            </div>
        </a>
    </div>

</div>
<!-- END Quick Stats -->

<!-- All Orders Block -->
<div class="block full">
    <!-- All Orders Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
        </div>
        <h2>
            {{ $title }}
            <strong> ({{ $orders->count() }}) </strong>
        </h2>
    </div>
    <!-- END All Orders Title -->

    <!-- All Orders Content -->
    <div class="table-responsive">
        <table id="ecom-orders-desc" class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">ID</th>
                    <th class="">Customer</th>
                    <th class="text-center ">Products</th>
                    <th class="">Payment</th>
                    <th class="text-right ">Value</th>
                    <th>Status</th>
                    <th class=" text-center">Submitted</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                    @foreach($orders as $order)
                    <tr>
                        <td class="text-center">
                            <a href="{{ route('order.details', ['code' => $order->order_code]) }}">
                                <strong>{{ $order->order_code }}</strong></a>
                            </td>
                        <td class="">
                            <a href="{{ route('customer', ['user' => $order->user->id]) }}">
                                {{ $order->user->name}}
                            </a>
                        </td>
                        <td class="text-center">{{ $order->item_number }}</td>
                        <td class="">
                            {{ \App\PaymentMethods::format($order->payment_method) }}
                        </td>
                        <td class="text-right">
                            <strong>{{ number_format($order->total) }} F</strong>
                        </td>
                        <td>
                            <span class="label label-{{ \App\OrderStatus::getClass($order->status) }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="text-center">{{ $order->created_at->format(\App\Functions::DATE_FORMAT) }}</td>
                        <td class="text-center">
                            <div class="">
                                <a href="{{ route('order.details', ['code' => $order->order_code]) }}"
                                    data-toggle="tooltip" title="View Order Details"
                                    class="btn btn-default">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach

            </tbody>
        </table>
    </div>
    <!-- END All Orders Content -->
</div>
<!-- END All Orders Block -->
@endsection

@section('scripts')
    <script src="/adminn/js/pages/ecomOrders.js"></script>
    <script>$(function(){ EcomOrders.init(); });</script>
@endsection
