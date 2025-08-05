<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function infos()
    {
        return $this->belongsToMany(Info::class, 'info_tag');
    } 
protected static function booted()
{
    static::creating(function ($tag) {
        $tag->slug = \Str::slug($tag->name);
    });
}

}

