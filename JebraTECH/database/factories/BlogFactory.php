<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'body' => fake()->sentence(),
            'description' => fake()->sentence(),
            'is_hidden' => fake()->boolean(),
            'category_id' => function () {
                return Category::inRandomOrder()->first()->id;
            },
        ];
    }
}
