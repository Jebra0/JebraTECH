<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'body' => fake()->text,
            'discription' => fake()->sentence,
            'is_visible' => fake()->boolean,
            'image_url' => fake()->imageUrl,
            'admin_id' => function(){
               return Admin::inRandomOrder()->first()->id;
            }
        ];
    }
}
