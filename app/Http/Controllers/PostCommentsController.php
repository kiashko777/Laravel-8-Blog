<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentsRequest;
use App\Models\Post;

class PostCommentsController extends Controller
{
  /*
   *  METHOD TO CREATE AND STORE COMMENTS
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
