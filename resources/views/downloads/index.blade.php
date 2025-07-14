@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Manajemen Download</h3>
    <a href="{{ route('downloads.create') }}" class="btn btn-primary mb-3">+ Upload File</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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



