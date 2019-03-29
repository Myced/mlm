@extends('layouts.admin')

@section('title')
    {{ __("Products") }}
@endsection

@section('content')
    <!-- Fixed Top Header + Footer Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-show_big_thumbnails"></i>
                Products
                <br>
                <small> + and Quick Statistics</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Products</li>
        <li><a href="route('product.create')">Add Product</a></li>
        <li><a href="route('admin.products')">All Products</a></li>
    </ul>
    <!-- END Fixed Top Header + Footer Header -->


    <!-- Dummy Content -->
    @include('admin_includes.notification')

    <!-- Quick Stats -->
    <div class="row text-center">
        <div class="col-sm-6 col-lg-3">
            <a href="{{route('product.create')}}" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-success">
                    <h4 class="widget-content-light"><strong>Add New</strong> Product</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-danger">
                    <h4 class="widget-content-light"><strong>Out of</strong> Stock</h4>
                </div>
                <div class="widget-extra-full">
                    <span class="h2 text-danger animation-expandOpen">
                        {{ $out }}
                    </span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Top</strong> Sellers</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">20</span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>All</strong> Products</h4>
                </div>
                <div class="widget-extra-full">
                    <span class="h2 themed-color-dark animation-expandOpen">
                        {{ number_format(count($products)) }}
                    </span>
                </div>
            </a>
        </div>
    </div>
    <!-- END Quick Stats -->

    <!-- All Products Block -->
    <div class="block full">
        <!-- All Products Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
            </div>
            <h2><strong>All</strong> Products</h2>
        </div>
        <!-- END All Products Title -->

        <!-- All Products Content -->
        <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 70px;">ID</th>
                    <th>Product Name</th>
                    <th class="text-right hidden-xs">Price (FCFA) </th>
                    <th> Percent Off </th>
                    <th class="hidden-xs">Status</th>
                    <th> Published </th>
                    <th class="hidden-xs text-center">Added</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($products as $product)
                    <tr>
                        <td class="text-center">
                            <a href="{{ route('admin.product.detail', ['id' => $product->id]) }}">
                                <strong> {{ $product->code }} </strong>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.product.detail', ['id' => $product->id]) }}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td class="text-right hidden-xs">
                            <strong> {{ number_format($product->price) }} </strong>
                        </td>

                        <td class="text-center">
                            @if($product->promoted)
                                <strong class="label label-danger btn-flat">
                                    - {{ $product->percent_off }} %
                                </strong>
                            @endif
                        </td>
                        <td class="hidden-xs">
                            @if($product->quantity == 0)
                                <span class="label label-danger" >Out of Stock</span>
                            @else
                                <span class="label label-success">Available ({{ $product->quantity }})</span>
                            @endif
                        </td>

                        <td>
                            @if($product->published)
                                <span class="label label-primary" >PUBLISHED</span>
                            @else
                                <span class="label label-warning" >PENDING</span>
                            @endif
                        </td>
                        <td class="hidden-xs text-center">{{ $product->created_at->diffForHumans() }}</td>
                        <td class="text-center">
                            <div class="">
                                <a href="{{ route('product.edit', ['id' => $product->id]) }}" data-toggle="tooltip"
                                    title="Edit" class="btn btn-default">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="javascript:void(0)" data-toggle="tooltip"
                                    data-id1="{{ $product->id }}"
                                    title="Delete" class="btn  btn-danger delete">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <!-- END All Products Content -->
    </div>
    <!-- END All Products Block -->
@endsection

@section('scripts')
    <script src="/adminn/js/pages/ecomProducts.js"></script>
    <script>
        $(function()
        {
            EcomProducts.init();
            $('.delete').click(function(){
                var id = $(this).data('id1');

                if(confirm('Do you want to delete this product ?'))
                {
                    url = '/admin/product/' + id + '/destroy';

                    window.location.href = url;
                }
            });
        });
    </script>
@endsection
