<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
class BlogTagFactory extends Factory
{

    public function definition(): array
    {
        return [
            'blog_id' => function(){
                return Blog::inRandomOrder()->first()->id;
            },
            'tag_id' => function(){
                return Tag::inRandomOrder()->first()->id;
            }
        ];
    }
}
