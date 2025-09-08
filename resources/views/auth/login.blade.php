
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login | STIFIn - Minimal Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

    <!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('themes/minia/assets/images/logo.png') }}">

<!-- preloader css -->
<link rel="stylesheet" href="{{ asset('themes/minia/assets/css/preloader.min.css') }}" type="text/css" />

<!-- Bootstrap Css -->
<link href="{{ asset('themes/minia/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('themes/minia/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('themes/minia/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xxl-3 col-lg-4 col-md-5">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5 text-center">
                                        <a href="dashboard" class="d-block auth-logo">
                                           <img src="{{ asset('themes/minia/assets/images/logo.png') }}" alt="" height="50">
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Welcome Back !</h5>
                                            <p class="text-muted mt-2">Sign in to continue to STIFIn.</p>
                                        </div>
                                        @if (session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                           <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Password</label>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="">
                                                            <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                                                    <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>

                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                                        <label class="form-check-label" for="remember-check">
                                                            Remember me
                                                        </label>
                                                    </div>  
                                                </div>
                                                
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </form>

                                        <div class="mt-4 pt-2 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="font-size-14 mb-3 text-muted fw-medium">- Sign in with -</h5>
                                            </div>

                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()"
                                                        class="social-list-item bg-primary text-white border-primary">
                                                        <i class="mdi mdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()"
                                                        class="social-list-item bg-info text-white border-info">
                                                        <i class="mdi mdi-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()"
                                                        class="social-list-item bg-danger text-white border-danger">
                                                        <i class="mdi mdi-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="text-muted mb-0">Don't have an account ? <a href="auth-register.html"
                                                    class="text-primary fw-semibold"> Signup now </a> </p>
                                        </div>
                                    </div>
                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> STIFIn   . Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
                    <div class="col-xxl-9 col-lg-8 col-md-7">
                        <div class="auth-bg pt-md-5 p-4 d-flex">
                            <div class="bg-overlay bg-primary"></div>
                            <ul class="bg-bubbles">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <!-- end bubble effect -->
                           <div class="row justify-content-center align-items-center">
    <div class="col-xl-7">
        <div class="p-0 p-sm-4 px-xl-0">
            <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                
                <!-- Indicators otomatis sesuai jumlah data -->
                <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                    @foreach($testimonials as $index => $testimonial)
                        <button type="button" 
                                data-bs-target="#reviewcarouselIndicators" 
                                data-bs-slide-to="{{ $index }}" 
                                class="{{ $index == 0 ? 'active' : '' }}" 
                                aria-current="{{ $index == 0 ? 'true' : 'false' }}" 
                                aria-label="Slide {{ $index + 1 }}">
                        </button>
                    @endforeach
                </div>

                <!-- Isi Carousel -->
                <div class="carousel-inner">
                    @foreach($testimonials as $index => $testimonial)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="testi-contain text-white">
                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                <h4 class="mt-4 fw-medium lh-base text-white">
                                    “{{ $testimonial->message }}”
                                </h4>

                                <div class="mt-4 pt-3 pb-5">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <img src="{{ $testimonial->image ? asset('storage/'.$testimonial->image) : asset('themes/minia/assets/images/users/avatar-1.jpg') }}" 
                                                 class="avatar-md img-fluid rounded-circle" 
                                                 alt="{{ $testimonial->name }}">
                                        </div>
                                        <div class="flex-grow-1 ms-3 mb-4">
                                            <h5 class="font-size-18 text-white">{{ $testimonial->name }}</h5>
                                            @if($testimonial->role)
                                                <p class="mb-0 text-white-50">{{ $testimonial->role }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- tidak ada tombol next/prev -->
            </div>
        </div>
    </div>
</div>

                                        <!-- end review carousel -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>


       <!-- JAVASCRIPT -->
<script src="{{ asset('themes/minia/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('themes/minia/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('themes/minia/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('themes/minia/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('themes/minia/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('themes/minia/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('themes/minia/assets/libs/pace-js/pace.min.js') }}"></script>
<script src="{{ asset('themes/minia/assets/js/pages/pass-addon.init.js') }}"></script>
    </body>

</html>