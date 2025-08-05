@extends('layouts.master')
@section('title', 'Manajemen Halaman Statis')
@section('content')
<div class="container">
    <h4 class="mb-4">Manajemen Halaman Statis</h4>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary mb-3">+ Tambah Halaman</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Tgl Publikasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
            <tr>
                <td>{{ $page->title }}</td>
                <td>{{ $page->slug }}</td>
                <td>
                        @switch($page->status)
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
                <td>{{ $page->published_at }}</td>
                <td>
                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pages->links() }}
</div>
@endsection
