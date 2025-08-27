@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Edit Kategori Galeri</h2>
    <form action="{{ route('gallery_categories.update', $galleryCategory->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ $galleryCategory->name }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ $galleryCategory->description }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('gallery_categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
    </form>
</div>
@endsection
