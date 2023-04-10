<?php

namespace App\Http\Controllers\Post;

use App\Http\Resources\Post\PostCollection;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class TopPostController
{
    public function __invoke(): JsonResponse
    {
        $psots = Post::query()
                    ->withCount('reviews')
                    ->withAvg('reviews', 'rating')
                    ->orderByDesc('reviews_count')
                    ->orderByDesc('reviews_avg_rating')
                    ->paginate(
                        request('perPage' , 15)
                    );

        return response()->json(
            PostCollection::make($psots),
            Response::HTTP_ACCEPTED
        );
    }
}
