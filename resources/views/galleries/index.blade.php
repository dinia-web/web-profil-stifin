@extends('layouts.master')
@section('title', 'Manajemen Galeri')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Manajemen Galeri</h3>
        <div>
            <a href="{{ route('gallery_categories.index') }}" class="btn btn-sm btn-outline-secondary me-2">Kelola Kategori</a>
            <a href="{{ route('albums.index') }}" class="btn btn-sm btn-outline-secondary">Kelola Album</a>
        </div>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3 d-flex justify-content-between">
    <form method="GET" action="{{ route('galleries.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari judul galeri..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>
    <a href="{{ route('galleries.create') }}" class="btn btn-primary">+ Tambah</a>
</div>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Album</th>
                <th>Status</th>
                <th>Beranda</th>
                <th width="180px" >Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($galleries as $index => $g)
        <tr>
            <td>{{ $galleries->firstItem() + $index }}</td>
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
                        <div class="btn btn-group">
                        <a href="{{ route('galleries.edit', $g->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                        <form action="{{ route('galleries.destroy', $g->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                        </div>
                    </td>
                </tr>
              @empty
            <tr>
            <td colspan="8" class="text-center">Tidak ada data galeri.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
   <div class="d-flex justify-content-between mt-3">
    <div>
        <p class="mb-2 text-muted">
            Showing {{ $galleries->firstItem() }} to {{ $galleries->lastItem() }} of {{ $galleries->total() }} results
        </p>
    </div>
    <div>
        {{ $galleries->links('pagination::bootstrap-5') }}
    </div>
</div>

</div>
@endsection
