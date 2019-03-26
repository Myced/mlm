@extends('layouts.admin')

@section('title')
    {{ __('Dashboard') }}
@endsection

@section('content')
<!-- Fixed Top Header + Footer Header -->
<!-- eCommerce Dashboard Header -->
<div class="content-header">
    <ul class="nav-horizontal text-center">
        <li class="active">
            <a href="{{ route('dashboard') }}"><i class="fa fa-bar-chart"></i> Dashboard</a>
        </li>

        <li>
            <a href="{{ route('orders') }}"><i class="gi gi-shop_window"></i> Orders</a>
        </li>

        <li>
            <a href="{{ route('customers') }}"><i class="gi gi-group"></i> Customers</a>
        </li>
    </ul>
</div>
<!-- END eCommerce Dashboard Header -->
<!-- END Fixed Top Header + Footer Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')



<!-- Quick Stats -->
<div class="row text-center">
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background">
                <h4 class="widget-content-light"><strong>Pending</strong> Orders</h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 animation-expandOpen">{{ $dashboard->pendingOrders }}</span>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Total Members</strong> </h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 themed-color-dark animation-expandOpen">{{ $dashboard->totalMembers }}</span>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Orders</strong> Today</h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 themed-color-dark animation-expandOpen">{{ $dashboard->ordersToday }}</span>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Earnings</strong> Today</h4>
            </div>
            <div class="widget-extra-full">
                <span class="h2 themed-color-dark animation-expandOpen">
                    {{ number_format($dashboard->earningsToday) }} F
                </span>
            </div>
        </a>
    </div>
</div>
<!-- END Quick Stats -->

<!-- eShop Overview Block -->
<div class="block full">
    <!-- eShop Overview Title -->
    <div class="block-title">

        <h2><strong>eShop</strong> Overview</h2>
    </div>
    <!-- END eShop Overview Title -->

    <!-- eShop Overview Content -->
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="row push">
                <div class="col-xs-6">
                    <h3><strong class="animation-fadeInQuick">45.000</strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Total Orders</a></small></h3>
                </div>
                <div class="col-xs-6">
                    <h3><strong class="animation-fadeInQuick">$ 1.200,00</strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Cart Value</a></small></h3>
                </div>
                <div class="col-xs-6">
                    <h3><strong class="animation-fadeInQuick">1.520.000</strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Visits</a></small></h3>
                </div>
                <div class="col-xs-6">
                    <h3><strong class="animation-fadeInQuick">28.000</strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Customers</a></small></h3>
                </div>
                <div class="col-xs-6">
                    <h3><strong class="animation-fadeInQuick">3.5%</strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Conv. Rate</a></small></h3>
                </div>
                <div class="col-xs-6">
                    <h3><strong class="animation-fadeInQuick">4.250</strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Products</a></small></h3>
                </div>
                <div class="col-xs-6">
                    <h3><strong class="animation-fadeInQuick">$ 260.000,00</strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Net Profit</a></small></h3>
                </div>
                <div class="col-xs-6">
                    <h3><strong class="animation-fadeInQuick">$ 16.850,00</strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Payment Fees</a></small></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-8">
            <!-- Flot Charts (initialized in js/pages/ecomDashboard.js), for more examples you can check out http://www.flotcharts.org/ -->
            <div id="chart-overview" style="height: 350px;"></div>
        </div>
    </div>
    <!-- END eShop Overview Content -->
</div>
<!-- END eShop Overview Block -->

<!-- Orders and Products -->
<div class="row">
    <div class="col-lg-6">
        <!-- Latest Orders Block -->
        <div class="block">
            <!-- Latest Orders Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="{{ route('orders') }}" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Show All"><i class="fa fa-eye"></i></a>
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                </div>
                <h2><strong>Latest</strong> Orders</h2>
            </div>
            <!-- END Latest Orders Title -->

            <!-- Latest Orders Content -->
            <table class="table table-borderless table-striped table-vcenter table-bordered">
                <tbody>

                    @foreach($dashboard::latestOrders() as $order)

                    <tr>
                        <td class="text-center" style="width: 100px;">
                            <a href="{{ route('order.details', ['code' => $order->order_code]) }}">
                                <strong>{{ $order->order_code }}</strong>
                            </a>
                        </td>
                        <td class="hidden-xs">
                            <a href="{{ route('customer', ['id' => $order->user_id]) }}">
                                @if(!is_null($order->user))
                                    {{ $order->user->name }}
                                @else
                                    Unknown
                                @endif
                            </a>
                        </td>
                        <td class="hidden-xs">{{ \App\PaymentMethods::format($order->payment_method) }}</td>
                        <td class="text-right">
                            <strong>{{ number_format($order->total) }}</strong>
                        </td>
                        <td class="text-right">
                            <span class="label label-{{ \App\OrderStatus::getClass($order->status) }}">
                                {{ $order->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <!-- END Latest Orders Content -->
        </div>
        <!-- END Latest Orders Block -->
    </div>
    <div class="col-lg-6">
        <!-- Top Products Block -->
        <div class="block">
            <!-- Top Products Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="{{ route('admin.products') }}" class="btn btn-alt btn-sm btn-default"
                    data-toggle="tooltip" title="Show All"><i class="fa fa-eye"></i></a>
                </div>
                <h2><strong>Top</strong> Products</h2>
            </div>
            <!-- END Top Products Title -->

            <!-- Top Products Content -->
            <table class="table table-borderless table-striped table-vcenter table-bordered">
                <tbody>


                    @foreach($dashboard::topProducts() as $product)
                    <tr>
                        <td class="text-center" style="width: 100px;">
                            <a href="{{ route('admin.product.detail', ['id' => $product->id]) }}">
                                <strong>{{ $product->code }}</strong>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.product.detail', ['id' => $product->id]) }}">
                                {{ $product->name }}
                            </a>
                        </td>

                        <td class="text-center"><strong>{{ $product->orders() }}</strong> orders</td>
                        <td class="hidden-xs text-center">
                            <div class="text-warning">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <!-- END Top Products Content -->
        </div>
        <!-- END Top Products Block -->
    </div>
</div>
<!-- END Orders and Products -->
@endsection

@section('scripts')
<!-- Load and execute javascript code used only in this page -->
<script src="/adminn/js/pages/ecomDashboard.js"></script>
<script>$(function(){ EcomDashboard.init(); });</script>
@endsection
