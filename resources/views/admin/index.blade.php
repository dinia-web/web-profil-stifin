@extends('layouts.master') <!-- atau layout admin kamu -->

@section('content')
<div class="container">
    <h4>Halaman Statis</h4>
    <ul class="list-group mt-3">
        @foreach ($staticPages as $page)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $page->title }}
                <a href="{{ url('/stifin/halaman/' . $page->slug) }}" class="btn btn-sm btn-primary" target="_blank">Lihat Halaman</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
