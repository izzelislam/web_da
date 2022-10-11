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
              <li>Post</li>
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

      <!-- Courses Main Content -->
      <div class="col-lg-8">
        <div class="courses_search_container">
          <div class="courses_search_form d-flex flex-row align-items-center justify-content-start">
            <form action="{{ route('main-article.index') }}" class="d-inline">
              <select id="courses_search_select" name="category_id" onchange="this.form.submit()" class="courses_search_select courses_search_input">
                <option value="">All Categories</option>
                  @foreach ($categories as $category)
                    <option {{ request('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
            </form>
            <form action="{{ route('main-article.index') }}" id="courses_search_form" class="ml-3">
              <input value="{{ request('q') ?? '' }}" type="search" name="q" class="courses_search_input" placeholder="Search Courses" required="required">
              <button  action="submit" class="courses_search_button ml-auto">Cari</button>
            </form>
          </div>
        </div>
        <div class="courses_container">
          <div class="row courses_row">
            <!-- posts -->
            @foreach ($articles as $article)
              <div class="col-lg-6 course_col">
                <div class="course">
                  <div class="course_image"><img src="{{ asset($article->cover_image) }}" alt=""></div>
                  <div class="course_body">
                    <h3 class="course_title"><a href="{{ route('main-article.show', $article->slug) }}">{{ $article->title }}</a></h3>
                    <div class="course_teacher">{{ $article->created_by }}</div>
                    <div class="course_text">
                      <p class="text-justify">{!! \Str::limit($article->short_describtion, 140) !!}</p>
                    </div>
                  </div>
                  <div class="course_footer">
                    <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                      <div class="course_info">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span>{{ $article->created_at->format('d/m/Y') }}</span>
                      </div>
                      <div class="course_info">
                        <i class="fa fa-tag" aria-hidden="true"></i>
                        <span>{{ $article->category->name }}</span>
                      </div>
                      {{-- <div class="course_price ml-auto">$130</div> --}}
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          {{ $articles->links('vendor.pagination.bootstrap-5') }}
        </div>
      </div>

      <!-- Courses Sidebar -->
      @include('main.pages.parts.sidebar')
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