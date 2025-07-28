@extends('layouts.website')

@section('title', 'Sensing')

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">Sensing</h2>
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sensing</li>
      </ol>
    </div>
  </div>
</section>
<!-- End Breadcrumb Section -->

<!-- ======= Sensing Content ======= -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h3 class="fw-bold">STIFIn: Sensing Introvert (Si) & Sensing Extrovert (Se)</h3>
      <p class="text-muted">Kenali karakteristik dan kekuatan praktis dari dua tipe Mesin Kecerdasan Sensing — mereka yang andal dalam ketelitian, kecepatan aksi, dan pengelolaan realitas sehari-hari.</p>
    </div>

    <!-- Si Section -->
    <div class="mb-5">
      <h4 class="fw-semibold text-primary">🔍 Sensing Introvert (Si)</h4>
      <p>
        Sensing Introvert (Si) adalah pribadi yang sangat teliti, rapi, dan andal dalam menyelesaikan tugas. Mereka unggul dalam menyimpan dan mengingat informasi detail, serta sangat berhati-hati dalam bertindak. Si menyukai keteraturan, rutinitas, dan cenderung menjaga kualitas dengan konsistensi tinggi.
      </p>
      <p>
        Si bekerja dengan pendekatan sistematis dan terstruktur. Mereka sangat bertanggung jawab, suka menyelesaikan tugas secara lengkap dan akurat. Dalam tim, Si sering jadi penjaga kualitas dan SOP — tidak suka hal yang sembrono atau asal-asalan. Mereka mungkin terkesan pendiam, tapi hasil kerjanya sangat solid.
      </p>
      <p>
        Dalam kehidupan sehari-hari, Si sangat perhatian terhadap detail dan punya ingatan kuat terhadap pengalaman masa lalu. Mereka sangat cocok untuk pekerjaan yang menuntut presisi, konsistensi, dan dokumentasi yang rapi.
      </p>
      <p>
        <strong>Potensi Karier:</strong> akuntan, arsiparis, quality control, petugas administrasi, analis data, operator mesin, staf keuangan, atau pekerja di bidang yang menuntut prosedur dan akurasi tinggi.
      </p>
    </div>

    <!-- Se Section -->
    <div class="mb-5">
      <h4 class="fw-semibold text-success">⚡ Sensing Extrovert (Se)</h4>
      <p>
        Sensing Extrovert (Se) adalah tipe yang cepat tanggap, aktif bergerak, dan sangat terhubung dengan lingkungan sekitar. Mereka responsif terhadap situasi nyata dan sangat gesit dalam menghadapi perubahan. Se sangat cocok di lapangan — tempat di mana kecepatan dan aksi langsung dibutuhkan.
      </p>
      <p>
        Se menyukai pengalaman nyata, aktif secara fisik, dan tak suka terlalu banyak teori. Mereka belajar lewat praktik dan sering kali menjadi eksekutor cepat dalam tim. Dalam lingkungan kerja, Se sering jadi andalan dalam menyelesaikan pekerjaan yang mendesak atau butuh aksi langsung.
      </p>
      <p>
        Dengan gaya yang energik, spontan, dan dinamis, Se mampu menjadi penggerak di lingkungan sosial atau pekerjaan. Mereka sangat cocok untuk situasi yang menuntut adaptasi tinggi, kecepatan, dan ketahanan fisik.
      </p>
      <p>
        <strong>Potensi Karier:</strong> sales lapangan, event organizer, atlet, teknisi, petugas lapangan, supir operasional, pengawas proyek, atau pekerjaan yang berbasis aksi dan interaksi langsung dengan lingkungan.
      </p>
    </div>
  </div>
</section>
<!-- End Sensing Content -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>
@endsection
