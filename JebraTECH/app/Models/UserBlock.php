<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserBlock extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'user_id',
        'user_blocked_id'
    ];

    public function user_block(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function writer_blocks(){
        return $this->belongsTo(User::class, 'user_blocked_id');
    }
}
