@extends('layouts.user')

@section('title')
    Tabular Geneology - {{ auth()->user()->name }}
@endsection

@section('content')
<div class="row">
   <div class="col-md-12">
      <!-- START card-->
      <div class="card card-default">
         <div class="card-header">
             <h3>List of all your Recruits</h3>
         </div>
         <div class="card-body">
            <!-- START table-responsive-->
            <br>
            <div class="table-responsive table-bordered">
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Referral Code</th>
                        <th>Level</th>
                        <th>Join Date</th>
                        <th>N<sup>o</sup> of Recruits</th>
                     </tr>
                  </thead>
                  <tbody>

                      @if(empty($data))
                      <tr>
                          <th class="text-center" colspan="6">
                              <strong>
                                  You do not have any recruits
                              </strong>
                          </th>
                      </tr>
                      @else
                        <?php $count = 1; ?>
                        @foreach($data as $key => $value)
                            @foreach($value as $user)
                            <tr>
                                <td> {{ $count++ }} </td>
                                <td> {{ $user->first_name . ' ' . $user->last_name }} </td>
                                <td> {{ $user->ref_code }} </td>
                                <td> Level {{ $key }} </td>
                                <td>
                                    {{ $user->created_at->toFormattedDateString() }}
                                </td>
                                <td> {{ $user->getChildrenCount() }} </td>
                            </tr>
                            @endforeach
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
