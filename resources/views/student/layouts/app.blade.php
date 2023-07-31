<!DOCTYPE html>
<html lang="en"> 
<head>
    @include('student.layouts.style')
    <style>
      [x-cloak] { display: none !important; }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://demos.creative-tim.com/soft-ui-design-system/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-design-system/assets/css/nucleo-svg.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontpage/assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontpage/assets/css/loopple/loopple.css') }}">
    @stack('addon-style')
    @livewireStyles
    @powerGridStyles
</head> 

<body class="app">   	
    {{-- @include('student.layouts.header') --}}
@include('main.pages.parts.header')
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
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div> --}}

    @include('student.layouts.script')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let er = "{{ session('error') }}"
        let ss = "{{ session('success') }}"
        
        if (er){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: er,
                showConfirmButton: false,
                timer: 3500
            })
        }
        if (ss){
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: ss,
                showConfirmButton: false,
                timer: 3500
            })
        }
    </script>
    @stack('addon-script')

    @livewireScripts
    @powerGridScripts
</body>
</html> 

