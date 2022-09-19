<!DOCTYPE html>
<html lang="en"> 
<head>
    @include('admin.layouts.style')
    @method('addon-style')
</head> 

<body class="app">   	
    @include('admin.layouts.header')
    
    <div class="app-wrapper">
      <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
          <h1 class="app-page-title">@yield('page-title')</h1>
          @yield('content')
        </div>
      </div>
      @include('admin.layouts.footer')
    </div>    					

    @include('admin.layouts.script')
    @stack('addon-script')
</body>
</html> 

