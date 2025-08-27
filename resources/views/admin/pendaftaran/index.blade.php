@extends('layouts.master')
@section('title', 'Daftar Tes STIFIn')
@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Daftar Pendaftaran Tes STIFIn</h4>
     <div class="mb-3 d-flex justify-content-between">
    <form method="GET" action="{{ route('admin.pendaftaran.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari pendaftar..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>
</div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama</th>
                <th>WhatsApp</th>
                <th>Email</th>
                <th>Paket</th>
                <th>Lokasi</th>
                <th>Upload</th>
                <th>Catatan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th width="190px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendaftaran as $index => $p)
        <tr>
            <td>{{ $pendaftaran->firstItem() + $index }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->whatsapp }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->paket }}</td>
                    <td>{{ $p->lokasi }}</td>
                    <td>
                        @if($p->sidik_jari)
                            <a href="{{ asset('storage/' . $p->sidik_jari) }}" target="_blank">Lihat</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $p->catatan }}</td>
                    <td>{{ $p->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $p->status_text }}</td>
                    <td>
                        <div class="btn btn-group">
                        <a href="{{ route('admin.pendaftaran.show', $p->id) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Lihat</a>
                        <form action="{{ route('admin.pendaftaran.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada pendaftaran</td>
                </tr>
            @endforelse
        </tbody>
    </table>
       <div class="d-flex justify-content-between mt-3">
    <div>
        <p class="mb-4 text-muted">
            Showing {{ $pendaftaran->firstItem() }} to {{ $pendaftaran->lastItem() }} of {{ $pendaftaran->total() }} results
        </p>
    </div>
    <div>
        {{ $pendaftaran->links('pagination::bootstrap-5') }}
    </div>
</div>
</div>
@endsection
