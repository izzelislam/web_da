@extends('main.layouts.app')

@section('content')
  <!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url({{ asset('images/component/slider_1.jpeg') }})"></div>
					<div class="overlay"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<h4 class="text-white my-3">selamat Datang Di Halaman Resmi</h3>
									<h1 class="home_slider_title" id="type">Pondok Pesantren Daarul Atqiyaa'</h1>
									<p id="types" class="home_slider_title"></p>
									<!-- <div class="home_slider_subtitle">Future Of Education Technology</div> -->
									@if ($school_year->status)
										<div class="mt-4">
											<a href="{{ route('register.index') }}" class="btn background-info text-white btn-lg px-5 mx-2">Daftar Sekarang</a>
											<!-- <button class="btn bg-warning text-white btn-lg px-5 mx-2">Contact Admin</button> -->
										</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>

				{{-- <div class="owl-item">
					<div class="home_slider_background" style="background-image:url({{ asset('images/component/slider_1.jpeg') }})"></div>
					<div class="overlay"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<h4 class="text-white my-3">selamat Datang Di Halaman Resmi</h3>
									<p class="home_slider_title" id="type">Ma'had Tahfidz Dan Studi Islam <br> Daarul Atqiyaa'</p>
									<p id="types" class="home_slider_title"></p>
									<!-- <div class="home_slider_subtitle">Future Of Education Technology</div> -->
									<div class="mt-4">
										<button class="btn background-info text-white btn-lg px-5 mx-2">Daftar Sekarang</button>
										<!-- <button class="btn bg-warning text-white btn-lg px-5 mx-2">Contact Admin</button> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> --}}

				@foreach ($sliders as $slider)
					<div class="owl-item">
						<div class="home_slider_background" style="background-image:url({{ asset($slider->img) }})"></div>
						<div class="overlay"></div>
						<div class="home_slider_content">
							<div class="container">
								<div class="row">
									<div class="col text-center">
										<p class="home_slider_title" id="type">{{ $slider->title }}</p>
										<h4 class="text-white my-3">{{ $slider->sub_title }}</h3>
										<p id="types" class="home_slider_title"></p>
										<!-- <div class="home_slider_subtitle">Future Of Education Technology</div> -->
										@isset($slider->button_text)
											<div class="mt-4">
												<a href="{{ $slider->button_link ?? '' }}" class="btn background-info text-white btn-lg px-5 mx-2">{{ $slider->button_text }}</a>
												<!-- <button class="btn bg-warning text-white btn-lg px-5 mx-2">Contact Admin</button> -->
											</div>
										@endisset
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach

			</div>
		</div>

		<!-- Home Slider Nav -->

		<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
	</div>

	<!-- Features -->

	<div class="features">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Program Studi</h2>
						<!-- <div class="section_subtitle"><p>Tersedia beberapa </p></div> -->
					</div>
				</div>
			</div>
			<div class="row features_row">
				
				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="images/icon_2.png" alt=""></div>
						<h3 class="feature_title">Wushtha/SMP</h3>
						<div class="feature_text"><p>Program untuk lulusan SD/MI dengan program pendidikan selama 3 tahun</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="images/icon_2.png" alt=""></div>
						<h3 class="feature_title">I'dad</h3>
						<div class="feature_text"><p>Program untuk lulusan SLTP/MTs / Sederajat non pesantren ( Boarding School ) dengan program pendidikan selama 1 tahun</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="images/icon_2.png" alt=""></div>
						<h3 class="feature_title">Mu'allimat</h3>
						<div class="feature_text"><p>Program untuk lulusan pesantren ( Boarding School ) setingkat  SLTP/MTs / Sederajat dengan program pendidikan selama 3 tahun</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="images/icon_2.png" alt=""></div>
						<h3 class="feature_title">TQM</h3>
						<div class="feature_text"><p>Program untuk lulusan pesantren ( Boarding School ) setingkat  SLTP/MTs / Sederajat dan Unit I’DAD dengan program pendidikan selama 3 tahun</p></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Counter -->

	<div class="counter"  style="position: relative">
		<div class="counter_background" style="background-image:url({{ asset('images/component/slider_1.jpeg') }})"></div>
		<div style="position: absolute; top:0; right:0; bottom:0; left:0; background-color:rgba(28, 36, 95, 0.557)"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="counter_content">
						<h2 class="counter_title">Tentang Kami</h2>
						<div class="counter_text"><p>Ma’had Tahfidz Dan Studi Islam Daarul Atqiyaa' didirikan dengan sebuah cita-cita yang luhur yakni menyiapkan Generasi ‘alimah muttaqiyah yang berjiwa qur’ani dan memahami ulumusysyar’i. Generasi yang sangat istimewa dalam sejarah awal perjalanan Islam, yang dibentuk oleh Rasulullah shallallahu’alaihi wa sallam</p></div>

						<!-- Milestones -->

						{{-- <div class="milestones d-flex flex-md-row flex-column align-items-center justify-content-between">
							
							<!-- Milestone -->
							<div class="milestone">
								<div class="milestone_counter" data-end-value="15">0</div>
								<div class="milestone_text">years</div>
							</div>

							<!-- Milestone -->
							<div class="milestone">
								<div class="milestone_counter" data-end-value="120" data-sign-after="k">0</div>
								<div class="milestone_text">years</div>
							</div>

							<!-- Milestone -->
							<div class="milestone">
								<div class="milestone_counter" data-end-value="670" data-sign-after="+">0</div>
								<div class="milestone_text">years</div>
							</div>

							<!-- Milestone -->
							<div class="milestone">
								<div class="milestone_counter" data-end-value="320">0</div>
								<div class="milestone_text">years</div>
							</div>

						</div> --}}
					</div>

				</div>
			</div>

			{{-- <div class="counter_form">
				<div class="row fill_height">
					<div class="col fill_height">
						<form class="counter_form_content d-flex flex-column align-items-center justify-content-center" action="#">
							<div class="counter_form_title">courses now</div>
							<input type="text" class="counter_input" placeholder="Your Name:" required="required">
							<input type="tel" class="counter_input" placeholder="Phone:" required="required">
							<select name="counter_select" id="counter_select" class="counter_input counter_options">
								<option>Choose Subject</option>
								<option>Subject</option>
								<option>Subject</option>
								<option>Subject</option>
							</select>
							<textarea class="counter_input counter_text_input" placeholder="Message:" required="required"></textarea>
							<button type="submit" class="counter_form_button">submit now</button>
						</form>
					</div>
				</div>
			</div> --}}

		</div>
	</div>

	<!-- latest post -->

	<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="images/courses_background.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Artikel Terbaru</h2>
					</div>
				</div>
			</div>
			<div class="row courses_row">
				@foreach ($latests as $info )
					<div class="col-lg-4 event_col">
						<div class="event event_left">
							<div class="event_image"><img src="{{ asset($info->cover_image) }}" alt=""></div>
							<div class="event_body d-flex flex-row align-items-start justify-content-start">
								<div class="event_date">
									<div class="d-flex flex-column align-items-center justify-content-center trans_200">
										<div class="event_day trans_200">{{ $info->created_at->format('d') }}</div>
										<div class="event_month trans_200">{{ $info->created_at->format('M') }}</div>
									</div>
								</div>
								<div class="event_content">
									<div class="event_title"><a href="{{ route('main-article.show', $info->slug) }}">{{ $info->title }}</a></div>
									<div class="event_info_container">
										<div class="event_info"><span class="badge bg-success text-white">{{ $info->category->name }}</span></div>
										<div class="event_text">
											<p>{!! Str::limit($info->short_describtion, 100) !!}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row">
				<div class="col">
					<div class="courses_button trans_200"><a href="#">Lihat Lebih Banyak</a></div>
				</div>
			</div>
		</div>
	</div>


	<!-- News -->

	<div class="events">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Kabar Pondok</h2>
						{{-- <div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div> --}}
					</div>
				</div>
			</div>
			<div class="row events_row">
				<!-- Event -->
				@foreach ($infos as $info )
					<div class="col-lg-4 event_col">
						<div class="event event_left">
							<div class="event_image"><img src="{{ asset($info->cover_image) }}" alt=""></div>
							<div class="event_body d-flex flex-row align-items-start justify-content-start">
								<div class="event_date">
									<div class="d-flex flex-column align-items-center justify-content-center trans_200">
										<div class="event_day trans_200">{{ $info->created_at->format('d') }}</div>
										<div class="event_month trans_200">{{ $info->created_at->format('M') }}</div>
									</div>
								</div>
								<div class="event_content">
									<div class="event_title"><a href="{{ route('main-article.show', $info->slug) }}">{{ $info->title }}</a></div>
									<div class="event_info_container">
										<div class="event_info"><span class="badge bg-success text-white">{{ $info->category->name }}</span></div>
										<div class="event_text">
											<p>{{ Str::limit($info->short_describtion, 100) }}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row">
				<div class="col">
					<div class="courses_button trans_200"><a href="#">Lihat Lebih Banyak</a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Team -->

	{{-- <div class="team">
		<div class="team_background parallax-window" data-parallax="scroll" data-image-src="images/team_background.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">The Best Tutors in Town</h2>
						<div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div>
					</div>
				</div>
			</div>
			<div class="row team_row">
				
				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="images/team_1.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">Jacke Masito</a></div>
							<div class="team_subtitle">Marketing & Management</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="images/team_2.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">William James</a></div>
							<div class="team_subtitle">Designer & Website</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="images/team_3.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">John Tyler</a></div>
							<div class="team_subtitle">Quantum mechanics</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="images/team_4.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">Veronica Vahn</a></div>
							<div class="team_subtitle">Math & Physics</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div> --}}

	<!-- Latest News -->

	{{-- <div class="news">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Latest News</h2>
						<div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div>
					</div>
				</div>
			</div>
			<div class="row news_row">
				<div class="col-lg-7 news_col">
					
					<!-- News Post Large -->
					<div class="news_post_large_container">
						<div class="news_post_large">
							<div class="news_post_image"><img src="images/news_1.jpg" alt=""></div>
							<div class="news_post_large_title"><a href="blog_single.html">Here’s What You Need to Know About Online Testing for the ACT and SAT</a></div>
							<div class="news_post_meta">
								<ul>
									<li><a href="#">admin</a></li>
									<li><a href="#">november 11, 2017</a></li>
								</ul>
							</div>
							<div class="news_post_text">
								<p>Policy analysts generally agree on a need for reform, but not on which path policymakers should take. Can America learn anything from other nations...</p>
							</div>
							<div class="news_post_link"><a href="blog_single.html">read more</a></div>
						</div>
					</div>
				</div>

				<div class="col-lg-5 news_col">
					<div class="news_posts_small">

						<!-- News Posts Small -->
						<div class="news_post_small">
							<div class="news_post_small_title"><a href="blog_single.html">Home-based business insurance issue (Spring 2017 - 2018)</a></div>
							<div class="news_post_meta">
								<ul>
									<li><a href="#">admin</a></li>
									<li><a href="#">november 11, 2017</a></li>
								</ul>
							</div>
						</div>

						<!-- News Posts Small -->
						<div class="news_post_small">
							<div class="news_post_small_title"><a href="blog_single.html">2018 Fall Issue: Credit Card Comparison Site Survey (Summer 2018)</a></div>
							<div class="news_post_meta">
								<ul>
									<li><a href="#">admin</a></li>
									<li><a href="#">november 11, 2017</a></li>
								</ul>
							</div>
						</div>

						<!-- News Posts Small -->
						<div class="news_post_small">
							<div class="news_post_small_title"><a href="blog_single.html">Cuentas de cheques gratuitas una encuesta de Consumer Action</a></div>
							<div class="news_post_meta">
								<ul>
									<li><a href="#">admin</a></li>
									<li><a href="#">november 11, 2017</a></li>
								</ul>
							</div>
						</div>

						<!-- News Posts Small -->
						<div class="news_post_small">
							<div class="news_post_small_title"><a href="blog_single.html">Troubled borrowers have fewer repayment or forgiveness options</a></div>
							<div class="news_post_meta">
								<ul>
									<li><a href="#">admin</a></li>
									<li><a href="#">november 11, 2017</a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div> --}}

@endsection