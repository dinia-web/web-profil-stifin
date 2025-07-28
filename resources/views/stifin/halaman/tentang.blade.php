@extends('layouts.website')

@section('title', 'Tentang STIFIn')

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">

     <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">Tentang STIFIn</h2>
     <ol class="breadcrumb mb-0 p-0">
      <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tentang STIFIn</li>
    </ol>
    </div>
  </div>
</section>
<!-- End Breadcrumb Section -->
<!-- ======= About Section ======= -->
<section class="about pt-4 pb-5">
  <div class="container">
    <h3 class="fw-bold mb-3">🧠 Tentang STIFIn</h3>
    <p>STIFIN adalah metode pemetaan kecerdasan dan kepribadian berbasis sidik jari, yang dikembangkan dari ilmu genetika dan neuroscience. Konsep ini menyederhanakan keragaman manusia menjadi lima mesin kecerdasan dominan: Sensing, Thinking, Intuiting, Feeling, dan Insting.
        Dengan hanya satu tes sidik jari yang dilakukan sekali seumur hidup, STIFIN mampu mengungkap cara berpikir, potensi alami, dan arah pengembangan diri seseorang secara lebih terarah dan konsisten.
        STIFIN telah digunakan dalam berbagai bidang seperti pendidikan, karier, parenting, bisnis, dan pengembangan diri, karena hasilnya yang akurasi tinggi, mudah dipahami, dan langsung aplikatif.</p>

    <h4 class="mt-4 fw-semibold">Mengapa Anda Perlu Tes STIFIn?</h4>
    <ul class="mt-3">
      <li>Pengalaman para orang dewasa mengatakan terlalu banyak ‘biaya kebodohan’ dengan terlalu banyak melakukan uji coba dalam hidup ini. Tes Stifin ini adalah panduan untuk menghilangkan biaya kebodohan tersebut, sehingga kita tidak buang umur dan buang uang. Sejak awal kita sudah tahu mesti pergi kemana dan bagaimana cara terbaiknya.</li>
      <li>Revolusi hidup yang paling baik bukan dengan mengacak-ngacak cara hidup anda, melainkan dengan mensyukuri apa ‘harta karun’ dalam diri kita yang diberikan oleh Tuhan. Setelah tes Stifin, anda akan tahu bagaimana caranya berilmu, bersyukur, dan bersabar melalui ‘harta karun’ diri anda.</li>
      <li>Setelah tes Stifin, anda akan menemukan cetak biru hidup anda. Hal tersebut bukanlah vonis atau ramalan keberhasilan tetapi jalur tempat anda mengikhtiarkan kucuran keringat demi keberhasilan di depan mata.</li>
      <li>Untuk menjadi outliers (sosok yang sangat jarang) seperti tulisannya Malcolm Gladwell, maka anda harus telah memulai profesinya lebih dini dan menanam 10 ribu jam untuk deliberate-practice membangun profesi pilihan. Tes Stifin membantu anak anda menemukan profesi pilihan sejak dini dan sekaligus mengarahkan bagaimana menikmati 10 ribu jam tersebut.</li>
      <li>Orang berbakat bisa gagal, jika ia mengingkari atau tidak tahu bakatnya. Salah asuhan terhadap bakat adalah ketidak-harmonisan dengan habitat anda. Jika yang ada diabaikan, dan yang tidak ada mau diadakan sama dengan memutar jarum jam hidup anda secara terbalik.</li>
    </ul>
  </div>
</section>
<!-- End About Section -->
     <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @endsection
