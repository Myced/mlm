@extends('layouts.admin')

@section('title')
    {{ __('Edit Brand') }}
@endsection

@section('content')

<div class="content-header">

    <div class="header-section">
        <h1>
            <i class="fa fa-squares"></i>
            {{ $brand->name }}
            <br>
            <small>Edit Brand</small>
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
                    <strong>Edit Brand</strong>
                </h2>
            </div>
            <!-- END General Data Title -->

            <form action="{{ route('brand.update', ['id' => $brand->id ]) }}" method="post"
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
                            class="form-control" value="{{ $brand->name }}"
                            placeholder="Eg Samsung" required>
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
                                <option value="-1"
                                {{ $brand->category_id == -1 ? 'selected' : '' }}>
                                    None (or Multiple Categories)
                                </option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $brand->category_id ? 'selected' : '' }}>
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
                            class="form-control" placeholder="Enter category description"
                            >{!! $brand->description !!}</textarea>
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
        <!-- END General Data Block -->
    </div>

</div>
@endsection
