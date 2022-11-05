<!-- Loopple Templates: https://www.loopple.com/templates | Copyright Loopple (https://www.loopple.com) | This copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<head>
	@include('main.layouts.style')
</head>

<body>
	@include('main.layouts.menu')
	
	@yield('content')

	@include('main.layouts.footer')
	
	@include('main.layouts.script')
	@stack('addon-script')
</body>