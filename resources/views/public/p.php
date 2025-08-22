<section id="tentang-tes" class="about">
  <div class="container" data-aos="fade-up">
    @php
      use App\Models\Info;

      $infos = Info::where('kategori_id', 1)
          ->where('status', 'published')
          ->latest()
          ->get();
    @endphp

    @forelse($infos as $info)
      <div class="row mb-4" data-aos="fade-right">
         <div class="col-lg-6 order-lg-1 order-2">
          @if($info->gambar)
            <img src="{{ asset('storage/' . $info->gambar) }}" 
                 class="img-fluid rounded" 
                 alt="{{ $info->judul }}">
          @endif
        </div>
        {{-- Konten di kiri --}}
        <div class="col-lg-6 order-lg-2 order-1" data-aos="fade-left">
          <h3>{{ $info->judul }}</h3>
          {!! $info->isi !!}
        </div>
      </div>
    @empty
      <div class="col-12">
        <p class="text-center">Belum ada info</p>
      </div>
    @endforelse
  </div>
</section>

 <li>
                    <a href="{{ route('kategoris.index') }}">
                        <i class="bx bx-category"></i>
                        <span data-key="t-kategori">Kategori</span>
                    </a>
                </li>

<!-- ======= Services Section ======= -->
<section id="services" class="services services">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h4>Fasilitas Tes yang Akan Didapat</h4>
    </div>

    <div class="row justify-content-center">
      <!-- Fasilitas 1 -->
      <div class="col-lg-6 col-xl-3 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon"><i class="bi bi-fingerprint"></i></div>
        <h4 class="title">
          <a>Tes sidik jari berbasis genetik<br><small>(1x seumur hidup)</small></a>
        </h4>
        <p class="description">Tes ilmiah yang hanya perlu dilakukan sekali seumur hidup untuk mengetahui Mesin Kecerdasan Anda.</p>
      </div>

      <!-- Fasilitas 2 -->
      <div class="col-lg-6 col-xl-3 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon"><i class="bi bi-gift"></i></div>
        <h4 class="title"><a>Merchandise</a></h4>
        <p class="description">Dapatkan merchandise eksklusif sebagai kenang-kenangan dari pengalaman tes Anda.</p>
      </div>

      <!-- Fasilitas 3 -->
      <div class="col-lg-6 col-xl-3 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon"><i class="bi bi-file-earmark-text"></i></div>
        <h4 class="title"><a>E-Certificate dan eBook<br>hasil tes</a></h4>
        <p class="description">Hasil tes lengkap dalam bentuk digital, termasuk sertifikat dan eBook penjelasan tipe Anda.</p>
      </div>

      <!-- Fasilitas 4 -->
      <div class="col-lg-6 col-xl-3 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="400">
        <div class="icon"><i class="bi bi-mortarboard"></i></div>
        <h4 class="title"><a>Akses ke Akademi<br>Entrepreneur <small>(opsional)</small></a></h4>
        <p class="description">Kesempatan bergabung di komunitas belajar wirausaha untuk mengembangkan potensi diri Anda.</p>
      </div>
    </div>
      
  </div>
</section><!-- End Services Section -->