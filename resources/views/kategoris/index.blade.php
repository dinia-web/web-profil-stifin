@extends('layouts.master')

@section('title', 'Data Kategori Info')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Daftar Kategori</h2>
    <div class="mb-3 d-flex justify-content-between">
    {{-- Form Pencarian --}}
    <form method="GET" action="{{ route('kategoris.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari kategori..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>

    {{-- Tombol Aksi --}}
    <div class="d-flex gap-2">
        <a href="{{ route('admin.infos.index') }}" class="btn btn-secondary">← Kembali</a>
        <a href="{{ route('kategoris.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>
</div>

{{-- Notifikasi sukses --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif


<table class="table table-bordered">
    <thead class="table-primary">
        <tr>
            <th style="width: 50px;">No</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th width="180px" >Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kategoris as $index => $kategori)
        <tr>
            <td>{{ $kategoris->firstItem() + $index }}</td>
            <td>{{ $kategori->nama }}</td>
            <td>{{ $kategori->deskripsi }}</td>
            <td>
                 <div class="btn btn-group">
                <a href="{{ route('kategoris.edit', $kategori->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Tidak ada data kategori.</td>
        </tr>
        @endforelse
    </tbody>
</table>

 <div class="d-flex justify-content-between mt-3">
    <div>
        <p class="mb-4 text-muted">
            Showing {{ $kategoris->firstItem() }} to {{ $kategoris->lastItem() }} of {{ $kategoris->total() }} results
        </p>
    </div>
    <div>
        {{ $kategoris->links('pagination::bootstrap-5') }}
    </div>
</div>
</div>
@endsection