@extends('layouts.master')
@section('title', 'Manajemen Kontak')
@section('content')
<div class="container">
    <h3 class="mb-4">Daftar Kontak</h3>

{{-- Notifikasi sukses --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3 d-flex justify-content-between">
    <form method="GET" action="{{ route('contacts.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari nama kontak..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary">Hubungi Kami</a>
</div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ ucfirst($contact->status) }}</td>
                    <td>{{ $contact->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-success">Lihat</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada pesan.</td></tr>
            @endforelse
        </tbody>
    </table>
   <div class="d-flex justify-content-between mt-3">
    <div>
        <p class="mb-4 text-muted">
            Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} results
        </p>
    </div>
    <div>
        {{ $contacts->links('pagination::bootstrap-5') }}
    </div>
</div>
</div>
@endsection