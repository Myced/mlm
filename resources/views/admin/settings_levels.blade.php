@extends('layouts.admin')

@section('title')
    {{ __("Geneology Level Benefits") }}
@endsection

@section('content')
<!-- eCommerce Dashboard Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-gears"></i>
            SETTINGS
            <br>
            <small> Setup Geneology Levels and Benefits  </small>
        </h1>
    </div>
</div>
<!-- END eCommerce Dashboard Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')

<div class="block full">

    <!-- All Orders Title -->
    <div class="block-title">

        <h2><strong>Geneology Levels and Benefits</strong></h2>
    </div>

    <p>
        <div class="callout callout-info">
            <strong>Note Thant the benefit is a percentage of the Order Total Value.</strong>

            <br>
            <br>

            <strong>
                Please fill in the values for the benefits for
                each geneology level.
                <br>
                Please just enter the percentage E.g 5 without the "%".
            </strong>
        </div>
    </p>


    <form class="form-horizontal" action="{{ route('settings.geneology.levels.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8">

                @for($i = 1; $i <= $depth;  $i++)
                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        Level {{ $i }}:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-percent"></i></div>

                            <input type="number" name="level{{ $i }}"
                            class="form-control" placeholder="Enter % benefit. E.g 5" required
                            value="{{ \App\Models\GeneologyLevel::getLevelBenefit($i) }}">
                        </div>

                    </div>
                </div>
                @endfor

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">

                    </label>
                    <div class="col-md-9">
                        <button type="submit" name="button"
                        title="Save Changes" class="btn btn-info">
                            Save Benefits
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
