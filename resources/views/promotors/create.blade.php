@extends('layouts.master')
@section('title', 'Tambah Promotor')
@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Tambah Promotor</h2>

    <form action="{{ route('promotors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Promotor</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Kota</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="whatsapp" class="form-label">WhatsApp</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('promotors.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
