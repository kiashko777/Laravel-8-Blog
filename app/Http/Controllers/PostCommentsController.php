<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentsController extends Controller
{
  /*
   *  METHOD TO CREATE AND STORE COMMENTS
   * */

  public function store(Post $post)
  {
    request()->validate([
      'body' => 'required',
    ]);

    $post->comments()->create([
      'user_id' => request()->user()->id,
      'body' => request('body'),
    ]);

    return back();
  }
}
