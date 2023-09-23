<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Blog extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    use CascadesDeletes;

    protected $cascadeDeletes = ['blogtags', 'media', 'shares', 'likes', 'comments', 'reborts', 'reads'];

    protected $fillable = [
        'title',
        'body',
        'description',
        'is_hidden',
        'is_confirmed', // if the blog is published or not
        'category_id',
        'writter_id',
        'scheduling_date' // for scheduling the blogs
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function writter(){
        return $this->belongsTo(User::class, 'writter_id');
    }

    public function blogtags(){
        return $this->hasMany(BlogTag::class, 'blog_id');
    }

    public function media(){
        return $this->hasMany(Media::class, 'blog_id');
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
