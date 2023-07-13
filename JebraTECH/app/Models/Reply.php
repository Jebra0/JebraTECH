<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Reply extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'content',
        'comment_id'
    ];

    public function comment(){
        return $this->belongsTo(Comment::class, 'comment_id');
    }
}
