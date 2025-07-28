<!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> Hubungi Kami 0887888345
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="{{ route('website') }}" class="logo me-auto"><img src="/themes/Medicio/assets/img/logo.png" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto {{ request()->routeIs('website') ? 'active' : '' }}" 
         href="{{ route('website') }}">Home</a></li>
         <li class="dropdown">
            <a class="nav-link scrollto {{ request()->is('stifin/halaman/*') ? 'active' : '' }}"
                href="{{ route('static.page', ['slug' => 'tentang']) }}">Tentang STIFIn <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li>
                <a class="nav-link scrollto {{ request()->is('stifin/halaman/sensing') ? 'active' : '' }}" 
                  href="{{ route('static.page', ['slug' => 'sensing']) }}">Sensing</a>
              </li>
              <li> <a class="nav-link scrollto {{ request()->is('stifin/halaman/thinking') ? 'active' : '' }}" 
                  href="{{ route('static.page', ['slug' => 'thinking']) }}">Thinking</a>
              </li>
               <li> <a class="nav-link scrollto {{ request()->is('stifin/halaman/intuiting') ? 'active' : '' }}" 
                  href="{{ route('static.page', ['slug' => 'intuiting']) }}">Intuiting</a>
              </li>
              <li> <a class="nav-link scrollto {{ request()->is('stifin/halaman/feeling') ? 'active' : '' }}" 
                  href="{{ route('static.page', ['slug' => 'feeling']) }}">Feeling</a>
              </li>
              <li> <a class="nav-link scrollto {{ request()->is('stifin/halaman/insting') ? 'active' : '' }}" 
                  href="{{ route('static.page', ['slug' => 'insting']) }}">Insting</a>
              </li>
            </ul>
          </li>
          <li> <a class="nav-link scrollto {{ request()->routeIs('artikel') ? 'active' : '' }}" 
         href="{{ route('artikel') }}">Artikel</a></li>
          <li><a class="nav-link scrollto {{ request()->routeIs('galeri') ? 'active' : '' }}" 
         href="{{ route('galeri') }}">Galeri Program</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{ route('daftar') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Daftar Sekarang!</a>

    </div>
  </header><!-- End Header -->