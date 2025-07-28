<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function infos()
    {
        return $this->belongsToMany(Info::class, 'info_tag');
    }
}

