@extends('layouts.website')

@section('title', 'Galeri Program')

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">Galeri Program</h2>
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Galeri Program</li>
      </ol>
    </div>
  </div>
</section>
<!-- End Breadcrumb Section -->

<section class="galeri py-5">
  <div class="container">
    <div class="row justify-content-center">

@php
  use App\Models\Gallery;

  // Ganti angka `1` dengan ID kategori galeri yang kamu inginkan
 $galleries = Gallery::with('album')
    ->where('category_id', 1)
    ->where('status', 'published')
    ->where('is_featured', true)
    ->orderBy('album_id', 'asc') // urut album_id terkecil dulu
    ->get()
    ->groupBy('album_id');

@endphp

@foreach ($galleries as $albumId => $albumGalleries)
  <div class="col-md-6 mb-4">
    <h5 class="text-center fw-bold">
      {{ $albumGalleries->first()->album->name ?? 'Tanpa Nama Album' }}
    </h5>

    <div class="swiper galeriSwiper1" id="lightgallery-{{ $albumId }}">
      <div class="swiper-wrapper">
       @foreach ($albumGalleries as $gallery)
  <div class="swiper-slide text-center">
    <a href="{{ asset('storage/' . $gallery->image_path) }}"
      data-sub-html="<h4>{{ $gallery->album->name ?? 'Tanpa Album' }}</h4>
                     <p>{{ $gallery->description }}</p>">
      <img src="{{ asset('storage/' . $gallery->image_path) }}" class="img-fluid rounded mb-2" />
    </a>
    <p class="text-secondary small">{{ $gallery->description }}</p>
  </div>
@endforeach

      </div>
      <div class="swiper-button-next swiper-button-next-{{ $albumId }}"></div>
      <div class="swiper-button-prev swiper-button-prev-{{ $albumId }}"></div>
    </div>
  </div>
@endforeach


    </div>
  </div>
</section>

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>
@endsection

@push('styles')
<!-- LightGallery CSS -->
<link href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css" rel="stylesheet">
@endpush

@push('scripts')
<!-- LightGallery JS -->
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/zoom/lg-zoom.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/fullscreen/lg-fullscreen.min.js"></script>

<script>
  @foreach ($galleries as $albumId => $items)
    new Swiper("#galeriSwiper-{{ $albumId }}", {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 20,
      navigation: {
        nextEl: ".swiper-button-next-{{ $albumId }}",
        prevEl: ".swiper-button-prev-{{ $albumId }}"
      },
    });

    // Inisialisasi lightGallery juga
    lightGallery(document.getElementById('lightgallery-{{ $albumId }}'), {
      selector: 'a',
      subHtmlSelectorRelative: true,
      plugins: [lgZoom, lgThumbnail, lgFullscreen],
      speed: 500,
      download: false
    });
  @endforeach
</script>
@endpush
