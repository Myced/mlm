@extends('layouts.admin')

@section('title')
    {{ __("Commissions Payout - Orange") }}
@endsection

@section('styles')
    <link href="/adminn/jquery-toastr/jquery.toast.min.css" rel="stylesheet" />
@endsection

@section('content')
<input type="hidden" id="token" value="{{ csrf_token() }}">

    <?php
    if(isset(request()->month))
    {
        $cmonth = request()->month;
    }
    else {
        $cmonth = date("m");
    }

    if(isset(request()->year))
    {
        $cyear = request()->year;
    }
    else {
        $cyear = date("Y");
    }

     ?>

    <!-- Fixed Top Header + Footer Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-euro"></i>
                Commissions Payout - Orange Money
                <br>
                <small>
                    For : <strong> {{ $months[$cmonth] }}, {{ $cyear }} </strong>
                </small>
            </h1>
        </div>
    </div>

    <!-- END Fixed Top Header + Footer Header -->


    <!-- Dummy Content -->
    @include('admin_includes.notification')

    <div class="row">

        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="javascript:void(0)" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                        <i class="gi gi-usd"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>F {{ number_format($beneficiaries->sum('amount')) }}</strong>
                        <small class="text-bold">Total Payable</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="javascript:void(0)" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="gi gi-euro"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>F {{ number_format($amountPaid) }}</strong><br>
                        <small class="text-bold">Total Paid</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="javascript:void(0)" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                        <i class="gi gi-gbp"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>F {{ number_format($amountLeft) }}</strong>
                        <small class="text-bold">Amount Left</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="javascript:void(0)" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>F {{ number_format($forward) }}</strong><br>
                        <small class="text-bold">Carried Forward</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

    </div>

    <div class="block full">
        <!-- All Products Title -->
        <div class="block-title">
            <h2><strong>Filter Period</strong> </h2>
        </div>

        <form class="" action="" method="get">
            <div class="row">
                <div class="col-md-3">
                    <select class="form-control select2" name="month">
                        @foreach($months as $id => $month)
                            <option value="{{ $id }}"
                                {{ $cmonth == $id ? 'selected' : '' }}>
                                {{ $month }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <select class="form-control " name="year">
                        @foreach($years as $year)
                            <option value="{{ $year }}"
                                {{ $cyear == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-flat">
                        <strong>Filter Period</strong>
                    </button>
                </div>
            </div>
        </form>

    </div>

    <!-- All Products Block -->
    <div class="block full">
        <!-- All Products Title -->
        <div class="block-title">

            <div class="block-options pull-right">
                <a href="{{ route('payout.refresh') }}?network=mtn"
                    class="btn btn-alt btn-sm btn-default">
                    <i class="fa fa-refresh"></i>
                    Refresh Table
                </a>
            </div>

            <h2><strong>List of Beneficiaries ({{ $beneficiaries->count() }}) </strong> </h2>
        </div>
        <!-- END All Products Title -->

        <!-- All Products Content -->
        <div class="table-responsive">
            <table id="ecom-products-asc" class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 20px;">ID</th>
                        <th>Client Name</th>
                        <th class="text-center hidden-xs">Amount (FCFA) </th>
                        <th class="hidden-xs text-center">Telephone</th>
                        <th class=" text-center">Total Received</th>
                        <th class="text-center"> Action </th>
                    </tr>
                </thead>
                <tbody>

                    <?php $count = 1; ?>
                    @foreach($beneficiaries as $beneficiary)
                        <tr>
                            <td> {{ $count++ }} </td>
                            <td>
                                 <strong>
                                     <a href="{{ route('customer', ['id' => $beneficiary->user_id]) }}">
                                         {{ $beneficiary->user->name }}
                                     </a>
                                 </strong>
                             </td>
                            <td class="text-center">
                                <strong class="{{ $beneficiary->paid == true ? 'line-through' : '' }}">
                                    {{ number_format($beneficiary->amount) }}
                                </strong>
                            </td>
                            <td class="text-center"> {{ $beneficiary->user->userData->payout_number }} </td>
                            <td class="text-center"> {{ number_format($beneficiary->user->paidCommissions()->sum('commission')) }} </td>
                            <td class="text-center">


                                @if($beneficiary->paid == true)
                                    <strong class="text-paid">PAID</strong>
                                @elseif($beneficiary->moved == true)
                                    <strong>
                                        <i class="fa fa-arrow-right text-primary fa-2x"></i>
                                    </strong>
                                @else
                                    <button type="button" name="button"
                                    data-payout="{{ $beneficiary->id }}"
                                    data-name = "{{ $beneficiary->user->name }}"
                                    data-amount = "{{ number_format(round($beneficiary->amount)) }} F"
                                    class="btn btn-flat btn-success pay">
                                        Payout
                                    </button>
                                    <strong class="text-paid"></strong>
                                @endif


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
<script src="/adminn/jquery-toastr/jquery.toast.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){

        EcomProducts.init();

        $('.pay').click(function(){
            var payoutId = $(this).data('payout');
            var token = $("#token").val();
            var name = $(this).data('name');
            var amount = $(this).data('amount');

            var $button = $(this);

            var message = amount + " is about to be paid to "
                            + name + ". "
                            + " <br> "
                            + "Dial *126# and enter pin to confirm payout ";

            toast(message, 'info');

            //prepare the payout
            page_loading_on();

            //make an ajax request
            $.ajax({
                url : '/api/payout/mtn',
                method : 'post',
                dataType : 'text',
                data : { payoutId : payoutId, _token : token },
                error : function(error)
                {
                    console.log(error.responseText);
                    var message = "Encountered an error. Check your internet connection";

                    toast(message, 'error');
                    page_loading_off();
                },
                success : function(data)
                {
                    page_loading_off();
                    var result = $.parseJSON(data);

                    if(result.status)
                    {
                        toast(result.message, 'success');

                        //remove payout button
                        $button.addClass('hide');
                        $button.next().text("PAID");
                    }
                    else {
                        var message = "Could not complete payout";
                        toast(message, 'error');
                        toast(result.message, 'error');
                    }

                }
            });
        });


    });

    function page_loading_on(){
        $("#loading").removeClass('loader')
        $('#loading').addClass("loading");
    }

    function page_loading_off(){
        $('#loading').removeClass("loading");
        $("#loading").addClass('loader');
    }

    function toast(message, level)
    {
        var myMessage = "<strong>" + message + "</strong>";

        var titles = {
            info : 'Information',
            warning : 'Warning',
            success : " Success",
            error : 'Error!!',
        }
        var heading = 'Notification';

        if(level === 'info')
        {
            heading = "Information";
        }
        else if (level === 'warning') {
            heading = "Warning";
        }
        else if (level === 'error') {
            heading = "Error !!!";
        }
        else if (level === 'success') {
            heading = "Success";
        }

        $.toast({
            heading: '<strong> ' + heading + ' </strong>',
            text: myMessage,
            position: 'top-right',
            loaderBg: '#3b98b5',
            icon: level,
            hideAfter: 10000,
            stack: 5
        });
    }
</script>
@endsection
