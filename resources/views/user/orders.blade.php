@extends('layouts.user')

@section('title')
    {{ __("Orders") }}
@endsection

@section('content')
<div class="row">
   <div class="col-md-12">
      <!-- START card-->
      <div class="card card-default">
         <div class="card-header">
             <h3>Your Orders</h3>
         </div>
         <div class="card-body">
            <!-- START table-responsive-->
            <br>
            <div class="table-responsive table-bordered">
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
            <!-- END table-responsive-->
         </div>
      </div>
      <!-- END card-->
   </div>
</div>
@endsection
