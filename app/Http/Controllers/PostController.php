<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
//  METHOD TO SEE ALL POSTS

    public function index()
    {
        return view('posts.index', [
      'posts' => Post::latest()->with('category', 'author')->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
      'categories' => Category::all(),
    ]);
    }

    //  METHOD TO SEE SINGLE POST

    public function show(Post $post)
    {
        return view('posts.show', [
      'post' => $post,
    ]);
    }
}
