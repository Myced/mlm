@extends('layouts.admin')

@section('title')
    {{ __("Featured Products") }}
@endsection

@section('content')
    <!-- Fixed Top Header + Footer Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-show_big_thumbnails"></i>
                Featured Products.
                <br>
                <small> Products that are promoted on the homepage</small>
            </h1>
        </div>
    </div>

    <!-- END Fixed Top Header + Footer Header -->


    <!-- Dummy Content -->
    @include('admin_includes.notification')

    @if($products->count() < 7)
    <form class="" action="{{ route('products.featured.add') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <select class="form-control select-select2" name="product">
                    @foreach($items as $item)
                        @if(!$products->contains($item->id))
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div class="col-md-1">
                <button type="submit" class="btn btn-flat btn-info">
                    <strong>Add Product</strong>
                </button>
            </div>
        </div>
    </form>
    @endif
    <br>

    <!-- All Products Block -->
    <div class="block full">
        <!-- All Products Title -->
        <div class="block-title">

            <h2><strong>Featured Products</strong> </h2>
        </div>
        <!-- END All Products Title -->

        <!-- All Products Content -->
        <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 70px;">ID</th>
                    <th>Product Name</th>
                    <th class="text-center hidden-xs">Price (FCFA) </th>
                    <th class="text-center"> Percent Off </th>
                    <th class="hidden-xs text-center">Status</th>
                    <th class="text-center"> Available </th>
                    <th class="hidden-xs text-center">Added</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($products as $product)
                    <tr>
                        <td class="text-center">
                            <a href="{{ route('admin.product.detail', ['id' => $product->id]) }}">
                                <strong> {{ $product->model()->code }} </strong>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.product.detail', ['id' => $product->id]) }}">
                                {{ $product->model()->name }}
                            </a>
                        </td>
                        <td class="text-center hidden-xs">
                            <strong> {{ number_format($product->model()->price) }} </strong>
                        </td>

                        <td class="text-center">
                            @if($product->model()->promoted)
                                <strong class="label label-danger btn-flat">
                                    - {{ $product->model()->percent_off }} %
                                </strong>
                            @endif
                        </td>

                        <td class="text-center">
                            @if($product->is_main)
                                <span class="label label-primary" >MAIN</span>
                            @endif
                        </td>
                        <td class="hidden-xs text-center">
                            @if($product->model()->quantity == 0)
                                <span class="label label-danger" >Out of Stock</span>
                            @else
                                <span class="label label-success">Available ({{ $product->model()->quantity }})</span>
                            @endif
                        </td>
                        <td class="hidden-xs text-center">{{ $product->created_at->diffForHumans() }}</td>
                        <td class="text-center">
                            <div class="">
                                @if(!$product->is_main)
                                <a href="{{ route('products.featured.main', ['id' => $product->id]) }}"
                                    data-toggle="tooltip"
                                    title="Set as Main Featured Product" class="btn btn-default">
                                    <i class="fa fa-check"></i>
                                </a>
                                @endif
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

                if(confirm('Do you want to delete this featured product ?'))
                {
                    url = '/admin/product/featured/' + id + '/destroy';

                    window.location.href = url;
                }
            });
        });
    </script>
@endsection
