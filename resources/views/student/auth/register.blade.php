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
          <img width="100" class="my-2" src="{{ asset('images/component/logo.png') }}" alt="logo">
          <h2 class="auth-heading text-secondary text-center mb-5">Daftar</h2>
        </div> 
        <form class="auth-form login-form" method="POST" action="{{ route("register.store") }}" enctype="multipart/form-data">
          @csrf    
          <div class="email mb-3">
            <label class="sr-only" for="name">Foto </label>
            <input 
              name="img" 
              type="file" 
              class="
                form-control 
                signin-email
                @error("img")
                  is-invalid
                @enderror
              " 
            >
            <i class="text-danger">* Foto resmi</i>
            @error('img')
              <div class="mt-1">
                <small>
                  <i><b class="text-danger">{{ $message }}</b></i>
                </small>
              </div>
            @enderror
          </div>
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
              placeholder="Nama" 
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
            <label class="sr-only" for="nik">NIK</label>
            <input 
              id="nik" 
              name="nik" 
              type="text"
              inputmode="numeric" 
              class="form-control signin-email
              @error("nik")
                is-invalid
              @enderror
              " 
              placeholder="NIK" 
              required="required"
            >
            @error('nik')
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
              type="text"
              inputmode="numeric"  
              class="form-control signin-email
              @error("name")
                is-invalid
              @enderror
              " 
              placeholder="No Hp" 
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
              @error("email")
                is-invalid
              @enderror
              " 
              placeholder="Email" 
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
            <select name="gender" id="" class="form-control
            @error("gender")
              is-invalid
            @enderror
            ">
              <option >-- pilih Jenis Kelamin --</option>
              <option value="laki-laki"> Laki-Laki </option>
              <option value="Perempuan"> Perempuan </option>
            </select>
            @error('gender')
              <div class="mt-1">
                <small>
                  <i><b class="text-danger">{{ $message }}</b></i>
                </small>
              </div>
            @enderror
          </div>

          <div class="mb-3 ">
            <select name="unit_id" id="" class="form-control
            @error("unit_id")
              is-invalid
            @enderror
            ">
              <option value="">-- pilih unit --</option>
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
              name="pwd" 
              type="password" 
              class="form-control signin-password
              @error("pwd")
                is-invalid
              @enderror
              " 
              placeholder="Password" 
              required="required"
            >
            @error('pwd')
              <div class="mt-1">
                <small>
                  <i><b class="text-danger">{{ $message }}</b></i>
                </small>
              </div>
            @enderror
          </div><!--//form-group-->
          @if ($school_year->status)
            <div class="text-center">
              <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Daftar</button>
            </div>
          @endif
        </form>
        @if (!$school_year->status)
          <div class="text-center">
            <button type="button" class="btn btn-secondary w-100  mx-auto disable">Pendaftaran Belum di buka</button>
          </div>
        @endif
        <div class="text-center my-3"><i>atau sudah punya akun ?</i></div>
        <div class="text-center">
          <a href="{{ route('login.index') }}" class="btn btn-info w-100 text-white mx-auto">Masuk</a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="my-3">
    <div class="text-center">
      <small class="copyright">Divisi IT Daarul Atqiyaa' {{ date('Y') }}</small>
    </div>
  </div>

</body>
</html> 

