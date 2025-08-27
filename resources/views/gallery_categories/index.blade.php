@extends('layouts.master')
@section('title', 'Manajemen Kategori Galeri')
@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Manajemen Kategori Galeri</h2>
    <div class="mb-3 d-flex justify-content-between">
    {{-- Form Pencarian --}}
    <form method="GET" action="{{ route('gallery_categories.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari kategori..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>

    {{-- Tombol Aksi --}}
    <div class="d-flex gap-2">
        <a href="{{ route('galleries.index') }}" class="btn btn-secondary">← Kembali</a>
        <a href="{{ route('gallery_categories.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>
</div>


    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama</th>
                <th>Slug</th>
                <th>Deskripsi</th>
                <th width="180px" >Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $index => $cat)
        <tr>
            <td>{{ $categories->firstItem() + $index }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->slug }}</td>
                    <td>{{ $cat->description }}</td>
                    <td>
                        <div class="btn btn-group">
                        <a href="{{ route('gallery_categories.edit', $cat->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                        <form action="{{ route('gallery_categories.destroy', $cat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                        </div>
                    </td>
                </tr>
             @empty
            <tr>
            <td colspan="8" class="text-center">Tidak ada data kategori galeri.</td>
            </tr>
            @endforelse
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
