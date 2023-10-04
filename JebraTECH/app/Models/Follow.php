<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Follow extends Model
{
    use  HasFactory, Notifiable;
    use SoftDeletes;
    protected $fillable = [
        'follower_id',
        'followed_id'
    ];

    public function follows(){
        return $this->belongsToMany(User::class, 'Follow', 'follower_id', 'followed_id');
    }
}
