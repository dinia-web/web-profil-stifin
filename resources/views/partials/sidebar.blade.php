<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- Sidebar Menu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('website') }}">
                        <i class="bx bx-home-circle"></i>
                        <span data-key="t-home">Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="bx bx-layout"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="bx bx-user"></i>
                        <span data-key="t-users">Manajemen Pengguna</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('kategoris.index') }}">
                        <i class="bx bx-category"></i>
                        <span data-key="t-kategori">Kategori</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('infos.index') }}">
                        <i class="bx bx-info-circle"></i>
                        <span data-key="t-info">Info</span>
                    </a>
                </li>

                 <li>
    <a href="{{ route('admin.index') }}">
        <i class="bx bx-file"></i>
        <span data-key="t-statis">Halaman Statis</span>
    </a>
</li>

                <li>
                    <a href="{{ route('downloads.index') }}">
                        <i class="bx bx-download"></i>
                        <span data-key="t-downloads">File Download</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('galleries.index') }}">
                        <i class="bx bx-image-alt"></i>
                        <span data-key="t-gallery">Galeri</span>
                    </a>
                </li>

                 <li>
                    <a href="{{ route('contacts.index') }}">
                        <i class="bx bx-phone"></i>
                        <span data-key="t-kontak">Kontak</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('menus.index') }}">
                        <i class="bx bx-food-menu"></i>
                        <span data-key="t-menu">Menu</span>
                    </a>
                </li>

                <li class="menu-title mt-2" data-key="t-other">Lainnya</li>

                <li>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bx bx-power-off"></i>
        <span data-key="t-logout">Logout</span>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>

            </ul>
        </div>
        <!-- Sidebar -->
         {{-- Menu Dinamis dari Database --}}
    @if(isset($mainMenus) && $mainMenus->count())
        @foreach($mainMenus as $menu)
            @if($menu->children->count())
                <div class="list-group-item">
                    <strong>{{ $menu->title }}</strong>
                    <div class="list-group ps-3">
                        @foreach($menu->children as $child)
                            <a href="{{ url($child->url) }}" class="list-group-item list-group-item-action">
                                {{ $child->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <a href="{{ url($menu->url) }}" class="list-group-item list-group-item-action">
                    {{ $menu->title }}
                </a>
            @endif
        @endforeach
    @endif

    </div>
</div>
<!-- Left Sidebar End -->
