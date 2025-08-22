<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';

    protected $fillable = [
        'nama',
        'whatsapp',
        'email',
        'paket',
        'lokasi',
        'sidik_jari',
        'catatan'
    ];
}