@extends('layouts.master')
@section('title', 'Edit Promotor')
@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Edit Promotor</h2>

    <form action="{{ route('promotors.update', $promotor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Promotor</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $promotor->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Kota</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $promotor->city) }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $promotor->phone) }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $promotor->email) }}">
        </div>
        <div class="mb-3">
            <label for="whatsapp" class="form-label">WhatsApp</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $promotor->whatsapp) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('promotors.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
