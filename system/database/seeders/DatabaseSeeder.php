<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(5000)->create();

        Post::factory()->count(50_000)->create();

        Review::factory()->count(20_000)->create();
    }
}
