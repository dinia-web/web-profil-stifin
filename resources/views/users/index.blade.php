@extends('layouts.master')

@section('title', 'Manajemen User')

@section('content')
<div class="container-fluid">
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
    <a href="{{ route('users.create') }}" class="btn btn-primary">+ Tambah</a>
</div>

{{-- Tabel Data User --}}

<div class="table-responsive">
<table class="table table-bordered">
<thead class="table-primary">
<tr>
<th style="width: 50px;">No</th>
<th>Nama</th>
<th>Email</th>
<th>Role</th>
<th width="180px" >Aksi</th>
</tr>
</thead>
<tbody>
@forelse($users as $index => $user)
<tr>
<td>{{ $users->firstItem() + $index }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ ucfirst($user->role) }}</td>
<td>
<div class="btn btn-group">
<a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
<form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
onsubmit="return confirm('Yakin ingin menghapus user ini?')">
@csrf
@method('DELETE')
<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
</form>
</div>
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