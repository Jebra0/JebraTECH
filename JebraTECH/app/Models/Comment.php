<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{

    use  HasFactory, Notifiable;
        use SoftDeletes;

    protected $fillable = [
        'user_id',
        'blog_id',
        'content'
    ];

    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies(){
        return $this->hasMany(Reply::class, 'comment_id');
    }

    public function delete()
    {
        $this->replies()->delete();
        return parent::delete();
    }

    public function restore()
    {
        $this->replies()->withTrashed()->get()->each(function ($reply) {
            $reply->restore();
        });

        return parent::restore();
    }

}
