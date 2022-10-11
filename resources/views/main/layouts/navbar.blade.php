<header class="header">
			
  <!-- Top Bar -->
  <div class="top_bar">
    <div class="top_bar_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
              <ul class="top_bar_contact_list">
                <li><div class="question">Informasi lebih lanjut silakan hubungi</div></li>
                <li>
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <div>{{ SettingData()->wa_1 ?? '' }}</div>
                </li>
                <li>
                  <i class="fa fa-envelope-o" aria-hidden="true"></i>
                  <div>{{ SettingData()->email ?? '' }}</div>
                </li>
              </ul>
              <!-- <div class="top_bar_login ml-auto">
                <div class="login_button"><a href="#">Register or Login</a></div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>				
  </div>
{{-- @php
    $d = request()->is('/');
    dd($d);
@endphp --}}
  <!-- Header Content -->
  <div class="header_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="header_content d-flex flex-row align-items-center justify-content-start">
            <div class="logo_container">
              <a href="/">
                <img class="logo" src="{{ asset('images/component/logo.png') }}" alt="logo"> <span class="btn side-logo">Daarul Atqiyaa'</span>
                <!-- <div class="logo_text">Unic<span>at</span></div> -->
              </a>
            </div>
            <nav class="main_nav_contaner ml-auto">
              <ul class="main_nav">
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

              <!-- <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div> -->
              <!-- Hamburger -->

              <!-- <div class="shopping_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div> -->
              <div class="hamburger menu_mm">
                <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
              </div>
            </nav>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header Search Panel -->
  {{-- <div class="header_search_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
            <form action="#" class="header_search_form">
              <input type="search" class="search_input" placeholder="Search" required="required">
              <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>			
  </div>			 --}}
</header>