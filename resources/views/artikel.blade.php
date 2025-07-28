@extends('layouts.website')

@section('title', 'Artikel')

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

      <!-- Artikel 1 -->
      <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
         <div class="artikel-card card  p-3 h-100">
            <img src="/themes/Medicio/assets/img/stifin.jpg" class="card-img-top" alt="Artikel STIFIn">
            <div class="card-body">
              <h5 class="card-title">Konsep STIFIn</h5>
              <p class="card-text">Apa itu stifin? Stifin adalah ..... </p>
              <a href="{{ route('readmore') }}" class="btn btn-primary btn-sm">Read More →</a>
            </div>
          </div>
      </div>

      <!-- Artikel 2 -->
      <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
        <div class="artikel-card card  p-3 h-100">
            <img src="/themes/Medicio/assets/img/stifin.jpg" class="card-img-top" alt="Artikel STIFIn">
            <div class="card-body">
              <h5 class="card-title">Konsep STIFIn</h5>
              <p class="card-text">Apa itu stifin? Stifin adalah ..... </p>
              <a href="{{ route('readmore') }}" class="btn btn-primary btn-sm">Read More →</a>
            </div>
          </div>
      </div>

      <!-- Artikel 3 -->
      <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
        <div class="artikel-card card  p-3 h-100">
            <img src="/themes/Medicio/assets/img/stifin.jpg" class="card-img-top" alt="Artikel STIFIn">
            <div class="card-body">
              <h5 class="card-title">Konsep STIFIn</h5>
              <p class="card-text">Apa itu stifin? Stifin adalah ..... </p>
              <a href="{{ route('readmore') }}" class="btn btn-primary btn-sm">Read More →</a>
            </div>
          </div>
      </div>

    </div>

  </div>
</section>

<div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection