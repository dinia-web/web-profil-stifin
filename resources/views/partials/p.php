 <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto {{ request()->routeIs('website') ? 'active' : '' }}" 
         href="{{ route('website') }}">Home</a></li>
         <li class="dropdown">
            <a class="nav-link scrollto {{ request()->is('halaman/*') ? 'active' : '' }}"
              href="{{ route('pages.show', ['slug' => 'tentang-stifin']) }}">Tentang STIFIn
              <i class="bi bi-chevron-down"></i>
            </a>
            <ul>
              <li>
                <a class="nav-link scrollto {{ request()->is('halaman/sensing') ? 'active' : '' }}"
                  href="{{ route('pages.show', ['slug' => 'sensing']) }}">Sensing</a>
              </li>
              <li> <a class="nav-link scrollto {{ request()->is('halaman/thinking') ? 'active' : '' }}" 
                  href="{{ route('pages.show', ['slug' => 'thinking']) }}">Thinking</a>
              </li>
               <li> <a class="nav-link scrollto {{ request()->is('halaman/intuiting') ? 'active' : '' }}" 
                  href="{{ route('pages.show', ['slug' => 'intuiting']) }}">Intuiting</a>
              </li>
              <li> <a class="nav-link scrollto {{ request()->is('halaman/feeling') ? 'active' : '' }}" 
                  href="{{ route('pages.show', ['slug' => 'feeling']) }}">Feeling</a>
              </li>
              <li> <a class="nav-link scrollto {{ request()->is('halaman/insting') ? 'active' : '' }}" 
                  href="{{ route('pages.show', ['slug' => 'insting']) }}">Insting</a>
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