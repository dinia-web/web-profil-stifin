@extends('layouts.master')
@section('title', 'Edit Cabang STIFIn')
@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Edit Cabang STIFIn</h2>

    <form action="{{ route('branches.update', $branch->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Cabang</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $branch->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Kota</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $branch->city) }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" id="address" class="form-control">{{ old('address', $branch->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $branch->phone) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $branch->email) }}">
        </div>

        <div class="mb-3">
            <label for="whatsapp" class="form-label">WhatsApp</label>
            <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{ old('whatsapp', $branch->whatsapp) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('branches.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
