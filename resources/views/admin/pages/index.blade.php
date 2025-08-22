@extends('layouts.master')
@section('title', 'Manajemen Halaman Statis')
@section('content')
<div class="container">
    <h4 class="mb-4">Manajemen Halaman Statis</h4>

      <div class="mb-3 d-flex justify-content-between">
    <form method="GET" action="{{ route('admin.pages.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari halaman..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">+ Tambah Halaman</a>
</div>

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
   <div class="d-flex justify-content-between mt-3">
    <div>
        <p class="mb-4 text-muted">
            Showing {{ $pages->firstItem() }} to {{ $pages->lastItem() }} of {{ $pages->total() }} results
        </p>
    </div>
    <div>
        {{ $pages->links('pagination::bootstrap-5') }}
    </div>
</div>

</div>
@endsection