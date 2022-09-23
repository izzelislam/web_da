@props(['title' => '', 'route' => null, 'previous' => null])

<div class="row g-3 mb-4 align-items-center justify-content-between">
  <div class="col-auto">
    <h1 class="app-page-title">{{ $title }}</h1>
  </div>
  <div class="col-auto">
    <div class="page-utilities">
      <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
        
        {{ $slot }}

        @if ($route)
          <div class="col-auto">
            <a href="{{ $route }}" class="btn app-btn-primary">
              <i class="fa fa-plus me-2"></i>
              Tambah Data
            </a>
          </div>
        @endif

        @if ($previous)
          <div class="col-auto">
            <a href="{{ url()->previous() }}" class="btn app-btn-primary">
              <i class="fa fa-arrow-left"></i>
              Kembali
            </a>
          </div>
        @endif

      </div>
    </div>
  </div>
  
</div>