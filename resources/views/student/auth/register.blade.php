<!DOCTYPE html>
<html lang="en"> 
<head>
  @include('student.layouts.style')
</head> 

<body class="app app-login p-0">
  <div class="row">
    <div class="col-12 col-md-4 col-lg-4 m-auto p-4">
      <div class="card rounded p-4 mt-4">
        <div class=" text-center">
          <img width="100" class="my-2" src="http://mtsidaarulatqiyaa.com/wp-content/uploads/2018/03/Revisi-Logo-PONDOK-768x768.png" alt="logo">
          <h2 class="auth-heading text-secondary text-center mb-5">Daftar</h2>
        </div> 
        <form class="auth-form login-form" method="POST" action="{{ route("register.store") }}">
          @csrf    
          <div class="email mb-3">
            <label class="sr-only" for="name">Nama</label>
            <input 
              id="name" 
              name="name" 
              type="text" 
              class="
                form-control 
                signin-email
                @error("name")
                  is-invalid
                @enderror
              " 
              placeholder="Mauskan Nama" 
              required="required"
            >
            @error('name')
              <div class="mt-1">
                <small>
                  <i><b class="text-danger">{{ $message }}</b></i>
                </small>
              </div>
            @enderror
          </div> 
          <div class="email mb-3">
            <label class="sr-only" for="phone_number">No Telepon</label>
            <input 
              id="phone_number" 
              name="phone_number" 
              type="number" 
              class="form-control signin-email
              @error("name")
                is-invalid
              @enderror
              " 
              placeholder="Mauskan No Hp" 
              required="required"
            >
            @error('phone_number')
              <div class="mt-1">
                <small>
                  <i><b class="text-danger">{{ $message }}</b></i>
                </small>
              </div>
            @enderror
          </div>     
          <div class="email mb-3">
            <label class="sr-only" for="signin-email">Email</label>
            <input 
              id="signin-email" 
              name="email" 
              type="email" 
              class="form-control signin-email
              @error("name")
                is-invalid
              @enderror
              " 
              placeholder="Email address" 
              required="required"
            >
            @error('email')
              <div class="mt-1">
                <small>
                  <i><b class="text-danger">{{ $message }}</b></i>
                </small>
              </div>
            @enderror
          </div>

          <div class="mb-3 ">
            <select name="unit_id" id="" class="form-control
            @error("name")
              is-invalid
            @enderror
            ">
              <option value="1">-- pilih unit --</option>
              @foreach ($units as $unit )
                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
              @endforeach
            </select>
            @error('unit_id')
              <div class="mt-1">
                <small>
                  <i><b class="text-danger">{{ $message }}</b></i>
                </small>
              </div>
            @enderror
          </div>

          <div class="password mb-3">
            <label class="sr-only" for="signin-password">Password</label>
            <input 
              id="signin-password" 
              name="password" 
              type="password" 
              class="form-control signin-password
              @error("name")
                is-invalid
              @enderror
              " 
              placeholder="Password" 
              required="required"
            >
            @error('password')
              <div class="mt-1">
                <small>
                  <i><b class="text-danger">{{ $message }}</b></i>
                </small>
              </div>
            @enderror
          </div><!--//form-group-->
          @if ($school_year->status)
            <div class="text-center">
              <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Register</button>
            </div>
          @endif
        </form>
        @if (!$school_year->status)
          <div class="text-center">
            <button type="button" class="btn btn-secondary w-100  mx-auto disable">Pendaftaran Belum di buka</button>
          </div>
        @endif
      </div>
      <footer class="app-auth-footer">
        <div class="container text-center py-3">
          <small class="copyright">Divisi IT Daarul Atqiyaa' {{ date('Y') }}</small>
        </div>
      </footer>
    </div>
  </div>

</body>
</html> 
