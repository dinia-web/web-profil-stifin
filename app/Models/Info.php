<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'kategori_id', 'judul', 'slug', 'isi', 'gambar',
        'author', 'is_homepage', 'status', 'published_at'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'info_tag');
    }
}
