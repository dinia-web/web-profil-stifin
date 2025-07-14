@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Pesan</h3>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Subject:</strong> {{ $contact->subject ?? '-' }}</p>
            <p><strong>Pesan:</strong> <br>{{ $contact->message }}</p>
            <p><strong>No. HP:</strong> {{ $contact->phone ?? '-' }}</p>
            <p><strong>Status:</strong> {{ ucfirst($contact->status) }}</p>
            <p><strong>Dikirim pada:</strong> {{ $contact->created_at->format('d-m-Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection
