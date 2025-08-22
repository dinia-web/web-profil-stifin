@extends('layouts.master')
@section('title', 'Manajemen Menu')
@section('content')
<div class="container">
    <h3 class="mb-4">Manajemen Menu</h3>

{{-- Notifikasi sukses --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

 <div class="mb-3 d-flex justify-content-between">
    <form method="GET" action="{{ route('menus.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari menu..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>
    <a href="{{ route('menus.create') }}" class="btn btn-primary">+ Tambah Menu</a>
</div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Slug</th>
                <th>URL</th>
                <th>Urutan</th>
                <th>Status</th>
                <th>Parent</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->title }}</td>
                <td>{{ $menu->slug }}</td>
                <td>{{ $menu->url }}</td>
                <td>{{ $menu->order }}</td>
                <td>{{ $menu->status }}</td>
                <td>{{ $menu->parent->title ?? '-' }}</td>
                <td>
                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   <div class="d-flex justify-content-between mt-3">
    <div>
        <p class="mb-4 text-muted">
            Showing {{ $menus->firstItem() }} to {{ $menus->lastItem() }} of {{ $menus->total() }} results
        </p>
    </div>
    <div>
        {{ $menus->links('pagination::bootstrap-5') }}
    </div>
</div>

</div>
@endsection