@extends('layouts.master')
@section('title', 'Tambah Testimonial')
@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Testimonial</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Peran / Jabatan</label>
            <input type="text" name="role" class="form-control" value="{{ old('role') }}">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Pesan Testimonial</label>
            <textarea name="message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Foto (opsional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="published" 
                    {{ old('status', 'published') == 'published' ? 'checked' : '' }}>
                <label class="form-check-label">Published</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="draft" 
                    {{ old('status') == 'draft' ? 'checked' : '' }}>
                <label class="form-check-label">Draft</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
