<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'kategori_id', 'judul', 'slug', 'isi', 'harga', 'gambar',
    'youtube_url','author', 'is_homepage', 'status', 'published_at'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'info_tag');
    }
      public function getYoutubeEmbedAttribute()
    {
        $url = $this->youtube_url ?? null;

        if (!$url) {
            return null;
        }

        // Kalau formatnya watch?v=abcd123
        if (preg_match('/v=([^&]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        // Kalau formatnya youtu.be/abcd123
        if (strpos($url, 'youtu.be/') !== false) {
            return str_replace('youtu.be/', 'www.youtube.com/embed/', $url);
        }

        // Kalau sudah embed atau format lain
        return $url;
    }
}
