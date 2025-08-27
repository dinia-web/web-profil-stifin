@extends('layouts.master')

@section('title', 'Edit Kategori Download')

@section('content')
<div class="container mt-4">
<h3 class="mb-4">Edit Kategori</h3>

@if ($errors->any())
<div class="alert alert-danger">
<strong>Terjadi kesalahan:</strong>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>

</div>
@endif

<form action="{{ route('download_categories.update', $downloadCategory->id) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-3">
<label for="name" class="form-label">Nama Kategori</label>
<input type="text" name="name" class="form-control" id="name"
value="{{ old('name', $downloadCategory->name) }}" required>
</div>

<button class="btn btn-primary">Update</button>
<a href="{{ route('download_categories.index') }}" class="btn btn-secondary">Batal</a>
</form>
</div>
@endsection