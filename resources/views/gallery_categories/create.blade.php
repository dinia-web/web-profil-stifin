@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Tambah Kategori Galeri</h2>
    <form action="{{ route('gallery-categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('gallery-categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
