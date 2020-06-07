@extends('layouts.admin')

@section('title')
    {{ __('Edit Category') }}
@endsection

@section('content')

<div class="content-header">

    <div class="header-section">
        <h1>
            <i class="fa fa-squares"></i>
            {{ $category->name }}
            <br>
            <small>Edit Category</small>
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
                    <strong>Edit Category</strong>
                </h2>
            </div>
            <!-- END General Data Title -->

            <form action="{{ route('category.update', ['id' => $category->id ]) }}" method="post"
                class="form-horizontal form-bordered">
                @csrf
                <fieldset>
                    <legend>Category Info</legend>

                    <div class="form-group">
                        <label class="col-md-4 control-label"
                            for="name">
                            Name:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="name" name="name"
                            class="form-control" value="{{ $category->name }}"
                            placeholder="Eg Phones" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"
                            for="description">Description</label>
                        <div class="col-md-8">
                            <textarea name="description" rows="8"
                            class="form-control" placeholder="Enter category description"
                            >{!! $category->description !!}</textarea>
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
