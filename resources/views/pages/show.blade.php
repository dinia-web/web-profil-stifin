@extends('layouts.website')

@section('title', $page->title)

@section('meta')
    <meta name="description" content="{{ $page->meta_description }}">
    <meta name="keywords" content="{{ $page->meta_keywords }}">
@endsection

@section('content')

<!-- ======= Breadcrumb Section ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center flex-column text-center">
      <h2 class="fw-bold">{{ $page->title }}</h2>
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
      </ol>
    </div>
  </div>
</section>
<!-- End Breadcrumb Section -->

<!-- ======= Page Section ======= -->
<section id="page" class="page">
  <div class="container" data-aos="fade-up">
    <div class="page-content">
      {!! $page->content !!}
    </div>
  </div>
</section>
<!-- End Page Section -->

@endsection
