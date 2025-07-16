@extends('layouts.master')

@section('content')
<div class="container">
    <h4>Edit Pengguna</h4>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="dosen" {{ $user->role == 'dosen' ? 'selected' : '' }}>Dosen</option>
                <option value="mahasiswa" {{ $user->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi (Opsional)</label>
            <input type="password" name="password" class="form-control" minlength="6">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Ulangi Kata Sandi</label>
            <input type="password" name="password_confirmation" class="form-control" minlength="6">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
