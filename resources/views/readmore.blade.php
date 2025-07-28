@extends('layouts.website')

@section('title', 'Apa itu STIFIn?')

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">Apa itu STIFIn?</h2>
     <ol class="breadcrumb mb-0 p-0">
      <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Apa itu STIFIn?</li>
    </ol>
    </div>

  </div>
</section>
<!-- End Breadcrumb Section -->

<section class="inner-page">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <article>
          <p>
            STIFIn adalah singkatan dari <strong>Sensing, Thinking, Intuiting, Feeling, Insting</strong>. STIFIn merupakan konsep pemetaan kepribadian berbasis <em>Mesin Kecerdasan</em> yang ditemukan oleh Farid Poniman. 
          </p>
          <p>
            Berbeda dengan tes kepribadian biasa, STIFIn hanya menggunakan satu jari tangan (sidik jari) untuk mengidentifikasi jenis dominan kecerdasan seseorang. Tes ini mengacu pada otak manusia dan sistem kerja dominan di dalamnya.
          </p>
          <p>
            Dalam konsep STIFIn, setiap orang hanya memiliki satu mesin kecerdasan yang dominan, yaitu:
          </p>
          <ul>
            <li><strong>S</strong> - Sensing</li>
            <li><strong>T</strong> - Thinking</li>
            <li><strong>I</strong> - Intuiting</li>
            <li><strong>F</strong> - Feeling</li>
            <li><strong>In</strong> - Insting</li>
          </ul>
          <p>
            Setiap mesin kecerdasan memiliki karakteristik unik yang bisa digunakan untuk mengenali potensi, gaya belajar, cara kerja, hingga pilihan karier yang cocok.
          </p>
          <p>
            STIFIn bertujuan untuk membantu seseorang mengenal dirinya lebih dalam agar dapat hidup selaras dengan fitrah kecerdasannya. Konsep ini telah banyak digunakan dalam dunia pendidikan, parenting, organisasi, dan pengembangan diri.
          </p>
          <p>
            Tes STIFIn hanya dilakukan sekali seumur hidup karena hasilnya tidak akan berubah. Hasil tes berupa laporan singkat yang menjelaskan tipe kepribadianmu dan saran untuk pengembangan diri berdasarkan hasil tersebut.
          </p>
        </article>
      </div>
    </div>
  </div>
</section>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @endsection