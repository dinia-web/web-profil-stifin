@extends('layouts.website')

@section('title', $info->judul)

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">{{ $info->judul }}</h2>
     <ol class="breadcrumb mb-0 p-0">
      <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $info->judul }}</li>
    </ol>
    </div>

  </div>
</section>
<!-- End Breadcrumb Section -->
<div class="container py-5">
    <div>
        <div >
              <div class="text-center">
                @if($info->gambar)
                    <img src="{{ asset('storage/' . $info->gambar) }}" class="img-fluid mb-3" alt="{{ $info->judul }}">
                @endif

                <p class="text-muted mb-4">
                    Dipublikasikan pada {{ \Carbon\Carbon::parse($info->published_at)->format('d M Y') }} |
                    Kategori: {{ $info->kategori->nama ?? '-' }}
                </p>
            </div>
            <div>
                {!! $info->isi !!}
            </div>
        </div>
    </div>
</div>
@endsection
