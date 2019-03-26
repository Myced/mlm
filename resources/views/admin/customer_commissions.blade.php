@extends('layouts.admin_light')

@section('title')
    User Commissions
@endsection


@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="block">

            <div class="block-title">
                <h2> <strong> {{ $user->name }} </strong> Commissions </h2>
            </div>

            <div class="table-responsive">
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

                       @if($user->commissions->count() == 0)
                       <tr>
                           <th class="text-center" colspan="10">
                               <strong class="text-primary f-20" style="font-size: 20px" >
                                   The user does not have any commissions.
                               </strong>
                           </th>
                       </tr>
                       @else

                         @foreach($user->commissions as $commission)
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
                                     <div class="label label-success">
                                         <i class="fa fa-check"></i>
                                         COLLECTED
                                     </div>
                                     @else
                                     <?php $totalPending += $commission->commission; ?>
                                     <div class="label label-warning">
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


        </div>
    </div>

</div>
@endsection
