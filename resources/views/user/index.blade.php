@extends('layouts.user')

@section('title')
    {{ __("Dashboard") }}
@endsection

@section('content')
<!-- START cards box-->
<div class="row">
  <div class="col-xl-3 col-md-6">
    <!-- START card-->
    <div class="card flex-row align-items-center align-items-stretch border-0">
      <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left">
        <em class="icon-cloud-upload fa-3x"></em>
      </div>
      <div class="col-8 py-3 bg-primary rounded-right">
        <div class="h4 mt-0">{{ $user->created_at->toFormattedDateString() }}</div>
        <div class="text-uppercase">Join Date</div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <!-- START card-->
    <div class="card flex-row align-items-center align-items-stretch border-0">
      <div class="col-4 d-flex align-items-center bg-purple-dark justify-content-center rounded-left">
        <em class="icon-people fa-3x"></em>
      </div>
      <div class="col-8 py-3 bg-purple rounded-right">
        <div class="h2 mt-0">{{ $user->getChildrenCount() }}
        </div>
        <div class="text-uppercase">Recruits</div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-12">
    <!-- START card-->
    <div class="card flex-row align-items-center align-items-stretch border-0">
      <div class="col-4 d-flex align-items-center bg-green-dark justify-content-center rounded-left">
        <em class="icon-present fa-3x"></em>
      </div>
      <div class="col-8 py-3 bg-green rounded-right">
        <div class="h2 mt-0">{{ count($user->user->orders) }}</div>
        <div class="text-uppercase">Orders</div>
      </div>
    </div>
  </div>
</div>
<!-- END cards box-->
<div class="row">
  <!-- START dashboard main content-->
  <div class="col-xl-12">
    <!-- START chart-->
    <div class="row">
      <div class="col-xl-12">
        <!-- START card-->
        <div class="card card-default card-demo">
          <div class="card-header">

            <div class="card-title">Latest Orders</div>

          </div>
          <div class="card-wrapper">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                       <thead>
                          <tr>
                             <th>S/N</th>
                             <th>Date</th>
                             <th>Order N<sup>o</sup></th>
                             <th>N<sup>o</sup> of Items</th>
                             <th>Total</th>
                             <th>Payment Method</th>
                             <th>Payment Status</th>
                             <th>Order Status</th>
                             <th>Action</th>
                          </tr>
                       </thead>
                       <tbody>

                           @if(empty($orders))
                           <tr>
                               <th class="text-center" colspan="10">
                                   <strong class="text-primary f-20" style="font-size: 20px" >
                                       You do not have any orders
                                   </strong>
                               </th>
                           </tr>
                           @else
                             <?php $count = 1; ?>
                             @foreach($orders as $order)
                                 <tr>
                                     <td> {{ $count++ }} </td>
                                     <td> {{ $order->created_at->format('d M, Y') }} </td>
                                     <td> {{ $order->order_code }} </td>
                                     <td> {{ $order->item_number }} </td>
                                     <td> {{ number_format($order->total) }} FCFA </td>
                                     <td> {{ \App\OrderStatus::format($order->payment_method) }} </td>
                                     <td>
                                         @if($order->payment_status == true)
                                         <div class="badge badge-success">
                                             <i class="fa fa-check"></i>
                                             PAID
                                         </div>
                                         @else
                                         <div class="badge badge-danger">
                                             <i class="fa fa-times"></i>
                                             UNPAID
                                         </div>
                                         @endif
                                     </td>
                                     <td>
                                         <div class="badge badge-{{ \App\OrderStatus::getClass($order->status) }}">
                                             {{ $order->status }}
                                         </div>
                                     </td>
                                     <td>
                                         <a href="{{ route('user.order.detail', ['code' => $order->order_code]) }}"
                                             class="btn btn-info "
                                             data-toggle="tooltip" data-placement="top" title="Order Details">
                                             <strong>Details</strong>
                                         </a>
                                     </td>
                                 </tr>
                             @endforeach
                           @endif

                       </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        <!-- END card-->
      </div>
    </div>
    <!-- END chart-->
</div>
@endsection
