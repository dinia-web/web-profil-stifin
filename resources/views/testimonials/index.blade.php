@extends('layouts.master')
@section('title', 'Testimonial')
@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Testimonial</h2>

    {{-- Tombol Tambah & Pencarian --}}
    <div class="mb-3 d-flex justify-content-between">
        <form method="GET" action="{{ route('testimonials.index') }}" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari testimonial..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">Cari</button>
        </form>
        <a href="{{ route('testimonials.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th width="50px">No</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Pesan</th>
                <th>Status</th>
                <th>Foto</th>
                <th width="160px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($testimonials as $index => $testimonial)
            <tr>
                <td>{{ $testimonials->firstItem() + $index }}</td>
                <td>{{ $testimonial->name }}</td>
                <td>{{ $testimonial->role }}</td>
                <td>{{ $testimonial->message }}</td>
                 <td>
                        @switch($testimonial->status)
                            @case('draft')
                                <span class="badge bg-secondary">Draft</span>
                                @break
                            @case('published')
                                <span class="badge bg-success">Published</span>
                                @break
                            @case('archived')
                                <span class="badge bg-dark">Archived</span>
                                @break
                        @endswitch
                    </td>
                <td>
                    @if($testimonial->image)
                        <img src="{{ asset('storage/'.$testimonial->image) }}" alt="Foto" width="80">
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada data testimonial</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-between mt-3">
        <div>
            <p class="mb-4 text-muted">
                Showing {{ $testimonials->firstItem() ?? 0 }} to {{ $testimonials->lastItem() ?? 0 }} of {{ $testimonials->total() ?? 0 }} results
            </p>
        </div>
        <div>
            {{ $testimonials->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
