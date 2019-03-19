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
            <small> Setup Geneology Depth  </small>
        </h1>
    </div>
</div>
<!-- END eCommerce Dashboard Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')

<div class="block full">

    <!-- All Orders Title -->
    <div class="block-title">

        <h2><strong>Modify the Geneology Depth</strong></h2>
    </div>

    <form class="form-horizontal" action="{{ route('settings.geneology.depth') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        Depth:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="number" name="depth"
                        class="form-control" placeholder="Enter the Depth level." required
                        value="{{ is_null($depth) ? '' : $depth->depth }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">

                    </label>
                    <div class="col-md-9">
                        <button type="submit" name="button"
                        title="Save Changes" class="btn btn-info">
                            Save Depth
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
