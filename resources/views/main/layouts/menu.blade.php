{{-- <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
  <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
  <div class="search">
    <form action="#" class="header_search_form menu_mm">
      <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
      <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
        <i class="fa fa-search menu_mm" aria-hidden="true"></i>
      </button>
    </form>
  </div>
  <nav class="menu_nav">
    <ul class="menu_mm">
      <li class="{{ Request::url() == url('/') ? 'active': ''}}"><a href="/">Home</a></li>
      <li class="{{ Request::is('articles*') ? 'active': ''}}"><a href="{{ route('main-article.index') }}">Post</a></li>
      <li class="{{ Request::is('galeries*') ? 'active': ''}}"><a href="{{ route('main-galeries.index') }}">Galeri</a></li>
      <li class="{{ Request::is('profile*') ? 'active': ''}}"><a href="{{ route('main-profile.index') }}">Profil</a></li>
      <li class="{{ Request::is('pendaftar*') ? 'active': ''}}"><a href="{{ route('pendaftar.index') }}">Pendaftar</a></li>
      @auth
        <li>
          <a href="{{ route("frontpage.dashboard") }}" class="btn background-dark text-white ml-4">Dashboard</a>
        </li>
      @endauth
      @guest
        <li>
          <a href="{{ route("login.index") }}" class="btn background-dark text-white ml-4">Masuk</a>
        </li>
      @endguest
    </ul>
  </nav>
</div> --}}

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
              {{-- <li class="nav-item mx-2">
                  <a href="javascript:void(0);" class="nav-link ps-2 cursor-pointer">
                      Home
                  </a>
              </li>
              <li class="nav-item mx-2">
                  <a href="javascript:void(0);" class="nav-link ps-2 cursor-pointer">Free Advice</a>
              </li>
              <li class="nav-item mx-2">
                  <a href="javascript:void(0);" class="nav-link ps-2 cursor-pointer">Property</a>
              </li>
              <li class="nav-item mx-2">
                  <a href="javascript:void(0);" class="nav-link ps-2 cursor-pointer">About Us</a>
              </li> --}}
              {{-- <li class="nav-item mx-2">
                  <a href="javascript:void(0);" class="btn bg-gradient-warning cursor-pointer">
                      Masuk Akun Anda
                  </a>
              </li> --}}
              @auth
                <li>
                  <a href="{{ route("frontpage.dashboard") }}" class="btn bg-gradient-warning cursor-pointer ml-4">Dashboard</a>
                </li>
              @endauth
              @guest
                <li>
                  <a href="{{ route("login.index") }}" class="btn bg-gradient-warning cursor-pointer ml-4">Masuk Akun Anda</a>
                </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>