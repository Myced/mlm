@extends('layouts.admin')

@section('content')
<!-- Fixed Top Header + Footer Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="gi gi-show_big_thumbnails"></i>
            Fixed Top Header + Footer
            <br>
            <small> + Fixed Sidebars</small>
        </h1>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li>Page Layouts</li>
    <li><a href="">Fixed Top Header+ Footer</a></li>
</ul>
<!-- END Fixed Top Header + Footer Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')

<div class="block full block-alt-noborder">
    <h3 class="sub-header text-center"><strong>Dummy Content</strong> for layout demostration</h3>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <article>

            </article>
        </div>
    </div>
</div>
@endsection
