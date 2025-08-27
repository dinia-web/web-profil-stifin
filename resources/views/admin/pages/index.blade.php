@extends('layouts.master')
@section('title', 'Manajemen Halaman Statis')
@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Manajemen Halaman Statis</h4>

      <div class="mb-3 d-flex justify-content-between">
    <form method="GET" action="{{ route('admin.pages.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari halaman..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">+ Tambah</a>
</div>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Judul</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Tgl Publikasi</th>
                <th width="180px" >Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pages as $index => $page)
        <tr>
            <td>{{ $pages->firstItem() + $index }}</td>
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
                <td>{{ $page->published_at ? $page->published_at->format('d-m-Y H:i') : '-' }}</td>
                <td>
                   <div class="btn btn-group">
                     <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i> Hapus</button>
                    </form>
                   </div>
                </td>
            </tr>
              @empty
            <tr>
            <td colspan="8" class="text-center">Tidak ada halaman statis.</td>
            </tr>
            @endforelse
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