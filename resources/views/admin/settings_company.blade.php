@extends('layouts.admin')

@section('title')
    {{ __("Geneology Depth Setting") }}
@endsection

@section('content')
<!-- eCommerce Dashboard Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-gears"></i>
            SETTINGS
            <br>
            <small> Setup The Company Information</small>
        </h1>
    </div>
</div>
<!-- END eCommerce Dashboard Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')

<div class="block full">

    <!-- All Orders Title -->
    <div class="block-title">

        <h2><strong>Company Information</strong></h2>
    </div>




    <form class="form-horizontal" action="{{ route('settings.company.store') }}"
        method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">

                <div class="form-group">
                    <label class="col-md-3 control-label" >
                        Company Name:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" name="name"
                        class="form-control" placeholder="Eg. Green Tree Marketting" required
                        value="{{ is_null($company) ? '' : $company->name }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" >
                        Company Abbreviation:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" name="abbreviation"
                        class="form-control" placeholder="Eg. GTM" required
                        value="{{ is_null($company) ? '' : $company->abbreviation }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" >
                        Telephone Number(s):
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" name="tel"
                        class="form-control" placeholder="Eg. +237 673 90 19 39 / 699 90 90 90" required
                        value="{{ is_null($company) ? '' : $company->tel }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" >
                        Compnay Email:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" name="email"
                        class="form-control" placeholder="Eg. info@glothelo.com" required
                        value="{{ is_null($company) ? '' : $company->email }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" >
                        Address:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <textarea name="address" rows="8"
                        class="form-control" required
                        placeholder="Company Address"
                        >{{ is_null($company) ? '' : $company->address }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" >
                        Company Logo:
                    </label>
                    <div class="col-md-9">
                        <input type="file" name="logo"
                            class="form-control" id="img">
                            <br>
                        <img src="{{ is_null($company) ? '' : $company->logo }}" id="image" alt=""
                            width="100px" height="100px">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">

                    </label>
                    <div class="col-md-9">
                        <button type="submit" name="button"
                        title="Save Changes" class="btn btn-info">
                            Save Information
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection

@section('scripts')
<script type="text/javascript">
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#image').attr('src', e.target.result);

            $('#image').hide();
            $('#image').fadeIn(650);

            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#img").change(function() {
        readURL(this);
    });
</script>
@endsection
