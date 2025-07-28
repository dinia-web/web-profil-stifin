@extends('layouts.website')

@section('title', 'Feeling')

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">Feeling</h2>
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Feeling</li>
      </ol>
    </div>
  </div>
</section>
<!-- End Breadcrumb Section -->

<!-- ======= Feeling Content ======= -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h3 class="fw-bold">STIFIn: Feeling Introvert (Fi) & Feeling Extrovert (Fe)</h3>
      <p class="text-muted">Kenali karakteristik dan kekuatan dari tipe kepribadian Feeling — mereka yang hidup melalui rasa, empati, dan kedalaman emosi.</p>
    </div>

    <!-- Fi Section -->
    <div class="mb-5">
      <h4 class="fw-semibold text-danger">❤️ Feeling Introvert (Fi)</h4>
      <p>
        Feeling Introvert (Fi) adalah pribadi yang digerakkan oleh kekuatan perasaan dan nilai-nilai pribadi yang dalam. Mereka sangat peka terhadap emosi, tidak hanya milik orang lain, tapi juga terhadap apa yang mereka rasakan sendiri. Dunia batin Fi sangat kaya akan empati, cinta kasih, dan dorongan untuk memperbaiki sesuatu secara emosional.
      </p>
      <p>
        Fi biasanya memiliki karakter yang karismatik, idealis, dan memiliki visi kemanusiaan yang kuat. Mereka cenderung lebih suka bekerja sendiri atau dalam kelompok kecil yang saling memahami. Meski tampak tenang dan tertutup, Fi bisa sangat tegas ketika nilai-nilai pribadinya terusik. Mereka setia, berkomitmen, dan sulit berpaling dari hal yang mereka yakini.
      </p>
      <p>
        Dalam lingkungan sosial, Fi sangat peduli, tapi tidak selalu mengekspresikannya secara terbuka. Mereka lebih menunjukkan cinta lewat tindakan nyata daripada kata-kata. Jiwa mereka hangat, dan mereka adalah tempat nyaman untuk curhat atau mencari pengertian yang tulus.
      </p>
      <p>
        <strong>Potensi Karier:</strong> konselor, pekerja sosial, penulis, guru inspiratif, aktivis kemanusiaan, pembimbing rohani, pemimpin idealis, atau profesional HR yang humanis.
      </p>
    </div>

    <!-- Fe Section -->
    <div class="mb-5">
      <h4 class="fw-semibold text-warning">💬 Feeling Extrovert (Fe)</h4>
      <p>
        Feeling Extrovert (Fe) adalah sosok yang ekspresif, komunikatif, dan sangat peka terhadap dinamika sosial. Mereka ahli dalam membangun hubungan, memahami suasana hati orang lain, dan menciptakan lingkungan yang nyaman serta penuh kehangatan. Fe dikenal sebagai penghubung antar manusia, pembawa damai, dan penyemangat dalam tim.
      </p>
      <p>
        Fe mendapatkan energi dari interaksi dan rasa keterhubungan dengan banyak orang. Mereka mudah beradaptasi dalam berbagai lingkungan sosial, cenderung populer, dan disukai karena sikapnya yang ramah dan suportif. Empati mereka bersifat eksternal — mereka bisa langsung membaca perasaan orang lain dan tahu cara menyikapinya.
      </p>
      <p>
        Dalam kerja tim, Fe biasanya menjadi jembatan komunikasi, penyatu visi, dan pemotivasi alami. Mereka bekerja dengan sepenuh hati dan merasa puas ketika bisa membantu orang lain berkembang. Semangat mereka menular dan memberi energi pada lingkungan sekitarnya.
      </p>
      <p>
        <strong>Potensi Karier:</strong> public relations, MC atau host, dosen komunikasi, trainer SDM, influencer, diplomat, fasilitator komunitas, atau pemimpin organisasi berbasis relasi.
      </p>
    </div>
  </div>
</section>
<!-- End Feeling Content -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>
@endsection
