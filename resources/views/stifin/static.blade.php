@extends('layouts.website')

@section('title', $page->title)

@section('content')
<section class="static-page py-5">
  <div class="container">
    <h2 class="mb-4">{{ $page->title }}</h2>
    {!! $page->content !!}
  </div>
</section>
@endsection
