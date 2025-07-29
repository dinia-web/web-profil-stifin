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

    {{-- Galeri 1 --}}
<div class="col-md-6 mb-4">
  <h5 class="text-center fw-bold">Galeri Akademi Entrepreneur<br>Batch 2</h5>
  <div class="swiper galeriSwiper1" id="lightgallery1">
    <div class="swiper-wrapper">
      @foreach($galleries as $item)
        <div class="swiper-slide">
          <a href="{{ asset('storage/' . $item->image_path) }}"
             data-sub-html="<h4>{{ $item->title }}</h4><p>{{ $item->description }}</p>">
            <img src="{{ asset('storage/' . $item->image_path) }}" class="img-fluid rounded" />
          </a>
        </div>
      @endforeach
    </div>
    <div class="swiper-button-next swiper-button-next-1"></div>
    <div class="swiper-button-prev swiper-button-prev-1"></div>
  </div>
  <p class="text-center text-secondary mt-2">Kampoong Hening Cidahu, Sukabumi</p>
</div>


      {{-- Galeri 2 --}}
      <div class="col-md-6 mb-4">
        <h5 class="text-center fw-bold">Galeri Akademi Entrepreneur<br>Batch 3</h5>
        <div class="swiper galeriSwiper2" id="lightgallery2">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <a href="/themes/Medicio/assets/img/gallery/gallery-3.jpg"
                 data-sub-html="<h4>Batch 3</h4><p>Dokumentasi 1</p>">
                <img src="/themes/Medicio/assets/img/gallery/gallery-3.jpg" class="img-fluid rounded" />
              </a>
            </div>
            <div class="swiper-slide">
              <a href="/themes/Medicio/assets/img/gallery/gallery-4.jpg"
                 data-sub-html="<h4>Batch 3</h4><p>Dokumentasi 2</p>">
                <img src="/themes/Medicio/assets/img/gallery/gallery-4.jpg" class="img-fluid rounded" />
              </a>
            </div>
          </div>
          <div class="swiper-button-next swiper-button-next-2"></div>
          <div class="swiper-button-prev swiper-button-prev-2"></div>
        </div>
        <p class="text-center text-secondary mt-2">Kampoong Hening Cidahu, Sukabumi</p>
      </div>

      {{-- Galeri 3 --}}
      <div class="col-md-6 mb-4">
        <h5 class="text-center fw-bold">Galeri Akademi Entrepreneur<br>Batch 4</h5>
        <div class="swiper galeriSwiper1" id="lightgallery3">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <a href="/themes/Medicio/assets/img/gallery/gallery-5.jpg"
                 data-sub-html="<h4>Batch 4</h4><p>Dokumentasi 1</p>">
                <img src="/themes/Medicio/assets/img/gallery/gallery-5.jpg" class="img-fluid rounded" />
              </a>
            </div>
            <div class="swiper-slide">
              <a href="/themes/Medicio/assets/img/gallery/gallery-6.jpg"
                 data-sub-html="<h4>Batch 4</h4><p>Dokumentasi 2</p>">
                <img src="/themes/Medicio/assets/img/gallery/gallery-6.jpg" class="img-fluid rounded" />
              </a>
            </div>
          </div>
          <div class="swiper-button-next swiper-button-next-1"></div>
          <div class="swiper-button-prev swiper-button-prev-1"></div>
        </div>
        <p class="text-center text-secondary mt-2">Kampoong Hening Cidahu, Sukabumi</p>
      </div>

      {{-- Galeri 4 --}}
      <div class="col-md-6 mb-4">
        <h5 class="text-center fw-bold">Galeri Akademi Entrepreneur<br>Batch 5</h5>
        <div class="swiper galeriSwiper2" id="lightgallery4">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <a href="/themes/Medicio/assets/img/gallery/gallery-7.jpg"
                 data-sub-html="<h4>Batch 5</h4><p>Dokumentasi 1</p>">
                <img src="/themes/Medicio/assets/img/gallery/gallery-7.jpg" class="img-fluid rounded" />
              </a>
            </div>
            <div class="swiper-slide">
              <a href="/themes/Medicio/assets/img/gallery/gallery-8.jpg"
                 data-sub-html="<h4>Batch 5</h4><p>Dokumentasi 2</p>">
                <img src="/themes/Medicio/assets/img/gallery/gallery-8.jpg" class="img-fluid rounded" />
              </a>
            </div>
          </div>
          <div class="swiper-button-next swiper-button-next-2"></div>
          <div class="swiper-button-prev swiper-button-prev-2"></div>
        </div>
        <p class="text-center text-secondary mt-2">Kampoong Hening Cidahu, Sukabumi</p>
      </div>

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
  lightGallery(document.getElementById('lightgallery1'), {
    selector: 'a',
    subHtmlSelectorRelative: true,
    plugins: [lgZoom, lgThumbnail, lgFullscreen],
    speed: 500,
    download: false
  });
  lightGallery(document.getElementById('lightgallery2'), {
    selector: 'a',
    subHtmlSelectorRelative: true,
    plugins: [lgZoom, lgThumbnail, lgFullscreen],
    speed: 500,
    download: false
  });
  lightGallery(document.getElementById('lightgallery3'), {
    selector: 'a',
    subHtmlSelectorRelative: true,
    plugins: [lgZoom, lgThumbnail, lgFullscreen],
    speed: 500,
    download: false
  });
  lightGallery(document.getElementById('lightgallery4'), {
    selector: 'a',
    subHtmlSelectorRelative: true,
    plugins: [lgZoom, lgThumbnail, lgFullscreen],
    speed: 500,
    download: false
  });
</script>
@endpush
