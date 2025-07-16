@extends('layouts.master')

@section('content')
<div class="container">
    <h3 class="mb-4">Manajemen Galeri</h3>

{{-- Notifikasi sukses --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

    <a href="{{ route('galleries.create') }}" class="btn btn-primary mb-3">+ Tambah Galeri</a>

    <table class="table table-bordered">
        <thead>
            <tr>
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
                    <td>{{ $g->title }}</td>
                    <td>{{ $g->category->name ?? '-' }}</td>
                    <td>{{ $g->album->name ?? '-' }}</td>
                    <td>{{ ucfirst($g->status) }}</td>
                    <td>{{ $g->is_featured ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <a href="{{ route('galleries.edit', $g->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('galleries.destroy', $g->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
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
