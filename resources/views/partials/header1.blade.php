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
    {{-- Menu dinamis dari database --}}
    @foreach($navbarMenus as $menu)
      @if($menu->children->count() > 0)
       @php
          $isActive = request()->is('halaman/'.$menu->slug.'*');
          foreach ($menu->children as $child) {
              if (request()->is('halaman/'.$child->slug.'*')) {
                  $isActive = true;
                  break;
              }
          }
      @endphp
        <li class="dropdown {{ $isActive ? 'active' : '' }}">
          <a href="{{ $menu->url ? url($menu->url) : route('pages.show', ['slug' => $menu->slug]) }}">
            {{ $menu->title }} <i class="bi bi-chevron-down"></i>
          </a>
          <ul>
            @foreach($menu->children as $child)
              <li class="{{ request()->is('halaman/'.$child->slug.'*') ? 'active' : '' }}">
                <a href="{{ $child->url ? url($child->url) : route('pages.show', ['slug' => $child->slug]) }}">
                    {{ $child->title }}
                </a>
            </li>

            @endforeach
          </ul>
        </li>
      @else
        <li class="{{ url()->current() == ($menu->url ? url($menu->url) : route('pages.show', ['slug' => $menu->slug])) ? 'active' : '' }}">
          <a href="{{ $menu->url ? url($menu->url) : route('pages.show', ['slug' => $menu->slug]) }}">
              {{ $menu->title }}
          </a>
        </li>
      @endif
    @endforeach
  </ul>

  <i class="bi bi-list mobile-nav-toggle"></i>
</nav>
      <a href="{{ route('daftar') }}" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Daftar Sekarang!</a>

    </div>
  </header><!-- End Header -->