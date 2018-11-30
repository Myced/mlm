@if($flash = session('error'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <strong>
                <i class="fa fa-exclamation-circle"></i>
                Error!
            </strong>
            {{ $flash }}
        </div>
    </div>
</div>
@endif

@if($flash = session('success'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <strong>
                <i class="fa fa-check"></i>
                Success!
            </strong>
            {{ $flash }}
        </div>
    </div>
</div>
@endif

@if($flash = session('info'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <strong>
                <i class="fa fa-info-circle"></i>
                Info!
            </strong>
            {{ $flash }}
        </div>
    </div>
</div>
@endif

@if($flash = session('warning'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <strong>
                <i class="fa fa-exclamation-triangle"></i>
                Warning!
            </strong>
            {{ $flash }}
        </div>
    </div>
</div>
@endif
