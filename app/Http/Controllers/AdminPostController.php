<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{

//  METHOD TO SEE ALL POSTS IN ADMIN SECTION

  public function index()
  {
    return view('admin.posts.index', [
      'posts' => Post::paginate(10)
    ]);
  }

//  METHOD TO CREATE THE POST

  public function create()
  {
    //SIMPLE WAY TO PROTECT ADMIN PART
//    if (auth()->guest()) {
//      abort(Response::HTTP_FORBIDDEN);
//    }
//
//    if (auth()->user()->username !== 'kiashko777') {
//      abort(Response::HTTP_FORBIDDEN);
//    }

    return view('admin.posts.create');
  }


//  METHOD TO VALIDATE AND STORE THE POST

  public function store()
  {

    $attributes = request()->validate([
      'title' => 'required',
      'thumbnail' => 'required|image',
      'slug' => ['required', Rule::unique('posts', 'slug')],
      'excerpt' => 'required',
      'body' => 'required',
      'category_id' => ['required', Rule::exists('categories', 'id')]
    ]);

    $attributes['user_id'] = auth()->id();
    $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

    Post::create($attributes);

    return redirect('/');

  }


  //  METHOD TO EDIT THE POST

  public function edit(Post $post)
  {
    return view('admin.posts.edit', [
      'post' => $post
    ]);
  }


  //  METHOD TO UPDATE THE POST

  public function update(Post $post)
  {
    $attributes = request()->validate([
      'title' => 'required',
      'thumbnail' => 'image',
      'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
      'excerpt' => 'required',
      'body' => 'required',
      'category_id' => ['required', Rule::exists('categories', 'id')]
    ]);

    if (isset($attributes['thumbnail'])) {
      $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    }

    $post->update($attributes);

    return back()->with('success', 'Post Updated!');
  }


  //  METHOD TO DELETE THE POST

  public function destroy(Post $post)
  {
    $post->delete();
    return back()->with('success', 'Post Deleted!');
  }
}
