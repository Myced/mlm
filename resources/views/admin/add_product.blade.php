@extends('layouts.admin')

@section('title')
    {{ __('Add Product') }}
@endsection

@section('content')

<div class="content-header">

    <div class="header-section">
        <h1>
            <i class="gi gi-plus"></i>
            Add New Product
            <br>
            <small>New Product</small>
        </h1>
    </div>
</div>

@include('admin_includes.notification')

<div class="row">
    <div class="col-md-12">
        <a href="{{ route('admin.products') }}"
            class="btn btn-warning">
            <i class="fa fa-arrow-left"></i>
            Back to Products
        </a>
    </div>
</div>

<br>

<form action="{{ route('product.store') }}" method="post"
    enctype="multipart/form-data"
    class="form-horizontal " >
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <!-- General Data Block -->
            <div class="block">
                <!-- General Data Title -->
                <div class="block-title">
                    <h2>
                        <i class="fa fa-pencil"></i>
                        <strong>General</strong> Product Details
                    </h2>
                </div>
                <!-- END General Data Title -->

                <!-- General Data Content -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-id">Product Code</label>
                        <div class="col-md-9">
                            <input type="text" id="product-id" name="code"
                            class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-name">
                            Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                            <input type="text" id="product-name" name="name"
                            class="form-control" placeholder="Enter product name.." required>
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
                        <label class="col-md-3 control-label" for="product-description">
                            Full Description
                        </label>
                        <div class="col-md-9">
                            <textarea id="product-description" name="description_long"
                            class="ckeditor"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-category">
                            Category
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <select id="product-category" name="category" class="select-chosen form-control"
                                data-placeholder="Choose Category.." style="width: 250px;">
                                <option value=""> -- Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-brand">
                            Brand
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <select id="product-brand" name="brand" class="select-chosen"
                                data-placeholder="Choose Category.." style="width: 250px;">
                                <option value=""> -- Select Brand --</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-price">
                            Cost Price
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon">FCFA</div>
                                <input type="text" id="cost-price" name="cost_price"
                                    class="form-control" placeholder="3,000">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-price">
                            Selling Price
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon">FCFA</div>
                                <input type="text" id="product-price" name="price"
                                    class="form-control" placeholder="3.000">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="quantity">
                            Quantity
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="quantity" name="quantity"
                                class="form-control" placeholder="eg 34">
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
                                <input type="checkbox" id="product-status" name="published"
                                checked><span></span>
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
                    <h2><i class="fa fa-picture"></i> <strong>Image</strong></h2>
                </div>
                <!-- END Meta Data Title -->

                <!-- Meta Data Content -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-meta-keywords">
                        Product Keywords (Tags)
                    </label>
                    <div class="col-md-9">
                        <input type="text" id="example-tags" name="tags"
                        class="input-tags" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">
                        Tiny Image
                        <span class="required">*</span>
                        <br>
                        (80 x 80)
                    </label>
                    <div class="col-md-9">
                        <input type="file" name="tiny" value="" class="form-control"
                            required id="image1">
                            <br>
                            <img src="" alt="" id="img1"
                                width="100px" height="100px">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">
                        Thumbnail
                        <span class="required">*</span>
                        (214 x 214)
                    </label>
                    <div class="col-md-9">
                        <input type="file" name="thumbnail" value="" class="form-control"
                            required id="image2">
                            <br>
                            <img src="" alt="" id="img2"
                                width="100px" height="100px">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" >
                        Cover Image
                        <span class="required">*</span>
                        (400 x 400)
                    </label>
                    <div class="col-md-9">
                        <input type="file" name="image" value="" class="form-control"
                            required id="image3">
                            <br>
                            <img src="" alt="" id="img3"
                                width="100px" height="100px">
                    </div>
                </div>
                <!-- END Meta Data Content -->
            </div>
            <!-- END Meta Data Block -->


            <div class="block">
                <!-- Meta Data Title -->
                <div class="block-title">
                    <h2>
                        <i class="fa fa-picture"></i>
                        <strong>Product Specifications</strong>
                    </h2>
                </div>
                <!-- END Meta Data Title -->

                <!-- Meta Data Content -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-meta-keywords">
                        Product Specifications
                    </label>
                    <div class="col-md-9">
                        <textarea name="specifications"
                        class="ckeditor"></textarea>
                    </div>
                </div>

            </div>

        </div>
    </div>
</form>
<!-- END Product Edit Content -->
@endsection

@section('scripts')
<script src="/adminn/js/helpers/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        function readURL(input, target) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                target.attr('src', e.target.result);

                target.hide();
                target.fadeIn(650);

                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        //function to filter the phone number
         function filter_num(number)
         {
             var num = number.replace(/\s/g, '');
                 num = num.replace(/\,/g, '');
                 num = num.replace(/\-/g, '');
                 num = num.replace(/\./g, '');

             return num;
         }

        $("#image1").change(function() {
            readURL(this, $("#img1"));
        });

        $("#image2").change(function() {
            readURL(this, $("#img2"));
        });

        $("#image3").change(function() {
            readURL(this, $("#img3"));
        });

        //attach an event listener to the cost price
        $("#cost-price").keyup(function(){

            var amount = filter_num($(this).val());

            var addition = +0.2 * +amount;

            var selling = +amount + +addition;

            $("#product-price").val(selling);
        });

    })
</script>
@endsection
