<nav class="navbar navbar-expand-lg bg-transparent py-3 shadow-none">
    <div class="container">
        <a class="navbar-brand w-8" href="#" data-config-id="brand">
            <img src="{{ asset('images/component/logo.png') }}" alt="" width="60">
            <h5 class="d-inline"><i><b>Pondok pesantren Daarul Atqiyaa'</b></i></h5>
        </a>
  
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ms-auto">
                <li>
                  <button class="btn bg-gradient-warning cursor-pointer ml-4">Segera daftarkan diri anda</button>
                </li>
            </ul>
        </div>
    </div>
  </nav>
<header class="">
  <div class="page-header min-vh-10 m-3 p-2 border-radius-xl py-4" style="background-image: url({{ asset('images/component/slider_1.jpeg') }});">
      <span class="mask bg-gradient-dark opacity-7"></span>
      <div class="container h-100">
          <div class="row">
              <div class="col-lg-5 mt-auto justify-content-bottom my-auto">

                  <h5 class="text-gradient text-warning fadeIn1 fadeInBottom text-warning mb-0 font-weight-bolder">Selamat Datang Di Halaman Resmi PPDB (penerimaan peserta didik baru)</h6>
                  <h3 class="text-white fadeIn2 fadeInBottom mb-4 display-6 font-weight-bolder" spellcheck="false">Pondok Pesantren Daarul Atqiyaa'</h3>

                  {{-- <a href="{{ route('register.index') }}" class="btn bg-gradient-warning">Daftar Sekarang</a> --}}
              </div>
          </div>
      </div>
  </div>
</header>