<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string'
            ],
            'body' => [
                'required',
                'string'
            ],
            'user_id' => [
                'required',
                Rule::exists('users','id'),
            ]
        ];
    }
}
