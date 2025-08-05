@extends('layouts.master')
@section('title', 'Manajemen Galeri')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Manajemen Galeri</h3>
        <div>
            <a href="{{ route('gallery-categories.index') }}" class="btn btn-sm btn-outline-secondary me-2">Kelola Kategori</a>
            <a href="{{ route('albums.index') }}" class="btn btn-sm btn-outline-secondary">Kelola Album</a>
        </div>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('galleries.create') }}" class="btn btn-primary">+ Tambah Galeri</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Album</th>
                <th>Status</th>
                <th>Beranda</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($galleries as $g)
                <tr>
                    <td>
                        @if($g->image_path)
                            <img src="{{ asset('storage/' . $g->image_path) }}" alt="Gambar" style="width: 100px;">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>{{ $g->title }}</td>
                    <td>{{ $g->category->name ?? '-' }}</td>
                    <td>{{ $g->album->name ?? '-' }}</td>
                    <td>
                        @switch($g->status)
                            @case('draft')
                                <span class="badge bg-secondary">Draft</span>
                                @break
                            @case('published')
                                <span class="badge bg-success">Published</span>
                                @break
                            @case('archived')
                                <span class="badge bg-dark">Archived</span>
                                @break
                        @endswitch
                    </td>
                    <td>{{ $g->is_featured ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <a href="{{ route('galleries.edit', $g->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('galleries.destroy', $g->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
