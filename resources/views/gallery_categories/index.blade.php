@extends('layouts.master')
@section('title', 'Manajemen Kategori Galeri')
@section('content')
<div class="container">
    <h2 class="mb-4">Manajemen Kategori Galeri</h2>
    <div class="mb-3 d-flex justify-content-between">
    {{-- Form Pencarian --}}
    <form method="GET" action="{{ route('gallery-categories.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari kategori..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>

    {{-- Tombol Aksi --}}
    <div class="d-flex gap-2">
        <a href="{{ route('galleries.index') }}" class="btn btn-secondary">← Kembali ke Galeri</a>
        <a href="{{ route('gallery-categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
    </div>
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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cat)
                <tr>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->slug }}</td>
                    <td>{{ $cat->description }}</td>
                    <td>
                        <a href="{{ route('gallery-categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('gallery-categories.destroy', $cat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
     <div class="d-flex justify-content-between mt-3">
    <div>
        <p class="mb-4 text-muted">
            Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} results
        </p>
    </div>
    <div>
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>
</div>
</div>
@endsection
