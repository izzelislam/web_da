@php
  $main = [
    'Registrant' => [
      'title' => 'Pendaftar',
      'name'  => 'registrant',
      'link'  => '/admin/users',
      'icon'  => 'fa fa-graduation-cap'
    ],
    'Account' => [
      'title' => 'Akun',
      'name'  => 'account',
      'link'  => '/admin/account',
      'icon'  => 'fa fa-key'
    ],
    'SchoolYear' => [
      'title' => 'Tahun Ajaran',
      'name'  => 'school-year',
      'link'  => '/admin/school-year',
      'icon'  => 'fa fa-book'
    ],
    'Unit' => [
      'title' => 'Unit',
      'name'  => 'unit',
      'link'  => '/admin/unit',
      'icon'  => 'fa fa-school'
    ]
  ];

  $post = [
    'Category' => [
      'title' => 'Category',
      'name'  => 'category',
      'link'  => '/admin/article-category',
      'icon'  => 'fa fa-leaf'
    ],
    'Article' => [
      'title' => 'Article',
      'name'  => 'article',
      'link'  => '/admin/article',
      'icon'  => 'fa fa-file'
    ],
    'Media' => [
      'title' => 'Media',
      'name'  => 'media',
      'link'  => '#',
      'icon'  => 'fa fa-video',
      'child' => [
        [
          'title' => 'Galery',
          'link'  => '/admin/galery'
        ],
        [
          'title' => 'Video',
          'link'  => '/admin/video'
        ]
      ]
    ],
    'Slider' => [
      'title' => 'Slider',
      'name'  => 'slider',
      'link'  => '/admin/slider',
      'icon'  => 'fa fa-image'
],
'Flayer' => [
      'title' => 'Flayer',
      'name'  => 'flayer',
      'link'  => '/admin/flayer',
      'icon'  => 'fa fa-paw'
    ]
  ];

  $others = [
    'User' => [
      'title' => 'User',
      'name'  => 'User',
      'link'  => '/admin/admin-user',
      'icon'  => 'fa fa-user-secret'
    ],
    'Setting' => [
      'title' => 'Setting',
      'name'  => 'setting',
      'link'  => '/admin/setting',
      'icon'  => 'fa fa-gear'
    ],
  ];

  $menus = ['Menu Utama' => $main, 'Post' => $post, 'Lain Lain' => $others];
@endphp

<div id="app-sidepanel" class="app-sidepanel"> 
  <div id="sidepanel-drop" class="sidepanel-drop"></div>
  <div class="sidepanel-inner d-flex flex-column">
    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
    <div class="app-branding">
      <a  href="index.html">
        @isset(SettingData()->logo)
          <img width="60" src="{{ asset('images/component/logo.png') }}" alt="logo">
        @endisset
        <span class="logo-text">CMS</span></a>
    </div>
    
    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
      <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        <li class="nav-item">
          <a class="nav-link" href="/admin/dashboard">
            <span class="nav-icon">
              <i class="fa fa-home"></i>
            </span>
            <span class="nav-link-text">Home</span>
          </a>
        </li>
        @foreach ($menus as $index => $value)
          <div class="px-3 fw-bold pt-4">{{ $index }}</div>
          @foreach ($value as $key => $item)
            @if (empty($item['child']))
              <li class="nav-item">
                <a class="nav-link" href="{{ $item['link'] }}">
                  <span class="nav-icon">
                    <i class="{{ $item['icon'] }}"></i>
                  </span>
                  <span class="nav-link-text">{{ $item['title'] }}</span>
                </a>
              </li>
            @endif
            @if (!empty($item['child']))
              <li class="nav-item has-submenu">
                  <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                  <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                    <span class="nav-icon">
                      <i class="{{ $item['icon'] }}"></i>
                    </span>
                    <span class="nav-link-text">{{ $item['title'] }}</span>
                    <span class="submenu-arrow">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                      </svg>
                    </span>
                  </a><!--//nav-link-->
                  <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                      @foreach ($item['child'] as $sub_menu)
                        <li class="submenu-item">
                          <a 
                            class="submenu-link" 
                            href="{{ $sub_menu['link'] }}"
                          >
                            {{ $sub_menu['title'] }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </div>
              </li>
            @endif
          @endforeach
        @endforeach
      </ul>
    </nav>
  </div>
</div>