<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
use HasFactory;

protected $fillable = [
'kategori_id',
'judul',
'slug',
'isi',
'gambar',
];

public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'info_tag');
    }
}