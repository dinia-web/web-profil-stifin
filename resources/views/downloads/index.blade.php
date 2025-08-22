@extends('layouts.master')
@section('title', 'Manajemen Download')
@section('content')
<div class="container">
    <h3 class="mb-4">Manajemen Download</h3>

{{-- Notifikasi sukses --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

 <div class="mb-3 d-flex justify-content-between">
    <form method="GET" action="{{ route('downloads.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari file..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>
    <a href="{{ route('downloads.create') }}" class="btn btn-primary">+ Upload File</a>
</div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th><th>Kategori</th><th>Status</th><th>Unduhan</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($downloads as $d)
            <tr>
                <td>{{ $d->title }}</td>
                <td>{{ $d->category->name ?? '-' }}</td>
                <td>{{ ucfirst($d->status) }}</td>
                <td>{{ $d->download_count }}</td>
                <td>
                    <a href="{{ route('downloads.edit', $d->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ asset($d->file_path) }}" target="_blank" class="btn btn-sm btn-success">Lihat</a>
                    <form action="{{ route('downloads.destroy', $d->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus file?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
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