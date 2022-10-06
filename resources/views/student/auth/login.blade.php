<!DOCTYPE html>
<html lang="en"> 
<head>
  @include('student.layouts.style')
</head> 

<body class="app app-login p-0">

  <div class="row">
    <div class="col-12 col-md-4 col-lg-4 m-auto p-4">

      {{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
          You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        You should check in on some of those fields below.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> --}}

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

      <div class="card rounded p-4 mt-5">
        <div class=" text-center">
          <img width="100" class="my-2" src="http://mtsidaarulatqiyaa.com/wp-content/uploads/2018/03/Revisi-Logo-PONDOK-768x768.png" alt="logo">
          <h3 class="auth-heading text-secondary text-center mb-5">Masuk</h3>
        </div> 
        <form class="auth-form login-form" method="POST" action="{{ route("login.store") }}">
          @csrf         
          <div class="email mb-3">
            <label  for="signin-email">Email</label>
            <input 
              id="signin-email" 
              name="email" 
              type="email" 
              class="form-control signin-email @error("email")
                is-invalid
              @enderror" 
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
          </div><!--//form-group-->
          <div class="password mb-3">
            <label for="signin-password">Password</label>
            <input 
              id="signin-password" 
              name="password" 
              type="password" 
              class="form-control signin-password @error("password")
                is-invalid
              @enderror" 
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
            <div class="extra mt-3 row justify-content-between">
              <div class="col-6">
                <div class="form-check">
                  <input name="is_remember" class="form-check-input" type="checkbox" value="" id="RememberPassword">
                  <label class="form-check-label" for="RememberPassword">
                  Remember me
                  </label>
                </div>
              </div><!--//col-6-->
              {{-- <div class="col-6">
                <div class="forgot-password text-end">
                  <a href="reset-password.html">Forgot password?</a>
                </div>
              </div> --}}
            </div><!--//extra-->
          </div><!--//form-group-->
          <div class="text-center">
            <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Masuk</button>
          </div>
          <center>Atau</center>
          <div class="text-center mt-2">
            <a href="{{ route('register.index') }}" class="btn btn-secondary w-100 theme-btn mx-auto">Daftar</a>
          </div>
        </form>
      </div>
      <footer class="app-auth-footer">
        <div class="container text-center py-3">
          <small class="copyright">Divisi IT Daarul Atqiyaa' {{ date('Y') }}</small>
        </div>
      </footer>
    </div>
  </div>
  {{-- <div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-5 col-lg-5 auth-main-col text-center p-5 m-auto">
      <div class="card py-5 shadow">
        <div class="app-auth-body mx-auto">	
          <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="http://mtsidaarulatqiyaa.com/wp-content/uploads/2018/03/Revisi-Logo-PONDOK-768x768.png" alt="logo"></a></div>
            <div class="my-4">
              <strong class="auth-heading text-center mb-5">Masuk</strong>
            </div>  
            <div class="auth-form-container text-start">
              <form class="auth-form login-form" method="POST" action="{{ route("admin-auth.store") }}">
                @csrf         
                <div class="email mb-3">
                  <label class="sr-only" for="signin-email">Email</label>
                  <input 
                    id="signin-email" 
                    name="email" 
                    type="email" 
                    class="form-control signin-email" 
                    placeholder="Email address" 
                    required="required"
                  >
                </div><!--//form-group-->
                <div class="password mb-3">
                  <label class="sr-only" for="signin-password">Password</label>
                  <input 
                    id="signin-password" 
                    name="password" 
                    type="password" 
                    class="form-control signin-password" 
                    placeholder="Password" 
                    required="required"
                  >
                  <div class="extra mt-3 row justify-content-between">
                    <div class="col-6">
                      <div class="form-check">
                        <input name="is_remember" class="form-check-input" type="checkbox" value="" id="RememberPassword">
                        <label class="form-check-label" for="RememberPassword">
                        Remember me
                        </label>
                      </div>
                    </div><!--//col-6-->
                    <div class="col-6">
                      <div class="forgot-password text-end">
                        <a href="reset-password.html">Forgot password?</a>
                      </div>
                    </div><!--//col-6-->
                  </div><!--//extra-->
                </div><!--//form-group-->
                <div class="text-center">
                  <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Masuk</button>
                </div>
                <center>Atau</center>
                <div class="text-center mt-2">
                  <a href="{{ route('register') }}" class="btn btn-secondary w-100 theme-btn mx-auto">Daftar</a>
                </div>
              </form>
            </div>
        </div>
      <footer class="app-auth-footer">
        <div class="container text-center py-3">
          <small class="copyright">Divisi IT Daarul Atqiyaa' {{ date('Y') }}</small>
        </div>
      </footer>
    </div>
  </div> --}}
</body>
</html> 

