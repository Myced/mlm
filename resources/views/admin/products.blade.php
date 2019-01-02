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
                    <th class="hidden-xs">Status</th>
                    <th class="hidden-xs text-center">Added</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($products as $product)
                    <tr>
                        <td class="text-center">
                