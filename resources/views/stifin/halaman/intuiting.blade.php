@extends('layouts.website')

@section('title', 'Intuiting')

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">Intuiting</h2>
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Intuiting</li>
      </ol>
    </div>
  </div>
</section>
<!-- End Breadcrumb Section -->

<!-- ======= Intuiting Content ======= -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h3 class="fw-bold">STIFIn: Intuiting Introvert (Ii) & Intuiting Extrovert (Ie)</h3>
      <p class="text-muted">Kenali karakteristik dan potensi unik dari dua tipe Mesin Kecerdasan Intuiting — mereka yang hidup dalam ide, inovasi, dan imajinasi tanpa batas.</p>
    </div>

    <!-- Ii Section -->
    <div class="mb-5">
      <h4 class="fw-semibold text-primary">🔮 Intuiting Introvert (Ii)</h4>
      <p>
        Intuiting Introvert (Ii) adalah tipe kepribadian yang mengandalkan kekuatan imajinasi dan intuisi yang sangat tajam. Mereka mampu melihat pola tersembunyi, memahami konsep abstrak, dan sering kali memiliki ide-ide kreatif yang orisinal. Dunia internal seorang Ii begitu kaya — mereka bisa merenung, berfantasi, dan mengeksplorasi pemikiran kompleks yang tak kasat mata.
      </p>
      <p>
        Ii memiliki gaya kerja yang independen. Mereka cenderung tidak menyukai distraksi dari luar dan lebih nyaman berkarya di ruang sunyi. Namun dari kesunyian itu, lahirlah gagasan-gagasan besar yang kadang mendahului zamannya. Mereka berpikir dalam jangka panjang, memetakan masa depan, dan sering kali menjadi sumber ide strategis dalam tim.
      </p>
      <p>
        Dalam lingkungan sosial, Ii mungkin tampak pendiam atau sulit ditebak. Namun begitu diberi ruang untuk mengekspresikan idenya, mereka bisa menjadi pengubah permainan. Mereka perfeksionis dalam berkarya, sensitif terhadap makna mendalam, dan tidak suka hal-hal yang bersifat dangkal atau sekadar mengikuti arus.
      </p>
      <p>
        <strong>Potensi Karier:</strong> penulis fiksi atau filosofi, arsitek, konseptor branding, inovator produk, peneliti pemikiran, pembuat skenario film, hingga desainer sistem. Ii cocok di bidang yang menuntut ketenangan, imajinasi, dan pemikiran mendalam.
      </p>
    </div>

    <!-- Ie Section -->
    <div class="mb-5">
      <h4 class="fw-semibold text-success">💡 Intuiting Extrovert (Ie)</h4>
      <p>
        Intuiting Extrovert (Ie) adalah pribadi yang penuh energi kreatif dan sangat adaptif terhadap lingkungan sekitar. Berbeda dengan Ii yang berproses dari dalam, Ie mendapatkan inspirasinya dari interaksi dan pengamatan luar. Mereka cepat menangkap peluang, jeli membaca tren, dan jago menyulap ide jadi produk nyata yang disukai banyak orang.
      </p>
      <p>
        Ie sangat visioner, selalu berpikir besar, dan berani mengambil risiko. Mereka senang menghubungkan hal-hal yang tampaknya tak berkaitan menjadi solusi inovatif. Dalam tim, mereka biasanya menjadi pemimpin kreatif yang mendorong perubahan dan terobosan baru. Mereka tak hanya berimajinasi, tapi juga berani mengeksekusi.
      </p>
      <p>
        Dengan kemampuan komunikasi yang kuat dan semangat eksplorasi yang tinggi, Ie sangat cocok berada di garis depan inovasi. Mereka senang berada di tengah keramaian, menyerap inspirasi dari berbagai arah, lalu menyaringnya menjadi ide yang bernilai dan berdampak.
      </p>
      <p>
        <strong>Potensi Karier:</strong> entrepreneur, CEO startup kreatif, produser film, manajer proyek inovatif, kreator konten, pembicara publik, perancang strategi pemasaran, atau inovator sosial. Ie cocok di dunia yang cepat, penuh ide, dan menuntut keberanian eksekusi.
      </p>
    </div>
  </div>
</section>
<!-- End Intuiting Content -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>
@endsection
