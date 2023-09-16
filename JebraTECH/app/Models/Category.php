<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use  HasFactory, Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function blogs(){
        return $this->hasMany(Blog::class,'category_id');
    }

    public function delete()
    {
        $this->blogs()->each(function ($blog) {
            $blog->delete();
        });

        return parent::delete();
    }

    public function restore()
    {
        $this->blogs()->each(function ($blog) {
            $blog->restore();
        });

        return parent::restore();
    }
}
