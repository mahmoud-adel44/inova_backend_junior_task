<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class StorePostController
{
    public function __invoke(StorePostRequest $request): JsonResponse
    {
        $post = Post::query()->create(
            $request->validated()
        );

        return response()->json(
                PostResource::make($post),
                Response::HTTP_CREATED,
            );
    }
}
