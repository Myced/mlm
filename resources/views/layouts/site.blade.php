<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> {{ config('app.name') }} - @yield('title')</title>

    @include('site_includes.styles')

	<link href="/site/css/gen.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    @yield('style')

</head>
<body>
	<!--Header-->
	<header>
		<div class="header layout2 no-prepend-box-sticky no-sticky">
			@include('site_includes.topbar_home')

			<div class="main-header">
				@include('site_includes.topheader')
				@include('site_includes.header_nav')
			</div>
		</div>
	</header>
	<!--/Header-->

	<!--Content-->
	@yield('content')
	<!--/Content-->

	<!--Footer-->
	@include('site_includes.footer')
	<!--/Footer-->
	<a class="back-to-top" href="#"></a>
	@include('site_includes.scripts')
	@include('site_includes.notification')

    @yield('scripts')
</body>

</html>
