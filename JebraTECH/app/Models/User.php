<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_writer',
        'gender',
        'photo',
        'about',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function chate(){
        return $this->hasOne(Chate::class, 'user_id');
    }

    public function shares(){
        return $this-> hasMany(Share::class, 'user_id');
    }
    public function likes(){
        return $this-> hasMany(Like::class, 'user_id');
    }
    public function comments(){
        return $this-> hasMany(Comment::class, 'user_id');
    }
    public function reborts(){
        return $this-> hasMany(UserReport::class, 'user_id');
    }
    public function reads(){
        return $this-> hasMany(ReadBy::class, 'user_id');
    }

//////////// please check this relations in blocks good

//    public function blocks(){
//        return $this->belongsToMany(UserBlock::class, 'role_user', 'user_id', 'role_id');
//    }

    public  function user_blocks(){
        return $this->hasMany(UserBlock::class, 'user_id' );
    }
    public  function writer_blocks(){
            return $this->hasMany(UserBlock::class, 'user_blocked_id' );
    }


//////////// please check this relations in follows good

    public  function user_follows(){
        return $this->hasMany(Follow::class, 'follower_id' );
    }
    public  function writer_follows(){
            return $this->hasMany(Follow::class, 'followed_id' );
    }

}
