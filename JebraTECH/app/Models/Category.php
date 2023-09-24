<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;
use App\GraphQL\Mutations\Blogs\RestorBlog;



class Category extends Model
{
    use  HasFactory, Notifiable;
    use SoftDeletes;
    use CascadesDeletes;

    protected $cascadeDeletes = ['blogs'];

    protected $fillable = [
        'name',
    ];

    public function blogs(){
        return $this->hasMany(Blog::class,'category_id');
    }


}
