<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{

    use  HasFactory, Notifiable;
    protected $fillable = [
        'user_id',
        'blog_id',
        'content'
    ];

    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function user(){
        return $this->hasMany(User::class, 'user_id');
    }

    public function replies(){
        return $this->hasMany(Reply::class, 'comment_id');
    }

}
