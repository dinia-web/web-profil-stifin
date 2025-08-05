@extends('layouts.master')

@section('content')
<div class="container">
    <h3>Tambah Galeri</h3>

<form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        {{-- Kategori Galeri --}}
<div class="mb-3">
  <label for="gallery_category_id" class="form-label">Kategori Galeri</label>
  <div class="input-group">
    <select name="gallery_category_id" class="form-select">
      <option value="">-- Pilih Kategori --</option>
     @foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach
    </select>
  </div>
</div>

{{-- Album --}}
<div class="mb-3">
  <label for="album_id" class="form-label">Album</label>
  <div class="input-group">
    <select name="album_id" class="form-select">
      <option value="">-- Pilih Album --</option>
      @foreach($albums as $album)
        <option value="{{ $album->id }}">{{ $album->name }}</option>
      @endforeach
    </select>
  </div>
</div>


        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

     <div class="mb-3">
        <label>Upload Gambar</label>
        <input type="file" name="image_file" class="form-control" required>
    </div>


        <div class="mb-3">
            <label>Nama Pengunggah</label>
            <input type="text" name="uploader" class="form-control" value="{{ Auth::user()->name ?? '' }}">
        </div>

      <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="draft">Draft</option>
            <option value="published">Published</option>
            <option value="archived">Archived</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal Diambil (Opsional)</label>
        <input type="date" name="taken_at" class="form-control">
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" name="is_featured" value="1" class="form-check-input">
        <label class="form-check-label">Tampilkan di Beranda</label>
    </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('galleries.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
