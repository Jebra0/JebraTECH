<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Blog extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

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

    public function delete()
    {
   // Soft delete related tables because i can not use ->onDelete('cascade') because i do not have migration files
        $this->comments()->delete();
//        $this->comments()->each(function ($comment) {
//            $comment->delete(); // Soft delete related comments
//        });
        $this->media()->delete();
        $this->blogtags()->delete();
        $this->shares()->delete();
        $this->likes()->delete();
        $this->reborts()->delete();
        $this->reads()->delete();

        // Perform the soft delete on the blog itself
        return parent::delete();
    }

    public function restore()
    {
        parent::restore(); // Perform the restore on the blog itself

        $this->comments()->withTrashed()->restore(); // Restore related comments

//        $this->media()->restore();
//        $this->blogtags()->restore();
//        $this->shares()->restore();
//        $this->likes()->restore();
//        $this->reborts()->restore();
//        $this->reads()->restore();

    }

}
