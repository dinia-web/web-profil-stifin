@extends('layouts.master')

@section('content')
<div class="container">
    <h3>Edit Galeri: {{ $gallery->title }}</h3>

    <form action="{{ route('galleries.update', $gallery->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $gallery->title }}" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $gallery->category_id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Album</label>
            <select name="album_id" class="form-control">
                <option value="">-- Pilih Album --</option>
                @foreach($albums as $alb)
                    <option value="{{ $alb->id }}" {{ $alb->id == $gallery->album_id ? 'selected' : '' }}>
                        {{ $alb->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ $gallery->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Path Gambar / URL</label>
            <input type="text" name="image_path" class="form-control" value="{{ $gallery->image_path }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Pengunggah</label>
            <input type="text" name="uploader" class="form-control" value="{{ $gallery->uploader }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="draft" {{ $gallery->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $gallery->status == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ $gallery->status == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Diambil</label>
            <input type="date" name="taken_at" class="form-control" value="{{ $gallery->taken_at }}">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input"
                {{ $gallery->is_featured ? 'checked' : '' }}>
            <label class="form-check-label">Tampilkan di Beranda</label>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('galleries.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
