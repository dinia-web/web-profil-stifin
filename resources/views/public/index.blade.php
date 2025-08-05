@extends('layouts.website')

@section('title', 'Artikel Terbaru')

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">

     <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">Artikel</h2>
     <ol class="breadcrumb mb-0 p-0">
      <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Artikel</li>
    </ol>
    </div>

  </div>
</section>
<!-- End Breadcrumb Section -->
<!-- ======= artikels Section ======= -->
<section id="artikel" class="artikel py-5">
  <div class="container" data-aos="fade-up">

    <div class="section-title text-center mb-2">
      <p>Pelajari STIFIn lebih dalam dengan membaca artikel berikut. InsyaAllah <br>
        pemahaman anda tentang STIFIn akan semakin baik.</p>
    </div>

    <div class="row justify-content-center">
    @php
use App\Models\Info;

$infos = Info::where('kategori_id', 2)
    ->where('status', 'published')
    ->latest()
    ->get(); // ← tanpa pagination
@endphp


        @forelse($infos as $info)
            <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                <div class="artikel-card card p-3 h-100">
                    @if($info->gambar)
                        <img src="{{ asset('storage/' . $info->gambar) }}" class="card-img-top" alt="{{ $info->judul }}">
                    @else
                        <img src="/themes/Medicio/assets/img/stifin.jpg" class="card-img-top" alt="Artikel STIFIn">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $info->judul }}</h5>
                        <p class="card-text">
                        {{ Str::limit(strip_tags($info->isi), 80) }}
                        </p>
                        <a href="{{ route('public.show', $info->slug) }}" class="btn btn-primary btn-sm">Read More →</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Belum ada artikel.</p>
            </div>
        @endforelse
    </div>

  </div>
</section>
@endsection
