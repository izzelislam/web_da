<footer class="footer">
  {{-- background-image:url(images/footer_background.png --}}
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
</footer>