@extends('layouts.website')

@section('title', 'Kontak')

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">Kontak</h2>
     <ol class="breadcrumb mb-0 p-0">
      <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Kontak</li>
    </ol>
    </div>

  </div>
</section>
<!-- End Breadcrumb Section -->
<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Alamat</h3>
                  <p>Gedung Souvereign Plaza Jl TB Simatupang Kav 36 Jakarta Selatan</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email</h3>
                  <p>info@example.com<br>contact@example.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Hubungi Kami</h3>
                  <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
           <form id="formKontak" action="{{ route('kontak.kirim') }}" method="POST" role="form" class="php-email-form">
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" placeholder="Nama Anda" value="{{ old('name') }}" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" placeholder="Email Anda" value="{{ old('email') }}" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" placeholder="Subjek (Opsional)" value="{{ old('subject') }}">
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="phone" placeholder="Nomor Telepon (Opsional)" value="{{ old('phone') }}">
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="7" placeholder="Pesan Anda" required>{{ old('message') }}</textarea>
            </div>

            {{-- Feedback sukses --}}
            @if(session('success'))
              <div class="alert alert-success mt-3">
                {{ session('success') }}
              </div>
            @endif

            {{-- Error message --}}
            @if ($errors->any())
              <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="my-3">
              <div class="loading" style="display: none;">Loading</div>
              <div class="error-message" style="display: none; color: red;"></div>
              <div class="sent-message" style="display: none; color: green;">Pesan Anda berhasil dikirim. Terima kasih!</div>
            </div>
            <div class="text-center mt-3"><button type="submit">Kirim Pesan</button></div>
          </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
     <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @endsection
