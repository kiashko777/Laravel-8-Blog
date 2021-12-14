<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
  /*
   *  METHOD TO SEE ALL POSTS IN ADMIN SECTION
   * */

  public function index()
  {
    return view('admin.posts.index', [
      'posts' => Post::paginate(10),
    ]);
  }

  /*
   * METHOD TO CREATE THE POST
   * */

  public function create(Category $category)
  {
    return view('admin.posts.create', [
      'categories' => Category::all()
    ]);
  }


  /*
   *  METHOD TO VALIDATE AND STORE THE POST
   * */

  public function store(StorePostRequest $request)
  {
    $attributes = $request->validated();

    $attributes['user_id'] = auth()->id();
    $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

    Post::create($attributes);

    return redirect(route('home'));
  }

  /*
   *   METHOD TO EDIT THE POST
   * */

  public function edit(Post $post, Category $category)
  {
    return view('admin.posts.edit', [
      'post' => $post,
      'categories' => Category::all()
    ]);
  }

  /*
   * METHOD TO UPDATE THE POST
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

  /*
   * METHOD TO DELETE THE POST
   * */

  public function destroy(Post $post)
  {
    $post->delete();

    return back()->with('success', 'Post Deleted!');
  }
}
