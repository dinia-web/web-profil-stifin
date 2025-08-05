@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Tambah Album</h2>
    <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Album</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Cover Image</label>
            <input type="file" name="cover_image" class="form-control">
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('albums.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
