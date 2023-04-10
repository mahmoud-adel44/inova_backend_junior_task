<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    public function test_can_add_post()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/posts', [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'user_id' => $user->id,
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_can_list_user_posts()
{
    $user = User::factory()->create();
    $posts = Post::factory()->count(5)->create([
        'user_id' => $user->id
    ]);

    $response = $this->getJson("/api/users/{$user->id}/posts");

    $response->assertStatus(202);
    $response->assertJsonStructure([
        'data' => [
            ['id','title', 'body' ,'created_at',]
        ]
    ]);
}

}
