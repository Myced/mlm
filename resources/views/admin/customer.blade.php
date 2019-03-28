@extends('layouts.admin')

@section('title')
    {{ $user->name }}
@endsection

@section('content')
<!-- eCommerce Dashboard Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-user"></i>
            {{ $user->name }}
            (
                {{ $user->userData->memberLevel()->title }}
                -
                {{ $user->userData->membership_level }}
            )
            <br>
            <small>
                {{ $user->email }}
                ({{ number_format($user->userData->points, 1) }} pts)
            </small>
        </h1>
    </div>
</div>
<!-- END eCommerce Dashboard Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')


<div class="row">
    <div class="col-md-12">
        <a href="{{ route('customers') }}"
            data-toggle="tooltip" title="Back to Customers"
            class="btn btn-info"
            data-original-title="Back to customers">
            <i class="fa fa-arrow-left"></i>
            Back to Customers
        </a>
    </div>
</div>
<br>

<!-- Customer Content -->
<div class="row">
    <div class="col-lg-4">
        <!-- Customer Info Block -->
        <div class="block">
            <!-- Customer Info Title -->
            <div class="block-title">
                <h2><i class="fa fa-file-o"></i> <strong>Customer</strong> Info</h2>
            </div>
            <!-- END Customer Info Title -->

            <!-- Customer Info -->
            <div class="block-section text-center">
                <a href="javascript:void(0)">
                    <img src="{{ $user->userData->avatar }}"
                    width="100px" height="100px"
                    alt="avatar" class="img-circle">
                </a>
                <h3>
                    <strong>{{ $user->name }}</strong><br><small></small>
                </h3>
            </div>
            <table class="table table-borderless table-striped table-vcenter">
                <tbody>
                    <tr>
                        <td class="text-right"><strong>Birthdate</strong></td>
                        <td>{{ $user->userData->dob }}</td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <strong>Registration</strong>
                        </td>
                        <td>{{ $user->created_at->format(\App\Functions::DATE_FORMAT) }}</td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <strong>Email</strong>
                        </td>
                        <td>{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <td class="text-right">
                            <strong>Telephone</strong>
                        </td>
                        <td>{{ $user->userData->tel }}</td>
                    </tr>

                    <tr>
                        <td class="text-right">
                            <strong>Region</strong>
                        </td>
                        <td>{{ $user->userData->region->name }}</td>
                    </tr>

                    <tr>
                        <td class="text-right">
                            <strong>Address</strong>
                        </td>
                        <td>{{ $user->userData->address }}</td>
                    </tr>

                    <tr>
                        <td class="text-right">
                            <strong>Recruited By</strong>
                        </td>
                        <td>
                            <strong>{{ $user->userData->recruiterName() }}</strong>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-right">
                            <strong>Points</strong>
                        </td>
                        <td>{{ number_format($user->userData->points, 1) }}</td>
                    </tr>

                    <tr>
                        <td class="text-right">
                            <strong>Membership Level</strong>
                        </td>
                        <td>{{ $user->userData->memberLevel()->title }}</td>
                    </tr>

                    <tr>
                        <td class="text-right">
                            <strong>Referral Code</strong>
                        </td>
                        <td>{{ $user->userData->ref_code }}</td>
                    </tr>

                    <tr>
                        <td class="text-right"><strong>Language</strong></td>
                        <td>English (UK)</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Status</strong></td>
                        <td><span class="label label-success"><i class="fa fa-check"></i> Active</span></td>
                    </tr>
                </tbody>
            </table>
            <!-- END Customer Info -->
        </div>
        <!-- END Customer Info Block -->

        <!-- address -->
        <div class="block">
            <!-- Billing Address Title -->
            <div class="block-title">
                <h2>Billing Address</h2>
            </div>
            <!-- END Billing Address Title -->

            <!-- Billing Address Content -->
            <h4><strong>{{ $user->name }}</strong></h4>
            <address>
                {{ $user->userData->address }}<br>
                <i class="fa fa-phone"></i> {{ $user->userData->tel }}<br>
                <i class="fa fa-envelope-o"></i>
                <a href="javascript:void(0)">{{ $user->email }}</a>
            </address>
            <!-- END Billing Address Content -->
        </div>
        <!-- end address -->

        <!-- Quick Stats Block -->
        <div class="block">
            <!-- Quick Stats Title -->
            <div class="block-title">
                <h2><i class="fa fa-line-chart"></i> <strong>Quick</strong> Stats</h2>
            </div>
            <!-- END Quick Stats Title -->

            <!-- Quick Stats Content -->
            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                <div class="widget-simple">
                    <div class="widget-icon pull-right themed-background">
                        <i class="fa fa-truck"></i>
                    </div>
                    <h4 class="text-left">
                        <strong>{{ count($user->orders) }}</strong><br><small>Orders in Total</small>
                    </h4>
                </div>
            </a>
            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                <div class="widget-simple">
                    <div class="widget-icon pull-right themed-background-success">
                        <i class="fa fa-usd"></i>
                    </div>
                    <h4 class="text-left text-success">
                        <strong>
                            {{ $user->orderValue() }} F
                        </strong>
                        <br>
                        <small>Orders Value</small>
                    </h4>
                </div>
            </a>
            <!-- <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                <div class="widget-simple">
                    <div class="widget-icon pull-right themed-background-warning">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <h4 class="text-left text-warning">
                        <strong>3</strong> (F 517,00)<br><small>Products in Cart</small>
                    </h4>
                </div>
            </a> -->
            <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                <div class="widget-simple">
                    <div class="widget-icon pull-right themed-background-info">
                        <i class="fa fa-group"></i>
                    </div>
                    <h4 class="text-left text-info">
                        <strong>{{ $user->userData->getChildrenCount() }}</strong><br><small>Referred Members</small>
                    </h4>
                </div>
            </a>

            <!-- END Quick Stats Content -->
        </div>
        <!-- END Quick Stats Block -->
    </div>
    <div class="col-lg-8">
        <!-- Orders Block -->
        <div class="block">
            <!-- Orders Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <span class="label label-success"><strong>{{ $user->orderValue() }} F</strong></span>
                </div>
                <h2><i class="fa fa-truck"></i> <strong>Orders</strong> ({{ count($user->orders) }})</h2>
            </div>
            <!-- END Orders Title -->

            <!-- Orders Content -->
            <table class="table table-bordered table-striped table-vcenter">
                <tbody>
                    @foreach($user->orders as $order)
                    <tr>
                        <td class="text-center" style="width: 100px;">
                            <a href="{{ route('order.details', ['code' => $order->order_code]) }}">
                                <strong>{{ $order->order_code }}</strong>
                            </a>
                        </td>
                        <td class="hidden-xs" style="width: 15%;">
                            <a href="javascript:void(0)">{{ $order->item_number }} Products</a>
                        </td>
                        <td class="text-right hidden-xs" style="width: 10%;">
                            <strong>{{ number_format($order->total) }}</strong>
                        </td>
                        <td>
                            <span class="label label-{{ \App\OrderStatus::getClass($order->status) }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="hidden-xs">
                            {{ \App\PaymentMethods::format($order->payment_method) }}
                        </td>
                        <td class="hidden-xs text-center">
                            {{ $order->created_at->format(\App\Functions::DATE_FORMAT) }}
                        </td>
                        <td class="text-center" style="width: 70px;">
                            <div class="">
                                <a href="{{ route('order.details', ['code' => $order->order_code]) }}"
                                data-toggle="tooltip" title=""
                                class="btn btn-default"
                                data-original-title="View Order">
                                <i class="fa fa-eye"></i>
                            </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <!-- END Orders Content -->
        </div>
        <!-- END Orders Block -->




        <!-- Referred Members Block -->
        <div class="block">
            <!-- Referred Members Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)"
                        class="btn btn-alt btn-sm btn-default"
                        data-toggle="tooltip" title="User Geneology Tree"
                        onclick="window.open('{{ route('customer.tree', ['user' => $user->id]) }}',
                                    'printing', 'width=1200,height=720')">
                        <i class="fa fa-users"></i>
                        Geneology Tree
                    </a>

                    <a href="javascript:void(0)"
                        class="btn btn-alt btn-sm btn-default"
                        data-toggle="tooltip"
                        title="Show User Tabular Tree"
                        onclick="window.open('{{ route('customer.table', ['user' => $user->id]) }}',
                                    'printing', 'width=1200,height=720')">
                        <i class="fa fa-list"></i>
                        Tabular Geneology
                    </a>
                </div>
                <h2>
                    <i class="fa fa-group"></i>
                    <strong>Referred</strong> Members {{ $user->userData->getChildrenCount() }}
                </h2>
            </div>
            <!-- END Referred Members Title -->

            <!-- Referred Members Content -->
            <div class="row">

                @foreach($user->userData->getChildren() as $child)
                <div class="col-lg-6">
                    <a href="{{ route('customer', ['user' => $child->user->id]) }}"
                        class="widget widget-hover-effect2 themed-background-muted-light">
                        <div class="widget-simple">
                            <img src="{{ $child->avatar }}"
                            alt="avatar" class="widget-image img-circle pull-left">
                            <h4 class="widget-content text-right">
                                <strong>{{ $child->user->name }}</strong>
                                <small>Orders Value:
                                    <strong> {{ $child->user->orderValue() }} F</strong>
                                </small>
                            </h4>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
            <!-- END Referred Members Content -->
        </div>
        <!-- END Referred Members Block -->


        <div class="block">
            <div class="block-title">

                <div class="block-options pull-right">

                    <a href="javascript:void(0)"
                        class="btn btn-alt btn-sm btn-default"
                        data-toggle="tooltip"
                        title="See all commissions"
                        onclick="window.open('{{ route('customer.commissions', ['user' => $user->id]) }}',
                                    'Commissions', 'width=1200,height=720')">
                        <i class="fa fa-list"></i>
                        All Commissions
                    </a>
                </div>

                <h2>
                    <i class="fa fa-wallet"></i>
                    <strong>Commissions Received</strong>
                </h2>
            </div>
            <div class="table-responsive">

                <table class="table table-bordered table-hover">
                   <thead>
                      <tr>
                         <th>Time Occured</th>
                         <th>Order By</th>
                         <th>Level</th>
                         <th>Commission</th>
                         <th>Collected</th>
                      </tr>
                   </thead>
                   <tbody>

                       @if($user->latestCommissions()->count() == 0)
                       <tr>
                           <th class="text-center" colspan="10">
                               <strong class="text-primary f-20" style="font-size: 20px" >
                                   The customer does not have any commissions.
                               </strong>
                           </th>
                       </tr>
                       @else
                         @foreach($user->latestCommissions() as $commission)

                             <tr>
                                 <td> {{ $commission->created_at->diffForHumans() }} </td>
                                 <td>
                                     @if($commission->order_id == '-1')
                                        {{ __('Level Upgrade') }}
                                     @else
                                        {{ $commission->order->user->name }}
                                     @endif
                                 </td>

                                 <td>
                                     {{ $commission->order_id != '-1' ? 'Level ' : '' }}
                                     {{ $commission->level }}
                                 </td>
                                 <th> {{ number_format($commission->commission) }} FCFA </th>
                                 <td>
                                     @if($commission->collected == true)
                                     <div class="label label-success">
                                         <i class="fa fa-check"></i>
                                         COLLECTED
                                     </div>
                                     @else
                                     <div class="label label-warning">
                                         <i class="fa fa-clock"></i>
                                         PENDING
                                     </div>
                                     @endif
                                 </td>
                             </tr>
                         @endforeach
                       @endif

                   </tbody>
                </table>

            </div>
        </div>

        <!-- Private Notes Block -->
        <div class="block full">
            <!-- Private Notes Title -->
            <div class="block-title">
                <h2>
                    <i class="fa fa-file-text-o"></i>
                    <strong>Private</strong> Notes
                </h2>
            </div>
            <!-- END Private Notes Title -->

            <!-- Private Notes Content -->
            <div class="alert alert-info">
                <i class="fa fa-fw fa-info-circle"></i> This note will be displayed to all employees but not to customers.
            </div>
            <form action="#" method="post" onsubmit="return false;">
                <textarea id="private-note" name="private-note" class="form-control" rows="4" placeholder="Your note.."></textarea>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Note</button>
            </form>
            <!-- END Private Notes Content -->
        </div>
        <!-- END Private Notes Block -->
    </div>
</div>
<!-- END Customer Content -->

@endsection
