{{-- <footer class="footer">
  <div class="footer_background" style=""></div>
  <div class="container">
    <div class="row footer_row">
      <div class="col">
        <div class="footer_content">
          <div class="row">

            <div class="col-lg-3 footer_col">
        
              <!-- Footer About -->
              <div class="footer_section footer_about">
                <div class="footer_logo_container">
                  <a href="#">
                    <img class="logo" src="{{ asset('images/component/logo.png') }}" alt="logo"> <span class="btn side-logo text-white">Daarul Atqiyaa'</span>
                  </a>
                </div>
                <div class="footer_about_text">
                  <p>Pondok pesantern dan studi islam Daarul Atqiyaa'</p>
                </div>
                <div class="footer_social">
                  <ul>
                    <li><a href="https://web.facebook.com/mahadtahfidz.daarulatqiya" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/mtsidaarulatqiyaa/" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCZE7q8hBkFPqPmryyhFUz4g" target="blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
              
            </div>

            <div class="col-lg-3 footer_col">
        
              <!-- Footer Contact -->
              <div class="footer_section footer_contact">
                <div class="footer_title">Kontak Kami</div>
                <div class="footer_contact_info">
                  <ul>
                    <li>Email: {{ SettingData()->email ?? '' }}</li>
                    <li>Phone 1:  {{ SettingData()->wa_1 ?? '' }}</li>
                    <li>Phone 2:  {{ SettingData()->wa_2 ?? '' }}</li>
                    <li>{{ SettingData()->address ?? '' }}</li>
                  </ul>
                </div>
              </div>
              
            </div>

            <div class="col-lg-3 footer_col">
        
              <!-- Footer links -->
              <div class="footer_section footer_links">
                <div class="footer_title">Pintasan</div>
                <div class="footer_links_container">
                  <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">Article</a></li>
                    <li><a href="contact.html">Galeri</a></li>
                    <li><a href="#">Profil</a></li>
                  </ul>
                </div>
              </div>
              
            </div>

            <div class="col-lg-3 footer_col clearfix">
        
              <!-- Footer links -->
              <div class="footer_section footer_mobile">
                <div class="footer_title">Mobile</div>
                <div class="footer_mobile_content">
                  <div class="footer_image"><a href="#"><img src="images/mobile_1.png" alt=""></a></div>
                  <div class="footer_image"><a href="#"><img src="images/mobile_2.png" alt=""></a></div>
                </div>
              </div>
              
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row copyright_row">
      <div class="col">
        <div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
          <div class="cr_text">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Divisi IT Daarul Atqiyaa
        </div>
      </div>
    </div>
  </div>
</footer> --}}

<footer class="footer py-5">
  <div class="container">
      {{-- <div class="row">
          <div class="col-lg-3 mb-5 mb-lg-0">
              <h6 class="text-uppercase mb-2">Houses</h6>
              <p class="mb-4 pb-2">Find your next home.</p>
              <a href="javascript:;" class="text-secondary me-xl-4 me-3">
                  <span class="text-lg fab fa-facebook" aria-hidden="true"></span>
              </a>
              <a href="javascript:;" class="text-secondary me-xl-4 me-3">
                  <span class="text-lg fab fa-twitter" aria-hidden="true"></span>
              </a>
              <a href="javascript:;" class="text-secondary me-xl-4 me-3">
                  <span class="text-lg fab fa-instagram" aria-hidden="true"></span>
              </a>
              <a href="javascript:;" class="text-secondary me-xl-4 me-3">
                  <span class="text-lg fab fa-pinterest" aria-hidden="true"></span>
              </a>
              <a href="javascript:;" class="text-secondary me-xl-4 me-3">
                  <span class="text-lg fab fa-github" aria-hidden="true"></span>
              </a>
          </div>
          <div class="col-md-2 col-6 ms-lg-auto mb-md-0 mb-4">
              <h6 class="text-sm">Company</h6>
              <ul class="flex-column ms-n3 nav">
                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:void(0);">
                          About Us
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Careers
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Press
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Blog
                      </a>
                  </li>
              </ul>
          </div>

          <div class="col-md-2 col-6 mb-md-0 mb-4">
              <h6 class="text-sm">Pages</h6>
              <ul class="flex-column ms-n3 nav">
                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Login
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Register
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Add list
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Contact
                      </a>
                  </li>
              </ul>
          </div>

          <div class="col-md-2 col-6 mb-md-0 mb-4">
              <h6 class="text-sm">Legal</h6>
              <ul class="flex-column ms-n3 nav">
                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Terms
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          About Us
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Team
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Privacy
                      </a>
                  </li>
              </ul>
          </div>

          <div class="col-md-2 col-6 mb-md-0 mb-4">
              <h6 class="text-sm">Resources</h6>
              <ul class="flex-column ms-n3 nav">
                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Blog
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Service
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Product
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link text-secondary" href="javascript:;">
                          Pricing
                      </a>
                  </li>
              </ul>
          </div>
      </div> --}}
      <hr class="horizontal dark mt-lg-5 mt-4 mb-sm-4 mb-1">
      <div class="row">
          <div class="col-8 mx-lg-auto text-lg-center">
              <p class="text-sm text-secondary">
                  Copyright © {{ date('Y') }} Divisi IT Daarul Atqiyaa'
              </p>
          </div>
      </div>
  </div>
</footer>