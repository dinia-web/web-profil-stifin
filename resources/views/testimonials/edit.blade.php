@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Testimonial</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Peran / Jabatan</label>
            <input type="text" name="role" class="form-control" value="{{ old('role', $testimonial->role) }}">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Pesan Testimonial</label>
            <textarea name="message" class="form-control" rows="4" required>{{ old('message', $testimonial->message) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Foto (opsional)</label>
            <input type="file" name="image" class="form-control">
            @if($testimonial->image)
                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Foto" class="img-fluid mt-2" width="150">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="published"
                    {{ old('status', $testimonial->status) == 'published' ? 'checked' : '' }}>
                <label class="form-check-label">Published</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="draft"
                    {{ old('status', $testimonial->status) == 'draft' ? 'checked' : '' }}>
                <label class="form-check-label">Draft</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
