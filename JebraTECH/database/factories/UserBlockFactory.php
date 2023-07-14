<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserBlockFactory extends Factory
{
    public $blocker;

    public function definition(): array
    {
        $blocker = User::where('is_writer', 0)->inRandomOrder()->first()->id;
        $blocked = User::where('is_writer', 1)->inRandomOrder()->first()->id;
        return [
            'user_id' => $blocker,
            'user_blocked_id'  => $blocked
        ];
    }
}
