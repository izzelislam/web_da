<div class="col-lg-4">
  <div class="sidebar">

    <!-- Categories -->
    <div class="sidebar_section">
      <div class="sidebar_section_title">Categori Teratas</div>
      <div class="sidebar_categories">
        <ul>
          @foreach ($categoriesLimit as $clm )
            <li><a href="{{ route('main-article.index', ['category_id' => $clm->id]) }}">{{ $clm->name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>

    <!-- Latest Course -->
    <div class="sidebar_section">
      <div class="sidebar_section_title">Postingan Terbaru</div>
      <div class="sidebar_latest">
        @foreach ($latest as $late)
          <!-- Latest Course -->
          <div class="latest d-flex flex-row align-items-start justify-content-start">
            <div class="latest_image"><div><img src="{{ asset($late->cover_image) }}" alt=""></div></div>
            <div class="latest_content">
              <div class="latest_title"><a href="{{ route('main-article.show', $late->slug) }}">{{ $late->title }}</a></div>
              <div class=""><small><b>{{ $late->created_by }}</b></small></div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <!-- Gallery -->
    <div class="sidebar_section">
      <div class="sidebar_section_title">Galeri</div>
      <div class="sidebar_gallery">
        <ul class="gallery_items d-flex flex-row align-items-start justify-content-between flex-wrap">
          @foreach ($galeries as $galery)
            <li class="gallery_item">
              <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
              <a class="colorbox" href="{{ asset($galery->name) }}">
                <img src="{{ asset($galery->name) }}" alt="">
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    <!-- Tags -->
    <div class="sidebar_section">
      <div class="sidebar_section_title">Flayer</div>
      <div class="sidebar_tags">
        @foreach ($flayers as $flayer)
          <div class="my-2">
            <b>{{ $flayer->title }} | <a href="{{ route('flayer.download', $flayer->id) }}">DOWNLOAD</a></b>
            <hr class="mb-1">
            <img class="img-fluid" src="{{ asset($flayer->img) }}" alt="">
          </div>
        @endforeach
      </div>
    </div>

    <!-- Banner -->
    <div class="sidebar_section">
      <div class="sidebar_banner d-flex flex-column align-items-center justify-content-center text-center">
        <div class="sidebar_banner_background" style="background-image:url(images/banner_1.jpg)"></div>
        <div class="sidebar_banner_overlay"></div>
        <div class="sidebar_banner_content">
          <div class="banner_button"><a href="{{ route('register.index') }}">Daftar Sekarang</a></div>
        </div>
      </div>
    </div>
  </div>
</div>