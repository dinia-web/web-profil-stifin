@extends('layouts.master')

@section('content')
<div class="container">
    <h4>Edit File Download</h4>

    <form action="{{ route('downloads.update', $download->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $download->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $download->category_id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description', $download->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Upload File (kosongkan jika tidak ingin ganti)</label>
            <input type="file" name="file" class="form-control">
            @if($download->file_path)
                <small>File saat ini: <a href="{{ asset('storage/' . $download->file_path) }}" target="_blank">{{ basename($download->file_path) }}</a></small>
            @endif
        </div>

        <div class="mb-3">
            <label>Nama Pengunggah</label>
            <input type="text" name="uploader" class="form-control" value="{{ old('uploader', $download->uploader) }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="draft" {{ $download->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $download->status == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ $download->status == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('downloads.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

