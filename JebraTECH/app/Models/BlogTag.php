<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class BlogTag extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable =[
        'blog_id',
        'tag_id',
    ];

    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function tag(){
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    public $timestamps = false;

}
