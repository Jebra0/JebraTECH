<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Blog extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'title',
        'body',
        'description',
        'is_hidden',
        'category_id',
        'writter_id',
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function writter(){
        return $this->belongsTo(User::class, 'writter_id');
    }

    public function blogtags(){
        return $this-> hasMany(BlogTag::class, 'blog_id');
    }

    public function media(){
        return $this-> hasMany(Media::class, 'blog_id');
    }

    public function shares(){
        return $this->hasMany(Share::class, 'blog_id');
    }
    public function likes(){
        return $this-> hasMany(Like::class, 'blog_id');
    }
    public function comments(){
        return $this-> hasMany(Comment::class, 'blog_id');
    }
    public function reborts(){
        return $this-> hasMany(UserReport::class, 'blog_id');
    }
    public function reads(){
        return $this-> hasMany(ReadBy::class, 'blog_id');
    }
}
