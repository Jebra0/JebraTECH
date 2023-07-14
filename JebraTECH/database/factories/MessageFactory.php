<?php

namespace Database\Factories;

use App\Models\Chate;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    public $thisChatId;

    public function definition(): array
    {
        $thisChatId = Chate::inRandomOrder()->first()->id;

        return [
            'chate_id' => $thisChatId,

            'sender_id' => fake()->boolean,
            'content' => fake()->sentence
        ];
    }
}
