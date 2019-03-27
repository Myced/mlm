@extends('layouts.admin')

@section('title')
    {{ __("Distributors") }}
@endsection

@section('content')
<!-- eCommerce Dashboard Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-gears"></i>
            MANAGE DISTRIBUTOR
            <br>
            <small> View, Edit and Delete Distributors </small>
        </h1>
    </div>
</div>
<!-- END eCommerce Dashboard Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')

<div class="block full">

    <!-- All Orders Title -->
    <div class="block-title">

        <h2><strong>Manage Your Distributors</strong></h2>
    </div>

    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered dataTable no-footer" role="grid" aria-describedby="example-datatable_info">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">
                        <i class="gi gi-user"></i>
                    </th>
                    <th>Client</th>
                    <th>Email</th>
                    <th>Points</th>
                    <th>Level</th>
                    <th class="text-center">Actions</th>
                </tr>

            </thead>
            <tbody>

                <?php $count = 1; ?>
                @foreach($distributors as $distributor)
                <tr role="row" class="odd">
                    <td class="text-center">{{ $count++ }}</td>

                    <td class="text-center">
                        <img src="{{ $distributor->userData->avatar }}" alt="avatar"
                        class="img-circle" width="75px" height="75px">
                    </td>
                    <td class="">
                        <a href="{{ route('distributor', ['id' => $distributor->id ]) }}">
                            <strong> {{ $distributor->name }} </strong>
                        </a>
                    </td>
                    <td> <strong> {{ $distributor->email }} </strong> </td>
                    <td>
                        <strong>700</strong>
                    </td>
                    <td>
                        <strong> MEMBER </strong>
                    </td>
                    <td class="text-center">
                        <div class="">
                            <a href="{{ route('distributor', ['id' => $distributor->id ]) }}"
                                data-toggle="tooltip" title=""
                                class="btn  btn-primary"
                                data-original-title="View Distributor">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="{{ route('distributor.edit', ['edit' => $distributor->id ]) }}"
                                data-toggle="tooltip" title=""
                                class="btn  btn-info"
                                data-original-title="Edit Distributor">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a href="javascript:void(0)"
                                data-toggle="tooltip" title=""
                                class="btn  btn-danger delete"
                                data-id1="{{ $distributor->id }}"
                                data-original-title="Delete">

                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>
@endsection

@section('scripts')
<script src="/adminn/js/pages/tablesDatatables.js"></script>
<script>
    $(function(){
        TablesDatatables.init();
        $('.delete').click(function(){
            var id = $(this).data('id1');

            if(confirm('Do you want to delete this distributor ?'))
            {
                url = '/admin/distributor/' + id + '/destroy';

                window.location.href = url;
            }
        });
    });
</script>

@endsection
