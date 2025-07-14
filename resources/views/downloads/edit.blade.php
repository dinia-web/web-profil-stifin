@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit File: {{ $download->title }}</h3>

    <form action="{{ route('downloads.update', $download->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $download->title }}" required>
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
            <textarea name="description" class="form-control">{{ $download->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>File Path</label>
            <input type="text" name="file_path" class="form-control" value="{{ $download->file_path }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis File</label>
            <input type="text" name="file_type" class="form-control" value="{{ $download->file_type }}">
        </div>

        <div class="mb-3">
            <label>Ukuran File (byte)</label>
            <input type="number" name="file_size" class="form-control" value="{{ $download->file_size }}">
        </div>

        <div class="mb-3">
            <label>Uploader</label>
            <input type="text" name="uploader" class="form-control" value="{{ $download->uploader }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="draft" {{ $download->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $download->status == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ $download->status == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
