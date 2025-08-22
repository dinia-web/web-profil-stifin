@extends('layouts.master')

@section('title', 'Manajemen User')

@section('content')
<div class="container">
<h2 class="mb-4">Manajemen User</h2>

{{-- Notifikasi sukses --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Tombol Tambah --}}
<div class="mb-3 d-flex justify-content-between">
    <form method="GET" action="{{ route('users.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari user..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>
    <a href="{{ route('users.create') }}" class="btn btn-primary">+ Tambah User</a>
</div>

{{-- Tabel Data User --}}

<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th width="5%">No</th>
<th>Nama</th>
<th>Email</th>
<th>Role</th>
<th width="20%">Aksi</th>
</tr>
</thead>
<tbody>
@forelse($users as $index => $user)
<tr>
<td>{{ $index + 1 }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ ucfirst($user->role) }}</td>
<td>
<a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>

<form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
onsubmit="return confirm('Yakin ingin menghapus user ini?')">
@csrf
@method('DELETE')
<button class="btn btn-sm btn-danger">Hapus</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="5" class="text-center">Tidak ada data user.</td>

</tr>
@endforelse
</tbody>
</table>
<div class="d-flex justify-content-between mt-3">
    <div>
        <p class="mb-4 text-muted">
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
        </p>
    </div>
    <div>
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
</div>
</div>
@endsection