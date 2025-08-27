<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
   use HasFactory;

    protected $table = 'pendaftaran'; // nama tabel sesuai di database

    protected $fillable = [
        'nama', 'whatsapp', 'email', 'paket', 'lokasi',
        'sidik_jari', 'catatan', 'status'
    ];

public function getStatusTextAttribute()
{
    return match($this->status) {
        '1' => 'Baru Daftar',
        '2' => 'Sudah Tes',
        '3' => 'Menunggu Hasil',
        default => 'Tidak Diketahui',
    };
}

};

