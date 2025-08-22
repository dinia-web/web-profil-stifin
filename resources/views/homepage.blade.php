@extends('layouts.website')

@section('title', 'Beranda')

@section('content')
  <!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

  @php
use App\Models\Gallery;

$galleries = Gallery::with('album')
    ->where('category_id', 3)
    ->where('status', 'published')
    ->where('is_featured', true)
    ->orderBy('album_id', 'asc')
    ->get();
@endphp

<ol>
  @foreach ($galleries as $key => $gallery)
    <li data-bs-target="#heroCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
  @endforeach
</ol>

<div class="carousel-inner">
  @foreach ($galleries as $key => $gallery)
    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background-image: url('{{ asset('storage/' . $gallery->image_path) }}')">
      <div class="container">
        <h2>{{ $gallery->title }}</h2>
        <p>{{ $gallery->description }}</p>
      </div>
    </div>
  @endforeach
</div>


    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section><!-- End Hero -->

     <!-- ======= whych choose stifin ======= -->
        @php
      use App\Models\Page;

      $whychPage = Page::where('slug', 'kenapa-memilih-stifin')
                      ->where('status', 'published')
                      ->first();
      @endphp

      @if ($whychPage)
      <section id="whych" class="whych">
        <div class="container" data-aos="fade-up">
          <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
              @if($whychPage->featured_image)
                <img src="{{ asset('storage/' . $whychPage->featured_image) }}" class="img-fluid" alt="{{ $whychPage->title }}">
              @else
                <img src="/themes/Medicio/assets/img/whych.png" class="img-fluid" alt="{{ $whychPage->title }}">
              @endif
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
              <h3>{{ $whychPage->title }}</h3>
              <p class="fst-italic">
                {!! $whychPage->content !!}
              </p>
              <a class="btn-get-started" href="{{ route('kontak') }}">Contact Us</a>
            </div>
          </div>
        </div>
      </section>
      @endif

<!--  whych choose stifin -->

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
          <div class="col-12 text-center mb-4">
            <h3>Keunggulan STIFIn</h3>
            <p>Apa yang menjadi ciri khas STIFIn?</p>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <h4 class="title"><a href="">SIMPLE</a></h4>
              <p class="description">Konsep STIFIn dibagi menjadi lima Unit Kecerdasan dan sembilan Personaliti Genetik. 
              FOKUS-SATU-HEBAT.</p>
              <a href="{{ route('pages.show', ['slug' => 'tentang-stifin']) }}" class="btn-get-started">Learn More</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <h4 class="title"><a href="">AKURAT</a></h4>
              <p class="description">Konsep STIFIn mengenali platform atau perangkat lunak pengendalian  pikiran manusia. 
                Tingkat keabsahan dan konsistensinya mencapai 95%.  Sekali penggunaan seumur hidup.</p>
              <a href="{{ route('pages.show', ['slug' => 'tentang-stifin']) }}" class="btn-get-started">Learn More</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <h4 class="title"><a href="">APLIKATIF</a></h4>
              <p class="description">Bersifat berkolerasi dengan berbagai aspek kehidupan atau MULTI-ANGLE-FIELD.</p>
              <a href="{{ route('pages.show', ['slug' => 'tentang-stifin']) }}" class="btn-get-started">Learn More</a>
            </div>
          </div>

         @php
            $banner = \App\Models\Gallery::where('category_id', 2)
                ->where('status', 'published')
                ->where('is_featured', true)
                ->orderBy('created_at', 'desc')
                ->first();
        @endphp

        @if ($banner)
            <div class="col-12 text-center mt-4" data-aos="fade-up" data-aos-delay="500">
                <img src="{{ asset('storage/' . $banner->image_path) }}"
                    alt="Banner"
                    class="img-fluid rounded banner-zoom">
  
            </div>
        @endif

        </div>
      </div>
    </section><!-- End Featured Services Section -->


    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
              <div class="video-wrapper">
                <iframe
                  src="https://www.youtube.com/embed/kFhF0ArcMQs"
                  title="Video STIFIn"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen
                ></iframe>
              </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Lebih Dekat dengan STIFIn</h3>
            <p>
             Selama lebih dari 13 tahun tes STIFIn telah dipakai ratusan ribu orang  dan telah memberikan manfaat yang luar biasa kepada mereka. Silakan
             simak video yang tersedia untuk mengetahui STIFIn lebih lanjut. 
            </p>
           <div class="btn-group-row">
              <!-- Baris atas: 3 tombol rata kiri -->
              <div class="btn-row">
                <a href="{{ route('pages.show', ['slug' => 'sensing']) }}" class="btn-get-started" style="background-color: #BD1919">Sensing  <i class="fas fa-arrow-right"></i></a>
                <a href="{{ route('pages.show', ['slug' => 'thinking']) }}" class="btn-get-started" style="background-color: #E6892B">Thinking <i class="fas fa-arrow-right"></i></a>
                <a href="{{ route('pages.show', ['slug' => 'intuiting']) }}" class="btn-get-started" style="background-color: #60BD19">Intuiting  <i class="fas fa-arrow-right"></i></a>
              </div>

              <!-- Baris bawah: 2 tombol di tengah -->
              <div class="btn-row">
                <a href="{{ route('pages.show', ['slug' => 'feeling']) }}" class="btn-get-started" style="background-color: #C9CF15">Feeling  <i class="fas fa-arrow-right"></i></a>
                <a href="{{ route('pages.show', ['slug' => 'insting']) }}" class="btn-get-started" style="background-color: #3D5977">Insting  <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->


    <!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">
    <div class="section-title text-center">
      <h3>Kesuksesan STIFIn</h3>

      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
          <h4 class="title"><a href="#">Total Cabang</a></h4>
          <p class="description"><span class="purecounter" data-purecounter-start="0" data-purecounter-end="184" data-purecounter-duration="2">0</span>+</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
          <h4 class="title"><a href="#">Total Tes</a></h4>
          <p class="description"><span class="purecounter" data-purecounter-start="0" data-purecounter-end="3868" data-purecounter-duration="2">0</span>+</p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
          <h4 class="title"><a href="#">Total Promotor</a></h4>
          <p class="description"><span class="purecounter" data-purecounter-start="0" data-purecounter-end="695004" data-purecounter-duration="2.5">0</span>+</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Cta Section -->

<section id="top-cabang" class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <!-- Tabel: Top Cabang 2025 -->
      <div class="col-md-5 mb-4">
        <h5 class="text-center fw-bold mb-3">Top Cabang 2025</h5>
        <table class="table table-bordered text-center">
          <thead style="background-color: #3F5771; color: white;">
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>1.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>2.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>3.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>4.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>5.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>6.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>7.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>8.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>9.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>10.</td><td>KOTA SLEMAN</td><td>745</td></tr>
          </tbody>
        </table>
      </div>

      <!-- Tabel: Top Cabang April 2025 -->
      <div class="col-md-5 mb-4">
        <h5 class="text-center fw-bold mb-3">Top Cabang April 2025</h5>
        <table class="table table-bordered text-center">
          <thead style="background-color: #3F5771; color: white;">
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>1.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>2.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>3.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>4.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>5.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>6.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>7.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>8.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>9.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>10.</td><td>KOTA SLEMAN</td><td>745</td></tr>
          </tbody>
        </table>
      </div>
       <div class="col-md-5 mb-4">
        <h5 class="text-center fw-bold mb-3">Top Ten Promotor 2025</h5>
        <table class="table table-bordered text-center">
          <thead style="background-color: #3F5771; color: white;">
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>1.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>2.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>3.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>4.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>5.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>6.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>7.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>8.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>9.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>10.</td><td>KOTA SLEMAN</td><td>745</td></tr>
          </tbody>
        </table>
      </div>

      <!-- Tabel: Top Cabang April 2025 -->
      <div class="col-md-5 mb-4">
        <h5 class="text-center fw-bold mb-3">Top Ten Promotor April 2025</h5>
        <table class="table table-bordered text-center">
          <thead style="background-color: #3F5771; color: white;">
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>1.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>2.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>3.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>4.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>5.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>6.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>7.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>8.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>9.</td><td>KOTA SLEMAN</td><td>745</td></tr>
            <tr><td>10.</td><td>KOTA SLEMAN</td><td>745</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<section id="testimonials" class="testimonials">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Apa Kata mereka?</h2>
    </div>

    <div class="row justify-content-center mb-4">
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="testimonial-video zoom-hover">
          <img src="/themes/Medicio/assets/img/testi.png" class="img-fluid" alt="Testimoni 1">
        </div>
      </div>
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="testimonial-video zoom-hover">
          <img src="/themes/Medicio/assets/img/testi.png" class="img-fluid" alt="Testimoni 2">
        </div>
      </div>
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="testimonial-video zoom-hover">
          <img src="/themes/Medicio/assets/img/testi.png" class="img-fluid" alt="Testimoni 3">
        </div>
      </div>
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="testimonial-video zoom-hover">
          <img src="/themes/Medicio/assets/img/testi.png" class="img-fluid" alt="Testimoni 4">
        </div>
      </div>
    </div>

    <div class="testimonials-slider-wrapper">
      <!-- Tombol panah kiri -->
      <div class="arrow-btn custom-prev"><i class="bx bx-chevron-left"></i></div>

      <!-- Swiper -->
      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                “STIFIn sangat membantu anak saya untuk mengenali bakatnya. Terima kasih tim STIFIn!”
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="/themes/Medicio/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Orang Tua</h4>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                “Awalnya ragu, tapi hasilnya luar biasa. Saya jadi tahu bagaimana cara mendidik anak dengan tepat.”
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="/themes/Medicio/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Ibu Rumah Tangga</h4>
            </div>
          </div>

          <!-- Tambahkan lagi jika perlu -->
        </div>
        <div class="swiper-pagination"></div>
      </div>

      <!-- Tombol panah kanan -->
      <div class="arrow-btn custom-next"><i class="bx bx-chevron-right"></i></div>
    </div>

  </div>
</section>
<!-- End Testimonials Section -->

     <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-center">
          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="fade-up" data-aos-delay="200">
              <h3>Personal / Couple</h3>
              <h4><sup>IDR</sup>649<sup>000</sup></h4>
              <p><span>biaya /orang</span></p>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="https://wa.me/6287848631234" target="_blank" class="btn-buy">Click Here</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="300">
              <h3>Family / Group</h3>
              <h4><sup>IDR</sup>599<sup>000</sup></h4>
              <p><span>biaya /orang</span></p>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="https://wa.me/6287848631234" target="_blank" class="btn-buy">Click Here</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="400">
              <span class="advanced">Advanced</span>
              <h3>Instansi</h3>
              <h4><sup>IDR</sup>549<sup>000</sup></h4>
              <p><span>biaya /orang</span></p>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="https://wa.me/6287848631234" class="btn-buy">Click Here</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

<!-- ======= artikels Section ======= -->
<section id="artikels" class="artikels section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Artikel</h2>
      <p>Pelajari STIFIn lebih dalam dengan membaca artikel berikut. InsyaAllah <br>pemahaman anda tentang STIFIn akan semakin baik.</p>
    </div>

    <div class="artikels-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
            @php
        use App\Models\Info;

        $infos = Info::where('kategori_id', 2)
            ->where('status', 'published')
            ->latest()
            ->get();
        @endphp


         @forelse($infos as $info)
      <div class="swiper-slide">
        <div class="artikel-card card p-3 h-100">
          @if($info->gambar)
            <img src="{{ asset('storage/' . $info->gambar) }}" class="card-img-top" alt="{{ $info->judul }}">
          @else
            <img src="/themes/Medicio/assets/img/stifin.jpg" class="card-img-top" alt="Artikel STIFIn">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $info->judul }}</h5>
            <p class="card-text">
              {{ Str::limit(strip_tags($info->isi), 80) }}
            </p>
            <a href="{{ route('public.show', $info->slug) }}" class="btn btn-primary btn-sm">Read More →</a>
          </div>
        </div>
      </div>
    @empty
      <div class="swiper-slide">
        <div class="artikel-card card p-3 h-100 text-center">
          <div class="card-body">
            <p class="card-text">Belum ada artikel.</p>
          </div>
        </div>
      </div>
    @endforelse
  </div>
  <div class="swiper-pagination"></div>
</div>
  </div>
</section>
  </main><!-- End #main -->
   <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection
