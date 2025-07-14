<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'subject', 'message', 'phone', 'status'
    ];
    public function contact()
{
return $this->belongsTo(Contact::class);
}
}
