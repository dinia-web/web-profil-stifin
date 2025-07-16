@extends('layouts.master')

@section('content')
<div class="container">
    <h3 class="mb-4">Manajemen Download</h3>

{{-- Notifikasi sukses --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

    <a href="{{ route('downloads.create') }}" class="btn btn-primary mb-3">+ Upload File</a>

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
</div>
@endsection



