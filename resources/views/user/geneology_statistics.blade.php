@extends('layouts.user')

@section("title")
    Genelogy Statistics
@endsection

@section('content')
<div class="row">
   <div class="col-xl-4 col-lg-6">
      <!-- START card-->
      <div class="card bg-success-dark border-0">
         <div class="row align-items-center mx-0">
            <div class="col-4 text-center">
               <em class="icon-share fa-3x"></em>
            </div>
            <div class="col-8 py-4 bg-success rounded-right">
               <div class="h1 m-0 text-bold">{{ $stats->directRecruitsCount() }}</div>
               <div class="text-uppercase">Direct Recruits</div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-4 col-lg-6">
      <!-- START card-->
      <div class="card bg-danger-dark border-0">
         <div class="row align-items-center mx-0">
            <div class="col-4 text-center">
               <em class="icon-star fa-3x"></em>
            </div>
            <div class="col-8 py-4 bg-danger rounded-right">
               <div class="h1 m-0 text-bold">{{ $stats->totalRecruitsCount() }}</div>
               <div class="text-uppercase">Total Recruits</div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-4 col-lg-12">
      <!-- START card-->
      <div class="card bg-warning-dark border-0">
         <div class="row align-items-center mx-0">
            <div class="col-4 text-center">
               <em class="icon-trophy fa-3x"></em>
            </div>
            <div class="col-8 py-4 bg-warning rounded-right">
               <div class="h1 m-0 text-bold">10</div>
               <div class="text-uppercase">Benefits</div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4>You Level Stats</h4>
            </div>

            <div class="card-body">
                <ul class="list-group">
                    @for($i = 1; $i <= $stats->depth; $i++)
                    <li class="list-group-item">
                        <strong>Level {{ $i }} :</strong>
                        <span class="badge badge-info float-right">
                            {{ $stats->getLevelCount($i) }}
                        </span>
                    </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Your recent recruits</h4>

            </div>

            <div class="card-body">
                <div class="table-responsive table-bordered">
                    <table class="table table-bordered table-hover">
                       <thead>
                          <tr>
                             <th>S/N</th>
                             <th>Full Name</th>
                             <th>Level</th>
                             <th>Join Date</th>
                             <th>N<sup>o</sup> of Recruits</th>
                          </tr>
                       </thead>
                       <tbody>

                           @if(empty($stats->latestRecruits()))
                           <tr>
                               <th class="text-center" colspan="6">
                                   <strong>
                                       You do not have any recruits
                                   </strong>
                               </th>
                           </tr>
                           @else
                             <?php $count = 1; ?>
                             @foreach($stats->latestRecruits() as $user)
                             <tr>
                                 <td> {{ $count++ }} </td>
                                 <td> {{ $user->first_name . ' ' . $user->last_name }} </td>
                                 <td> Level 1 </td>
                                 <td>
                                     {{ $user->created_at->toFormattedDateString() }}
                                 </td>
                                 <td> {{ $user->getChildrenCount() }} </td>
                             </tr>
                             @endforeach
                           @endif

                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
