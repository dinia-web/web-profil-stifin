@extends('layouts.master')

@section('title', 'Tambah Info')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Info Baru</h2>

    <form action="{{ route('admin.infos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="kategori_id" class="form-label">Kategori</label>
        <select name="kategori_id" id="kategori_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tags" class="form-label">Tag</label>
        <select name="tags[]" id="tags" class="form-control" multiple>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="isi" class="form-label">Konten</label>
        <textarea name="isi" id="isi" class="form-control" rows="5"></textarea>
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control">
    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" name="author" id="author" class="form-control" value="{{ auth()->user()->name ?? '' }}">
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
        <label for="published_at" class="form-label">Tanggal Publikasi</label>
        <input type="datetime-local" name="published_at" id="published_at" class="form-control">
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="is_homepage" name="is_homepage">
        <label class="form-check-label" for="is_homepage">
            Tampilkan di Homepage
        </label>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.infos.index') }}" class="btn btn-secondary">Batal</a>
</form>

</div>
@endsection
