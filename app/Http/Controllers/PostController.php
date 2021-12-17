<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Method to see all posts.
     * */
    public function index()
    {
        return view('posts.index', [
      'posts' => Post::latest()->filter(
          request(['search', 'category', 'author'])
      )->paginate(6)->withQueryString(),
      'categories' => Category::all(),
    ]);
    }

    /**
     * Method to see single post.
     * */
    public function show(Post $post)
    {
        return view('posts.show', [
      'post' => $post,
    ]);
    }
}
