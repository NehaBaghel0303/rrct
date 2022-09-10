<!DOCTYPE html>
<html lang="en">

<head>
	@yield('meta_data')
   @include('frontend.include.head')
   @laravelPWA
</head>

	<body style="background: aliceblue !important">
		<div>
				<div class="main-content pl-0 ">
					@yield('content')
				</div>
		</div>
		
		<!-- initiate scripts-->
		@include('frontend.include.script')	
		@stack('script')
	</body>
</html>