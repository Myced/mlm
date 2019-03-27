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
            <small> Setup Membership Levels and their bonuses </small>
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


            <strong>
                Please fill out the membership levels as per how it is needed.
            </strong>
        </div>
    </p>


    <form class="form-horizontal" action="{{ route('settings.membership.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">

                @for($i = 0; $i <= $level;  $i++)
                <div class="form-group">
                    <label class="col-md-2 control-label" for="product-name">
                        Level {{ $i }}:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-xs-4">
                                <input type="text" name="title[]"
                                class="form-control" placeholder="Enter Level Title" required
                                value="{{ \App\Models\MembershipLevel::getTitle($i) }}">
                            </div>

                            <div class="col-xs-4">
                                <input type="number" name="points[]"
                                class="form-control" placeholder="Enter Level Points" required
                                value="{{ \App\Models\MembershipLevel::getPoints($i) }}">
                            </div>

                            <div class="col-xs-4">
                                <textarea name="bonus[]" rows="4"
                                    class="form-control" placeholder="Enter the level bonus"
                                    >{{ \App\Models\MembershipLevel::getBonus($i) }}</textarea>
                            </div>
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
                            Save Levels
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
