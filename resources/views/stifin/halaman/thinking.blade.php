@extends('layouts.website')

@section('title', 'Thinking')

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">Thinking</h2>
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thinking</li>
      </ol>
    </div>
  </div>
</section>
<!-- End Breadcrumb Section -->

<!-- ======= Thinking Content ======= -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h3 class="fw-bold">STIFIn: Thinking Introvert (Ti) & Thinking Extrovert (Te)</h3>
      <p class="text-muted">Kenali karakteristik dan potensi unik dari dua tipe Mesin Kecerdasan Thinking — mereka yang mengandalkan logika, sistematika, dan kecermatan berpikir.</p>
    </div>

    <!-- Ti Section -->
    <div class="mb-5">
      <h4 class="fw-semibold text-primary">🧠 Thinking Introvert (Ti)</h4>
      <p>
        Thinking Introvert (Ti) adalah pribadi yang berpikir logis secara mendalam dan independen. Mereka menyukai struktur, sistem, dan memiliki kemampuan luar biasa dalam menganalisis secara detail. Kekuatan utama Ti terletak pada konsistensi, efisiensi, dan kemampuannya menciptakan sistem teknis yang presisi.
      </p>
      <p>
        Mereka cenderung hemat energi, fokus pada keefektifan, dan tidak suka membuang waktu untuk hal yang dianggap tidak produktif. Ti juga sangat mandiri dan tidak mudah terpengaruh oleh lingkungan sekitar, menjadikan mereka pribadi yang teguh dan dapat diandalkan dalam bidang yang memerlukan ketelitian.
      </p>
      <p>
        Dalam tim, Ti lebih suka bekerja di belakang layar sebagai spesialis, perfeksionis, dan pembuat sistem. Mereka cocok berada di ruang yang tenang dengan tugas yang jelas dan sistematis.
      </p>
      <p>
        <strong>Potensi Karier:</strong> insinyur, programmer, teknokrat, dokter, analis sistem, peneliti, dosen, auditor, dan profesi lain yang membutuhkan ketepatan teknis dan logika kuat.
      </p>
    </div>

    <!-- Te Section -->
    <div class="mb-5">
      <h4 class="fw-semibold text-success">📊 Thinking Extrovert (Te)</h4>
      <p>
        Thinking Extrovert (Te) memiliki kekuatan dalam berpikir strategis dan manajerial. Mereka cepat dalam mengambil keputusan, menyusun rencana besar, serta mengatur sistem organisasi. Berbeda dengan Ti, Te lebih ekspresif dan aktif dalam mengatur serta memimpin orang lain.
      </p>
      <p>
        Mereka cenderung dominan, visioner, dan suka mengambil kendali atas proses atau proyek besar. Te memiliki kemampuan luar biasa dalam melihat gambaran besar dan mengeksekusinya secara efisien. Mereka juga haus tantangan dan suka berada di posisi pengambil keputusan.
      </p>
      <p>
        Dalam lingkungan kerja, Te biasanya berperan sebagai pemimpin yang mampu mendorong tim menuju target dengan sistem yang jelas dan logis. Mereka cocok di dunia manajerial dan perencanaan strategis.
      </p>
      <p>
        <strong>Potensi Karier:</strong> manajer, birokrat, pelatih, konsultan, pengusaha, developer sistem, dan profesi lain yang membutuhkan kemampuan kepemimpinan dan pengambilan keputusan.
      </p>
    </div>
  </div>
</section>
<!-- End Thinking Content -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>
@endsection
