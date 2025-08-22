@extends('layouts.master')
@section('title', 'Data Info')
@section('content')
<div class="container">
<h3 class="mb-4">Daftar Info</h3>

{{-- Notifikasi sukses --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3 d-flex justify-content-between">
    <form method="GET" action="{{ route('infos.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari info..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>
    <a href="{{ route('infos.create') }}" class="btn btn-primary">+ Tambah Info</a>
</div>

<table id="infoTable" class="table table-bordered">
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
    <div class="d-flex justify-content-between align-items-center mt-3">
    <div>
        {{ $infos->withQueryString()->links() }}
    </div>
</div>
</div>
@endsection
@push('scripts')
<!-- DataTables CSS & JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#infoTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true
        });
    });
</script>
@endpush