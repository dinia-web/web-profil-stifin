
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
                        <div class="auth-full-page-content d-flex p-sm-5 p-5">
                            <div class="w-100">
                               <div class="d-flex flex-column h-100">
                                    <div class=" text-center">
                                        <a href="{{ route('dashboard') }}" class="d-block auth-logo">
                                           <img src="{{ asset('themes/minia/assets/images/logo.png') }}" alt="" height="65">
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Welcome Back !</h5>
                                            <p class="text-muted mb-2 mt-2">Sign in to continue to STIFIn Smart Solutions.</p>
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
                                                </div>
                                                
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                                                    <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>

                                            </div>
                                            <div class="row mb-4">
                                                
                                            </div>
                                            <div>
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Dnf  . STIFIn Smart Solutions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
                    <div class="col-xxl-9 col-lg-8 col-md-7">
                        <div class="auth-bg pt-md-5 p-4 d-flex">
                            <!-- end bubble effect -->
                           <div class="row justify-content-center align-items-center">

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