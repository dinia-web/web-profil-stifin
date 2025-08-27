@extends('layouts.master')

@section('title', 'Tambah Kategori Download')

@section('content')
<div class="container mt-4">
<h3 class="mb-4">Tambah Kategori</h3>

@if ($errors->any())
<div class="alert alert-danger">
<strong>Periksa kembali input Anda:</strong>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{ route('download_categories.store') }}" method="POST">
@csrf

<div class="mb-3">

<label for="name" class="form-label">Nama Kategori</label>
<input type="text" name="name" class="form-control" id="name" value="{{
old('name') }}" required>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('download_categories.index') }}" class="btn btn-secondary">Batal</a>
</form>
</div>
@endsection