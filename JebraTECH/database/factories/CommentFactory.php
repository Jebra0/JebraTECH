<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
//            'user_id' => function(){
//                return User::inRandomOrder()->first()->id;
//            },
//            'blog_id', function(){
//                return Blog::inRandomOrder()->first()->id;
//            },
//            'content' => fake()->sentence
        ];
    }
}
