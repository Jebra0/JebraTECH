<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Tag extends Model
{
    use  HasFactory, Notifiable;
    use SoftDeletes;

    protected $fillable =[
        'name',
    ];

    public function tageblogtags(){
        return $this->hasMany(BlogTag::class, 'tag_id');
    }

    public function delete(){
        $this->tageblogtags()->delete();
        return parent::delete();
    }

    public function restore(){
        $this->tageblogtags()->restore();
        return parent::restore();
    }

    public $timestamps = false;

}
