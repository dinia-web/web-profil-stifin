<!-- ======= artikels Section ======= -->
<section id="artikels" class="artikels section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Artikel</h2>
      <p>Pelajari STIFIn lebih dalam dengan membaca artikel berikut. InsyaAllah <br>pemahaman anda tentang STIFIn akan semakin baik.</p>
    </div>

    <div class="artikels-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        @forelse($infos as $info)
          <div class="swiper-slide">
            <div class="artikel-card card p-3 h-100">
              @if($info->featured_image)
                <img src="{{ asset('storage/' . $info->featured_image) }}" class="card-img-top" alt="{{ $info->judul }}">
              @else
                <img src="/themes/Medicio/assets/img/stifin.jpg" class="card-img-top" alt="Artikel STIFIn">
              @endif
              <div class="card-body">
                <h5 class="card-title">{{ $info->judul }}</h5>
                <p class="card-text">
                  {{ Str::limit(strip_tags($info->content), 100) }}
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
<!-- ======= artikels Section ======= -->
<section id="artikels" class="artikels section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Artikel</h2>
      <p>Pelajari STIFIn lebih dalam dengan membaca artikel berikut. InsyaAllah <br>pemahaman anda tentang STIFIn akan semakin baik.</p>
    </div>

    <div class="artikels-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide">
          <div class="artikel-card card p-3 h-100">
            <img src="/themes/Medicio/assets/img/stifin.jpg" class="card-img-top" alt="Artikel STIFIn">
            <div class="card-body">
              <h5 class="card-title">Konsep STIFIn</h5>
              <p class="card-text">Apa itu stifin? Stifin adalah ..... </p>
              <a href="{{ route('readmore') }}" class="btn btn-primary btn-sm">Read More →</a>
            </div>
          </div>
        </div>

        <!-- Duplikat slide -->
        <div class="swiper-slide">
          <div class="artikel-card card  p-3 h-100">
            <img src="/themes/Medicio/assets/img/stifin.jpg" class="card-img-top" alt="Artikel STIFIn">
            <div class="card-body">
              <h5 class="card-title">Konsep STIFIn</h5>
              <p class="card-text">Apa itu stifin? Stifin adalah ..... </p>
              <a href="{{ route('readmore') }}" class="btn btn-primary btn-sm">Read More →</a>
            </div>
          </div>
        </div>

         <!-- Slide 1 -->
        <div class="swiper-slide">
          <div class="artikel-card card  p-3 h-100">
            <img src="/themes/Medicio/assets/img/stifin.jpg" class="card-img-top" alt="Artikel STIFIn">
            <div class="card-body">
              <h5 class="card-title">Konsep STIFIn</h5>
              <p class="card-text">Apa itu stifin? Stifin adalah ..... </p>
              <a href="{{ route('readmore') }}" class="btn btn-primary btn-sm">Read More →</a>
            </div>
          </div>
        </div>

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section>