<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class News extends Model
{
    use  HasFactory, Notifiable;
    protected $fillable =[
        'title',
        'body',
        'discription',
        'is_visible',
        'image_url',
        'admin_id',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
