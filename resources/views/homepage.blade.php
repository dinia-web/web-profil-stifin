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
              <p>
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

      <!-- Dinamis dari tabel infos kategori 5 -->
      @php
          $keunggulan = \App\Models\Info::where('kategori_id', 5)
              ->where('status', 'published')
              ->latest()
              ->get();
      @endphp

      @foreach($keunggulan as $item)
      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 + 100 }}">
          <h4 class="title"><a href="">{{ $item->judul }}</a></h4>
          <div class="description">{!! $item->isi !!}</div>
          <a href="{{ route('pages.show', ['slug' => 'tentang-stifin']) }}" class="btn-get-started">Learn More</a>
        </div>
      </div>
      @endforeach

      <!-- Banner featured -->
      @php
          $banner = \App\Models\Gallery::where('category_id', 2)
              ->where('status', 'published')
              ->where('is_featured', true)
              ->orderBy('created_at', 'desc')
              ->first();
      @endphp

      @if ($banner)
          <div class="col-12 text-center mt-4" data-aos="fade-up" data-aos-delay="500">
              <img src="{{ asset('storage/' . $banner->image_path) }}" alt="Banner" class="img-fluid rounded banner-zoom">
          </div>
      @endif

    </div>
  </div>
</section><!-- End Featured Services Section -->


    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        @php
          // Ambil semua konten About
          $infos = \App\Models\Info::where('kategori_id', 4)
              ->where('status', 'published')
              ->latest()
              ->get();

          // Siapkan array media untuk carousel
          $mediaItems = [];
          foreach($infos as $info) {
              // Video lokal
              if($info->video) {
                  $mediaItems[] = [
                      'type' => 'video',
                      'src' => asset('storage/'.$info->video),
                  ];
              }
              // YouTube (bisa banyak)
              $youtubeUrls = json_decode($info->youtube_url, true) ?? [];
              foreach($youtubeUrls as $url) {
                  $videoId = null;
                  if(str_contains($url,'youtu.be')){
                      $videoId = basename(parse_url($url, PHP_URL_PATH));
                  } elseif(str_contains($url,'watch?v=')){
                      $videoId = \Illuminate\Support\Str::after($url,'v=');
                  }
                  if($videoId){
                      $mediaItems[] = [
                          'type' => 'youtube',
                          'src' => $videoId,
                      ];
                  }
              }
              // Gambar
              if($info->gambar){
                  $mediaItems[] = [
                      'type' => 'image',
                      'src' => asset('storage/'.$info->gambar),
                  ];
              }
          }
        @endphp

        @if(count($mediaItems))
        <div class="row">
          <!-- Kolom Media (Carousel) -->
          <div class="col-lg-6" data-aos="fade-right">
            <div id="aboutCarousel" class="carousel slide">
              <div class="carousel-inner">
                @foreach($mediaItems as $k => $item)
                  <div class="carousel-item {{ $k == 0 ? 'active' : '' }}">
                    @if($item['type'] === 'youtube')
                      <iframe src="https://www.youtube.com/embed/{{ $item['src'] }}"
                              class="w-100 rounded shadow"
                              style="min-height:340px"
                              allowfullscreen>
                      </iframe>
                    @elseif($item['type'] === 'image')
                      <img src="{{ $item['src'] }}" class="w-100 rounded shadow" alt="Media About Us">
                    @endif
                  </div>
                @endforeach
              </div>

              <!-- Tombol Prev & Next absolute -->
              <button class="carousel-control-prev custom-control" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i>
              </button>
              <button class="carousel-control-next custom-control" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i>
              </button>
            </div>
          </div>

          <!-- Kolom Konten -->
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>{{ $infos->first()->judul }}</h3>
            <p>{!! $infos->first()->isi !!}</p>

            {{-- Tombol dinamis --}}
            @php
              $pages = \App\Models\Page::where('show_as_button', true)
                  ->where('status', 'published')
                  ->get(['title','slug']);
              $colors = ['#BD1919','#E6892B','#60BD19','#C9CF15','#3D5977'];
            @endphp

            <div class="btn-group-row mt-3">
              <div class="btn-row">
                @foreach($pages->take(3) as $i => $page)
                  <a href="{{ url('halaman/'.$page->slug) }}"
                    class="btn-get-started"
                    style="background-color: {{ $colors[$i % count($colors)] }}">
                    {{ $page->title }} <i class="fas fa-arrow-right"></i>
                  </a>
                @endforeach
              </div>
              @if($pages->count() > 3)
              <div class="btn-row">
                @foreach($pages->slice(3) as $i => $page)
                  <a href="{{ url('halaman/'.$page->slug) }}"
                    class="btn-get-started"
                    style="background-color: {{ $colors[($i+3) % count($colors)] }}">
                    {{ $page->title }} <i class="fas fa-arrow-right"></i>
                  </a>
                @endforeach
              </div>
              @endif
            </div>
          </div>
        </div>
        @else
          <p class="text-center">Konten About Us belum tersedia.</p>
        @endif

      </div>
    </section>
    <!-- End About Us Section -->

    <!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">
    <div class="section-title text-center">
          <div class="section">
            <h3>Kesuksesan STIFIn</h3>
            <p>Saat ini tes STIFIn sudah digunakan di berbagai belahan dunia dan mencapai <br> kesuksesan untuk para klien, promotor, dan cabangnya.</p>
          </div>

            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
              <h4 class="title">Total Cabang</h4>
              <p class="description">
                  <span class="purecounter" 
                        data-purecounter-start="0" 
                        data-purecounter-end="{{ \App\Models\Branch::count() }}" 
                        data-purecounter-duration="2">
                      0
                  </span>+
              </p>
          </div>
                <!-- Total Tes -->
          <div class="col-lg-3 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
              <h4 class="title">Total Tes</h4>
              <p class="description">
                  <span class="purecounter" 
                        data-purecounter-start="0" 
                        data-purecounter-end="{{ \App\Models\Pendaftaran::whereIn('status', ['2','3'])->count() }}" 
                        data-purecounter-duration="2">
                      0
                  </span>+
              </p>
          </div>

          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <h4 class="title">Total Promotor</h4>
            <p class="description">
                <span class="purecounter" 
                      data-purecounter-start="0" 
                      data-purecounter-end="{{ \App\Models\Promotor::count() }}" 
                      data-purecounter-duration="2">
                    0
                </span>+
            </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Cta Section -->


<section id="testimonials" class="testimonials">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Apa Kata mereka?</h2>
    </div>
        @php
          $testimonialGalleries = \App\Models\Gallery::where('category_id', 4)
              ->where('status', 'published')
              ->orderByDesc('created_at')
              ->take(4)
              ->get();
              // Ambil konten testimonial dari tabel Testimonial
          $testimonials = \App\Models\Testimonial::where('status', 'published')
              ->orderByDesc('created_at')
              ->take(4)
              ->get();
        @endphp

     <div class="row justify-content-center mb-4">
    @foreach($testimonialGalleries as $gallery)
    <div class="col-md-6 col-lg-3 mb-3">
        <div class="testimonial-video zoom-hover">
            <img src="{{ asset('storage/' . $gallery->image_path) }}" 
                 class="img-fluid" 
                 alt="{{ $gallery->title ?? 'Testimonial' }}">
        </div>
    </div>
    @endforeach
</div>

<div class="testimonials-slider-wrapper">
    <!-- Tombol panah kiri -->
    <div class="arrow-btn custom-prev"><i class="bx bx-chevron-left"></i></div>

    <!-- Swiper -->
    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
            @foreach($testimonials as $testimonial)
            <div class="swiper-slide">
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        {{ $testimonial->message }}
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    @if($testimonial->image)
                        <img src="{{ asset('storage/'.$testimonial->image) }}" class="testimonial-img" alt="{{ $testimonial->name }}">
                    @endif
                    <h3>{{ $testimonial->name }}</h3>
                    <h4>{{ $testimonial->role }}</h4>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Tombol panah kanan -->
    <div class="arrow-btn custom-next"><i class="bx bx-chevron-right"></i></div>
</div>


  </div>
</section>
<!-- End Testimonials Section -->

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
