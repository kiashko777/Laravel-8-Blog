<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Post $post)
    {
        return [
      'title' => 'required',
      'thumbnail' => 'image',
      'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
      'excerpt' => 'required',
      'body' => 'required',
      'category_id' => ['required', Rule::exists('categories', 'id')],
    ];
    }
}
