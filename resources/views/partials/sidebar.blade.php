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

                  <li class="{{ request()->routeIs('branches.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('branches.index') }}">
                        <i class="bx bx-building-house"></i>
                        <span>Cabang</span>
                    </a>
                </li>
                
                <li class="{{ request()->routeIs('promotors.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('promotors.index') }}">
                        <i class="bx bx-group"></i>
                        <span data-key="t-promotor">Promotor</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('users.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="bx bx-user"></i>
                        <span data-key="t-users">Manajemen Pengguna</span>
                    </a>
                </li>

                <li class="has-submenu {{ request()->routeIs('galleries.*') || request()->routeIs('downloads.*') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="bx bx-image-alt"></i>
                        <span data-key="t-media">Media</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ request()->routeIs('galleries.*') ? 'active' : '' }}">
                            <a href="{{ route('galleries.index') }}">Galeri</a>
                        </li>
                        <li class="{{ request()->routeIs('downloads.*') ? 'active' : '' }}">
                            <a href="{{ route('downloads.index') }}">File Download</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->routeIs('admin.infos.*') || request()->routeIs('kategoris.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.infos.index') }}"
                    class="{{ request()->routeIs('admin.infos.*') || request()->routeIs('kategoris.*') ? 'active' : '' }}">
                        <i class="bx bx-info-circle"></i>
                        <span data-key="t-info">Info</span>
                    </a>
                </li>

                  <li>
                    <a href="{{ route('admin.pendaftaran.index') }}">
                        <i class="bx bx-id-card"></i>
                        <span data-key="t-pendaftar">Pendaftar Tes STIFIn</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('testimonials.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('testimonials.index') }}">
                        <i class="bx bx-comment-detail"></i>
                        <span data-key="t-testimonials">Testimonial</span>
                    </a>
                </li>


                 <li class="{{ request()->routeIs('admin.pages.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.pages.index') }}">
                        <i class="bx bx-file"></i>
                        <span data-key="t-statis">Halaman Statis</span>
                    </a>
                </li>

                 <li class="{{ request()->routeIs('contacts.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('contacts.index') }}">
                        <i class="bx bx-phone"></i>
                        <span data-key="t-kontak">Kontak</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('menus.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('menus.index') }}">
                        <i class="bx bx-food-menu"></i>
                        <span data-key="t-menu">Menu</span>
                    </a>
                </li>

                <li class="has-submenu {{ request()->routeIs('branches.*') || request()->routeIs('promotors.*') || request()->routeIs('admin.pendaftaran.*') ? 'mm-active' : '' }}">
    <a href="javascript:void(0);" class="waves-effect">
        <i class="bx bx-folder"></i>
        <span data-key="t-management">Management</span>
        <span class="menu-arrow"></span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li class="{{ request()->routeIs('branches.*') ? 'active' : '' }}">
            <a href="{{ route('branches.index') }}">Cabang</a>
        </li>
        <li class="{{ request()->routeIs('promotors.*') ? 'active' : '' }}">
            <a href="{{ route('promotors.index') }}">Promotor</a>
        </li>
        <li class="{{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}">
            <a href="{{ route('admin.pendaftaran.index') }}">Pendaftar Tes STIFIn</a>
        </li>
    </ul>
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

    </div>
</div>
<!-- Left Sidebar End -->
