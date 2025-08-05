@extends('layouts.master')

@section('title', 'Edit Info')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Info</h2>

    <form action="{{ route('admin.infos.update', $info->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $info->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $info->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tags">Tag</label>
            <select name="tags[]" id="tags" class="form-control" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"
                        {{ $info->tags->contains($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
            @if ($info->gambar)
                <small class="d-block mt-2">Gambar saat ini:</small>
                <img src="{{ asset('storage/'.$info->gambar) }}" alt="gambar" style="max-height: 150px;">
            @endif
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Konten</label>
            <textarea name="isi" id="isi" class="form-control" rows="5">{{ old('isi', $info->isi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $info->author) }}">
        </div>

       <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-control" required>
        <option value="draft" {{ $info->status == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ $info->status == 'published' ? 'selected' : '' }}>Published</option>
        <option value="archived" {{ $info->status == 'archived' ? 'selected' : '' }}>Archived</option>
    </select>
</div>


        <div class="mb-3">
            <label for="published_at" class="form-label">Tanggal Publikasi</label>
            <input type="datetime-local" name="published_at" id="published_at" class="form-control"
                value="{{ old('published_at', $info->published_at ? \Carbon\Carbon::parse($info->published_at)->format('Y-m-d\TH:i') : '') }}">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_homepage" id="is_homepage" class="form-check-input"
                {{ old('is_homepage', $info->is_homepage) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_homepage">Tampilkan di Homepage</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.infos.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
