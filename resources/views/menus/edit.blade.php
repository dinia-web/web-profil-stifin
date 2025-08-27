@extends('layouts.master')

@section('content')
<div class="container">
    <h3>Edit Menu</h3>

    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul Menu</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $menu->title) }}" required>
        </div>

        <div class="mb-3">
            <label>URL (opsional)</label>
            <input type="text" name="url" class="form-control" value="{{ old('url', $menu->url) }}">
        </div>

        <div class="mb-3">
            <label>Parent Menu (jika ada)</label>
            <select name="parent_id" class="form-control">
                <option value="">-- Tidak ada --</option>
                @foreach($parents as $p)
                    <option value="{{ $p->id }}" {{ $menu->parent_id == $p->id ? 'selected' : '' }}>
                        {{ $p->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Urutan</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', $menu->order ?? 0) }}">
        </div>

      <div class="mb-3">
    <label class="form-label d-block">Status</label>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="status_active" value="active"
            {{ old('status', $menu->status ?? 'active') == 'active' ? 'checked' : '' }}>
        <label class="form-check-label" for="status_active">Aktif</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="inactive"
            {{ old('status', $menu->status ?? 'active') == 'inactive' ? 'checked' : '' }}>
        <label class="form-check-label" for="status_inactive">Tidak Aktif</label>
    </div>
</div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
