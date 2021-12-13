<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
  /*
   * METHOD TO SEE ALL POSTS
   * */

  public function index()
  {
    return view('posts.index', [
      'posts' => Post::latest()->filter(
        request(['search', 'category', 'author'])
      )->paginate()->withQueryString(),
      'categories' => Category::all(),
    ]);
  }

  /*
   * METHOD TO SEE SINGLE POST
   * */

  public function show(Post $post)
  {
    return view('posts.show', [
      'post' => $post,
    ]);
  }


  /*
   * METHOD TO SEE ALL AUTHOR'S POSTS
   * */

  public function getAuthor(User $author)
  {
    return view('posts.index', [
      'posts' => $author->posts->load(['category', 'author']),
      'categories' => Category::all(),
    ]);
  }


  /*
   * METHOD TO SEE ALL POSTS OF CATEGORY SELECTED
   * */

  public function getCategory(Category $category)
  {
    return view('posts.index', [
      'posts' => $category->posts->load(['category', 'author']),
      'carrentCategory' => $category,
      'categories' => Category::all(),
    ]);
  }
}
