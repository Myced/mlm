@extends('layouts.admin_light')

@section('title')
    {{ $product->name }} - Movements
@endsection

@section('styles')
<link rel="stylesheet" href="/adminn/css/font-awesome.css">
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="block">

            <div class="block-title">
                <h2> Product Movements <strong> ({{ $product->name }} - {{ $product->code }}) </strong> </h2>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>S/N</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Previous Qty</th>
                        <th>Change</th>
                        <th>New Qty</th>
                        <th>Comment</th>
                    </tr>

                    @if($product->movements->count() == 0)
                    <tr>
                        <td colspan="7" class="text-center">
                            <strong>No Product Movements</strong>
                        </td>
                    </tr>
                    @else
                        <?php
                        $count = 1;
                         ?>

                         @foreach($product->movements as $movement)
                            <?php if($count == 11) break; ?>
                         <tr>
                             <td>{{ $count++ }}</td>
                             <td>{{ $movement->created_at->format(\App\Functions::DATE_FORMAT) }}</td>
                             <td>{{ $movement->created_at->format('h:i a') }}</td>
                             <td>{{ $movement->old_quantity }}</td>
                             <td>{{ $movement->difference }}</td>
                             <td>
                                 @if($movement->old_quantity < $movement->new_quantity)
                                    <strong class="text-success">
                                        <i class="fa fa-chevron-up"></i>
                                        {{ $movement->new_quantity }}
                                    </strong>
                                 @else
                                     <strong class="text-danger">
                                         <i class="fa fa-chevron-down"></i>
                                         {{ $movement->new_quantity }}
                                     </strong>
                                 @endif
                             </td>
                             <td>
                                 {!! $movement->comment !!}
                             </td>
                         </tr>
                         @endforeach
                    @endif
                </table>
            </div>


        </div>
    </div>

</div>
@endsection
