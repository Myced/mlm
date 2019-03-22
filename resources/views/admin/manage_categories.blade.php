@extends('layouts.admin')

@section('title')
    {{ __('Manage Categories') }}
@endsection

@section('content')

<div class="content-header">

    <div class="header-section">
        <h1>
            <i class="fa fa-squares"></i>
            Mange Categories
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
                    <strong>All Categories</strong>
                </h2>
            </div>
            <!-- END General Data Title -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>S/N</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Brands</th>
                        <th>Products</th>
                        <th>Action</th>
                    </tr>

                    @if($categories->count() == 0)
                    <tr>
                        <th class="text-center" colspan="8">
                            <strong class="f-16">No Categories yet</strong>
                        </th>
                    </tr>
                    @else
                        <?php $count = 1; ?>

                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{!! $category->description !!}</td>
                                <td>{{ $category->brands->count() }}</td>
                                <td>{{ $category->products->count() }}</td>
                                <td>
                                    <a href="{{ route('category.edit', ['id' => $category->id ]) }}"
                                        class="btn btn-info"
                                        data-toggle="tooltip" title="Edit Category">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-toggle="tooltip"
                                        data-id1="{{ $category->id }}"
                                        title="Delete Category" class="btn  btn-danger delete">
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

            if(confirm('Do you want to delete this category ?'))
            {
                url = '/admin/category/' + id + '/destroy';

                window.location.href = url;
            }
        });
    });
</script>
@endsection
