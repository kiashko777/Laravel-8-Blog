<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentsRequest;
use App\Models\Post;

class PostCommentsController extends Controller
{
    /**
     *  Method to create and store comments.
     * */
    public function store(StoreCommentsRequest $request, Post $post)
    {
        $request->validated();

        $post->comments()->create([
      'user_id' => request()->user()->id,
      'body' => request('body'),
    ]);

        return back();
    }
}
