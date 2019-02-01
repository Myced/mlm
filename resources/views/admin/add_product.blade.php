@extends('layouts.admin')

@section('title')
    {{ __('Add Product') }}
@endsection

@section('content')
<form action="{{ route('product.store') }}" method="post"
    class="form-horizontal " >
    @csrf
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
                        <label class="col-md-3 control-label" for="product-category">
                            Category
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <select id="product-category" name="category" class="select-chosen form-control"
                                data-placeholder="Choose Category.." style="width: 250px;">
                                <option value="cedric"> -- Category --</option>
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
                                <option> -- Select Brand --</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-price">Price</label>
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
                    <label class="col-md-3 control-label" for="product-meta-description">
                        Thumbnail
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="file" name="thumbnail" value="" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-meta-description">
                        Cover Image
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="file" name="cover" value="" class="form-control">
                    </div>
                </div>
                <!-- END Meta Data Content -->
            </div>
            <!-- END Meta Data Block -->

        </div>
    </div>
</form>
<!-- END Product Edit Content -->
@endsection

@section('scripts')
<script src="/adminn/js/helpers/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $categories = $("#product-category");
        $brand = $('#brand');

        $('#product-category').on('change', function(){
            var cat = $(this).val();

            //do an ajax request to get the brands from that category
            $.ajax({
                url : '/api/getbrands/' + cat,
                method: 'get',
                error: function (error)
                {
                    alert('fialed');
                },
                success : function(data)
                {
                    console.log(data);

                    //parse the json object
                    var me = "{}"
                    // var object = $.parseJSON(data[0]);
                    console.log(data[0]);
                    var first = data[0];

                    var json = $.parseJSON(first);
                    console.log(json);
                    // console.log(object);
                }
            })
        });
    })
</script>
@endsection
