<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class UserReport extends Model
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
        return $this->hasMany(User::class, 'user_id');
    }
    public $timestamps = false;

}
