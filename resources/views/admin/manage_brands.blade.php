@extends('layouts.admin')

@section('title')
    {{ __('Manage Brands') }}
@endsection

@section('content')

<div class="content-header">

    <div class="header-section">
        <h1>
            <i class="fa fa-squares"></i>
            Mange Brands
            <br>
        </h1>
    </div>
</div>

@include('admin_includes.notification')
<div class="row">
    <div class="col-lg-12">
        <!-- General Data Block -->
        <div class="block">
            <!-- General Data Title -->
            <div class="block-title">
                <h2>
                    <i class="gi gi-squares"></i>
                    <strong>All Brands</strong>
                </h2>
            </div>
            <!-- END General Data Title -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>S/N</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Products</th>
                        <th>Action</th>
                    </tr>

                    @if($brands->count() == 0)
                    <tr>
                        <th class="text-center" colspan="8">
                            <strong class="f-16">No brands yet</strong>
                        </th>
                    </tr>
                    @else
                        <?php $count = 1; ?>

                        @foreach($brands as $brand)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{!! $brand->description !!}</td>
                                <td>
                                    {{ is_null($brand->category) ? 'No Category' : $brand->category->name }}
                                </td>
                                <td>{{ $brand->products->count() }}</td>
                                <td>
                                    <a href="{{ route('brand.edit', ['id' => $brand->id ]) }}"
                                        class="btn btn-info"
                                        data-toggle="tooltip" title="Edit Brand">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-toggle="tooltip"
                                        data-id1="{{ $brand->id }}"
                                        title="Delete Brand" class="btn  btn-danger delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>

        </div>
        <!-- END General Data Block -->
    </div>

</div>
@endsection

@section('scripts')

<script>
    $(function()
    {
        $('.delete').click(function(){
            var id = $(this).data('id1');

            if(confirm('Do you want to delete this Brand ?'))
            {
                url = '/admin/brand/' + id + '/destroy';

                window.location.href = url;
            }
        });
    });
</script>
@endsection
