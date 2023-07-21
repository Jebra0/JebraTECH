<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use  HasFactory, Notifiable;
    protected $fillable = [
        'name',
    ];

    public function blogs(){
        return $this->hasMany(Blog::class,'category_id');
    }
}
