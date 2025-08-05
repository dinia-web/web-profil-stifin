@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Edit Halaman</h2>
    <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.pages.partials.form', ['page' => $page])
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection