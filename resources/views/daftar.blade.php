@extends('layouts.website')

@section('title', 'Daftar')

@section('content')
<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">Ikuti Tes STIFIn</h2>
      <ol class="breadcrumb mt-2">
        <li><a>Kenali mesin kecerdasanmu & mulai langkah suksesmu bersama STIFIn.</a></li>
      </ol>
    </div>
  </div>
</section>
<!-- End Breadcrumb Section -->

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
      <div class="row" data-aos="fade-right">
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

<!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3>Penggagas dan Tim Manajemen</h3>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="/themes/Medicio/assets/img/testimonials/testimonials-5.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Medical Officer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="/themes/Medicio/assets/img/testimonials/testimonials-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Anesthesiologist</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="/themes/Medicio/assets/img/testimonials/testimonials-4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>Cardiology</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="member-img">
                <img src="/themes/Medicio/assets/img/testimonials/testimonials-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Neurosurgeon</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Doctors Section -->

<section id="services" class="services services">
  <div class="container" data-aos="fade-up">

    @php
        $infos = \App\Models\Info::where('kategori_id', 3)
            ->where('status', 'published')
            ->orderBy('id', 'asc')
            ->get();

        $icons = [
            'bi bi-fingerprint',
            'bi bi-gift',
            'bi bi-file-earmark-text',
            'bi bi-mortarboard',
            'bi bi-chevron-down icon-show',
        ];
    @endphp

    <div class="section-title">
      <h4>Fasilitas Tes yang Akan Didapat</h4>
    </div>
    
    <div class="row justify-content-center">
        @forelse ($infos as $key => $info)
            <div class="col-lg-6 col-xl-3 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                
                <div class="icon">
                    <i class="{{ $icons[$key % count($icons)] }}"></i>
                </div>

                <h4 class="title">
                    <a>{{ $info->judul }}</a>
                </h4>
                <p class="description">{!! $info->isi !!}</p>
            </div>
        @empty
            <p class="text-center">Belum ada fasilitas tes yang dipublikasikan.</p>
        @endforelse
    </div>

  </div>
</section>

 <!-- ======= Bonus Tambahan Section ======= -->
<section id="bonus" class="faq section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title text-start">
      <h3>Bonus Tambahan Bagi Anda yang Daftar Hari Ini</h3>
    </div>

    <ul class="faq-list">

      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#bonus1">
          1. Video Trik Psikologi Penjualan ~ Rp 199.000
          <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="bonus1" class="collapse" data-bs-parent=".faq-list">
          <p>
            Pelajari trik psikologi yang terbukti meningkatkan penjualan secara instan dan tepat sasaran.
          </p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#bonus2">
          2. Video Sustainable Profit Matrix Strategy ~ Rp 4.800.000
          <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="bonus2" class="collapse" data-bs-parent=".faq-list">
          <p>
            Strategi membangun bisnis berkelanjutan dengan keuntungan konsisten dan terukur.
          </p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#bonus3">
          3. Video Amazing Personal Branding ~ Rp 2.499.000
          <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="bonus3" class="collapse" data-bs-parent=".faq-list">
          <p>
            Panduan membangun personal branding yang kuat dan menarik audiens secara organik.
          </p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#bonus4">
          4. Checklist 30 Amazing Personal Branding ~ Rp 1.499.000
          <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="bonus4" class="collapse" data-bs-parent=".faq-list">
          <p>
            Checklist praktis untuk memastikan semua aspek penting personal branding Anda sudah lengkap dan optimal.
          </p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#bonus5">
          5. Mindmap Extreme Growth Hack ~ Rp 1.997.000
          <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="bonus5" class="collapse" data-bs-parent=".faq-list">
          <p>
            Mindmap berisi strategi pertumbuhan cepat yang biasa digunakan startup besar dan tim growth hacker.
          </p>
        </div>
      </li>

    </ul>

  </div>
</section>
<!-- End Bonus Tambahan Section -->

<!-- ======= Form Pendaftaran Section ======= -->
<section id="form" class="py-3">
  <div class="container">
    <div class="mx-auto" style="max-width: 480px; border: 1px solid #6b6b6b; background-color: #f8f9fa; border-radius: 10px; padding: 30px;">
      <h5 class="fw-bold text-center mb-3">Formulir Pendaftaran Tes STIFIn</h5>

      <div class="alert alert-info small">
        📌 <strong>Catatan:</strong> Jika Anda mengikuti tes STIFIn secara online, mohon unggah foto sidik jari Anda. Format file harus jelas, tajam, dan difoto dari atas kertas, formulir tes yang dikirim (JPG/PNG).
      </div>

      <form action="{{ route('daftar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nama Lengkap *</label>
          <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Nomor WhatsApp *</label>
          <input type="text" name="whatsapp" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Pilih Paket Tes *</label>
          <select name="paket" class="form-select" required>
            <option selected disabled>-- Pilih Paket --</option>
            <option value="personal">Personal / Couple -- Rp649.000</option>
            <option value="family">Family / Group -- Rp599.000</option>
            <option value="instansi">Instansi -- Rp549.000</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Lokasi Tes *</label>
          <select name="lokasi" class="form-select" id="lokasi" required>
            <option selected disabled>-- Pilih Lokasi --</option>
            <option value="Online">Online</option>
            <option value="Offline">Offline</option>
          </select>
        </div>

        <div class="mb-3" id="sidikJariField" style="display: none;">
          <label class="form-label">Upload Foto Sidik Jari *</label>
          <input type="file" name="sidik_jari" id="sidik_jari" class="form-control">
          <small class="text-muted">Hanya diisi jika memilih lokasi ‘Online’.</small>
        </div>

        <div class="mb-3">
          <label class="form-label">Catatan Tambahan</label>
          <textarea name="catatan" class="form-control" rows="2"></textarea>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Kirim Pendaftaran</button>
        </div>
      </form>

      <div class="alert alert-warning small mt-4">
        ⚠️ Setelah mengisi formulir, customer care resmi WhatsApp Tes STIFIn akan menghubungi Anda terkait pembayaran dan pengiriman foto sidik jari. Pastikan nomor WhatsApp yang Anda tulis aktif dan bisa dihubungi.
      </div>
    </div>
  </div>
</section>

<!-- ======= Kontak Bantuan Section ======= -->
<section id="kontak-bantuan" class="py-5 text-center bg-white">
  <div class="container">

    <h5 class="kontak-bantu">Kontak Bantuan</h5>

    <p class="text-muted mb-1" style="font-size: 14px;">
      <i class="bi bi-telephone me-1"></i> WhatsApp: 0857-7217-5078
    </p>
    <p class="text-muted mb-4" style="font-size: 14px;">
      <i class="bi bi-envelope me-1"></i> Email: info@stifingenetic.com
    </p>

    <a href="https://wa.me/6287848631234" target="_blank"
       class="btn btn-whatsapp px-4 py-2 mb-4 d-inline-flex align-items-center justify-content-center">
      <i class="bi bi-whatsapp me-2"></i> Hubungi Via WhatsApp
    </a>

    <div class="d-flex justify-content-center gap-4 align-items-center flex-wrap mt-3">
      <img src="/themes/Medicio/assets/img/bayar/bri.png" alt="Bank BRI" class="bank-logo">
      <img src="/themes/Medicio/assets/img/bayar/mandiri.png" alt="Bank Mandiri" class="bank-logo">
      <img src="/themes/Medicio/assets/img/bayar/bca.png" alt="Bank BCA" class="bank-logo">
      <img src="/themes/Medicio/assets/img/bayar/bni.png" alt="Bank BNI" class="bank-logo">
    </div>

  </div>
</section>

     <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @endsection
<script>
document.addEventListener('DOMContentLoaded', () => {
    const lokasi = document.getElementById('lokasi');
    if (!lokasi) return; // stop kalau elemen nggak ketemu

    lokasi.addEventListener('change', () => {
        const sidikField = document.getElementById('sidikJariField');
        const sidikInput = document.getElementById('sidik_jari');

        if (lokasi.value === 'Online') {
            sidikField.style.display = 'block';
            sidikInput.required = true;
        } else {
            sidikField.style.display = 'none';
            sidikInput.required = false;
            sidikInput.value = '';
        }
    });
});
</script>
