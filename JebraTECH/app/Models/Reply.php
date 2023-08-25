<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Reply extends Model
{
    use  HasFactory, Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'content',
        'comment_id',
        'user_id'
    ];

    public function comment(){
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
