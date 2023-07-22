<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Chate extends Model
{
    use  HasFactory, Notifiable;
    protected $fillable = [
        'admin_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin(){
        return $this->belongsTo(Chate::class, 'admin_id');
    }

    public function messages(){
        return $this->hasMany(Message::class, 'chate_id');
    }

}
