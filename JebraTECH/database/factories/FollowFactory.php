<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FollowFactory extends Factory
{
    public function definition(): array
    {
        $follower = User::where('is_writer', 0)->inRandomOrder()->first()->id;
        $followed = User::where('is_writer', 1)->inRandomOrder()->first()->id;
        return [
            'follower_id' => $follower,
            'followed_id' => $followed
        ];
    }
}
