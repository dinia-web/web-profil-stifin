
@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Kartu Sambutan -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="card-welcome">
                <div>
                    <h5>Selamat Datang {{ Auth::user()->name ?? 'User' }}!</h5>
                    <p>Silakan pilih menu di atas untuk mengelola konten website.</p>
                </div>
                <div>
                    <span class="date-badge">{{ \Carbon\Carbon::now()->format('d M Y') }}</span>
                </div>
            </div>

        </div>
    </div>

    <!-- Statistik -->
    <div class="row">
        <!-- Total Pendaftar -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0" style="background-color: #dc3545; color: white;">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold">Total Pendaftar</h6>
                        <h4 class="mb-0">{{ \App\Models\Pendaftaran::count() }}</h4>
                    </div>
                    <div>
                        <i class="bx bx-news" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pembayaran Terkonfirmasi -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0" style="background-color: #fd7e14; color: white;">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold">Pembayaran Terkonfirmasi</h6>
                        <h4 class="mb-0">{{ $pembayaranTerkonfirmasi ?? 98 }}</h4>
                    </div>
                    <div>
                        <i class="bx bx-wallet" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total TES -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0" style="background-color: #28a745; color: white;">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold">Total Tes</h6>
                        <h4 class="mb-0">{{ \App\Models\Pendaftaran::whereIn('status', ['2','3'])->count() }}</h4>
                    </div>
                    <div>
                        <i class="bx bx-user" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
