<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;

class AdminPostController extends Controller
{
  /**
   *  Method to see all posts from admin section.
   * */
  public function index()
  {
    return view('admin.posts.index', [
      'posts' => Post::paginate(10),
    ]);
  }

  /**
   * Method to create post.
   * */
  public function create(Category $category)
  {
    return view('admin.posts.create', [
      'categories' => Category::all(),
    ]);
  }

  /**
   *  Method to validate and store the post.
   * */
  public function store(StorePostRequest $request)
  {
    $attributes = $request->validated();

    $attributes['user_id'] = auth()->id();
    $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

    Post::create($attributes);

    return redirect(route('home'));
  }

  /**
   *   Method to edit the post.
   * */
  public function edit(Post $post, Category $category)
  {
    return view('admin.posts.edit', [
      'post' => $post,
      'categories' => Category::all(),
    ]);
  }

  /**
   * Method to update the post.
   * */
  public function update(UpdatePostRequest $request, Post $post)
  {
    $attributes = $request->validated();

    if (isset($attributes['thumbnail'])) {
      $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    }

    $post->update($attributes);

    return back()->with('success', 'Post Updated!');
  }

  /**
   * Method to delete the post.
   * */
  public function destroy(Post $post)
  {
    $post->delete();

    return back()->with('success', 'Post Deleted!');
  }
}
