<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    public function reviews(): BelongsToMany
    {
        return $this->belongsToMany(Post::class,'reviews')
                    ->using(Review::class)
                    ->withTimestamps()
                    ->withPivot([
                        'rating',
                        'comment'
                    ]);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}
