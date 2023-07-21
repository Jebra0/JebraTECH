<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use  HasFactory, Notifiable;
    protected $fillable =[
        'chate_id',
        'sender_id',
        'content',
    ];

    public function chate(){
        return $this->belongsTo(Chate::class, 'chate_id');
    }
}
