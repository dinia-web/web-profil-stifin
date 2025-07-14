@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Daftar Kontak</h3>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Hubungi Kami</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-info">Lihat</a>
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
</div>
@endsection
