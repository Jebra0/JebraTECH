<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
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
    public function chate(){
        return $this->belongsTo(Chate::class, 'admin_id');
    }

    public function news(){
        return $this->hasMany(News::class, 'admin_id');
    }
}
