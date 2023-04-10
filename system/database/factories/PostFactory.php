<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'body' => $this->faker->realText(),
            'user_id' => User::query()->inRandomOrder()->first()->id
        ];
    }
}
