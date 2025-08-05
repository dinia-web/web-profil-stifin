@extends('layouts.master')

@section('title', 'Manajemen Info')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Info</h1>
    <a href="{{ route('admin.infos.create') }}" class="btn btn-primary mb-3">+ Tambah Info</a>

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
</div>
@endsection
