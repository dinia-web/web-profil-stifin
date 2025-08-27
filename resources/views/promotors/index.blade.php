@extends('layouts.master')
@section('title', 'Promotor STIFIn')
@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Daftar Promotor STIFIn</h2>

    <div class="mb-3 d-flex justify-content-between">
        <form method="GET" action="{{ route('promotors.index') }}" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari promotor..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">Cari</button>
        </form>
        <a href="{{ route('promotors.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama</th>
                <th>Kota</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>WhatsApp</th>
                <th width="160px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($promotors as $index => $promotor)
            <tr>
                <td>{{ $promotors->firstItem() + $index }}</td>
                <td>{{ $promotor->name }}</td>
                <td>{{ $promotor->city ?? '-' }}</td>
                <td>{{ $promotor->phone ?? '-' }}</td>
                <td>{{ $promotor->email ?? '-' }}</td>
                <td>{{ $promotor->whatsapp ?? '-' }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('promotors.edit', $promotor->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                        <form action="{{ route('promotors.destroy', $promotor->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus promotor ini?')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada promotor</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-between mt-3">
        <div>
            <p class="mb-4 text-muted">
                Showing {{ $promotors->firstItem() ?? 0 }} to {{ $promotors->lastItem() ?? 0 }} of {{ $promotors->total() ?? 0 }} results
            </p>
        </div>
        <div>
            {{ $promotors->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
