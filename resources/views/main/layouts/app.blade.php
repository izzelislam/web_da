<!DOCTYPE html>
<html lang="en">
<head>
	@stack('course-css')
	@include('main.layouts.style')
	@stack('addon-style')
</head>
<body class="">

<div class="super_container">

	<!-- Header -->
	@include('main.layouts.navbar')
	
	<!-- Menu -->
	@include('main.layouts.menu')
	
	@yield('content')

	<!-- Footer -->

	@include('main.layouts.footer')
</div>

@include('main.layouts.script')
@stack('addon-script')

</body>
</html>