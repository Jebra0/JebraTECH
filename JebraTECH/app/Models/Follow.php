<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Follow extends Model
{
    use  HasFactory, Notifiable;
    protected $fillable = [
        'follower_id',
        'followed_id'
    ];

    public function user_follow(){
        return $this->belongsTo(User::class, 'follower_id ');
    }

    public function writer_follow(){
        return $this->belongsTo(User::class, 'followed_id ');
    }

    public $timestamps = false;
}
