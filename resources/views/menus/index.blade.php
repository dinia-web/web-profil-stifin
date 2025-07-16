@extends('layouts.master')

@section('content')
<div class="container">
    <h3 class="mb-4">Manajemen Menu</h3>

{{-- Notifikasi sukses --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">+ Tambah Menu</a>

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
</div>
@endsection
