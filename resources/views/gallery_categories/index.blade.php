@extends('layouts.master')
@section('title', 'Manajemen Kategori Galeri')
@section('content')
<div class="container">
    <h2 class="mb-4">Manajemen Kategori Galeri</h2>
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('galleries.index') }}" class="btn btn-secondary">← Kembali ke Galeri</a>
        <a href="{{ route('gallery-categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
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
</div>
@endsection
