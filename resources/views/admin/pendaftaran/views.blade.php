@extends('layouts.master')
@section('title', 'Detail Pendaftaran')
@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Detail Pendaftaran: {{ $pendaftaran->nama }}</h4>
    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <td>{{ $pendaftaran->nama }}</td>
        </tr>
        <tr>
            <th>WhatsApp</th>
            <td>{{ $pendaftaran->whatsapp }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $pendaftaran->email }}</td>
        </tr>
        <tr>
            <th>Paket</th>
            <td>{{ $pendaftaran->paket }}</td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td>{{ $pendaftaran->lokasi }}</td>
        </tr>
        <tr>
            <th>Sidik Jari</th>
            <td>
                @if($pendaftaran->sidik_jari)
                    <a href="{{ asset('storage/' . $pendaftaran->sidik_jari) }}" target="_blank">Lihat</a>
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>Catatan</th>
            <td>{{ $pendaftaran->catatan }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <form action="{{ route('admin.pendaftaran.updateStatus', $pendaftaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" onchange="this.form.submit()">
                        <option value="1" {{ $pendaftaran->status == '1' ? 'selected' : '' }}>Baru Daftar</option>
                        <option value="2" {{ $pendaftaran->status == '2' ? 'selected' : '' }}>Sudah Tes</option>
                        <option value="3" {{ $pendaftaran->status == '3' ? 'selected' : '' }}>Menunggu Hasil</option>
                    </select>
                </form>
            </td>
        </tr>
        <tr>
            <th>Tanggal Daftar</th>
            <td>{{ $pendaftaran->created_at->format('d-m-Y H:i') }}</td>
        </tr>
    </table>
</div>
@endsection
