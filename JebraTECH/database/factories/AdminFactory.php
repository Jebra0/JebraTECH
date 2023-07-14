<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'gender' =>fake()->boolean,
            'email' => fake()->safeEmail,
            'photo' => fake()->imageUrl,
            'password' => fake()->password,
            'is_active' => fake()->boolean,
            'last_login_at' => fake()->dateTime
        ];
    }
}
