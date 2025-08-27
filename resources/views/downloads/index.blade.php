@extends('layouts.master')
@section('title', 'Manajemen Download')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Manajemen Download</h3>
        <div>
            <a href="{{ route('download_categories.index') }}" class="btn btn-sm btn-outline-secondary me-2">Kelola Kategori</a>
        </div>
    </div>

{{-- Notifikasi sukses --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

 <div class="mb-3 d-flex justify-content-between">
    <form method="GET" action="{{ route('downloads.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari file..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>
    <a href="{{ route('downloads.create') }}" class="btn btn-primary">+ Tambah</a>
</div>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th style="width: 50px;">No</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Unduhan</th><th width="250px" >Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($downloads as $index => $d)
        <tr>
            <td>{{ $downloads->firstItem() + $index }}</td>
                <td>{{ $d->title }}</td>
                <td>{{ $d->category->name ?? '-' }}</td>
                 <td>
                        @switch($d->status)
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
                <td>{{ $d->download_count }}</td>
                <td>
                    <div class="btn btn-group">
                    <a href="{{ route('downloads.edit', $d->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ asset($d->file_path) }}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Lihat</a>
                    <form action="{{ route('downloads.destroy', $d->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus file?')"><i class="fa fa-trash"></i> Hapus</button>
                    </form>
                    </div>
                </td>
            </tr>
              @empty
            <tr>
            <td colspan="8" class="text-center">Tidak ada data download.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
  <div class="d-flex justify-content-between mt-3">
    <div>
        <p class="mb-4 text-muted">
            Showing {{ $downloads->firstItem() }} to {{ $downloads->lastItem() }} of {{ $downloads->total() }} results
        </p>
    </div>
    <div>
        {{ $downloads->links('pagination::bootstrap-5') }}
    </div>
</div>

</div>
@endsection