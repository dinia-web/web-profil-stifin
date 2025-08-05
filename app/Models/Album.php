<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'cover_image'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'album_id');
    }
}

