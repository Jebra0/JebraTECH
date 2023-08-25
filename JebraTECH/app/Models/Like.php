<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Like extends Model
{
    use  HasFactory, Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'blog_id',
    ];

    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }}
