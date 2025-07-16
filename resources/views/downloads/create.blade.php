@extends('layouts.master')

@section('content')
<div class="container">
    <h3>Upload File</h3>

    <form action="{{ route('downloads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Upload File</label>
            <input type="file" name="file" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Pengunggah</label>
            <input type="text" name="uploader" class="form-control" value="admin">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
                <option value="archived">Archived</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('downloads.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
