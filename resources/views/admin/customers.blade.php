@extends('layouts.admin')

@section('title')
    {{ __("Customers") }}
@endsection

@section('content')
<!-- eCommerce Dashboard Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-cart"></i>
            ALL CUSTOMERS
            <br>
            <small> </small>
        </h1>
    </div>
</div>
<!-- END eCommerce Dashboard Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')

<!-- All Orders Block -->
<div class="block full">
    <!-- All Orders Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"
            data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
        </div>
        <h2><strong>All</strong> Customers</h2>
    </div>
    <!-- END All Orders Title -->

    <!-- All Orders Content -->
    <div class="table-responsive">
        <table id="ecom-orders" class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">S/N</th>
                    <th class="">Customer Name</th>
                    <th class="">Email</th>
                    <th class="">Telephone</th>
                    <th class="text-center ">Orders</th>
                    <th class="text-center">Recruits</th>
                    <th class="text-center">Joined On</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $count = 1; ?>
                    @foreach($customers as $customer)
                    <tr>
                        <td class="text-center">
                            <strong>{{ $count++ }}</strong>
                        </td>

                        <td class="">
                            <strong>
                                <a href="{{ route('customer', ['user' => $customer->id]) }}">
                                    {{ $customer->name }}
                                </a>
                            </strong>
                        </td>
                        <td class="">
                            <strong>{{ $customer->email }}</strong>
                        </td>
                        <td class="">
                            <strong>{{ $customer->userData->tel }}</strong>
                        </td>
                        <td class="text-center">
                            <strong>{{ count($customer->orders) }}</strong>
                        </td>
                        <td class="text-center">
                            <strong>{{ $customer->userData->getChildrenCount() }}</strong>
                        </td>
                        <td class="text-center">
                            {{ $customer->created_at->format(\App\Functions::DATE_FORMAT) }}
                        </td>
                        <td class="text-center">
                            <div class="">
                                <a href="{{ route('customer', ['user' => $customer->id]) }}"
                                    data-toggle="tooltip" title="View Customer Details"
                                    class="btn btn-info">
                                    View
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
