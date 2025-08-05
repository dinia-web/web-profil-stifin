@extends('layouts.master')
@section('title', 'Manajemen Album')
@section('content')
<div class="container">
    <h2 class="mb-4">Manajemen Album</h2>
     <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('galleries.index') }}" class="btn btn-secondary">← Kembali ke Galeri</a>
        <a href="{{ route('albums.create') }}" class="btn btn-primary">+ Tambah Album</a>
    </div>
   
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Slug</th>
                <th>Deskripsi</th>
                <th>Cover</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td>{{ $album->name }}</td>
                    <td>{{ $album->slug }}</td>
                    <td>{{ $album->description }}</td>
                    <td>
                        @if ($album->cover_image)
                            <img src="{{ asset('storage/' . $album->cover_image) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('albums.destroy', $album->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
