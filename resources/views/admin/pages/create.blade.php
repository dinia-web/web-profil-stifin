@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Buat Halaman Baru</h2>
    <form action="{{ route('admin.pages.store') }}" method="POST">
        @csrf
        @include('admin.pages.partials.form', ['page' => new \App\Models\Page])
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection