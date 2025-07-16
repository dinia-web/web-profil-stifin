@extends('layouts.master')

@section('content')
<div class="container">
<h3 class="mb-4">Daftar Info</h3>

{{-- Notifikasi sukses --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('infos.create') }}" class="btn btn-primary mb-3">+ Tambah
Info</a>

<table class="table table-bordered">
<thead>
<tr>
<th>Judul</th>
<th>Kategori</th>
<th>Tanggal</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach ($infos as $info)
<tr>
<td>{{ $info->judul }}</td>
<td>{{ $info->kategori->nama }}</td>
<td>{{ $info->created_at->format('d-m-Y') }}</td>
<td>
<a href="{{ route('infos.edit', $info->id) }}" class="btn btn-sm
btn-warning">Edit</a>

<form action="{{ route('infos.destroy', $info->id) }}"
method="POST" class="d-inline"
onsubmit="return confirm('Yakin ingin menghapus?')">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger">Hapus</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection