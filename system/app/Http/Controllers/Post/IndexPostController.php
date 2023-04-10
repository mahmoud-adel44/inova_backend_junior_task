<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexPostController extends Controller
{
    public function __invoke(User $user)
    {
        $posts = $user->posts()->paginate(request('perPage', 15));

        return response()->json(
            PostCollection::make($posts),
            Response::HTTP_ACCEPTED,
        );
    }
}
