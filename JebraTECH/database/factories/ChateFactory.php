<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'admin_id' => function(){
                return Admin::inRandomOrder()->first()->id;
            },
            'user_id' => function(){
                return User::inRandomOrder()->first()->id;
            }
        ];
    }
}
