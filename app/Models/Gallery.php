<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'image_path', 'category_id',
        'album_id', 'uploader', 'status', 'taken_at', 'is_featured'
    ];

    protected $casts = [
        'taken_at' => 'date',
        'is_featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}

