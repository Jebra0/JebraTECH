<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin  extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'gender',
        'email',
        'photo',
        'password',
        'is_active',
        'last_login_at',
    ];
    protected $hidden = [
        'password',
    ];
    protected $casts = [
        'password' => 'hashed',
    ];
    public function chates(){
        return $this->hasMany(Chate::class, 'admin_id');
    }

    public function news(){
        return $this->hasMany(News::class, 'admin_id');
    }
}
