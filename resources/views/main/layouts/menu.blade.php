<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
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
</div>