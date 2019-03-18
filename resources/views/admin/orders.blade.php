@extends('layouts.admin')

@section('title')
    {{ __("Orders") }}
@endsection

@section('content')
<!-- eCommerce Dashboard Header -->
<div class="content-header">
    <ul class="nav-horizontal text-center">
        <li>
            <a href="{{ route('dashboard') }}"><i class="fa fa-bar-chart"></i> Dashboard</a>
        </li>
        <li class="active">
            <a href="{{ route('orders') }}"><i class="gi gi-shop_window"></i> Orders</a>
        </li>


    </ul>
</div>
<!-- END eCommerce Dashboard Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')

<!-- Quick Stats -->
<div class="row text-center">
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background">
                <h4 class="widget-content-light"><strong>Pending</strong> Orders</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 animation-expandOpen">3</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Orders</strong> Today</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">120</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Orders</strong> This Month</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">3.200</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Orders</strong> Last Month</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">2.850</span></div>
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
        <h2><strong>All</strong> Orders</h2>
    </div>
    <!-- END All Orders Title -->

    <!-- All Orders Content -->
    <div class="table-responsive">
        <table id="ecom-orders" class="table table-bordered table-striped table-vcenter">
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
                            <div class="btn-group-xs">
                                <a href="page_ecom_order_view.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
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
