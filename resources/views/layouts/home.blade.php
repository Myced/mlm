<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> {{ config('app.name') }} - @yield('title')</title>

    @include('site_includes.styles')

	<link href="/site/css/customs-css4.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    @yield('style')

</head>
<body class="home home1">
	<div class="special-container">
		<!--Header-->
		<header>
			<div class="header layout1 no-prepend-box-sticky">

                @include('site_includes.topbar_home')

				<div class="main-header">

                    @include('site_includes.topheader_home')

					<div class="this-sticky">
						<div class="container">
							@include('site_includes.navigation_home')
						</div>
					</div>
				</div>
			</div>
		</header>
		<!--/Header-->
		<!--Content-->
		@yield('content')
		<!--/Content-->
	</div>
	<!--Footer-->
	@include('site_includes.footer')
	<!--/Footer-->
	<a class="back-to-top" href="#"></a>
	@include('site_includes.scripts')

    @yield('scripts')
</body>

</html>
