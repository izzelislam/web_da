
<div id="app-sidepanel" class="app-sidepanel"> 
  <div id="sidepanel-drop" class="sidepanel-drop"></div>
  <div class="sidepanel-inner d-flex flex-column">
    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
    <div class="p-4 text-center">
        {{-- <a class="app-logo" href="index.html"><img class="logo-icon me-2" src="/template/assets/images/app-logo.svg" alt="logo"><span class="logo-text">PORTAL</span></a> --}}
        <img class="rounded" width="150px"  src="{{ asset(auth()->user()->image ?? '') }}" alt="">
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary text-white mt-3">Ubah Foto</button>
    </div>
    
    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
      <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('frontpage.dashboard') }}">
            <span class="nav-icon">
              <i class="fa fa-dashboard"></i>
            </span>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('student-biodata.create') }}">
            <span class="nav-icon">
              <i class="fa fa-user"></i>
            </span>
            <span class="nav-link-text">Biodata</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('student-parent.create') }}">
            <span class="nav-icon">
              <i class="fa fa-leaf"></i>
            </span>
            <span class="nav-link-text">Data Ortu</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('qurban-saving.create') }}">
            <span class="nav-icon">
              <i class="fa fa-file"></i>
            </span>
            <span class="nav-link-text">Tabungan Qurban</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('payment.index') }}">
            <span class="nav-icon">
              <i class="fa fa-money-bill"></i>
            </span>
            <span class="nav-link-text">Pembayaran</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('student-profile.edit') }}">
            <span class="nav-icon">
              <i class="fa fa-gear"></i>
            </span>
            <span class="nav-link-text">Profil</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>
