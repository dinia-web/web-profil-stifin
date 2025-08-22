@extends('layouts.master')

@section('title', 'Manajemen Info')

@section('content')
<div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Daftar Info</h3>
        <div>
            <a href="{{ route('kategoris.index') }}" class="btn btn-sm btn-outline-secondary me-2">Kelola Kategori</a>
        </div>
    </div>

    <div class="mb-3 d-flex justify-content-between">
    <form method="GET" action="{{ route('admin.infos.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari info..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>
    <a href="{{ route('admin.infos.create') }}" class="btn btn-primary">+ Tambah Info</a>
</div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tag</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($infos as $info)
            <tr>
                <td>
                        @if($info->gambar)
                            <img src="{{ asset('storage/' . $info->gambar) }}" alt="Gambar" style="width: 100px;">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                <td>{{ $info->judul }}</td>
                <td>{{ $info->kategori->nama ?? '-' }}</td>
                <td>
                    @foreach($info->tags as $tag)
                        <span class="badge bg-secondary">{{ $tag->name }}</span>
                    @endforeach
                </td>
                <td>
                        @switch($info->status)
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
                <td>
                    <a href="{{ route('admin.infos.edit', $info->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.infos.destroy', $info->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between mt-3">
    <div>
        <p class="mb-4 text-muted">
            Showing {{ $infos->firstItem() }} to {{ $infos->lastItem() }} of {{ $infos->total() }} results
        </p>
    </div>
    <div>
        {{ $infos->links('pagination::bootstrap-5') }}
    </div>
</div>
</div>
@endsection