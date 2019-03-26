@extends('layouts.admin_light')

@section('title')
    User Geneology (Table)
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="block">

            <div class="block-title">
                <h2> Tabular Geneology <strong> - {{ $user->name }} </strong> </h2>
            </div>

            <div class="table-responsive">
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

                       @if(empty($data))
                       <tr>
                           <th class="text-center" colspan="6">
                               <strong>
                                   This customer does not have any recruits
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


        </div>
    </div>

</div>
@endsection
