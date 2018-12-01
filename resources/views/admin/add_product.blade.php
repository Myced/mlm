@extends('layouts.admin')

@section('title')
    {{ __('Add Product') }}
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <!-- General Data Block -->
        <div class="block">
            <!-- General Data Title -->
            <div class="block-title">
                <h2><i class="fa fa-pencil"></i> <strong>General</strong> Product Details</h2>
            </div>
            <!-- END General Data Title -->

            <!-- General Data Content -->

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-id">Product Code</label>
                    <div class="col-md-9">
                        <input type="text" id="product-id" name="product_code" class="form-control" value="6825">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" id="product-name" name="product_name"
                        class="form-control" placeholder="Enter product name.." required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-description">Description</label>
                    <div class="col-md-9">
                        <!-- CKEditor, you just need to include the plugin (see at the bottom of this page) and add the class 'ckeditor' to your textarea -->
                        <!-- More info can be found at http://ckeditor.com -->
                        <textarea id="product-description" name="description_long" class="ckeditor"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-short-description">
                        Short Description
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <textarea id="product-short-description" name="description"
                        class="form-control" rows="5" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-category">Category</label>
                    <div class="col-md-8">
                        <select id="product-category" name="category" class="select-chosen" data-placeholder="Choose Category.." style="width: 250px;">
                            <option> -- Category --</option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-brand">Category</label>
                    <div class="col-md-8">
                        <select id="product-brand" name="brand" class="select-chosen" data-placeholder="Choose Category.." style="width: 250px;">
                            <option> -- Brand --</option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-price">Price</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                            <input type="text" id="product-price" name="product-price" class="form-control" placeholder="0,00">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Condition</label>
                    <div class="col-md-9">
                        <label class="radio-inline" for="product-condition-new">
                            <input type="radio" id="product-condition-new" name="product-condition" value="condition_new" checked> New
                        </label>
                        <label class="radio-inline" for="product-condition-used">
                            <input type="radio" id="product-condition-used" name="product-condition" value="condition_used"> Used
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Published?</label>
                    <div class="col-md-9">
                        <label class="switch switch-primary">
                            <input type="checkbox" id="product-status" name="product-status" checked><span></span>
                        </label>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                    </div>
                </div>
            <!-- END General Data Content -->

        </div>
        <!-- END General Data Block -->
    </div>
    <div class="col-lg-6">
        <!-- Meta Data Block -->
        <div class="block">
            <!-- Meta Data Title -->
            <div class="block-title">
                <h2><i class="fa fa-google"></i> <strong>Meta</strong> Data</h2>
            </div>
            <!-- END Meta Data Title -->

            <!-- Meta Data Content -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="product-meta-title">Meta Title</label>
                <div class="col-md-9">
                    <input type="text" id="product-meta-title" name="product-meta-title" class="form-control" placeholder="Enter meta title..">
                    <div class="help-block">55 Characters Max</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="product-meta-keywords">Meta Keywords</label>
                <div class="col-md-9">
                    <input type="text" id="product-meta-keywords" name="product-meta-keywords" class="form-control" placeholder="keyword1, keyword2, keyword3">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="product-meta-description">Meta Description</label>
                <div class="col-md-9">
                    <textarea id="product-meta-description" name="product-meta-description" class="form-control" rows="6" placeholder="Enter meta description.."></textarea>
                    <div class="help-block">115 Characters Max</div>
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                </div>
            </div>
            <!-- END Meta Data Content -->
        </div>
        <!-- END Meta Data Block -->

    </div>
</div>
<!-- END Product Edit Content -->
@endsection

@section('scripts')
<script src="/adminn/js/helpers/ckeditor/ckeditor.js"></script>
@endsection
