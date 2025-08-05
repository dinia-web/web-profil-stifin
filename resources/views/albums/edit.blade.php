@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Edit Album</h2>
    <form action="{{ route('albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Album</label>
            <input type="text" name="name" class="form-control" value="{{ $album->name }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ $album->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Cover Image</label>
            <input type="file" name="cover_image" class="form-control">
            @if ($album->cover_image)
                <img src="{{ asset('storage/' . $album->cover_image) }}" width="120" class="mt-2">
            @endif
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('albums.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
