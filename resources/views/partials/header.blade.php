<!-- Header -->
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                            <a href="dashboard" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('themes/minia/assets/images/logo-sm.svg') }}" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('themes/minia/assets/images/logo-sm.svg') }}" alt="" height="24"> <span class="logo-txt">STIFIn</span>
                                </span>
                            </a>

                            <a href="dashboard" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('themes/minia/assets/images/logo-sm.svg') }}" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('themes/minia/assets/images/logo-sm.svg') }}" alt="" height="24"> <span class="logo-txt">STIFIn</span>
                                </span>
                            </a>
                        </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search -->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('themes/minia/assets/images/flags/us.jpg') }}" alt="Language" height="16">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="javascript:void(0);" class="dropdown-item notify-item language">
                        <img src="{{ asset('themes/minia/assets/images/flags/us.jpg') }}" alt="English" class="me-1" height="12"> <span class="align-middle">English</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item language">
                        <img src="{{ asset('themes/minia/assets/images/flags/spain.jpg') }}" alt="Spanish" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                    </a>
                    <!-- Tambahkan bahasa lain jika perlu -->
                </div>
            </div>

             <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-account-circle-outline"></i>
                    <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name ?? 'User' }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> Logout</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- End Header -->
