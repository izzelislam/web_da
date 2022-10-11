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
              <li>Profile</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>			
</div>

<div class="courses">
  <div class="container">
    <img class="img-fluid" src="{{ asset('images/component/profile_1.png') }}" alt="">
    <div class="mt-5">
      <h4 class="text-center">Profil Pondok</h4>
      <div class="my-4">
        <div class="row mb-4">
          <div class="col card">
            <div class="row card-body">
              <div class="col col-lg-4">
                <iframe  src="https://www.youtube.com/embed/41K8kJvlBvo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="col col-lg-8">
                <p>
                  Alhamdulillah segala puji bagi Allah ta’ala, sholawat serta salam tetap tercurahkan kepada Nabi Muhammad shallallahu ‘alaihi wa sallam, kepada keluarganya, sahabat, dan pengikutnya hingga akhir zaman.
                  
                  Ma’had Tahfidz Dan Studi Islam Daarul Atqiyaa' didirikan dengan sebuah cita-cita yang luhur yakni menyiapkan Generasi ‘alimah muttaqiyah yang berjiwa qur’ani dan memahami ulumusysyar’i. Generasi yang sangat istimewa dalam sejarah awal perjalanan Islam, yang dibentuk oleh Rasulullah shallallahu’alaihi wa sallam.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col card">
            <div class="card-body">
              <h4>Nama</h4>
            <p>
              Ma'had tahfidz Dan Studi Islam Daarul Atqiyaa'
            </p>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col card">
            <div class="card-body">
              <h4>Alamat</h4>
              <p>
                Jl. Melati Raya Gang Mawar No. 08  Rt.007. Rw.003  Desa Kertayasa Kec. Kramat Tegal Jawa Tengah
              </p>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col card">
            <div class="card-body">
              <h4>Visi</h4>
              <p>Terwujudnya generasi  ‘alimah muttaqiyah ( berilmu dan bertakwa ) yang berjiwa qur’ani dan siap beramal Iqomatuddin</p>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col card">
            <div class="card-body">
              <h4>Misi</h4>
              <ol>
                <li>
                  <p>
                    Melaksanakan pembelajaran dan bimbingan secara efektif, sehingga setiap santriwati dapat berkembang secara optimal dengan potensi yang dimiliki masing-masing.
                  </p>
                </li>
                <li>
                  <p>
                    Menumbuhkan semangat untuk mempelajari Ilmu Syar’i dan menghafal Al-Qur’an secara intensif kepada seluruh santriwati sehingga menjadi generasi Qur’ani.
                  </p>
                </li>
                <li>
                  <p>
                    Menyiapkan alumni yang mandiri dan mampu menginternalisasi nilai-nilai Islam dalam kehidupan sehari-hari.
                  </p>
                </li>
                <li>
                  <p>
                    Menyiapkan alumni yang siap mensyi’arkan dan menanamkan nilai – nilai Al – Qur’an di tengah – tengah masyarakat.
                  </p>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col card">
            <div class="card-body">
              <h4>Unit Pendidikan</h4>
              <div class="accordion my-4" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <p><strong>1.	UNIT MADRASAH TSANAWIYAH / MUTAWASITHOH.</strong></p>
                      </button>
                    </h2>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <h6 class="mb-3">
                        Program untuk lulusan SD/MI dengan program pendidikan selama 3 tahun, dan memiliki target :
                      </h6>
                      <ul>
                        <li>a.	Mampu membaca Al Qur’an dengan baik dan benar</li>
                        <li>b.	Mampu menghafal Al Qur’an 10 Juz.</li>
                        <li>c.	Memahami dasar Ilmu syar’i.</li>
                        <li>d.	Memiliki kecakapan dasar Bahasa Arab.</li>
                        <li>e.	Siap melanjutkan kejenjang Mu’allimat atau Tahfidz Qur’an Murni.</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <p><strong>2.	UNIT I’DAD ( Setingkat Madrasah Aliyah ). </strong></p>
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      <h6 class="mb-3">
                        Program untuk lulusan SLTP/MTs / Sederajat non pesantren ( Boarding School ) dengan program pendidikan selama 1 tahun, dan memiliki target :
                      </h6>
                      <ul>
                        <li>a.	Mampu membaca Al Qur’an dengan baik dan benar</li>
                        <li>b.	Mampu menghafal Al Qur’an 3 Juz.</li>
                        <li>c.	Memahami dasar Ilmu syar’i.</li>
                        <li>d.	Memiliki kecakapan dasar Bahasa Arab.</li>
                        <li>e.	Siap melanjutkan kejenjang Mu’allimat atau Tahfidz Qur’an Murni.</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <p><strong>3.	MU’ALLIMAT - Setingkat Madrasah Aliyah/SLTA  </strong></p>
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      <h6 class="mb-3">
                        Program untuk lulusan pesantren ( Boarding School ) setingkat  SLTP/MTs / Sederajat dengan program pendidikan selama 3 tahun, dan memiliki target :
                      </h6>
                      <ul>
                        <li>a.	Mampu membaca Al Qur’an dengan baik dan benar serta memahami ilmu tajwid.</li>
                        <li>b.	Mampu menghafal Al Qur’an 10 Juz.</li>
                        <li>c.	Memahami ilmu syar’i</li>
                        <li>d.	Mampu berbahasa Arab dan Inggris secara aktif dan pasif</li>
                        <li>e.	Mampu mandiri di usia dini</li>
                        <li>f.	Siap berperan dalam amal iqomatuddin</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThreer">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThreer" aria-expanded="false" aria-controls="collapseThreer">
                        <p><strong>4.	TAHFIDZ QUR’AN MURNI ( TQM ) - Setingkat Madrasah Aliyah/SLTA </strong></p>
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThreer" class="collapse" aria-labelledby="headingThreer" data-parent="#accordionExample">
                    <div class="card-body">
                      <h6 class="mb-3">
                        Program untuk lulusan pesantren ( Boarding School ) setingkat  SLTP/MTs / Sederajat dan Unit I’DAD dengan program pendidikan selama 3 tahun, dan memiliki target :
                      </h6>
                      <ul>
                        <li>a.	Hafal Al Qur’an 30 Juz.</li>
                        <li>b.	Mampu menghafal dan memahami matan Jazari.</li>
                        <li>c.	Memahami dasar ilmu syar’i</li>
                        <li>d.	Mampu berbahasa Arab dan Inggris secara aktif dan pasif</li>
                        <li>e.	Mampu mandiri di usia dini</li>
                        <li>f.	Siap berperan dalam amal iqomatuddin</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
  {{-- <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"
    /> --}}
@endpush

@push('addon-script')
  <script src="{{ asset('js/blog_single.js') }}"></script>
  {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.datatable').DataTable();
    });
  </script> --}}
@endpush