<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class UserBlock extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'user_blocked_id'
    ];

    public function blocks(){
        return $this->belongsToMany(User::class, 'UserBlock', 'user_id', 'user_blocked_id');
    }


}
