@extends('main.layouts.app')

@section('content')
<!-- Home -->

<div style="height: 180px; background-color:rgb(235, 235, 235);">
  <div class="breadcrumbs_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumbs">
            <ul>
              <li><a href="/">Home</a></li>
              <li>Galeri</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>			
</div>

<div class="courses">
  <div class="container">
    <div class="row">
      <div>
        <h3 class="mb-3 text-center">Galeri Foto</h5>
        <div class="row">
          @foreach ($images as $img)
            <div class="col-3 mb-4">
              <a target="blank" href="{{ asset($img->name) }}">
                <img class="img-fluid" src="{{ asset($img->name) }}" alt="">
              </a>
            </div>
          @endforeach
        </div>
        {{ $images->links('vendor.pagination.bootstrap-5') }}
      </div>
      <div class="mt-4">
        <h3 class="mb-3 text-center">Galeri Video</h5>
        <div class="row">
          @foreach ($videos as $video)
            <div class="col-3 mb-4 p-3">
              <iframe width="260" src="{{ $video->link }}" frameborder="0"></iframe>
              <div><h5>{{ $video->title }}</h5></div>
              <div>{{ $video->desc }}</div>
            </div>
          @endforeach
        </div>
        {{ $videos->links('vendor.pagination.bootstrap-5') }}
      </div>
    </div>
  </div>
</div>
@endsection

@push('course-css')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('styles/blog_single.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/blog_single_responsive.css') }}"> --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('styles/courses.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('styles/courses_responsive.css') }}">
@endpush

@push('addon-script')
  <script src="{{ asset('js/blog_single.js') }}"></script>
@endpush