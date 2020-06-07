@extends('layouts.admin')

@section('title')
    {{ __("Failed Payouts") }}
@endsection

@section('content')


    <!-- Fixed Top Header + Footer Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-show_big_thumbnails"></i>
                FAILED PAYOUTS
                <br>
                <small>
                    A list of failed payouts. </strong>
                </small>
            </h1>
        </div>
    </div>

    <!-- END Fixed Top Header + Footer Header -->


    <!-- Dummy Content -->
    @include('admin_includes.notification')

    <!-- All Products Block -->
    <div class="block full">
        <!-- All Products Title -->
        <div class="block-title">
            <h2><strong>Failed Payouts</strong> </h2>
        </div>
        <!-- END All Products Title -->

        <!-- All Products Content -->
        <div class="table-responsive">
            <table id="ecom-products-asc" class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 20px;">ID</th>
                        <th>Client Name</th>
                        <th class="text-center hidden-xs">Amount </th>
                        <th class="text-center">Month - Year</th>
                        <th class="text-center">Method</th>
                        <th class="text-center">Time Ago</th>
                        <th class=""> Reason </th>
                    </tr>
                </thead>
                <tbody>

                    <?php $count = 1; ?>
                    @foreach($payouts as $payout)
                        <tr>
                            <td class="text-center"> {{ $count++ }} </td>
                            <td> {{ $payout->user->name }} </td>
                            <td class="text-center">
                                <strong>
                                    {{ number_format($payout->amount) }}
                                </strong>
                            </td>
                            <td class="text-center">
                                {{ $payout->month_name }} -  {{ $payout->year }}
                            </td>
                            <td>
                                @if($payout->network == 'mtn')
                                    {{ __("MTN Mobile Money") }}
                                @else
                                    {{ __("Orange Money") }}
                                @endif
                            </td>
                            <td class="text-center">
                                <?php
                                $date = \Carbon\Carbon::parse($payout->failed_at);
                                echo $date->diffForHumans();
                                 ?>
                            </td>
                            <td class="">
                                <strong>{{ $payout->error_message }}</strong>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- END All Products Content -->
    </div>
    <!-- END All Products Block -->
@endsection

@section('scripts')
    <script src="/adminn/js/pages/ecomProducts.js"></script>
    <script>
        $(function()
        {
            EcomProducts.init();
        });
    </script>
@endsection
