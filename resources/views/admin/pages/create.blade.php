@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Buat Halaman Baru</h2>
    <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.pages.partials.form', ['page' => new \App\Models\Page])
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Batal</a>
    </form>
    @push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endpush

</div>
@endsection