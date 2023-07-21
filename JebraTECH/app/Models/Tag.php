<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tag extends Model
{
    use  HasFactory, Notifiable;

    protected $fillable =[
        'name',
    ];

    public function tags(){
        return $this->hasMany(BlogTag::class, 'blog_id');
    }

    public $timestamps = false;

}
