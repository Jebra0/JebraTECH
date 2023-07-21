<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Media extends Model
{
    use  HasFactory, Notifiable;

    protected $fillable =[
        'is_image',
        'url',
        'caption',
        'blog_id'
    ];

    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
