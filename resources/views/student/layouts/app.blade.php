<!DOCTYPE html>
<html lang="en"> 
<head>
    @include('student.layouts.style')
    <style>
      [x-cloak] { display: none !important; }
    </style>
    @stack('addon-style')
    @livewireStyles
    @powerGridStyles
</head> 

<body class="app">   	
    @include('student.layouts.header')
    
    <div class="app-wrapper">
      <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
          @yield('page-title')
          @include('student.layouts.alert')
          @yield('content')
        </div>
      </div>
      @include('student.layouts.footer')
    </div>    					

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Photo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('student-profile.update.photo') }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="modal-body">
              <x-admin.input
                label="Pilih Gambar"
                name="img"
                type="file"
                value="{{ $model->name ?? '' }}"
              />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary text-white">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    @include('student.layouts.script')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    @stack('addon-script')

    @livewireScripts
    @powerGridScripts
</body>
</html> 

