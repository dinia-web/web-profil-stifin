@extends('layouts.master')

@section('title', 'Tambah Info')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Info Baru</h2>

    <form action="{{ route('admin.infos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="kategori_id" class="form-label">Kategori</label>
        <select name="kategori_id" id="kategori_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
            <label for="tags" class="form-label">Tag</label>
            <select name="tags[]" id="tags" class="form-control" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Ketik untuk menambah tag baru atau pilih dari daftar.</small>
        </div>

    <div class="mb-3">
        <label for="isi" class="form-label">Konten</label>
        <textarea id="editor" name="isi" id="isi" class="form-control" rows="5"></textarea>
    </div>

     <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" placeholder="contoh: 50000">
        </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control">
    </div>

   <div id="video-wrapper">
    @if(!empty($info->youtube_url))
        @foreach(json_decode($info->youtube_url, true) as $url)
            <div class="mb-3 d-flex gap-2">
                <input type="url" name="youtube_urls[]" class="form-control" value="{{ $url }}">
                <button type="button" class="btn btn-danger btn-sm remove-video">x</button>
            </div>
        @endforeach
    @else
        <div class="mb-3">
            <label for="youtube_url" class="form-label">Url Youtube</label>
            <input type="url" name="youtube_urls[]" class="form-control" placeholder="https://www.youtube.com/watch?v=...">
        </div>
    @endif
</div>

<button type="button" class="btn btn-sm btn-success mb-3" id="add-video">+ Tambah Video</button>

@push('scripts')
<script>
document.getElementById('add-video').addEventListener('click', function() {
    let wrapper = document.getElementById('video-wrapper');
    let input = document.createElement('div');
    input.classList.add('mb-3','d-flex','gap-2');
    input.innerHTML = `
        <input type="url" name="youtube_urls[]" class="form-control" placeholder="https://www.youtube.com/watch?v=...">
        <button type="button" class="btn btn-danger btn-sm remove-video">x</button>
    `;
    wrapper.appendChild(input);

    // Event hapus input
    input.querySelector('.remove-video').addEventListener('click', function() {
        wrapper.removeChild(input);
    });
});
</script>
@endpush


    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" name="author" id="author" class="form-control" value="{{ auth()->user()->name ?? '' }}">
    </div>

     <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="draft">Draft</option>
            <option value="published">Published</option>
            <option value="archived">Archived</option>
        </select>
    </div>


    <div class="mb-3">
        <label for="published_at" class="form-label">Tanggal Publikasi</label>
        <input type="datetime-local" name="published_at" id="published_at" class="form-control">
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="is_homepage" name="is_homepage">
        <label class="form-check-label" for="is_homepage">
            Tampilkan di Homepage
        </label>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.infos.index') }}" class="btn btn-secondary">Batal</a>
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
    new TomSelect("#tags", {
        plugins: ['remove_button'],
        persist: false,
        create: true, // bisa ketik tag baru
    });
</script>
@endpush
</div>
@endsection
