@extends('layouts.master')
@section('title', 'Cabang STIFIn')
@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Daftar Cabang STIFIn</h2>

    {{-- Tombol Tambah & Pencarian --}}
    <div class="mb-3 d-flex justify-content-between">
        <form method="GET" action="{{ route('branches.index') }}" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari cabang..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">Cari</button>
        </form>
        <a href="{{ route('branches.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Cabang</th>
                <th>Kota</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>WhatsApp</th>
                <th width="160px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($branches as $index => $branch)
            <tr>
                <td>{{ $branches->firstItem() + $index }}</td>
                <td>{{ $branch->name }}</td>
                <td>{{ $branch->city }}</td>
                <td>{{ $branch->address ?? '-' }}</td>
                <td>{{ $branch->phone ?? '-' }}</td>
                <td>{{ $branch->email ?? '-' }}</td>
                <td>{{ $branch->whatsapp ?? '-' }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus cabang ini?')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Belum ada cabang</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-between mt-3">
        <div>
            <p class="mb-4 text-muted">
                Showing {{ $branches->firstItem() ?? 0 }} to {{ $branches->lastItem() ?? 0 }} of {{ $branches->total() ?? 0 }} results
            </p>
        </div>
        <div>
            {{ $branches->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
