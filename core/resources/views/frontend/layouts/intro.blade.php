<!DOCTYPE html>
<html lang="en">

<head>
	@yield('meta_data')
	@stack('style')
</head>

	<body style="">
		<div>
				<div class="main-content pl-0 ">
					@yield('content')
				</div>
		</div>
		
		@stack('script')
	</body>
</html>