@props(['md' => 12, 'lg' => 12])

<div class="col-12 col-md-{{ $md }} col-lg-{{ $lg }}">
  <div class="app-card app-card-settings shadow-sm p-4">
    <div class="app-card-header">
      <strong>Detail</strong>
    </div>
    <div class="app-card-body">
      {{ $slot }}
    </div>
  </div>
</div>