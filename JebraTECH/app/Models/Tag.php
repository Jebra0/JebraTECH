<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Tag extends Model
{
    use  HasFactory, Notifiable;

    protected $fillable =[
        'name',
    ];

    public function tageblogtags(){
        return $this->hasMany(BlogTag::class, 'tag_id');
    }

}
