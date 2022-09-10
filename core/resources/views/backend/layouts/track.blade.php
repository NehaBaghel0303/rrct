<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
	<title>@yield('title','') | {{ getSetting('app_name') }}</title>
	<!-- initiate head with meta tags, css and script -->
	@include('backend.include.head')
	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
{{-- 
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry,places&key=AIzaSyAOdhcgX1hCyYmA2xNXX2W6Kx3hFZjyKkg" ></script> --}}

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOdhcgX1hCyYmA2xNXX2W6Kx3hFZjyKkg"></script>
	<script src="{{ asset('backend/js/v3_epoly.js') }}"></script>
	<!-- initiate scripts-->
	@include('backend.include.script')	
</head>
<body id="app" class="sidebar-mini">
	<div class="wrapper">
		@if(!request()->routeIs('panel.setting.maintanance') == true)
			@include('backend.include.header')
			<div class="page-wrap">
				<!-- initiate sidebar-->
				@include('backend.include.sidebar')

				<div class="main-content">
					@include('backend.include.logged-in-as')
					<!-- yeild contents here -->
					@yield('content')
				</div>


				<!-- initiate footer section-->
				@include('backend.include.footer')

			</div>
		@endif
    </div>
    
	<!-- initiate modal menu section-->
	@include('backend.include.modalmenu')

</body>
</html>