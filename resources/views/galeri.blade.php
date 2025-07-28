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

        <div class="swiper galeriSwiper1">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="/themes/Medicio/assets/img/gallery/gallery-1.jpg" class="img-fluid rounded" />
            </div>
            <div class="swiper-slide">
              <img src="/themes/Medicio/assets/img/gallery/gallery-2.jpg" class="img-fluid rounded" />
            </div>
          </div>
          <div class="swiper-button-next swiper-button-next-1"></div>
          <div class="swiper-button-prev swiper-button-prev-1"></div>
        </div>

        <p class="text-center text-secondary mt-2">Kampoong Hening Cidahu, Sukabumi</p>
      </div>

      {{-- Galeri 2 --}}
      <div class="col-md-6 mb-4">
        <h5 class="text-center fw-bold">Galeri Akademi Entrepreneur<br>Batch 3</h5>

        <div class="swiper galeriSwiper2">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="/themes/Medicio/assets/img/gallery/gallery-3.jpg" class="img-fluid rounded" />
            </div>
            <div class="swiper-slide">
              <img src="/themes/Medicio/assets/img/gallery/gallery-4.jpg" class="img-fluid rounded" />
            </div>
          </div>
          <div class="swiper-button-next swiper-button-next-2"></div>
          <div class="swiper-button-prev swiper-button-prev-2"></div>
        </div>

        <p class="text-center text-secondary mt-2">Kampoong Hening Cidahu, Sukabumi</p>
      </div>

      {{-- Galeri 1 --}}
      <div class="col-md-6 mb-4">
        <h5 class="text-center fw-bold">Galeri Akademi Entrepreneur<br>Batch 4</h5>

        <div class="swiper galeriSwiper1">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="/themes/Medicio/assets/img/gallery/gallery-5.jpg" class="img-fluid rounded" />
            </div>
            <div class="swiper-slide">
              <img src="/themes/Medicio/assets/img/gallery/gallery-6.jpg" class="img-fluid rounded" />
            </div>
          </div>
          <div class="swiper-button-next swiper-button-next-1"></div>
          <div class="swiper-button-prev swiper-button-prev-1"></div>
        </div>

        <p class="text-center text-secondary mt-2">Kampoong Hening Cidahu, Sukabumi</p>
      </div>

      {{-- Galeri 2 --}}
      <div class="col-md-6 mb-4">
        <h5 class="text-center fw-bold">Galeri Akademi Entrepreneur<br>Batch 5</h5>

        <div class="swiper galeriSwiper2">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="/themes/Medicio/assets/img/gallery/gallery-7.jpg" class="img-fluid rounded" />
            </div>
            <div class="swiper-slide">
              <img src="/themes/Medicio/assets/img/gallery/gallery-8.jpg" class="img-fluid rounded" />
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
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection