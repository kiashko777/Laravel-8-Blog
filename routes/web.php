<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//MAIN ROUTE

Route::get('/', function () {
  return view('posts', [
    'posts' => Post::latest()->with('category', 'author')->get()
  ]);
});

//ROUTE FOR FETCH SINGLE POST

Route::get('/posts/{post:slug}', function (Post $post) {

  return view('post', [
    'post' => $post
  ]);
});

//ROUTE TO FETCH AUTHOR POSTS

Route::get('authors/{author:username}', function (User $author) {

  return view('posts', [
    'posts' => $author->posts->load(['category', 'author'])
  ]);
});

//ROUTE TO FETCH CATEGORIES

Route::get('categories/{category:slug}', function (Category $category) {

  return view('posts', [
    'posts' => $category->posts->load(['category', 'author'])
  ]);
});
