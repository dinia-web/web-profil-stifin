@extends('layouts.website')

@section('title', 'Insting')

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">Insting</h2>
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Insting</li>
      </ol>
    </div>
  </div>
</section>
<!-- End Breadcrumb Section -->

<!-- ======= Insting Content ======= -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h3 class="fw-bold">STIFIn: Insting (In)</h3>
      <p class="text-muted">Tipe kepribadian paling fleksibel dan adaptif dalam STIFIn — si penenang suasana, si penengah konflik, dan si pelayan sejati dari dalam hati.</p>
    </div>

    <!-- Insting Section -->
    <div class="mb-5">
      <h4 class="fw-semibold text-warning">🌿 Insting (In)</h4>
      <p>
        Insting (In) merupakan satu-satunya tipe Mesin Kecerdasan dalam STIFIn yang tidak memiliki arah introvert maupun extrovert. Ia adalah tipe tengah yang seimbang, tenang, dan sering kali menjadi perekat di antara kelompok. Tipe ini berpikir dan bertindak berdasarkan naluri alami — cepat, refleksif, dan penuh empati.
      </p>
      <p>
        In memiliki jiwa pengabdi yang kuat. Mereka peka terhadap kebutuhan orang lain dan memiliki dorongan alami untuk membantu, melayani, dan menciptakan suasana damai. Tidak heran jika In sering menjadi tempat curhat, penengah konflik, atau tokoh yang menyatukan kelompok tanpa harus mencolok.
      </p>
      <p>
        Secara fisik, tipe Insting biasanya memiliki postur datar atau persegi panjang, leher pendek, dan bahu sejajar. Mereka menyukai rutinitas yang stabil, tidak suka terburu-buru, dan cenderung diam tapi bekerja dengan efisien di belakang layar. Meski tampak kalem, In bisa sangat kuat dalam mempertahankan nilai dan prinsipnya.
      </p>
      <p>
        In juga memiliki kemampuan belajar secara deduktif. Mereka lebih mudah memahami sesuatu jika diberi gambaran besar dulu, lalu dipecah ke hal-hal detail. Dalam organisasi, mereka bukan pemimpin yang menonjol, tapi mitra paling setia dan andal.
      </p>
      <p>
        <strong>Potensi Karier:</strong> perawat, konselor, relawan sosial, fasilitator komunitas, customer service, guru pendidikan anak, terapis, mediator, manajer HRD, hingga pendamping lansia. In cocok di bidang yang menuntut kesabaran, pelayanan, dan empati tinggi.
      </p>
    </div>
  </div>
</section>
<!-- End Insting Content -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>
@endsection
