@props(['md' => 12, 'lg' => 12, 'title' => null])

<div class="col-12 col-md-{{ $md }} col-lg-{{ $lg }}">
  <div class="app-card app-card-settings shadow-sm p-4">
    @if (!empty($title))
      <div class="app-card-header mb-2">
        <h5 class="text-secondary">
          {{ $title }}
        </h5>
      </div>
    @endif
    <div class="app-card-body">
      {{ $slot }}
    </div>
  </div>
</div>