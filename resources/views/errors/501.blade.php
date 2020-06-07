@extends('errors::illustrated-layout')

@section('code', '501')
@section('title', __('501 Error'))

@section('image')
<div style="background-image: url({{ asset('/svg/503.svg') }});"
     class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __($exception->getMessage() ?: ' 501 Error. Please check back soon.'))
