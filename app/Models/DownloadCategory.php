<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadCategory extends Model
{
     protected $fillable = ['name', 'slug'];

    public function downloads()
    {
        return $this->hasMany(Download::class, 'category_id');
    }
}
