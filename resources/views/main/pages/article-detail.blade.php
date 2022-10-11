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
              <li>Detail Post</li>
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

      <!-- Blog Content -->
				<div class="col-lg-8">
					<div class="blog_content">
						<div class="blog_title">{{ $model->title }}</div>
						<div class="blog_meta">
							<ul>
								<li>Di posting Pada :<a href="#">{{ $model->created_at->format('d/m/Y') }}</a></li>
								<li>Oleh :<a href="#">{{ $model->created_by }}</a></li>
							</ul>
						</div>
						<div class="blog_image"><img src="{{ asset($model->cover_image) }}" alt="cover_iamge"></div>
            <div class="my-3 text-justify">
              {!! $model->content !!}
            </div>
					</div>
					<div class="blog_extra d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<div class="blog_tags">
							<span>Category: </span>
							<ul>
								<li><b>{{ $model->category->name }}</b></li>
							</ul>
						</div>
						<div class="blog_social ml-lg-auto">
							<span>Share: </span>
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- Comments -->
					<div class="comments_container">
						<div class="comments_title"><span>{{ count($model->feedbacks) }}</span> Comments</div>
						<ul class="comments_list">
              @foreach ($model->feedbacks as $coment)
                <li>
                  <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                    <div class="comment_image"><div><img src="{{ asset('dumy/avatar.jpg') }}" alt=""></div></div>
                    <div class="comment_content">
                      <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                        <div class="comment_author"><a href="#">{{ $coment->username }}</a></div>
                        <div class="comment_rating"><div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div></div>
                        <div class="comment_time ml-auto">{{ $coment->created_at->format('d/M/Y') }}</div>
                      </div>
                      <div class="comment_text">
                        <p>{{ $coment->coment }}</p>
                      </div>
                    </div>
                  </div>
                </li>
              @endforeach
						</ul>
						<div class="add_comment_container">
							<div class="add_comment_title">Tulis komentar anda.</div>
							<form  class="comment_form" method="POST">
                @csrf
                <div>
									<div class="form_title">Review*</div>
									<textarea name="coment" class="comment_input comment_textarea" required="required"></textarea>
								</div>
								<div class="row">
									<div class="col-md-12 input_col">
										<div class="form_title">Name*</div>
										<input name="username" type="text" class="comment_input" required="required">
									</div>
									{{-- <div class="col-md-6 input_col">
										<div class="form_title">Email*</div>
										<input type="text" class="comment_input" required="required">
									</div> --}}
								</div>
								{{-- <div class="comment_notify">
									<input type="checkbox" id="checkbox_notify" name="regular_checkbox" class="regular_checkbox checkbox_account" checked>
									<label for="checkbox_notify"><i class="fa fa-check" aria-hidden="true"></i></label>
									<span>Notify me of new posts by email</span>
								</div> --}}
								<div>
									<button formaction="{{ route('main-coment.store', $model->id) }}" type="submit" class="comment_button trans_200">submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
      

      <!-- Courses Sidebar -->
      @include('main.pages.parts.sidebar')
    </div>
  </div>
</div>
@endsection

@push('course-css')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/blog_single.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/blog_single_responsive.css') }}">
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('styles/courses.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('styles/courses_responsive.css') }}"> --}}
@endpush

@push('addon-script')
  <script src="{{ asset('js/blog_single.js') }}"></script>
@endpush