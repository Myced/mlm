@extends('layouts.user')

@section('title')
    Commissions - Your commissions
@endsection

@section('content')
<div class="row">
   <div class="col-md-12">
      <!-- START card-->
      <div class="card card-default">
         <div class="card-header">
             <h3>Your Commissions</h3>
         </div>
         <div class="card-body">
            <!-- START table-responsive-->
            <br>
            <div class="table-responsive table-bordered">
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>S/N</th>
                        <th>Time Occured</th>
                        <th>Order By</th>
                        <th>Order Value</th>
                        <th>Level</th>
                        <th>Percentage</th>
                        <th>Commission</th>
                        <th>Collected</th>
                     </tr>
                  </thead>
                  <tbody>

                      <?php
                          $count = 1;
                          $total = 0;
                          $totalPending = 0;
                          $totalCollected = 0;
                      ?>

                      @if($commissions->count() == 0)
                      <tr>
                          <th class="text-center" colspan="10">
                              <strong class="text-primary f-20" style="font-size: 20px" >
                                  You do not have any commissions.
                              </strong>
                          </th>
                      </tr>
                      @else

                        @foreach($commissions as $commission)
                        <?php
                            $total += $commission->commission;
                         ?>
                            <tr>
                                <td> {{ $count++ }} </td>
                                <td> {{ $commission->created_at->diffForHumans() }} </td>
                                <td> {{ $commission->order->user->name }} </td>
                                <td> {{ number_format($commission->order->total) }} FCFA </td>
                                <td> Level {{ $commission->level }} </td>
                                <td> {{ $commission->percentage}} % </td>
                                <th> {{ number_format($commission->commission) }} FCFA </th>
                                <td>
                                    @if($commission->collected == true)
                                    <?php $totalCollected += $commission->commission; ?>
                                    <div class="badge badge-success">
                                        <i class="fa fa-check"></i>
                                        COLLECTED
                                    </div>
                                    @else
                                    <?php $totalPending += $commission->commission; ?>
                                    <div class="badge badge-warning">
                                        <i class="fa fa-clock"></i>
                                        PENDING
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                      @endif

                      <tr class="text-warning">
                          <th class="f-20 text-center" colspan="6">
                              Total Pending
                          </th>
                          <th class="f-20 text-center" colspan="2">
                              {{ number_format($totalPending) }} FCFA
                          </th>
                      </tr>

                      <tr class="text-success">
                          <th class="f-20 text-center" colspan="6">
                              Total Collected
                          </th>
                          <th class="f-20 text-center" colspan="2">
                              {{ number_format($totalCollected) }} FCFA
                          </th>
                      </tr>

                      <tr style="color: #333;">
                          <th class="f-20 text-center" colspan="6">
                              Total Commissions
                          </th>
                          <th class="f-20 text-center" colspan="2">
                              {{ number_format($total) }} FCFA
                          </th>
                      </tr>

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
