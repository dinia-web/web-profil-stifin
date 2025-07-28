@extends('layouts.website')

@section('title', 'Sensing')

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">Sensing</h2>
      <ol class="breadcrumb mt-2">
        <li><a href="{{ route('website') }}">Home</a></li>
        <li><a class="active" href="{{ route('sensing') }}">Sensing</a></li>
      </ol>
    </div>
  </div>
</section>
<!-- End Breadcrumb Section -->

<section class="inner-page">
  <div class="container py-2">
    <div class="section-title text-center mb-4">
      <h3 class="fw-bold">STIFIn: Sensing Introvert (Si) & Sensing Extrovert (Se)</h3>
      <p>Kenali karakteristik dan potensi unik dari dua tipe Mesin Kecerdasan Sensing</p>
    </div>

    <!-- Sensing Introvert -->
    <div class="mb-5">
      <h4 class="fw-bold">🔍 Sensing Introvert (Si)</h4>
      <ul>
        <li><strong>Sistem Operasi:</strong> Otak bagian <em>limbik kiri putih</em>, proses dari dalam ke luar.</li>
        <li><strong>Tipologi Fisik:</strong> Atletis besar, motorik kasar, otot kuat dan bertenaga.</li>
        <li><strong>Ciri Khas:</strong> Persistent, discipline, recorder, detailed, careful, encyclopedic, workaholic, dll.</li>
        <li><strong>Gaya Belajar:</strong> Mengandalkan pengulangan, alat peraga, belajar sambil bergerak & sparring nyata.</li>
        <li><strong>Kelebihan:</strong> Ingatan tajam (MQ), efisien dan hemat dalam kerja maupun kehidupan.</li>
        <li><strong>Bidang Cocok:</strong> Keuangan, Bahasa, Transportasi, Perdagangan, Hiburan.</li>
        <li><strong>Profesi Rekomendasi:</strong> Ekonom, tentara, bankir, presenter, penyanyi, petani, sekretaris, dll.</li>
      </ul>
    </div>

    <!-- Sensing Extrovert -->
    <div class="mb-5">
      <h4 class="fw-bold">🔍 Sensing Extrovert (Se)</h4>
      <ul>
        <li><strong>Sistem Operasi:</strong> Otak bagian <em>limbik kiri abu-abu</em>, proses dari luar ke dalam.</li>
        <li><strong>Tipologi Fisik:</strong> Atletis mungil, motorik halus, fleksibilitas fisik tinggi.</li>
        <li><strong>Ciri Khas:</strong> Persistent, playful, adventurous, demonstrative, generous, repetitious, dll.</li>
        <li><strong>Gaya Belajar:</strong> Visualisasi kuat, latihan langsung, tanda penting, perlu insentif nyata.</li>
        <li><strong>Kelebihan:</strong> Kekuatan otot, fleksibel, tangguh secara fisik (PQ).</li>
        <li><strong>Bidang Cocok:</strong> Ekonomi, Sport, Kemiliteran, Perhotelan, Sejarah.</li>
        <li><strong>Profesi Rekomendasi:</strong> Artis, model, jurnalis, security, dokter, pramugari, pekerja lapangan, dll.</li>
      </ul>
    </div>

    <div class="text-center">
      <p class="fst-italic">"STIFIn membantu kita mengenali potensi otak untuk memilih jalur belajar, bekerja, dan hidup yang lebih selaras."</p>
    </div>
  </div>
</section>

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>
@endsection
