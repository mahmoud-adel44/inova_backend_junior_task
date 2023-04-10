<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\ReviewPostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewPostController extends Controller
{
    public function __invoke(ReviewPostRequest $request, Post $post)
    {
        $post->reviews()->attach($request->get('user_id') , $request->safe()->except('user_id'));

        return response()->json([
            'message' => 'review added successfully'
        ], Response::HTTP_CREATED);
    }
}
