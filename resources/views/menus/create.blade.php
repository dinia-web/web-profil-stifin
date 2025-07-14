@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Menu</h3>

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Judul Menu</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>URL (opsional)</label>
            <input type="text" name="url" class="form-control">
        </div>

        <div class="mb-3">
            <label>Parent Menu (jika ada)</label>
            <select name="parent_id" class="form-control">
                <option value="">-- Tidak ada --</option>
                @foreach($parents as $p)
                    <option value="{{ $p->id }}">{{ $p->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Urutan</label>
            <input type="number" name="order" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active">Aktif</option>
                <option value="inactive">Tidak Aktif</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
