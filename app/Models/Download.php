<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
       protected $fillable = [
        'title', 'slug', 'description', 'file_path', 'category_id',
        'file_type', 'file_size', 'uploader', 'status', 'download_count'
    ];

    public function category()
    {
        return $this->belongsTo(DownloadCategory::class);
    }
}
