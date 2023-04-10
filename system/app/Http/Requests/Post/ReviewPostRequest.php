<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReviewPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rating' => [
                'required',
                Rule::in(
                    range(1,5)
                ),
            ],
            'comment' => [
                'required',
                'string'
            ],
            'user_id' => [
                'required',
                Rule::exists('users', 'id')
            ]
        ];
    }
}
