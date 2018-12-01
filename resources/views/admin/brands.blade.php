@extends('layouts.admin')

@section('content')
<!-- Fixed Top Header + Footer Header -->
<div class="content-header">

    <div class="header-section">
        <h1>
            <i class="gi gi-show_big_thumbnails"></i>
            Category Brands
            <br>
            <small>View and Add Brands</small>
        </h1>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li>Brands</li>
    <li><a href="{{ route('categories') }}">Categories</a></li>
    <li><a href="">Brands</a></li>
</ul>
<!-- END Fixed Top Header + Footer Header -->

@include('admin_includes.notification')

<h3 class="sub-header"><strong>Brands</strong></h3>

<div class="row">
    @foreach($brands as $brand)
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect1">
                <div class="widget-simple themed-background text-center">
                    <h4 class="widget-content widget-content-light">
                        <strong> {{ $brand->name }} </strong>
                    </h4>
                </div>
                <div class="widget-extra">
                    <div class="row text-center">
                        <div class="col-xs-4">
                            <h3>
                                <strong>
                                    {{ $brand->category->name }}
                                </strong><br>
                                <small>Category</small>
                            </h3>
                        </div>
                        <div class="col-xs-4">

                        </div>
                        <div class="col-xs-4">
                            <h3>
                                <strong> {{ count($brand->products) }} </strong><br>
                                <small>Products</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach

    <div class="col-sm-6 col-lg-3">
        <a href="#add-brand" data-toggle="modal" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background">
                <h4 class="widget-content-light"><strong>Add New</strong> Brand</h4>
            </div>
            <div class="widget-extra-full text-center">
                <span class="h2 text-info animation-expandOpen">
                    <i class="fa fa-plus"></i>
                </span>
            </div>
        </a>
    </div>
</div>

<!-- modal to add new category  -->
<div id="add-brand" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h2 class="modal-title">
                    <i class="gi gi-show_big_thumbnails"></i>
                    Add New Brand
                </h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ route('brand.store') }}" method="post"
                    class="form-horizontal form-bordered">
                    @csrf
                    <fieldset>
                        <legend>Brand Info</legend>

                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                for="name">
                                Name:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="name" name="name"
                                class="form-control" value="" placeholder="Eg Phones" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                for="name">
                                Category:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-8">
                                <select class="form-control select-chosen" name="category">
                                    <option value="">--Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                for="description">Description</label>
                            <div class="col-md-8">
                                <textarea name="description" rows="8"
                                class="form-control" placeholder="Enter category description"></textarea>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
@endsection
