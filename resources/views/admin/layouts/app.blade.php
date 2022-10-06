<!DOCTYPE html>
<html lang="en"> 
<head>
    @include('admin.layouts.style')
    <style>
      [x-cloak] { display: none !important; }
    </style>
    @stack('addon-style')
    @livewireStyles
    @powerGridStyles
</head> 

<body class="app">   	
    @include('admin.layouts.header')
    
    <div class="app-wrapper">
      <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
          @yield('page-title')
          @include('admin.layouts.alert')
          @yield('content')
        </div>
      </div>
      @include('admin.layouts.footer')
    </div>    					

    @include('admin.layouts.script')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    @stack('addon-script')

    @livewireScripts
    @powerGridScripts
</body>
</html> 

